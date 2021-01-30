<?php
  require_once "classes/AdminAuthentication.php";
  $title = "Settings";;
  session_start();
  //the authentication class is static so there is no need to create an instance of the class
  $message = "";
  if(!empty($_POST["newpassword"])) {
    //add user
    $message = AdminAuthentication::changePassword($_SESSION["adminusername"], $_POST["newpassword"]);
  }
  if(!empty($_POST["theme"])){
    $_SESSION["theme"] = $_POST["theme"];
  }

  //read stylesheet theme from session
  if(isset($_SESSION["theme"])) {
    $_SESSION["newtheme"] = "css/". $_SESSION["theme"] . ".css";
  }
  else {
    $theme = "plain.css";
  }
  if(isset($_POST["submit"])) {
    //get the selected colour theme
    $_SESSION["theme"] = $_POST["theme"];
    $_SESSION["newtheme"] = $_SESSION["theme"] . ".css";
  }

  session_write_close();
  //start buffer
  ob_start();
  //display form
  include "templates/settings.html.php";
  $output = ob_get_clean();
  include "templates/adminlayout.html.php"
?>
