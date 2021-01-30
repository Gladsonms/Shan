<?php
  require_once "classes/Item.php";
  require_once "classes/ShoppingCart.php";
  session_start();
  $title = "Thanks";
  if(isset($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
  }  $pageHeading = "Order Confirmation";
  $orderId = 0;
  //check pay button was pressed and there is a cart in the session
  if(isset($_POST["pay"]) && isset($_SESSION["cart"]))
  {
  //get all the posted data
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $creditcard = $_POST["creditcard"];
  $csv = $_POST["csv"];
  $email = $_POST["email"];
  $expiry = $_POST["expiry"];
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $nameOnCard = $_POST["nameOnCard"];
  //retreive shopping cart from session
  $cart = $_SESSION["cart"];
  //save the shopping cart
  $orderId = $cart->saveCart($address, $phone, $creditcard, $csv, $email, $expiry,
  $firstName, $lastName, $nameOnCard);
  //clear the session
  session_destroy();
  }
  //start buffer
  ob_start();
  //display order confirmation
  include "templates/order-confirmation.html.php";
  $output = ob_get_clean();
  include "templates/cart-layout.html.php";
?>
