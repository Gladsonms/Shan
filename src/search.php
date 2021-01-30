<?php  
	require_once "classes/DBAccess.php"; 
	 	 
	//check if the search button has been pressed
	if ($_GET["search"] != NULL) {
		$title = "Search result";  
		$search = "%".$_GET["search"]."%";   
		
		//get database settings
		include "settings/db.php"; 
		 
		//create database object   
		$db = new DBAccess($dsn, $username, $password); 
		 
		//connect to database   
		$pdo = $db->connect(); 

		//start buffer  
		ob_start(); 
		 
		//set up query to execute   
		$sql = "select 	item_id, item_name, item_price, item_saleprice, item_photo 
					 from 		item 
					 where 		item_name like :search";      
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(":search", $search);
		$rows = $db->executeSQL($stmt);        	    
		//display products   
		include "templates/searchresults.html.php"; 
		$output = ob_get_clean(); 
	 	include "templates/layout.html.php"; 
	}
	else {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} 
?>
