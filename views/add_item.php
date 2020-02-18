<?php 
	require "../templates/template.php";

	function get_content(){
		require "../controllers/connection.php";		
	?>

		<h1 class="text-center py-5">ADD ITEM FORM</h1>

		<div class="container">
			<div class="col-lg-6 offset-lg-3">
				<form method="POST" action="../controllers/process_add_item.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Item Name: </label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="price">Price: </label>
						<input type="text" name="price" class="form-control">
					</div>
					<div class="form-group">
						<label for="description">Item Description: </label>
						<textarea name="description" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="image">Item Image: </label>
						<input type="file" name="image" class="form-control">
					</div>
					<div class="form-group">
						<label for="category_id">Item Category: </label>
						<select name="category_id" class="form-control">
							<!-- Process for displaying all categories -->
								<!-- 1. Query all the categories from the database -->
								<!-- 2. Create a for loop that will display all categories -->
							<option selected>Select an Option</option>
							<?php 
								$category_query = "SELECT * FROM categories";
								$categories = mysqli_query($conn, $category_query);

								foreach ($categories as $category) {
									?>

									<option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
									<?php 
								}
							 ?>
							<option></option>
						</select>
					</div>
					<button type="submit" class="btn btn-success">Add Item</button>
				</form>
			</div>
		</div>
	<?php 

	}
 ?>