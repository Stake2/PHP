<?php 

# Games being played

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
		global $gameplayer;

		$s = 0;
		foreach ($gameplayer["Texts"]["statuses, type: list"][$Language -> modules_language] as $modules_language_status) {
			if ($status == $modules_language_status) {
				$language_status = $gameplayer["Language texts"]["statuses, type: list"][$s];
			}

			$s++;
		}

		return $language_status;
	}
}

$website["tab_content"]["games_being_played"] = [
	"string" => "",
	"number" => 0
];

$statuses = [
	$gameplayer["Texts"]["playing, title()"][$Language -> modules_language],
	$gameplayer["Texts"]["re_playing, title()"][$Language -> modules_language],
	$website["Texts"]["on_hold, title()"][$Language -> modules_language]
];

$game_list = [];

# Define the data network folder for easier typing
$network_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Games"];

$types_dictionary = $gameplayer["Types"]["Types"];

# Iterate through the English game types list
$i = 0;
foreach ($types_dictionary["en"] as $type) {
	$language_type = $types_dictionary[$Language -> modules_language][$i];

	$game_list[$type] = [
		"String" => "",
		"Number" => 0
	];

	if ($gameplayer["Game information"]["Information"]["Numbers"][$type] != 0) {
		$game_information_folder = $network_folder["Game information"]["root"].$language_type."/";

		$information = $game_information_folder."Information.json";

		$games = $JSON -> To_PHP($information);

		$gameplayer["Game information"]["Information"]["Numbers"][$type] = 0;

		foreach ($games["Titles"] as $game) {
			$game_folder = $game_information_folder.Sanitize_Title($game)."/";
			$details_file = $game_folder.$website["Texts"]["details, title()"][$Language -> modules_language].".txt";
			$details = $File -> Dictionary($details_file);

			if (in_array($details["Status"], $statuses)) {
				$status = Get_Language_Status($details["Status"]);

				$span = HTML::Element("span", $game, "", $website["Style"]["text"]["theme"]["dark"]." ".$website["Style"]["text_hover"]);

				$game = " - ".$span." - (".$status.")";

				$number = ($gameplayer["Game information"]["Information"]["Numbers"][$type] + 1);

				$text = $number.$game;

				$line = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["Style"]["text_highlight"]);

				$game_list[$type]["String"] .= $line."<br />";

				$gameplayer["Game information"]["Information"]["Numbers"][$type]++;
				$game_list[$type]["Number"]++;
				$website["tab_content"]["games_being_played"]["number"]++;
			}
		}

		if ($type != end($types_dictionary[$language])) {
			$game_list[$type]["String"] .= "\t\t"."<br />"."\n\n";
		}
	}

	$i++;
}

$type_headers = Generate_Game_Type_Headers($gameplayer["Language texts"]["games_being_played"]);

$website["tab_content"]["games_being_played"]["string"] = "<!-- Game type headers -->"."\n"."\t\t".
$type_headers["links"].
"\n"."\t\t"."<br />"."\n\n";

# Iterate through the English game types list
$i = 0;
foreach ($types_dictionary["en"] as $type) {
	if ($game_list[$type]["Number"] != 0) {
		$website["tab_content"]["games_being_played"]["string"] .= $type_headers["headers"][$type];

		$website["tab_content"]["games_being_played"]["string"] .= $game_list[$type]["String"];
	}

	$i++;
}

# Create the "Games being played" tab template
$website["tabs"]["templates"]["games_being_played"] = [
	"name" => $gameplayer["Language texts"]["games_being_played"],
	"add" => " ".HTML::Element("span", $website["tab_content"]["games_being_played"]["number"], "", $website["Style"]["text"]["theme"]["dark"]),
	"text_style" => "text-align: left;",
	"content" => $website["tab_content"]["games_being_played"]["string"],
	"icon" => "play"
];

?>