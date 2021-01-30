<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= $title ?></title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  <link rel="stylesheet" href="css/fontawesome-all.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="shortcut icon" href="favicon.ico">
</head>
<body>
  <!-- This is the top navigation -->     
  <div class="nav">
    <nav class="topnav">
      <a href="#" id="menu"><i class="fas fa-bars"></i><p>Menu</p></a>
      <div class="menubar" id="menubar">
        <div class="nav-left">
          <ul>
            <?php 
              require_once "classes/Authentication.php";
              require_once "classes/ShoppingCart.php";
              session_start();
              if(isset($_SESSION["username"])):
                $loginName = $_SESSION["username"];
            ?>               
              <li><a href="login-success.php"><?= $loginName ?></a></li>             
            <?php else:?>
              <li><i class="fas fa-lock"></i><a href="login.php">Login</a></li>
            <?php endif; ?>
            <li><i class="far fa-circle"></i><a href="index.php">Home</a></li>
            <li><i class="far fa-circle"></i><a href="aboutus.php">About SW</a></li>
            <li><i class="far fa-circle"></i><a href="contactus.php">Contact Us</a></li>
            <li><i class="far fa-circle"></i><a href="viewproducts.php">View Products</a></li>
          </ul>
        </div>
      </div>
      <?php 
        require_once "classes/Authentication.php";
        if(isset($_SESSION["username"])):
          $loginName = $_SESSION["username"];
      ?> 
      <div class="login">
        <a href="login-success.php"><?= $loginName ?></a>
      </div>  
      <?php else: ?>
      <div class="login">
        <i class="fas fa-lock"></i>
        <a href="login.php">Login</a>
      </div>  
      <?php endif; ?>    
      <div class="cart">
        <i class="fas fa-shopping-cart"></i>
        <a href="viewcart.php">View Cart</a>
        <p>
          <?php 
            if(isset($_SESSION["cart"])){
              $cart = $_SESSION["cart"];
              echo(sprintf($cart->calculateQty()));
            } else {
              echo("0");
            }
          ?> 
          items
        </p>
      </div>
    </nav>
  </div>
  <div class="wrapper clearfix">
    <!-- This is the header -->             
    <div class="content-wrapper clearfix">
      <header>
        <div class="clearfix">
          <div class="logo"><a href="index.php" class="clearfix"><h1>Sports Warehouse</h1></a></div>
            <form class="search" action="search.php" method="get">
              <fieldset>
                <legend class="hide">Search</legend>
                <label class="hide" for="search">Search</label>
                <input class="search-input" type="search" name="search" id="search" placeholder="Search products">
                <button class="search-btn notext" id="search-btn" type="submit" name="submitButton" value="search"><i class="fas fa-search"></i>Search</button>
              </fieldset>
            </form>
          </div>
          <div class="categorynav">
            <ul>
              <?php
                require_once "classes/DBAccess.php"; 
                include "settings/db.php";  
                $db = new DBAccess($dsn, $username, $password); 
                $pdo = $db->connect(); 
                //select categories  
                $sql = "select  category_id, category_name 
                from   category"; 
                $stmt = $pdo->prepare($sql);
                $rows = $db->executeSQL($stmt); 
                //loop to show all categories
                foreach ($rows as $row):
                $catId = $row["category_id"];
                $catName = $row["category_name"];  
              ?>
              <li><a href="groupByCategories.php?id=<?= $catId ?>"><?= $catName ?></a><i class="fas fa-angle-right"></i></li>
              <?php 
                endforeach; 
                $pdo = null;
              ?>
            </ul>
          </div>
      </header>
      <!-- This is the content -->             
      <?= $output ?>
    </div>
  </div>
  <!-- This is the footer -->
  <div class="footer clearfix">
    <footer>
      <div class="footer-nav">
        <h2>Site navigation</h2>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About SW</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="viewproducts.php">View Products</a></li>
          <li><a href="privacy.php">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="footer-cat">
        <h2>Product categories</h2>
        <ul>
          <?php 
            foreach ($rows as $row):
            $catId = $row["category_id"];
            $catName = $row["category_name"];  
          ?>
          <li><a href="groupByCategories.php?id=<?= $catId ?>"><?= $catName ?></a></li>
          <?php 
            endforeach; 
            $pdo = null;
          ?>    
        </ul>
      </div>
      <div class="footer-contact">
        <h2>Contact Sports Warehouse</h2>
        <a class="facebook" href=""><i class="fab fa-facebook-f fa-4x"></i><p>Facebook</p></a>
        <a class="twitter" href=""><i class="fab fa-twitter fa-4x"></i><p>Twitter</p></a>
        <div class="other" id="other">
          <a href=""><i class="fab fa-telegram-plane fa-4x"></i><p>Other</p></a>
          <ul class="othermenu clearfix" id="othermenu">
            <li class="clearfix" id="firstother"><a href="contactus.php">Online form</a></li>
            <li class="clearfix"><a href="#">Email</a></li>
            <li class="clearfix"><a href="#">Phone</a></li>
            <li class="clearfix"><a href="#">Address</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
  <div class="copyright">
    <p>&#169;Copyright 2018 Sports Warehouse. <span>All rights reserved. </span><span>Website made by Shan ali hassan.</span></p>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/plugins/jquery.validate/jquery.validate.min.js"></script>
  <script src="js/custom.min.js"></script>
</body>
</html>
