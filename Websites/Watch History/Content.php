<?php 

# Content.php

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

# Define custom website folders
$website["data"]["folders"]["generators"] = [
	"root" => $website["data"]["folders"]["php"]["root"]."Generators/"
];

# Define the website files
$website["data"]["files"] = [
	"generators" => []
];

$website["data"]["numbers"] = [
	"Watched things by year" => [],
	"Watched things by media type" => []
];

# Define the Generator files
$names = [
	"Watched",
	"Media being watched",
	"Past registries"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$website["data"]["files"]["generators"][$key] = $website["data"]["folders"]["generators"]["root"].$item.".php";
}

if (isset($website["data"]["year"]) == False) {
	$website["data"]["year"] = Date::Now()["year"];
}

if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["data"]["year"] = $website["data"]["title"];
}

# Define the Watch History array
$watch_history = [
	"files" => [
		"per_media_type" => [
			"root" => $folders["mega"]["notepad"]["effort"]["networks"]["audiovisual_media_network"]["watch_history"][$website["data"]["year"]]["per_media_type"]["root"]
		]
	],
	"types" => $JSON -> To_PHP($folders["mega"]["notepad"]["effort"]["networks"]["audiovisual_media_network"]["data"]["types"]),
	"entries" => $JSON -> To_PHP($folders["mega"]["notepad"]["effort"]["networks"]["audiovisual_media_network"]["watch_history"][$website["data"]["year"]]["entries"]),
	"texts" => $JSON -> To_PHP($folders["apps"]["module_files"]["watch_history"]["texts"]),
	"language_texts" => [],
	"media_info" => [
		"Info" => $JSON -> To_PHP($folders["mega"]["notepad"]["effort"]["networks"]["audiovisual_media_network"]["media_info"]["info"])
	]
];

$watch_history["language_texts"] = $Language -> Item($watch_history["texts"]);

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
			$header_text = $website["language_texts"]["watched_things_in"]."".$website["data"]["year"];
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		$text_color = $website["style"]["text"]["theme"]["dark"];

		# Iterate through the English plural media types list
		$i = 0;
		foreach ($watch_history["types"]["Plural"]["en"] as $plural_media_type) {
			$language_media_type = $watch_history["types"]["Plural"][$language][$i];

			$number = $watch_history["entries"]["Numbers"]["Per Media Type"][$plural_media_type];

			if ($header_text == $website["language_texts"]["media_being_watched"]) {
				$number = $watch_history["media_info"]["Info"]["Numbers"][$plural_media_type];
			}

			$number_element = HTML::Element("span", $number, "", $text_color);

			$span = $language_media_type.": ".$number_element;

			$span = HTML::Element("b", $span);

			$href = $header_text.": ".$language_media_type;

			# Anchor element to go to media type list
			if ($number != 0) {
				$a = HTML::Element("a", $span, 'href="#'.$href.'"');
			}

			else {
				$a = HTML::Element("a", $span);
			}

			$array["links"] .= $a."<br />"."\n\t\t";

			$watch_history["files"]["per_media_type"][$plural_media_type] = $JSON -> To_PHP($watch_history["files"]["per_media_type"]["root"].$plural_media_type."/Entries.json");

			$number_element = HTML::Element("span", $number, "", $text_color);

			$span = $language_media_type.": ".$number_element;

			$span = HTML::Element("b", $span);

			# Plural media type header with anchor href to go to media type episodes part
			$a = HTML::Element("a", $span, 'name="'.$href.'"')."<br />";

			$array["headers"][$plural_media_type] = "\t\t".'<!-- "'.$plural_media_type.'" media type header -->'."\n".
			"\t\t".$a."\n";

			$i++;
		}

		return $array;
	}
}

# Require generator files to generate tab templates
foreach (array_keys($website["data"]["files"]["generators"]) as $key) {
	$generator_file = $website["data"]["files"]["generators"][$key];

	require $generator_file;
}

?>