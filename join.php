<?php
$table = filter_input(INPUT_POST, 'table');

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

$sql = "SELECT * FROM customer
INNER JOIN dining_table ON customer.table_number=dining_table.tnumber;";
$result = $conn->query($sql);

/* this creates a joined table (with a repeated table number column),
need to try creating the same as a view so it can be referenced and
maybe displayed directly through the view, as well as use a subquery
to extract the information about a specific table number chosen by the user 


Or maybe take a specific attribute from the join and use that on another table
 for the subquery*/


if ($result->num_rows > 0) {
	echo "Sitting at table $table". '</td>';
	echo "<table>";
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