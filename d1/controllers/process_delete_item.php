<?php 
	require "connection.php";

	//Process of deleting an item
		//1. Capture the id of the item to delete
		//2. Create a query to delete the item
		//3. Use mysqli_query to delete the item from the database
		//4. Return to catalog page
	$item_id = $_GET['id'];
	$delete_query = "DELETE FROM items where id = $item_id";
	$delete_item = mysqli_query($conn, $delete_query);
	header("location:" . $_SERVER['HTTP_REFERER']);

 ?>