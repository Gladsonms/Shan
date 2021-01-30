<?php
  require_once "classes/AdminAuthentication.php";
  session_start();
  AdminAuthentication::logout();
?>
