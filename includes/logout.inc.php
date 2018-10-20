<?php	session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
		
        <title></title>
       <link href="style.css" rel="stylesheet" type="text/css" />

     
    </head> 

    <body>
		<?php
		if (isset($_SESSION['login'])){
			unset($_SESSION['login']);
			echo "<h2>YOU are logged out now!</h2>";	
			//exit();
			
			echo "<h3> <a href='../index.php'>logga in igen</a> </h3>";
		}
		else
		{
			echo "<h3> <a href='../index.php'>login again</a> </h3>";
		}
		?>
        
    </body>
</html>   