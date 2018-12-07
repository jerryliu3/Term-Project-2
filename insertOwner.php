<?php
$table = 'owners';
$SSN = filter_input(INPUT_POST, 'SSN');
$owner_name= filter_input(INPUT_POST, 'owner_name');
$pho_num = filter_input(INPUT_POST, 'pho_num');

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
$sql = "INSERT INTO $table (SSN, owner_name, pho_num) 
VALUES('$SSN', '$owner_name', '$pho_num')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><th><tr>Owner SSN | </tr><tr>Name | </tr><tr>Phone Number</tr></th>";
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