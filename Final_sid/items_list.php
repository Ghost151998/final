<!-- BOOKS LIST PAGE!!!Remember to place a div and format this category.No images added as of yet. Give classes for formatting.-->
<?php
  session_start();
  include ("dbconfig.php");
  //include ("test_variables.php");
  
  $redirect_to_user_login = "user_login.php";

  //Check if user is logged in
  if(!$_SESSION["user_reg"]){//Login failed.Redirect to user_login.php
    header("Location: " .$redirect_to_user_login);
  }

  else{
    if(isset($_GET["category"])){ 
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="items_list.css">
    <title>
      <?php switch($_GET["category"]){
      case "books": {
        if(!isset($_GET["book_branch"]) && !isset($_GET["book_sem"])){
          echo "Books for the Beyond";
        }
        else if(!isset($_GET["book_branch"]) && ($_GET["book_sem"] == 1)){
          echo "Freshman Year";
        }
        else{
          switch($_GET["book_branch"]){
            case "cseit": {echo "Books-Computer Science/Information Technology";break;}
            case "ece":{echo "Books-Electronics and Communications";break;}
            case "ee":{echo "Books-Electrical";break;}
            case "chem":{echo "Books-Chemical";break;}
            case "civ":{echo "Books-Civil";break;}
            case "biot":{echo "Books-Biotechnology";break;}
            case "mechprod":{echo "Books-Mechanical/Production";break;}
          }
        }
        break;
      }
      case "bikes": {echo "Bikes";break;}
      case "misc" : {echo "Misc Items";break;}
    }?></title>
  </head>
  <body>

    <?php include("nav.php"); ?>

    <div class="jumbotron text-left" style="margin-top: 3%;">
    <h2 class="col-sm-offset-2">
      <?php switch($_GET["category"]){
      case "books": {
        if(!isset($_GET["book_branch"]) && !isset($_GET["book_sem"])){
          echo "Books for the Beyond";
        }
        else if(!isset($_GET["book_branch"]) && ($_GET["book_sem"] == 1)){
          echo "Freshman Year";
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
        break;
      }
      case "bikes": {echo "Bikes";break;}
      case "misc" : {echo "Misc Items";break;}
    }?>
    </h2>
  </div>

    <div class="col-sm-6"><!-- CONTAINER FOR ALL -->
      <hr>
      <!-- CATEGORIZATION BEGINS -->

<?php
if($_GET["category"] == "books"){

  if(!isset($_GET["book_branch"]) && !isset($_GET["book_sem"])){ //Books without any semester
    ?>
     <div class="col-xs-3"><!-- required for floating buttons at left not to be included in loop-->
      <!-- Nav tabs -->
      <ul class="nav nav-tabs tabs-left sideways">
        <li class="active"><a href="#misc_books" data-toggle="tab">Books for the beyond</a></li>
      </ul>
    </div>
    <?php
    $results = mysqli_query($conn,"SELECT * FROM books WHERE is_sold = 0 AND sem IS NULL");//Find All non course book results
    if(mysqli_num_rows($results) > 0){ ?>

    <!-- LIST CONTAINER -->
    <div class="col-sm-9"><!--column division for all detail tabs-->
      <!-- CHANGED THIS ^ FROM 9 TO 12 -->
    <div class="tab-content"><!-- Tab panes -->

      <!--3-8...1 for complete list -->
      <div class="tab-pane active" id="misc_books"> 
      <div class="container"><!-- complete list of 1 sem -->
      <div class="row">
      <div class="gallery">

      <?php while($row = mysqli_fetch_assoc($results)){ ?>

          <?php
            $img_path = "images/books/books_".$row['id'];
            $img_src = $img_path.".*";
            $result = glob($img_src);
            $extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
            $img_path .= (".".$extension);
          ?>

          <figure>
            <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"])?>'>
            <img src="<?php echo $img_path?>" name="item_image" alt="image">
            <figcaption><span class="col-xs-8 text-left"><?php echo $row['title']; ?></span>
              <small><span class="col-xs-4 text-right"><?php echo $row['price']; ?></span></small>
            </figcaption>
            </a>
          </figure>
          

      <?php 
      }
      ?>
      </div>
      </div>
      </div>
      </div>

    </div>
    </div>
      <?php
    }
  }//BOOKS WITHOUT A BRANCH

  //*********INCLUDED FRESHMAN CODE*********
  if(!isset($_GET["book_branch"]) && ($_GET["book_sem"] == 1)){ //Books without any semester
    ?>
     <div class="col-xs-3"><!-- required for floating buttons at left not to be included in loop-->
      <!-- Nav tabs -->
      <ul class="nav nav-tabs tabs-left sideways">
        <li class="active"><a href="#misc_books" data-toggle="tab">Books for the beyond</a></li>
      </ul>
    </div>
    <?php
    $results = mysqli_query($conn,"SELECT * FROM books WHERE is_sold = 0 AND sem = 1");//Find All non course book results
    if(mysqli_num_rows($results) > 0){ ?>

    <!-- LIST CONTAINER -->
    <div class="col-sm-9"><!--column division for all detail tabs-->
      <!-- CHANGED THIS ^ FROM 9 TO 12 -->
    <div class="tab-content"><!-- Tab panes -->

      <!--3-8...1 for complete list -->
      <div class="tab-pane active" id="misc_books"> 
      <div class="container"><!-- complete list of 1 sem -->
      <div class="row">
      <div class="gallery">

      <?php while($row = mysqli_fetch_assoc($results)){ ?>

          <?php
            $img_path = "images/books/books_".$row['id'];
            $img_src = $img_path.".*";
            $result = glob($img_src);
            $extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
            $img_path .= (".".$extension);
          ?>

          <figure>
            <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"])?>'>
            <img src="<?php echo $img_path?>" name="item_image" alt="image">
            <figcaption><span class="col-xs-8 text-left"><?php echo $row['title']; ?></span>
              <small><span class="col-xs-4 text-right"><?php echo $row['price']; ?></span></small>
            </figcaption>
            </a>
          </figure>
          

      <?php 
      }
      ?>
      </div>
      </div>
      </div>
      </div>

    </div>
    </div>
      <?php
    }
  }//BOOKS WITHOUT A BRANCH
  //INCLUDED FRESHMAN CODE

  else{ //Books for all semesters
    ?>
    <!-- SEMESTER BOOKS -->
    <div class="col-xs-3"><!-- required for floating buttons at left not to be included in loop-->
      <!-- Nav tabs -->
      <ul class="nav nav-tabs tabs-left sideways">
        <li class="active"><a href="#sem3" data-toggle="tab" >3rd Semester</a></li>
        <li><a href="#sem4" data-toggle="tab">4th Semester</a></li>
        <li><a href="#sem5" data-toggle="tab">5th Semester</a></li>
        <li><a href="#sem6" data-toggle="tab">6th Semester</a></li>
        <li><a href="#sem7" data-toggle="tab">7th Semester</a></li>
        <li><a href="#sem8" data-toggle="tab">8th Semester</a></li>
      </ul>
    </div>

    <div class="col-sm-9"><!--column division for all detail tabs-->
    <div class="tab-content"><!-- Tab panes -->
    
    <!-- BOOKS WITH SEMESTER -->
    <?php
    for($i = 3; $i<=8; $i++){ ?>
      <!--3-8...1 for complete list -->
        <div class="tab-pane active" id='sem<?php echo $i?>'>
        <div class="container"><!-- complete list of 1 sem -->
        <div class="row">
        <div class="gallery">
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

              
              <figure>
                <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"])?>'>
                <img src="<?php echo $img_path?>" name="item_image" alt="image">
                <figcaption><span class="col-xs-8 text-left"><?php echo $row['title']; ?></span>
                  <small><span class="col-xs-4 text-right"><?php echo $row['price']; ?></span></small>
                </figcaption>
                </a>
              </figure>
              

          <?php 
          } //all results of a semester
         } //if results for semester exist
        ?>
        </div>
          </div>
          </div>
          </div>
          <!-- end of 1st tab-->
        <?php
        }//for all 8 semesters
        ?>
        </div>
        </div>
        <?php
    
  } //if books have branch
} //if category = books


if($_GET["category"] == "bikes"){
  ?>
     <div class="col-xs-3"><!-- required for floating buttons at left not to be included in loop-->
      <!-- Nav tabs -->
      <ul class="nav nav-tabs tabs-left sideways">
        <li class="active"><a href="#bikes" data-toggle="tab">Bikes</a></li>
      </ul>
    </div>
    <?php
      $results = mysqli_query($conn,"SELECT * FROM bikes WHERE is_sold = 0"); ?>

      <!-- LIST CONTAINER -->
    <div class="col-sm-9"><!--column division for all detail tabs-->
      <!-- CHANGED THIS ^ FROM 9 TO 12 -->
    <div class="tab-content"><!-- Tab panes -->

      <!--3-8...1 for complete list -->
      <div class="tab-pane active" id="bikes"> 
      <div class="container"><!-- complete list of 1 sem -->
      <div class="row">
      <div class="gallery">

          <?php
      while($row = mysqli_fetch_assoc($results)){?>
        
        <?php
          $img_path = "images/bikes/bikes_".$row['id'];
          //print_r($img_path);
          $img_src = $img_path.".*";
          $result = glob($img_src);
          $extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
          $img_path .= (".".$extension);
         ?>

          <figure>
            <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"])?>'>
            <img src="<?php echo $img_path?>" name="item_image" alt="image">
            <figcaption><span class="col-xs-8 text-left"><?php echo $row['colour']." ".$row['brand'] ?></span>
              <small><span class="col-xs-4 text-right"><?php echo $row['price']?></span></small>
            </figcaption>
            </a>
          </figure>
        
      <?php
      }
      ?>

      </div>
      </div>
      </div>
      </div>

    </div>
    </div>

      <?php
    }//if category is bikes


    if($_GET["category"] == "misc"){
      ?>
     <div class="col-xs-3"><!-- required for floating buttons at left not to be included in loop-->
      <!-- Nav tabs -->
      <ul class="nav nav-tabs tabs-left sideways">
        <li class="active"><a href="#misc" data-toggle="tab">Misc Items</a></li>
      </ul>
    </div>
    <?php
      $results = mysqli_query($conn,"SELECT * FROM misc WHERE is_sold = 0"); ?>

      <!-- LIST CONTAINER -->
    <div class="col-sm-9"><!--column division for all detail tabs-->
      <!-- CHANGED THIS ^ FROM 9 TO 12 -->
    <div class="tab-content"><!-- Tab panes -->

      <!--3-8...1 for complete list -->
      <div class="tab-pane active" id="misc"> 
      <div class="container"><!-- complete list of 1 sem -->
      <div class="row">
      <div class="gallery">

      <?php
      while($row = mysqli_fetch_assoc($results)){ ?>
        
        <?php
          $img_path = "images/misc/misc_".$row['id'];
          //print_r($img_path);
          $img_src = $img_path.".*";
          $result = glob($img_src);
          $extension = strtolower(pathinfo($result[0],PATHINFO_EXTENSION));
          $img_path .= (".".$extension);
         ?>

          <figure>
            <a href='item_description.php?category=<?php echo urlencode($_GET["category"]); ?>&item_id=<?php echo urlencode($row["id"])?>'>
            <img src="<?php echo $img_path?>" name="item_image" alt="image">
            <figcaption><span class="col-xs-8 text-left"><?php echo $row['name']?></span>
              <small><span class="col-xs-4 text-right"><?php echo $row['price']?></span></small>
            </figcaption>
            </a>
          </figure>
          
        <?php 
      }
      ?>

      </div>
      </div>
      </div>
      </div>

    </div>
    </div>

      <?php
    }//if category is misc
?>

      <!-- CATEGORIZATION ENDS -->
      <!-- <div class="clearfix"></div> -->
    </div>

  </body>
</html>
  <?php
  } //if category is set
    } ?>
<?php 
  //include ("test_variables.php");
?>