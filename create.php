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
	$file = 'db.sql';
	//$file = 'University_DB_2018.sql';
	$file = 'DATABASE.sql';
	//try this as well
/* 	if ($conn->multi_query($sql) === TRUE) {
		echo "New records created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} */
	
	
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
	
/* 	$sql = file_get_contents($file);
	echo($sql);
	if ($conn->query($sql) === TRUE) {
		echo "Created successfully";
	} else {
		echo "Error creating: " . $conn->error;
	} */
}
else
{
	echo "Already exists";
}

mysqli_close($conn);

include('index.html');
?>