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

$sql = "SELECT * FROM $table LIMIT $keyID1,$keyID2";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	if($table == 'chef') {
		echo "<table><th><tr>Chef ID | </tr><tr>Name | </tr><tr>Salary | </tr><tr>Gender</tr></th>";
    }
	else if($table == 'food_item'){
		echo "<table><th><tr>Food ID | </tr><tr>Type | </tr><tr>Name | </tr><tr>Price | </tr><tr>Chef ID</tr></th>";		
	}
	else if($table == 'orderlist'){		
		echo "<table><th><tr>Order Number | </tr><tr>Fee | </tr><tr>Feedback | </tr><tr>Payment | </tr><tr>Date</tr></th>";
	}
	else if($table == 'owners'){		
		echo "<table><th><tr>Owner SSN | </tr><tr>Name | </tr><tr>Phone Number</tr></th>";
	}
	else if($table == 'waitor'){		
		echo "<table><th><tr>Waitor ID | </tr><tr>Name | </tr><tr>Salary | </tr><tr>Gender</tr></th>";
	}
	else if($table == 'dining_table'){		
		echo "<table><th><tr>Table Number | </tr><tr>Dining Time | </tr><tr>Seats | </tr><tr>Order Number | </tr><tr>Waitor ID</tr></th>";
	}
	else if($table == 'customer'){		
		echo "<table><th><tr>Customer SSN | </tr><tr>Name | </tr><tr>Phone Number | </tr><tr>Address | </tr><tr>Table Number</tr></th>";
	}
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