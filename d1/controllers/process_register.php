<?php 
	//Process of adding a user
		//1. Capture all data from form though $_POST
		//2. Validate user input
		//3. Create a query to add a user
		//4. Use mysqli_connect to add the user to the database
		//5. Go back to login if successful
		//6. If unsuccessful show error

	require "connection.php";

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$confirmPassword = sha1($_POST['confirmPassword']);

	//2 Validate user input
	if($firstName !== "" && $lastName !== "" && $username !== "" && $email !== "" && $password !== "" && $password == $confirmPassword){
		//3 Create a query
		$user_query = "INSERT INTO users (lastName, firstName, username, email, password) VALUES ('$lastName', '$firstName', '$username', '$email', '$password')";
		//4 Use mysqli_connect to add
		$new_user = mysqli_query($conn,$user_query);

		//5. Go back to login if successful
		header("location: ../views/login.php");
	}else{
		//6. If unsuccessful show error
		echo "Please fill out the form properly.";
	}
 ?>