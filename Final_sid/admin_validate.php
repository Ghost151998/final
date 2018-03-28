<?php
/*Validates admin login credentials for authorizing to admin_page*/
	include ("session_refresh.php");
	include ("dbconfig.php");//Connection to database
	include ("test_variables.php");

	//$_SESSION  = array();//To clear session data
	$redirect_to_admin_main = "admin_main.php";//Set this to the page to redirect on verification
	$redirect_to_admin_login = "admin_login.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["admin_code"]) && !empty($_POST["admin_password"])) {
			$admin_code =  mysqli_real_escape_string($conn, sanitize_input($_POST["admin_code"]));
			$admin_password =  mysqli_real_escape_string($conn, sanitize_input($_POST["admin_password"]));
			$result = mysqli_query($conn,"SELECT admin_code,admin_name FROM admins WHERE admin_code = '".$admin_code."' AND admin_password ='".$admin_password."'");
			//print_r($result);
			if(mysqli_num_rows($result) > 0){// Execute admin_page in this block,set $_SESSION["admin_login"] = true;
				$admin_object = mysqli_fetch_object($result);
				$_SESSION["admin_code"] = $admin_object->admin_code;
				$_SESSION["admin_name"] = $admin_object->admin_name;
				//echo "Welcome,<br>" . $admin_name;//Comment out this line,only for testing
				header("Location: ".$redirect_to_admin_main);
			}
			else{//Die in this,or redirect to login
				//echo "<br>Login Failed";
				$_SESSION  = array();
				header("Location: ".$redirect_to_admin_login);//Redirect to Admin Login
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