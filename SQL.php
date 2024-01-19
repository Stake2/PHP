<?php 

# SQL

$column_keys = [
	"title",
	"language_title",
	"language",
	"type",
	"link",
	"php_folder",
	"website_folder",
	"local_website_folder",
	"color"
];

$values = [
	$website["Data"]["titles"]["en"],
	$website["Data"]["titles"]["language"],
	$website["full_language"],
	$website["Data"]["type"],
	$website["Data"]["link"],
	$website["Data"]["Folders"]["PHP"]["root"],
	$website["Data"]["Folders"]["Website"]["root"],
	$website["Data"]["Folders"]["Local website"]["root"],
	$website["Data"]["color"]
];

$columns = [];

foreach ($column_keys as $key) {
	array_push($columns, $key." VARCHAR(256) NOT NULL");
}

# Create table
$SQL -> create_table($website["Data"]["titles"]["en"], $columns);

# Update SQL database
$website_key = strtolower(str_replace(" ", "_", $website["Data"]["titles"]["en"]));

# Gets columns from SQL Database
$columns_result = $SQL -> select("SELECT * FROM ".$website_key." WHERE language = '".$website["full_language"]."';");

# If columns are empty, insert into table
if (count($columns_result) == 0) {
	$SQL -> insert_into_table($website_key, $column_keys, $values);
}

?>