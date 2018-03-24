<?php 
	session_start();
	include ("dbconfig.php");
	//include ("test_variables.php");
	
	$redirect_to_user_login = "user_login.php";

	if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
		header("Location: " .$redirect_to_user_login);
	}
	else{ ?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"--></script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js'></script>
<script src="index.js"></script>
<script src="snackbar.js"></script>
<link rel="stylesheet" type="text/css" href="snackbar.css">


  <!-- for google icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- for animation -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="seller_page.css">

    <title>Want to Sell?</title>

  <style>

  
  
  </style>
</head>

<body>

  <!-- Modal -->
 <div id="costumModal11" class="modal" data-easein="bounceUpIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
  

    <div class="modal-dialog" style="margin: 10vh auto 0px auto;width: 60%;margin-bottom: 5%;">
    
      <!-- Modal content-->
      <div class="modal-content" style="opacity: 0.9;">
        <div class="modal-header" style="padding:35px 50px;">
          <a href="user_home.php"><button type="button" class="close" id="remove"><span class="glyphicon glyphicon-remove"></span></button></a>
          <h2>&#8377; Seller Form</h2>
        </div>
        <div class="modal-body" style="padding:40px 50px; margin-bottom: 30px;">


          <form role="form" action="sell_request_verification.php" method="post" enctype="multipart/form-data">



          <div class="category_select col-sm-12" style="margin-bottom:10%;">
            <div class="form-group" id="cat"><label for="cat" class="pull-left" style="margin-right: 10%;font-size: 28px;">What is it???</label>
    
              <label class="radio_label">Books
                  <input type="radio" name="category" id="radio_book" class="radio_btn required" value="books"  >
                  <span class="radio_check"></span>
              </label>

              <label class="radio_label">Bicycles
                  <input type="radio" name="category" id="radio_bike" class="radio_btn required" value="bikes" >
                  <span class="radio_check"></span>
              </label>

              <label class="radio_label">Misc
                  <input type="radio" name="category" id="radio_misc" class="radio_btn required" value="misc"> 
                <span class="radio_check"></span>
               </label>
              </div>                  
            </div>
            

            <div  id="book">

            <div class="form-group" >
              <label for="book_author">Author</label>
              <input type="text" name="book_author" class="form-control author" id="book_author"  data-placement="right" data-trigger="manual" data-content="enter valid 8 digit registration number starting with 20">
            </div>

            <div class="form-group" >
              <label for="book_title">Title</label>
              <input type="text" name="book_title" class="form-control title" id="book_title"  data-placement="right" data-trigger="manual" data-content="max 30char">
            </div>


            <div class="form-group">
              <label for="book_edition">Edition</label>
              <input type="text" name="book_edition" class="form-control edition" id="book_edition"  data-placement="right" data-trigger="manual" data-content="first name without space upto 30char max">
            </div>


            <div class="form-group" >
              <label for="book_branch">Branch</label>
             <select name="book_branch" id="book_branch" class="form-control selectpicker" >
               <option value="cseit" selected >CSE/IT</option>
               <option value="ece" >ECE</option>
               <option value="chem" >Chemical</option>
               <option value="civ" >Civil</option>
               <option value="biot" >Biotechnology</option>
               <option value="mechprod" >Mechanical/Production</option>
               <option value="ee" >Electrical</option>
               <option value="null" >Misc Books</option>
             </select>
            </div>


            <div class="form-group" id="sem">
              <label for="book_semester" style="margin-bottom: 10px;">Semester</label>
              <select name="book_sem" class="form-control " id="book_sem">
                 <option value="1" selected>1st year</option>
                <option value="3">3rd</option>
                <option value="4">4th</option>
               <option value="5">5th</option>
                 <option value="6">6th</option>
                 <option value="7">7th</option>
                <option value="8">8th</option>
               </select>
            </div>


          </div>
           

           <div id="bike">

            <div class="form-group" >
              <label for="bike_brand">Bike Brand</label>
              <input type="text" name="bike_brand" class="form-control brand" id="bike_brand"  data-placement="right" data-trigger="manual" data-content="max 20char">
            </div>



            <div class="category_select col-sm-12 pull-left" style="margin-left:0;padding-left: 0;">
            <div class="form-group ">
    
              <label class="radio_label">Non-Gear
                  <input type="radio"  name="category" id="non-gear" class="radio_btn " value="0" checked="checked">
                  <span class="radio_check"></span>
              </label>

              <label class="radio_label">Gear
                  <input type="radio" name="category" id="gear" class="radio_btn " value="1" >
                  <span class="radio_check"></span>
              </label>

              
              </div>                  
            </div>


            <div class="form-group" >
              <label for="bike_color">Bike Colour</label>
              <input type="text" name="bike_colour" class="form-control color" id="bike_color"  data-placement="right" data-trigger="manual" data-content="enter valid address">
            </div>

          </div>

          <div id="misc">

            <div class="misc_item_name">
              <label for="misc_item_name">Item Name</label>
              <input type="text" name="misc_name" class="form-control item_name" id="misc_item_name"  data-placement="right" data-trigger="manual" data-content="must be atleast 6 characters and max 20">
            </div>

          </div>

            <!-- commmon field below for all 3 categories-->

           
             <div class="description">
              <label for="description">Description</label>
              <input type="text" name="description" class="form-control required description" id="description"  data-placement="right" data-trigger="manual" data-content="doesn't match with above password">
            </div>

            
            <label for="quality">Quality</label>
            <select name="quality" class="form-control required" id="quality">
              <option value="new">New</option>
              <option value="good">Good</option>
              <option value="ok">Okay</option>
              <option value="poor">Poor</option>
            </select>

             <div class="price">
              <label for="price">&#8377; Price</label>
              <input type="text" name="price" class="form-control required price" id="price"  data-placement="right" data-trigger="manual" data-content="doesn't match with above password">
            </div>            

            <div class="image well col-sm-12" style="float: left;margin-bottom: 50px;margin-top: 0;">
              <label >Image</label>
              <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
               <input type="file" name="item_image" id="image1_misc" accept="image/jpg, image/jpeg image/png">
               <!-- <input type="file" name="image2_misc" id="image2_misc">
                             <input type="file" name="image3_misc" id="image3_misc"> -->

              </div>
             
        
        </div>
        <br>
        <div class="modal-footer" style="padding-bottom: 6%;">

           <button type="submit" name="seller_submitbtn" onclick="display_snackbar()" value="Submit for Verification" class="btn btn-default col-sm-4 col-sm-offset-4" style="border-radius: 30px;"><span class="glyphicon glyphicon-off"></span>Submit for Verification</button>
           
          
        </div>
      </form>
      </div>
      
    </div>
    <div id="snackbar">Some text some message..</div>
  </div> 

 
<script>

// for dialoge animation
$(document).ready(function(){
    $(function(){
        $("#costumModal11").modal();
    });
});


//for hiding specific category on radio button check

$(document).ready(function(){
  $("#book,#bike,#misc").fadeOut();
});


$(document).ready(function(){
$("#radio_book").click(function(){
    $("#bike,#misc").fadeOut();
    $("#book").fadeIn("slow");
    $('#book_author,#book_title,#book_edition,#book_branch,#book_sem').attr("required",true);
});

$("#radio_bike").click(function(){
    $("#book,#misc").fadeOut();
    $("#bike").fadeIn("slow");
    $('#bike_brand,#bike_color').attr("required",true);
});

$("#radio_misc").click(function(){
  $("#book,#bike").fadeOut();
  $("#misc").fadeIn("slow");
  $('#misc_item_name').attr("required",true);
});
});



//hiding sem on branch=other
$(document).ready(function(){
  $("#book_branch").click(function(){
if ($("#book_branch").val() == "null") {
    $("#sem").fadeOut();
}
 else {
    $("#sem").fadeIn();
}
});
});


</script>

<script src="script.js"></script>





</body>
</html>
	<?php } ?>
<?php 
	//include ("test_variables.php");
?>