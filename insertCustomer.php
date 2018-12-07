<?php
$table = 'customer';
$cuSSN = filter_input(INPUT_POST, 'ccuSSN');
$cuname= filter_input(INPUT_POST, 'cuname');
$cupho_num = filter_input(INPUT_POST, 'chpho_num');
$address = filter_input(INPUT_POST, 'address');
$table_number = filter_input(INPUT_POST, 'table_number');

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
$sql = "INSERT INTO $table (cuSSN, cuname, cupho_num, address, table_number) 
VALUES('$cuSSN', '$cuname', '$cupho_num', '$address', '$table_number')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><th><tr>Customer SSN | </tr><tr>Name | </tr><tr>Phone Number | </tr><tr>Address | </tr><tr>Table Number</tr></th>";
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