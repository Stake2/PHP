<?php 

# Story_Cards

$website["story_cards"] = "";

# Define a local list of English story titles
$story_titles = $stories["Titles"]["en"];

# Remove some titles
$i = 0;
foreach ($story_titles as $story_title) {
	if (in_array($story_title, $websites["Remove from websites tab"]) == True) {
		unset($story_titles[$i]);
		unset($stories["Titles"][$language][$i]);
	}

	$i++;
}

# Update the indexes
$story_titles = array_values($story_titles);
$stories["Titles"][$language] = array_values($stories["Titles"][$language]);

# Create story cards
$i = 0;
foreach ($story_titles as $english_story_title) {
	$language_story_title = $stories["Titles"][$language][$i];

	$website_data = $website["Dictionary"][$english_story_title];

	# Define the default story image
	$image = "";

	# Define the images folder 
	$images_folder = $folders["Mega"]["Websites"]["root"];

	if ($website["States"]["Website"]["Generate"] == False) {
		$images_folder = $folders["Mega"]["PHP"]["root"];
	}

	# Remove the last slash from the images folder
	$images_folder = substr($images_folder, 0, strlen($images_folder) - 1);

	# Define the image file
	$image_file = $images_folder.$website["Dictionary"][$english_story_title]["image"]["local_link"];

	if (file_exists($image_file) == True) {
		$image = $website_data["image"]["elements"]["theme"]["dark"];

		if (
			isset($website["Data"]["Story"]) and
			$english_story_title != $website["Data"]["Story"]["Titles"]["en"]
		) {
			$image = str_replace("height: auto;", "height: auto; width: 70%;", $image);
		}

		#$image = str_replace("image_size ", "", $image);
		$image = str_replace("border_radius_8_cent", "border_radius_5_cent", $image);
		$image = str_replace($website_data["Style"]["box_shadow"]["theme"]["dark"]." ", "", $image);
		$image = '<!-- Story card image -->'."\n".
		"\t\t\t".$image;
	}

	# Define story title text with bold font-style
	$text = HTML::Element("b", $language_story_title);

	# Define the text color for the story title
	$text_color = $website_data["Style"]["text"]["theme"]["Original dark"];
	#$text_color = "text_black";

	$h2 = "\t\t\t".HTML::Element("h2", "\n\t\t\t\t".$text."\n\t\t\t", "", "text_size ".$text_color."\n");

	# Define the website link in the current language
	$link = 'href="'.$website_data["Links"]["Language"].'"';

	if ($website["Data"]["title"] == $english_story_title) {
		$link = "";
	}

	# Define the box shadow color of the story card
	$box_shadow = "box_shadow_".str_replace("text_", "", $website_data["Style"]["text_highlight"]);

	# Define the background color of the story card
	$background_color = $website_data["Style"]["background"]["secondary_theme"]["light"];

	# Define the border color of the story card
	$border_color = $website_data["Style"]["border_4px"]["theme"]["dark"];

	$website["story_cards"] .= "\n".
	"\t\t".'<!-- "'.$language_story_title.'" story card -->'."\n".
	"\t\t".HTML::Element("a", "\n".$h2."\n"."\t\t\t".$image."\n"."\t\t\t"."<br />"."\n\t\t", $link.' target="_blank" style="width: 100%;"', "w3-btn ".$background_color." ".$border_color." ".$box_shadow." animation_shake_side background_hover_white");

	if ($english_story_title != end($stories["Titles"]["en"])) {
		$website["story_cards"] .= "\n\n"."\t\t<br />"."\n";
	}

	$i++;
}

?>