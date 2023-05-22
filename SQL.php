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
	$website["data"]["titles"]["en"],
	$website["data"]["titles"]["language"],
	$website["full_language"],
	$website["data"]["type"],
	$website["data"]["link"],
	$website["data"]["folders"]["php"]["root"],
	$website["data"]["folders"]["website"]["root"],
	$website["data"]["folders"]["local_website"]["root"],
	$website["data"]["color"]
];

$columns = [];

foreach ($column_keys as $key) {
	array_push($columns, $key." VARCHAR(256) NOT NULL");
}

# Create table
$SQL -> create_table($website["data"]["titles"]["en"], $columns);

# Update SQL database
$website_key = strtolower(str_replace(" ", "_", $website["data"]["titles"]["en"]));

# Gets columns from SQL Database
$columns_result = $SQL -> select("SELECT * FROM ".$website_key." WHERE language = '".$website["full_language"]."';");

# If columns are empty, insert into table
if (count($columns_result) == 0) {
	$SQL -> insert_into_table($website_key, $column_keys, $values);
}

?>