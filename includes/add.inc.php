
		
<?php include_once ('header.inc.php'); ?>




	

				
				
			<div  class="container">	
				<h1 class="text-center text-success bg-danger">Lägg till en aktivitet</h1>
			</div>	
			
<?php

		function formular(){
			
			echo "<form action='add.inc.php' method='post'>";
				
				echo "<div class='container'>";
				echo "<table class='table table-striped table-bordered'>";
					echo  "<tr><td>Aktivitetsnamn</td> <td><input type='text' name='aktivitets_namn'/> </td><tr>";
					echo  "<tr><td>Gata</td><td><input type='text' name='gata' /> </td><tr>";
					echo  "<tr><td>Post</td><td><input type='text' name='post' /> </td><tr>";
					echo  "<tr><td>Ort</td><td><input type='text' name='ort'  /> </td><tr>";
					echo  "<tr><td>Datum</td><td><input type='text' name='datum'  id='datetimepicker'  /> </td><tr>";
					
				//		echo  "<tr><td>Datum</td><td><input type='text' name='datum'  class='form-control'  /> </td><tr>"; 
					
					echo  "<tr><td rowspan='2'></td> <td><input type='submit' value='lagg_till' /> </td><tr>";
					echo  "<tr><td rowspan='2'></td> <td><input type='hidden' name='vill_lagg_till' value='1' /> </td><tr>";
				
				echo "</table>";
				echo "</div>";
				"</form>";
		}

			if(isset($_POST['vill_lagg_till'])){
				if($_POST['vill_lagg_till'] == "1"){
					$_POST['vill_lagg_till'] = "0";
					unset($_POST['vill_lagg_till']);
					
					
					//hämta alla nya värden från formuläret 
					$aktivitets_namn = htmlentities ($_POST['aktivitets_namn']);
					$gata = htmlentities ($_POST['gata']);
					$post = htmlentities ($_POST['post']);
					$ort =  htmlentities ($_POST['ort']);
					$datum = htmlentities ($_POST['datum']);
					
					
					//stoppa in nya värden i databasen genom INSERT INTO satsen
					$sql = "INSERT INTO aktiviteter(Aktivitets_namn, Gata, Post, Ort, Datum) 
					VALUES ('$aktivitets_namn', '$gata', '$post', '$ort', '$datum')";
					$conn = mysqli_connect('localhost', 'root', '',  'chatproject') or die ("kunde inte ansluta");
					$conn->query($sql) or die("kunde inte anställa sql frågan") ;
					
					echo "du har lagt in den här aktiviteten: .$aktivitets_namn";
					mysqli_close ($conn); 
				}
				
				
			}
			
			else {
				formular();
				}


?>

		<link href="jqueryui/jquery-ui.css" rel="stylesheet" type="text/css" />
		<link href="jqueryui/jquery-ui.structure.css" rel="stylesheet" type="text/css" />
		
			<script src="jqueryui/jquery-3.3.1.js"></script>
			<script src="jqueryui/jquery-ui.js"></script> 
			
				<script language="JavaScript"  type="text/javascript">	
				
					var $j = jQuery.noConflict();
					$j("#datetimepicker").datepicker({changeMonth: true, showOtherMonths: true, showWeek: true, weekHeader: "week",
						maxDate: new Date(2020,11,31), showButtonPanel: true, closeText: "Close"});
				
				</script>

	
	
	
	
<?php include_once ('footer.inc.php'); ?>