<?php 

	$dbName = "ssb547project";
	$dbUser = "root";
	$dbPass = "";
	$dbHost = "localhost";

	$db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	if ( $db ) {
		// code...
	}
	else{
		die("Connection Failed" .  mysqli_error($db));
	}

 ?>