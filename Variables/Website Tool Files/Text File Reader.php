<?php 

if (in_array($website_title, $year_websites) == True and $website_title_backup == "2019" or in_array($website_title, $year_websites) == True and $website_title_backup == "2020") {
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

if (in_array($website_title, $year_websites) == True and $website_title_backup == "2021") {
	$current_year_data_folder = $year_folders[$local_current_year]."Data/";
	Create_Folder($current_year_data_folder);

	$data_file_names = array(
	"Created In", # Date
	"Edited In", # Date
	Language_Item_Definer("Productive Things", "Coisas Produtivas"), # Tasks.py writes into this file the full list of tasks done for the current year
	"Watched Things", # Watch_History.py writes into this file the full list of Watched Things for the current year
	"Media Comments", # Watch_History.py writes into this file the full list of Media Comments for the current year
	);

	foreach ($data_file_names as $file_name) {
		if ($file_name != "Watched Things" and $file_name != "Media Comments" and $file_name != Language_Item_Definer("Productive Things", "Coisas Produtivas")) {
			$data_files[$file_name] = $current_year_data_folder.$file_name.".txt";
		}

		elseif ($file_name == "Watched Things") {
			$data_files[$file_name] = format($watch_history_watched_folder_string, $local_current_year)."Episodes.txt";
		}

		elseif ($file_name == "Media Comments") {
			$data_files[$file_name] = $comment_writer_year_comment_numbers_folder.(string)$local_current_year."/"."Number.txt";
		}

		elseif ($file_name == Language_Item_Definer("Productive Things", "Coisas Produtivas")) {
			$data_files[$file_name] = $notepad_productive_done_folder.$local_current_year."/Task Names English.txt";
		}

		Create_File($data_files[$file_name]);

		if (Line_Number($file_name) + 1 != 0) {
			$data_texts[$file_name] = Read_Lines($data_files[$file_name]);
		}
	}

	$outer_data_file_names = array(
	"Python",
	"Known People", # Gets the total number of people known in the current year from the "Number - Número.txt" file on the "Years Friends Numbers" text folder on the root of the "Social Networks" text folder
	);

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
	"Python" => $notepad_productive_done_folder.$local_current_year."/Task Info/Python/".Language_Item_Definer($full_language_enus, $full_language_ptbr).".txt",
	"Known People" => $notepad_social_networks_years_friends_numbers_folder.$local_current_year."/Number - Número.txt",
	);

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
	"Productive Things" => "Coisas Produtivas",
	"Watched Things" => "Coisas Assistidas", # Watch_History.py writes into this file the full list of Watched Things for the current year
	"Media Comments" => "Comentários de Mídia", # Watch_History.py writes into this file the full list of Media Comments for the current year
	"Story Progress" => "Progresso das Histórias",
	"Known People" => "Pessoas Conhecidas",
	"Python" => "Python",
	);

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

	$countable_files = array();

	array_splice($data_texts, 2, 1, "\n---\n");
}

