<?php
$table = filter_input(INPUT_POST, 'table');
$keyID1 = filter_input(INPUT_POST, 'keyID1');
$keyID2 = filter_input(INPUT_POST, 'keyID2');

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

$sql = "SELECT * FROM $table WHERE chID BETWEEN $keyID1 AND $keyID2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Salary</th><th>Gender</th></tr>";
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