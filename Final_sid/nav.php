  <!-- THE NAV BAR.HIGHLIGHT THE PAGE CURRENTLY OPEN -->


<body data-spy="scroll" data-target=".navbar" data-offset="30">
<link rel="stylesheet" type="text/css" href="nav.css">
<script src="bootstrap-hover-dropdown.js"></script>


 <script>
    $(document).ready(function() {
    $('.js-activated').dropdownHover().dropdown();
    })
 </script>

<nav class="navbar  navbar-inverse navbar-custom" data-spy="affix"  >
    <div class="container-fluid fix">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" data-spy="affix">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand col-sm-1" href="#footer">Logo</a>
      <?php 
        $common_uri = "/Final_sid/"; //Fill this with the current directory
        $current_uri = str_replace( $common_uri, "", $_SERVER["REQUEST_URI"]);
        //echo $current_uri;
      ?>

      <div class="navbar-collapse  collapse ">
        <ul class="nav navbar-nav">
            <li <?php if($current_uri == "user_home.php"){echo "class='active'";} ?> ><a href="user_home.php" id="home">Home</a></li>

          <a href="#" class="dropdown-toggle js-activated">
          <li class='dropdown' <?php 
              if( $current_uri == "items_list.php?category=books&book_branch=cseit" ||  $current_uri == "items_list.php?category=books&book_branch=ece" ||  $current_uri == "items_list.php?category=books&book_branch=ee" ||  $current_uri == "items_list.php?category=books&book_branch=chem" ||  $current_uri == "items_list.php?category=books&book_branch=mechprod" ||  $current_uri == "items_list.php?category=books&book_branch=civ" ||  $current_uri == "items_list.php?category=books&book_branch=biot" ||  $current_uri == "items_list.php?category=books" )
                {echo " active' ";}
              else{echo "' ";}
             ?> >
            Books<b class="caret"></b>
            <ul class="dropdown-menu" >
              <li><a    href='items_list.php?category=books&book_branch=civ'>Freshman year</a></li>
             <li><a href='items_list.php?category=books&book_branch=cseit' >Computer Science/Information Technology</a></li>
             <li><a  href='items_list.php?category=books&book_branch=ece' >Electronics and Communications</a></li>
             <li><a    href='items_list.php?category=books&book_branch=ee'>Electrical</a></li>
             <li><a    href='items_list.php?category=books&book_branch=civ'>Civil</a></li>
             <li><a   href='items_list.php?category=books&book_branch=mechprod'>Mechanical/Production</a></li>
             <li><a    href='items_list.php?category=books&book_branch=chem'>Chemical</a></li>
             <li><a     href='items_list.php?category=books&book_branch=biot'>Biotechnology</a></li>
             <li><a    href='items_list.php?category=books'>Books for the Beyond</a></li>
           </ul>
          </li></a>

        <li <?php if($current_uri == "items_list.php?category=bikes"){echo "class='active'";} ?> ><a href='items_list.php?category=bikes'>Bikes</a></li>
        <li <?php if($current_uri == "items_list.php?category=misc"){echo "class='active'";} ?> ><a href='items_list.php?category=misc'>Misc</a></li>
        <li <?php if($current_uri == "seller_page_new.php"){echo "class='active'";} ?> ><a href='seller_page_new.php' id="sell">Sell</a></li>
        <li <?php if($current_uri == "about_us.php"){echo "class='active'";} ?> ><a href='about_us.php' id="about_us">About Us</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">       
         <li class="dropdown">
            <a href="#" class="dropdown-toggle js-activated"><span class="navbar-text" style="margin: 0;">Welcome,</span> <?php echo $_SESSION["user_name"]; ?><b class="caret"></b></a>

            <ul class="dropdown-menu dropdown-menu-left">
               <li><a href='logout.php'>Logout</a></li>
            </ul></li>

        <li <?php if($current_uri == "cart.php"){echo "class='active'";} ?> ><a href='cart.php'><i class="glyphicon glyphicon-shopping-cart"></i>Cart<label id="number" class="pull-right col-sm-1" id="number"><?php echo $_SESSION["cart_count"]; ?></label></a></li>
      </ul>

         
      </div> <!-- .nav-collapse -->
    </div> <!-- .container -->
  </nav> <!-- .navbar -->

  <br>
  



