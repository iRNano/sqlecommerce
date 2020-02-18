<?php
	require "../templates/template.php";
	require "../controllers/connection.php";
	function get_content(){

	}
?>

	<h1 class="text-center py-4">Catalog</h1>
	<div class="container">
		<div class="row">
			<?php 
				//Steps for retrieving items
					//1. Create a query
					//2. Use mysqli_query to get the results
					//3. If result returns an "array" use "foreach"
					//4. If result returns an "object" use "mysqli_fetch_assoc" to an "associative array"
						//A. Use foreach (result as key => value)

				$items_query = "SELECT * FROM items";
				$items = mysqli_query($conn, $items_query);

				foreach($items as $item){
				?>
					<div class="col-lg-4 py-2">
						<div class="card h-100">
							<img class="card-img-top" height="300px" src="<?php echo $item['image']; ?>"></img>
							<div class="card-body">
								<h5 class="card-title"><?php echo $item['name']; ?></h5>
								<p class="card-text">PHP <?php echo $item['price'];?></p>
								<p class="card-text"><?php echo $item['description'];?></p>

							<?php 
								//1. Query the category details where the "id" is equal to "$item['category_id']"

								$categoryID = $item['category_id'];
								$category_query = "SELECT name FROM categories where id = $categoryID";
								//returned query is an object -> convert to assoc array -> research
								$category = mysqli_fetch_assoc(mysqli_query($conn,$category_query));
							?>
								<p class="card-text"><?php echo $category['name']?></p>
							</div>
							<div class="card-footer">
								<a href="edit_item.php?id=<?php echo $item['id'];?>" class="btn btn-primary">Edit Item</a>
								<a href="delete_item.php?id=<?php echo $item['id'];?>" class="btn btn-primary">Delete Item</a>
							</div>
						</div>
					</div>

				<?php 
					
				}
			?>
		</div>
	</div>