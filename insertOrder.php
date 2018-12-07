<?php
$table = 'orderlist';
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
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><th><tr>Order Number | </tr><tr>Fee | </tr><tr>Feedback | </tr><tr>Payment | </tr><tr>Date</tr></th>";
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