<?php

    $host = "localhost";
	$user = "root";
	$pass = "";
	$database = "hw3";
	
	$db = mysqli_connect($host, $user, $pass) or die('Could not connect: ' . mysql_error());
	$query = "CREATE DATABASE $database";
	if (mysqli_query($db,$query)) {
  		echo "Database $database created successfully";
  	} else {
 		 echo "Error creating database: " . mysqli_error($db);
 	}
	
?>
