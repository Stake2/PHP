<?php 

# Date.php

class Date extends Class_ {
	public function __construct() {
		parent::__construct(self::class);
	}

	public static function Now($string = "", $format = "", $object = "") {
		global $website;
		global $Language;

		if ($object == "") {
			$object = new DateTime();
		}

		if ($string != "") {
			if ($format == "") {
				$format = "H:i d/m/Y";
			}

			$object = DateTime::createFromFormat($format, $string);
		}

		$date = [
			"Object" => $object,
			"day" => $object -> format("d"),
			"month" => $object -> format("m"),
			"year" => $object -> format("Y"),
			"formats" => [
				"HH:MM DD/MM/YYYY" => $object -> format("H:i d/m/Y")
			]
		];

		foreach ($website["texts"]["date_format"] as $text) {
			$date[$text] = $object -> format($text);
		}

		foreach ($website["texts"]["date_time_format"] as $text) {
			$date[$text] = $object -> format($text);
		}

		$date["Formats"] = $date["formats"];

		return $date;
	}

	public static function From_Unix($datetime, $timestamp) {
		$datetime -> setTimestamp($timestamp);

		$datetime = Date::Now("", "", $datetime);

		return $datetime;
	}

	public static function Create_Years_List($mode = "array", $start = 2018, $plus = 1, $function = "string", $string_format = Null) {
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