<?php
$table = filter_input(INPUT_POST, 'table');
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
$sql = "INSERT INTO $table(chID, chname, chsalary, chgender) 
VALUES($chID, $chname, $chsalary, $chgender)";

if ($conn->query($sql) === TRUE) {
			//echo "Table chefs created successfully";
		} else {
			//echo "Error creating table: " . $conn->error;
		}

mysqli_close($conn);

echo "Inserted successfully";

// readfile('index.html');
include('index.html');
?>