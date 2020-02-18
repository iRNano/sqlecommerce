<?php 
	require "../templates/template.php";

	function get_content(){
		require "../controllers/connection.php";
		$itemId = $_GET['id'];
		$item_query = "SELECT * FROM items WHERE id=$itemId";
		$item = mysqli_fetch_assoc(mysqli_query($conn, $item_query));
	?>	
		<!-- Process for editing item -->
			<!-- 1. Capture the item id -->
			<!-- 2. Create query -->
			<!-- 3. Convert to associative array -->
			<!-- 4. Display all the object data -->
			<!-- 5. Pass the id of the item to edit the controller-->
		

		<h1 class="text-center py-5">EDIT ITEM FORM</h1>

		<div class="container">
			<div class="col-lg-6 offset-lg-3">
				<form action="../controllers/process_edit_item.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Item Name: </label>
						<input class="form-control" type="text" name="name" value="<?php echo $item['name'];?>"></input>
					</div>
					<div class="form-group">
						<label for="price">Price: </label>
						<input type="number" name="price" class="form-control" value="<?php echo $item['price'];?>">
					</div>
					<div class="form-group">
						<label for="description">Item Description: </label>
						<textarea name="description" class="form-control"><?php echo $item['description'];?></textarea>
					</div>
					<div class="form-group">
						<label for="image">Item Image: </label>
						<img src="<?php echo $item['image'];?>" height="50px" width="50px">
						<input type="file" name="image" class="form-control">
					</div>
					<div class="form-group">
						<label for="category_id">Item Category: </label>
						<select name="category_id" class="form-control">
							<?php

							$categoryID = $item['category_id'];
							$category_query = "SELECT * FROM categories";
							$categories = mysqli_query($conn,$category_query);
							var_dump($categories);
							foreach ($categories as $category) {
								?>
								<option value="<?php echo $category['id']?>" <?php echo $categoryID == $category['id']? "selected" : "" ?>><?php echo $category['name']?></option>
								<?php
							}
							?>
						</select>
					</div>
					<input type="hidden" name="id" value="<?php echo $item['id']?>">
					<button class="btn btn-success" type="submit">Edit</button>
				</form>
			</div>
		</div>
	<?php 
	}
 ?>