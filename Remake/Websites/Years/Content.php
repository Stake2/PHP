<?php 

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
$website["data"]["folders"]["year"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["years"][$website["data"]["title"]];

# Define website files
$website["data"]["files"] = [
	"summary" => $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["summary, title()"].".txt",
	"this_year_i" => $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["this_year_i"].".txt",
];

# Define Watch History array
$watch_history = [
	"folders" => [
		"per_media_type" => [
			"files" => [
				"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$website["data"]["title"]]["per_media_type"]["files"]["root"],
			],
		],
	],
	"files" => [
		"texts" => $folders["apps"]["app_text_files"]["watch_history"]["texts"],
	],
];

$watch_history["texts"] = [
	"texts" => File::JSON($watch_history["files"]["texts"]),
];

$names = [
	"Episodes",
	"Number",
	"Times",
];

$website["tab_content"] = [
	"watched_things" => [
		"string" => "",
		"number" => 0,
	],
];

# Define files and texts
$i = 0;
foreach ($watch_history["texts"]["texts"]["plural_media_types, type: list, en - pt"] as $mixed_media_type) {
	$plural_media_type = $watch_history["texts"]["texts"]["plural_media_types, type: list"][$language][$i];

	$watch_history["folders"]["per_media_type"]["files"][$plural_media_type] = $watch_history["folders"]["per_media_type"]["files"]["root"].$mixed_media_type."/";

	# Define file names
	$file_names = $names;

	if ($mixed_media_type == "Videos - Vídeos") {
		array_push($file_names, "YouTube IDs");
	}

	$watch_history["files"][$plural_media_type] = [];
	$watch_history["texts"][$plural_media_type] = [];

	# Define media type files and texts
	foreach ($file_names as $item) {
		$key = str_replace(" ", "_", strtolower($item));

		# Define item file
		$watch_history["files"][$plural_media_type][$key] = $watch_history["folders"]["per_media_type"]["files"][$plural_media_type].$item.".txt";

		# Get contents from item file
		$watch_history["texts"][$plural_media_type][$key] = File::Contents($watch_history["files"][$plural_media_type][$key]);
	}

	# Add episode number to watched things number
	$website["tab_content"]["watched_things"]["number"] += $watch_history["texts"][$plural_media_type][$key]["length"];

	$i++;
}

$website["tab_content"]["watched_things"]["string"] .= "<!-- Media type headers -->"."\n"."\t\t";

# Add plural media type header to watched things text
$i = 0;
foreach ($watch_history["texts"]["texts"]["plural_media_types, type: list, en - pt"] as $mixed_media_type) {
	$plural_media_type = $watch_history["texts"]["texts"]["plural_media_types, type: list"][$language][$i];

	$span = HTML::Element("span", $watch_history["texts"][$plural_media_type]["episodes"]["length"], "", $website["style"]["text_highlight"]);

	$b = HTML::Element("b", $plural_media_type.": ".$span);

	# Anchor element to go to media type list
	$a = HTML::Element("a", $b, 'href="#'.$website["language_texts"]["watched_things"].": ".$plural_media_type.'"');

	$website["tab_content"]["watched_things"]["string"] .= $a."<br />"."\n\t\t";

	$i++;
}

$website["tab_content"]["watched_things"]["string"] .= "\n"."\t\t"."<br />"."\n\n";

# Define episode texts to replace
$replace = [];

if ($language == "en") {
	$replace["list"] = [
		"Dublado",
		"Deixe Sua Marca",
		"Parte",
		"FINAL",
		"Capítulo",
	];

	$replace["with"] = [
		"Portuguese dub",
		"Make Your Mark",
		"Part",
		"ENDING",
		"Chapter",
	];
}

if ($language == "pt") {
	$replace["list"] = [
		"The Final Season",
		"Season",
		"Part ",
		"1st",
		"First",
		"2nd",
		"Second",
		"3rd",
		"Third",
		"Fourth",
		"S0",
		"S1",
		"Friendship Is Magic",
		"Make Your Mark",
		"Star vs. the Forces of Evil",
		"Squid Game",
		"Chapter",
	];

	$replace["with"] = [
		"A Temporada Final",
		"Temporada",
		"Parte ",
		"Primeira",
		"Primeira",
		"Segunda",
		"Segunda",
		"Terceira",
		"Terceira",
		"Quarta",
		"T0",
		"T1",
		"A Amizade É Mágica",
		"Deixe Sua Marca",
		"Star vs. As Forças do Mal",
		"Round 6 (Squid Game)",
		"Capítulo",
	];
}

# Add plural media type header and episodes to watched things text
$i = 0;
foreach ($watch_history["texts"]["texts"]["plural_media_types, type: list, en - pt"] as $mixed_media_type) {
	$plural_media_type = $watch_history["texts"]["texts"]["plural_media_types, type: list"][$language][$i];

	$span = HTML::Element("span", $watch_history["texts"][$plural_media_type]["episodes"]["length"], "", $website["style"]["text_highlight"]);

	$b = HTML::Element("b", $plural_media_type.": ".$span);

	# Plural media type header with anchor href to go to media type episodes part
	$a = HTML::Element("a", $b, 'name="'.$website["language_texts"]["watched_things"].": ".$plural_media_type.'"')."<br />";

	$website["tab_content"]["watched_things"]["string"] .= "\t\t".'<!-- "'.$plural_media_type.'" media type header -->'."\n".
	"\t\t".$a."\n";

	# Add episodes to watched things text
	$e = 0;
	foreach ($watch_history["texts"][$plural_media_type]["episodes"]["lines"] as $episode) {
		$time = $watch_history["texts"][$plural_media_type]["times"]["lines"][$e];

		if ($mixed_media_type == "Videos - Vídeos") {
			$youtube_id = $watch_history["texts"][$plural_media_type]["youtube_ids"]["lines"][$e];
		}

		# Format watched time in local date time format ("d/m/Y" for Portuguese and "m/d/Y" for English)
		if ($time != "Unknown Watched Time - Horário Assistido Desconhecido") {
			$format = "date_time_format";

			if (strstr($time, ":") == False) {
				$format = "date_format";
			}

			$time = Date::Now($time, $website["texts"][$format]["pt"])[$website["language_texts"][$format]];
		}

		else {
			$time = $website["language_texts"]["unknown_watched_time"];
		}

		# Translate episode texts
		$episode = str_replace($replace["list"], $replace["with"], $episode);

		# Check if the mixed "Re-Watched" text is in episode, if it is, replace it with the language re-watched text
		if (strstr($episode, "Re-Watched") == True) {
			$re_watched_number = explode("x ", preg_split("/Re-Watched /i", $episode)[1])[0];

			$regex = "/Re-Watched [0-9]{1,}x - Re-Assistido [0-9]{1,}x/i";
			$episode = preg_replace($regex, $watch_history["texts"]["texts"]["re_watched, title()"][$language]." ".$re_watched_number."x", $episode);
		}

		$number = HTML::Element("span", ($e + 1), "", $website["style"]["text_highlight"]);

		$time = HTML::Element("span", "(".$time.")", "", $website["style"]["text_highlight"]);

		$span = HTML::Element("span", "\n"."\t\t\t".$number." - ".$episode." ".$time."\n"."\t\t", 'style="margin-left: 3%;"', "text_hover_white");

		$website["tab_content"]["watched_things"]["string"] .= "\t\t".$span;

		if ($e != count($watch_history["texts"][$plural_media_type]["episodes"]["lines"]) - 1) {
			$website["tab_content"]["watched_things"]["string"] .= "<br />"."\n\n";
		}

		$e++;
	}

	if ($mixed_media_type != array_reverse($watch_history["texts"]["texts"]["plural_media_types, type: list, en - pt"])[0]) {
		$website["tab_content"]["watched_things"]["string"] .= "\t\t"."<br /><br />"."\n\n";
	}

	$i++;
}

$website["tab_content"]["watched_things"]["string"] .= "<br /><br />";

# Generate tasks tab content for 2018 year website
$website["tab_content"]["tasks"] = [
	"string" => "",
	"number" => 0,
];

# Define Tasks array
$tasks = [
	"folders" => [
		"task_data" => [
			"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_data"]["root"],
		],
		"task_history" => [
			"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"]["root"],
		],
	],
	"files" => [
		"texts" => $folders["apps"]["app_text_files"]["tasks"]["texts"],
	],
];

