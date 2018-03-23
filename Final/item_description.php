<!-- Item Description Page.Remember to give the div this category.No images added as of yet. Buy button to be added later if required. Give classes for formatting. Add to cart button will redirect to cart while adding the product and updating the db.-->

<?php
	session_start();
	include ("dbconfig.php");//Connection to database
	//include ("test_variables.php");

	$redirect_to_user_login = "user_login.php";

	//Check if user is logged in
	if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
		header("Location: " .$redirect_to_user_login);

		//Set this information on all books,bikes,and misc description pages since this will help form submission to cart
		//Test inputs
		$_GET["category"] = "books";
		$_GET["item_id"] = 1;//Insert the id received from the page click of the item on the books list

	}

	else { ?>

			<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8">
  					<meta name="viewport" value="width=device-width,intial-scale=1">
  					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
					<title>Item Description</title>

					 <style type="text/css">
    
					    body{
					    position: relative;
					      background-size: cover;
					      background:url("4.jpg");
					      
					    }

					    .affix{
					      top 0;
					      width: 100%;
					      z-index: 9999 !important;
					    }

					    .affix ~ .container-fluid{
					      position: relative;
					    }
					    .big{
					    	font-size: 15px;
					    	text-align: left;
					    	margin-right: 10px;
					    	font-weight: lighter;
					    }
					    p{
					    	font-size: 25px;
					    	font-weight: bold;

					    }

					</style>
				</head>
				<body>
					<?php include("nav.php"); ?>

					<div class="jumbotron" id="jumbo" style="opacity: 0.5;">
					  <div class="container">
					    <h1>Item Description</h1>      
					  </div>
					</div>
<?php

	if($_GET["category"] == "books"){//Remove this after task: sending request from books_list page

		
		$results = mysqli_query($conn,"SELECT * FROM books WHERE id = '".$_GET["item_id"]."' AND is_sold = 0 ");//Take the info of item from database
		//print_r($results);
		echo "<br>";
		$row = mysqli_fetch_object($results); ?> <!-- take all entries from table and fill them in html -->
		<!-- LUCKY: BOOKS -->

<div class="jumbotron" id="jumbo" style="opacity: 0.5;">
<div class="container">


		<div class="container text-center ">
 		   <div class="row">

 		<!--<div class="col-sm-1 ">
      		   <div class="icon-bar well well-sm pull-left">
		        <img src="#" alt="small img1">
		        <img src="#" alt="small img2">
		        <img src="#" alt="small img3">
		      </div>     
		    </div>	-->

		    <div class="row">
      			<div class="col-sm-6 fill">
				<?php
					$img_path = "images/books/books_".$row->id;
					$img_src = $img_path.".*";
					$result = glob($img_src);
					$extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
					$img_path .= (".".$extension);
				 ?>
				 <!-- LUCKY:IMAGE -->
				
				<image src="<?php echo $img_path?>" name="item_image" class="image-responsive" style="max-width:500px;max-height: 600px;" required>
				</div>	 

				<div class="col-sm-6 text-left ">
				<p>
					<span class="big">Author:</span><?php echo $row->author; ?>
				</p>
				<p>
					<span class="big">Title:</span><?php echo $row->title; ?>
				</p>
				<p>
					<span class="big">Edition:</span><?php echo $row->edition; ?>
				</p>
				<?php if($row->branch){ ?>
				<!-- LUCKY: TO BE DISPLAYED IF BOOK != MISC_BOOK -->
					<p><span class="big">Branch:</span><?php echo $row->branch; ?></p>
					<?php
					if($row->sem == '1'){ ?>
						<p><span class="big">Semester:</span>1st Year"</p>
					<?php 
					} 
					else{ ?>
						<p><span class="big">Semester:</span><?php echo $row->sem; ?></p>
					<?php } ?>
				<?php } ?>

				<p>
					<span class="big">Description:</span><?php echo $row->description; ?>
				</p>
				<p>
					<span class="big">Quality:</span><?php echo $row->quality; ?>
				</p>
				<p>
					<span class="big">Price:</span><?php echo $row->price; ?>
				</p>

				</div>
			  </div>
			</div>
		</div><br>
				<div class="row-fluid">
				<?php echo "<a href='cart_add_item.php?category=".$_GET["category"]."&item_id=".$row->id."'><button type='submit' class='btn btn-default col-sm-2 col-sm-offset-6' id='mybtn' style='border-radius: 10px;'><span class='glyphicon glyphicon-shopping-cart'></span>Add To Cart</button></a>" ?>
				</div>
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

		<div class="container text-center">
 		   <div class="row">

 		<!--<div class="col-sm-1 ">
      		   <div class="icon-bar well well-sm pull-left">
		        <img src="#" alt="small img1">
		        <img src="#" alt="small img2">
		        <img src="#" alt="small img3">
		      </div>     
		    </div>	-->

		    <div class="row">
      			<div class="col-sm-6 well well-sm">

				<?php
					$img_path = "images/bikes/bikes_".$row->id;
					$img_src = $img_path.".*";
					$result = glob($img_src);
					$extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
					$img_path .= (".".$extension);
				 ?>
				 <!-- LUCKY:IMAGE -->
				 Image:
				<image src="<?php echo $img_path?>" name="item_image" height="200" width="320" required>

				</div>	

				<div class="col-sm-4">

				<!-- LUCKY:BIKES -->
				Brand:<?php echo $row->brand; ?><br>
				Gear:<?php echo $row->gear; ?><br>
				Colour:<?php echo $row->colour; ?><br>
				Description:<?php echo $row->description; ?><br>
				Quality:<?php echo $row->quality; ?><br>
				Price:<?php echo $row->price; ?><br>

				</div>
			  </div>
			</div>
		</div>
				

				<?php echo "<a href='cart_add_item.php?category=".$_GET["category"]."&item_id=".$row->id."'><button type='submit' class='btn btn-default col-sm-2 offset4' id='mybtn' style='border-radius: 10px;'><span class='glyphicon glyphicon-shopping-cart'></span>Add To Cart</button></a>" ?>
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
		<!-- LUCKY:MISC -->

			<div class="container text-center">
 		   <div class="row">

 		<!--<div class="col-sm-1 ">
      		   <div class="icon-bar well well-sm pull-left">
		        <img src="#" alt="small img1">
		        <img src="#" alt="small img2">
		        <img src="#" alt="small img3">
		      </div>     
		    </div>	-->

		    <div class="row">
      			<div class="col-sm-6 well well-sm">

				<?php
					$img_path = "images/misc/misc_".$row->id;
					$img_src = $img_path.".*";
					$result = glob($img_src);
					$extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
					$img_path .= (".".$extension);
				 ?>
				 <!-- LUCKY:IMAGE -->
				 Image:
				<image src="<?php echo $img_path?>" name="item_image" height="200" width="320" required>

				</div>	

				<div class="col-sm-4">

				Name:<?php echo $row->name; ?><br>
				Description:<?php echo $row->description; ?><br>
				Quality:<?php echo $row->quality; ?><br>
				Price:<?php echo $row->price; ?><br>

				</div>
			  </div>
			</div>
		</div>

				

				<?php echo "<a href='cart_add_item.php?category=".$_GET["category"]."&item_id=".$row->id."'><button type='submit' class='btn btn-default col-sm-2 offset4' id='mybtn' style='border-radius: 10px;'><span class='glyphicon glyphicon-shopping-cart'></span>Add To Cart</button></a>" ?>					<!--name+= _book_'.<?phpecho $row->id ?>.' -->
				</form>

</div>
</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
 <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="bootstrap-hover-dropdown.js"></script>

  <script>
			  
   $(document).ready(function() {
  $('.js-activated').dropdownHover().dropdown();
	 })
  </script>


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