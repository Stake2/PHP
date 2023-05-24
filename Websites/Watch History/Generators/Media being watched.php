<?php 

# Media being watched.php

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

if ($language == "general") {
	$language = "en";
}

if (function_exists("Get_Language_Status") == False) {
	function Get_Language_Status($status) {
		global $Language;
		global $website;
		global $watch_history;

		$s = 0;
		foreach ($watch_history["texts"]["statuses, type: list"][$Language -> modules_language] as $modules_language_status) {
			if ($status == $modules_language_status) {
				$language_status = $watch_history["language_texts"]["statuses, type: list"][$s];
			}

			$s++;
		}

		return $language_status;
	}
}

$website["tab_content"]["media_being_watched"] = [
	"string" => "",
	"number" => 0
];

$statuses = [
	$watch_history["texts"]["watching, title()"][$Language -> modules_language],
	$watch_history["texts"]["re_watching, title()"][$Language -> modules_language],
	$website["texts"]["on_hold, title()"][$Language -> modules_language]
];

$media_list = [];

# Iterate through the English plural media types list
$i = 0;
foreach ($watch_history["types"]["Plural"]["en"] as $plural_media_type) {
	$language_media_type = $watch_history["types"]["Plural"][$Language -> modules_language][$i];

	$media_list[$plural_media_type] = [
		"String" => "",
		"Number" => 0
	];

	if ($watch_history["media_info"]["Info"]["Numbers"][$plural_media_type] != 0) {
		$media_info_folder = $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["media_info"]["root"].$language_media_type."/";

		$info_json = $media_info_folder."Info.json";

		$media = $JSON -> To_PHP($info_json);

		$watch_history["media_info"]["Info"]["Numbers"][$plural_media_type] = 0;
		foreach ($media["Titles"] as $media) {
			$media_folder = $media_info_folder.Sanitize_Title($media)."/";
			$details_file = $media_folder.$website["texts"]["details, title()"][$Language -> modules_language].".txt";
			$details = $File -> Dictionary($details_file);

			if (in_array($details["Status"], $statuses)) {
				$status = Get_Language_Status($details["Status"]);

				$span = HTML::Element("span", $media, "", $website["style"]["text_highlight"]);
				$media = HTML::Element("span", ($watch_history["media_info"]["Info"]["Numbers"][$plural_media_type] + 1)." - ".$span." - (".$status.")", 'style="margin-left: 3%;"', $website["style"]["text_hover"]);

				$media_list[$plural_media_type]["String"] .= $media."<br />";

				$watch_history["media_info"]["Info"]["Numbers"][$plural_media_type]++;
				$media_list[$plural_media_type]["Number"]++;
				$website["tab_content"]["media_being_watched"]["number"]++;
			}
		}

		if ($plural_media_type != array_reverse($watch_history["types"]["Plural"][$language])[0]) {
			$media_list[$plural_media_type]["String"] .= "\t\t"."<br />"."\n\n";
		}
	}

	$i++;
}

$media_type_headers = Generate_Media_Type_Headers($website["language_texts"]["media_being_watched"]);

$website["tab_content"]["media_being_watched"]["string"] = "<!-- Media type headers -->"."\n"."\t\t".
$media_type_headers["links"].
"\n"."\t\t"."<br />"."\n\n";

# Iterate through the English plural media types list
$i = 0;
foreach ($watch_history["types"]["Plural"]["en"] as $plural_media_type) {
	if ($media_list[$plural_media_type]["Number"] != 0) {
		$website["tab_content"]["media_being_watched"]["string"] .= $media_type_headers["headers"][$plural_media_type];

		$website["tab_content"]["media_being_watched"]["string"] .= $media_list[$plural_media_type]["String"];
	}

	$i++;
}

# Create the "media_being_watched" tab template
$website["tabs"]["templates"]["media_being_watched"] = [
	"name" => $website["language_texts"]["media_being_watched"],
	"add" => " ".HTML::Element("span", $website["tab_content"]["media_being_watched"]["number"], "", $website["style"]["text_highlight"]),
	"text_style" => "text-align: left;",
	"content" => $website["tab_content"]["media_being_watched"]["string"],
	"icon" => "play"
];

?>