<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "restaurant";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {
    include('create.php');
}
else{
	mysqli_close($conn);
	ob_end_clean();
	echo "Connected successfully.<br>";
	include('index.html');
}

?>