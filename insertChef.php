<?php
$table = 'chef';
$chID = filter_input(INPUT_POST, 'chID');
$chname= filter_input(INPUT_POST, 'chname');
$chsalary = filter_input(INPUT_POST, 'chsalary');
$chgender = filter_input(INPUT_POST, 'chgender');

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
$sql = "INSERT INTO $table (chID, chname, chsalary, chgender) 
VALUES('$chID', '$chname', $chsalary, '$chgender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><th><tr>Chef ID | </tr><tr>Name | </tr><tr>Salary | </tr><tr>Gender</tr></th>";
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