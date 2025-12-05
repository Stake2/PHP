<?php 

# Date.php

class Date extends Class_ {
	# Define the static "texts" variable
	static $texts;

	public function __construct() {
		global $folders;
		global $JSON;

		parent::__construct(self::class);

		# Read the "Texts.json" file of the "Date" Python module
		static::$texts = $JSON -> To_PHP($folders["Apps"]["Module files"]["Utility"]["Date"]["Texts"]);
	}

	public function Get_Readable_Timezone_Abbreviation(DateTime $date): string {
		# Get the abbreviation
		$abbr = $date -> format("T");

		# Get the timeozone name
		$timezone_name = $date -> format("e");

		# Map custom abbreviations for specific timezones when abbreviation is offset
		$custom_abbr_map = [
			"America/Sao_Paulo" => "BRT",
			"America/Argentina/Buenos_Aires" => "ART",
			"America/Los_Angeles" => "PST",
			"Europe/London" => "GMT",
			"Europe/Paris" => "CET"
		];

		# If the abbreviation is a GMT offset and there is a custom mapping
		if (
			preg_match("/^[\+\-]\d{2}$/", $abbr) &&
			isset($custom_abbr_map[$timezone_name])
		) {
			# Return the custom abbreviation
			return $custom_abbr_map[$timezone_name];
		}

		# Otherwise, return the original abbreviation
		return $abbr;
	}

	public static function Now($string = "", $format = "", $object = "", $timezone = "") {
		global $website;
		global $Language;

		# Set the default timezone to "America/Sao_Paulo"
		date_default_timezone_set("America/Sao_Paulo");

		# Get the timezones
		$utc_timezone = new DateTimeZone("UTC");
		$user_timezone = new DateTimeZone("America/Sao_Paulo");

		# If no DateTime object was passed, create one with current time in UTC
		if ($object == "") {
			$object = new DateTime("now");
		}

		# If a date string was provided, parse it using the given format (in UTC)
		if ($string != "") {
			if ($format == "") {
				$format = "H:i d/m/Y";
			}

			if ($format == "Y-m-d\TH:i:s\Z") {
				$object = DateTime::createFromFormat($format, $string, $utc_timezone);
			}

			else {
				$object = DateTime::createFromFormat($format, $string);
			}
		}

		# Clone the object to create versions with different time zones
		$timezone_object = clone $object;

		if ($format == "Y-m-d\TH:i:s\Z") {
			$timezone_object -> setTimezone($user_timezone);
		}

		# Create the UTC object
		$utc_object = clone $object;

		# Create the date dictionary with its keys
		$date = [
			"User timezone" => [
				"String" => $user_timezone -> getName(),
				"UTC Offset" => $timezone_object -> format("P"),
				"Name" => Date::Get_Readable_Timezone_Abbreviation($timezone_object)
			],

			"UTC" => [
				"String" => $utc_timezone -> getName(),
				"UTC Offset" => $utc_object -> format("P"),
				"Name" => $utc_object -> format("T")
			],

			"Object" => $object,
			"Day" => $timezone_object -> format("d"),
			"Month" => $timezone_object -> format("m"),
			"Year" => $timezone_object -> format("Y"),

			"Formats" => [
				# Local time format
				"HH:MM DD/MM/YYYY" => $timezone_object -> format("H:i d/m/Y"),

				# UTC format (with "Z" to indicate UTC)
				"YYYY-MM-DDTHH:MM:SSZ" => $utc_object -> format("Y-m-d\TH:i:s\Z")
			]
		];

		// Apply extra user-defined date formats (using local timezone)
		foreach ($website["Texts"]["date_format"] as $text) {
			$date[$text] = $timezone_object -> format($text);
		}

		foreach ($website["Texts"]["date_time_format"] as $text) {
			$date[$text] = $timezone_object -> format($text);
		}

		return $date;
	}

	public static function From_Unix($datetime, $timestamp) {
		$datetime -> setTimestamp($timestamp);

		$datetime = Date::Now("", "", $datetime);

		return $datetime;
	}

	public static function Make_Time_Text($date) {
		global $website;
		global $Language;

		# Transform the text key into a dictionary if it is a string
		if (
			isset($date["Text"]) &&
			is_string($date["Text"])
		) {
			$date["Text"] = [];
		}

		if (isset($date["Difference"]) == False) {
			$date = [
				"Text" => [],
				"Difference" => $date
			];
		}

		foreach ($website["Languages"]["Small"] as $language) {
			$date["Text"][$language] = "";
		}

		# Define the keys and remove the "Text" key
		$keys = array_keys($date["Difference"]);

		# List the keys to remove
		$keys_to_remove = [
			"Before",
			"After",
			"Object",
			"Difference",
			"Unit texts",
			"Text"
		];

		# Remove the unused keys
		foreach ($keys_to_remove as $key_to_remove) {
			if (in_array($key_to_remove, $keys)) {
				$key_index = array_search($key_to_remove, $keys);

				unset($keys[$key_index]);
			}
		}

		$languages = $website["Languages"]["Small"];
		$languages = array_diff($languages, ["general"]);

		# Make the time texts by language
		foreach ($keys as $key) {
			foreach ($languages as $language) {
				# If the key is the last one and the number of time attributes is 2 or more than 2, add the "and " text
				if ($key == end($keys)) {
					if (
						count($keys) > 2 or
						count($keys) == 2
					) {
						$date["Text"][$language] .= $website["Texts"]["and"][$language]." ";
					}
				}

				# Define the text key
				$text_key = strtolower($key);

				$number = $date["Difference"][$key];
				$singular = substr($text_key, 0, strlen($text_key) - 1);
				$plural = $text_key;

				$text_key = Text::By_Number($number, $singular, $plural);

				# Define the time text
				$text = self::$texts[$text_key][$language];

				if (isset($date["Unit texts"])) {
					$text = $date["Unit texts"][$key][$language];
				}

				# Add the number and the time text (plural or singular)
				$date["Text"][$language] .= $date["Difference"][$key]." ".$text;

				# If the number of time attributes is equal to 2, add a space
				if (count($keys) == 2) {
					$date["Text"][$language] .= " ";
				}

				# If the key is not the last one
				# And the number of time attributes is more than 2, add the ", " text (comma)
				if (
					$key != end($keys) &&
					count($keys) > 2
				) {
					$date["Text"][$language] .= ", ";
				}
			}
		}

		return $date["Text"];
	}

	public static function Create_Years_List($mode = "array", $start = 2018, $plus = 0, $function = "string", $string_format = Null) {
		$array = [];

		$current_year = self::Now()["Year"] + $plus;

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