<?php
$table = filter_input(INPUT_POST, 'table');
$tuple1 = filter_input(INPUT_POST, 'tuple1');
$tuple2 = filter_input(INPUT_POST, 'tuple2');

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

$sql = "SELECT id, firstname, lastname FROM MyGuests";

$result = $conn->query($sql);
echo($result);
mysqli_close($conn);

echo "Displayed successfully";

// readfile('index.html');
include('index.html');
?>