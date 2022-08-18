<?php 

$english_friendship_is_magic_text = "Friendship Is Magic";
$friendship_is_magic_text = Language_Item_Definer("Friendship Is Magic", "A Amizade É Mágica");

$website_info["website_folder_name"] = "My Little Pony/".$english_friendship_is_magic_text;

$website_images_folder = $website_media_images_website_images.$website_info["website_folder_name"]."/";
$website_images_characters_folder = $website_images_folder."Characters/";
$website_images_logo_folder = $website_images_folder."Logos/";
$mane_six_images_folder = $website_images_folder."Mane Six/";
$website_audio_folder = $website_media_website_audio.$website_info["website_folder_name"]."/";

# Website image link and image size
$website_info["image_format"] = "png";
$website_info["image_link"] = $website_media_images_website_icons.$website_info["website_folder_name"].".".$website_info["image_format"];

$mlp_fim_fandom_link = "https://mlp.fandom.com/".Language_Item_Definer("", "pt/")."wiki/";

$my_little_pony_fim_name_text = "My Little Pony: ".$friendship_is_magic_text;

$my_little_pony_english_name_text = "My Little Pony: ".$english_friendship_is_magic_text;

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
$website_descriptions = array(
Null,
"A website to thank and honor the cartoon ".$my_little_pony_fim_name_text."."."\n".
"For being so awesome, beautiful, and making me happy, I love this cartoon, made by Stake2.",
"Um site para agradecer e honrar o desenho ".$my_little_pony_fim_name_text."."."\n".
"Por ser tão incrível, lindo, e me fazer feliz, amo esse desenho, feito por Stake2.",
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
Create_Element("span", $w3_text_colors["orange"], $person_names_painted["Izaque Sanvezzo (Stake2)"]),
"<br />For",
"<br />Por",
"\"My",
Language_Item_Definer("Magic", "Mágica")."\"",
$my_little_pony_name_colored,
);

$website_header_descriptions[1] = For_Each_Replace($search_items, $replace_items, $website_descriptions[1]);
$website_header_descriptions[2] = For_Each_Replace($search_items, $replace_items, $website_descriptions[2]);

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
$full_language_en => "Thankful Text",
$full_language_pt => "Texto de Agradecimento",
);

foreach ($full_languages_array_no_null as $language) {
	$thankful_text_file = $mlp_fim_feeling_texts_folder.$thankful_text_file_names[$language].".txt";
	Create_File($thankful_text_file);
}

$thankful_text_file = $mlp_fim_feeling_texts_folder.Language_Item_Definer("Thankful Text", "Texto de Agradecimento").".txt";

$iframe_template = '<iframe class="'.$first_full_border.'" style="{}" width="{}" height="{}" src="https://www.youtube-nocookie.com/embed/{}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

$video_ids = array(
"rShiDT-Pp_A",
Language_Item_Definer("RB2TwFjvxeM", "W72uPRh6w9M"),
"6lTC0ym1mOQ",
);

$computer_videos = array();
$mobile_videos = array();

$computer_video_elements = "";
$mobile_video_elements = "";

foreach ($video_ids as $video_id) {
	$computer_video = Create_Element("div", "", format($iframe_template, array($rounded_border_style_2, "800", "35 5", $video_id)));
	$mobile_video = Create_Element("div", "", format($iframe_template, array($roundedborderstyle7, "500", "400", $video_id)));

	$computer_video_elements .= $computer_video."<br />";
	$mobile_video_elements .= $mobile_video."<br />";

	array_push($computer_videos, $computer_video);
	array_push($mobile_videos, $mobile_video);
}

$tab_number = "6";

$local_website_title = Remove_Non_File_Characters($website_info["english_title"]);
$local_website_title = str_replace(" ", "_", $local_website_title);

$jquery = '
<script language="javascript">'.
"$(document).ready(function () {
	$('#computer_button_".$tab_number."').click(function() {
		var tab_element = $('#".$local_website_title."_".$tab_names[$tab_number - 1]."_Computer');
		var mlp_fim_videos_computer = tab_element.children()[1].children[0].children[0].children[5];

		if (tab_element.is(':visible')) {
			mlp_fim_videos_computer.innerHTML = `".$computer_video_elements."`;
		}
	});

	$('#mobile_button_".$tab_number."').click(function() {
		var tab_element = $('#".$local_website_title."_".$tab_names[$tab_number - 1]."_Mobile');
		var mlp_fim_videos_mobile = tab_element.children()[1].children[0].children[0].children[6];

		if (tab_element.is(':visible')) {
			mlp_fim_videos_mobile.innerHTML = `".$mobile_video_elements."`;
		}
	});
});
</script>";

# Text File Reader.php file includer
require $text_file_reader_file_php;

# Website name, title, URL and description setter, by language
$website_info["language_title"] = $website_info["language_title"];
$website_info["language_title_with_icon"] = $my_little_pony_name_colored.": ".$icons_array["open book"]." ".$icons_array["heart"];

$website_info["meta_description"] = $website_descriptions[$language_number];
$website_info["header_description"] = $website_header_descriptions[$language_number];

?>