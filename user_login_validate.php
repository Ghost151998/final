<?php
/*Validates user login credentials for authorizing to main site*/
	session_start();
	include ("dbconfig.php");//Connection to database
	include ("test_variables.php");
	
	$redirect_to_user_home = "user_home.php";//Set this to the page to redirect on verification
	$redirect_to_user_login = "user_login.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["user_reg"]) && !empty($_POST["user_password"])) {
			$user_reg =  mysqli_real_escape_string($conn, sanitize_input($_POST["user_reg"]));
			$user_password =  mysqli_real_escape_string($conn, sanitize_input($_POST["user_password"]));
			$result = mysqli_query($conn,"SELECT first_name,user_reg FROM users WHERE user_reg = '".$user_reg."' AND user_password ='".$user_password."'");
			//print_r($result);
			if(mysqli_num_rows($result) > 0){ // Refer to main page in this block
				$db_user = mysqli_fetch_object($result);
				$_SESSION["user_reg"] = $db_user->user_reg;
				$_SESSION["user_name"] = $db_user->first_name;
				//echo "<br>Welcome, " . $_SESSION["user_name"];//Comment out this line,only for testing
				header("Location: ".$redirect_to_user_home);
			}
			else{//Die in this,or redirect to login on failure
				//echo "<br>Login Failed";
				$_SESSION  = array();
				header("Location: ".$redirect_to_user_login);//Redirect to Admin Login
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