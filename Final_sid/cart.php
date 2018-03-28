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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="bootstrap-hover-dropdown.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js'></script>
  
  <link rel="stylesheet" type="text/css" href="snackbar.css">

<style >
    body{
      background-color: #ffffff;
    }
    
    .btn-default {
      border: 0.1px solid grey;
      background: white;
      color: black;
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
   .trans{
    background: rgba(208, 211, 212,0.5);
   }  


   .table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
    }
    @media screen and (max-width: 600px) {
    #cart tbody td .form-control{
    width:20%;
    display: inline !important;
  }
  .actions .btn{
    width:36%;
    margin:1.5em 0;
  }
  
  .actions .btn-info{
    float:left;
  }
  .actions .btn-danger{
    float:right;
  }
  
  #cart thead { display: none; }
  #cart tbody td { display: block; padding: .6rem; min-width:320px;}
  #cart tbody tr td:first-child { background: #333; color: #fff; }
  #cart tbody td:before {
    content: attr(data-th); font-weight: bold;
    display: inline-block; width: 8rem;
  }
    
  #cart tfoot td{display:block; }
  #cart tfoot td .btn{display:block;} 
} 


</style>
 <script  src="snackbar.js"></script>
</head>

<body>
  <?php include("nav.php"); ?>

  <div class="jumbotron trans" style="margin-top: 3%;height: 15%;" >
  <div class="container text-center" >
    <span class="pull-left" style="font-size: 40px;" >Your Cart</span>      
  </div>
</div>



<div class="container" >                                                                                  
  <table class="table table-hover table-condensed" id="cart">
    <thead>
      <tr>
        <th style="width:40%">Product</th>
        <th style="width:20%" class="text-center">Price</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $books = mysqli_query($conn,"SELECT books.id, books.author, books.title, books.price FROM books INNER JOIN cart ON books.id = cart.item_id WHERE item_category = 'books' AND is_sold = 0 AND cart.reg = '".$_SESSION['user_reg']."'");//Query for books added to the cart by this user . 'books.price' to be added later

        while($row = mysqli_fetch_assoc($books)) {//Start a while loop here to display fetch items in this division?>
          <tr>
            <td data-th="Product">
              <div class="row">
                  <div class="col-sm-10">
                    <?php echo $row['author']." ".$row['title'] ?>
                  </div>
              </div>
            </td>           
            <td data-th="Price" class="text-center">
              <?php echo $row['price']?>           	
            </td>
            <td data-th="">
                <?php echo "<a href='cart_remove_item.php?category=books&item_id=".urlencode($row["id"])."'><i class='glyphicon glyphicon-remove'></i></a>" ?>
            </td>
          </tr>
        <?php 
        $cart_total = $cart_total + $row['price'];
        } 
        
        $bikes = mysqli_query($conn,"SELECT bikes.id, bikes.brand, bikes.gear, bikes.price FROM bikes INNER JOIN cart ON bikes.id = cart.item_id WHERE item_category = 'bikes' AND is_sold = 0 AND cart.reg = '".$_SESSION['user_reg']."'");//Query for bikes added to the cart by this user . 'bikes.price' to be added later
      
        while($row = mysqli_fetch_assoc($bikes)) {//Start a while loop here to display fetch items in this division?>
          <tr>
            <td data-th="Product">
              <div class="row">
                  <div class="col-sm-10">
                    <?php echo $row['brand']." ".$row['gear'] ?>
                  </div>
              </div>             
            </td>

            <td data-th="Price" class="text-center">
              <?php echo $row['price'] ?>
            </td>
              <td data-th="">
              	<?php echo "<a href='cart_remove_item.php?category=bikes&item_id=".urlencode($row["id"])."'><i class='glyphicon glyphicon-remove'></i></a>" ?>
                </td>
          </tr>
        <?php 
        $cart_total = $cart_total + $row['price'];
        }

        $misc = mysqli_query($conn,"SELECT misc.id, misc.name, misc.price FROM misc INNER JOIN cart ON misc.id = cart.item_id WHERE item_category = 'misc' AND is_sold = 0 AND cart.reg = '".$_SESSION['user_reg']."'");//Query for misc added to the cart by this user . 'misc.price' to be added later
      
        while($row = mysqli_fetch_assoc($misc)) {//Start a while loop here to display fetch items in this division?>
          <tr>
            <td data-th="Product" >
              <div class="row">
                  <div class="col-sm-10">
                    <?php echo $row['name'] ?>
                  </div>
              </div>              
            </td>
            <td data-th="Price" class="text-center">
              <?php echo $row['price'] ?>
            </td>
            <td data-th="">
              	<?php echo "<a href='cart_remove_item.php?category=misc&item_id=".urlencode($row["id"])."'><i class='glyphicon glyphicon-remove'></i></a>" ?> 
            </td>
          </tr>
        <?php 
        $cart_total = $cart_total + $row['price'];
        }
        ?>
    </tbody>

    <tfoot>           
            <tr>
              <td colspan="1"></td>
              <td ><strong style="margin-left: 22%;">Cart Total <?php echo $cart_total; ?></strong></td>
              <td></td>
            </tr>
          </tfoot>

  </table>
</div>
          

          <?php if($cart_total > 0){ ?>



  <div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="submit" class="btn btn-default col-sm-3 col-sm-offset-4" id="mybtn" style="border-radius: 10px;margin-top: 10%;"><span class="glyphicon glyphicon-shopping-cart"></span>Checkout</button>

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

        <div class="modal-footer" >
          <a href="checkout.php">
            <button type="submit"  onclick="display_snackbar()" class="btn btn-default col-sm-4 col-sm-offset-4" id="Conf_btn" style="border-radius: 10px"><span class="glyphicon glyphicon-shopping-cart"></span> Confirm Order</button>           
         </a>
        </div>
      </div>
      
    </div>
  </div> 
  <div id="snackbar"></div>
</div>

        <?php  } ?>

        <?php include("footer.php");?>

<script src="index.js"></script>
<script>  
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