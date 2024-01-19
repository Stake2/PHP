<?php 

# SQL.php

class SQL extends PDO {
	private $connection;

	public function __construct($database = "website_information") {
		$this -> connection = new PDO("mysql:host=localhost;dbname=$database", "root", "");

		$this -> query("CREATE DATABASE IF NOT EXISTS ".$database);
	}

	public function get_connection() {
		return $this -> connection;
	}

	private function set_parameters($statement, $parameters = array()) {
		foreach ($parameters as $key => $value) {
			$this -> set_parameter($statement, $key, $value);
		}
	}

	private function set_parameter($statement, $key, $value) {
		$statement -> bindParam($key, $value);
	}

	public function query($raw_query, $parameters = array()) {
		$statement = $this -> connection -> prepare($raw_query);

		$this -> set_parameters($statement, $parameters);

		$statement -> execute();

		return $statement;
	}

	public function select($raw_query, $parameters = array()):array {
		$statement = $this -> query($raw_query, $parameters);

		return $results = $statement -> fetchAll(PDO::FETCH_ASSOC);
	}

	public function select_all($table_name) {
		$table_name = str_replace(" ", "_", $table_name);

		return $results = $this -> select("SELECT * FROM $table_name");
	}

	public function create_table($table_name, $columns) {
		$query = "CREATE TABLE IF NOT EXISTS ".str_replace(" ", "_", $table_name)." (";

		$query .= "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,";

		foreach ($columns as $column) {
			$query .= $column."\n";

			if ($column != end($columns)) {
				$query .= ", ";
			}
		}

		$query .= ")";

		$this -> query($query);
	}

	function insert_into_table($table_name, $columns, $values) {
		$query = "INSERT INTO ".str_replace(" ", "_", $table_name)." (";
		
		foreach ($columns as $column) {
			$query .= $column;

			if ($column != end($columns)) {
				$query .= ", ";
			}
		}

		$query .= ")"."\n";

		$query .= " VALUES(";

		foreach ($values as $value) {
			$query .= "'".$value."'";

			if ($value != end($values)) {
				$query .= ", ";
			}
		}

		$query .= ")";

		$this -> query($query);
	}
}

# Initiate SQL class
$SQL = new SQL();

$website["database_connection"] = $SQL -> get_connection();

?>