<?php 

# Content

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["Full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["Full"][$language];
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
	"Played",
	"Games being played",
	"Past registries"
];

foreach ($names as $item) {
	$website["Data"]["Files"]["Generators"][$item] = $website["Data"]["Folders"]["Generators"]["root"].$item.".php";

	$File -> Create($website["Data"]["Files"]["Generators"][$item]);
}

if (isset($website["Data"]["Year"]) == False) {
	$website["Data"]["Year"] = Date::Now()["Year"];
}

if (in_array($website["Data"]["title"], $website["Years"]) == True) {
	$website["Data"]["Year"] = $website["Data"]["title"];
}

# Define the data network folder for easier typing
$network_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Games"];

$gameplayer = [
	"Files" => [
		"By game type" => [
			"root" => $network_folder["Play History"][$website["Data"]["Year"]]["By game type"]["root"]
		]
	],
	"Types" => $JSON -> To_PHP($network_folder["Data"]["Types"]),
	"Entries" => $JSON -> To_PHP($network_folder["Play History"][$website["Data"]["Year"]]["Entries"]),
	"Texts" => $JSON -> To_PHP($folders["Apps"]["Module files"]["GamePlayer"]["Texts"]),
	"Language texts" => [],
	"Game information" => [
		"Information" => $JSON -> To_PHP($network_folder["Game information"]["Information"])
	]
];

$gameplayer["Language texts"] = $Language -> Item($gameplayer["Texts"]);

$types_dictionary = $gameplayer["Types"]["Types"];

$website["Data"]["Numbers"] = [
	"By year" => [],
	"By type" => []
];

# Define all the gaming sessions played by game type as zero (0)
$i = 0;
foreach ($types_dictionary["en"] as $game_type) {
	$website["Data"]["Numbers"]["By type"][$game_type] = 0;
}

if (function_exists("Generate_Game_Type_Headers") == False) {
	function Generate_Game_Type_Headers($header_text = "") {
		global $website;
		global $Language;
		global $JSON;
		global $gameplayer;
		global $types_dictionary;

		$language = "pt";

		if (isset($website["language"]) == True) {
			$language = $website["language"];
		}

		if ($language == "general") {
			$language = "en";
		}

		if ($header_text == "") {
			$header_text = $website["Language texts"]["gaming_sessions_played_in"]."".$website["Data"]["Year"];
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		$text_color = $website["Style"]["text"]["theme"]["dark"];

		$types_dictionary = $gameplayer["Types"]["Types"];

		# Defina a shortcut for the total number of entries in the year
		$total_number = $gameplayer["Entries"]["Numbers"]["Total"];

		# Iterate through the English game types list
		$i = 0;
		foreach ($types_dictionary["en"] as $type) {
			$language_type = $types_dictionary[$language][$i];

			$number = $gameplayer["Entries"]["Numbers"]["By game type"][$type];

			if ($header_text == $gameplayer["Language texts"]["games_being_played"]) {
				$number = $gameplayer["Game information"]["Information"]["Numbers"][$type];
			}

			# If the number is not zero (0)
			if (
				$number != 0 or
				$total_number == 0
			) {
				$number_element = HTML::Element("span", $number, "", $text_color);

				$span = $language_type.": ".$number_element;

				$span = HTML::Element("b", $span);

				$href = $header_text.": ".$language_type;

				# Anchor element to go to the game type list
				if ($number != 0) {
					$a = HTML::Element("a", $span, 'href="#'.$href.'"');
				}

				else {
					$a = HTML::Element("a", $span);
				}

				$array["links"] .= $a."<br />"."\n\t\t";

				$gameplayer["Files"]["By game type"][$type] = $JSON -> To_PHP($gameplayer["Files"]["By game type"]["root"].$type."/Sessions.json");

				$number_element = HTML::Element("span", $number, "", $text_color);

				$span = $language_type.": ".$number_element;

				$span = HTML::Element("b", $span);

				# Create a link for the game type that anchors to the section for its gaming sessions
				$a = HTML::Element("a", $span, 'name="'.$href.'"')."<br />";

				$array["headers"][$type] = "\t\t".'<!-- "'.$type.'" game type header -->'."\n".
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