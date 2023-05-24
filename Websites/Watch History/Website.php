<?php 

# Add the media types to the website descriptions
$types = $JSON -> To_PHP($folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["data"]["types"]);

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

?>