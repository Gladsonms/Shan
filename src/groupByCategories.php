<?php  
	require_once "classes/DBAccess.php"; 
	 
	$title = "View Products"; 
	 
	//get database settings
	include "settings/db.php"; 
	 
	//create database object  
	$db = new DBAccess($dsn, $username, $password); 
	 
	//connect to database  
	$pdo = $db->connect(); 
   
	//start buffer  
	ob_start();      
	
	//check if there is a query string field named id, if not, dislplay all products  
	if(isset($_GET["id"])) {    
		$sql = "select 	item_id, item_name, item_price, item_saleprice, item_photo, category.category_name 
					 from 		item, category 
					 where 		item_categoryid = :id
					 and 			item.item_categoryid = category.category_id"; 
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(":id", $_GET["id"]);
		$rows = $db->executeSQL($stmt);
		//display products   
		include "templates/productsresults.html.php";  
	} 
	else {
		$sql = "select 	item_id, item_name, item_price, item_saleprice, item_photo 
				from 	item"; 
		$stmt = $pdo->prepare($sql);
		$rows = $db->executeSQL($stmt);        
		//display products   
		include "templates/productsresults.html.php";	
	}
	 
	$output = ob_get_clean(); 
	 
	include "templates/layout.html.php"; 
	 
	$pdo = null;
?>
