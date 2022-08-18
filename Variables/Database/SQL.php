<?php 

class SQL extends PDO {
	private $conn;

	public function __construct($database = "website_info_database") {
		$this -> conn = new PDO("mysql:host=localhost;dbname=$database", "root", "");

		$this -> query("CREATE DATABASE IF NOT EXISTS ".$database);
	}

	public function Get_Connection() {
		return $this -> conn;
	}

	private function setParams($statement, $parameters = array()) {
		foreach ($parameters as $key => $value) {
			$this -> setParam($statement, $key, $value);
		}
	}

	private function setParam($statement, $key, $value) {
		$statement -> bindParam($key, $value);
	}

	public function query($raw_query, $params = array()) {
		$stmt = $this -> conn -> prepare($raw_query);

		$this -> setParams($stmt, $params);

		$stmt -> execute();

		return $stmt;
	}

	public function select($raw_query, $params = array()):array {
		$stmt = $this -> query($raw_query, $params);

		return $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
	}

	public function select_all($table_name) {
		$table_name = str_replace(" ", "_", $table_name);

		return $results = $this -> select("SELECT * FROM $table_name");
	}
}

$sql = new SQL();

$database_connection = $sql -> Get_Connection();

?>