<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "restaurant";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {
    //echo("Connection failed: " . mysqli_connect_error());
	// Create database because it doesn't exist
	$conn = mysqli_connect($servername, $username, $password);
	$sql = "CREATE DATABASE $dbname";
	if ($conn->query($sql) === TRUE) {
		//echo "Database created successfully";
		
		//Initialize tables into the database (empty)
		$sql = "CREATE TABLE chef (
		  chID VARCHAR(5) NOT NULL,
		  chname VARCHAR(20) DEFAULT NULL,
		  chsalary VARCHAR(11) DEFAULT NULL,
		  chgender VARCHAR(1) DEFAULT NULL,
		  PRIMARY KEY (chID)
		)";
		if ($conn->query($sql) === TRUE) {
			//echo "Table chefs created successfully";
		} else {
			//echo "Error creating table: " . $conn->error;
		}
	} else {
		//echo "Error creating database: " . $conn->error;
	}
}
$conn = mysqli_connect($servername, $username, $password, $dbname);

echo "Connected successfully";

mysqli_close($conn);

include('index.html');
?>