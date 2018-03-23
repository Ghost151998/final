<!-- BOOKS LIST PAGE!!!1 image added as of yet.-->
<?php
  session_start();
  include ("dbconfig.php");
  //include ("test_variables.php");

  //Test test_variables
  //unset($_GET["book_branch"]);
  //$_GET["book_branch"] = "mechprod";
  //$_GET["category"] = "books";
  //$_GET["category"] = "bikes";
  //$_GET["category"] = "misc";
  
  $redirect_to_user_login = "user_login.php";

  //Check if user is logged in
  if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
    header("Location: " .$redirect_to_user_login);
  }

  else{
    if(isset($_GET["category"])){ ?>
<html>
<head>
  <meta charset="utf-8">
  <title>
    <?php switch($_GET["category"]){
            case "books": {
              if(!isset($_GET["book_branch"])){
                echo "Misc Books";break;
              }
              else{
                switch($_GET["book_branch"]){
                  case "cseit": {echo "Computer Science/Information Technology";break;}
                  case "ece":{echo "Electronics and Communications";break;}
                  case "ee":{echo "Electrical";break;}
                  case "chem":{echo "Chemical";break;}
                  case "civ":{echo "Civil";break;}
                  case "biot":{echo "Biotechnology";break;}
                  case "mechprod":{echo "Mechanical/Production";break;}
                }
              }
            }
            case "bikes": {echo "Bikes";break;}
            case "misc" : {echo "Misc";break;}
          }
    ?>
  </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

body{
      overflow:scroll;
      background:url("4.jpg");	
      background-size: cover;
    }

    .affix{
      top 0;
      width: 100%;
      z-index: 9999 !important;
    }

    .affix ~ .container-fluid{
      position: relative;
    }


  div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;
  margin-left: 50px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);

}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #5A55A3;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #5A55A3;
  background-image:inherit;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px; 
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
   border: 1px solid #eeeeee;
  padding-left: 20px;
  padding-top: 10px;
  opacity: 1;
  height: auto;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}

</style>


</head>
<body>


<!-- NAV BAR -->
<?php include("nav.php"); ?>
<br>

<!-- JUMBOTRON -->
  <div class="jumbotron" style="opacity: 0.5;">
  <div class="container text-center">
    <h1 class="text-left"><?php switch($_GET["category"]){
            case "books": {
              if(!isset($_GET["book_branch"])){
                echo "Books for the Beyond";
              }
              else{
                switch($_GET["book_branch"]){
                  case "cseit": {echo "Books<br>Computer Science/Information Technology";break;}
                  case "ece":{echo "Books<br>Electronics and Communications";break;}
                  case "ee":{echo "Books<br>Electrical";break;}
                  case "chem":{echo "Books<br>Chemical";break;}
                  case "civ":{echo "Books<br>Civil";break;}
                  case "biot":{echo "Books<br>Biotechnology";break;}
                  case "mechprod":{echo "Books<br>Mechanical/Production";break;}
                }
              }
              break;
            }
            case "bikes": {echo "Bikes";break;}
            case "misc" : {echo "Misc";break;}
          }?></h1>
  </div>
</div>



<!-- LIST CONTAINER -->


