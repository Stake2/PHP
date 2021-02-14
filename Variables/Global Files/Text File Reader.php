<?php 

if ($website_uses_universal_file_reader == True) {
	$i = 0;
	foreach ($filenamesarray as $file) {
		$filesarray[$i] = $file;

		$i++;
	}

	#File text reader that makes an array of the text files
	$i = 0;
	foreach ($filesarray as $file) {
		if (file_exists($file) == True) {
			$fp = fopen($file, 'r', 'UTF-8'); 
			if ($fp) {
				${"$filetextarraynames[$i]"} = explode("\n", fread($fp, filesize($file)));
				${"$filetextarraynames[$i]"} = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", ${"$filetextarraynames[$i]"});

				$filetexts[$i] = ${"$filetextarraynames[$i]"};
			}
		}

		$i++;
	}

	#File line number counter
	$i = 0;
	foreach ($filesarray as $file) {
		if (file_exists($file) == True) {
			${"$filenumberarraynames[$i]"} = 0;
			$handle = fopen ($file, "r");
			while (!feof ($handle)){
				$line = fgets ($handle);
				${"$filenumberarraynames[$i]"}++;
			}

			$filenumbers[$i] = ${"$filenumberarraynames[$i]"};
		}

		$i++;
	}
}

if ($website_name == $website_diario) {
	$diario_numbers_text_file = $used_folder.'Diário Numbers.txt';

	if (file_exists($diario_numbers_text_file) == True) {
		$diario_numbers_fp = fopen($diario_numbers_text_file, 'r', 'UTF-8');
		if ($diario_numbers_fp) {
			$diario_blocks_number = explode("\n", fread($diario_numbers_fp, filesize($diario_numbers_text_file)));
		}
	}
}

if (in_array($website_name, $years_array)) {
	$current_year_summary_text_file = $year_folders[$current_year].$year_summary_text.' '.$current_year.'.txt';
	$current_year_summary_year_stuff_file = $year_folders[$current_year].'Year Stuff.txt';

	$file = $current_year_summary_text_file;
	if (file_exists($file) == True) {
		$read_file = fopen($file, 'r', 'UTF-8');
		if ($read_file) {
			$replaceable_array = explode("\n", fread($read_file, filesize($file)));
			$year_summary_file_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $replaceable_array);
		}
	}

	$file = $current_year_summary_year_stuff_file;
	if (file_exists($file) == True) {
		$read_file = fopen($file, 'r', 'UTF-8');
		if ($read_file) {
			$replaceable_array = explode("\n", fread($read_file, filesize($file)));
			$year_stuff_file_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $replaceable_array)[0];
		}
	}
}

if ($website_name == $website_watch_history or in_array($website_name, $years_array)) {
	#require($watch_history_text_file_reader_module);
}

