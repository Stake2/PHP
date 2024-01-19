<?php 

# Played

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
$website["tab_content"]["game_sessions"] = [
	"string" => "",
	"number" => 0
];

# Create additional tabs array
if (array_key_exists("additional_tabs", $website) == False) {
	$website["additional_tabs"] = [
		"data" => []
	];
}

if (isset($website["Data"]["year"]) == False) {
	$website["Data"]["year"] = Date::Now()["year"];
}

if (in_array($website["Data"]["title"], $website["years"]) == True) {
	$website["Data"]["year"] = $website["Data"]["title"];
}

if (isset($website["Play History"]) == False) {
	$website["Play History"] = [
		"Years list" => Date::Create_Years_List($mode = "array", $start = 2021, $plus = -1)
	];
}

# Define the data network folder for easier typing
$network_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Games"];

if (isset($gameplayer) == False) {
	# Define the "GamePlayer" array
	$gameplayer = [
		"Files" => [
			"Per Game Type" => [
				"root" => $network_folder["Play History"][$website["Data"]["year"]]["Per Game Type"]["root"]
			]
		],
		"Types" => $JSON -> To_PHP($network_folder["Data"]["Types"]),
		"Entries" => $JSON -> To_PHP($network_folder["Play History"][$website["Data"]["year"]]["Entries"]),
		"Texts" => $JSON -> To_PHP($folders["Apps"]["Module files"]["GamePlayer"]["Texts"]),
		"Language texts" => [],
		"Information" => [
			"Information" => $JSON -> To_PHP($network_folder["Information"]["Information"])
		]
	];

	$gameplayer["Language texts"] = $Language -> Item($gameplayer["Texts"]);

	$types_dictionary = $gameplayer["Types"]["Types"];

	$website["Data"]["Numbers"] = [
		"By year" => [],
		"By type" => []
	];

	# Iterate through the English media types list
	$i = 0;
	foreach ($types_dictionary["en"] as $type) {
		$website["Data"]["Numbers"]["By type"][$type] = 0;
	}
}

