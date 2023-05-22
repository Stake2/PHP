<?php 

$local_website_name = $website_information["english_title"];
$local_current_year = (int)$local_website_name;

if (in_array($website_information["english_title"], $year_websites) == True and $website_information["english_title"] == "2019" or in_array($website_information["english_title"], $year_websites) == True and $website_information["english_title"] == "2020") {
	$current_year_data_folder = $year_folders[$local_current_year]."/Data/";
	Create_Folder($current_year_data_folder);

	if ($local_current_year == 2019) {
		$people_known_list_text_file = $current_year_data_folder."People Known.txt";
	}

	$data_file_names = array(
		"Created In", # Date
		"Edited In", # Date
		Language_Item_Definer("Productive Things", "Coisas Produtivas"), # Tasks.py writes into this file the full list of tasks done for the current year
		"Watched Things", # Watch_History.py writes into this file the full list of Watched Things for the current year
		"Media Comments", # Watch_History.py writes into this file the full list of Media Comments for the current year
	);

	foreach ($data_file_names as $file_name) {
		if ($file_name != "Watched Things" and $file_name != "Media Comments") {
			$data_files[$file_name] = $current_year_data_folder.$file_name.".txt";
		}

		elseif ($file_name == "Watched Things") {
			$data_files[$file_name] = format($watch_history_watched_folder_string, $local_current_year)."Episodes.txt";
		}

		elseif ($file_name == "Media Comments") {
			$data_files[$file_name] = $comment_writer_year_comment_numbers_folder.(string)$local_current_year."/"."Number.txt";
		}

		Create_File($data_files[$file_name]);

		if (Line_Number($file_name) + 1 != 0) {
			$data_texts[$file_name] = Read_Lines($data_files[$file_name]);
		}
	}

	$outer_data_file_names = array(
		"New Stories", # Gets the new stories from the current year from the "Year Folders" folder inside the "Story Database" folder
		"Websites", # Gets the list of new websites by the Tasks folder
		"Known People", # Gets the total number of people known in the current year from the "Number - Número.txt" file on the "Years Friends Numbers" text folder on the root of the "Social Networks" text folder
	);

	array_splice($outer_data_file_names, 1, 1, "Websites");

	array_push($data_file_names, "New Stories");

	array_push($data_file_names, "Story Progress");
	$data_files["Story Progress"] = $current_year_data_folder."Story Progress.txt";
	Create_File($data_files["Story Progress"]);
	$data_texts["Story Progress"] = Read_Lines($data_files["Story Progress"]);

	foreach ($outer_data_file_names as $file_name) {
		if ($file_name != "New Stories") {
			array_push($data_file_names, $file_name);
		}
	}

	$outer_data_files = array(
	"New Stories" => $story_database_year_folders.$local_current_year."/Names.txt",
	"Known People" => $notepad_social_networks_years_friends_numbers_folder.$local_current_year."/Number - Número.txt",
	);

	$folder = $notepad_productive_done_folder.$local_current_year."/Task Database/Websites/";
	Create_Folder($folder);

	$outer_data_files["Websites"] = $folder.Language_Item_Definer("New Websites", "Novos Sites").".txt";

	foreach ($outer_data_file_names as $file_name) {
		$data_file = $outer_data_files[$file_name];
		Create_File($data_file);

		$data_files[$file_name] = $data_file;
		Create_File($data_files[$file_name]);

		if (Line_Number($file_name) > 1) {
			$data_texts[$file_name] = Read_Lines($data_files[$file_name]);
		}
	}

	$data_file_names_translated = array(
		"Created In" => "Criado Em", # Date
		"Edited In" => "Editado Em", # Date
		Language_Item_Definer("Productive Things", "Coisas Produtivas") => Language_Item_Definer("Productive Things", "Coisas Produtivas"), # Tasks.py writes into this file the full list of tasks done for the current year
		"Watched Things" => "Coisas Assistidas", # Watch_History.py writes into this file the full list of Watched Things for the current year
		"Media Comments" => "Comentários de Mídia", # Watch_History.py writes into this file the full list of Media Comments for the current year
		"Story Progress" => "Progresso das Histórias",
		"New Stories" => "Novas Histórias",
		"Known People" => "Pessoas Conhecidas",
	);

	$data_file_names_translated["Websites"] = "Sites";

	$files_to_show_number = array(
		Language_Item_Definer("Watched Things", $data_file_names_translated["Watched Things"]),
		Language_Item_Definer("Productive Things", "Coisas Produtivas"),
		Language_Item_Definer("Media Comments", $data_file_names_translated["Media Comments"]),
		Language_Item_Definer("Known People", $data_file_names_translated["Known People"]),
	);

	$number_in_first_line_files = array(
		Language_Item_Definer("Known People", $data_file_names_translated["Known People"]),
		Language_Item_Definer("Media Comments", $data_file_names_translated["Media Comments"]),
	);

	$countable_files = array(
		Language_Item_Definer("Websites", $data_file_names_translated["Websites"]),
		Language_Item_Definer("New Stories", $data_file_names_translated["New Stories"]),
	);

	array_splice($data_texts, 2, 1, "\n---\n");
}

$website_information["php_folder"] = $website_php_folders[$local_website_name];

$website_information["image_format"] = "png";
$website_image = $website_media_images_website_icons.$website_information["english_title"].".".$website_information["image_format"];

$website_image_link = $website_image;

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

$website_descriptions_array = array(
Null,
"Website to show how my $local_website_name was, and what I did in it, made by ".$person_names["Izaque"], 
"Site para mostrar como meu $local_website_name foi, e o que eu fiz nele, feito por ".$person_names["Izaque"],
);

$website_html_descriptions_array = array(
Null,
str_replace($local_website_name, Create_Element("span", $text_blue_css_class, $local_website_name), str_replace($person_names["Izaque"], $person_names_painted["Izaque"], $website_descriptions_array[1])),
str_replace($local_website_name, Create_Element("span", $text_blue_css_class, $local_website_name), str_replace($person_names["Izaque"], $person_names_painted["Izaque"], $website_descriptions_array[2])),
);

# Website name, title, URL and description setter, by language
$website_information["english_title"] = Language_Item_Definer("My", "Meu")." ".$website_information["english_title"];
$website_title_header = $website_information["english_title"].": ".$icons_array["calendar"];
$website_meta_description = $website_descriptions_array[$language_number].".";
$website_header_description = $website_html_descriptions_array[$language_number].".";

if ($website_information["language"] != $language_geral) {
	$website_information["english_title"] .= " ".$website_information["title_language"];
	$website_title_header = $website_title_header;
	$website_information["link"] .= $website_information["language"]."/";
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

$custom_tab_titles = array();

$i = 0;
foreach ($tab_titles as $tab_title) {
	$custom_tab_titles[$i] = "";

	$i++;
}

$custom_tab_titles = Mix_Arrays($custom_tab_names, $custom_tab_titles, $left_or_right = "right");

$tab_texts = array();

Make_Button_Names();

?>