$year = $website["data"]["title"];

if ($year == "2018") {
	# Get Task Data folder
	$tasks["folders"]["task_data"][$year] = $tasks["folders"]["task_data"]["root"].$year."/";

	# Define tasks file per user language
	$tasks["files"]["tasks"] = $tasks["folders"]["task_data"][$year].$full_language.".txt";

	# Get file contents
	$contents = File::Contents($tasks["files"]["tasks"]);

	# Define tab content string (text)
	$website["tab_content"]["tasks"]["string"] = Text::From_Array($contents["lines"], "", $enumerate = True, $website["style"]["text_highlight"], $class = "text_hover_white");

	# Define text to be added to tab title (number of file lines or done tasks)
	$website["tab_content"]["tasks"]["number"] = $contents["length"];
}

else {
	# Define task types array
	$task_types = File::JSON($folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["media_network_data"]["task_types"]);

	# Define Task History year folder
	$tasks["folders"]["task_history"] = [
		"root" => $tasks["folders"]["task_history"]["root"].$year."/",
	];

	# Define Per Task Type folder
	$tasks["folders"]["task_history"]["per_task_type"] = [
		"root" => $tasks["folders"]["task_history"]["root"]."Per Task Type/",
	];

	# Define Per Task Type folder
	$tasks["folders"]["task_history"]["per_task_type"]["files"] = [
		"root" => $tasks["folders"]["task_history"]["per_task_type"]["root"]."Files/",
	];

	$file_names = [
		"Tasks",
		"Times",
	];

	$t = 0;
	foreach ($task_types["en"] as $english_task_type) {
		$language_task_type = $task_types[$language][$t];

		$tasks["folders"]["task_history"]["per_task_type"]["files"][$plural_media_type] = $tasks["folders"]["task_history"]["per_task_type"]["files"]["root"].$english_task_type."/";

		$tasks["files"][$english_task_type] = [];
		$tasks["texts"][$english_task_type] = [];

		# Define task type files and texts
		foreach ($file_names as $item) {
			$key = str_replace(" ", "_", strtolower($item));

			# Define item file
			$tasks["files"][$english_task_type][$key] = $tasks["folders"]["task_history"]["per_task_type"]["files"][$plural_media_type].$item.".";

			if ($key == "tasks") {
				$tasks["files"][$english_task_type][$key] .= "json";

				# Get contents from item file
				$tasks["texts"][$english_task_type][$key] = File::JSON($tasks["files"][$english_task_type][$key]);
			}

			if ($key != "tasks") {
				$tasks["files"][$english_task_type][$key] .= "txt";

				# Get contents from item file
				$tasks["texts"][$english_task_type][$key] = File::Contents($tasks["files"][$english_task_type][$key]);
			}
		}

		$span = HTML::Element("span", count($tasks["texts"][$english_task_type]["tasks"][$language]), "", $website["style"]["text_highlight"]);

		$b = HTML::Element("b", $language_task_type.": ".$span);

		# Anchor element to go to media type list
		$a = HTML::Element("a", $b, 'href="#'.$website["language_texts"]["tasks, title()"].": ".$language_task_type.'"');

		$website["tab_content"]["tasks"]["string"] .= $a."<br />"."\n\t\t";

		# Add task number to done tasks number
		$website["tab_content"]["tasks"]["number"] += count($tasks["texts"][$english_task_type]["tasks"][$language]);

		$t++;
	}

	$website["tab_content"]["tasks"]["string"] .= "\n"."\t\t"."<br />"."\n\n";

	$t = 0;
	foreach ($task_types["en"] as $english_task_type) {
		$language_task_type = $task_types[$language][$t];

		$folder = $tasks["folders"]["task_history"]["per_task_type"]["files"][$plural_media_type].$english_task_type."/";

		$span = HTML::Element("span", count($tasks["texts"][$english_task_type]["tasks"][$language]), "", $website["style"]["text_highlight"]);

		$b = HTML::Element("b", $language_task_type.": ".$span);

		# Plural media type header with anchor href to go to media type episodes part
		$a = HTML::Element("a", $b, 'name="'.$website["language_texts"]["tasks, title()"].": ".$language_task_type.'"')."<br />";

		$website["tab_content"]["tasks"]["string"] .= "\t\t".'<!-- "'.$language_task_type.'" task type header -->'."\n".
		"\t\t".$a."\n";

		$i = 0;
		foreach ($tasks["texts"][$english_task_type]["tasks"][$language] as $task) {
			$time = $tasks["texts"][$english_task_type]["times"]["lines"][$i];

			$format = "date_time_format";

			if (strstr($time, ":") == False) {
				$format = "date_format";
			}

			$time = Date::Now($time, $website["texts"][$format]["pt"])[$website["language_texts"][$format]];

			$number = HTML::Element("span", ($i + 1), "", $website["style"]["text_highlight"]);

			$time = HTML::Element("span", "(".$time.")", "", $website["style"]["text_highlight"]);

			$span = HTML::Element("span", "\n"."\t\t\t".$number." - ".$task." ".$time."\n"."\t\t", 'style="margin-left: 3%;"', "text_hover_white");

			$website["tab_content"]["tasks"]["string"] .= "\t\t".$span;

			if ($i != count($tasks["texts"][$english_task_type]["tasks"][$language]) - 1) {
				$website["tab_content"]["tasks"]["string"] .= "<br />"."\n\n";
			}

			$i++;
		}

		if ($english_task_type != array_reverse($task_types["en"])[0] and $tasks["texts"][$english_task_type]["tasks"][$language] != []) {
			$website["tab_content"]["tasks"]["string"] .= "\t\t"."<br /><br />"."\n\n";
		}

		if ($tasks["texts"][$english_task_type]["tasks"][$language] == []) {
			$website["tab_content"]["tasks"]["string"] .= "\t\t"."<br />"."\n\n";
		}

		$t++;
	}

	$website["tab_content"]["tasks"]["string"] .= "<br /><br />";
}

