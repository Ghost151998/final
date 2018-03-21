<?php 
	include ("session_refresh.php");
	//include ("test_variables.php");
?>
<!-- User Login Page -->
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
 

  <!-- for animation -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Login</title>


  <style>

  body{
    background:url("4.jpg");
    background-size: cover;
    overflow: scroll;
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

    

    #text{
       margin-right: 15px;
    margin-bottom: 15%;
    }

  
  </style>
</head>
<body>


  <!-- Modal -->
 <div id="costumModal11" class="modal" data-easein="bounceUpIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false" ">
  

    <div class="modal-dialog" style="margin: 12vh auto 0px auto;">
    
      <!-- Modal content-->
      <div class="modal-content" style="opacity: 0.9;">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="user_login_validate.php" method="post">
            <div class="form-group">
              <label for="reg_no"><span class="glyphicon glyphicon-user" id="text"></span>Registration No.</label>
              <input name="user_reg" type="text" class="form-control required reg_no" id="reg_no" placeholder="^20[0-9]{6}$" data-placement="right" data-trigger="manual" data-content="enter valid 8 digit registration number starting with 20">
            </div>


            <div class="form-group">
              <label for="pass"><span class="glyphicon glyphicon-eye-open" id="text"></span> Password</label>
              <input name="user_password" type="password" class="form-control required pass" id="pass" placeholder="^[\d\D]{6,20}$" data-placement="right" data-trigger="manual" data-content="must be atleast 6 characters and max 20">
            </div>

            
                          
          
        </div>
        
        <div class="modal-footer" style="height: 8%;">
          <div class="row-fluid" >
                <button value="Login" type="submit" class="btn btn-default col-sm-4 offset4" style="border-radius: 30px;"><span class="glyphicon glyphicon-off"></span> Login</button>
              </div>
              <br>
          <p  style="font-size: 20px;">Not a member? <a href="user_signup.php">Sign Up</a></p>
          
        </div>
      </form>
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
