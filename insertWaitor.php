<?php
$table = 'waitor';
$waID = filter_input(INPUT_POST, 'waID');
$waname= filter_input(INPUT_POST, 'waname');
$wasalary = filter_input(INPUT_POST, 'wasalary');
$wagender = filter_input(INPUT_POST, 'wagender');

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
$sql = "INSERT INTO $table (waID, waname, wasalary, wagender) 
VALUES('$waID', '$waname', $wasalary, '$wagender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><th><tr>Waitor ID | </tr><tr>Name | </tr><tr>Salary | </tr><tr>Gender</tr></th>";
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