<?php
$table = orderlist;
$onumber = filter_input(INPUT_POST, 'onumber');
$fee = filter_input(INPUT_POST, 'fee');
$feedback= filter_input(INPUT_POST, 'feedback');
$payment = filter_input(INPUT_POST, 'payment');
$ddate = filter_input(INPUT_POST, 'ddate');

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
$sql = "INSERT INTO $table (onumber, fee, feedback, payment, ddate) 
VALUES('$onumber', $fee, '$feedback', '$payment', '$ddate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

include('index.html');
?>