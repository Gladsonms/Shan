<?php
  require_once "classes/AdminAuthentication.php";
  $title = "Admin Login";

  //the authentication class is static so there is no need to create an instance of the class
  $message = "";

  session_start();
  if(isset($_POST["signInSubmit"])) {
    $_SESSION["adminusername"] = $_POST["username"];
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
      //authenticate user
      $loginSuccess = AdminAuthentication::login($_POST["username"], $_POST["password"]);
      if(!$loginSuccess) {
        $message = "Username or password incorrect";
        $error = true;
      }
    }
  }
  //display confirmation
  include "templates/adminlogin.html.php";
?>
