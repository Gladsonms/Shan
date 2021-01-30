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
  <link rel="stylesheet" href="css/cart.css">
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
      <!-- This is the content -->             
      <?= $output ?>
    </div>
  </div>

  <div class="copyright">
    <p>&#169;Copyright 2018 Sports Warehouse. <span>All rights reserved. </span><span>Website made by Charles Chen.</span></p>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/plugins/jquery.validate/jquery.validate.min.js"></script>
  <script src="js/custom.min.js"></script>
</body>
</html>
