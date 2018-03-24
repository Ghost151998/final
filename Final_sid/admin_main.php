<!-- Admin Main Page -->
<?php
	session_start();
	include ("dbconfig.php");
	//include ("test_variables.php");

	$redirect_to_admin_login = "admin_login.php";

	if(!$_SESSION["admin_code"]){ //Admin not logged in.Redirect to login
		$_SESSION = array();
		header("Location: ".$redirect_to_admin_login);
	}
	else{ // Logged in. Display editable table
		?>

		<!DOCTYPE html>
		<html>
			<head>
				<title>Admin Main Page</title>
			</head>
			<body>
				<h3>Admin Main Page</h3>
				<?php echo "Welcome,".$_SESSION["admin_name"]."<br>"?>
				<a href="admin_login.php">Logout</a><br>
					<!-- Use php code to query and populate a table with verification checkboxes and update DB accordingly on submit -->
				<h5>Change the incorrect details!!!</h5>
				<h3>Queued items for verification</h3>
				<br>
				<table>
					<thead>
						<tr>
							<td>Verified?</td>
							<td>Seller</td>
							<td>Category</td>
							<td>Author</td>
							<td>Ttile</td>
							<td>Edition</td>
							<td>Branch</td>
							<td>Semester</td>
							<td>Brand</td>
							<td>Gear</td>
							<td>Colour</td>
							<td>Name</td>
							<td>Description</td>
							<td>Quality</td>
							<td>Price</td>
							<td>Image</td>

						</tr>
					</thead>
					<tbody>
						<?php
							$results = mysqli_query($conn,"SELECT * FROM salerequest WHERE deleted = 0");

							while($row = mysqli_fetch_assoc($results)){ ?>
								<form action="auth_salereq_admin_page.php" method="post">
									<tr>
										<td><input type="submit" name="confirm_check" value="Confirm"></td>

										<td><input type="text" name="seller" value="<?php echo $row['seller']?>" required></td>
										<td><input type="text" name="category" value="<?php echo $row['category']?>" required></td>

										<!-- Books -->
										<td><input type="text" name="author" value="<?php echo $row['author']?>" required></td>
										<td><input type="text" name="title" value="<?php echo $row['title']?>" required></td>
										<td><input type="text" name="edition" value="<?php echo $row['edition']?>" required></td>
										<td><input type="text" name="branch" value="<?php echo $row['branch']?>" required></td>
										<td><input type="text" name="sem" value="<?php echo $row['sem']?>" required></td>
										<!-- If time permits,change these to datalist -->
										<!-- Bikes -->
										<td><input type="text" name="brand" value="<?php echo $row['brand']?>" required></td>
										<td><input type="text" name="gear" value="<?php echo $row['gear']?>" required></td>
										<td><input type="text" name="colour" value="<?php echo $row['colour']?>" required></td>
										<!-- Misc -->
										<td><input type="text" name="name" value="<?php echo $row['name']?>" required></td>

										<td><input type="text" name="description" value="<?php echo $row['description']?>" required></td>
										<td><input type="text" name="quality" value="<?php echo $row['quality']?>" required></td>
										<td><input type="text" name="price" value="<?php echo $row['price']?>" required></td>

										<?php
											$img_path = "images/salereq/salereq_".$row['id'];
											$img_src = $img_path.".*";
											$result = glob($img_src);
											//print_r($result);
											$extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
											$img_path .= (".".$extension);
										 ?>
										<td><image src="<?php echo $img_path?>" name="item_image" height="200" width="320" required></td>
										<!-- This is where a checkbox for decline will go-->
									</tr>
								</form>
							<?php 
							}
						?>
					</tbody>
				</table>

					<?php
						$results = mysqli_query($conn,"SELECT * FROM sold_items INNER JOIN books ON sold_items.item_id = books.id WHERE is_delivered = 0");//Query for undelivered books
						//if empty,don't display
						if(mysqli_num_rows($results) > 0){?><!-- if results are present -->
							<h3>Queued Books for Delivery</h3>
				<br>
				<table>
					<thead>
						<tr>
							<td>Delivered?</td>
							<td>Price</td>
							<td>Customer</td>
							<td>Author</td>
							<td>Edition</td>
							<!-- <td>Seller</td> -->
						</tr>
					</thead>
					<tbody>
						<?php 
					}
					while($row = mysqli_fetch_assoc($results)){ ?>
						<form action="auth_sold_items_admin_page.php" method="post">
							<tr>
								<td><input type="submit" name="confirm_check" value="Delivered"></td>
								<td><input type="text" name="price" value="<?php echo $row['price']?>" disabled required></td>
								<td><input type="text" name="customer" value="<?php echo $row['reg']?>" disabled required></td>
								<td><input type="text" name="author" value="<?php echo $row['author']?>" disabled required></td>
								<td><input type="text" name="edition" value="<?php echo $row['edition']?>" disabled required></td>

								<!-- <td><input type="text" name="seller_id" value="<?php echo $row['seller_id']?>" required></td> -->
								<td><input type="text" name="category" value="books" hidden required></td>
								<td><input type="text" name="checkout_id" value="<?php echo $row['checkout_id']?>" hidden required></td>
							</tr>
						</form>
					<?php 
					}
				?>
					</tbody>
				</table>


				<?php
						$results = mysqli_query($conn,"SELECT * FROM sold_items INNER JOIN bikes ON sold_items.item_id = bikes.id WHERE is_delivered = 0");//Query for undelivered books
						//Condition :if empty,don't display
						if(mysqli_num_rows($results) > 0){?><!-- if results are present -->
							<h3>Queued Bikes for Delivery</h3>
				<br>
				<table>
					<thead>
						<tr>
							<td>Delivered?</td>
							<td>Price</td>
							<td>Customer</td>
							<td>Brand</td>
							<td>Gear</td>
							<td>Colour</td>
							<!-- <td>Seller</td> -->
						</tr>
					</thead>
					<tbody>
						<?php 
					}
					while($row = mysqli_fetch_assoc($results)){ ?>
						<form action="auth_sold_items_admin_page.php" method="post">
							<tr>
								<td><input type="submit" name="confirm_check" value="Delivered"></td>
								<td><input type="text" name="price" value="<?php echo $row['price']?>" disabled required></td>
								<td><input type="text" name="customer" value="<?php echo $row['reg']?>" disabled required></td>
								<!-- If time permits,change these to datalist -->

								<!-- Remove required from these inputs on category == books,and disable them.Also,if one of these are selected,do the same with books -->
								<td><input type="text" name="brand" value="<?php echo $row['brand']?>" disabled required></td>
								<td><input type="text" name="gear" value="<?php echo $row['gear']?>" disabled required></td>
								<td><input type="text" name="colour" value="<?php echo $row['colour']?>" disabled required></td>

								<!-- <td><input type="text" name="seller_id" value="<?php echo $row['seller_id']?>" required></td> -->
								<!-- This is where a checkbox for validation and a checkbox for decline will go.Also,join the userinfo from users table into this table to contact and confirm. -->
								<td><input type="text" name="category" value="bikes" hidden required></td>
								<td><input type="text" name="checkout_id" value="<?php echo $row['checkout_id']?>" hidden required></td>
							</tr>
						</form>
					<?php 
					}
				?>
					</tbody>
				</table>


				<?php
						$results = mysqli_query($conn,"SELECT * FROM sold_items INNER JOIN misc ON sold_items.item_id = misc.id WHERE is_delivered = 0");//Query for undelivered books
						//Condition :if empty,don't display
						if(mysqli_num_rows($results) > 0){ ?><!-- if results are present -->
							<h3>Queued Items for Delivery</h3>
				<br>
				<table>
					<thead>
						<tr>
							<td>Delivered?</td>
							<td>Price</td>
							<td>Customer</td>
							<td>Name</td>
							<td>Description</td>
							<!-- <td>Seller</td> -->
						</tr>
					</thead>
					<tbody>
						<?php 
					}
					while($row = mysqli_fetch_assoc($results)){ ?>
						<form action="auth_sold_items_admin_page.php" method="post">
							<tr>
								<td><input type="submit" name="confirm_check" value="Delivered"></td>
								<td><input type="text" name="price" value="<?php echo $row['price']?>" disabled required></td>
								<td><input type="text" name="customer" value="<?php echo $row['reg']?>" disabled required></td>
								<!-- If time permits,change these to datalist -->

								<td><input type="text" name="name" value="<?php echo $row['name']?>" disabled required></td> 
								<td><input type="text" name="description" value="<?php echo $row['description']?>" disabled required></td> 


								<!-- <td><input type="text" name="seller_id" value="<?php echo $row['seller_id']?>" required></td> -->
								<!-- This is where a checkbox for validation and a checkbox for decline will go.Also,join the userinfo from users table into this table to contact and confirm. -->
								<td><input type="text" name="category" value="misc" hidden required></td>
								<td><input type="text" name="checkout_id" value="<?php echo $row['checkout_id']?>" hidden required></td>
							</tr>
						</form>
					<?php 
					}
				?>
					</tbody>
				</table>
			</body>
		</html>

		<?php
	}
?>
<?php 
	//include ("test_variables.php");
?>