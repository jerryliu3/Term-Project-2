<?php
$date = filter_input(INPUT_POST, 'date');

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

$sql = "SELECT SUM(fee), waname FROM waitor
LEFT JOIN dining_table ON waitor.waID=dining_table.waitorID
FULL OUTER JOIN orderlist ON dining_table.order_number=orderlist.onumber
WHERE (orderlist.ddate='$date')
GROUP BY waitor.waname";
$sql = "SELECT SUM(fee), waname FROM dining_table
INNER JOIN orderlist ON dining_table.order_number=orderlist.onumber
RIGHT JOIN waitor ON dining_table.waitorID=waitor.waID
WHERE (orderlist.ddate='$date')
GROUP BY waname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "Performance of waitors on $date". '</td>';
	echo "<table><tr><th>Customer Name | </th><th>Order Number | </th><th>Waitor Name | </th><th>Fee | </th><th>Feedback | </th><th>Date | </th></tr>";
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

// readfile('index.html');
include('index.html');
?>