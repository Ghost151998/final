<?php
/*Submits verified salerequest data to server from admin_main*/
	session_start();
	include ("dbconfig.php");//Connection to database
	include ("test_variables.php");

	$redirect_to_admin_main = "admin_main.php";//Set this to the page to redirect on verification
	$redirect_to_admin_login = "admin_login.php";

	if(!$_SESSION["admin_code"]){//Login failed. Redirect to admin_login.php
		header("Location: " .$redirect_to_admin_login);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["seller"]) && !empty($_POST["category"]) && !empty($_POST["description"]) && !empty($_POST["quality"]) && !empty($_POST["price"])) {

			if($_POST["category"] == "books") {
				if(!empty($_POST["author"]) && !empty($_POST["title"]) && !empty($_POST["edition"]) && !empty($_POST["branch"]) && !empty($_POST["sem"])){
					$category =  mysqli_real_escape_string($conn, sanitize_input($_POST["category"]));
					$author =  mysqli_real_escape_string($conn, sanitize_input($_POST["author"]));
					$title =  mysqli_real_escape_string($conn, sanitize_input($_POST["title"]));
					$edition =  mysqli_real_escape_string($conn, sanitize_input($_POST["edition"]));
					$branch =  mysqli_real_escape_string($conn, sanitize_input($_POST["branch"]));
					$sem =  mysqli_real_escape_string($conn, sanitize_input($_POST["sem"]));
				}
			}

			if($_POST["category"] == "bikes"){
				if(!empty($_POST["brand"]) && !empty($_POST["gear"]) && !empty($_POST["colour"])){
					$category =  mysqli_real_escape_string($conn, sanitize_input($_POST["category"]));
					$brand =  mysqli_real_escape_string($conn, sanitize_input($_POST["brand"]));
					$gear =  mysqli_real_escape_string($conn, sanitize_input($_POST["gear"]));
					$colour =  mysqli_real_escape_string($conn, sanitize_input($_POST["colour"]));
				}
			}

			if($_POST["category"] == "misc"){
				if(!empty($_POST["author"]) && !empty($_POST["branch"]) && !empty($_POST["sem"])){
					$category =  mysqli_real_escape_string($conn, sanitize_input($_POST["category"]));
					$author =  mysqli_real_escape_string($conn, sanitize_input($_POST["author"]));
					$branch =  mysqli_real_escape_string($conn, sanitize_input($_POST["branch"]));
					$sem =  mysqli_real_escape_string($conn, sanitize_input($_POST["sem"]));
				}
			}

			//Common inputs for all
			$seller =  mysqli_real_escape_string($conn, sanitize_input($_POST["seller"]));
			$description =  mysqli_real_escape_string($conn, sanitize_input($_POST["description"]));
			$quality =  mysqli_real_escape_string($conn, sanitize_input($_POST["quality"]));
			$price =  mysqli_real_escape_string($conn, sanitize_input($_POST["price"]));

			if($category == "books"){ //Update the books table with this value
				$result = mysqli_query($conn,"INSERT INTO books (author,title,edition,seller,branch,sem,description,quality,price) VALUES ('".$author."','".$title."','".$edition."','".$seller."','".$branch."','".$sem."','".$description."','".$quality."','".$price."')");

				$new_id = mysqli_query($conn,"SELECT LAST_INSERT_ID() AS last_id");
				$new_img_id = mysqli_fetch_object($new_id);

				$old_id = mysqli_query($conn,"SELECT id FROM salerequest WHERE category = 'books' AND seller = '".$seller."' AND author = '".$author."' AND title = '".$title."' AND edition = '".$edition."' AND branch = '".$branch."' AND sem = '".$sem."' AND description = '".$description."' AND quality = '".$quality."' AND price = '".$price."'");//Fetch the id of the above entry
				$old_img_id = mysqli_fetch_object($old_id);

				mysqli_query($conn,"UPDATE salerequest SET deleted = '1' WHERE id ='".$old_img_id->id."'"); //Set deleted = true for the verified book in salerequest
			}

			//UPDATE QUERY FOR Bikes
			if($_POST["category"] == "bikes"){ //Update the bikes table with this value
				$result = mysqli_query($conn,"INSERT INTO bikes (brand,seller,gear,colour,description,quality) VALUES ('".$brand."','".$seller."','".$gear."','".$colour."','".$description."','".$quality."')");

				$new_id = mysqli_query($conn,"SELECT LAST_INSERT_ID() AS last_id");
				$new_img_id = mysqli_fetch_object($new_id);

				$old_id = mysqli_query($conn,"SELECT id FROM salerequest WHERE seller = '".$seller."' AND brand = '".$brand."' AND gear = '".$gear."' AND colour = '".$colour." AND description = '".$description."' AND quality = '".$quality."' AND price = '".$price."'");//Fetch the id of the above entry
				$old_img_id = mysqli_fetch_object($old_id);

				mysqli_query($conn,"UPDATE salerequest SET deleted = '1' WHERE id ='".$old_img_id->id."'"); //Set deleted = true for the verified book in salerequest
			}

			//UPDATE QUERY FOR MISC
			if($_POST["category"] == "misc"){ //Update the misc table with this value
				$result = mysqli_query($conn,"INSERT INTO misc (name,seller,description,quality,price) VALUES ('".$name."','".$seller."','".$description."','".$quality."','".$price."')");

				$new_id = mysqli_query($conn,"SELECT LAST_INSERT_ID() AS last_id");
				$new_img_id = mysqli_fetch_object($new_id);

				$old_id = mysqli_query($conn,"SELECT id FROM salerequest WHERE seller = '".$seller."' AND name = '".$name."' AND description = '".$description."' AND quality = '".$quality." AND price = '".$price."'");//Fetch the id of the above entry
				$old_img_id = mysqli_fetch_object($old_id);

				mysqli_query($conn,"UPDATE salerequest SET deleted = '1' WHERE id ='".$old_img_id->id."'"); //Set deleted = true for the verified book in salerequest
			}
			//print_r($result);
			
			//IMAGE REDIRECTION
			$old_img_path = "images/salereq/salereq_".$old_img_id->id;
			$old_img_src = $old_img_path.".*";
			$result = glob($old_img_src);
			$extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
			$old_img_path .= (".".$extension);

			$new_img_path = "images/".$_POST["category"]."/".$_POST["category"]."_".$new_img_id->last_id;
			$new_img_src = $new_img_path.".*";
			$result = glob($old_img_src);
			$extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
			$new_img_path .= (".".$extension);
			
			rename($old_img_path,$new_img_path);
			
			header("Location: ".$redirect_to_admin_main);//Send back to admin_main.php
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