<!-- USER HOME -->
<?php 
	session_start();
	$_SESSION["previous_page"] = $_SERVER["REQUEST_URI"];
	include ("dbconfig.php");//Connection to database
	//include ("test_variables.php");

	$redirect_to_user_login = "user_login.php";

	//Check if user is logged in
	if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
		header("Location: " .$redirect_to_user_login);
	}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" value="width=device-width,intial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="bootstrap-hover-dropdown.js"></script>

  <script>
    // very simple to use!
    $(document).ready(function() {
      $('.js-activated').dropdownHover().dropdown();
    });
  </script>

    <style type="text/css">

    .trans{
    background: rgba(255,255,255,0.5);
    margin-bottom: 5%; 
   }

    #section1 {padding-top:50px;height:40%;color: #fff; background: rgba(227, 67, 33,0.5);}
  #section2 {padding-top:50px;height:40%;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:40%;color: #fff; background-color: #ff9800;}
  #section4 {padding-top:50px;height:40%;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:40%;color: #fff; background-color: #009688;}

   
       </style>

</head>
<body>



<?php include("nav.php"); ?>


<div class="jumbotron trans" style="margin-top: 5%;margin-bottom: 10%; ">
  <div class="container text-center">
    <h1>The PassOn Store</h1>      
    <p>The MNNIT PassOn Portal</p>
  </div>
</div>



<div id="section1" class="container-fluid trans">
  <h1>Section 1</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>
<div id="section2" class="container-fluid trans">
  <h1>Section 2</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>
<div id="section3" class="container-fluid trans">
  <h1>Section 3</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>
<div id="section4" class="container-fluid trans">
  <h1>Section 4 Submenu 1</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>
<div id="section42" class="container-fluid trans">
  <h1>Section 4 Submenu 2</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>

<!-- footer from footer.php common for every page-->
<?php include("footer.php");?>



  





 
</body>
</html>

<?php 
	//include ("test_variables.php");
?>