<?php
$table = food_item;
$FID = filter_input(INPUT_POST, 'chID');
$ftype = filter_input(INPUT_POST, 'ftype');
$fname= filter_input(INPUT_POST, 'fname');
$fprice = filter_input(INPUT_POST, 'fprice');
$chefID = filter_input(INPUT_POST, 'chefID');

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
$sql = "INSERT INTO $table (FID, ftype, fname, price, chefID) 
VALUES('$FID', '$ftype', '$fname', $price, '$chefID')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

include('index.html');
?>