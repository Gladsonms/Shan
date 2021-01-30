<?php  
	require_once "classes/DBAccess.php"; 
	 
	//get database settings
	include "settings/db.php"; 
	 
	//create database object  
	$db = new DBAccess($dsn, $username, $password); 
	 
	//connect to database  
	$pdo =$db->connect(); 

	//start buffer  
	ob_start();      
	
	//check if there is a query string field named id, if not, dislplay all items  
	if(isset($_GET["id"])) {    
		$sql = "select 	item_id, item_name, item_price, item_saleprice, item_photo, item_description 
					 from 	item where item_id = :id"; 
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(":id", $_GET["id"]);
		$rows = $db->executeSQL($stmt); 
		//display item   
		include "templates/item.html.php";  
	}
	 
	$output = ob_get_clean(); 

	$title = "$productName"; 
	 
	include "templates/layout.html.php"; 
	 
	$pdo = null;
?>
