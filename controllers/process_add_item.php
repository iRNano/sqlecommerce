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

		if($_FILES['image'] == "" || !isset($_FILES['image'])){
			$errors++;
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
		//1.Capture all the data
		$name = $_POST["name"];
		$price = $_POST["price"];
		$description = $_POST["description"];
		$category_id = $_POST["category_id"];

		//for image uploading/path
		$destination = "../assets/images/";				
		$file_name = $_FILES['image']['name'];

		//2. Move uploaded image
		move_uploaded_file($_FILES['image']['tmp_name'], $destination.$file_name);
		$image = $destination . $file_name;
		//3. Create a query to add an item;
		$add_item_query = "INSERT INTO items(name, price, description,category_id, image) VALUES('$name', '$price', '$description', '$category_id', '$image')";
		//4 Use mysqli_query to add the item to the database
		$new_item = mysqli_query($conn, $add_item_query);

		//5 Back to catalog if successful
		header("location: ../views/catalog.php");
	}else{
		header("location: " .$_SERVER['HTTP_REFERER']);
	}
 ?>