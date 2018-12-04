<?php
$table = filter_input(INPUT_POST, 'table');
$tupleID = filter_input(INPUT_POST, 'tupleID');
$tupleValue = filter_input(INPUT_POST, 'tupleValue');
$attribute= filter_input(INPUT_POST, 'attribute');
$value = filter_input(INPUT_POST, 'value');

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
$sql = "UPDATE $table SET $attribute=$value WHERE $tupleID=$tupleValue";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

mysqli_close($conn);

include('index.html');
?>