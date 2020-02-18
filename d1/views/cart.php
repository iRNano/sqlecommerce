<?php 
	require '../templates/template.php';
	
	function get_content(){
		require '../controllers/connection.php';
		//PROCESS ADD TO CART
		//1. catalog add input field for quantity and button
		//2. Send the item_id along with the form
		//3. In controller, capture id and quantitym using session, store the data
	?>
		<h1 class="container">Cart Page</h1>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<table class="table table-stripped">
						<thead>
							<th>Product Name: </th>
							<th>Price: </th>
							<th>Quantity: </th>
							<th>Subtotal: </th>
						</thead>
						<tbody>
							<?php 

								$products_query = "SELECT * FROM items";
								$products = mysqli_query($conn,$products_query);

								$total = 0;

								if(isset($_SESSION['cart'])){
									foreach ($_SESSION['cart'] as $name => $quantity) {
										foreach ($products as $product){
											if($name==$product['name']){
												$subtotal = $quantity*$product
												['price'];
												$total += $subtotal;
												?>
													<tr>
														<td><?php echo $product['name']; ?></td>
														<td><?php echo $product['price']; ?></td>
														<td><?php echo $quantity; ?></td>
														<td>
															PHP <?php echo $subtotal; ?>
														</td>
														<td>
															<a href="../controllers/process_remove_item.php?name=<?php echo $product['name']?>" class="btn btn-danger"><i class="fas fa-trash">Remove Item</i></a>
														</td>
													</tr>
												<?php
											}
										}
									}
								}
							?>
							<tr>
								<td></td>
								<td></td>
								<td>
									<a href="../controllers/process_empty_cart.php" class="btn btn-danger">Empty Cart
									</a>
								</td>
								<td>Total:<?php echo $total; ?></td>
							</tr>
						</tbody>	
					</table>
				</div>
			</div>
		</div>
	<?php
	}
 ?>