<?php
$table = 'dining_table';
$tnumber = filter_input(INPUT_POST, 'tnumber');
$dtime= filter_input(INPUT_POST, 'dtime');
$num_seats = filter_input(INPUT_POST, 'num_seats');
$order_number = filter_input(INPUT_POST, 'order_number');
$waitorID = filter_input(INPUT_POST, 'waitorID');

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
$sql = "INSERT INTO $table (tnumber, dtime, num_seats, order_number, waitorID) 
VALUES('$tnumber', '$dtime', $num_seats, '$order_number', '$waitorID')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><th><tr>Table Number | </tr><tr>Dining Time | </tr><tr>Seats | </tr><tr>Order Number | </tr><tr>Waitor ID</tr></th>";
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