if ($website_title_backup == $website_titles["Watch History"] or in_array($website_title, $year_websites) == True) {
	require $media_variables_php;

	if (in_array($website_title, $year_websites)) {
		$current_year_backup = $current_year;
	}

	if (in_array($website_language, $en_languages_array)) {
		$language_split_number = 0;
	}

	if (in_array($website_language, $pt_languages_array)) {
		$language_split_number = 1;
	}

	$text = "/";

	$media_info_folders = array(
	$mixed_media_type_names_plural_dict["Animes"] => $media_info_folder.$mixed_media_type_names_plural_dict["Animes"].$text,
	$mixed_media_type_names_plural_dict["Cartoons"] => $media_info_folder.$mixed_media_type_names_plural_dict["Cartoons"].$text,
	$mixed_media_type_names_plural_dict["Series"] => $media_info_folder.$mixed_media_type_names_plural_dict["Series"].$text,
	$mixed_media_type_names_plural_dict["Movies"] => $media_info_folder.$mixed_media_type_names_plural_dict["Movies"].$text,
	$mixed_media_type_names_plural_dict["Videos"] => $media_info_folder.$mixed_media_type_names_plural_dict["Videos"].$text,
	);

	$text = "/";

	$media_details_folders = array(
	$mixed_media_type_names_plural_dict["Animes"] => $media_info_media_details_folder.$mixed_media_type_names_plural_dict["Animes"].$text,
	$mixed_media_type_names_plural_dict["Cartoons"] => $media_info_media_details_folder.$mixed_media_type_names_plural_dict["Cartoons"].$text,
	$mixed_media_type_names_plural_dict["Series"] => $media_info_media_details_folder.$mixed_media_type_names_plural_dict["Series"].$text,
	$mixed_media_type_names_plural_dict["Movies"] => $media_info_media_details_folder.$mixed_media_type_names_plural_dict["Movies"].$text,
	$mixed_media_type_names_plural_dict["Videos"] => $media_info_media_details_folder.$mixed_media_type_names_plural_dict["Videos"].$text,
	);

	$text = "Watching Status/";

	$watching_status_folders = array(
	$mixed_media_type_names_plural_dict["Animes"] => $media_details_folders[$mixed_media_type_names_plural_dict["Animes"]].$text,
	$mixed_media_type_names_plural_dict["Cartoons"] => $media_details_folders[$mixed_media_type_names_plural_dict["Cartoons"]].$text,
	$mixed_media_type_names_plural_dict["Series"] => $media_details_folders[$mixed_media_type_names_plural_dict["Series"]].$text,
	$mixed_media_type_names_plural_dict["Movies"] => $media_details_folders[$mixed_media_type_names_plural_dict["Movies"]].$text,
	$mixed_media_type_names_plural_dict["Videos"] => $media_details_folders[$mixed_media_type_names_plural_dict["Videos"]].$text,
	);

	$text = "Watching.txt";

	$watching_media_files = array(
	$mixed_media_type_names_plural_dict["Animes"] => $watching_status_folders[$mixed_media_type_names_plural_dict["Animes"]].$text,
	$mixed_media_type_names_plural_dict["Cartoons"] => $watching_status_folders[$mixed_media_type_names_plural_dict["Cartoons"]].$text,
	$mixed_media_type_names_plural_dict["Series"] => $watching_status_folders[$mixed_media_type_names_plural_dict["Series"]].$text,
	$mixed_media_type_names_plural_dict["Movies"] => $watching_status_folders[$mixed_media_type_names_plural_dict["Movies"]].$text,
	$mixed_media_type_names_plural_dict["Videos"] => $watching_status_folders[$mixed_media_type_names_plural_dict["Videos"]].$text,
	);

	$watching_medias_number = 0;
	foreach ($watching_media_files as $file) {
		$number = Line_Number($file);

		$watching_medias_number = ($watching_medias_number + (int)$number);
	}

	$watched_movie_names_file = $notepad_movies_folder."Names.txt";
	$watched_movie_times_file = $notepad_movies_folder."Times.txt";
	$watched_movie_number_file = $notepad_movies_folder."Number.txt";

	$watched_movie_names_line_number = Line_Number($watched_movie_names_file);
	$watched_movie_times_line_number = Line_Number($watched_movie_times_file);

	$watched_movie_time_numbers_array = array("0", 1, 4, 5, 6, 7, 8, 9, 10);
	$watched_movie_comment_numbers_array = array(1, 4, 5, 6, 7, 8);
	$watched_episodes_has_time_array_2018 = array(1, 6, 10, 11, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 41, 42, 43, 44, 46, 47, 48, 49, 52);

	$watched_movie_names_text = Read_Lines($watched_movie_names_file);
	$watched_movie_times_text = Read_Lines($watched_movie_times_file);

	$current_variable_year = 2018;
	while ($current_variable_year <= $current_year_backup) {
		$local_current_year = $current_variable_year;

		$current_year_watched_folder_to_use = format($watch_history_watched_folder_string, $local_current_year);
		$current_year_per_media_type_watched_folder = $current_year_watched_folder_to_use."Per Media Type/";
		$current_year_per_media_type_watched_files_folder = $current_year_per_media_type_watched_folder."Files/";
		$current_year_per_media_type_watched_folders_folder = $current_year_per_media_type_watched_folder."Folders/";

		Create_Folder($current_year_per_media_type_watched_folder);
		Create_Folder($current_year_per_media_type_watched_files_folder);
		Create_Folder($current_year_per_media_type_watched_folders_folder);

		$current_year_watched_episodes_file = $current_year_watched_folder_to_use.$english_watched_episodes_text.".txt";
		$current_year_watched_times_file = $current_year_watched_folder_to_use.$english_watched_times_text.".txt";
		$current_year_watched_media_types_file = $current_year_watched_folder_to_use.$english_watched_media_types_text.".txt";

		$current_year_watched_episodes_line_number = Line_Number($current_year_watched_episodes_file);
		$current_year_watched_number = $current_year_watched_episodes_line_number - 1;
		${"watched_episodes_".$local_current_year."_line_number"} = $current_year_watched_episodes_line_number;

		$current_year_watched_episodes_text = Read_Lines($current_year_watched_episodes_file);
		${"year_".$local_current_year."_watched_episodes_text"} = $current_year_watched_episodes_text;

		$current_year_watched_media_type_text = Read_Lines($current_year_watched_media_types_file);

		$new_current_year_watched_media_type_text = array();

		foreach ($current_year_watched_media_type_text as $line) {
			if (strpos($line, ", ") == True) {
				$new_current_year_watched_media_type_text[] = explode(", ", $line)[$language_split_number];
			}

			else {
				$new_current_year_watched_media_type_text[] = $line;
			}
		}

		$current_year_watched_media_type_text = $new_current_year_watched_media_type_text;
		${"year_".$local_current_year."_watched_media_type_text"} = $current_year_watched_media_type_text;

		$current_year_watched_time_text = Read_Lines($current_year_watched_times_file);
		${"year_".$local_current_year."_watched_time_text"} = $current_year_watched_time_text;

		$text = "/Number.txt";

		$per_media_type_files_folders = array(
		$mixed_media_type_names_plural_dict["Animes"] => $current_year_per_media_type_watched_files_folder.$mixed_media_type_names_plural_dict["Animes"].$text,
		$mixed_media_type_names_plural_dict["Cartoons"] => $current_year_per_media_type_watched_files_folder.$mixed_media_type_names_plural_dict["Cartoons"].$text,
		$mixed_media_type_names_plural_dict["Series"] => $current_year_per_media_type_watched_files_folder.$mixed_media_type_names_plural_dict["Series"].$text,
		$mixed_media_type_names_plural_dict["Movies"] => $current_year_per_media_type_watched_files_folder.$mixed_media_type_names_plural_dict["Movies"].$text,
		$mixed_media_type_names_plural_dict["Videos"] => $current_year_per_media_type_watched_files_folder.$mixed_media_type_names_plural_dict["Videos"].$text,
		);

		$watched_animes_number = (int)Read_Lines($per_media_type_files_folders[$mixed_media_type_names_plural_dict["Animes"]])[0];
		$watched_cartoons_number = (int)Read_Lines($per_media_type_files_folders[$mixed_media_type_names_plural_dict["Cartoons"]])[0];
		$watched_series_number = (int)Read_Lines($per_media_type_files_folders[$mixed_media_type_names_plural_dict["Series"]])[0];
		$watched_movies_number = (int)Read_Lines($per_media_type_files_folders[$mixed_media_type_names_plural_dict["Movies"]])[0];
		$watched_videos_number = (int)Read_Lines($per_media_type_files_folders[$mixed_media_type_names_plural_dict["Videos"]])[0];

		# Media numbers array
		${"watched_media_numbers_".$local_current_year} = array(
		0 => $watched_animes_number, #Animes
		1 => $watched_cartoons_number, #Cartoons
		2 => $watched_series_number, #Series
		3 => $watched_movies_number, #Movies
		4 => $watched_videos_number, #Videos
		);

		$current_variable_year++;
	}

	$media_type_text_file_lines_array_2018 = array(
	$media_type_anime_line = 5, #Animes
	$media_type_cartoons_line = 19, #Cartoons
	$media_type_series_line = 14, #Series
	$media_type_movies_line = "0", #Movies
	$media_type_video_line = 2, #Videos
	);

	$media_type_text_file_lines_array_2019 = array(
	$media_type_anime_line = 7, #Animes
	$media_type_cartoons_line = 2, #Cartoons
	$media_type_series_line = 10, #Series
	$media_type_movies_line = 23, #Movies
	$media_type_video_line = "0", #Videos
	);

	$media_type_text_file_lines_array_2020 = array(
	$media_type_anime_line = 2, #Animes
	$media_type_cartoons_line = 62, #Cartoons
	$media_type_series_line = 16, #Series
	$media_type_movies_line = 84, #Movies
	$media_type_video_line = "0", #Videos
	);

	$media_type_text_file_lines_array_2021 = array(
	$media_type_anime_line = 2, #Animes
	$media_type_cartoons_line = 5, #Cartoons
	$media_type_series_line = 1, #Series
	$media_type_movies_line = 12, #Movies
	$media_type_video_line = "0", #Videos
	);

	$watched_media_numbers_current_year = ${"watched_media_numbers_".$local_current_year};

	$media_type_text_file_lines_arrays = array();

	$current_variable_year = 2018;
	while ($current_variable_year <= $current_year) {
		$media_type_text_file_lines_arrays[$current_variable_year] = ${"media_type_text_file_lines_array_".$current_variable_year};

		$current_variable_year++;
	}

	$every_year_watched_number_array = array();

	$current_variable_year = 2018;
	$local_current_year = $current_year;

	while ($current_variable_year <= $local_current_year) {
		$every_year_watched_number_array[$current_variable_year] = ${"watched_number_".$current_variable_year} = ${"watched_episodes_".$current_variable_year."_line_number"};

		$current_variable_year++;
	}

	$current_year_watched_number_text = $current_year_watched_episodes_line_number;

	$current_variable_year = 2018;
	$every_year_watched_number = 0;
	while ($current_variable_year <= $current_year) {
		$number = $every_year_watched_number_array[$current_variable_year];

		$every_year_watched_number = $every_year_watched_number + $number;

		$current_variable_year++;
	}

	$media_type_text_file_lines_array = $media_type_text_file_lines_arrays[$current_year];
}

