	<?php
		include_once 'header.php';
	?>

	<section class="container">
			<div class="container-wrapper">
				<h1>SignUp</h1>
				<form class="signup-form" action="includes/signup.inc.php" method="POST" >
					<input type="text" name="first_name" placeholder="First Name">
					<input type="text" name="last_name" placeholder="Last Name">
					<input type="text" name="email" placeholder="Email">
					<input type="text" name="username" placeholder="Username">
					<input type="text" name="password" placeholder="Password">
					<button type="submit" name="submit">Signup</button>

				</form>
			</div>
	</section>

	<?php
		include_once 'footer.php';
	?>
