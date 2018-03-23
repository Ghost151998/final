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

    th,td{
      color: black;
      font-size: 20px;
    }

    .btn-default {
      border: 0.1px solid grey;
      background: white;
      color: black;
      margin-left: 30%;
      margin-top: 20px;
      padding-bottom: 25px;    
   }

   .glyphicon-remove{
    color: red;
    font-size: 20px;
   }
   .glyphicon-remove:hover{
    opacity: 0.6;
   }

  .btn-default:hover {
     background: green;
      color: white;
   }

   
    
    
</style>

</head>

<body>
  <?php include("nav.php"); ?>

<br>

  <div class="jumbotron" style="opacity: 0.5;">
  <div class="container text-center">
    <h1 class="text-left">Your Cart</h1>      
  </div>
</div>



<div class="container" >
  <div class="table-responsive table-hover text-centered col-sm-10" style="background-color: white;opacity: 0.7;margin-top: 50px;min-height: 0;" >                                                                                    
  <table class="table">
    <thead>
      <tr>
        <th class="text-center col-sm-3">Item</th>
        <th class="text-center col-sm-4 offset4">Price</th>
        <th class="text-center col-sm-1"></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $books = mysqli_query($conn,"SELECT books.id, books.author, books.title, books.price FROM books INNER JOIN cart ON books.id = cart.item_id WHERE item_category = 'books' AND is_sold = 0 AND cart.reg = '".$_SESSION['user_reg']."'");//Query for books added to the cart by this user . 'books.price' to be added later

        while($row = mysqli_fetch_assoc($books)) {//Start a while loop here to display fetch items in this division?>
          <tr class="text-center">
            <td class="pull-left">
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
          <tr class="text-center">
            <td class="pull-left">
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
          <tr class="text-center">
            <td class="pull-left">
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
  <br>
</div>
<span class="col-sm-7 pull-right" style="color: white;font-weight: bold;font-size: 35px;">Cart Total <?php echo $cart_total; ?></span>
</div><br><br><br>
          

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