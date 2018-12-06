<?php
$table = waitor;
$waID = filter_input(INPUT_POST, 'waID');
$waname= filter_input(INPUT_POST, 'waname');
$wasalary = filter_input(INPUT_POST, 'wasalary');
$wagender = filter_input(INPUT_POST, 'wagender');

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
$sql = "INSERT INTO $table (waID, waname, wasalary, wagender) 
VALUES('$waID', '$waname', $wasalary, '$wagender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

include('index.html');
?>