<?php 

# Tasks

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["Full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["Full"][$language];
}

# Generate tasks tab content
$website["tab_content"]["completed_tasks"] = [
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

if (isset($website["Task History"]) == False) {
	$website["Task History"] = [
		"Years list" => Date::Create_Years_List($mode = "array", $start = 2018, $plus = -1)
	];
}

# Define the data network folder for easier typing
$network_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"];

if (isset($tasks) == False) {
	# Define the "Tasks" array
	$tasks = [
		"Files" => [
			"By task type" => [
				"root" => $network_folder["Task History"][$website["Data"]["Year"]]["By task type"]["root"]
			]
		],
		"Types" => $JSON -> To_PHP($network_folder["Task types"]["Task types"]),
		"Entries" => "",
		"Texts" => $JSON -> To_PHP($folders["Apps"]["Module files"]["Tasks"]["Texts"]),
		"Language texts" => []
	];

	$tasks["Language texts"] = $Language -> Item($tasks["Texts"]);

	$types_dictionary = $tasks["Types"]["Lists"]["Plural"];

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

# Update the "By task type" folder
$tasks["Files"]["By task type"] = [
	"root" => $network_folder["Task History"][$website["Data"]["Year"]]["By task type"]["root"]
];

# Define the Entries file
$entries_file = $network_folder["Task History"][$website["Data"]["Year"]]["Tasks"];

if (file_exists($entries_file) == True) {
	$tasks["Entries"] = $JSON -> To_PHP($entries_file);
}

if ($website["Data"]["title"] != "Tasks") {
	$tasks["Types dictionary"] = $types_dictionary;
}

if (function_exists("Generate_Task_Type_Headers") == False) {
	function Generate_Task_Type_Headers($header_text = "") {
		global $website;
		global $Language;
		global $JSON;
		global $tasks;

		$language = "pt";

		if (isset($website["language"]) == True) {
			$language = $website["language"];
		}

		if ($language == "general") {
			$language = "en";
		}

		if ($header_text == "") {
			$header_text = $tasks["Texts"]["tasks, title()"][$language]." [".$website["Data"]["Year"]."]";
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		$text_color = $website["Style"]["text"]["theme"]["dark"];

		# Define the default local types dictionary
		$types_dictionary = $tasks["Types"]["Lists"]["Plural"];

		# If the root website title is not "Tasks"
		if ($website["Data"]["title"] != "Tasks") {
			# Define the local types dictionary as the one inside the "Tasks" dictionary
			$types_dictionary = $tasks["Types dictionary"];
		}

		$tasks["language_types"] = $types_dictionary[$language];

		foreach (array_keys($tasks["Entries"]["Numbers"]["By task type"]) as $task_type) {
			if (in_array($task_type, $types_dictionary["en"]) == False) {
				array_push($types_dictionary["en"], $task_type);

				$text = $task_type;

				$text_key = str_replace(" ", "_", strtolower($task_type));

				if (str_contains($task_type, " ") == False) {
					$text_key .= ", title()";
				}

				if (in_array($task_type, ["Python", "PHP", "AutoHotKey", "HTML"]) == False) {
					$text = $website["Texts"][$text_key][$language];
				}

				if (in_array($text, $tasks["language_types"]) == False) {
					array_push($tasks["language_types"], $text);
				}

				if (in_array($text, $types_dictionary[$language]) == False) {
					array_push($types_dictionary[$language], $text);
				}
			}
		}

		if ($website["Data"]["title"] != "Tasks") {
			$tasks["Types dictionary"] = $types_dictionary;
		}

		# Define a shortcut for the total number of entries in the year
		$total_number = $tasks["Entries"]["Numbers"]["Total"];

		# Iterate through the English plural task types list
		$i = 0;
		foreach ($types_dictionary["en"] as $type) {
			$language_type = $tasks["language_types"][$i];

			if (array_key_exists($type, $tasks["Entries"]["Numbers"]["By task type"])) {
				$number = $tasks["Entries"]["Numbers"]["By task type"][$type];

				# If the number is not zero (0)
				# Or the total number of tasks is zero
				if (
					$number != 0 or
					$total_number == 0
				) {
					$span = HTML::Element("span", $number, "", $text_color);

					$b = HTML::Element("b", $language_type.": ".$span);

					$href = $header_text.": ".$language_type;

					# Anchor element to go to task type list
					if ($number != 0) {
						$a = HTML::Element("a", $b, 'href="#'.$href.'"');
					}

					else {
						$a = HTML::Element("a", $b);
					}

					$array["links"] .= $a."<br />"."\n\t\t";

					$tasks["Files"]["By task type"][$type] = $JSON -> To_PHP($tasks["Files"]["By task type"]["root"].$type."/Tasks.json");

					$span = HTML::Element("span", $number, "", $text_color);

					$b = HTML::Element("b", $language_type.": ".$span);

					# Plural task type header with anchor href to go to task type part
					$a = HTML::Element("a", $b, 'name="'.$href.'"')."<br />";

					$array["headers"][$type] = "\t\t".'<!-- "'.$type.'" task type header -->'."\n".
					"\t\t".$a."\n";
				}
			}

			$i++;
		}

		return $array;
	}
}

# Define the local types dictionary as the root types dictionary inside the "Tasks" dictionary
$types_dictionary = $tasks["Types dictionary"];

# Define the Entries file
$entries_file = $network_folder["Task History"][$website["Data"]["Year"]]["Tasks"];

if (file_exists($entries_file) == True) {
	$tasks["Entries"] = $JSON -> To_PHP($entries_file);

	# Add to the year entries number
	$current_year = $website["Data"]["Year"];

	if (isset($website["Data"]["Numbers"]["By year"][$current_year]) == False) {
		$website["Data"]["Numbers"]["By year"][$current_year] = $tasks["Entries"]["Numbers"]["Total"];
	}

	# Sort the year keys
	ksort($website["Data"]["Numbers"]["By year"]);

	$website_title = "Tasks";

	$tab = "past_registry_".$website["Data"]["Year"];

	# If the local year is the current year
	# Then, the tab that needs to be used is the "Completed tasks" tab
	if ($website["Data"]["Year"] == $website["current_year"]) {
		$tab = "completed_tasks";
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
		$website["tab_content"]["completed_tasks"]["string"] .= "<center>"."\n".
		$Text -> Format($website_dictionary["Button template"], $link)."\n".
		"<p></p>".

		# Add the website image to the top of the tab
		$website_dictionary["image"]["elements"]["theme"]["dark"]."\n".
		"</center>"."\n".
		"<br />"."\n";
	}

	$task_type_headers = Generate_Task_Type_Headers($header_text = "", $update_types_dictionary = False);

	# Define the local types dictionary as the root types dictionary inside the "Tasks" dictionary
	$types_dictionary = $tasks["Types dictionary"];

	# Update the watched things number
	$website["tab_content"]["completed_tasks"]["number"] = $tasks["Entries"]["Numbers"]["Total"];

	if (
		$website["Data"]["title"] != $website_title or
		$website["tab_content"]["completed_tasks"]["number"] == 0
	) {
		# Create the number of tasks variable with the tab title
		$number_of_tasks = $tasks["Language texts"]["completed_tasks"].":";

		# Add the icon of the tab
		$number_of_tasks .= " ".$website["Icons"]["list_check"];

		# Add the number of tasks
		$number_of_tasks .= " ".HTML::Element("span", $website["tab_content"]["completed_tasks"]["number"], "", $website["Style"]["text"]["theme"]["dark"])."<br /><br />";

		# Transform everything into bold style
		$number_of_tasks = HTML::Element("b", $number_of_tasks);

		# Add the number of tasks text to the tab string content
		$website["tab_content"]["completed_tasks"]["string"] .= $number_of_tasks;
	}

	# Add the task type headers
	$website["tab_content"]["completed_tasks"]["string"] .= "<!-- Task type headers -->"."\n"."\t\t".
	$task_type_headers["links"].
	"\n"."\t\t"."<br />"."\n\n";

	$text_color = $website["Style"]["text"]["theme"]["dark"];

	# Iterate through the English task types list
	$i = 0;
	foreach ($types_dictionary["en"] as $type) {
		# Get the language type
		$language_type = $tasks["language_types"][$i];

		if (array_key_exists($type, $tasks["Entries"]["Numbers"]["By task type"]) == True) {
			$number = $tasks["Entries"]["Numbers"]["By task type"][$type];

			if (isset($website["Data"]["Numbers"]["By type"][$type]) == False) {
				$website["Data"]["Numbers"]["By type"][$type] = 0;
			}

			$website["Data"]["Numbers"]["By type"][$type] += $number;

			if ($number != 0) {
				$website["tab_content"]["completed_tasks"]["string"] .= $task_type_headers["headers"][$type];

				# Iterate through the task type Entries list
				foreach ($tasks["Files"]["By task type"][$type]["Entries"] as $entry) {
					$entry = $tasks["Entries"]["Dictionary"][$entry];

					# ---------- #

					# Define the default date format
					$datetime_format = "Y-m-d\TH:i:s\Z";

					# Initialize the time output
					$time = "";

					# Define the list of time keys
					$time_keys = [
						"Date",
						"Times"
					];

					# Iterate through the list of time keys
					foreach ($time_keys as $time_key) {
						# If the time key is present inside the entry dictionary
						if (isset($entry[$time_key])) {
							# Define the raw time as the value in the time key (Date)
							$raw_time = $entry[$time_key];

							if ($time_key == "Times") {
								# Define the raw time as the value in the "Completed task (UTC)" key
								$raw_time = $raw_time["Completed task (UTC)"];
							}
							#Text::Show_Variable($raw_time);
							# If the raw time has four characters
							if (strlen($raw_time) == 4) {
								# Define the datetime format as the year format
								$datetime_format = "Y";

								# Make a "Date" dictionary from the date using the datetime format
								$parsed_date = Date::Now($raw_time, $datetime_format);

								# Get the year from the parsed date
								$time = $parsed_date["Year"];
							}

							# If the raw time is a string and not empty
							elseif ($raw_time !== "") {
								# Make a "Date" dictionary from the date using the datetime format
								$parsed_time = Date::Now($raw_time, $datetime_format);

								# Get the time in the user format
								$time = $parsed_time["Formats"]["HH:MM DD/MM/YYYY"];
							}
						}
					}

					# ---------- #

					# If the "Number" key is inside the entry dictionary
					if (isset($entry["Number"])) {
						$text = $entry["Number"]." -";
					}

					# Else if the "Total task number" key is in the entry dictionary
					elseif (isset($entry["Total task number"])) {
						$text = $entry["Total task number"]." -";
					}

					# Add the States
					if (array_key_exists("States", $entry) == True) {
						if (array_key_exists("First task in year", $entry["States"]) == True) {
							$first_text = $website["Language texts"]["first_task_in_the_year"];

							$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
						}

						if (array_key_exists("First task type task in year", $entry["States"]) == True) {
							$first_text = $website["Language texts"]["first_task_by_task_type_in_the_year"];

							$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["list_check"]." ".$website["Icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
						}

						if (
							array_key_exists("First task in year", $entry["States"]) == True or
							array_key_exists("First task type task in year", $entry["States"]) == True
						) {
							$text .= " - ";
						}
					}

					$title = HTML::Element("span", $entry["Titles"][$language], "", $text_color);

					if (
						$website["States"]["Tasks"]["Entry tabs"] == True and
						(int)$website["Data"]["Year"] >= 2023
					) {
						# Add the task description tab link and create the tab
						$link_text = $website["Language texts"]["task_description"];

						$tab_id = "task_description_".$entry["Number"]."_".$website["Data"]["Year"];

						$style = 'style="text-decoration: underline; cursor: pointer;"';

						$title = HTML::Element("a", $title, 'onclick="'."Open_Tab('".$tab_id."')".'" target="_blank" alt="'.$link_text.'" title="'.$link_text.'" '.$style, $text_color);

						# Create the tab title
						$tab_title = $entry["Number"]." - ".$entry["Titles"][$language]." (".$time.")";

						# Get the task description file
						$folder = $folders["Mega"]["Notepad"]["Years"][$website["Data"]["Year"]][$language]["completed_tasks"]["root"].$language_type."/";

						$local_entry = str_replace(":", ";", $entry["Entry"]);
						$local_entry = str_replace("/", "-", $local_entry);

						$file = $folder.$local_entry.".txt";

						# Create the tab array and content
						$website["additional_tabs"]["data"][$tab_id] = [
							"id" => $tab_id,
							"name" => $tab_title,
							"text_style" => "text-align: left;",
							"file" => $file,
							"icon" => "list_check",
							"only_button" => "tasks"
						];

						# If the year in the "Data" dictionary is not the current one
						if ($website["Data"]["Year"] != $website["current_year"]) {
							if (isset($website["past_registries_buttons"]) == True) {
								# Change the "only button" to the "past registry" button of the current year
								$website["additional_tabs"]["data"][$tab_id]["only_button"] = "past_registry_".$website["Data"]["Year"];
								$website["additional_tabs"]["data"][$tab_id]["Buttons list"] = $website["past_registries_buttons"];
							}

							else {
								$website["additional_tabs"]["data"][$tab_id]["only_button"] = "completed_tasks";
							}
						}
					}

					$text .= " ".$title." (".$time.")";

					$text = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["Style"]["text_hover"]);

					$website["tab_content"]["completed_tasks"]["string"] .= $text."<br />"."\n";
				}

				if ($type != end($tasks["language_types"])) {
					$website["tab_content"]["completed_tasks"]["string"] .= "\t\t"."<br />"."\n\n";
				}
			}
		}

		$i++;
	}

	$website["tab_content"]["completed_tasks"]["string"] .= "<br /><br />";

	# Add the tab to the tab templates
	if (array_key_exists("completed_tasks", $website["tabs"]["templates"]) == False) {
		$website["tabs"]["templates"]["completed_tasks"] = [
			"name" => $website["Language texts"]["completed_tasks_in"]." ".$website["Data"]["Year"],
			"add" => " ".HTML::Element("span", $website["tab_content"]["completed_tasks"]["number"], "", $website["Style"]["text"]["theme"]["dark"]),
			"text_style" => "text-align: left;",
			"content" => $website["tab_content"]["completed_tasks"]["string"],
			"icon" => "list_check"
		];
	}
}

else {
	# Define the "Completed tasks" tab to be removed if it does not contain completed tasks
	array_push($website["tabs"]["To remove"], "completed_tasks");
}

?>