<?php 

# Add the game types to the website descriptions
$types = $JSON -> To_PHP($folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Data"]["Types"]);

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";

	$full_language = $Language -> languages["full"][$language];
}

$string = "";
$styled_string = "";

foreach ($types["Types"][$language] as $type) {
	if ($type == end($types["Types"][$language])) {
		$string .= $website["Language texts"]["and"]." ";
		$styled_string .= $website["Language texts"]["and"]." ";
	}

	$string .= $type;
	$styled_string .= HTML::Element("span", $type, "", $website["Style"]["text_highlight"]);

	if ($type != end($types["Types"][$language])) {
		$string .= ", ";
		$styled_string .= ", ";
	}
}

# Require the "Play History" website content PHP file to define the "games_being_played" and "past_registries" tab templates
require $website["Data"]["Folders"]["PHP"]["root"]."Content.php";

# Add all played things numbers of all years
$website["Data"]["Numbers"]["Total"] = 0;

foreach ($website["Data"]["Numbers"]["By year"] as $number) {
	$website["Data"]["Numbers"]["Total"] += $number;
}

$number = number_format($website["Data"]["Numbers"]["Total"], 0, ',', '.');

$first_year = $website["Play History"]["Years list"][0];
$last_year = $website["current_year"];

$language_text = $gameplayer["Language texts"]["game_sessions_played_since_{}_until_{}"];

$text = $number." ".HTML::format($language_text, [$first_year, $last_year]);

# Add played things number to the language and header website title with the text
$website["Data"]["titles"]["language"] .= ": ".$text;

# Change the text color of the number
$number = HTML::Element("span", $number, "", $website["Style"]["text"]["theme"]["dark"]);
$first_year = HTML::Element("span", $first_year, "", $website["Style"]["text"]["theme"]["dark"]);
$last_year = HTML::Element("span", $last_year, "", $website["Style"]["text"]["theme"]["dark"]);

# Update the description text
$text = $number." ".HTML::format($language_text, [$first_year, $last_year]);

$website["Data"]["titles"]["icon"] .= "<br />"."\n".
$text;

$website["Data"]["description"]["html"] .= "\n".
"\n";

$website["Data"]["description"]["header"] .= "<br />"."\n".
"<br />"."\n";

$array = $website["Data"]["Numbers"]["By year"];

$years_list = Date::Create_Years_List($mode = "array", $start = 2021, $plus = 0);

foreach ($years_list as $local_year) {
	$number = $array[$local_year];

	# Add to the HTML description
	$website["Data"]["description"]["html"] .= $gameplayer["Language texts"]["game_sessions_played_in"]." ".$local_year.": ".$number;

	# Add to the header description
	$span = HTML::Element("span", $local_year, "", $website["Style"]["text_highlight"]);

	$style = 'style="text-decoration: underline; cursor: pointer;"';

	$tab_id = "past_registry_".$local_year;

	# If the local year is the current year
	# Then, the tab that needs to be used is the "Played things" tab
	if ($local_year == $website["current_year"]) {
		$tab_id = "played_things";
	}

	$colored_year = HTML::Element("a", $span, 'onclick="'."Open_Tab('".$tab_id."')".'"'." ".$style, $website["Style"]["text_highlight"]);

	$painted_number = HTML::Element("span", $number, "", $website["Style"]["text_highlight"]);

	$website["Data"]["description"]["header"] .= $gameplayer["Language texts"]["game_sessions_played_in"]." ".$colored_year.": ".$painted_number;

	if ($local_year != end($years_list)) {
		$website["Data"]["description"]["html"] .= "\n";

		$website["Data"]["description"]["header"] .= "<br />"."\n";
	}
}

$website["Data"]["description"]["html"] .= "\n".
"\n".
$gameplayer["Language texts"]["game_types_played_in_all_years"].":"."\n";

$website["Data"]["description"]["header"] .= "<br />"."\n".
"<br />"."\n".
$gameplayer["Language texts"]["game_types_played_in_all_years"].":"."<br />"."\n";

$array = $website["Data"]["Numbers"]["By type"];

$types_dictionary = $gameplayer["Types"]["Types"];

$i = 0;
foreach ($types_dictionary["en"] as $type) {
	$language_type = $types_dictionary[$language][$i];

	$number = $array[$type];

	# If the number is not zero (0)
	if ($number != 0) {
		# Add to the HTML description
		$website["Data"]["description"]["html"] .= $language_type.": ".$number;

		# Add to the header description
		$painted_number = HTML::Element("span", $number, "", $website["Style"]["text_highlight"]);

		$website["Data"]["description"]["header"] .= $language_type.": ".$painted_number;

		if ($type != end($types_dictionary["en"])) {
			$website["Data"]["description"]["html"] .= "\n";

			$website["Data"]["description"]["header"] .= "<br />"."\n";
		}	
	}

	$i++;
}

?>