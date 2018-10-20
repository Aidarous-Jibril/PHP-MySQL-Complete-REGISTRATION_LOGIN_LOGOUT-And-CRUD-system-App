<h1 class="text-center text-success bg-primary">Kommadne aktiviteter </h1>

<?php include_once ('header.inc.php'); ?>



<?php
	
	function visaAktiviteter(){
			
		$conn = mysqli_connect('localhost', 'root', '', 'chatproject');
		$sql_result = $conn->query("SELECT * FROM aktiviteter;")  or die("gick inte att ställa frågan");
		
		echo "<div class='container'>";
		echo "<table class='table table-striped table-bordered' >";
		echo	"<tr class='danger'>";
		echo		"<th><b>id</b></th> <th>Aktivitetsnamn</th> <th>Gata</th> <th>Post</th> <th>Ort</th> <th>Datum</th>";
		echo	"</tr>";
		
		while($rad = mysqli_fetch_array($sql_result )){
		echo "<tr>";
			echo "<td class='info'>" .$rad['id'].  "</td>";
			echo "<td class='info'>" .$rad['Aktivitets_namn'].  "</td>";
			echo "<td class='info'>" .$rad['Gata'].  "</td>";
			echo "<td class='info'>" .$rad['Post'].  "</td>";
			echo "<td class='info'>" .$rad['Ort'].  "</td>";
			echo "<td class='info'>" .$rad['Datum'].  "</td>";
			echo "</tr>";
		}	
		echo "</table>";
		echo "<div>";
		mysqli_close($conn);
	}
	visaAktiviteter();	

?>



<?php include_once ('footer.inc.php'); ?>