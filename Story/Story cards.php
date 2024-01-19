<?php 

# Story_Cards

$website["story_cards"] = "";

# Create story cards
$i = 0;
foreach ($stories["Titles"]["en"] as $english_story_title) {
	$language_story_title = $stories["Titles"][$language][$i];

	$website_data = $website["dictionary"][$english_story_title];

	# Define the default story image
	$image = "";

	if (file_exists($website["dictionary"][$english_story_title]["image"]["local_link"]) == True) {
		$image = $website_data["image"]["elements"]["theme"]["dark"];

		if ($english_story_title != $website["Data"]["story"]["Titles"]["en"]) {
			$image = str_replace("height: auto;", "height: auto; width: 100%;", $image);
		}

		#$image = str_replace("image_size ", "", $image);
		$image = str_replace("border_radius_8_cent", "border_radius_5_cent", $image);
		$image = str_replace($website_data["Style"]["box_shadow"]["theme"]["dark"]." ", "", $image);
		$image = '<!-- Story card image -->'."\n".
		"\t\t\t".$image;
	}

	# Define story title text with bold font-style
	$text = HTML::Element("b", $language_story_title);

	$h2 = "\t\t\t".HTML::Element("h2", "\n\t\t\t\t".$text."\n\t\t\t", "", "text_size ".$website_data["Style"]["text"]["theme"]["dark"])."\n";

	$link = 'href="'.$website_data["links"]["language"].'"';

	if ($website["Data"]["title"] == $english_story_title) {
		$link = "";
	}

	$box_shadow = "box_shadow_".str_replace("text_", "", $website_data["Style"]["text_highlight"]);

	$website["story_cards"] .= "\n".
	"\t\t".'<!-- "'.$language_story_title.'" story card -->'."\n".
	"\t\t".HTML::Element("a", "\n".$h2."\n"."\t\t\t".$image."\n"."\t\t\t"."<br />"."\n\t\t", $link.' target="_blank" style="width: 100%;"', "w3-btn ".$website_data["Style"]["background"]["secondary_theme"]["light"]." ".$website_data["Style"]["border_4px"]["theme"]["dark"]." ".$box_shadow." animation_shake_side background_hover_white");

	if ($english_story_title != end($stories["Titles"]["en"])) {
		$website["story_cards"] .= "\n\n"."\t\t<br />"."\n";
	}

	$i++;
}

?>