

<?php include_once ('header.inc.php'); ?>


<?php
	
	function visaAktiviteter(){
			
		$conn = mysqli_connect('localhost', 'root', '', 'chatproject');
		$sql_result = $conn->query("SELECT * FROM aktiviteter;")  or die("gick inte att ställa frågan");
		
		echo "<div class='container'>";
		echo "<table class='table table-striped table-bordered' >";
		echo	"<tr class='danger'>";
		echo		"<th>Radera</th> <th><b>id</b></th> <th>Aktivitetsnamn</th> <th>Gata</th> <th>Post</th> <th>Ort</th> <th>Datum</th>";
		echo	"</tr>";
		
		while($rad = mysqli_fetch_array($sql_result )){
		echo "<tr>";
			echo "<td>";
				echo "<form action='delete.inc.php' method='POST'>";
				echo "<input type='hidden' name='att_Radera' value=' " .$rad['id']." ' >";	
				echo "<input type='hidden' name='tar_bort' value='1' >";
				echo "<input type='submit'  value='Ta bort' >";	
				echo "</form>";
			echo "</td>";
			
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

	 if(isset($_POST['tar_bort'])){
		if($_POST['tar_bort'] == "1"){
		$_POST['tar_bort'] = "0";
		unset($_POST['tar_bort']);
		
		$attRadera = intval ($_POST['att_Radera']);
		$sql = " DELETE FROM aktiviteter WHERE id=' " .$attRadera. " '; ";
		$conn = mysqli_connect("localhost", "root", "",  "chatproject") or die ("kunde inte ansluta");
		$conn->query($sql) or die("kunde inte anställa sql frågan") ;
			
		mysqli_close($conn);
			
		}	
}		
			
 	else {
	visaAktiviteter();
	}	

?>

<?php include_once ('footer.inc.php'); ?>