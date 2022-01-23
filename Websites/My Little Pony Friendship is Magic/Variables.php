<?php 

$website_images_folder = $website_media_images_website_images.Remove_Non_File_Characters($website_info["english_title"])."/";
$website_images_characters_folder = $website_images_folder."Characters/";
$website_images_logo_folder = $website_images_folder."Logos/";
$mane_six_images_folder = $website_images_folder."Mane Six/";
$website_audio_folder = $website_media_website_audio.Remove_Non_File_Characters($website_info["english_title"])."/";

# Website image link and image size
$image_format = "png";
$website_image = $website_media_images_website_icons.Remove_Non_File_Characters($website_info["english_title"]).".".$image_format;

$website_image_link = $website_image;

$mlp_fim_fandom_link = "https://mlp.fandom.com/".Language_Item_Definer("", "pt/")."wiki/";

$my_little_pony_fim_name_text = "My Little Pony: ".Language_Item_Definer("Friendship Is Magic", "A Amizade É Mágica");

$my_little_pony_english_name_text = "My Little Pony: Friendship Is Magic";

$search_items = array(
"My L",
"ittle",
"Pony",
Language_Item_Definer("Friendshi", "A Amizad"),
"Friendshi",
Language_Item_Definer("p Is M", "e É M"),
"p Is M",
Language_Item_Definer("agic", "ágica"),
"agic",
);

$replace_items = array(
Create_Element("span", $css_texts["light_purple"], "{}search_item"),
Create_Element("span", $css_texts["yellow"], "{}search_item"),
Create_Element("span", $css_texts["pink"], "{}search_item"),
Create_Element("span", $css_texts["blue"], "{}search_item"),
Create_Element("span", $css_texts["blue"], "{}search_item"),
Create_Element("span", $css_texts["orange"], "{}search_item"),
Create_Element("span", $css_texts["orange"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
);

$my_little_pony_name_colored = For_Each_Replace($search_items, $replace_items, $my_little_pony_fim_name_text);
$my_little_pony_english_name_colored = For_Each_Replace($search_items, $replace_items, $my_little_pony_english_name_text);

#Website descriptions
$website_descriptions_array = array(
Null,
"A website to thank and honor the cartoon ".$my_little_pony_fim_name_text.".For being so awesome, beautiful, and making me happy, I love this cartoon, made by Stake2.", 
"Um site para agradecer e honrar o desenho ".$my_little_pony_fim_name_text.".Por ser tão incrível, lindo, e me fazer feliz, amo esse desenho, feito por Stake2.",
);

$website_header_descriptions = array(
Null,
);

$search_items = array(
"Stake2",
"For",
"Por",
"My",
Language_Item_Definer("Magic", "Mágica"),
$my_little_pony_fim_name_text,
);

$replace_items = array(
Create_Element("span", $w3_text_colors["orange"], $multi_persons["Izaque"]),
"<br />For",
"<br />Por",
"\"My",
Language_Item_Definer("Magic", "Mágica")."\"",
$my_little_pony_name_colored,
);

$website_header_descriptions[1] = For_Each_Replace($search_items, $replace_items, $website_descriptions_array[1]);
$website_header_descriptions[2] = For_Each_Replace($search_items, $replace_items, $website_descriptions_array[2]);

$tab_titles_prototype = array(
$icons_array["open book"]." ".$icons_array["heart"],
$icons_array["user"],
$icons_array["user friends"]." ".$icons_array["heart"],
$icons_array["book"],
$icons_array["images"],
$icons_array["video"],
$icons_array["file"],
);

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = "";
$custom_tab_names[1] = "";

$i = 0;
while ($i <= count($custom_tab_names) - 1) {
	$custom_tab_names[$i] = "";

	$i++;
}

$custom_tab_titles_array = array(
);

foreach ($tab_titles as $tab_title) {
	array_push($custom_tab_titles_array, $tab_title);
}

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$website_settings["use_custom_tab_titles"] = True;

$tab_texts = array();

Make_Button_Names();

$thankful_text_file_names = array(
$full_language_enus => "Thankful Text",
$full_language_ptbr => "Texto de Agradecimento",
);

foreach ($full_languages_array_no_null as $language) {
	$thankful_text_file = $mlp_fim_feeling_texts_folder.$thankful_text_file_names[$language].".txt";
	Create_File($thankful_text_file);
}

$thankful_text_file = $mlp_fim_feeling_texts_folder.Language_Item_Definer("Thankful Text", "Texto de Agradecimento").".txt";

$custom_css_style = "body {
	background-image: url(\"".$mane_six_images_folder."Color Gradient.png"."\");
	background-position: center;
	background-repeat: repeat-y repeat-x;
	background-size: auto; /*
}";

$computer_iframe = '<iframe width="800" height="355" src="https://www.youtube-nocookie.com/embed/{}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
$mobile_iframe = '<iframe width="500" height="400" src="https://www.youtube-nocookie.com/embed/{}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

$videos = array(
Create_Element("div", $computer_variable, format($computer_iframe, "rShiDT-Pp_A")),
Create_Element("div", $computer_variable, format($computer_iframe, Language_Item_Definer("RB2TwFjvxeM", "W72uPRh6w9M"))),
Create_Element("div", $mobile_variable, format($mobile_iframe, "rShiDT-Pp_A")),
Create_Element("div", $mobile_variable, format($mobile_iframe, Language_Item_Definer("RB2TwFjvxeM", "W72uPRh6w9M"))),
);

$tab_number = "6";

$video_elements = "";

foreach ($videos as $video) {
	$video_elements .= $video."<br />";
}

$jquery = "
<script language=\"javascript\">
$(document).ready(function () {
	$('#computer_button_".$tab_number."').click(function(){
		if ($('#mlp_fim_videos').is(':empty')) {
			$('#mlp_fim_videos').html('".$video_elements."');
		}
	});
});
</script>";

# Text File Reader.php file includer
require $text_file_reader_file_php;

# Website name, title, URL and description setter, by language
$website_title_header = $my_little_pony_name_colored;
$local_website_title_text_backup = $website_title_text;
$website_title_text = $website_title_text." General";
$website_meta_description = $website_descriptions_array[$language_number];
$website_header_description = $website_header_descriptions[$language_number];

if ($website_language != $language_geral) {
	$website_title_text = $local_website_title_text_backup;

	$website_title_header = $my_little_pony_name_colored.": ".$icons_array["open book"]." ".$icons_array["heart"];

	if ($website_language == $ptpt_language) {
		$website_title_text .= " ".$website_title_language;
	}

	$website_info["link"] .= $website_link_language."/";
}

?>