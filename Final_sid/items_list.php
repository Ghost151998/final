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
  <link rel="stylesheet" type="text/css" href="list_style.css">


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
          <div class="container">
              <div class="row"
                <div class="gallery">
                  <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"]); ?>' id="description_1" >
                    <img src="<?php echo $img_path ?>" name="item_image" class="img-responsive" alt="image">
                    <span class="col-xs-8 text-left"><?php echo $row['title']; ?></span>
                    <span class="col-xs-4 text-right"><?php echo $row['price']; ?></span>
                  </a>
                </div>
                </div>
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
        <div class="container-fluid" id="book_container" style="margin-bottom: 40px;">
         <div class="row" style="margin-right: 10px;">  

          <div class="col-xs-3"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left sideways">
            <li class="active"><a href="#sem1" data-toggle="tab">Sem1</a></li>
            <li><a href="#profile-v" data-toggle="tab">Sem2</a></li>
            <li><a href="#messages-v" data-toggle="tab">Sem3</a></li>
            <li><a href="#settings-v" data-toggle="tab">Sem4</a></li>
          </ul>
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
                     
              <div class="gallery">
                    <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"]); ?>' id="description_1" >
                       <img src="<?php echo $img_path?>" name="item_image" class="img-responsive" alt="image" width="460" height="345">>
                       <span class="col-xs-8 text-left"><?php echo $row['title']; ?></span>
                        <span class="col-xs-4 text-right"><?php echo $row['price']; ?></span>
                     </a>
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
      $('.js-activated').dropdownHover().dropdown();
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