# Define tab templates
$website["tabs"]["templates"] = [
	"summary" => [
		"name" => $website["language_texts"]["summary, title()"],
		"file" => $website["data"]["files"]["summary"],
		"empty_message" => $website["language_texts"]["the_year_summary_has_not_been_created_yet"],
		"text_style" => "text-align: left;",
		"icon" => "clipboard",
	],
	"this_year_i" => [
		"name" => $website["language_texts"]["this_year_i"],
		"file" => $website["data"]["files"]["this_year_i"],
		"empty_message" => Text::Format($website["language_texts"]["the_{}_text_has_not_been_created_yet"], $website["language_texts"]["this_year_i"]),
		"text_style" => "text-align: left;",
		"icon" => "calendar_days",
	],
	"watched_things" => [
		"name" => $website["language_texts"]["watched_things"],
		"add" => " ".HTML::Element("span", $website["tab_content"]["watched_things"]["number"], "", $website["style"]["text_highlight"]),
		"text_style" => "text-align: left;",
		"content" => $website["tab_content"]["watched_things"]["string"],
		"icon" => "eye",
	],
	"tasks" => [
		"name" => $website["language_texts"]["tasks, title()"],
		"add" => " ".HTML::Element("span", $website["tab_content"]["tasks"]["number"], "", $website["style"]["text_highlight"]),
		"text_style" => "text-align: left;",
		"content" => $website["tab_content"]["tasks"]["string"],
		"icon" => "check",
	],
];

?>