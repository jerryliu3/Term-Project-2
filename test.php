<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "restaurant";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if ($conn) {
	$sql = "SHOW TABLES";
	if ($conn->query($sql) === TRUE) {
		echo "Showing tables";
	} else {
		echo "Unable to show tables" . $conn->error;
	}
	//$result = $conn->query($sql);
	//echo($result);
}

mysqli_close($conn);

include('index.html');
?>