if ($website_name == $website_watch_history or in_array($website_name, $years_array)) {
	$to_watch_episodes_file = $notepad_watch_history_folder.'To Watch Episodes.txt';
	$to_watch_status_file = $notepad_watch_history_folder.'To Watch Status.txt';
	$to_watch_folders_file = $notepad_watch_history_folder.'To Watch Folders.txt';

	$watched_movies_file = $notepad_watch_history_folder.'Watched Movies.txt';
	$watched_movies_time_file = $notepad_watch_history_folder.'Watched Movies Time.txt';
	$watched_movie_time_numbers_array = array('0', 1, 4, 5, 6, 7, 8, 9, 10);
	$watched_movie_comment_numbers_array = array(1, 4, 5, 6, 7, 8);
	$watched_episodes_has_time_array_2018 = array(1, 6, 10, 11, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 41, 42, 43, 44, 46, 47, 48, 49, 52);

	if (in_array($website_language, $en_languages_array)) {
		$to_watch_media_type_file = $notepad_watch_history_folder.'To Watch Media Types '.strtoupper($enus_language).'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$to_watch_media_type_file = $notepad_watch_history_folder.'To Watch Media Types '.strtoupper($ptbr_language).'.txt';
	}

	if (file_exists($to_watch_episodes_file) == True) {
		$to_watch_line_number = 0;
		$handle = fopen ($to_watch_episodes_file, "r");
		while (!feof ($handle)){
			$line = fgets($handle);
			$to_watch_line_number++;
		}
	}

	if (file_exists($to_watch_episodes_file) == True) {
		$file = fopen($to_watch_episodes_file, 'r', 'UTF-8');
		if ($file) {
			$to_watch_text = explode("\n", fread($file, filesize($to_watch_episodes_file)));
			$to_watch_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $to_watch_text);
		}
	}

	if (file_exists($to_watch_status_file) == True) {
		$file = fopen($to_watch_status_file, 'r', 'UTF-8');
		if ($file) {
			$to_watch_status_file_text = explode("\n", fread($file, filesize($to_watch_status_file)));
			$to_watch_status_file_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $to_watch_status_file_text);
		}
	}

	if (file_exists($to_watch_folders_file) == True) {
		$file = fopen($to_watch_folders_file, 'r', 'UTF-8');
		if ($file) {
			$to_watch_folders_text = explode("\n", fread($file, filesize($to_watch_folders_file)));
			$to_watch_folders_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $to_watch_folders_text);
		}
	}

	if (file_exists($to_watch_media_type_file) == True) {
		$file = fopen($to_watch_media_type_file, 'r', 'UTF-8');
		if ($file) {
			$to_watch_media_type_text = explode("\n", fread($file, filesize($to_watch_media_type_file)));
			$to_watch_media_type_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $to_watch_media_type_text);
		}
	}

	if (file_exists($watched_movies_file) == True) {
		$watched_movies_line_number = 0;
		$handle = fopen ($watched_movies_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$watched_movies_line_number++;
		}
	}

	if (file_exists($watched_movies_file) == True) {
		$file = fopen($watched_movies_file, 'r', 'UTF-8');
		if ($file) {
			$watched_movies_text = explode("\n", fread($file, filesize($watched_movies_file)));
			$watched_movies_text = str_replace(";", ":", $watched_movies_text);
			$watched_movies_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watched_movies_text);
		}
	}

	if (file_exists($watched_movies_time_file) == True) {
		$file = fopen($watched_movies_time_file, 'r', 'UTF-8'); 
		if ($file) {
			$text_array = explode("\n", fread($file, filesize($watched_movies_time_file)));
			$watched_movies_time_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $text_array);
		}
	}

	$current_variable_year = 2018;
	while ($current_variable_year <= $current_year_backup) {
		$current_year = $current_variable_year;
		$current_year_watched_episodes_file = $notepad_watch_history_folder.$watched_string.'/'.$current_year.'/'.$watched_episodes_text.'.txt';
		$current_year_watched_time_file = $notepad_watch_history_folder.$watched_string.'/'.$current_year.'/'.$watched_time_text.'.txt';

		if (in_array($website_language, $en_languages_array)) {
			$current_year_watched_media_type_file = $notepad_watch_history_folder.$watched_string.'/'.$current_year.'/'.$watched_media_type_text.' '.strtoupper($enus_language).'.txt';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$current_year_watched_media_type_file = $notepad_watch_history_folder.$watched_string.'/'.$current_year.'/'.$watched_media_type_text.' '.strtoupper($ptbr_language).'.txt';
		}

		$file = $current_year_watched_episodes_file;
		if (file_exists($file) == True) {
			$current_year_watched_episodes_line_number = 0;
			$handle = fopen ($file, "r");
			while (!feof ($handle)){
				$line = fgets ($handle);
				$current_year_watched_episodes_line_number++;
			}
		}

		$current_year_watched_number = $current_year_watched_episodes_line_number - 1;
		${"watched_episodes_".$current_year."_line_number"} = $current_year_watched_episodes_line_number;

		$file_read = $current_year_watched_episodes_file;
		if (file_exists($file_read) == True) {
			$file = fopen($file_read, 'r', 'UTF-8');
			if ($file) {
				$current_year_watched_episodes_text = explode("\n", fread($file, filesize($file_read)));
				$current_year_watched_episodes_text = str_replace(";", ":", $current_year_watched_episodes_text);
				$current_year_watched_episodes_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $current_year_watched_episodes_text);
			}
		}

		${"year_".$current_year."_watched_episodes_text"} = $current_year_watched_episodes_text;

		$file_read = $current_year_watched_time_file;
		if (file_exists($file_read) == True) {
			$file = fopen($file_read, 'r', 'UTF-8');
			if ($file) {
				$current_year_watched_time_text = explode("\n", fread($file, filesize($file_read)));
				$current_year_watched_time_text = str_replace(";", ":", $current_year_watched_time_text);
				$current_year_watched_time_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $current_year_watched_time_text);
			}
		}

		${"year_".$current_year."_watched_time_text"} = $current_year_watched_time_text;

		$file_read = $current_year_watched_media_type_file;
		if (file_exists($file_read) == True) {
			$file = fopen($file_read, 'r', 'UTF-8');
			if ($file) {
				$text_array = explode("\n", fread($file, filesize($file_read)));
				$text_array = str_replace(";", ":", $text_array);
				$current_year_watched_media_type_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $text_array);
			}
		}

		${"year_".$current_year."_watched_media_type_text"} = $current_year_watched_media_type_text;

		if (file_exists($current_year_watched_media_type_file) == True) {
			$i = 0;
			$watched_animes_number = 0;
			if (count($current_year_watched_media_type_text) != 0) {
				while ($i <= count($current_year_watched_media_type_text) - 1) {
					if ($current_year_watched_media_type_text[$i] == 'Anime') {
						$watched_animes_number++;
					}

					$i++;
				}
			}

			$i = 0;
			$watched_cartoons_number = 0;
			while ($i <= count($current_year_watched_media_type_text) - 1) {
				if ($current_year_watched_media_type_text[$i] == 'Cartoon' or $current_year_watched_media_type_text[$i] == 'Desenho') {
					$watched_cartoons_number++;
				}

				$i++;
			}

			$i = 0;
			$watched_series_number = 0;
			while ($i <= count($current_year_watched_media_type_text) - 1) {
				if ($current_year_watched_media_type_text[$i] == 'Series' or $current_year_watched_media_type_text[$i] == 'Série') {
					$watched_series_number++;
				}

				$i++;
			}

			$i = 0;
			$watched_movies_number = 0;
			while ($i <= count($current_year_watched_media_type_text) - 1) {
				if ($current_year_watched_media_type_text[$i] == 'Movie' or $current_year_watched_media_type_text[$i] == 'Filme') {
					$watched_movies_number++;
				}

				$i++;
			}

			$i = 0;
			$watched_videos_number = 0;
			while ($i <= count($current_year_watched_media_type_text) - 1) {
				if ($current_year_watched_media_type_text[$i] == 'Video' or $current_year_watched_media_type_text[$i] == 'Vídeo') {
					$watched_videos_number++;
				}

				$i++;
			}
		}

		# Media numbers array
		${"watched_media_numbers_".$current_year} = array(
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
	$media_type_movies_line = '0', #Movies
	$media_type_video_line = 2, #Videos
	);

	$media_type_text_file_lines_array_2019 = array(
	$media_type_anime_line = 7, #Animes
	$media_type_cartoons_line = 2, #Cartoons
	$media_type_series_line = 10, #Series
	$media_type_movies_line = 23, #Movies
	$media_type_video_line = '0', #Videos
	);

	$media_type_text_file_lines_array_2020 = array(
	$media_type_anime_line = 2, #Animes
	$media_type_cartoons_line = 62, #Cartoons
	$media_type_series_line = 16, #Series
	$media_type_movies_line = 84, #Movies
	$media_type_video_line = '0', #Videos
	);

	$media_type_text_file_lines_array_2021 = array(
	$media_type_anime_line = 2, #Animes
	$media_type_cartoons_line = 5, #Cartoons
	$media_type_series_line = 1, #Series
	$media_type_movies_line = 12, #Movies
	$media_type_video_line = '0', #Videos
	);

	if (file_exists($to_watch_episodes_file) == True) {
		$i = 0;
		$to_watch_items = 0;
		while ($i <= $to_watch_line_number - 1) {
			if (strpos ($to_watch_status_file_text[$i], $to_watch_string) == True) {
				$to_watch_items++;
			}

			$i++;
		}
	}

	$watched_media_numbers_current_year = ${"watched_media_numbers_".$current_year};

	$media_type_text_file_lines_arrays = array();

	$current_variable_year = 2018;
	while ($current_variable_year <= $current_year) {
		$media_type_text_file_lines_arrays[$current_variable_year] = ${"media_type_text_file_lines_array_".$current_variable_year};

		$current_variable_year++;
	}

	$every_year_watched_number_array = array();

	$current_variable_year = 2018;
	$current_year = $current_year;

	while ($current_variable_year <= $current_year) {
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

	$selected_media_type_array = $year_code_numbes_array[$current_year];
}

