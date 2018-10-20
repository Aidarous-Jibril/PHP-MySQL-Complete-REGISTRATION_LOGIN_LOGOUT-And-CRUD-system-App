
<?php	session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<header>
		<nav>
			<div class="main-wrapper">
				<ul>
					<li>
						<h1><a href="index.php">Home</a></h1>	
					</li>
				</ul>

				<div class="nav-login">
					<form action="includes/login.inc.php" method="POST" >
						<input type="text" name="username" placeholder="Username/Email">
						<input type="text" name="password" placeholder="Password">
						<button type="submit" name="submit">Login</button>
					</form>

					<a href="signup.php">SignUp</a>
				</div>
			</div>
		</nav>
	</header>

