<?php 

# Watched

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

# Generate "watched things" tab content
$website["tab_content"]["watched_things"] = [
	"string" => "",
	"number" => 0
];

if (isset($website["data"]["year"]) == False) {
	$website["data"]["year"] = Date::Now()["year"];
}

if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["data"]["year"] = $website["data"]["title"];
}

if (isset($watch_history) == False) {
	# Define the Watch History array
	$watch_history = [
		"files" => [
			"per_media_type" => [
				"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$website["data"]["year"]]["per_media_type"]["root"]
			]
		],
		"types" => $JSON -> To_PHP($folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["data"]["types"]),
		"entries" => $JSON -> To_PHP($folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$website["data"]["year"]]["entries"]),
		"texts" => $JSON -> To_PHP($folders["apps"]["module_files"]["watch_history"]["texts"]),
		"language_texts" => [],
		"media_info" => [
			"Info" => $JSON -> To_PHP($folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["media_info"]["info"])
		]
	];
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
			$header_text = $website["language_texts"]["watched_things"]." [".$website["data"]["year"]."]";
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		# Iterate through the English plural media types list
		$i = 0;
		foreach ($watch_history["types"]["Plural"]["en"] as $plural_media_type) {
			$language_media_type = $watch_history["types"]["Plural"][$language][$i];

			$number = $watch_history["entries"]["Numbers"]["Per Media Type"][$plural_media_type];

			if ($header_text == $website["language_texts"]["media_being_watched"]) {
				$number = $watch_history["media_info"]["Info"]["Numbers"][$plural_media_type];
			}

			$span = HTML::Element("span", $number, "", $website["style"]["text_highlight"]);

			$b = HTML::Element("b", $language_media_type.": ".$span);

			$href = $header_text.": ".$language_media_type;

			# Anchor element to go to media type list
			if ($number != 0) {
				$a = HTML::Element("a", $b, 'href="#'.$href.'"');
			}

			else {
				$a = HTML::Element("a", $b);
			}

			$array["links"] .= $a."<br />"."\n\t\t";

			$watch_history["files"]["per_media_type"][$plural_media_type] = $JSON -> To_PHP($watch_history["files"]["per_media_type"]["root"].$plural_media_type."/Entries.json");

			$span = HTML::Element("span", $number, "", $website["style"]["text_highlight"]);

			$b = HTML::Element("b", $language_media_type.": ".$span);

			# Plural media type header with anchor href to go to media type episodes part
			$a = HTML::Element("a", $b, 'name="'.$href.'"')."<br />";

			$array["headers"][$plural_media_type] = "\t\t".'<!-- "'.$plural_media_type.'" media type header -->'."\n".
			"\t\t".$a."\n";

			$i++;
		}

		return $array;
	}
}

if (function_exists("Define_Title") == False) {
	function Define_Title($array) {
		global $Language;
		global $language;

		$key = "Original";

		if (array_key_exists($language, $array) == True) {
			$key = $language;
		}

		elseif (array_key_exists("Romanized", $array) == True) {
			$key = "Romanized";
		}

		return $array[$key];
	}
}

# Define the Watch History array
$watch_history["files"] = [
	"per_media_type" => [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$website["data"]["year"]]["per_media_type"]["root"]
	]
];

$watch_history["entries"] = $JSON -> To_PHP($folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$website["data"]["year"]]["entries"]);

$media_type_headers = Generate_Media_Type_Headers();

# Update the watched things number
$website["tab_content"]["watched_things"]["number"] = $watch_history["entries"]["Numbers"]["Total"];

$website["tab_content"]["watched_things"]["string"] .= "<!-- Media type headers -->"."\n"."\t\t".
$media_type_headers["links"].
"\n"."\t\t"."<br />"."\n\n";

