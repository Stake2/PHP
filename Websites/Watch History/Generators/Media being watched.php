<?php 

# Media being watched

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
		foreach ($watch_history["Texts"]["statuses, type: list"][$Language -> modules_language] as $modules_language_status) {
			if ($status == $modules_language_status) {
				$language_status = $watch_history["Language texts"]["statuses, type: list"][$s];
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
	$watch_history["Texts"]["watching, title()"][$Language -> modules_language],
	$watch_history["Texts"]["re_watching, title()"][$Language -> modules_language],
	$website["Texts"]["on_hold, title()"][$Language -> modules_language]
];

$media_list = [];

$types_dictionary = $watch_history["Types"]["Plural"];

# Iterate through the English plural media types list
$i = 0;
foreach ($types_dictionary["en"] as $type) {
	$language_type = $types_dictionary[$Language -> modules_language][$i];

	$media_list[$type] = [
		"String" => "",
		"Number" => 0
	];

	if ($watch_history["Media information"]["Information"]["Media numbers"]["By media type"][$type] != 0) {
		$media_information_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Media information"]["root"].$language_type."/";

		$information = $media_information_folder."Information.json";

		$media = $JSON -> To_PHP($information);

		$watch_history["Media information"]["Information"]["Media numbers"]["By media type"][$type] = 0;

		foreach ($media["Media titles"] as $media) {
			$media_folder = $media_information_folder.Sanitize_Title($media)."/";
			$details_file = $media_folder.$website["Texts"]["details, title()"][$Language -> modules_language].".txt";
			$details = $File -> Dictionary($details_file);

			if (in_array($details["Status"], $statuses)) {
				$status = Get_Language_Status($details["Status"]);

				$span = HTML::Element("span", $media, "", $website["Style"]["text"]["theme"]["dark"]." ".$website["Style"]["text_hover"]);

				$media = " - ".$span." - (".$status.")";

				$number = ($watch_history["Media information"]["Information"]["Media numbers"]["By media type"][$type] + 1);

				$text = $number.$media;

				$line = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["Style"]["text_highlight"]);

				$media_list[$type]["String"] .= $line."<br />";

				$watch_history["Media information"]["Information"]["Media numbers"]["By media type"][$type]++;
				$media_list[$type]["Number"]++;
				$website["tab_content"]["media_being_watched"]["number"]++;
			}
		}

		if ($type != end($types_dictionary[$language])) {
			$media_list[$type]["String"] .= "\t\t"."<br />"."\n\n";
		}
	}

	$i++;
}

$type_headers = Generate_Media_Type_Headers($watch_history["Language texts"]["media_being_watched"]);

$website["tab_content"]["media_being_watched"]["string"] = "<!-- Media type headers -->"."\n"."\t\t".
$type_headers["links"].
"\n"."\t\t"."<br />"."\n\n";

# Iterate through the English plural media types list
$i = 0;
foreach ($types_dictionary["en"] as $type) {
	if ($media_list[$type]["Number"] != 0) {
		$website["tab_content"]["media_being_watched"]["string"] .= $type_headers["headers"][$type];

		$website["tab_content"]["media_being_watched"]["string"] .= $media_list[$type]["String"];
	}

	$i++;
}

# Create the "Media being watched" tab template
$website["tabs"]["templates"]["media_being_watched"] = [
	"name" => $watch_history["Language texts"]["media_being_watched"],
	"add" => " ".HTML::Element("span", $website["tab_content"]["media_being_watched"]["number"], "", $website["Style"]["text"]["theme"]["dark"]),
	"text_style" => "text-align: left;",
	"content" => $website["tab_content"]["media_being_watched"]["string"],
	"icon" => "play"
];

?>