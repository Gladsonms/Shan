<?php
  require_once "classes/Authentication.php";
  session_start();
  Authentication::logout();
?>
