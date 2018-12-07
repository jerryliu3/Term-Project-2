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

$sql = "CREATE OR REPLACE VIEW Earnings AS
SELECT waname, SUM(fee) FROM dining_table
INNER JOIN orderlist ON dining_table.order_number=orderlist.onumber
RIGHT JOIN waitor ON dining_table.waitorID=waitor.waID
WHERE (orderlist.ddate='$date')
GROUP BY waname";
$result = $conn->query($sql);

$sql = "SELECT * FROM Earnings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "Performance of waitors on $date". '</td>';
	echo "<table><tr><th>Waitor Name | </th><th>Payment from tables</th></tr>";
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