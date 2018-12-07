<?php
$table = 'food_item';
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
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><th><tr>Food ID | </tr><tr>Type | </tr><tr>Name | </tr><tr>Price | </tr><tr>Chef ID</tr></th>";		
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo"<tr>";
        foreach($row as $field) {
			echo '<td>' . htmlspecialchars($field) . '</td>';
		}
		echo"</tr>";
	}
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);

include('index.html');
?>