if (function_exists("Generate_Game_Type_Headers") == False) {
	function Generate_Game_Type_Headers($header_text = "") {
		global $website;
		global $Language;
		global $JSON;
		global $gameplayer;

		$language = "pt";

		if (isset($website["language"]) == True) {
			$language = $website["language"];
		}

		if ($language == "general") {
			$language = "en";
		}

		if ($header_text == "") {
			$header_text = $gameplayer["Language texts"]["game_sessions_played_in"]."".$website["Data"]["year"];
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		$text_color = $website["Style"]["text"]["theme"]["dark"];

		$types_dictionary = $gameplayer["Types"]["Types"];

		# Iterate through the English game types list
		$i = 0;
		foreach ($types_dictionary["en"] as $type) {
			$language_type = $types_dictionary[$language][$i];

			$number = $gameplayer["Entries"]["Numbers"]["Per Game Type"][$type];

			if ($header_text == $gameplayer["Language texts"]["games_being_played"]) {
				$number = $gameplayer["Information"]["Information"]["Numbers"][$type];
			}

			# If the number is not zero (0)
			if ($number != 0) {
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

				$gameplayer["Files"]["Per Game Type"][$type] = $JSON -> To_PHP($gameplayer["Files"]["Per Game Type"]["root"].$type."/Sessions.json");

				$number_element = HTML::Element("span", $number, "", $text_color);

				$span = $language_type.": ".$number_element;

				$span = HTML::Element("b", $span);

				# Game type header with anchor href to go to the game type sessions part
				$a = HTML::Element("a", $span, 'name="'.$href.'"')."<br />";

				$array["headers"][$type] = "\t\t".'<!-- "'.$type.'" game type header -->'."\n".
				"\t\t".$a."\n";
			}

			$i++;
		}

		return $array;
	}
}

# Update the "Per Game Type" folder
$gameplayer["Files"]["Per Game Type"] = [
	"root" => $network_folder["Play History"][$website["Data"]["year"]]["Per Game Type"]["root"]
];

# Define the Entries file for easier typing
$entries_file = $network_folder["Play History"][$website["Data"]["year"]]["Entries"];

if (file_exists($entries_file) == True) {
	$gameplayer["Entries"] = $JSON -> To_PHP($entries_file);

	# Add to the year entries number
	$current_year = $website["Data"]["year"];

	if (isset($website["Data"]["Numbers"]["By year"][$current_year]) == False) {
		$website["Data"]["Numbers"]["By year"][$current_year] = $gameplayer["Entries"]["Numbers"]["Total"];
	}

	# Sort the year keys
	ksort($website["Data"]["Numbers"]["By year"]);

	$type_headers = Generate_Game_Type_Headers();

	# Update the game sessions number
	$website["tab_content"]["game_sessions"]["number"] = $gameplayer["Entries"]["Numbers"]["Total"];

	$website["tab_content"]["game_sessions"]["string"] .= "<!-- Game type headers -->"."\n"."\t\t".
	$type_headers["links"].
	"\n"."\t\t"."<br />"."\n\n";

	$text_color = $website["Style"]["text"]["theme"]["dark"];

	$types_dictionary = $gameplayer["Types"]["Types"];

	# Iterate through the English game types list
	$i = 0;
	foreach ($types_dictionary["en"] as $type) {
		$language_type = $types_dictionary[$language][$i];

		$modules_language = $types_dictionary[$Language -> modules_language][$i];

		$number = $gameplayer["Entries"]["Numbers"]["Per Game Type"][$type];

		$website["Data"]["Numbers"]["By type"][$type] += $number;

		if ($number != 0) {
			$website["tab_content"]["game_sessions"]["string"] .= $type_headers["headers"][$type];

			$entries = $gameplayer["Files"]["Per Game Type"][$type]["Entries"];

			# Iterate through the game type Entries list
			foreach ($gameplayer["Files"]["Per Game Type"][$type]["Entries"] as $entry) {
				$entry = $gameplayer["Entries"]["Dictionary"][$entry];

				# Add the game title
				$title = Define_Title($entry["Titles"]);

				$item = "";

				$entry_title = $title;

				# Define the date
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

				$text = $entry["Number"]." -";

				# Add the States
				if (array_key_exists("States", $entry) == True) {
					if (array_key_exists("Re-played", $entry["States"]) == True) {
						$times_text = $gameplayer["Language texts"]["number_of_played_times"].": ".($entry["States"]["Re-played"]["Times"] + 1)."x";

						$text .= " ".HTML::Element("span", ($entry["States"]["Re-played"]["Times"] + 1)."x ".$website["Icons"]["gamepad"], 'alt="'.$times_text.'" title="'.$times_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
					}

					if (array_key_exists("First game session in year", $entry["States"]) == True) {
						$first_text = $gameplayer["Language texts"]["first_game_session_in_year"];

						$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
					}

					if (array_key_exists("First game type session in year", $entry["States"]) == True) {
						$first_text = Text::Format($gameplayer["Language texts"]["first_game_session_of_the_{}_category_in_year"], $language_type);

						$first_text_replaced = str_replace('"', "'", $first_text);

						$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["gamepad"]." ".$website["Icons"]["calendar"], 'alt="'.$first_text_replaced.'" title="'.$first_text_replaced.'"', $website["Style"]["text_highlight"]." underline_on_hover");
					}

					if (
						array_key_exists("Re-played", $entry["States"]) == True or
						array_key_exists("First entry in year", $entry["States"]) == True or
						array_key_exists("First game type session in year", $entry["States"]) == True
					) {
						$text .= " - ";
					}
				}

				# Add quotes to the game title
				$title = '"'.$title.'"';

				# Add the platform where the game was played
				$platform = $entry["Platform"];

				$text_key = str_replace(" ", "_", strtolower($platform));

				if (str_contains($text_key, "_") == False) {
					$text_key .= ", title()";
				}

				if (isset($website["Language texts"][$text_key])) {
					$platform = $website["Language texts"][$text_key];
				}

				# If the platform where the game was played is not "PC", add it to the title
				if ($platform != "PC") {
					$title .= " (".$platform.")";
				}

				# Add the duration of the session
				$duration = $entry["Session duration"];
				unset($duration["Text"]);

				$duration = Date::Make_Time_Text($duration)[$language];

				$title .= ", ".$gameplayer["Language texts"]["session_duration"].": ".$duration;

				# Paint the title
				$title = HTML::Element("span", $title, "", $text_color." ".$website["Style"]["text_hover"]);

				# Update the text
				$text .= " ".$title." (".$time.")";

				$text = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["Style"]["text_hover"]);

				$website["tab_content"]["game_sessions"]["string"] .= $text."<br />"."\n";
			}

			if ($type != end($types_dictionary[$language])) {
				$website["tab_content"]["game_sessions"]["string"] .= "\t\t"."<br />"."\n\n";
			}
		}

		$i++;
	}

	$website["tab_content"]["game_sessions"]["string"] .= "<br /><br />";

	# Add the tab to the tab templates
	if (array_key_exists("game_sessions", $website["tabs"]["templates"]) == False) {
		$website["tabs"]["templates"]["game_sessions"] = [
			"name" => $gameplayer["Language texts"]["game_sessions_played_in"]." ".$website["Data"]["year"],
			"add" => " ".HTML::Element("span", $website["tab_content"]["game_sessions"]["number"], "", $website["Style"]["text"]["theme"]["dark"]),
			"text_style" => "text-align: left;",
			"content" => $website["tab_content"]["game_sessions"]["string"],
			"icon" => "eye"
		];
	}
}

else {
	# Define the "Game sessions" tab to be removed if it does not contain game sessions
	array_push($website["tabs"]["To remove"], "game_sessions");
}

?>