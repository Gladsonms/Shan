<?php
  require_once "classes/Authentication.php";
  $title = "Login success";
  if(isset($_SESSION["username"])) {
    $loginName = $_SESSION["username"];
  }
  //start buffer
  ob_start();
  //display create user form
  include "templates/login-success.html.php";
  $output = ob_get_clean();
  include "templates/layout.html.php";
?>
