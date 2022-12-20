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

# Watch History folders
$website["data"]["folders"]["watch_history"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$website["data"]["title"]];

# Define website files
$website["data"]["files"] = [
	"summary" => $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["summary, title()"].".txt",
	"this_year_i" => $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["this_year_i"].".txt",
	"texts" => $folders["apps"]["app_text_files"]["watch_history"]["texts"],
];

# Define media types array
$texts_json = File::JSON($website["data"]["files"]["texts"]);

$watched_media = "";

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

# Define files and texts arrays
$files = [];
$texts = [];

# Define files and texts
$i = 0;
foreach ($texts_json["plural_media_types, type: list, en - pt"] as $mixed_media_type) {
	$plural_media_type = $texts_json["plural_media_types, type: list"][$language][$i];

	$folder = $website["data"]["folders"]["watch_history"]["per_media_type"]["files"]["root"].$mixed_media_type."/";

	# Define file names
	$file_names = $names;

	if ($mixed_media_type == "Videos - Vídeos") {
		array_push($file_names, "YouTube IDs");
	}

	$files[$plural_media_type] = [];
	$texts[$plural_media_type] = [];

	# Define media type files and texts
	foreach ($file_names as $item) {
		$key = str_replace(" ", "_", strtolower($item));

		# Define item file
		$files[$plural_media_type][$key] = $folder.$item.".txt";

		# Define item texts
		$texts[$plural_media_type][$key] = [];

		# Get contents from item file
		$contents = File::Contents($files[$plural_media_type][$key]);

		$texts[$plural_media_type][$key] = [
			"string" => $contents["string"],
			"lines" => $contents["lines"],
			"length" => count($contents["lines"]),
		];
	}

	# Add episode number to watched things number
	$website["tab_content"]["watched_things"]["number"] += $texts[$plural_media_type][$key]["length"];

	$i++;
}

$website["tab_content"]["watched_things"]["string"] .= "<!-- Media type headers -->"."\n"."\t\t";

# Add plural media type header to watched things text
$i = 0;
foreach ($texts_json["plural_media_types, type: list, en - pt"] as $mixed_media_type) {
	$plural_media_type = $texts_json["plural_media_types, type: list"][$language][$i];

	$span = HTML::Element("span", $texts[$plural_media_type]["episodes"]["length"], "", $website["style"]["text_highlight"]);

	$b = HTML::Element("b", $plural_media_type.": ".$span);

	# Anchor element to go to media type list
	$a = HTML::Element("a", $b, 'href="#'.$plural_media_type.'"');

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
foreach ($texts_json["plural_media_types, type: list, en - pt"] as $mixed_media_type) {
	$plural_media_type = $texts_json["plural_media_types, type: list"][$language][$i];

	$span = HTML::Element("span", $texts[$plural_media_type]["episodes"]["length"], "", $website["style"]["text_highlight"]);

	$b = HTML::Element("b", $plural_media_type.": ".$span);

	# Plural media type header with anchor href to go to media type episodes part
	$a = HTML::Element("a", $b, 'name="'.$plural_media_type.'"')."<br />";

	$website["tab_content"]["watched_things"]["string"] .= "\t\t".'<!-- "'.$plural_media_type.'" media type header -->'."\n".
	"\t\t".$a."\n";

	# Add episodes to watched things text
	$e = 0;
	foreach ($texts[$plural_media_type]["episodes"]["lines"] as $episode) {
		$time = $texts[$plural_media_type]["times"]["lines"][$e];

		if ($mixed_media_type == "Videos - Vídeos") {
			$youtube_id = $texts[$plural_media_type]["youtube_ids"]["lines"][$e];
		}

		# Format watched time in local date time format ("d/m/Y" for Portuguese and "m/d/Y" for English)
		$time = Date::Now($time, $website["texts"]["date_time_format"]["pt"])[$website["language_texts"]["date_time_format"]];

		# Translate episode texts
		$episode = str_replace($replace["list"], $replace["with"], $episode);

		# Check if the mixed "Re-Watched" text is in episode, if it is, replace it with the language re-watched text
		if (strstr($episode, "Re-Watched") == True) {
			$re_watched_number = explode("x ", preg_split("/Re-Watched /i", $episode)[1])[0];

			$regex = "/Re-Watched [0-9]{1,}x - Re-Assistido [0-9]{1,}x/i";
			$episode = preg_replace($regex, $texts_json["re_watched, title()"][$language]." ".$re_watched_number."x", $episode);
		}

		$number = HTML::Element("span", ($e + 1), "", $website["style"]["text_highlight"]);

		$time = HTML::Element("span", "(".$time.")", "", $website["style"]["text_highlight"]);

		$span = HTML::Element("span", "\n"."\t\t\t".$number." - ".$episode." ".$time."\n"."\t\t", 'style="margin-left: 3%;"', "text_hover_white");

		$website["tab_content"]["watched_things"]["string"] .= "\t\t".$span;

		if ($e != count($texts[$plural_media_type]["episodes"]["lines"]) - 1) {
			$website["tab_content"]["watched_things"]["string"] .= "<br />"."\n\n";
		}

		$e++;
	}

	if ($mixed_media_type != array_reverse($texts_json["plural_media_types, type: list, en - pt"])[0]) {
		$website["tab_content"]["watched_things"]["string"] .= "\t\t"."<br /><br />"."\n\n";
	}

	$i++;
}

$website["tab_content"]["watched_things"]["string"] .= "<br /><br />";

?>