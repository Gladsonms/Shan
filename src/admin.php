<?php
  // require_once "classes/AdminAuthentication.php";
  $title = "Dashboard";
  
  //start buffer
  ob_start();
  //display form
  include "templates/dashboard.html.php";
  $output = ob_get_clean();
  include "templates/adminlayout.html.php"
?>
