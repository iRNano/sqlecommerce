<?php
	$host = "localhost"; //localhost:8000
	$db_username = "root"; 
	$db_password = "";
	$db_name = "sqlecommerce";

	//connect to database
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);
	if(!$conn){
		die("Connection Failed: " . mysqli_error($conn));
	}

?>