<?php 

$database_name = "website_info_database";

$database_connection = new SQL();

$database_connection -> query("CREATE DATABASE IF NOT EXISTS ".$database_name);

?>