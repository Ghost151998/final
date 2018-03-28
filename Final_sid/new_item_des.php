<!DOCTYPE html>
<html>
<head>
	<title>Description</title>
	<meta charset="utf-8">
  	<meta name="viewport" value="width=device-width,intial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <script src="bootstrap-hover-dropdown.js"></script>
    <style>
    	body{
        overflow-x: hidden;
    		background-color: #f1f3f6;
    	}
    	.trans{
      background: rgba(144,144,144,0.2);
      }
    	.thumb img{
    		max-height: 500px;
    		max-width: 600px;
        box-shadow: 1px 1px 40px;
    	}
      .par{
        padding: 0;
        border: solid 1px;
      }
    	.sml{
        padding: 0;
        margin: 5px;
      }
    	.sml img{
    		max-height: 80px;
    		max-width: 100%;
    	}
      .thumb img{
        max-width: 100%;
        max-height: 500px;
      }
      span{
        font-size: 18px;
        text-align: left;
        margin-right: 10px;
        color: black;
        font-weight: lighter;
      }
      .btn-default {
        border: 0.1px solid grey;
        background: white;
        color: black;
        margin-top: 20px;
        padding-bottom: 25px;    
      }
      .btn-default:hover {
        background: green;
        color: white;
      }
      </style>
</head>

<body>
    
	 <div class="jumbotron trans" style="margin-top: 5px;height: 40px;margin-bottom: 0;" >
 	  	 <span class="text-left col-sm-offset-1" style="font-size: 40px;">Item Description</span>      
 	 </div><hr>

 	 <div class="container-fluid" style="background-color: #ffffff; padding: 20px;margin: 0 7% 0 7%; box-shadow: 1px 1px 10px;"> 		
 	 		<div class="row" style="margin-top: 1%;">
 	 			<div class="col-sm-1 par">
 	 				
 	 				     <div class="sml">
           				<a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"])?>'>
           				<img src="4.jpg" name="item_image" alt="image">          				 
            			</a>
          			</div>
          			<div class="sml">
           				<a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"])?>'>
           				<img src="4.jpg" name="item_image" alt="image">          				 
            			</a>
          			</div>
          			<div class="sml">
           				<a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"])?>'>
           				<img src="4.jpg" name="item_image" alt="image">          				 
            			</a>
          			</div>	
 	 				
 	 			</div>

 	 			<div class="col-sm-6" style="padding: 0;margin-left: 2%;">
 	 				<div class="thumb ">
           				<a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"])?>'>
           				<img src="4.jpg" name="item_image" alt="image">          				 
            			</a>
          			</div>
 	 			</div>
 	 			<div class="col-sm-4" style="font-size: 30px;">
 	 				<p><span>Author: </span>S.L Loney</p>
 	 				<p><span>Edition: </span>2nd</p>
 	 				<p><span>Title: </span>Trigonometry</p>
 	 				<p><span>Price &#8377;: </span>454</p>
 	 				<p><span>Details: </span>Fill as u wish</p>
 	 		
 	 				<a href="checkout.php">
            <button type="submit"  class="btn btn-default col-sm-5 col-sm-offset-2" id="Conf_btn" style="border-radius: 10px; margin-top:10%;"><span class="glyphicon glyphicon-shopping-cart Fill"></span>Add To Cart</button>           
         </a>		
 	 			</div>
 	
 	 		
 	 		</div>


 	 	</div>
 	 	
 	 </div>


</body>
</html>