if ($website_name == $website_pequenata or $website_name == $website_nazzevo or $website_type == $story_website_type) {
	$story_folder = $notepad_stories_folder_variable.$story_name_folder.'/';
	$story_info_folder = $story_folder.'Story Info/';
	$story_comments_folder = $story_folder.'Comments/';
	$story_readers_and_reads_folder = $story_folder.'Readers and Reads/';

	# Story Synopsis, Readers, comments, readings,  and story date file paths
	$story_synopsis_file = $story_info_folder.'Synopsis.txt';
	$story_readers_file = $story_readers_and_reads_folder.'Readers.txt';
	$story_comments_file = $story_comments_folder.'Comments.txt';
	$story_comments_check_file = $story_comments_folder.'Check.txt';
	$story_creation_date_file = $story_info_folder.'Creation Date.txt';

	$chapter_number_file = $story_folder.'Chapter Number.txt'; 

	$titles_enus_file = $story_chapter_files_folder.strtoupper($enus_language).'/'.$titles_enus_text.'/'.$titles_enus_text.'.txt';

	# Language-dependent text files
	if (in_array($website_language, $en_languages_array)) {
		$titles_file = $story_chapter_files_folder_language.'/'.$titles_text.'/'.$titles_text.'.txt';
		$story_reads_file = $story_readers_and_reads_folder.'Reads'.'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$titles_file = $story_chapter_files_folder_language.'/'.$titles_text.'/'.$titles_text.'.txt';
		$story_reads_file = $story_readers_and_reads_folder.'Leituras'.'.txt';
	}

	# File line number counters
	if (file_exists($titles_file) == True) {
		$chapters = 0;
		$handle = fopen ($titles_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$chapters++;
		}
	}

	if (file_exists($story_comments_file) == True) {
		$story_comments_number = 0;
		$handle = fopen ($story_comments_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$story_comments_number++;
		}
	}

	/*$file = $story_comments_check_file;
	if (file_exists($file) == True) {
		${str_replace("file", "number", "$file")} = 0;
		$handle = fopen ($file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			${str_replace("file", "number", print_var_name($story_comments_check_file))}++;
			$newvar = ${str_replace("file", "number", print_var_name($story_comments_check_file))};
		}
	}*/

	
	$file = $story_comments_check_file;
	if (file_exists($file) == True) {
		$comments_check_number = 0;
		$handle = fopen ($file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$comments_check_number++;
		}
	}


	if (file_exists($story_readers_file) == True) {
		$readersnumb = 0;
		$handle = fopen ($story_readers_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$readersnumb++;
		}
	}

	if (file_exists($story_reads_file) == True) {
		$readsnumb = 0;
		$handle = fopen ($story_reads_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$readsnumb++;
		}
	}

	#File line number fixers
    if (isset($story_comments_number)) {
        $cmntsfile = $story_comments_number - 1;
        $cmntstxt = $story_comments_number;
    }

    if (isset($readersnumb)) {
        $readers_file_number = $readersnumb - 1;
        $readerstxt = $readersnumb;
    }

    if (isset($readsnumb)) {
        $readsfilenumb = $readsnumb - 1;
        $readsfiletxt = $readsnumb;
    }

	#File text readers
	if (file_exists($titles_file) == True) {
		$fp = fopen($titles_file, 'r', 'UTF-8'); 
		if ($fp) {
			$titlestxt = explode("\n", fread($fp, filesize($titles_file)));
			$chapter_titles = str_replace("^", "", $titlestxt);
		}
	}

	if (file_exists($titles_enus_file) == True) {
		$fp = fopen($titles_enus_file, 'r', 'UTF-8'); 
		if ($fp) {
			$titlesenustxt = explode("\n", fread($fp, filesize($titles_enus_file)));
			$titlesenus = str_replace("^", "", $titlesenustxt);
		}
	}

	if (file_exists($story_readers_file) == True) {
		$fp = fopen($story_readers_file, 'r', 'UTF-8'); 
		if ($fp) {
			$story_readers_file = explode("\n", fread($fp, filesize($story_readers_file)));
			$readers = str_replace("^", "", $story_readers_file);
		}
	}

	if (file_exists($story_comments_file) == True) {
		$fp = fopen($story_comments_file, 'r', 'UTF-8'); 
		if ($fp) {
			$commentsfilearray = explode("\n", fread($fp, filesize($story_comments_file)));
			$comments = str_replace("|", "", $commentsfilearray);
		}
	}

	if (file_exists($story_reads_file) == True) {
		$fp = fopen($story_reads_file, 'r', 'UTF-8'); 
		if ($fp) {
			$readsfilearray = explode("\n", fread($fp, filesize($story_reads_file)));
			$readstxt = str_replace("|", "", $readsfilearray);
		}
	}

	if (file_exists($story_creation_date_file) == True) {
		$fp = fopen($story_creation_date_file, 'r', 'UTF-8'); 
		if ($fp) {
			$story_namedatetext = explode("\n", fread($fp, filesize($story_creation_date_file)));
			$story_creation_date = str_replace("^", "", $story_namedatetext);
		}
	}

	$file = $story_synopsis_file;
	if (file_exists($file) == True) {
		$fp = fopen($file, 'r', 'UTF-8'); 
		if ($fp) {
			$story_synopsis = explode("\n", fread($fp, filesize($file)));
			$story_synopsis = str_replace("^", "", $story_synopsis);
		}
	}

	if (file_exists($story_synopsis_file)) {
		$story_synopsis = [];
		$file = $story_synopsis_file;

		if ($file = fopen($file, "r")) {
		while(!feof($file)) {
			$line = fgets($file);
			$line = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $line);

			array_push($story_synopsis, $line);
		}
			fclose($file);
		}
	}

	if ($website_name == $website_nazzevo) {
		if (file_exists($chapter_number_file) == True) {
			$fp = fopen($chapter_number_file, 'r', 'UTF-8'); 
			if ($fp) {
				$chapters_text = explode("\n", fread($fp, filesize($chapter_number_file)));
				$chapters = str_replace("^", "", $chapters_text);
			}
		}
	}

	if (file_exists($chapter_number_file) == True) {
		$fp = fopen($chapter_number_file, 'r', 'UTF-8');
		if ($fp) {
			$chapter_number_text = explode("\n", fread($fp, filesize($chapter_number_file)));
			$chapter_number = str_replace("^", "", $chapter_number_text);
		}
	}

	#File character replacers
    if (isset($titlesenus)) {
		$titlesenus = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $titlesenus);
    }

    if (isset($chapter_titles)) {
		$chapter_titles = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $chapter_titles);
    }

	if (isset($readers)) {
		$readers = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $readers);
	}

	if (isset($comments)) {
		$comments = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $comments);
	}

	if (isset($readstxt)) {
		$readstxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $readstxt);
	}

	if (isset($story_creation_date)) {
		$story_creation_date = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $story_creation_date);
	}

	if (isset($story_synopsis)) {
		$story_synopsis = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $story_synopsis);
	}

	if ($website_name == $website_nazzevo) {
		$chapters = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $chapters);
	}
}

if ($website_has_changelog_setting == True) {
	#Changelog text file definer
	if ($website_name == $website_watch_history) {
		if (in_array($website_language, $en_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$language_enus.'.php';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$language_ptbr.'.php';
		}
	}

	#Changelog text file definer
	else {
		if (in_array($website_language, $en_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$language_enus.'.txt';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$language_ptbr.'.txt';
		}
	}

	if (file_exists($website_changelog_file) == True) {
		#Changelog number counter
		$clnumber = 0;
		$handle = fopen ($website_changelog_file, "r");
		while (!feof ($handle)) {
			$line = fgets ($handle);
			$clnumber++;
		}
	
		#Changelog number
		$clfile = $clnumber - 1;
		$clfiletext = $clnumber;
	
		#Changelog file reader
		$clfilefp = fopen ($website_changelog_file, 'r', 'UTF-8');
		if ($clfilefp) {
			$clroot = explode("\n", fread($clfilefp, filesize($website_changelog_file)));
			$website_changelog_file_text = str_replace("^", "", $clroot);
		}
	}
}

?>