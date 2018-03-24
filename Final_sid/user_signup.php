<?php 
  include ("session_refresh.php");
  $_SESSION["previous_page"] = $_SERVER["REQUEST_URI"];
  //include ("test_variables.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  

  <!-- for google icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- for animation -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Sign Up</title>

  <style>

  body{
    background:url("4.jpg");
    background-size: cover;
  }

  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white;
      text-align: center;
      font-size: 30px;
  }

  .btn-default {

     border: 0.1px solid grey;
      background: white;
      color: black;
   }
  .btn-default:hover {
      background: #5cb85c;
      color: white;
   }

   #reset:hover{
    background-color: #E74C3C;
    color: white;
   }

   #text{
       margin-right: 15px;
    margin-bottom: 15%;
   }
  

   i{
      margin-right: 15px;
    margin-bottom: 15%;
   }
  
  </style>
</head>
<body>


  <!-- Modal -->
 <div id="costumModal11" class="modal" data-easein="bounceUpIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
  

    <div class="modal-dialog" style="margin: 10vh auto 0px auto;margin-bottom: 5%;">
    
      <!-- Modal content-->
      <div class="modal-content" style="opacity: 0.9;">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><span class="glyphicon glyphicon-lock"></span> Sign Up</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="user_signup_validate.php" method="post">

            <div class="form-group">
              <label for="reg_no"><span class="glyphicon glyphicon-user" id="text"></span>Registration No.</label>
              <input type="text" name="user_reg" class="form-control required reg_no" id="reg_no" placeholder="^20[0-9]{6}$" data-placement="right" data-trigger="manual" data-content="enter valid 8 digit registration number starting with 20">
            </div>


            <div class="form-group">
              <label for="first_name"><span class="glyphicon glyphicon-user" id="text"></span>First Name</label>
              <input type="text" name="user_first_name" class="form-control required first_name" id="first_name" placeholder="^[A-Za-z]{3,30}$" data-placement="right" data-trigger="manual" data-content="first name without space upto 30char max">
            </div>


            <div class="form-group">
              <label for="last_name"><span class="glyphicon glyphicon-user" id="text"></span>Last Name</label>
              <input type="text" name="user_last_name" class="form-control required last_name" id="last_name" placeholder="^[A-Za-z]{3,50}$" data-placement="right" data-trigger="manual" data-content="last name upto 50char max">
            </div>


            <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-envelope"  id="text" text-center" ></span>Email</label>
              <input type="text" name="user_email" class="form-control required email" id="email" placeholder="^[a-zA-z0-9\.\-_]*[@][a-z]*[?'mail']*[\.][a-z]{2,4}$" data-placement="right" data-trigger="manual" data-content="enter in form of abc@xyz.com">
            </div>

            <div class="form-group">
              <label for="phone"><span class="glyphicon glyphicon-earphone" id="text"></span>Mobile No.</label>
              <input type="text" name="user_phone_number" class="form-control required phone" id="phone" placeholder="^[0-9]{10}$" data-placement="right" data-trigger="manual" data-content="enter valid 10digit mobile no">
            </div>

            <div class="form-group">
              <label for="address"><span class="glyphicon glyphicon-home" id="text"></span>Address</label>
              <input type="text" name="user_address" class="form-control required address" id="address" placeholder="^[a-zA-Z0-9\s]{5,200}$" data-placement="right" data-trigger="manual" data-content="enter valid address">
            </div>



            <div class="form-group">
              <label for="pass"><span class="glyphicon glyphicon-eye-open" id="text"></span> Password</label>
              <input type="password" name="user_password" class="form-control required pass" id="pass" placeholder="^[\d\D]{6,20}$" data-placement="right" data-trigger="manual" data-content="must be atleast 6 characters and max 20">
            </div>


            <div class="form-group">
              <label for="pass_retype"><span class="glyphicon glyphicon-eye-open" id="text"></span>Retype Password</label>
              <input type="password" name="user_password_confirm" class="form-control required pass_retype" id="pass_retype" placeholder="^[\d\D]{6,20}$" data-placement="right" data-trigger="manual" data-content="doesn't match with above password">
            </div>


            

            <br>
              
              <button type="submit" value="Login" class="btn btn-default col-sm-4" style="border-radius: 30px;"><span class="glyphicon glyphicon-off"></span>Sign Up</button>
              
<!-- Bug  modal gets closed on reset-->

              <button type="reset" value="Reset" class="btn btn-default col-sm-4 pull-right" id="reset" style="border-radius: 30px;" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> Reset</button>
          </form>
        </div>
        <br>
        <div class="modal-footer">
          
          <p style="font-size: 20px;">Already a member? <a href="user_login.php">Login</a></p>
          
        </div>
      </div>
      
    </div>
  </div> 

 



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"--></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js'></script>
<script src="index.js"></script>
<script src="script.js"></script>

<script>
// for dialoge animation
$(document).ready(function(){
    $(function(){
        $("#costumModal11").modal();
    });
});
</script>


</body>
</html>
<?php 
  //include ("test_variables.php");
?>