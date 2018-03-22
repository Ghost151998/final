<!-- Item Description Page.Remember to give the div this category.No images added as of yet. Buy button to be added later if required. Give classes for formatting. Add to cart button will redirect to cart while adding the product and updating the db.-->

<?php
	session_start();
	include ("dbconfig.php");//Connection to database
	//include ("test_variables.php");

	$redirect_to_user_login = "user_login.php";

	//Check if user is logged in
	if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
		header("Location: " .$redirect_to_user_login);
	}

	else { ?>

			<!DOCTYPE html>
			<html>
				<head>
					<title>Item Description</title>
					<h3>Item Description</h3>
				</head>
				<body>
<?php

	if($_GET["category"] == "books"){//Remove this after task: sending request from books_list page

		//Set this information on all books,bikes,and misc description pages since this will help form submission to cart
		//Test inputs
		//$_GET["category"] = "books";
		//$_GET["item_id"] = 1;//Insert the id received from the page click of the item on the books list

		$results = mysqli_query($conn,"SELECT * FROM books WHERE id = '".$_GET["item_id"]."' AND is_sold = 0 ");//Take the info of item from database
		//print_r($results);
		echo "<br>";
		$row = mysqli_fetch_object($results); ?> <!-- take all entries from table and fill them in html -->

				Author:<?php echo $row->author; ?><br>
				Title:<?php echo $row->title; ?><br>
				Edition:<?php echo $row->edition; ?><br>
				<?php if($row->branch){ ?>
					Branch:<?php echo $row->branch; ?><br>
					Semester:<?php 
					if($row->sem == 1){
						echo "1st Year";
					}
					else{
						echo $row->sem;
					} ?><br>
				<?php } ?>
				Description:<?php echo $row->description; ?><br>
				Quality:<?php echo $row->quality; ?><br>
				Price:<?php echo $row->price; ?><br>

				<?php
					$img_path = "images/books/books_".$row->id;
					$img_src = $img_path.".*";
					$result = glob($img_src);
					$extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
					$img_path .= (".".$extension);
				 ?>
				 Image:
				<td><image src="<?php echo $img_path?>" name="item_image" height="200" width="320" required></td>

				<?php echo "<a href='cart_add_item.php?category=".$_GET["category"]."&item_id=".$row->id."'>Add to Cart</a>" ?>
					<!--name+= _book_'.<?phpecho $row->id ?>.' -->
				</form>
				</body>
			</html>
	<?php 
	}//Books close
	?>
<?php
	if($_GET["category"] == "bikes"){//Remove this after task: sending request from bikes_list page

		//Set this information on all books,bikes,and misc description pages since this will help form submission to cart
		//$_GET["category"] = "bikes";
		//$_GET["item_id"] = $_GET["item_id"];

		$results = mysqli_query($conn,"SELECT * FROM bikes WHERE id = '".$_GET["item_id"]."' AND is_sold = 0 ");//Take the info of item from database
		//print_r($results);
		echo "<br>";
		$row = mysqli_fetch_object($results); ?> <!-- take all entries from table and fill them in html -->

				Brand:<?php echo $row->brand; ?><br>
				Gear:<?php echo $row->gear; ?><br>
				Colour:<?php echo $row->colour; ?><br>
				Description:<?php echo $row->description; ?><br>
				Quality:<?php echo $row->quality; ?><br>
				Price:<?php echo $row->price; ?><br>

				<?php
					$img_path = "images/bikes/bikes_".$row->id;
					$img_src = $img_path.".*";
					$result = glob($img_src);
					$extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
					$img_path .= (".".$extension);
				 ?>
				 Image:
				<td><image src="<?php echo $img_path?>" name="item_image" height="200" width="320" required></td>

				<?php echo "<a href='cart_add_item.php?category=".$_GET["category"]."&item_id=".$row->id."'>Add to Cart</a>" ?>
					<!--name+= _book_'.<?phpecho $row->id ?>.' -->
				</form>
				</body>
			</html>
	<?php 
	}//Bikes
	?>
<?php
	if($_GET["category"] == "misc"){//Remove this after task: sending request from misc_list page

		//Set this information on all books,bikes,and misc description pages since this will help form submission to cart
		//$_GET["category"] = "misc";
		//$_GET["item_id"] = $_GET["item_id"];
		
		$results = mysqli_query($conn,"SELECT * FROM misc WHERE id = '".$_GET["item_id"]."' AND is_sold = 0 ");//Take the info of item from database
		//print_r($results);
		echo "<br>";
		$row = mysqli_fetch_object($results); ?> <!-- take all entries from table and fill them in html -->

				Name:<?php echo $row->name; ?><br>
				Description:<?php echo $row->description; ?><br>
				Quality:<?php echo $row->quality; ?><br>
				Price:<?php echo $row->price; ?><br>

				<?php
					$img_path = "images/misc/misc_".$row->id;
					$img_src = $img_path.".*";
					$result = glob($img_src);
					$extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
					$img_path .= (".".$extension);
				 ?>
				 Image:
				<td><image src="<?php echo $img_path?>" name="item_image" height="200" width="320" required></td>

				<?php echo "<a href='cart_add_item.php?category=".$_GET["category"]."&item_id=".$row->id."'>Add to Cart</a>" ?>
					<!--name+= _book_'.<?phpecho $row->id ?>.' -->
				</form>
				</body>
			</html>
	<?php 
	}//Misc
	?>

<?php 
}
?>
<?php 
	//include ("test_variables.php");
?>