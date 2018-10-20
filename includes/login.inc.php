
<?php	session_start(); ?>

	<?php



			//Inlogning
			if(isset($_POST['submit'])){
				
				include_once "db.inc.php";
				$username =  mysqli_real_escape_string($conn, $_POST['username']);
				$password =  mysqli_real_escape_string($conn, $_POST['password']);
				//$pwd_hash = hash ("sha256", $password);


				$sql = "SELECT * FROM users WHERE db_username = '$username' OR email = '$username' "; //login with username or email
				//AND db_password = '$password' ";
				echo $sql;
		
		//	$result =  mysqli_query($conn,  $sql);
			$result = $conn->query($sql) ;
				
						
					
				//if($rows = mysqli_num_rows($result) == 1){
				if($rows = mysqli_fetch_assoc($result)){
					
					//checking hashed pwd
					$hashedPwdCheck = password_verify($password, $rows['db_password'] );

					//setcookie('username', $username, time() + 60*60*12);
					$_SESSION['login'] = $username;
					header("Location: admin.inc.php?signup=Success");	//Admin sida		
					echo "You are logged in";	
				} 
				
				else
				header('Location: ../index.php?login=error');
					exit();
			
				
				
				
			}
			
?>

