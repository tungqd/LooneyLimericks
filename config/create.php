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
	
	$tableQuery = "USE $database;";
	$tableQuery .= "DROP TABLE IF EXISTS Poem;";
	$tableQuery .= "CREATE TABLE Poem (ID INT not null,title VARCHAR(30) not null,author VARCHAR(30) not null,content VARCHAR(200) not null,
        timeSelected TIME,PRIMARY KEY(ID));";
    $tableQuery .= "DROP TABLE IF EXISTS Rating;";
    $tableQuery .= "CREATE TABLE Rating (ID INT not null, pID INT not null, rating INT not null, PRIMARY KEY(ID),
        FOREIGN KEY(pID) REFERENCES Poem(ID) ON UPDATE CASCADE);";
 
    
  	if (mysqli_multi_query($db,$tableQuery)) {
  		echo "Schemas for $database created successfully.";
  	} else {
 		 echo "Error creating tables: " . mysqli_error($db);
 	}

    
?>
