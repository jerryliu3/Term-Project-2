<?php
$table = chef;
$chID = filter_input(INPUT_POST, 'chID');
$chname= filter_input(INPUT_POST, 'chname');
$chsalary = filter_input(INPUT_POST, 'chsalary');
$chgender = filter_input(INPUT_POST, 'chgender');

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
$sql = "INSERT INTO $table (chID, chname, chsalary, chgender) 
VALUES('$chID', '$chname', '$chsalary', '$chgender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

include('index.html');
?>