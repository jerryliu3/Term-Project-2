<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "restaurant";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {
	$conn = mysqli_connect($servername, $username, $password);
	$sql = "CREATE DATABASE $dbname";
	if ($conn->query($sql) === TRUE) {
		echo "Created database";
		$conn = mysqli_connect($servername, $username, $password, $dbname);

	} else {
		echo "Unable to create database" . $conn->error;
	}	
	$sql = "CREATE TABLE chef (
		  chID VARCHAR(5) NOT NULL,
		  chname VARCHAR(20) DEFAULT NULL,
		  chsalary VARCHAR(11) DEFAULT NULL,
		  chgender VARCHAR(1) DEFAULT NULL,
		  PRIMARY KEY (chID)
		)";
	if ($conn->query($sql) === TRUE) {
		echo "Created table";
	} else {
		echo "Unable to create table" . $conn->error;
	}
}
else
{
	echo "Already exists";
}

mysqli_close($conn);

include('index.html');
?>