if ($website_type == $story_website_type) {
	if (isset($story_folder) == False) {
		$story_folder = "The Life of Littletato";
	}

	$story_folder = $mega_stories_folder.$story_folder."/";
	$story_info_folder = $story_folder."Story Info/";
	$story_database_folder = $mega_stories_folder."Story Database/";

	$story_chapter_files_folder = $story_folder."Chapters/";

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$story_chapter_files_folder = $local_chapters_folder;
	}

	Create_Folder($story_info_folder);
	Create_Folder($story_database_folder);
	Create_Folder($story_chapter_files_folder);

	$story_comments_folder = $story_folder."Comments/";
	$story_readers_and_reads_folder = $story_folder."Readers and Reads/";

	Create_Folder($story_comments_folder);
	Create_Folder($story_readers_and_reads_folder);

	# Story Creation Date, Synopsis, Readers, and Comments file paths
	$story_creation_date_file = $story_info_folder."Creation Date.txt";
	$story_synopsis_english_file = $story_info_folder."Synopsis.txt";
	$story_synopsis_portuguese_file = $story_info_folder."Sinopse.txt";
	$story_readers_file = $story_readers_and_reads_folder."Readers.txt";
	$story_chapter_status_file = $story_info_folder."Chapter Status.txt";
	$chapter_number_file = $story_info_folder."Chapter Number.txt"; 
	$story_author_file = $story_info_folder."Author.txt";

	Create_File($story_creation_date_file);
	Create_File($story_synopsis_english_file);
	Create_File($story_synopsis_portuguese_file);
	Create_File($story_readers_file);
	Create_File($story_chapter_status_file);
	Create_File($story_author_file);

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$story_folder = $no_language_story_folder;
	}

	# Last Posted Chapter file
	$last_posted_chapter = explode(" - ", array_reverse(Read_Lines($story_chapter_status_file))[0])[0];
	$revised_chapter = $last_posted_chapter;
	$revised_chapter = Remove_Leading_Zeros($revised_chapter);

	$story_author = Read_Lines($story_author_file);
	$story_author_number = Line_Number($story_author_file);

	$author_name = "";

	if ($story_author_number >= 2) {
		$i = 0;
		foreach ($story_author as $author) {
			$author_name .= $person_names_painted[$author];

			if ($i != $story_author_number - 1) {
				$author_name .= "<br>".Create_Element("span", $website_style_array["second_text_color"], $and_text)." ";
			}

			$i++;
		}
	}

	else {
		$author_name .= $person_names_painted[$story_author[0]];
	}

	$titles_enus_folder = $story_chapter_files_folder.$full_language_enus."/".$titles_english_text."/";

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$titles_enus_folder = $chapter_titles_folder;
	}

	else {
		Create_Folder($titles_enus_folder);
	}

	$titles_enus_file = $titles_enus_folder.$titles_english_text.".txt";

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$titles_enus_file = $chapter_titles_enus_file;
	}

	else {
		Create_File($titles_enus_file);
	}

	# Language-dependent text files
	$story_titles_folder = $story_chapter_files_folder.$full_language."/".$titles_text."/";

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$story_titles_folder = $chapter_titles_folder;
	}

	else {
		Create_Folder($story_titles_folder);
	}

	$titles_file = $story_titles_folder.$titles_text.".txt";

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$titles_file = $chapter_titles_file;
	}

	else {
		Create_File($titles_file);
	}

	$chapters = Line_Number($titles_file);

	$readers_number = Line_Number($story_readers_file);

	# File line number fixers
    if (isset($readers_number)) {
        $story_readers_number_file = $readers_number - 1;
        $story_readers_number_text = $readers_number;
    }

	$story_creation_date = Read_Lines($story_creation_date_file)[0];

	$story_synopsis_english = Read_String($story_synopsis_english_file);
	$story_synopsis_portuguese = Read_String($story_synopsis_portuguese_file);

	$chapter_titles = Read_Lines($titles_file);

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$i = 0;
		foreach ($titles_files as $local_titles_file) {
			$titles_file_texts[] = Read_Lines($local_titles_file);

			$i++;
		}

		$i = 0;
		foreach ($chapter_titles as $text) {
			$text_to_add = "";

			foreach ($titles_file_texts as $titles_file_text) {
				$text_to_add .= $titles_file_text[$i];
			}

			$chapter_titles[$i] = $text_to_add.$text;

			$i++;
		}
	}

	$chapter_titles_enus = Read_Lines($titles_enus_file);

	$readers = Read_Lines($story_readers_file);

	if (file_exists($chapter_number_file) != False) {
		$chapters = Read_Lines($chapter_number_file)[0];
	}

	$chapter_number = Line_Number($titles_file);
}

?>