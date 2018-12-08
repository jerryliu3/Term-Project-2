<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "restaurant";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {
	$conn = mysqli_connect($servername, $username, $password);
	$file = 'DATABASE.sql';
	
	if($fp = file_get_contents($file)) {
	  $var_array = explode(';',$fp);
		foreach($var_array as $value) {
			//echo($value."<br>");
			if ($conn->query($value) === TRUE) {
				//echo ('success'."<br>");
			} else {
				//echo "Error creating table: " . $conn->error ."<br>";
			}	  
		}
	}
	ob_end_clean();
	echo "Database created.<br>";
}
else
{
	echo "Already exists.<br>";
}

mysqli_close($conn);
include('index.html');
?>