<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "DROP DATABASE first;";

if ($conn->query($sql) === TRUE) {
    echo "Deletion successful";
} else {
    echo "Error deleting " . $conn->error;
}



mysqli_close($conn);
// readfile('index.html');
include('index.html');
?>