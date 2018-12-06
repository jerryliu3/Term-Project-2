<?php
$table = customer;
$cuSSN = filter_input(INPUT_POST, 'ccuSSN');
$cuname= filter_input(INPUT_POST, 'cuname');
$chpho_num = filter_input(INPUT_POST, 'chpho_num');
$address = filter_input(INPUT_POST, 'address');
$table_number = filter_input(INPUT_POST, 'table_number');

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
$sql = "INSERT INTO $table (cuSSN, cuname, cupho_num, address, table_number) 
VALUES('$cuSSN', '$cuname', '$cupho_num', '$address', '$table_number')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

include('index.html');
?>