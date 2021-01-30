<?php
  require_once "classes/DBAccess.php";
  $title = "Modify Category";
  //get database settings
  include "settings/db.php";
  //create database object
  $db = new DBAccess($dsn, $username, $password);
  //connect to database
  $pdo = $db->connect();
  $message = "";

  //insert catehory when the button is clicked
  if(isset($_POST["submit"])) {
  //check a category name was supplied
    if(!empty($_POST["CategoryName"])) {
      //set up query to execute
      $sql = "insert into category(category_name) values(:CategoryName)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(":CategoryName" , $_POST["CategoryName"], PDO::PARAM_STR);
      //execute SQL query
      $id = $db->executeNonQuery($stmt, true);
      $message = "The category was added, id: " . $id;
    }
  }
  //get category id to delete
  if(!empty($_GET["id"])) {
    //set up query to execute
    $sql = "delete from category where category_id=:CategoryID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":CategoryID" , $_GET["id"], PDO::PARAM_INT);
    //execute SQL query
    $affectedRows = $db->executeNonQuery($stmt, true);
    if($affectedRows == -1) {
      $message = "The category cannot be deleted because there are products associated with this category.";
    }
    else {
      $message = "The category was deleted";
    }
  }

  //select all categories to display in a table
  $sql = "select category_id, category_name from category";
  $stmt = $pdo->prepare($sql);
  $categoryRows = $db->executeSQL($stmt);

  //start buffer
  ob_start();
  //display form
  include "templates/modifyCategories.html.php";
  $output = ob_get_clean();
  include "templates/adminlayout.html.php";
?>
