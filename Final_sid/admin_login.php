<?php 
  include ("session_refresh.php");
  $_SESSION["previous_page"] = $_SERVER["REQUEST_URI"];
  //include ("test_variables.php");
?>
<!-- Admin Login Page -->
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
  
  <!-- for animation -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Admin Login</title>

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
      margin-top: 20px;
      

      
   }
  .btn-default:hover {
     background: #5cb85c;
      color: white;
   }

  
   #text{
     margin-right: 15px;
    margin-bottom: 20%;
    margin-top: 10%;
   }
  
  </style>
</head>
<body>


  <!-- Modal -->
 <div id="costumModal11" class="modal" data-easein="bounceUpIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
  

    <div class="modal-dialog" style="margin: 12vh auto 0px auto;">
    
      <!-- Modal content-->
      <div class="modal-content" style="opacity: 0.9;">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><span class="glyphicon glyphicon-lock"></span>Admin Login</h4>
        </div>
        <div class="modal-body" style="padding:10% 5% 0;">


          <form role="form" action="admin_validate.php" method="post">
            <div class="form-group">
              <label for="admin_code"><span class="glyphicon glyphicon-user" id="text"></span>Admin Code</label>
              <input name="admin_code" type="text" class="form-control required admin_code" id="admin_code" placeholder="Registration No" data-placement="right" data-trigger="manual" data-content="Invalid code max 10">
            </div>


            <div class="form-group">
              <label for="pass"><span class="glyphicon glyphicon-eye-open" id="text"></span> Password</label>
              <input name="admin_password" type="Password" class="form-control required pass" id="pass" placeholder="Enter password" data-placement="right" data-trigger="manual" data-content=" max 15">
            </div>
            <br>
            
            <div class="modal-footer" style="height: 0;" >             

              <div class="row-fluid" >
               <button type="submit" value="Login" class="btn btn-default col-sm-4 offset4"  style="border-radius: 10px;"><span class="glyphicon glyphicon-off"></span>Login</button>
             </div>
           </div>

          </form>
        </div>
        <br><br><br><br>     
      
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
