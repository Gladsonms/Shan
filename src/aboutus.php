<?php
	$title = "About Us";
	
	//start buffer
	ob_start();

	//display confirmation
	include "templates/aboutus.html.php";

	$output = ob_get_clean();

	include "templates/layout.html.php"
?>
