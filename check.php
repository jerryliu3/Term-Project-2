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

echo "Connected successfully";

mysqli_close($conn);

include('index.html');
?>