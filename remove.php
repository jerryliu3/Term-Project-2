<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "restaurant";

// Create connection

$conn = mysqli_connect($servername, $username, $password);

// Check connection

if ($conn) {
	$sql = "DROP DATABASE $dbname";
	if ($conn->query($sql) === TRUE) {
    echo "Database dropped successfuly.";
	} else {
		echo "Unable to drop database " . $conn->error;
	}

}
else
{
	echo "Does not exist";
}

mysqli_close($conn);

include('index.html');
?>