<?php
/*Verifies Sign-in data and updates DB if no clashes.Takes to main page with set SESSION variables on success and to user_signup.php otherwise...Also overload back button in js*/
	session_start();
	include ("dbconfig.php");//Connection to database
	include ("test_variables.php");
	$redirect_to_user_home = "user_home.php";//Set this to the main page
	$redirect_to_user_signup = "user_signup.php";

	//ALL FORMAT CHECKS ARE PERFORMED BEFORE SENDING THE DATA TO THE SERVER. ONLY CHECK FOR EXISTING DB VALUES HERE.
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (!empty($_POST["user_reg"]) && !empty($_POST["user_first_name"] && !empty($_POST["user_last_name"]) && !empty($_POST["user_email"]) && !empty($_POST["user_phone_number"]) && !empty($_POST["user_address"]) && !empty($_POST["user_password"]) )) {

			$user_reg =  mysqli_real_escape_string($conn, sanitize_input($_POST["user_reg"]));
			$user_first_name =  mysqli_real_escape_string($conn, sanitize_input($_POST["user_first_name"]));
			$user_last_name =  mysqli_real_escape_string($conn, sanitize_input($_POST["user_last_name"]));
			$user_email =  mysqli_real_escape_string($conn, sanitize_input($_POST["user_email"]));
			$user_phone_number =  mysqli_real_escape_string($conn, sanitize_input($_POST["user_phone_number"]));
			$user_address =  mysqli_real_escape_string($conn, sanitize_input($_POST["user_address"]));
			$user_password =  mysqli_real_escape_string($conn, sanitize_input($_POST["user_password"]));

			// QUERY TO CHECK FOR EXISTING VALUES IN DB
			$result = mysqli_query($conn,"SELECT user_reg FROM users WHERE user_reg = '".$user_reg."'");

			//print_r($result);
			
			if(mysqli_num_rows($result) == 0){ // No matches found. Safe to place these values in DB
				
				// QUERY TO UPDATE THE DATABASE WITH VALUES TAKEN FROM FORM
				$result = mysqli_query($conn,"INSERT INTO users (user_reg,first_name,last_name,email,phone_number,address,user_password) VALUES ('".$user_reg."','".$user_first_name."','".$user_last_name."','".$user_email."','".$user_phone_number."','".$user_address."','".$user_password."')");

				$_SESSION["user_reg"] = $user_reg;
				$_SESSION["user_name"] = $user_first_name;
				//echo "<br>Successfully signed up, " . $_SESSION["user_name"];//Comment out this line,only for testing
				header("Location: ".$redirect_to_user_home);//redirect to main page
			}

			else{// Values already exist. WHAT TO DO?session must close.Alert must be generated.
				$_SESSION  = array();
				header("Location: ".$redirect_to_user_signup);//Redirect to Admin Login
			}
		}
	}

	function sanitize_input($data) {//sanitizing input
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>
<?php 
	include ("test_variables.php");
?>