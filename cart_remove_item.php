<!-- Remove Item from Cart -->
<!-- SUGGESTION: CAN SET SNACKBAR TO UNDO DELETE BY SETTING is_deleted = 1; -->
<?php 
	session_start();
	include ("dbconfig.php");//Connection to database
	include ("test_variables.php");

	$redirect_to_cart = "cart.php";
	$redirect_to_user_login = "user_login.php";

	//Test variables
	//$_GET["category"] = "bikes";
	//$_GET["item_id"] = 1;

	//Check if user is logged in
	if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
		header("Location: " .$redirect_to_user_login);
	}
	print_r($_SESSION);

	mysqli_query($conn,"DELETE FROM cart WHERE item_id = '".$_GET["item_id"]."' AND item_category = '".$_GET["category"]."'  AND cart.reg ='".$_SESSION["user_reg"]."'");
	header("Location: ".$redirect_to_cart);
?>
<?php 
	include ("test_variables.php");
?>