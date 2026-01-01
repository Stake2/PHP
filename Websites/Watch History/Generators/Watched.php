<?php 

# Watched

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["Full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["Full"][$language];
}

# Generate the tab content of the "Watched media" tab
$website["tab_content"]["watched_media"] = [
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

if (isset($website["Watch History"]) == False) {
	$website["Watch History"] = [
		"Years list" => Date::Create_Years_List($mode = "array", $start = 2018, $plus = -1)
	];
}

# Define the data network folder for easier typing
$network_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"];

if (isset($watch_history) == False) {
	# Define the "Watch History" array
	$watch_history = [
		"Files" => [
			"By media type" => [
				"root" => $network_folder["Watch History"][$website["Data"]["Year"]]["By media type"]["root"]
			]
		],
		"Types" => $JSON -> To_PHP($network_folder["Data"]["Types"]),
		"Entries" => $JSON -> To_PHP($network_folder["Watch History"][$website["Data"]["Year"]]["Entries"]),
		"Texts" => $JSON -> To_PHP($folders["Apps"]["Module files"]["Watch History"]["Texts"]),
		"Language texts" => [],
		"Media information" => [
			"Information" => $JSON -> To_PHP($network_folder["Media information"]["Information"])
		]
	];

	$watch_history["Language texts"] = $Language -> Item($watch_history["Texts"]);

	$types_dictionary = $watch_history["Types"]["Plural"];

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

if (function_exists("Generate_Media_Type_Headers") == False) {
	function Generate_Media_Type_Headers($header_text = "") {
		global $website;
		global $Language;
		global $JSON;
		global $watch_history;
		global $types_dictionary;

		$language = "pt";

		if (isset($website["language"]) == True) {
			$language = $website["language"];
		}

		if ($language == "general") {
			$language = "en";
		}

		if ($header_text == "") {
			$header_text = $website["Language texts"]["watched_media_in"]." ".$website["Data"]["Year"];
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		$text_color = $website["Style"]["text"]["theme"]["dark"];

		# Define a shortcut for the total number of entries in the year
		$total_number = $watch_history["Entries"]["Numbers"]["Total"];

		# Iterate through the English media types list
		$i = 0;
		foreach ($types_dictionary["en"] as $type) {
			$language_type = $types_dictionary[$language][$i];

			$number = $watch_history["Entries"]["Numbers"]["By media type"][$type];

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

				$watch_history["Files"]["By media type"][$type] = $JSON -> To_PHP($watch_history["Files"]["By media type"]["root"].$type."/Entries.json");

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

# Update the "By media type" folder
$watch_history["Files"]["By media type"] = [
	"root" => $network_folder["Watch History"][$website["Data"]["Year"]]["By media type"]["root"]
];

# Define the Entries file for easier typing
$entries_file = $network_folder["Watch History"][$website["Data"]["Year"]]["Entries"];

if (file_exists($entries_file) == True) {
	$watch_history["Entries"] = $JSON -> To_PHP($entries_file);

	# Add to the year entries number
	$current_year = $website["Data"]["Year"];

	if (isset($website["Data"]["Numbers"]["By year"][$current_year]) == False) {
		$website["Data"]["Numbers"]["By year"][$current_year] = $watch_history["Entries"]["Numbers"]["Total"];
	}

	# Sort the year keys
	ksort($website["Data"]["Numbers"]["By year"]);

	$website_title = "Watch History";

	$tab = "past_registry_".$website["Data"]["Year"];

	# If the local year is the current year
	# Then, the tab that needs to be used is the "watched_media" tab
	if ($website["Data"]["Year"] == $website["current_year"]) {
		$tab = "watched_media";
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
		$website["tab_content"]["watched_media"]["string"] .= "<center>"."\n".
		'<br class="mobile_inline_block" />'."\n".
		$Text -> Format($website_dictionary["Button template"], $link)."\n".
		"<p></p>"."\n".
		'<br class="mobile_inline_block" />'."\n".

		# Add the website image to the top of the tab
		$website_dictionary["image"]["elements"]["theme"]["dark"]."\n".
		"</center>"."\n".
		"<br />"."\n";
	}

	$media_type_headers = Generate_Media_Type_Headers();

	# Update the number of watched media
	$website["tab_content"]["watched_media"]["number"] = $watch_history["Entries"]["Numbers"]["Total"];

	if (
		$website["Data"]["title"] != $website_title or
		$website["tab_content"]["watched_media"]["number"] == 0
	) {
		# Create the number of media variable with the tab title
		$number_of_media = $website["Language texts"]["watched_media_in"]." ".$website["Data"]["Year"].":";

		# Add the icon of the tab
		$number_of_media .= " ".$website["Icons"]["eye"];

		# Add the number of media
		$number_of_media .= " ".HTML::Element("span", $website["tab_content"]["watched_media"]["number"], "", $website["Style"]["text"]["theme"]["dark"])."<br /><br />";

		# Transform everything into bold style
		$number_of_media = HTML::Element("b", $number_of_media);

		# Add the number of media text to the tab string content
		$website["tab_content"]["watched_media"]["string"] .= $number_of_media;
	}

	$website["tab_content"]["watched_media"]["string"] .= "<!-- Media type headers -->"."\n"."\t\t".
	$media_type_headers["links"].
	"\n"."\t\t"."<br />"."\n\n";

	$text_color = $website["Style"]["text"]["theme"]["dark"];

	$types_dictionary = $watch_history["Types"]["Plural"];

	# Iterate through the English media types list
	$i = 0;
	foreach ($types_dictionary["en"] as $type) {
		$language_type = $types_dictionary[$language][$i];

		$modules_language = $types_dictionary[$Language -> modules_language][$i];

		$number = $watch_history["Entries"]["Numbers"]["By media type"][$type];

		$website["Data"]["Numbers"]["By type"][$type] += $number;

		if ($number != 0) {
			$website["tab_content"]["watched_media"]["string"] .= $media_type_headers["headers"][$type];

			$entries = $watch_history["Files"]["By media type"][$type]["Entries"];

			# Iterate through the media type Entries list
			foreach ($entries as $entry) {
				$entry = $watch_history["Entries"]["Dictionary"][$entry];

				# Add the Media title
				$title = Define_Title($entry["Media titles"]);

				# Split original movie name (to get year and producer)
				if ($type == "Movies") {
					$title .= " (".explode(" (", $entry["Media titles"]["Original"])[1];
				}

				# Define the default media item title as an empty string
				$media_item_title = "";

				# Add the media item title if it exists
				if (isset($entry["Media item titles"])) {
					$media_item_title = Define_Title($entry["Media item titles"]);

					if (str_contains($media_item_title, $title)) {
						$media_item_title = str_replace($title, "", $media_item_title);
					}

					if ($type == "Videos") {
						$title .= ": ";
					}

					if (
						strlen($media_item_title) >= 2 and
						$media_item_title[0].$media_item_title[1] != ": "
					) {
						$title .= " ";
					}

					if ($type != "Videos") {
						$title .= $media_item_title;
					}
				}

				# Add the media episode title
				if (isset($entry["Episode"]) == True) {
					$episode = Define_Title($entry["Episode"]["Titles"]);

					if (
						$episode[0].$episode[1] != ": " and
						preg_match_all("/S[0-9]{2}/i", $media_item_title) == 0
					) {
						$title .= " ";
					}

					$title .= $episode;
				}

				$entry_title = $title;

				# ---------- #

				# Define the default date format
				$datetime_format = "Y-m-d\TH:i:s\Z";

				# Initialize the finished watching time output
				$finished_watching_time = "";

				# Define the time key
				$time_key = "Finished watching";

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
						$finished_watching_time = $parsed_date["Year"];
					}

					# If the raw time is a string and not empty
					elseif ($raw_time !== "") {
						# Make a "Date" dictionary from the date using the datetime format
						$parsed_time = Date::Now($raw_time, $datetime_format);

						# Get the time in the user format
						$finished_watching_time = $parsed_time["Formats"]["HH:MM DD/MM/YYYY"];
					}
				}

				# ---------- #

				# Create the text with the watched media number as the initial data
				$text = $entry["Watched media number"]." -";

				# ---------- #

				# Add the media states
				if (isset($entry["States"]) == True) {
					if (isset($entry["States"]["Re-watched"]) == True) {
						$times_text = $watch_history["Language texts"]["number_of_watched_times"].": ".($entry["States"]["Re-watched"]["Times"] + 1)."x";

						$text .= " ".HTML::Element("span", ($entry["States"]["Re-watched"]["Times"] + 1)."x ".$website["Icons"]["eye"], 'alt="'.$times_text.'" title="'.$times_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
					}

					if (isset($entry["States"]["First entry in year"]) == True) {
						$first_text = $watch_history["Language texts"]["first_watched_media_in_the_year"];

						$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
					}

					if (isset($entry["States"]["First media type entry in year"]) == True) {
						$first_text = $watch_history["Language texts"]["first_watched_media_by_media_type_in_the_year"];

						$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["film"]." ".$website["Icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
					}

					if (
						isset($entry["States"]["Re-watched"]) == True or
						isset($entry["States"]["First entry in year"]) == True or
						isset($entry["States"]["First media type entry in year"]) == True
					) {
						$text .= " - ";
					}
				}

				if (
					isset($entry["Comment"]) == True and
					isset($entry["Comment"]["Link"]) == False
				) {
					$title .= " ".HTML::Element("span", $website["Icons"]["comment"], "", $website["Style"]["text_highlight"]);
				}

				# If the "State" dictionary is present
				# And the "Commented" state is present
				# And it is True
				# And the Watch History "Entry tabs" state is activated
				if (
					isset($entry["States"]) == True and
					isset($entry["States"]["Commented"]) and
					$entry["States"]["Commented"] == True and
					$website["States"]["Watch History"]["Entry tabs"] == True
				) {
					# If the past history entry tabs are activated
					# Or they are deactivated and the year inside the data array is the same as the current year
					if (
						$website["States"]["Watch History"]["Past registry entry tabs"] == True or
						$website["States"]["Watch History"]["Past registry entry tabs"] == False and
						$website["Data"]["Year"] == $website["Date"]["Year"]
					) {
						# Add the description tab link and create the tab
						$link_text = $website["Language texts"]["entry_description"];

						$tab_id = "watched_media_".$website["Data"]["Year"]."_".$entry["Watched media number"];

						$style = 'style="text-decoration: underline; cursor: pointer;"';

						$title = HTML::Element("a", $title, 'onclick="'."Open_Tab('".$tab_id."')".'" target="_blank" alt="'.$link_text.'" title="'.$link_text.'" '.$style, $text_color);

						# Create the tab title
						$tab_title = $entry["Watched media number"]." - ".$entry_title." (".$finished_watching_time.")";

						# Get the entry description file
						$folder = $folders["Mega"]["Notepad"]["Years"][$website["Data"]["Year"]][$language]["watched_media"]["root"].$language_type."/";

						# Replace the characters that are not allowed in file names
						$local_entry = str_replace(":", ";", $entry["Entry"]);
						$local_entry = str_replace("/", "-", $local_entry);

						# Replace the original language type with the user language type
						$local_entry = str_replace($type, $language_type, $local_entry);

						$file = $folder.$local_entry.".txt";

						# Get the entry description text from the file
						$tab_content = $File -> Contents($file)["string"];

						# Add the comment text to the entry description text
						if (isset($entry["Comment"]) == True) {
							# Get the media folder
							$media_info_folder = $network_folder["Media information"]["root"].$modules_language."/";

							$media_title = Sanitize_Title(Define_Title($entry["Media titles"]));

							if ($type == $watch_history["Texts"]["movies, title()"]["en"]) {
								$media_title = Sanitize_Title($entry["Media titles"]["Original"]);
							}

							# Define the media folder
							$media_folder = $media_info_folder.Sanitize_Title($media_title)."/";

							# If the folder does not exist
							if (file_exists($media_folder) == False) {
								# Iterate through the list of keys inside the "Media" key
								foreach (array_keys($entry["Media titles"]) as $key) {
									# Define the local media folder
									$folder = $media_info_folder.Sanitize_Title($entry["Media titles"][$key])."/";

									# If it exists, update the root media folder
									if (file_exists($folder) == True) {
										$media_folder = $folder;
									}
								}
							}

							# Add the media item list folder to the media folder
							if ($type != $watch_history["Texts"]["videos, title()"]["en"]) {
								$text_key = "seasons";
							}

							if ($type == $watch_history["Texts"]["videos, title()"]["en"]) {
								$text_key = "series";
							}

							$folder_name = $watch_history["Texts"][$text_key.", title()"][$Language -> modules_language];

							# Add the media item list folder if it exists
							if (file_exists($media_folder.$folder_name."/") == True) {
								$media_folder .= $folder_name."/";
							}

							if (isset($entry["Media item titles"])) {
								$media_item_title = $entry["Media item titles"]["Original"];

								if (isset($entry["Media item titles"]["en"]) == True) {
									$media_item_title = $entry["Media item titles"]["en"];
								}

								$media_folder .= Sanitize_Title($media_item_title)."/";
							}

							# Add the media folder if it exists
							if (file_exists($media_folder.$media_title."/") == True) {
								$media_folder .= $media_title."/";
							}

							# Get the comments folder
							$comment_text = $website["Texts"]["comments, title()"][$Language -> modules_language];
							$comments_folder = $media_folder.$comment_text."/";
							$comments_files_folder = $comments_folder.$website["Texts"]["files, title()"][$Language -> modules_language]."/";

							# Define the media unit text using the "Media titles" key
							$media_unit_title = Define_Title($entry["Media titles"]);

							# Define the media unit text using the "Episode" key
							if (isset($entry["Episode"]) == True) {
								$media_unit_title = Define_Title($entry["Episode"]["Titles"]);
							}

							# Define the media unit text using the "Media item titles" key
							if (
								isset($entry["Media item titles"]) == True and
								isset($entry["Episode"]) == False
							) {
								$media_unit_title = Define_Title($entry["Media item titles"]);
							}

							# Define the "Comments.json" file
							$comments_file = $comments_folder.$website["Texts"]["comments, title()"]["en"].".json";

							# Read the "Comments" dictionary
							$comments = $JSON -> To_PHP($comments_file);

							$verbosity_text = "";

							# Iterate through the comment names list
							foreach ($comments["Entries"] as $comment) {
								# Get the comment dictionary
								$comment = $comments["Dictionary"][$comment];

								# If the language title of the current comment is equal to the language title of the entry
								# Add the comment text to the tab content
								if ($comment["Titles"][$language] == $media_unit_title) {
									# Get the comment file
									$comment_file = $comments_files_folder.Sanitize_Title($comment["Entry"], $remove_dot = False).".txt";

									# Get the comment text
									$comment_text = $File -> Contents($comment_file)["string"];

									# Add the comment text to the tab content
									$tab_content .= "<br />"."\n".
									"<br />"."\n".
									$website["Language texts"]["comment, title()"].":"."<br />"."\n".
									"<br />"."\n".
									$comment_text;
								}

								if (
									$comment["Titles"][$language] != $media_unit_title and
									$website["Data"]["Year"] == 2022
								) {
									if ($verbosity_text == "") {
										$verbosity_text = $media_title."\n".
										$media_folder."\n".
										$comments_file."\n".
										$website["Data"]["Year"];
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
							"only_button" => "watched_media"
						];

						if (isset($website["past_registries_buttons"]) == True) {
							$website["additional_tabs"]["data"][$tab_id]["only_button"] = "past_registries";

							$website["additional_tabs"]["data"][$tab_id]["button"] = $website["past_registries_buttons"][$website["Data"]["Year"]];
						}
					}
				}

				$title = HTML::Element("span", $title, "", $text_color." ".$website["Style"]["text_hover"]);

				# Add the episode link if it exists
				if (isset($entry["Episode link"]) == True) {
					# Define the link text as "Episode link"
					$link_text = $website["Language texts"]["episode_link"];

					# If the link contains the "youtube" text
					if (str_contains($entry["Episode link"]["Link"], "youtube")) {
						# Define the link text as "Link of the video on YouTube"
						$link_text = $website["Language texts"]["link_of_the_video_on_youtube"];
					}

					# Add the entry link with the link text to the entry title
					$title .= " - ".HTML::Element("a", $website["Icons"]["YouTube"], 'href="'.$entry["Episode link"]["Link"].'" target="_blank" alt="'.$link_text.'" title="'.$link_text.'"', "text_red");
				}

				# Add the comment link if it exists
				if (
					isset($entry["Comment"]) == True and
					isset($entry["Comment"]["Link"]) == True
				) {
					$link_text = $website["Language texts"]["comment_link"];

					# If the "Episode link" key is not present inside the entry dictionary
					if (isset($entry["Episode link"]) == False) {
						$title .= " - ";
					}

					$title .= " ".HTML::Element("a", $website["Icons"]["comment"], 'href="'.$entry["Comment"]["Link"]["Link"].'" target="_blank" alt="'.$link_text.'" title="'.$link_text.'"', $text_color);
				}

				# Add the finished watching time and the title to the text
				$text .= " ".$title." (".$finished_watching_time.")";

				$text = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["Style"]["text_hover"]);

				$website["tab_content"]["watched_media"]["string"] .= $text."<br />"."\n";
			}

			if ($type != end($types_dictionary[$language])) {
				$website["tab_content"]["watched_media"]["string"] .= "\t\t"."<br />"."\n\n";
			}
		}

		$i++;
	}

	$website["tab_content"]["watched_media"]["string"] .= "<br /><br />";

	# Add the tab to the tab templates
	if (array_key_exists("watched_media", $website["tabs"]["templates"]) == False) {
		$website["tabs"]["templates"]["watched_media"] = [
			"name" => $website["Language texts"]["watched_media_in"]." ".$website["Data"]["Year"],
			"add" => " ".HTML::Element("span", $website["tab_content"]["watched_media"]["number"], "", $website["Style"]["text"]["theme"]["dark"]),
			"text_style" => "text-align: left;",
			"content" => $website["tab_content"]["watched_media"]["string"],
			"icon" => "eye"
		];
	}
}

else {
	# Add the "Watched media" tab to be removed if it does not contain watched media
	array_push($website["tabs"]["To remove"], "watched_media");
}

?>