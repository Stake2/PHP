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

# Create additional tabs array
if (array_key_exists("additional_tabs", $website) == False) {
	$website["additional_tabs"] = [
		"data" => []
	];
}

if (isset($website["data"]["year"]) == False) {
	$website["data"]["year"] = Date::Now()["year"];
}

if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["data"]["year"] = $website["data"]["title"];
}

if (isset($website["watch_history"]) == False) {
	$website["watch_history"] = [
		"years_list" => Date::Create_Years_List($mode = "array", $start = 2018, $plus = -1)
	];
}

if (isset($watch_history) == False) {
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

# Define the Watch History array
$watch_history["files"] = [
	"per_media_type" => [
		"root" => $folders["mega"]["notepad"]["effort"]["networks"]["audiovisual_media_network"]["watch_history"][$website["data"]["year"]]["per_media_type"]["root"]
	]
];

$watch_history["entries"] = $JSON -> To_PHP($folders["mega"]["notepad"]["effort"]["networks"]["audiovisual_media_network"]["watch_history"][$website["data"]["year"]]["entries"]);

# Add to year entries number
$current_year = $website["data"]["year"];

if (isset($website["data"]["numbers"]["Watched things by year"][$current_year]) == False) {
	$website["data"]["numbers"]["Watched things by year"][$current_year] = $watch_history["entries"]["Numbers"]["Total"];
}

$media_type_headers = Generate_Media_Type_Headers();

# Update the watched things number
$website["tab_content"]["watched_things"]["number"] = $watch_history["entries"]["Numbers"]["Total"];

$website["tab_content"]["watched_things"]["string"] .= "<!-- Media type headers -->"."\n"."\t\t".
$media_type_headers["links"].
"\n"."\t\t"."<br />"."\n\n";

$text_color = $website["style"]["text"]["theme"]["dark"];

# Iterate through the English plural media types list
$i = 0;
foreach ($watch_history["types"]["Plural"]["en"] as $plural_media_type) {
	$language_media_type = $watch_history["types"]["Plural"][$language][$i];

	$modules_language = $watch_history["types"]["Plural"][$Language -> modules_language][$i];

	$number = $watch_history["entries"]["Numbers"]["Per Media Type"][$plural_media_type];

	$website["data"]["numbers"]["Watched things by media type"][$plural_media_type] = $number;

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

			$item = "";

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

			$entry_title = $title;

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

			# Add States
			if (array_key_exists("States", $entry) == True) {
				if (array_key_exists("Re-watched", $entry["States"]) == True) {
					$times_text = $website["language_texts"]["number_of_watched_times"].": ".($entry["States"]["Re-watched"]["Times"] + 1)."x";

					$text .= " ".HTML::Element("span", ($entry["States"]["Re-watched"]["Times"] + 1)."x ".$website["icons"]["eye"], 'alt="'.$times_text.'" title="'.$times_text.'"', $website["style"]["text_highlight"]." underline_on_hover");
				}

				if (array_key_exists("First entry in year", $entry["States"]) == True) {
					$first_text = $website["language_texts"]["first_watched_media_in_the_year"];

					$text .= " ".HTML::Element("span", "1# ".$website["icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["style"]["text_highlight"]." underline_on_hover");
				}

				if (array_key_exists("First media type entry in year", $entry["States"]) == True) {
					$first_text = $website["language_texts"]["first_watched_media_per_media_type_in_the_year"];

					$text .= " ".HTML::Element("span", "1# ".$website["icons"]["film"]." ".$website["icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["style"]["text_highlight"]." underline_on_hover");
				}

				if (
					array_key_exists("Re-watched", $entry["States"]) == True or
					array_key_exists("First entry in year", $entry["States"]) == True or
					array_key_exists("First media type entry in year", $entry["States"]) == True
				) {
					$text .= " - ";
				}
			}

			if (
				array_key_exists("Comment", $entry) == True and
				array_key_exists("Link", $entry["Comment"]) == False
			) {
				$title .= " ".HTML::Element("span", $website["icons"]["comment"], "", $website["style"]["text_highlight"]);
			}

			# If the entry tabs are activated
			if (
				isset($entry["States"]) == True and
				isset($entry["States"]["Commented"]) and
				$website["States"]["Watch History"]["Entry tabs"] == True
			) {
				# If the past history entry tabs are activated
				# Or they are deactivated and the year inside the data array is the same as the current year
				if (
					$website["States"]["Watch History"]["Past registry entry tabs"] == True or
					$website["States"]["Watch History"]["Past registry entry tabs"] == False and
					$website["data"]["year"] == $website["date"]["year"]
				) {
					# Add the description tab link and create the tab
					$link_text = $website["language_texts"]["entry_description"];

					$tab_id = "watched_thing_".$website["data"]["year"]."_".$entry["Number"];

					$style = 'style="text-decoration: underline; cursor: pointer;"';

					$title = HTML::Element("a", $title, 'onclick="'."Open_Tab('".$tab_id."')".'" target="_blank" alt="'.$link_text.'" title="'.$link_text.'" '.$style, $text_color);

					# Create the tab title
					$tab_title = $entry["Number"]." - ".$entry_title." (".$time.")";

					# Get the entry description file
					$folder = $folders["mega"]["notepad"]["effort"]["years"][$website["data"]["year"]][$language]["watched_media"]["root"].$language_media_type."/";

					$local_entry = str_replace(":", ";", $entry["Entry"]);
					$local_entry = str_replace("/", "-", $local_entry);

					$file = $folder.$local_entry.".txt";

					# Get the entry description text from the file
					$tab_content = $File -> Contents($file)["string"];

					# Add the comment text to the entry description text
					if (array_key_exists("Comment", $entry) == True) {
						# Get the media folder
						$media_info_folder = $folders["mega"]["notepad"]["effort"]["networks"]["audiovisual_media_network"]["media_info"]["root"].$modules_language."/";

						$media_title = Sanitize_Title(Define_Title($entry["Media"]));

						if ($plural_media_type == $watch_history["texts"]["movies, title()"]["en"]) {
							$media_title = Sanitize_Title($entry["Media"]["Original"]);
						}

						$media_folder = $media_info_folder.Sanitize_Title($media_title)."/";

						# Add the media item list folder to the media folder
						if ($plural_media_type != $watch_history["texts"]["videos, title()"]["en"]) {
							$text_key = "seasons";
						}

						if ($plural_media_type == $watch_history["texts"]["videos, title()"]["en"]) {
							$text_key = "series";
						}

						$folder_name = $watch_history["texts"][$text_key.", title()"][$Language -> modules_language];

						# Add the media item list folder if it exists
						if (file_exists($media_folder.$folder_name."/") == True) {
							$media_folder .= $folder_name."/";
						}

						if (array_key_exists("Item", $entry)) {
							$item = $entry["Item"]["Original"];

							if (isset($entry["Item"]["en"]) == True) {
								$item = $entry["Item"]["en"];
							}

							$media_folder .= Sanitize_Title($item)."/";
						}

						# Add the media folder if it exists
						if (file_exists($media_folder.$media_title."/") == True) {
							$media_folder .= $media_title."/";
						}

						# Get the comments folder
						$comment_text = $website["texts"]["comments, title()"][$Language -> modules_language];
						$comments_folder = $media_folder.$comment_text."/";
						$comments_files_folder = $comments_folder.$website["texts"]["files, title()"][$Language -> modules_language]."/";

						# Define the media unit text
						$media_unit_title = Define_Title($entry["Media"]);

						if (array_key_exists("Episode", $entry) == True) {
							$media_unit_title = Define_Title($entry["Episode"]["Titles"]);
						}

						# Define and read the comments file
						$comments_file = $comments_folder.$website["texts"]["comments, title()"]["en"].".json";
						$comments = $JSON -> To_PHP($comments_file);

						$verbosity_text = "";

						# Iterate through the comment names list
						foreach ($comments["Entries"] as $comment) {
							# Get the comment dictionary
							$comment = $comments["Dictionary"][$comment];

							# If the language title of the current comment is equal to the language title of the entry
							# Add the comment text to the tab content
							if ($comment["Titles"][$language] == $media_unit_title) {
								$tab_content .= "<br />"."\n".
								"<br />"."\n".
								$website["language_texts"]["comment, title()"].":"."<br />"."\n".
								"<br />"."\n".
								$File -> Contents($comments_files_folder.Sanitize_Title($comment["Entry"], $remove_dot = False).".txt")["string"];
							}

							if (
								$comment["Titles"][$language] != $media_unit_title and
								$website["data"]["year"] == 2022
							) {
								if ($verbosity_text == "") {
									$verbosity_text = $media_title."\n".
									$media_folder."\n".
									$comments_file."\n".
									$website["data"]["year"];
								}

								$verbosity_text .= "\n".$comment["Titles"][$language]."\n".
								$media_unit_title."\n".
								$comment["Entry"]."\n";
							}
						}

						if ($verbosity_text != "") {
							#$Text -> Show_Variable($verbosity_text);
						}
					}

					# Create the tab array and content
					$website["additional_tabs"]["data"][$tab_id] = [
						"id" => $tab_id,
						"name" => $tab_title,
						"text_style" => "text-align: left;",
						"content" => $tab_content,
						"icon" => "eye",
						"only_button" => "watched_things"
					];

					if (isset($website["past_registries_buttons"]) == True) {
						$website["additional_tabs"]["data"][$tab_id]["only_button"] = "past_registries";

						$website["additional_tabs"]["data"][$tab_id]["button"] = $website["past_registries_buttons"][$website["data"]["year"]];
					}
				}
			}

			$title = HTML::Element("span", $title, "", $text_color);

			# Add the media unit link
			if (array_key_exists("Link", $entry) == True) {
				$link_text = $website["language_texts"]["media_unit_link"];

				$title .= " - ".HTML::Element("a", $website["icons"]["YouTube"], 'href="'.$entry["Link"].'" target="_blank" alt="'.$link_text.'" title="'.$link_text.'"', "text_red");
			}

			# Add the media unit comment link
			if (
				array_key_exists("Comment", $entry) == True and
				array_key_exists("Link", $entry["Comment"]) == True
			) {
				$link_text = $website["language_texts"]["comment_link"];

				if (array_key_exists("Link", $entry) == False) {
					$title .= " - ";
				}

				$title .= " ".HTML::Element("a", $website["icons"]["comment"], 'href="'.$entry["Comment"]["Link"].'" target="_blank" alt="'.$link_text.'" title="'.$link_text.'"', $text_color);
			}

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
		"name" => $website["language_texts"]["watched_things_in"]." ".$website["data"]["year"],
		"add" => " ".HTML::Element("span", $website["tab_content"]["watched_things"]["number"], "", $website["style"]["text"]["theme"]["dark"]),
		"text_style" => "text-align: left;",
		"content" => $website["tab_content"]["watched_things"]["string"],
		"icon" => "eye"
	];
}

?>