<?php
  require_once "classes/DBAccess.php";
  $title = "Update Category";
  //get database settings
  include "settings/db.php";
  //create database object
  $db = new DBAccess($dsn, $username, $password);
  //connect to database
  $pdo = $db->connect();
  $message = "";

  //update the category when the button is clicked
  if(isset($_POST["submit"])) {
    //check a category name and id was supplied
    if(!empty($_POST["CategoryName"]) && !empty($_POST["CategoryId"])) {
      //set up query to execute
      $sql = "update category set category_name=:CategoryName where category_id = :CategoryId";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(":CategoryName" , $_POST["CategoryName"], PDO::PARAM_STR);
      $stmt->bindValue(":CategoryId" , $_POST["CategoryId"], PDO::PARAM_INT);
      //execute SQL query
      $db->executeNonQuery($stmt, false);
      $message = "The category was updated";
    }
  }

  //display the category to be updated
  //get the category id from the query string or from the posted data if the submit button was pressed
  if(isset($_GET["id"])) {
    $catId = $_GET["id"];
  }
  elseif (isset($_POST["CategoryId"])) {
    $catId = $_POST["CategoryId"];
  }
  else {
    $catId = 0;
  }

  $sql = "select category_id, category_name from category where category_id =
  :CategoryId";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":CategoryId" , $catId, PDO::PARAM_INT);
  $rows = $db->executeSQL($stmt);
  //select all categories to display in a table
  $sql = "select category_id, category_name from category";
  $stmt = $pdo->prepare($sql);
  $categoryRows = $db->executeSQL($stmt);

  //start buffer
  ob_start();
  //display categories
  include "templates/updateCategory.html.php";

  $output = ob_get_clean();
  include "templates/adminlayout.html.php";
?>
