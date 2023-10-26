<?php 

# Add the media types to the website descriptions
$types = $JSON -> To_PHP($folders["mega"]["notepad"]["effort"]["networks"]["audiovisual_media_network"]["data"]["types"]);

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
	if ($type == array_reverse($types["Plural"][$language])[0]) {
		$string .= $website["language_texts"]["and"]." ";
		$styled_string .= $website["language_texts"]["and"]." ";
	}

	$string .= $type;
	$styled_string .= HTML::Element("span", $type, "", $website["style"]["text_highlight"]);

	if ($type != array_reverse($types["Plural"][$language])[0]) {
		$string .= ", ";
		$styled_string .= ", ";
	}
}

$website["data"]["description"]["html"] = str_replace("{media_types}", $string, $website["data"]["description"]["html"]);
$website["data"]["description"]["header"] = str_replace("{media_types}", $styled_string, $website["data"]["description"]["header"]);

# Require the "Watch History" website content PHP file to define the "media_being_watched" and "past_registries" tab templates
require $website["data"]["folders"]["php"]["root"]."Content.php";

# Add all watched things numbers of all years
$website["data"]["numbers"]["Watched things"] = 0;

foreach ($website["data"]["numbers"]["Watched things by year"] as $number) {
	$website["data"]["numbers"]["Watched things"] += $number;
}

$number = number_format($website["data"]["numbers"]["Watched things"], 0, ',', '.');

$first_year = $website["watch_history"]["years_list"][0];
$last_year = $website["current_year"];

$text = $number." ".HTML::format($watch_history["language_texts"]["things_watched_since_{}_until_{}"], [$first_year, $last_year]);

# Add watched things number to the language and header website title with the text
$website["data"]["titles"]["language"] .= ":\n".
$text;

$website["data"]["titles"]["icon"] .= "<br />"."\n".
$text;

$website["data"]["description"]["html"] .= "\n".
"\n";

$website["data"]["description"]["header"] .= "<br />"."\n".
"<br />"."\n";

$array = $website["data"]["numbers"]["Watched things by year"];

$years_list = Date::Create_Years_List();

foreach ($years_list as $local_year) {
	$number = $array[$local_year];

	# Add to the HTML description
	$website["data"]["description"]["html"] .= $watch_history["language_texts"]["things_watched_in"]." ".$local_year.": ".$number;

	# Add to the header description
	$span = HTML::Element("span", $local_year, "", $website["style"]["text_highlight"]);

	$style = 'style="text-decoration: underline; cursor: pointer;"';

	$tab_id = "past_registry_".$local_year;

	if ($local_year == $website["current_year"]) {
		$tab_id = "watched_things";
	}

	$colored_year = HTML::Element("a", $span, 'onclick="'."Open_Tab('".$tab_id."')".'"'." ".$style, $website["style"]["text_highlight"]);

	$painted_number = HTML::Element("span", $number, "", $website["style"]["text_highlight"]);

	$website["data"]["description"]["header"] .= $watch_history["language_texts"]["things_watched_in"]." ".$colored_year.": ".$painted_number;

	if ($local_year != array_reverse($years_list)[0]) {
		$website["data"]["description"]["html"] .= "\n";

		$website["data"]["description"]["header"] .= "<br />"."\n";
	}
}

$website["data"]["description"]["html"] .= "\n".
"\n".
$watch_history["language_texts"]["media_types_watched_in_all_years"].":"."\n";

$website["data"]["description"]["header"] .= "<br />"."\n".
"<br />"."\n".
$watch_history["language_texts"]["media_types_watched_in_all_years"].":"."<br />"."\n";

$array = $website["data"]["numbers"]["Watched things by media type"];

$i = 0;
foreach ($watch_history["types"]["Plural"]["en"] as $plural_media_type) {
	$language_media_type = $watch_history["types"]["Plural"][$language][$i];

	$number = $array[$plural_media_type];

	# Add to the HTML description
	$website["data"]["description"]["html"] .= $language_media_type.": ".$number;

	# Add to the header description
	$painted_number = HTML::Element("span", $number, "", $website["style"]["text_highlight"]);

	$website["data"]["description"]["header"] .= $language_media_type.": ".$painted_number;

	if ($plural_media_type != array_reverse($watch_history["types"]["Plural"]["en"])[0]) {
		$website["data"]["description"]["html"] .= "\n";

		$website["data"]["description"]["header"] .= "<br />"."\n";
	}

	$i++;
}

?>