<?php 

# Content

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

# Define the website "Generators" folder
$website["Data"]["Folders"]["Generators"] = [
	"root" => $website["Data"]["Folders"]["PHP"]["root"]."Generators/"
];

# Define the website files
$website["Data"]["Files"] = [
	"Generators" => []
];

# Define the Generator files
$names = [
	"Watched",
	"Media being watched",
	"Past registries"
];

foreach ($names as $item) {
	$website["Data"]["Files"]["Generators"][$item] = $website["Data"]["Folders"]["Generators"]["root"].$item.".php";

	$File -> Create($website["Data"]["Files"]["Generators"][$item]);
}

if (isset($website["Data"]["Year"]) == False) {
	$website["Data"]["Year"] = Date::Now()["year"];
}

if (in_array($website["Data"]["title"], $website["Years"]) == True) {
	$website["Data"]["Year"] = $website["Data"]["title"];
}

# Define the "Watch History" array
$folder = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"];

$watch_history = [
	"Files" => [
		"Per Media Type" => [
			"root" => $folder["Watch History"][$website["Data"]["Year"]]["Per Media Type"]["root"]
		]
	],
	"Types" => $JSON -> To_PHP($folder["Data"]["Types"]),
	"Entries" => $JSON -> To_PHP($folder["Watch History"][$website["Data"]["Year"]]["Entries"]),
	"Texts" => $JSON -> To_PHP($folders["Apps"]["Module files"]["Watch History"]["Texts"]),
	"Language texts" => [],
	"Media information" => [
		"Information" => $JSON -> To_PHP($folder["Media information"]["Information"])
	]
];

$watch_history["Language texts"] = $Language -> Item($watch_history["Texts"]);

$types_dictionary = $watch_history["Types"]["Plural"];

$website["Data"]["Numbers"] = [
	"By year" => [],
	"By type" => []
];

# Define all watched things by type as zero (0)
$i = 0;
foreach ($types_dictionary["en"] as $type) {
	$website["Data"]["Numbers"]["By type"][$type] = 0;
}

if (function_exists("Generate_Media_Type_Headers") == False) {
	function Generate_Media_Type_Headers($header_text = "") {
		global $website;
		global $Language;
		global $JSON;
		global $watch_history;

		$language = "pt";

		if (isset($website["language"]) == True) {
			$language = $website["language"];
		}

		if ($language == "general") {
			$language = "en";
		}

		if ($header_text == "") {
			$header_text = $website["Language texts"]["watched_things_in"]."".$website["Data"]["Year"];
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		$text_color = $website["Style"]["text"]["theme"]["dark"];

		$types_dictionary = $watch_history["Types"]["Plural"];

		# Define a shortcut for the total number of entries in the year
		$total_number = $watch_history["Entries"]["Numbers"]["Total"];

		# Iterate through the English media types list
		$i = 0;
		foreach ($types_dictionary["en"] as $type) {
			$language_type = $types_dictionary[$language][$i];

			$number = $watch_history["Entries"]["Numbers"]["Per Media Type"][$type];

			if ($header_text == $watch_history["Language texts"]["media_being_watched"]) {
				$number = $watch_history["Media information"]["Information"]["Numbers"][$type];
			}

			# If the number is not zero (0)
			# Or the total number of tasks is zero
			if (
				$number != 0 or
				$total_number == 0
			) {
				$number_element = HTML::Element("span", $number, "", $text_color);

				$span = $language_type.": ".$number_element;

				$span = HTML::Element("b", $span);

				$href = $header_text.": ".$language_type;

				# Anchor element to go to the media type list
				if ($number != 0) {
					$a = HTML::Element("a", $span, 'href="#'.$href.'"');
				}

				else {
					$a = HTML::Element("a", $span);
				}

				$array["links"] .= $a."<br />"."\n\t\t";

				$watch_history["Files"]["Per Media Type"][$type] = $JSON -> To_PHP($watch_history["Files"]["Per Media Type"]["root"].$type."/Entries.json");

				$number_element = HTML::Element("span", $number, "", $text_color);

				$span = $language_type.": ".$number_element;

				$span = HTML::Element("b", $span);

				# Plural media type header with anchor href to go to the media type episodes part
				$a = HTML::Element("a", $span, 'name="'.$href.'"')."<br />";

				$array["headers"][$type] = "\t\t".'<!-- "'.$type.'" media type header -->'."\n".
				"\t\t".$a."\n";
			}

			$i++;
		}

		return $array;
	}
}

# Require the generator files to generate the tab templates
foreach (array_keys($website["Data"]["Files"]["Generators"]) as $key) {
	$generator_file = $website["Data"]["Files"]["Generators"][$key];

	require $generator_file;
}

?>