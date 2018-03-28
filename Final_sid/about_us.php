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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="bootstrap-hover-dropdown.js"></script>
<style>
html {
  box-sizing: border-box;
  overflow-x: hidden;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 25%;
  margin-bottom: 16px;
  padding: 0 1.5%;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 1px 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 10px;
}

.container {
  padding: 0 16px;
  margin-top: 5%;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}


</style>
</head>
<body>
  <?php include("nav.php"); ?>
<div class="container">
<h2>Passon Team</h2>
<p>bachche bade ho jao</p>
<br>

<div class="row">
  <div class="column">
    <div class="card">
      <img src="4.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Name1</h2>
        <p class="title">Co-Founder</p>
        <p>any details</p>
        <p>Contact No.</p>
        <p>example@.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="4.jpg" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Name2</h2>
        <p class="title">Co-Founder</p>
        <p>any details</p>
        <p>Contact No.</p>
        <p>example@.com</p>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <img src="4.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>Name3</h2>
        <p class="title">Co-Founder</p>
        <p>any details</p>
        <p>Contact No.</p>
        <p>example@.com</p>
      </div>
    </div>
  </div>
   <div class="column">
    <div class="card">
      <img src="4.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>Name4</h2>
        <p class="title">Co-Founder</p>
        <p>any details</p>
        <p>Contact No.</p>
        <p>example@.com</p>
      </div>
    </div>
  </div>
</div>
</div>


</body>
</html>

<?php
  }
  ?>
<?php 
  //include ("test_variables.php");
?>