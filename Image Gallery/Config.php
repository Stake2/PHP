<?php

$host = "localhost";
$user = "root";
$password = "";
$database_name = "tutorial";

// Create connection
$con = mysqli_connect($host, $user, $password);

// Check connection
if (!$con) {
    die("Connection failed: ".mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE tutorial";

if ($con -> query($sql) !== True and !isset($con -> error)) {
	echo "Error creating database: " . $con -> error;
}

$con -> close();

// Create connection
$con = mysqli_connect($host, $user, $password, $database_name);

$table_name = "images";

// Create database
$sql = "CREATE TABLE `".$table_name."` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

if ($con -> query($sql) !== True and !isset($con -> error)) {
	echo "Error creating table: " . $con -> error;
}

?>