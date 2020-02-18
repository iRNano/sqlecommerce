<?php
	require "templates/template.php";
	require "controllers/connection.php"; //require connection.php to access $conn variable
	
	$category_query = "SELECT * FROM categories"; //define syntax
	$categories = mysqli_query($conn, $category_query); //define returned queries

?>