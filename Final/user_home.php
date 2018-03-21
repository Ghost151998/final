<!-- USER HOME -->
<?php 
	session_start();
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

    <style type="text/css">
    
    body{
    position: relative;
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

    .c:hover{
        color: black;
    }
   
    
   

    #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section4 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}

       </style>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="30">
<nav class="navbar  navbar-inverse" data-spy="affix" >
    <div class="container-fluid ">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" data-spy="affix">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand col-sm-1" href="#footer">Logo</a>

      <div class="navbar-collapse  collapse ">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
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
        <li><a href='cart.php'><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
      </ul>

         
      </div> <!-- .nav-collapse -->
    </div> <!-- .container -->
  </nav> <!-- .navbar -->


<div class="test" style="opacity: 0.7">


<div class="jumbotron" id="jumbo">
  <div class="container text-center">
    <h1>Online Store</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>

<br><br>


<div id="section1" class="container">
  <h1>Section 1</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>
<div id="section2" class="container-fluid">
  <h1>Section 2</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>
<div id="section3" class="container-fluid">
  <h1>Section 3</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>
<div id="section4" class="container-fluid">
  <h1>Section 4 Submenu 1</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>
<div id="section42" class="container-fluid">
  <h1>Section 4 Submenu 2</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
</div>






</div>

<br>

<div class="jumbotron" id="footer" style="color: white; background-color: grey;margin-top: 10px;height: 10px;">
  <div class="container text-center">
    <h2 >contact about</h2>      
  </div>
</div>




  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="bootstrap-hover-dropdown.js"></script>

  <script>
    // very simple to use!
    $(document).ready(function() {
      $('.js-activated').dropdownHover().dropdown();
    });
  </script>

</body>
</html>

<?php 
	include ("test_variables.php");
?>