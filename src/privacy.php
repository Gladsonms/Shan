<?php
	$title = "Privacy Policy";
	
	//start buffer
	ob_start();

	//display confirmation
	include "templates/privacy.html.php";

	$output = ob_get_clean();

	include "templates/layout.html.php"
?>