# Iterate through the English plural media types list
$i = 0;
foreach ($watch_history["types"]["Plural"]["en"] as $plural_media_type) {
	$language_media_type = $watch_history["types"]["Plural"][$language][$i];

	$number = $watch_history["entries"]["Numbers"]["Per Media Type"][$plural_media_type];

	if ($number != 0) {
		$website["tab_content"]["watched_things"]["string"] .= $media_type_headers["headers"][$plural_media_type];

		# Iterate through the media type Entries list
		foreach ($watch_history["files"]["per_media_type"][$plural_media_type]["Entries"] as $entry) {
			$entry = $watch_history["entries"]["Dictionary"][$entry];

			# Add the Media title
			$title = Define_Title($entry["Media"]);

			# Split original movie name (to get year and producer)
			if ($plural_media_type == "Movies") {
				$title .= " (".explode(" (", $entry["Media"]["Original"])[1];
			}

			# Add the Media item title
			if (array_key_exists("Item", $entry) == True) {
				$item = Define_Title($entry["Item"]);

				if ($plural_media_type == "Videos") {
					$title .= ": ";
				}

				if ($item[0].$item[1] != ": ") {
					$title .= " ";
				}

				if ($plural_media_type != "Videos") {
					$title .= $item;
				}
			}

			# Add the Media episode title
			if (array_key_exists("Episode", $entry) == True) {
				$episode = Define_Title($entry["Episode"]["Titles"]);

				if ($episode[0].$episode[1] != ": " and preg_match_all("/S[0-9]{2}/i", $item) == 0) {
					$title .= " ";
				}

				$title .= $episode;
			}

			$format = "Y-m-d\TH:i:s\Z";

			if (strlen($entry["Date"]) == 4) {
				$format = "Y";
			}

			$time = $entry["Date"];

			if ($time != "") {
				$time = Date::Now($time, $format);
			}

			if (strlen($entry["Date"]) != 4) {
				$time = $time["formats"]["HH:MM DD/MM/YYYY"];
			}

			if (strlen($entry["Date"]) == 4) {
				$time = $time["year"];
			}

			# Add media unit link
			if (array_key_exists("Link", $entry) == True) {
				$title = HTML::Element("a", $title." ".$website["icons"]["YouTube"], 'href="'.$entry["Link"].'" target="_blank" alt="'.$website["language_texts"]["link, title()"].'" title="'.$website["language_texts"]["link, title()"].'"', $website["style"]["text_highlight"]);
			}

			# Add media unit comment link
			if (array_key_exists("Comment", $entry) == True and array_key_exists("Link", $entry["Comment"]) == True) {
				$title .= " ".HTML::Element("a", $website["icons"]["comment"], 'href="'.$entry["Comment"]["Link"].'" target="_blank" alt="'.$website["language_texts"]["comment, title()"].'" title="'.$website["language_texts"]["comment, title()"].'"', $website["style"]["text_highlight"]);
			}

			$text = $entry["Number"]." -";

			# Add States
			if (array_key_exists("States", $entry) == True) {
				if (array_key_exists("Re-watched", $entry["States"]) == True) {
					$times_text = $website["language_texts"]["number_of_watched_times"].": ".($entry["States"]["Re-watched"]["Times"] + 1)."x";

					$text .= " ".HTML::Element("span", ($entry["States"]["Re-watched"]["Times"] + 1)."x ".$website["icons"]["eye"], 'alt="'.$times_text.'" title="'.$times_text.'"', $website["style"]["text_highlight"]);
				}

				if (array_key_exists("First entry in year", $entry["States"]) == True) {
					$first_text = $website["language_texts"]["first_watched_media_in_the_year"];

					$text .= " ".HTML::Element("span", "1# ".$website["icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["style"]["text_highlight"]);
				}

				if (array_key_exists("First media type entry in year", $entry["States"]) == True) {
					$first_text = $website["language_texts"]["first_watched_media_per_media_type_in_the_year"];

					$text .= " ".HTML::Element("span", "1# ".$website["icons"]["film"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["style"]["text_highlight"]);
				}
			}

			$title = HTML::Element("span", $title, "", $website["style"]["text_highlight"]);

			$text .= " ".$title." (".$time.")";

			$text = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["style"]["text_hover"]);

			$website["tab_content"]["watched_things"]["string"] .= $text."<br />"."\n";
		}

		if ($plural_media_type != array_reverse($watch_history["types"]["Plural"][$language])[0]) {
			$website["tab_content"]["watched_things"]["string"] .= "\t\t"."<br />"."\n\n";
		}
	}

	$i++;
}

$website["tab_content"]["watched_things"]["string"] .= "<br /><br />";

# Add tab to the tab templates
if (array_key_exists("watched_things", $website["tabs"]["templates"]) == False) {
	$website["tabs"]["templates"]["watched_things"] = [
		"name" => $website["language_texts"]["watched_things"]." [".$website["data"]["year"]."]",
		"add" => " ".HTML::Element("span", $website["tab_content"]["watched_things"]["number"], "", $website["style"]["text_highlight"]),
		"text_style" => "text-align: left;",
		"content" => $website["tab_content"]["watched_things"]["string"],
		"icon" => "eye"
	];
}

?>