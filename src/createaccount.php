<?php
  require_once "classes/Authentication.php";
  $title = "Create new account";
  
  //the authentication class is static so there is no need to create an instance of the class
  $message = "";
  if(!empty($_POST["username"]) && !empty($_POST["password"])) {
    //add user
    $message = Authentication::createUser($_POST["username"], $_POST["password"]);
  }

  //display confirmation
  include "templates/createaccount.html.php";
?>
