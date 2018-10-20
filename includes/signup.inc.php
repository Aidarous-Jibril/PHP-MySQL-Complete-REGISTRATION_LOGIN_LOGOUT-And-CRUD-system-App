<?php
	if(isset($_POST['submit'])){

		include_once "db.inc.php";

		//$first_name = htmlentities($conn, $_POST['first_name']);
		$first_name = mysqli_escape_string($conn, $_POST['first_name']);
		$last_name =  mysqli_escape_string($conn, $_POST['last_name']);
		$email =  mysqli_escape_string($conn, $_POST['email']);
		$username =  mysqli_escape_string($conn, $_POST['username']);
		$password =  mysqli_escape_string($conn, $_POST['password']);

		//Error handlers
		//check for input empty	
	/*	if (empty($first_name) || empty($last_name) || empty($email)  || empty($username)  || empty($password) ){
			header('Location: ../signup.php?signup=empty');
			exit();
		} else{
	}
			*/
			//check for Valid characters
			if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)) {
				header('Location: ../signup.php?signup=invalidchar');
				exit();
			} else{

				//check for valid EMAIL
//				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//				header('Location: ../signup.php?signup=invalid-email');
//				exit();
//				}
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  $emailErr = "Invalid email format"; 
				}
				//sql query to db
				 else {
				

					$sql = "SELECT * FROM users WHERE db_username='$username' "; 
					$result =  mysqli_query($conn,  $sql);
					$checkResult = mysqli_num_rows($result);

					//check if its found same username here
					if ($checkResult > 0 ) {
						header('Location: ../signup.php?signup=UsernameTaken');
						exit();
					} else {
						
						//Hash password
						$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

						//inserting data to db
						$sql = "INSERT INTO users (db_username,  db_password, first_name, last_name, email) VALUES ('$username', '$hashedPassword',   '$first_name', '$last_name', '$email')";
						//$result = mysqli_query($conn, $sql);
						$result = $conn->query($sql) ;
						header('Location: ../signup.php?signup=Success');
						exit();
					}
				}


			}

	}

	else{
		header('Location: ../signup.php');
	}




?>