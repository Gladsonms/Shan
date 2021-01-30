<?php
  require_once "classes/DBAccess.php";
  $title = "Insert Product";
  //get database settings
  include "settings/db.php";
  //create database object
  $db = new DBAccess($dsn, $username, $password);
  //connect to database
  $pdo = $db->connect();
  //get categories to poulate drop down list
  $sql = "select category_id, category_name from category";
  $stmt = $pdo->prepare($sql);
  //execute SQL query
  $categoryRows = $db->executeSQL($stmt);
  //get brandss to populate drop down list
  $sql = "select brand_id, brand_name from brand";
  $stmt = $pdo->prepare($sql);
  //execute SQL query
  $brandRows = $db->executeSQL($stmt);
  $message = "";

  //insert product when the button is clicked
  if(isset($_POST["submit"])) {
    //check if checkbox for featured is ticked
    if (isset($_POST["featured"])) {
      $featured = 1;
      }
    else {
      $featured = 0;
    }

    //save the file
    //specify directory where image will be saved
    $targetDirectory = "images/products/";
    //get the filename
    $imagePath = basename($_FILES["imagePath"]["name"]);
    //set the entire path
    $targetFile = $targetDirectory . $imagePath;
    //only allow image files
    $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $error = true;
    } else {
      $error = false;
    }
    
    //check the file size php.ini has an upload_max_filesize, default set to 2M
    //if the file size exceeds the limit the error code is 1
    if ($_FILES["imagePath"]["error"] == 1) {
      $message = "Sorry, your file is too large. Max of 2M is allowed.";
      $error = true;
    } else {
      $error = false;
    }
    if($error == false) {
      if (move_uploaded_file($_FILES["imagePath"]["tmp_name"], $targetFile)) {
        $message = "The file $imagePath has been uploaded.";
      }
      else {
        $message = "Sorry, there was an error uploading your file. Error Code:" .
        $_FILES["imagePath"]["error"];
        $imagePath = "";
      }
    }

    //set up query to execute
    //insert product
    $sql = "insert into item(item_name, item_categoryid, item_brandid, item_saleprice,
     item_Price, item_description, item_featured, item_photo)
     values(:ProductName, :CategoryID, :BrandID, :SalePrice, :ItemPrice,
     :Description, :Featured, :ImagePath)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":ProductName" , $_POST["productName"], PDO::PARAM_STR);
    $stmt->bindValue(":CategoryID" , $_POST["category"], PDO::PARAM_INT);
    $stmt->bindValue(":BrandID" , $_POST["brand"], PDO::PARAM_INT);
    $stmt->bindValue(":SalePrice" , $_POST["salePrice"], PDO::PARAM_STR);
    $stmt->bindValue(":ItemPrice" , $_POST["itemPrice"], PDO::PARAM_STR);
    $stmt->bindValue(":Description" , $_POST["description"], PDO::PARAM_STR);
    $stmt->bindValue(":Featured" , $featured, PDO::PARAM_BOOL);
    $stmt->bindValue(":ImagePath" , $imagePath, PDO::PARAM_STR);

    //execute SQL query
    $id = $db->executeNonQuery($stmt, true);
    $message = "The product was added, id: " . $id;
  }
  //start buffer
  ob_start();
  //display form
  include "templates/insertProduct.html.php";
  $output = ob_get_clean();
  include "templates/adminlayout.html.php";
?>
