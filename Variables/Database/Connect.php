<?php 

$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "website_info_database";

// Create database_connection
$database_connection = new mysqli($server_name, $username, $password, $database_name);

// Check database_connection
if ($database_connection -> connect_error) {
	die("Connection failed: ".$database_connection -> connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ".$database_name;

if ($database_connection -> query($sql) === True) {
	$nothing = "";
}

else {
	echo "Error creating database: ".$database_connection -> error;
}

?>