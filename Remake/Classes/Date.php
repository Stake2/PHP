<?php 

# Date

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

		$date = [];

		$date["day"] = $datetime -> format("d");
		$date["month"] = $datetime -> format("m");
		$date["year"] = $datetime -> format("Y");

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
			$year = $start;

			if ($function == "string") {
				$year = (string)$year;
			}

			if ($string_format != Null) {
				$year = Text::Format($string_format, $year);
			}

			if ($mode == "array") {
				array_push($array, $year);
			}

			if ($mode == "dict") {
				$array[$year] = $year;
			}

			$start++;
		}

		return $array;
	}
}

?>