<?php 
	require "../templates/template.php";

	function get_content(){
		?>
			<h1 class="text-center py-4">Register</h1>

			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<form method="POST" action="../controllers/process_register.php">
							<div class="form-group">
								<label for="firstName">First Name: </label>
								<input type="text" name="firstName" class="form-control">
							</div>
							<div class="form-group">
								<label for="lastName">Last Name: </label>
								<input type="text" name="lastName" class="form-control">
							</div>
							<div class="form-group">
								<label for="username">Username: </label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label for="password">Password: </label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label for="confirmPassword">Confirm Password: </label>
								<input type="password" name="confirmPassword" class="form-control">
							</div>
							<button class="btn btn-success" type="submit">Register</button>
							
							
						</form>
					</div>
				</div>
			</div>
		<?php
	}
 ?>