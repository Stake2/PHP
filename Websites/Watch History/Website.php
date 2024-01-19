<?php 

# Add the media types to the website descriptions
$types = $JSON -> To_PHP($folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Data"]["Types"]);

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

foreach ($types["Plural"][$language] as $type) {
	if ($type == end($types["Plural"][$language])) {
		$string .= $website["Language texts"]["and"]." ";
		$styled_string .= $website["Language texts"]["and"]." ";
	}

	$string .= $type;
	$styled_string .= HTML::Element("span", $type, "", $website["Style"]["text_highlight"]);

	if ($type != end($types["Plural"][$language])) {
		$string .= ", ";
		$styled_string .= ", ";
	}
}

$website["Data"]["description"]["html"] = str_replace("{media_types}", $string, $website["Data"]["description"]["html"]);
$website["Data"]["description"]["header"] = str_replace("{media_types}", $styled_string, $website["Data"]["description"]["header"]);

# Require the "Watch History" website content PHP file to define the "media_being_watched" and "past_registries" tab templates
require $website["Data"]["Folders"]["PHP"]["root"]."Content.php";

# Add all watched things numbers of all years
$website["Data"]["Numbers"]["Total"] = 0;

foreach ($website["Data"]["Numbers"]["By year"] as $number) {
	$website["Data"]["Numbers"]["Total"] += $number;
}

$number = number_format($website["Data"]["Numbers"]["Total"], 0, ',', '.');

$first_year = $website["Watch History"]["Years list"][0];
$last_year = $website["current_year"];

$text = $number." ".HTML::format($watch_history["Language texts"]["things_watched_since_{}_until_{}"], [$first_year, $last_year]);

# Add watched things number to the language and header website title with the text
$website["Data"]["titles"]["language"] .= ": ".$text;

# Change the text color of the number
$number = HTML::Element("span", $number, "", $website["Style"]["text"]["theme"]["dark"]);
$first_year = HTML::Element("span", $first_year, "", $website["Style"]["text"]["theme"]["dark"]);
$last_year = HTML::Element("span", $last_year, "", $website["Style"]["text"]["theme"]["dark"]);

# Update the description text
$text = $number." ".HTML::format($watch_history["Language texts"]["things_watched_since_{}_until_{}"], [$first_year, $last_year]);

$website["Data"]["titles"]["icon"] .= "<br />"."\n".
$text;

$website["Data"]["description"]["html"] .= "\n".
"\n";

$website["Data"]["description"]["header"] .= "<br />"."\n".
"<br />"."\n";

$array = $website["Data"]["Numbers"]["By year"];

$years_list = Date::Create_Years_List($mode = "array", $start = 2018, $plus = 0);

foreach ($years_list as $local_year) {
	$number = $array[$local_year];

	# Add to the HTML description
	$website["Data"]["description"]["html"] .= $watch_history["Language texts"]["things_watched_in"]." ".$local_year.": ".$number;

	# Add to the header description
	$span = HTML::Element("span", $local_year, "", $website["Style"]["text_highlight"]);

	$style = 'style="text-decoration: underline; cursor: pointer;"';

	$tab_id = "past_registry_".$local_year;

	if ($local_year == $website["current_year"]) {
		$tab_id = "watched_things";
	}

	$colored_year = HTML::Element("a", $span, 'onclick="'."Open_Tab('".$tab_id."')".'"'." ".$style, $website["Style"]["text_highlight"]);

	$painted_number = HTML::Element("span", $number, "", $website["Style"]["text_highlight"]);

	$website["Data"]["description"]["header"] .= $watch_history["Language texts"]["things_watched_in"]." ".$colored_year.": ".$painted_number;

	if ($local_year != end($years_list)) {
		$website["Data"]["description"]["html"] .= "\n";

		$website["Data"]["description"]["header"] .= "<br />"."\n";
	}
}

$website["Data"]["description"]["html"] .= "\n".
"\n".
$watch_history["Language texts"]["media_types_watched_in_all_years"].":"."\n";

$website["Data"]["description"]["header"] .= "<br />"."\n".
"<br />"."\n".
$watch_history["Language texts"]["media_types_watched_in_all_years"].":"."<br />"."\n";

$array = $website["Data"]["Numbers"]["By type"];

$types_dictionary = $watch_history["Types"]["Plural"];

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