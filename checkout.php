<!-- Checkout while placing cart as order -->
<!-- INCOMPLETE -->
<?php 
	session_start();
	include ("dbconfig.php");//Connection to database
	include ("test_variables.php");

	$redirect_to_cart = "cart.php";
	$redirect_to_user_login = "user_login.php";
	$redirect_to_user_home = "user_home.php";

	//Check if user is logged in
	if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
		header("Location: " .$redirect_to_user_login);
	}

	$results = mysqli_query($conn,"SELECT * FROM cart WHERE reg = '".$_SESSION["user_reg"]."' "); //fetch user's cart

	while($row = mysqli_fetch_assoc($results)){
		mysqli_query($conn,"INSERT INTO sold_items (reg, item_id, item_category) VALUES ('".$_SESSION["user_reg"]."','".$row['item_id']."','".$row['item_category']."' ) ");//Insert cart into sold_items.INSERTION OF SELLER REMAINS
		mysqli_query($conn,"DELETE FROM cart WHERE reg = '".$_SESSION["user_reg"]."' AND item_id = '".$row['item_id']."' AND item_category = '".$row['item_category']."' ");//Clear user's cart
		mysqli_query($conn,"UPDATE ".$row['item_category']." SET is_sold = 1 WHERE ".$row['item_category'].".id = ".$row['item_id']." ");//Update is_sold of item in its respective table
	}
	//Send confirmation from this page
	header("Location: ".$redirect_to_user_home);
?>
<?php 
	include ("test_variables.php");
?>