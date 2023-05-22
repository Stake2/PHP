<?php 

# Date.php

class Date extends Class_ {
	public function __construct() {
		parent::__construct(self::class);
	}

	public static function Now($string = "", $format = "") {
		global $website;
		global $Language;

		$datetime = new DateTime();

		if ($string != "") {
			if ($format == "") {
				$format = $website["texts"]["date_format"][$Language -> user_language];
			}

			$datetime = DateTime::createFromFormat($format, $string);
		}

		$date = [
			"day" => $datetime -> format("d"),
			"month" => $datetime -> format("m"),
			"year" => $datetime -> format("Y"),
			"formats" => [
				"HH:MM DD/MM/YYYY" => $datetime -> format("H:i d/m/Y")
			]
		];

		foreach ($website["texts"]["date_format"] as $text) {
			$date[$text] = $datetime -> format($text);
		}

		foreach ($website["texts"]["date_time_format"] as $text) {
			$date[$text] = $datetime -> format($text);
		}

		return $date;
	}

	public static function Create_Years_List($mode = "array", $start = 2018, $plus = 0, $function = "string", $string_format = Null) {
		$array = [];

		$current_year = self::Now()["year"] + $plus;

		while ($start <= $current_year) {
			$local_year = $start;

			if ($function == "string") {
				$local_year = (string)$local_year;
			}

			if ($string_format != Null) {
				$local_year = Text::Format($string_format, $local_year);
			}

			if ($mode == "array") {
				array_push($array, $local_year);
			}

			if ($mode == "dict") {
				$array[$local_year] = $local_year;
			}

			$start++;
		}

		return $array;
	}
}

?>