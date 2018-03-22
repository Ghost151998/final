<!-- User's Cart Page-->
<!-- REMOVE ITEM TO BE ADDED FOR EACH ITEM. CHECKOUT TO BE HANDLED .Also to return to this page after removal of item. ALIGN PRICE TO RIGHT. -->
<!-- SUGGESTION : UPDATE AFTER 30 MINS -->
<?php
  session_start();
  include ("dbconfig.php");//Connection to database
  //include ("test_variables.php");

  $redirect_to_user_login = "user_login.php";

  //Check if user is logged in
  if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
    header("Location: " .$redirect_to_user_login);
  }

  else{
    //print_r($_SESSION);
    $cart_total = 0;
?>
<html>
<head>
  <meta charset="utf-8">
  <title></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">

<style >

body{
      overflow:scroll;
      background:url("4.jpg");
      background-size: cover;
    }

    .affix{
      top 0;
      width: 100%;
      z-index: 9999 !important;
    }

    .affix ~ .container-fluid{
      position: relative;
    }

    th{
      color: white;
    }

    .btn-default {
      border: 0.1px solid grey;
      background: white;
      color: black;
      margin-left: 30%;
      margin-top: 20px;
      padding-bottom: 25px;

      
   }
  .btn-default:hover {
     background: green;
      color: white;
   }


    
    
</style>

</head>

<body>


<nav class="navbar  navbar-inverse" >
    <div class="container-fluid ">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand col-sm-1" href="#">Logo</a>


      <div class="navbar-collapse  collapse ">
        <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle js-activated">Books<b class="caret"></b></a>
            <ul class="dropdown-menu" style="background-color: black;opacity: 0.9;border: solid 1px;" >
             <li><a  class="c"   href='items_list.php?category=books&book_branch=cseit' style="color: white;">CSE/IT</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=ece' style="color: white;">ECE</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=ee' style="color: white;">ELECTRICAL</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=civ' style="color: white;">CIVIL</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=mechprod' style="color: white;">MECH/PROD</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=chem' style="color: white;">CHEMICAL</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=biot' style="color: white;">BIO-TECH</a></li>
             <li><a  class="c"   href='items_list.php?category=books' style="color: white;">MISC</a></li>          
           </ul>
          </li>

        <li><a href='items_list.php?category=bikes'>Bikes</a></li>
        <li><a href='items_list.php?category=misc'>Misc</a></li>
        <li><a href='seller_page.php'>Sell</a></li>
        <li><a href="#footer">Contact</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href='logout.php'><span class="glyphicon glyphicon-user"></span>Logout</a></li>
        <li class="active"><a href='cart.php'><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
      </ul>

         
      </div> <!-- .nav-collapse -->
    </div> <!-- .container -->
  </nav><br>

  <div class="jumbotron" style="opacity: 0.5;">
  <div class="container text-center">
    <h1 class="text-left">Your Cart</h1>      
  </div>
</div>



<div class="container">
                                                                                      
  <table>
    <thead>
      <tr>
        <th>Item</th>
        <th>Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $books = mysqli_query($conn,"SELECT books.id, books.author, books.title, books.price FROM books INNER JOIN cart ON books.id = cart.item_id WHERE item_category = 'books' AND is_sold = 0 AND cart.reg = '".$_SESSION['user_reg']."'");//Query for books added to the cart by this user . 'books.price' to be added later

        while($row = mysqli_fetch_assoc($books)) {//Start a while loop here to display fetch items in this division?>
          <tr>
            <td>
              <?php echo $row['author']." ".$row['title'] ?>
            </td>
            <td>
              <?php echo $row['price']?>
            </td>
            <td>
            	<?php echo "<a href='cart_remove_item.php?category=books&item_id=".urlencode($row["id"])."'><i class='glyphicon glyphicon-remove'></i></a>" ?>
            </td>
          </tr>
        <?php 
        $cart_total = $cart_total + $row['price'];
        } 
        
        $bikes = mysqli_query($conn,"SELECT bikes.id, bikes.brand, bikes.gear, bikes.price FROM bikes INNER JOIN cart ON bikes.id = cart.item_id WHERE item_category = 'bikes' AND is_sold = 0 AND cart.reg = '".$_SESSION['user_reg']."'");//Query for bikes added to the cart by this user . 'bikes.price' to be added later
      
        while($row = mysqli_fetch_assoc($bikes)) {//Start a while loop here to display fetch items in this division?>
          <tr>
            <td>
              <?php
              echo $row['brand']." ".$row['gear'] ?>
            </td>
            <td>
              <?php echo $row['price'] ?>
            </td>
              <td>
              	<?php echo "<a href='cart_remove_item.php?category=bikes&item_id=".urlencode($row["id"])."'><i class='glyphicon glyphicon-remove'></i></a>" ?>
                </td>
          </tr>
        <?php 
        $cart_total = $cart_total + $row['price'];
        }

        $misc = mysqli_query($conn,"SELECT misc.id, misc.name, misc.price FROM misc INNER JOIN cart ON misc.id = cart.item_id WHERE item_category = 'misc' AND is_sold = 0 AND cart.reg = '".$_SESSION['user_reg']."'");//Query for misc added to the cart by this user . 'misc.price' to be added later
      
        while($row = mysqli_fetch_assoc($misc)) {//Start a while loop here to display fetch items in this division?>
          <tr>
            <td>
              <?php echo $row['name'] ?>
            </td>
            <td>
              <?php echo $row['price'] ?>
            </td>
              <td>
              	<?php echo "<a href='cart_remove_item.php?category=misc&item_id=".urlencode($row["id"])."'><i class='glyphicon glyphicon-remove'></i></a>" ?> 
                </td>
          </tr>
        <?php 
        $cart_total = $cart_total + $row['price'];
        }
        ?>
    </tbody>
  </table>
        </div>
          Cart Total :<?php echo $cart_total."<br>"; ?>


          <?php if($cart_total > 0){ ?>

            <div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="submit" class="btn btn-default col-sm-2" id="mybtn" style="border-radius: 10px;margin-left: 40%;"><span class="glyphicon glyphicon-shopping-cart"></span>Checkout</button>

  <!-- Modal -->
  <div role="dialog" data-backdrop="static" data-keyboard="false" id="costumModal5" class="modal" data-easein="flipBounceYIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" style="margin-top: 10%;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="text-center">Confirmation</h2>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          
          <h3>
            FROM THE SERVER
          </h3>

        </div>

        <div class="modal-footer">
          <a href="checkout.php">
            <button type="submit"  class="btn btn-default col-sm-2" id="Conf_btn" style="border-radius: 10px;margin-left: 35%;width: 30%;"><span class="glyphicon glyphicon-shopping-cart"></span> Confirm Order</button>
         </a>
        </div>
      </div>
      
    </div>
  </div> 
</div>

        <?php  } ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="bootstrap-hover-dropdown.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js'></script>
<script src="index.js"></script>

<script>
  $(document).ready(function() {
      $('.js-activated').dropdownHover().dropdown();
    });

  $(document).ready(function(){
    $("#mybtn").click(function(){
        $("#costumModal5").modal();
    });
});

</script>

</body>
</html>
<?php
  }
  ?>
<?php 
  //include ("test_variables.php");
?>