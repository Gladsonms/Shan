<?php
	$title = "Sorry";
	
	//start buffer
	ob_start();

	//display confirmation
	include "templates/error.html.php";

	$output = ob_get_clean();

	include "templates/layout.html.php"
?>
