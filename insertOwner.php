<?php
$table = owners;
$SSN = filter_input(INPUT_POST, 'SSN');
$owner_name= filter_input(INPUT_POST, 'owner_name');
$pho_num = filter_input(INPUT_POST, 'pho_num');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO $table (SSN, owner_name, pho_num) 
VALUES('$SSN', '$owner_name', '$pho_num')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

include('index.html');
?>