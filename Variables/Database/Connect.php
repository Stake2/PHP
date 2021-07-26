<?php 

$server_name = "localhost";
$username = "root";
$password = "";

// Create connection
$connection = new mysqli($server_name, $username, $password);

// Check connection
if ($connection -> connect_error) {
	die("Connection failed: ".$connection -> connect_error);
}

// Create database
$sql = "CREATE DATABASE myDB";
if ($connection -> query($sql) === TRUE) {
	echo "Database created successfully";
}

else {
	echo "Error creating database: ".$connection -> error;
}

?>