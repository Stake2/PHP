<?php 

# Played

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["Full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["Full"][$language];
}

# Generate "watched things" tab content
$website["tab_content"]["gaming_sessions_played"] = [
	"string" => "",
	"number" => 0
];

# Create additional tabs array
if (array_key_exists("additional_tabs", $website) == False) {
	$website["additional_tabs"] = [
		"data" => []
	];
}

if (isset($website["Data"]["Year"]) == False) {
	$website["Data"]["Year"] = Date::Now()["Year"];
}

if (in_array($website["Data"]["title"], $website["Years"]) == True) {
	$website["Data"]["Year"] = $website["Data"]["title"];
}

if (isset($website["Play History"]) == False) {
	$website["Play History"] = [
		"Years list" => Date::Create_Years_List($mode = "array", $start = 2021, $plus = 0)
	];
}

# Define the data network folder for easier typing
$network_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Games"];

if (isset($gameplayer) == False) {
	# Define the "GamePlayer" array
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
			$header_text = $website["Language texts"]["gaming_sessions_played_in"]."".$website["Data"]["Year"];
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		$text_color = $website["Style"]["text"]["theme"]["dark"];

		$types_dictionary = $gameplayer["Types"]["Types"];

		# Define a shortcut for the total number of entries in the year
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
			# Or the total number of tasks is zero
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

# Update the "By game type" folder
$gameplayer["Files"]["By game type"] = [
	"root" => $network_folder["Play History"][$website["Data"]["Year"]]["By game type"]["root"]
];

# Define the Entries file for easier typing
$entries_file = $network_folder["Play History"][$website["Data"]["Year"]]["Entries"];

if (file_exists($entries_file) == True) {
	$gameplayer["Entries"] = $JSON -> To_PHP($entries_file);

	# Add to the year entries number
	$current_year = $website["Data"]["Year"];

	if (isset($website["Data"]["Numbers"]["By year"][$current_year]) == False) {
		$website["Data"]["Numbers"]["By year"][$current_year] = $gameplayer["Entries"]["Numbers"]["Total"];
	}

	# Sort the year keys
	ksort($website["Data"]["Numbers"]["By year"]);

	$website_title = "Play History";

	$tab = "past_registry_".$website["Data"]["Year"];

	# If the local year is the current year
	# Then, the tab that needs to be used is the "gaming_sessions_played" tab
	if ($website["Data"]["Year"] == $website["current_year"]) {
		$tab = "gaming_sessions_played";
	}

	if ($website["Data"]["title"] != $website_title) {
		$website_dictionary = $website["Dictionary"][$website_title];

		$link = $website_dictionary["Links"]["Language"];

		if (str_contains($link, "?") == False) {
			$link .= "?";
		}

		else {
			$link .= "&";
		}

		$link .= "tab=".$tab;

		# Add the website button to the top of the page
		$website["tab_content"]["gaming_sessions_played"]["string"] .= "<center>"."\n".
		$Text -> Format($website_dictionary["Button template"], $link)."\n".
		"<p></p>".

		# Add the website image to the top of the tab
		$website_dictionary["image"]["elements"]["theme"]["dark"]."\n".
		"</center>"."\n".
		"<br />"."\n";
	}

	$type_headers = Generate_Game_Type_Headers();

	# Update the number of gaming sessions played
	$website["tab_content"]["gaming_sessions_played"]["number"] = $gameplayer["Entries"]["Numbers"]["Total"];

	if (
		$website["Data"]["title"] != $website_title or
		$website["tab_content"]["gaming_sessions_played"]["number"] == 0
	) {
		# Create the number of gaming sessions variable with the tab title
		$number_of_gaming_sessions = $website["Language texts"]["gaming_sessions_played_in"]." ".$website["Data"]["Year"].":";

		# Add the icon of the tab
		$number_of_gaming_sessions .= " ".$website["Icons"]["gamepad"];

		# Add the number of gaming sessions
		$number_of_gaming_sessions .= " ".HTML::Element("span", $website["tab_content"]["gaming_sessions_played"]["number"], "", $website["Style"]["text"]["theme"]["dark"])."<br /><br />";

		# Transform everything into bold style
		$number_of_gaming_sessions = HTML::Element("b", $number_of_gaming_sessions);

		# Add the number of gaming sessions text to the tab string content
		$website["tab_content"]["gaming_sessions_played"]["string"] .= $number_of_gaming_sessions;
	}

	$website["tab_content"]["gaming_sessions_played"]["string"] .= "<!-- Game type headers -->"."\n"."\t\t".
	$type_headers["links"].
	"\n"."\t\t"."<br />"."\n\n";

	$text_color = $website["Style"]["text"]["theme"]["dark"];

	$types_dictionary = $gameplayer["Types"]["Types"];

	# Iterate through the English game types list
	$i = 0;
	foreach ($types_dictionary["en"] as $type) {
		$language_type = $types_dictionary[$language][$i];

		$modules_language = $types_dictionary[$Language -> modules_language][$i];

		$number = $gameplayer["Entries"]["Numbers"]["By game type"][$type];

		$website["Data"]["Numbers"]["By type"][$type] += $number;

		if ($number != 0) {
			$website["tab_content"]["gaming_sessions_played"]["string"] .= $type_headers["headers"][$type];

			$entries = $gameplayer["Files"]["By game type"][$type]["Entries"];

			# Iterate through the game type Entries list
			foreach ($gameplayer["Files"]["By game type"][$type]["Entries"] as $entry) {
				$entry = $gameplayer["Entries"]["Dictionary"][$entry];

				# Add the game title
				$title = Define_Title($entry["Game titles"]);

				$item = "";

				$entry_title = $title;

				# Add the sub-game title if it exists
				if (isset($entry["Sub-game titles"])) {
					$sub_game_title = Define_Title($entry["Sub-game titles"]);

					if ($sub_game_title[0].$sub_game_title[1] != ": ") {
						$title .= ": ";
					}

					$title .= $sub_game_title;
				}

				# ---------- #

				# Define the default date format
				$datetime_format = "Y-m-d\TH:i:s\Z";

				# Initialize the finished playing time output
				$finished_playing_time = "";

				# Define the time key
				$time_key = "Finished playing";

				# If the time key is present
				if (isset($entry["Times"][$time_key])) {
					# Get the raw time (UTC)
					$raw_time = $entry["Times"][$time_key." (UTC)"];

					# If the raw time has four characters
					if (strlen($raw_time) == 4) {
						# Define the datetime format as the year format
						$datetime_format = "Y";

						# Make a "Date" dictionary from the date using the datetime format
						$parsed_date = Date::Now($raw_time, $datetime_format);

						# Get the year from the parsed date
						$finished_playing_time = $parsed_date["Year"];
					}

					# If the raw time is a string and not empty
					elseif ($raw_time !== "") {
						# Make a "Date" dictionary from the date using the datetime format
						$parsed_time = Date::Now($raw_time, $datetime_format);

						# Get the time in the user format
						$finished_playing_time = $parsed_time["Formats"]["HH:MM DD/MM/YYYY"];
					}
				}

				# ---------- #

				# Create the text with the gaming session number as the initial data
				$text = $entry["Gaming session number"]." -";

				# Add the game states
				if (isset($entry["States"]) == True) {
					if (isset($entry["States"]["Re-played"]) == True) {
						$times_text = $website["Language texts"]["number_of_played_times"].": ".($entry["States"]["Re-played"]["Times"] + 1)."x";

						$text .= " ".HTML::Element("span", ($entry["States"]["Re-played"]["Times"] + 1)."x ".$website["Icons"]["gamepad"], 'alt="'.$times_text.'" title="'.$times_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
					}

					if (isset($entry["States"]["First gaming session in the year"]) == True) {
						$first_text = $gameplayer["Language texts"]["first_gaming_session_in_the_year"];

						$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
					}

					if (isset($entry["States"]["First gaming session by game type in the year"]) == True) {
						$first_text = Text::Format($gameplayer["Language texts"]["first_gaming_session_of_the_{}_game_category_in_the_year"], $language_type);

						$first_text_replaced = str_replace('"', "'", $first_text);

						$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["gamepad"]." ".$website["Icons"]["calendar"], 'alt="'.$first_text_replaced.'" title="'.$first_text_replaced.'"', $website["Style"]["text_highlight"]." underline_on_hover");
					}

					if (
						isset($entry["States"]["Re-played"]) == True or
						isset($entry["States"]["First gaming session in the year"]) == True or
						isset($entry["States"]["First gaming session by game type in the year"]) == True
					) {
						$text .= " - ";
					}
				}

				# Add quotes to the game title
				$title = '"'.$title.'"';

				# ---------- #

				# Get the original platform
				$original_platform = $entry["Platform"];

				# Define a text key to the platform
				$text_key = str_replace(" ", "_", strtolower($original_platform));

				if (str_contains($text_key, "_") == False) {
					$text_key .= ", title()";
				}

				# Define a default language platform as the original platform
				$language_platform = $original_platform;

				# Get the language platform if the text key exists
				if (isset($website["Language texts"][$text_key])) {
					$language_platform = $website["Language texts"][$text_key];
				}

				# If the platform where the game was played is not "Computer", add the language platform to the game title
				if ($original_platform != "Computer") {
					$title .= " (".$language_platform.")";
				}

				# ---------- #

				# Get the session duration dictionary
				$session_duration = $entry["Times"]["Gaming session duration"];

				# Remove the text key
				unset($session_duration["Text"]);

				# Get the text duration
				$session_duration = Date::Make_Time_Text($session_duration)[$language];

				$title .= ", ".$website["Language texts"]["gaming_session_duration"].": ".$session_duration;

				# Paint the title
				$title = HTML::Element("span", $title, "", $text_color." ".$website["Style"]["text_hover"]);

				# Add the finished playing time and the title to the text
				$text .= " ".$title." (".$finished_playing_time.")";

				$text = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["Style"]["text_hover"]);

				$website["tab_content"]["gaming_sessions_played"]["string"] .= $text."<br />"."\n";
			}

			if ($type != end($types_dictionary[$language])) {
				$website["tab_content"]["gaming_sessions_played"]["string"] .= "\t\t"."<br />"."\n\n";
			}
		}

		$i++;
	}

	$website["tab_content"]["gaming_sessions_played"]["string"] .= "<br /><br />";

	# Add the tab to the tab templates
	if (isset($website["tabs"]["templates"]["gaming_sessions_played"]) == False) {
		$website["tabs"]["templates"]["gaming_sessions_played"] = [
			"name" => $website["Language texts"]["gaming_sessions_played_in"]." ".$website["Data"]["Year"],
			"add" => " ".HTML::Element("span", $website["tab_content"]["gaming_sessions_played"]["number"], "", $website["Style"]["text"]["theme"]["dark"]),
			"text_style" => "text-align: left;",
			"content" => $website["tab_content"]["gaming_sessions_played"]["string"],
			"icon" => "gamepad"
		];
	}
}

else {
	# Define the "Gaming sessions" tab to be removed if it does not contain gaming sessions
	array_push($website["tabs"]["To remove"], "gaming_sessions_played");
}

?>