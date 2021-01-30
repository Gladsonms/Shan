<?php
  require_once "classes/DBAccess.php";
  $title = "Delete";
  //get database settings
  include "settings/db.php";
  //create database object
  $db = new DBAccess($dsn, $username, $password);
  //connect to database
  $pdo = $db->connect();
  $message = "";

  //get categories to poulate drop down list
  $sql = "select category_id, category_name from category";
  $stmt = $pdo->prepare($sql);
  //execute SQL query
  $categoryRows = $db->executeSQL($stmt);

  //get product id to delete
  if(!empty($_GET["id"]) && !empty($_GET["photo"])) {
    //set up query to execute
    $sql = "delete from item where item_id=:itemId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":itemId" , $_GET["id"], PDO::PARAM_INT);
    //execute SQL query
    $db->executeNonQuery($stmt, true);
    $message = "The product was deleted";
    //delete the file if the photo is not set to none
    if($_GET["photo"] != "none") {
      $file = "images/products/" . $_GET["photo"];
      if (!unlink($file)) {
        $message = "Error deleting $file";
      }
      else {
        $message = "The product and photo was deleted";
      }
    }
  }
  //select all categories to display in a table
  $sql = "select item_id, item_name, item_photo, item_description from item";
  $stmt = $pdo->prepare($sql);
  $productRows = $db->executeSQL($stmt);

  //start buffer
  ob_start();
  //display categories
  include "templates/deleteProducts.html.php";
  $output = ob_get_clean();
  include "templates/adminlayout.html.php";
?>
