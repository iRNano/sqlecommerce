<?php 
	session_start();

	$name = $_GET["name"];
	unset($_SESSION['cart'][$name]);

	header('location: ' . $_SERVER['HTTP_REFERER']);
 ?>