<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "chatproject";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName  ) or die('Could not connect to MySQL: ' .mysqli_connect_error());

?>	