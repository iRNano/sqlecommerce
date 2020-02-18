<?php 
	require "./connection.php";

	function validate_form(){

		$errors = 0;

		//Validation logic
			//1. Check if all fields are valid if not add error
			//2. Check if file extension of image is acceptable

		//array for all valid file types
		$file_types = ['jpg', 'jpeg', 'png', 'bmp', 'svg'];

		//file extension used for image validation
		$file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

		if($_POST['name'] == "" || !isset($_POST['name'])){
			$errors++;
		}

		if($_POST['price']<=0 || !isset($_POST['price'])){
			$errors++;
		}

		if($_POST['description'] == "" || !isset($_POST['description'])){
			$errors++;
		}

		if($_POST['category_id'] == "" || !isset($_POST['category_id'])){
			$errors++;
		}

		if($_FILES['image']['name'] != ""){
			if(!in_array($file_ext, $file_types)){
				$errors++;			
			}
		}

		if($errors > 0){
			return false;
		}else{
			return true;
		}

	}

	//Process of adding an item
		//1. Capture all the data from form ($_POST or $_FILES for image);
		//2. Move uploaded image to the assets/images directory.
		//3. Create a query to add an item
		//4. Use mysqli_query to add the item to the database
		//5. Back to catalog if successful
		//6. If unsuccessful go back to add_item_form

	if(validate_form()){
		//Process of editing an item
			//1. Capture all data from form through #_POST OR $_FILES for the image
			//2. Check if user uploaded new image
				//2A. if not, use old image
				//2B. if new, use new image then upload
			//3. Create a query to edit an item
			//4. Use myqli_query to edit the item in the database
			//5. Go back to catalog if successful
			//6. If unsuccessful go back to edit_item_form

		//1. Capture all data from form through #_POST OR $_FILES for the image
		$itemID = $_POST['id'];
		$name = $_POST["name"];
		$price = $_POST["price"];
		$description = $_POST["description"];
		$category_id = $_POST["category_id"];

		//2. Check if user uploaded new image
			//Creates a query to get the old image URL to assign to item, if no image is uploaded

		$item_query = "SELECT image from items where id = $itemID";

		$image_result = mysqli_fetch_assoc(mysqli_query($conn, $item_query));

		//2A. if not use old image
		if($_FILES['image']['name'] == ""){
			$image = $image_result['image'];
		//2B. If new image used then upload
		}else{
			$destination = "../assets/images/";				
			$file_name = $_FILES['image']['name'];	
			move_uploaded_file($_FILES['image']['tmp_name'], $destination.$file_name);
			$image = $destination . $file_name;
		}		
		//3. Create a query to edit an item
		$edit_item_query = "UPDATE items SET name = '$name', price = '$price', description = '$description',category_id = '$category_id', image = '$image' WHERE id=$itemID";
		//4 Use mysqli_query to edit the item to the database
		$edited_item = mysqli_query($conn, $edit_item_query);
		//5 Back to catalog if successful
		header("location: ../views/catalog.php");
	}else{
		//if unsuccessful go back to edit_item_form
		header("location: " .$_SERVER['HTTP_REFERER']);
	}
 ?>