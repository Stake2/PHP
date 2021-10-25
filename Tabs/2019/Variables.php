<?php 

$local_website_name = $website_title_backup;
$local_current_year = (int)$local_website_name;

$selected_website_url = $website_links[$local_website_name];
$website_folder = $website_folders[$local_website_name];

$image_format = "png";
$website_image = $website_media_images_website_icons.$website_title.".".$image_format;

$website_image_link = $website_image;

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

$website_descriptions_array = array(
Null,
"Website to show how my $local_website_name was, and what I did in it, made by ".$person_names_array["Izaque"], 
"Site para mostrar como meu $local_website_name foi, e o que eu fiz nele, feito por ".$person_names_array["Izaque"],
);

$website_html_descriptions_array = array(
Null,
str_replace($local_website_name, Create_Element("span", $text_blue_css_class, $local_website_name), str_replace($person_names_array["Izaque"], $person_names_painted["Izaque"], $website_descriptions_array[1])),
str_replace($local_website_name, Create_Element("span", $text_blue_css_class, $local_website_name), str_replace($person_names_array["Izaque"], $person_names_painted["Izaque"], $website_descriptions_array[2])),
);

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = Language_Item_Definer("My", "Meu")." ".$website_title;
$website_title_header = $website_title.": ".$icons_array["calendar"];
$website_link = $selected_website_url;
$website_meta_description = $website_descriptions_array[$language_number].".";
$website_header_description = $website_html_descriptions_array[$language_number].".";

if ($website_language != $language_geral) {
	$website_title .= " ".$website_title_language;
	$website_title_header = $website_title_header;
	$website_link .= $website_link_language."/";
}

$i = 0;
foreach ($tab_names as $tab_title) {
	$tab_titles_prototype[$i] = "";

	$i++;
}

$tab_titles_prototype[0] = $icons_array["clipboard"];
$tab_titles_prototype[1] = $icons_array["eye"];
$tab_titles_prototype[2] = $icons_array["user friends"];
$tab_titles_prototype[3] = $icons_array["calendar"];

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = $tab_titles[0];
$custom_tab_names[1] = str_replace($icons_array["eye"], "", $tab_titles[1]).Line_Number($data_files["Watched Things"]);
$custom_tab_names[2] = str_replace($icons_array["user friends"], "", $tab_titles[2]).Line_Number($people_known_list_text_file);
$custom_tab_names[3] = $tab_titles[3];

$custom_tab_titles_array = array();

$i = 0;
foreach ($tab_titles as $tab_title) {
	$custom_tab_titles_array[$i] = "";

	$i++;
}

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$use_custom_tab_titles_array = True;

$tab_texts = array();

Make_Button_Names();

# Website Style.php File Includer
require $website_style_file;

# Tab Generator.php File Includer
require $website_tabs_generator;

/*
# Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$website_folder = $php_folder_tabs.ucwords($selected_website).'/';

$thingsnumb = 524;
$watched_number_ = $watched_episodes_2019_line_number;

$watched_movies_number = 4; 
$watched_series_number = 9; 
$watched_cartoons_number = 60;
$watched_animes_number = 87;
$watched_videos_number = 134;

$story_namenumb = 4;
$websites_number = 11;
$a = 24;
$friendsnumb = $yearnumbs2019txt[$a];
$cmntsnumb1 = 92;
$cmntsnumb2 = 183;
$tasksnumb = 44;

#Line number for the 2019 Watched VideoTypes.txt
$original1 = 12;
$original2 = 18;
$original3 = 29;
$original4 = 91;
$original5 = 180;

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

$strycapnumb = array(1, 13, 5, 1, 15);
$strywordnumb = array(512, 17.374, '7.440', 1.218, 7.401);
$strycharnumb = 41.162;

$mediabtns = '<'.$h2_element.' class="'.$computer_variable.' '.$colortext3.'" '.$marginstyle4.'>'.$readmorestyle.$read_text.' '.$computer_buttons[1].$spanc.$div_close.'</'.$h2_element.'>
<'.$h4_element.' class="'.$mobile_variable.' '.$colortext3.'" '.$marginstyle2m2.'>'.$readmorestylem.$read_text.' '.$mobile_buttons[1].$spanc.$div_close.'</'.$h4_element.'>';

$friendsbtns = '<'.$h2_element.' class="'.$computer_variable.' '.$colortext3.'" '.$marginstyle22.'>'.$readmorestyle.$read_text.' '.$computer_buttons[2].$spanc.$div_close.'</'.$h2_element.'>
<'.$h4_element.' class="'.$mobile_variable.' '.$colortext3.'" '.$marginstyle2m.'>'.$readmorestylem.$read_text.' '.$mobile_buttons[2].$spanc.$div_close.'</'.$h4_element.'>';

$pastebinlinks = array(
'<a href="https://pastebin.com/4j99vwMy">https://pastebin.com/4j99vwMy</a>', 
'<a href="https://pastebin.com/cx0jA1fx">https://pastebin.com/cx0jA1fx</a>',
'<a href="https://pastebin.com/FaGftvR0">https://pastebin.com/FaGftvR0</a>');

$tab_texts = array(
$read_text.': '.$siteicon,
$tab_names[1].': '.$icons[0],
$tab_names[2].': '.$icons[1],
$tab_names[3].': '.$icons[2],
$tab_names[4].': '.$icons[4],
$tab_names[5].': '.$icons[3],
);

#TabGenerator.php includer
require $website_tabs_generator;
*/

?>