<?php
  require_once "classes/Item.php";
  require_once "classes/ShoppingCart.php";
  session_start();
  $title = "Checkout";
  if(isset($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
  }
  
  //start buffer
  ob_start();

  //display confirmation
  include "templates/checkout.html.php";

  $output = ob_get_clean();

  include "templates/cart-layout.html.php"
?>
