<?php  
	require_once "classes/DBAccess.php"; 
	 
	$title = "Sports Warehouse"; 
	 
	//get database settings
	include "settings/db.php";  
	 
	//create database object  
	$db = new DBAccess($dsn, $username, $password); 
	 
	//connect to database  
	$pdo = $db->connect(); 
	 
	//start buffer  
	ob_start();      
	
	//select feature products  
	$sql = "select 	item_id, item_name, item_price, item_saleprice, item_photo 
				 from 	item 
				 where 	item_featured = true"; 
  $stmt = $pdo->prepare($sql);
  $rows = $db->executeSQL($stmt);   
	  
	include "templates/home.html.php";   
	
	$output = ob_get_clean(); 

	//display products   
  
	 
	include "templates/layout.html.php"; 
	 
	$pdo = null;
?>
