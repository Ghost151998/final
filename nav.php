<!-- THE NAV BAR.HIGHLIGHT THE PAGE CURRENTLY OPEN -->
<body data-spy="scroll" data-target=".navbar" data-offset="30">
<nav class="navbar  navbar-inverse" data-spy="affix" >
    <div class="container-fluid ">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" data-spy="affix">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand col-sm-1" href="#footer">Logo</a>

      <div class="navbar-collapse  collapse ">
        <ul class="nav navbar-nav">
            <li class="active"><a href="user_home.php">Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle js-activated">Books<b class="caret"></b></a>
            <ul class="dropdown-menu" style="background-color: black;opacity: 0.9;border: solid 1px;" >
             <li><a  class="c"   href='items_list.php?category=books&book_branch=cseit' style="color: white;">Computer Science/Information Technology</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=ece' style="color: white;">Electronics and Communications</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=ee' style="color: white;">Electrical</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=civ' style="color: white;">Civil</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=mechprod' style="color: white;">Mechanical/Production</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=chem' style="color: white;">Chemical</a></li>
             <li><a  class="c"   href='items_list.php?category=books&book_branch=biot' style="color: white;">Biotechnology</a></li>
             <li><a  class="c"   href='items_list.php?category=books' style="color: white;">Books for the Beyond</a></li>
           </ul>
          </li>

        <li><a href='items_list.php?category=bikes'>Bikes</a></li>
        <li><a href='items_list.php?category=misc'>Misc</a></li>
        <li><a href='seller_page.php'>Sell</a></li>
        <li><a href="#footer">Contact</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href='logout.php'><span class="glyphicon glyphicon-user"></span>Logout</a></li>
        <li><a href='cart.php'><span><!-- <?php echo $_SESSION["cart_total"]; ?> --></span><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
      </ul>

         
      </div> <!-- .nav-collapse -->
    </div> <!-- .container -->
  </nav> <!-- .navbar -->
