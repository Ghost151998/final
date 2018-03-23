<!-- SUBMITS SOLD_ITEMS INTO THE sold_items TABLE TO THE item_category FOR THAT item_id -->
<?php
	session_start();
	include ("dbconfig.php");//Connection to database
	include ("test_variables.php");

	$redirect_to_admin_main = "admin_main.php";//Set this to the page to redirect on verification
	$redirect_to_admin_login = "admin_login.php";

	if(!$_SESSION["admin_code"]){//Login failed. Redirect to admin_login.php
		header("Location: " .$redirect_to_admin_login);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//if (!empty($_POST["price"]) && !empty($_POST["customer"]) && !empty($_POST["category"])){
			mysqli_query($conn,"UPDATE sold_items SET is_delivered = 1 WHERE checkout_id = '".$_POST["checkout_id"]."'");
		//}
		header("Location: ".$redirect_to_admin_main);//Send back to admin_main.php
	}

?>
<?php 
	include ("test_variables.php");
?>