<?php
    if($_GET["category"] == "books"){
      if(!isset($_GET["book_branch"])){ //Books without any semester
        $results = mysqli_query($conn,"SELECT * FROM books WHERE is_sold = 0 AND sem IS NULL");//Find All non course book results
        //print_r(mysqli_fetch_assoc($results));
        if(mysqli_num_rows($results) > 0){ ?>
          <div class="container" id="books_misc_container" style="margin-bottom: 40px;">
          <div class="row" style="margin-right: 10px;">
          <div class=" bhoechie-tab">
          <div class="bhoechie-tab-content col-sm-12"  style="display: block;">
          <?php while($row = mysqli_fetch_assoc($results)){ ?>
          <?php
            $img_path = "images/books/books_".$row['id'];
            $img_src = $img_path.".*";
            $result = glob($img_src);
            $extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
            $img_path .= (".".$extension);
          ?>
                <div class="well col-sm-3">
                  <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"]); ?>' id="description_1" >
                    <img src="<?php echo $img_path ?>" name="item_image" class="img-responsive" alt="image">
                    <span class="col-xs-8 text-left"><?php echo $row['title']; ?></span>
                    <span class="col-xs-4 text-right"><?php echo $row['price']; ?></span>
                  </a>
                </div>

          <?php 
          }
          ?>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php
        }
      } //books for no branch

      
        
      if(isset($_GET["book_branch"])){ //Books for all semesters
        ?>
        <div class="container" id="book_container" style="margin-bottom: 40px;">
         <div class="row" style="margin-right: 10px;">       
                    <div class="col-sm-2 bhoechie-tab-menu">
                      <div class="list-group">
                        <a href="#" class="list-group-item  text-center">
                          <h4 class="glyphicon glyphicon-book"></h4><br/>1st Year
                        </a>
                        <a href="#" class="list-group-item text-center">
                          <h4 class="glyphicon glyphicon-book"></h4><br/>3rd semester
                        </a>
                        <a href="#" class="list-group-item text-center">
                          <h4 class="glyphicon glyphicon-book"></h4><br/>4th Semester
                        </a>
                        <a href="#" class="list-group-item text-center">
                          <h4 class="glyphicon glyphicon-book"></h4><br/>5th Semester
                        </a>
                        <a href="#" class="list-group-item text-center">
                          <h4 class="glyphicon glyphicon-book"></h4><br/>6th Semester
                        </a>
                        <a href="#" class="list-group-item text-center">
                          <h4 class="glyphicon glyphicon-book"></h4><br/>7th Semester
                        </a>
                        <a href="#" class="list-group-item text-center">
                          <h4 class="glyphicon glyphicon-book"></h4><br/>8th Semester
                        </a>
                      </div>
                    </div> 
           

              <?php
        for($i = 1; $i<=8; $i++){
          if($i == 2){
            continue;
          }
          else{
            ?>
           
             
            <?php
            $results = mysqli_query($conn,"SELECT * FROM books WHERE is_sold = 0 AND branch = '".$_GET["book_branch"]."' AND sem = '".$i."'");//Take the info of all books from database for a semester
            //print_r($results);
            if(mysqli_num_rows($results) > 0){
              while($row = mysqli_fetch_assoc($results)){ ?>
              <?php
                  $img_path = "images/books/books_".$row['id'];
                  //print_r($img_path);
                  $img_src = $img_path.".*";
                  $result = glob($img_src);
                  //print_r($result);
                  $extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
                  $img_path = $img_path.".".$extension;
                 ?>
                     
              <div class=" bhoechie-tab ">
                <div class="bhoechie-tab-content col-sm-8" id="mar" >
                  <div class="col-sm-3 fill">
                    <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"]); ?>' id="description_1" >
                       <img src="<?php echo $img_path?>" name="item_image" class="img-responsive" alt="image">
                       <span class="col-xs-8 text-left"><?php echo $row['title']; ?></span>
                        <span class="col-xs-4 text-right"><?php echo $row['price']; ?></span>
                     </a>
                  </div>
                </div>  
            </div>
              <?php 
              } //all results of a semester
             } //if results for semester exist
            ?>
          
          
            <?php
            }
          } //for all 8 semesters
      } //if books have branch
    } ?> <!--if category = books-->
    </div>
    </div>


    <?php
    if($_GET["category"] == "bikes"){
      $results = mysqli_query($conn,"SELECT * FROM bikes WHERE is_sold = 0"); ?>


      <div class="container" id="misc_container" style="margin-bottom: 40px;">
        <div class="row" style="margin-right: 10px;">
           <div class=" bhoechie-tab">
              <div class="bhoechie-tab-content col-sm-12" id="sem1" style="display: block;">

      <?php
      while($row = mysqli_fetch_assoc($results)){ ?>

      <?php
          $img_path = "images/bikes/bikes_".$row['id'];
          $img_src = $img_path.".*";
          $result = glob($img_src);
          $extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
          $img_path .= (".".$extension);
         ?>

      <div class="well col-sm-3">
            <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"]); ?>' id="description_1" >
              <img src="<?php echo $img_path?>" name="item_image" class="img-responsive" alt="image">
              <span class="col-xs-8 text-left"><?php echo $row['colour']." ".$row['brand'] ?></span>
              <span class="col-xs-4 text-right"><?php echo $row['price'] ?></span>
            </a>
          </div>

      <?php
      } ?>
      </div>
        </div>
      </div>
  </div>
      <?php
    }//if category is bikes


    if($_GET["category"] == "misc"){
      $results = mysqli_query($conn,"SELECT * FROM misc WHERE is_sold = 0");
      ?>
      <div class="container" id="books_misc_container" style="margin-bottom: 40px;">
        <div class="row" style="margin-right: 10px;">
           <div class=" bhoechie-tab">
              <div class="bhoechie-tab-content col-sm-12" id="sem1" style="display: block;">
      <?php
      while($row = mysqli_fetch_assoc($results)){ ?>

      <?php
          $img_path = "images/misc/misc_".$row['id'];
          $img_src = $img_path.".*";
          $result = glob($img_src);
          $extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
          $img_path .= (".".$extension);
         ?>

      <div class="well col-sm-3">
            <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"]); ?>' id="description_1" >
              <img src="<?php echo $img_path ?>" name="item_image" class="img-responsive" alt="image">
              <span class="col-xs-8 text-left"><?php echo $row['name']?></span>
              <span class="col-xs-4 text-right"><?php echo $row['price']?></span>
            </a>
          </div>
        <?php 
      }//if category is misc  
    }
    ?>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="bootstrap-hover-dropdown.js"></script>


<script >
  $(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});

$(document).ready(function() {
      $('.js-activated').dropdownHover().dropdown();
    });


$(document).ready(function(){
  var i=0;
  var margin = (i*7);
  i++;
$("#mar").css({
    marginTop: 'margin'
});
});

</script>

</body>
</html>

<?php
    } //if category is set
}
?>

<?php 
  //include ("test_variables.php");
?>