<?php 

$local_current_year = (int)$website_information["english_title"];

$mixed_created_in_text = "Created in - Criado em";
$mixed_edited_in_text = "Edited in - Editado em";
$mixed_story_progress_text = "Story progress - Progresso das histórias";

$current_year_data_folder = $year_folders[$local_current_year]."Data/";
Create_Folder($current_year_data_folder);

$data_file_names = array(
	"Created in - Criado em", # Date
	"Edited in - Editado em", # Date
	Language_Item_Definer("Productive things", "Coisas produtivas"), # Tasks.py writes into this file the full list of tasks done for the current year
	"Watched things", # Watch_History.py writes into this file the full list of Watched Things for the current year
	"Media comments", # Watch_History.py writes into this file the full list of Media Comments for the current year
);

$data_file_names_not_dates = array(
	Language_Item_Definer("Productive things", "Coisas produtivas"),
	"Watched things",
	"Media comments",
);

foreach ($data_file_names as $file_name) {
	if (in_array($file_name, $data_file_names_not_dates) == False) {
		$data_files[$file_name] = $year_folders[$local_current_year].$file_name.".txt";
	}

	elseif ($file_name == "Watched things") {
		$data_files[$file_name] = format($watch_history_watched_folder_string, $local_current_year)."Episodes.txt";
	}

	elseif ($file_name == "Media comments") {
		$data_files[$file_name] = $comment_writer_year_comment_numbers_folder.(string)$local_current_year."/Number.txt";
	}

	elseif ($file_name == Language_Item_Definer("Productive things", "Coisas produtivas")) {
		$data_files[$file_name] = $notepad_productive_done_folder.$local_current_year."/Task Names English.txt";
	}

	Create_File($data_files[$file_name]);

	if (Line_Number($data_files[$file_name]) != 0) {
		$data_texts[$file_name] = Read_Lines($data_files[$file_name]);
	}
}

$outer_data_file_names = array(
	"Python",
	"Known people", # Gets the total number of people known in the current year from the "Number - Número.txt" file on the "Years Friends Numbers" text folder on the root of the "Social Networks" text folder
);

array_push($data_file_names, $mixed_story_progress_text);

$data_files[$mixed_story_progress_text] = $current_year_data_folder.$mixed_story_progress_text.".txt";
Create_File($data_files[$mixed_story_progress_text]);

$data_texts[$mixed_story_progress_text] = Read_Lines($data_files[$mixed_story_progress_text]);

foreach ($outer_data_file_names as $file_name) {
	array_push($data_file_names, $file_name);
}

$outer_data_files = array(
	"Python" => $productive_network_folder."/Task Info/Python/".Language_Item_Definer($full_language_en, $full_language_pt).".txt",
	"Known people" => $notepad_social_networks_years_friends_numbers_folder.$local_current_year."/Number - Número.txt",
);

foreach ($outer_data_file_names as $file_name) {
	$data_file = $outer_data_files[$file_name];
	Create_File($data_file);

	$data_files[$file_name] = $data_file;
	Create_File($data_files[$file_name]);

	if (Line_Number($data_files[$file_name]) > 1) {
		$data_texts[$file_name] = Read_Lines($data_files[$file_name]);
	}
}

$data_file_names_translated = array(
	$mixed_created_in_text => "Criado em", # Date
	$mixed_edited_in_text => "Editado em", # Date
	Language_Item_Definer("Productive things", "Coisas produtivas") => Language_Item_Definer("Productive things", "Coisas produtivas"), # Tasks.py writes into this file the full list of tasks done for the current year
	"Productive things" => "Coisas produtivas",
	"Watched things" => "Coisas assistidas", # Watch_History.py writes into this file the full list of Watched Things for the current year
	"Media comments" => "Comentários de mídia", # Watch_History.py writes into this file the full list of Media Comments for the current year
	$mixed_story_progress_text => Language_Item_Definer("Story progress", "Progresso das histórias"),
	"Known people" => "Pessoas conhecidas",
	"Python" => "Python",
);

$files_to_show_number = array(
	Language_Item_Definer("Watched things", $data_file_names_translated["Watched things"]),
	Language_Item_Definer("Productive things", "Coisas produtivas"),
	Language_Item_Definer("Media comments", $data_file_names_translated["Media comments"]),
	Language_Item_Definer("Known people", $data_file_names_translated["Known people"]),
);

$number_in_first_line_files = array(
	Language_Item_Definer("Known people", $data_file_names_translated["Known people"]),
	Language_Item_Definer("Media comments", $data_file_names_translated["Media comments"]),
);

array_splice($data_texts, 2, 1, "\n---\n");

$website_information["image_format"] = "png";
$website_information["image_link"] = $website_media_images_website_icons.$website_information["english_title"].".".$website_information["image_format"];

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

$first_template = "Website to show how my ".$website_information["english_title"]." was, and what I did in it.{}\n".
"Made by {}";

$second_template = "Site para mostrar como meu ".$website_information["english_title"]." foi, e o que eu fiz nele.{}\n".
"Feito por {}";

$website_descriptions = array(
	format($first_template, array("", $person_names["Izaque"])),

	format($second_template, array("", $person_names["Izaque"])),
);

$website_header_descriptions = array(
	format($first_template, array("<br>", $person_names_painted["Izaque"])),

	format($second_template, array("<br>", $person_names_painted["Izaque"])),
);

# Website name, title, URL and description setter, by language
$website_information["language_title"] = Language_Item_Definer("My", "Meu")." ".$website_information["english_title"];
$website_information["language_title_with_icon"] = $website_information["language_title"].": ".$icons_array["calendar"];

$website_information["meta_description"] = $website_descriptions[$language_number - 1].".";
$website_information["header_description"] = $website_header_descriptions[$language_number - 1].".";

$tab_titles_prototype = array(
	$icons_array["clipboard"],
	$icons_array["eye"],
	$icons_array["calendar"],
	$icons_array["calendar"],
);

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_titles = array(
	"",
	$every_year_watched_number_array[$website_information["english_title"]],
	"",
	count($year_websites),
);

$custom_tab_titles = Mix_Arrays($tab_titles, $custom_tab_titles, $left_or_right = "right", $additional_value = [" ", "left"]);

$tab_texts = array();

Make_Button_Names();

?>