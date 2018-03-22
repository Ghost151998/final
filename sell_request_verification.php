<?php
/*Validates item details form from the seller page to queue for authentication from admins*/
	session_start();
	include ("dbconfig.php");//Connection to database
	include ("test_variables.php");

	$redirect_to_user_login = "user_login.php";

	//Check if user is logged in
	if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
		header("Location: " .$redirect_to_user_login);
	}

	else{
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if (!empty($_POST["category"])){//Category is chosen
				if($_POST["category"] == "books"){// If category is books
					$book_author =  mysqli_real_escape_string($conn, sanitize_input($_POST["book_author"]));
					$book_title =  mysqli_real_escape_string($conn, sanitize_input($_POST["book_title"]));
					$book_edition =  mysqli_real_escape_string($conn, sanitize_input($_POST["book_edition"]));
					$book_branch =  mysqli_real_escape_string($conn, sanitize_input($_POST["book_branch"]));
					$book_sem =  mysqli_real_escape_string($conn, sanitize_input($_POST["book_sem"]));
				}

				else if($_POST["category"] == "bikes"){//If category is bikes
					$bike_brand = mysqli_real_escape_string($conn, sanitize_input($_POST["bike_brand"]));
					$bike_gear = mysqli_real_escape_string($conn, sanitize_input($_POST["bike_gear"]));
					$bike_colour = mysqli_real_escape_string($conn, sanitize_input($_POST["bike_colour"]));
				}

				else if($_POST["category"] == "misc"){//If category is misc
					$misc_name = mysqli_real_escape_string($conn, sanitize_input($_POST["misc_name"]));
				}

				//These fields are common for all categories
				$description =  mysqli_real_escape_string($conn, sanitize_input($_POST["description"]));
				$quality =  mysqli_real_escape_string($conn, sanitize_input($_POST["quality"]));
				$price =  mysqli_real_escape_string($conn, sanitize_input($_POST["price"]));

				//QUERY FOR QUEUEING OF BOOKS
				if($_POST["category"] == "books"){
					$result = mysqli_query($conn,"INSERT INTO salerequest (seller,category,author,title,edition,branch,sem,description,quality,price) VALUES ('".$_SESSION["user_reg"]."','".$_POST["category"]."','".$book_author."','".$book_title."','".$book_edition."','".$book_branch."','".$book_sem."','".$description."','".$quality."','".$price."')");
				}

				//QUERY FOR QUEUEING OF BIKES
				if($_POST["category"] == "bikes"){
					$result = mysqli_query($conn,"INSERT INTO salerequest (seller,category,brand,gear,colour,description,quality,price) VALUES ('".$_SESSION["user_reg"]."','".$_POST["category"]."','".$bike_brand."','".$bike_gear."','".$bike_colour."','".$description."','".$quality."','".$price."')");
				}

				//QUERY FOR QUEUEING OF MISC
				if($_POST["category"] == "misc"){
					$result = mysqli_query($conn,"INSERT INTO salerequest (seller,category,name,description,quality,price) VALUES ('".$_SESSION["user_reg"]."','".$_POST["category"]."','".$misc_name."','".$description."','".$quality."','".$price."')");
				}
				
				$image_id_query = mysqli_query($conn,"SELECT LAST_INSERT_ID() AS last_id");
				//$image_id_query = mysqli_query($conn,"SELECT MAX(id) AS salerequest_max FROM salerequest");
				//print_r($image_id_query);
				//echo "<br>";
				$img_id = mysqli_fetch_object($image_id_query);
				//print_r($img_id);
				//IMAGE UPLOAD START
				
				$file_name = "salereq_".$img_id->last_id;
				$target_dir = "images/salereq/";
				$uploadOk = 0;

				$allowed = array("png","jpg","jpeg");
				//Check if image is not fake
				$imageFileType = strtolower(pathinfo($_FILES['item_image']['name'],PATHINFO_EXTENSION));
				$target_file = $target_dir.$file_name.".".$imageFileType;
				//echo $imageFileType."<br>";
				if(in_array($imageFileType,$allowed)){
					$check = getimagesize($_FILES['item_image']['tmp_name']);
					//print_r($check);
					if($check !== false){
						//echo "File is an image - ".$check["mime"].".<br>";
						$uploadOk = 1;
					}
					else{
						//echo "File is not an image.<br>";
						$uploadOk = 0;
					}
					//Check if image is exceeding 1MB
					if ($_FILES["item_image"]["size"] > 1048576) {
						//echo "Sorry, your file is too large.<br>";
						$uploadOk = 0;
					}

					if ($uploadOk == 0) {
					//echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
					}

					else{
						if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
							//rename('images/books3.jpg','images/salereq/books3.jpg');
							//echo "<br>";
							//$img_path = "images/salereq/salereq_".$img_id->last_id;

							echo "File uploaded successfully<br>";
							//echo "The file ".basename($_FILES["item_image"]["name"])." has been uploaded.";
						} else {
							//echo "Sorry, there was an error uploading your file.";
						}
					}
					//echo "<br>Extension is Ok!<br>";
				}	
				//END IMAGE UPLOAD

				echo "<br>Entry submitted for admin verification.<br><br>Thank You!<br>";
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