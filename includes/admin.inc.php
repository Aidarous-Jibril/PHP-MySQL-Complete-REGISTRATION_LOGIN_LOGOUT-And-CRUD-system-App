


	<?php include_once 'header.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
		
		<title>Adminsida</title>
    </head> 

	
		
<body  style="background-color: lightyellow;">

			<h1 class="text-center text-success bg-primary">Nästa kommade aktiviteter </h1>
			 <div class="container">
			 
					<table class="table table-striped table-bordered">	
							  <tr class="danger">
									<th>Aktivitetsnamn</th> <th>Adress</th> <th>Post</th> <th>Ort</th> <th>Datum</th><br/>
							</tr>	  
							 <tr>
								<td>Tenis</td> <td>Hemmagatan 1</td><td>74560</td> <td>Uppsala</td> <td>2018/8/1</td><br/>
							</tr>
							
							<tr>
								 <td>Orientation</td> <td>Brogatan 1</td><td>88860</td> <td>Gävle</td> <td>2018/9/1</td><br/>
							</tr>
							
							<tr>
								  <td>Jagning</td> <td>Thomasvägen 2</td><td>55560</td> <td>Trallhätten</td> <td>2018/10/1</td><br/>
						  </tr>
						
					</table>
			</div>		
			
		

		<?php

			if (isset($_SESSION['login'])){
		
			echo "<h5 class='text-left '>Välkommen: You are logged as: </h5>"    . $_SESSION['login'] . '<br />';	
			echo " <div class='text-right'> <h4> <a  href='logout.inc.php'>logga ut</a> </h4> </div>";
			
		}
		else{
			echo "<a href='../index.php'>";	
			}
			
		?>  



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    	<?php include_once 'footer.inc.php'; ?>
  </body>
</html>