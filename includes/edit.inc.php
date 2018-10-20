<?php include_once ('header.inc.php'); ?>


<?php
	
	function visaAktiviteter(){
			
		//$conn = mysqli_connect('localhost', 'ajji0001', 'Lafaciise111', 'ajji0001');
		$conn = mysqli_connect('localhost', 'root', '', 'chatproject');
		$sql_result = $conn->query("SELECT * FROM aktiviteter;")  or die("gick inte att ställa frågan");
		
		echo "<div class='container'>";
		echo "<table class='table table-striped table-bordered'>";
		echo	"<tr class='warning'>";
		echo		"<th>Ändra</th> <th><b>id</b></th> <th>Aktivitetsnamn</th> <th>Gata</th> <th>Post</th> <th>Ort</th> <th>Datum</th>";
		echo	"</tr>";
		
		while($rad = mysqli_fetch_array($sql_result )){
		echo "<tr>";
				echo "<td> <form action='edit.inc.php' method='POST'>";
				echo	"<input type='hidden'  name='vill_editera' value='1' />";
				echo	"<input type='hidden' name='id'      value=' " .$rad['id']. "'/>";
				echo	"<input type='hidden' name='aktivitets_namn' value=' " .$rad['Aktivitets_namn']. " ' />";
				echo	"<input type='hidden' name='gata' value=' " .$rad['Gata']. " ' />";
				echo	"<input type='hidden' name='post' value=' " .$rad['Post']. " ' />";
				echo	"<input type='hidden' name='ort'  value=' " .$rad['Ort']. " ' />";
				echo	"<input type='hidden' name='datum' value=' " .$rad['Datum']. " ' />";
				echo	"<input type='submit' value=' Editera ' />";
				echo "</td> </form>";
			
			echo "<td>" .$rad['id'].  "</td>";
			echo "<td>" .$rad['Aktivitets_namn'].  "</td>";
			echo "<td>" .$rad['Gata'].  "</td>";
			echo "<td>" .$rad['Post'].  "</td>";
			echo "<td>" .$rad['Ort'].  "</td>";
			echo "<td>" .$rad['Datum'].  "</td>";
			echo "</tr>";
		}	
		echo "</table>";
		echo "<div>";
	}
	
	
	
	
 if(isset($_POST['vill_editera'])){
		if($_POST['vill_editera'] == "1"){
		$_POST['vill_editera'] = "0";
		
			
			
			$aktivitets_namn = htmlentities ($_POST['aktivitets_namn']);
			$gata =   htmlentities ($_POST['gata']);
			$post =   htmlentities ($_POST['post']);
			$ort =    htmlentities ($_POST['ort']);
			$datum =  htmlentities ($_POST['datum']);
			$id =     htmlentities ($_POST['id']);
			
		
			echo "<form action='edit.inc.php' method='POST'>  \n";
			echo "<table border= 0>  \n";
			
			echo	"<tr><td>Aktivitetsnamn</td>  <td><input type='text' name='aktivitets_namn' value=' " .$aktivitets_namn. " '> </td></tr> \n";
			echo	"<tr><td>Gata</td> <td> <input type='text' name='gata' value=' " .$gata. " '/> </td></tr> \n";
			echo	"<tr><td>Post</td> <td> <input type='text' name='post' value=' " .$post. " '/> </td></tr>  \n";
			echo	"<tr><td>Ort</td> <td> <input type='text' name='ort'  value=' " .$ort. " '/> </td></tr>  \n";
			echo	"<tr><td>Datum</td> <td><input type='text' name='datum' value=' " .$datum. " '   />  </td></tr>  \n";
			echo	"<tr><td rowspan='2'> <input type='submit' value=' Spara ändringar '/> </td></tr>  \n";
			echo	"<tr><td rowspan='2'> <input type='hidden' name='Editerat' value='1'/> </td></tr>  \n";
			echo	"<tr><td rowspan='2'> <input type='hidden' name='attEditera' value=' " .$id. "'/> </td></tr>  \n";		
			
			echo "</table> \n";
			echo " </form> \n";
			
	//	mysqli_close($conn);
			
		}	
}		

 else if(isset($_POST['Editerat'])){
		if($_POST['Editerat'] == "1"){
		$_POST['Editerat'] = "0";
		
			
			
			$aktivitets_namn = htmlentities ($_POST['aktivitets_namn']);
			$gata =   htmlentities ($_POST['gata']);
			$post =   htmlentities ($_POST['post']);
			$ort =    htmlentities ($_POST['ort']);
			$datum =  htmlentities ($_POST['datum']);
			$attEditera =  intval($_POST['attEditera']);	
			
  $sql= "UPDATE aktiviteter SET" .
		"Aktivitets_namn=\"" . $aktivitets_namn . "\" " .
		"Gata=\"" . $gata . "\" " .
		"Post=\"" . $post . "\" " .
		"Ort=\"" . $ort . "\" " .
		"Datum=\"" . $datum . "\" WHERE id=\"" . $attEditera . "\"; " ;
		echo $sql;
		
		//koppla mot db
		
		$conn = mysqli_connect("localhost", "root", "",  "chatproject") or die ("kunde inte ansluta");
		//$conn->query($sql) or die("Gick inte att lägga till i databasen") ;
		
		//$conn = mysqli_connect('localhost', 'ajji0001', 'Lafaciise111', 'ajji0001');
		$sql_result = $conn->query($sql)  or die("gick inte att ställa frågan");
		
		//stänga db koppling		
		mysqli_close($conn);
		}

 }
 	else {
	visaAktiviteter();
	}	

 
?>
  

<?php include_once ('footer.inc.php'); ?>
