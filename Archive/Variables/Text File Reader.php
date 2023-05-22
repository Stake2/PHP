<?php 

if ($website_information["english_title"] == $website_titles["Watch History"] or in_array($website_information["english_title"], $year_websites) == True) {
	require $website_php_folders["Watch History"]."Media Variables.php";

	$current_year_backup = $current_year;

	if (in_array($website_information["language"], $en_languages_array)) {
		$language_split_number = 0;
	}

	if (in_array($website_information["language"], $pt_languages_array)) {
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

	$text = "Re-Watching.txt";

	$re_watching_media_files = array(
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
			0 => $watched_animes_number, # Animes
			1 => $watched_cartoons_number, # Cartoons
			2 => $watched_series_number, # Series
			3 => $watched_movies_number, # Movies
			4 => $watched_videos_number, # Videos
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

	$media_type_text_file_lines_array_2022 = array(
		$media_type_anime_line = "0", # Animes
		$media_type_cartoons_line = 63, # Cartoons
		$media_type_series_line = 8, # Series
		$media_type_movies_line = 6, # Movies
		$media_type_video_line = 13, # Videos
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

if ($website_information["type"] == $story_website_type) {
	if (isset($story_folder) == False) {
		$story_folder = $website_information["english_title"];
	}

	$story_folder = $mega_stories_folder.$story_folder."/";
	$story_info_folder = $story_folder."Story Info/";
	$story_info["story_lore_folder"] = $story_folder."Lore/";
	$story_writing_folder = $story_info_folder."Writing - Escrita/";

	$story_information_folder = $story_folder."Information/";
	$story_synopsis_folder = $story_information_folder."Synopsis/";

	$story_chapter_files_folder = $story_folder."Chapters/";

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$story_chapter_files_folder = $local_chapters_folder;
	}

	Create_Folder($story_info_folder);
	Create_Folder($story_database_folder);
	Create_Folder($story_chapter_files_folder);

	$chapter_number_file = $story_chapter_files_folder."Number - Número.txt"; 

	$story_comments_folder = $story_folder."Comments/";
	$story_readers_and_reads_folder = $story_folder."Readers and Reads/";

	Create_Folder($story_comments_folder);
	Create_Folder($story_readers_and_reads_folder);

	# Story Creation Date, Synopsis, Readers, and Comments file paths
	$story_creation_date_file = $story_information_folder."Creation date.txt";
	$story_synopsis_english_file = $story_synopsis_folder."English.txt";
	$story_synopsis_portuguese_file = $story_synopsis_folder."Português.txt";
	$story_readers_file = $story_readers_and_reads_folder."Readers.txt";
	$story_author_file = $story_information_folder."Author.txt";
	$story_chapter_status_file = $story_writing_folder."Chapter Status.txt";

	Create_File($story_creation_date_file);
	Create_File($story_synopsis_english_file);
	Create_File($story_synopsis_portuguese_file);
	Create_File($story_readers_file);
	Create_File($story_author_file);
	Create_File($story_chapter_status_file);

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$story_folder = $no_language_story_folder;
	}

	# Last Posted Chapter file
	$last_posted_chapter = explode(" - ", array_reverse(Read_Lines($story_chapter_status_file))[0])[0];
	$revised_chapter = Remove_Leading_Zeros($last_posted_chapter);

	$read_file = Read_Lines($story_author_file);
	$story_author_number = Line_Number($story_author_file);

	$story_info["author_name"] = $person_names_painted["Izaque"];

	if ($story_author_number >= 2) {
		$i = 0;
		foreach ($read_file as $author) {
			$story_info["author_name"] .= $person_names_painted[$author];

			if ($i != 1) {
				$story_info["author_name"] .= " ".Create_Element("span", $website_style_array["second_text_color"], $and_text)." ";
			}

			$i++;
		}
	}

	$english_titles_folder = $story_chapter_files_folder.$full_language_en."/".$english_titles_text."/";

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$english_titles_folder = $chapter_titles_folder;
	}

	else {
		Create_Folder($english_titles_folder);
	}

	$english_titles_file = $english_titles_folder.$english_titles_text.".txt";

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$english_titles_file = $chapter_titles_en_file;
	}

	else {
		Create_File($english_titles_file);
	}

	# Language-dependent text files
	$story_titles_folder = $story_chapter_files_folder.$website_information["full_language"]."/".$titles_text."/";

	if ($story_website_settings["has_custom_story_folder"] == True) {
		$story_titles_folder = $chapter_titles_folder;
	}

	else {
		Create_Folder($story_titles_folder);
	}

	if (isset($chapter_titles_file) == False) {
		$chapter_titles_file = $story_titles_folder.$titles_text.".txt";
		Create_File($chapter_titles_file);
	}

	$story_info["readers_number"] = Line_Number($story_readers_file);

	# File line number fixers
    if (isset($story_info["readers_number"])) {
        $story_readers_number_file = $story_info["readers_number"] - 1;
        $story_readers_number_text = $story_info["readers_number"];
    }

	$story_creation_date = Read_Lines($story_creation_date_file)[0];

	$story_synopsis_english = Read_String($story_synopsis_english_file);
	$story_synopsis_portuguese = Read_String($story_synopsis_portuguese_file);

	$chapter_titles = Read_Lines($chapter_titles_file);
	$english_chapter_titles = Read_Lines($english_titles_file);

	if ($story_website_settings["has_custom_story_folder"] == True and $story_website_settings["multiple_titles_files"] == True) {
		foreach ($titles_files as $local_titles_file) {
			$titles_file_texts[] = Read_Lines($local_titles_file);
		}

		$new_chapter_titles = array();

		$i = 0;
		foreach ($chapter_titles as $text) {
			$text_to_add = "";

			foreach ($titles_file_texts as $titles_file_text) {
				$text_to_add .= $titles_file_text[$i];
			}

			$new_chapter_titles[$i] = $text_to_add.$text;

			$i++;
		}

		$chapter_titles = $new_chapter_titles;
	}

	if ($story_website_settings["has_custom_story_folder"] == True and $story_website_settings["multiple_titles_files"] == False) {
		$chapter_titles = Read_Lines($chapter_titles_file);
		$english_chapter_titles = Read_Lines($english_titles_file);
	}

	$i = 0;
	foreach ($chapter_titles as $local_chapter_title) {
		if ($local_chapter_title == "") {
			unset($chapter_titles[$i]);
		}

		$i++;
	}

	$chapter_titles = array_values($chapter_titles);

	$story_info["chapter_number"] = count($chapter_titles);

	$story_info["readers"] = Read_Lines($story_readers_file);

	if (file_exists($chapter_number_file) != False) {
		$story_info["chapter_number"] = Read_Lines($chapter_number_file)[0];
	}
}

?>