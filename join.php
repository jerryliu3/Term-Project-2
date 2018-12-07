<?php
$table = filter_input(INPUT_POST, 'table');
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

$sql = "SELECT cuname, order_number, waname, fee, feedback FROM customer
INNER JOIN dining_table ON customer.table_number=dining_table.tnumber
INNER JOIN orderlist ON dining_table.order_number=orderlist.onumber
LEFT JOIN waitor ON dining_table.waitorID=waitor.waID
WHERE (customer.table_number='$table')
AND (orderlist.ddate='$date')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "Information for table $table on $date". '</td>';
echo "<table><tr><th>Customer Name | </th><th>Order Number | </th><th>Waitor Name | </th><th>Fee | </th><th>Feedback</th></tr>";
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