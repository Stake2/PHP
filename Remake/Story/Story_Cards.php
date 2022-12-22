<?php 

# Story_Cards

$website["story_cards"] = "";

# Create story cards
$i = 0;
foreach ($stories["titles"]["en"] as $english_story_title) {
	$language_story_title = $stories["titles"][$language][$i];

	$website_data = $website["dictionary"][$english_story_title];

	# Get story image
	$image = "";

	if (file_exists($website["dictionary"][$english_story_title]["image"]["local_link"]) == True) {
		$image = $website_data["image"]["elements"]["theme"]["dark"];
		$image = str_replace("height: auto;", "width: 100%;", $image);
		$image = str_replace("image_size ", "", $image);
		$image = str_replace("border_radius_8_cent", "border_radius_5_cent", $image);
		$image = str_replace($website_data["style"]["box_shadow"]["theme"]["dark"]." ", "", $image);
		$image = '<!-- Story card image -->'."\n".
		"\t\t\t".$image;
	}

	# Define story title text with bold font-style
	$text = HTML::Element("b", $language_story_title);

	$h2 = "\t\t\t".HTML::Element("h2", "\n\t\t\t\t".$text."\n\t\t\t", "", "text_size ".$website_data["style"]["text"]["theme"]["dark"])."\n";

	$link = 'href="'.$website_data["links"]["language"].'"';

	if ($website["data"]["title"] == $english_story_title) {
		$link = "";
	}

	$box_shadow = "box_shadow_".str_replace("text_", "", $website_data["style"]["text_highlight"]);

	$website["story_cards"] .= "\n".
	"\t\t".'<!-- "'.$language_story_title.'" story card -->'."\n".
	"\t\t".HTML::Element("a", "\n".$h2."\n"."\t\t\t".$image."\n"."\t\t\t"."<br />"."\n\t\t", $link.' target="_blank" style="width: 100%;"', "w3-btn ".$website_data["style"]["background"]["secondary_theme"]["light"]." ".$website_data["style"]["border_4px"]["theme"]["dark"]." ".$box_shadow." animation_shake_side background_hover_white");

	if ($english_story_title != array_reverse($stories["titles"]["en"])[0]) {
		$website["story_cards"] .= "\n\n"."\t\t<br />"."\n";
	}

	$i++;
}

?>