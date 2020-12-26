<?php 

if ($website_uses_universal_file_reader == true) {
	$i = 0;
	foreach ($filenamesarray as $file) {
		$filesarray[$i] = $file;

		$i++;
	}

	#File text reader that makes an array of the text files
	$i = 0;
	foreach ($filesarray as $file) {
		if (file_exists($file) == true) {
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
		if (file_exists($file) == true) {
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

if ($website_name == $sitediario) {
	$diarionumbersfile = $used_folder.'Diário Numbers.txt';

	if (file_exists($diarionumbersfile) == true) {
		$diarionumbersfp = fopen($diarionumbersfile, 'r', 'UTF-8');
		if ($diarionumbersfp) {
			$blocksnumber = explode("\n", fread($diarionumbersfp, filesize($diarionumbersfile)));
		}
	}
}

if (in_array($website_name, $years_array)) {
	if (in_array($website_language, $en_languages_array)) {
		$year_2020_summary_file = $year_2020_text_folder.'My 2020.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$year_2020_summary_file = $year_2020_text_folder.'Meu 2020.txt';
	}

	$file = $year_2020_summary_file;
	if (file_exists($file) == true) {
		$read_file = fopen($file, 'r', 'UTF-8');
		if ($read_file) {
			$year_2020_summary_text = explode("\n", fread($read_file, filesize($file)));
			$year_2020_summary_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $year_2020_summary_text);
		}
	}
}

if ($website_name == $sitewatch or in_array($website_name, $years_array)) {
	$to_watch_episodes_file = $notepad_watch_history_folder.'To Watch Episodes.txt';
	$to_watch_status_file = $notepad_watch_history_folder.'To Watch Status.txt';
	$to_watch_folders_file = $notepad_watch_history_folder.'To Watch Folders.txt';
	$watched_movies_file = $notepad_watch_history_folder.'Watched Movies.txt';
	$watched_movies_time_file = $notepad_watch_history_folder.'Watched Movies Time.txt';

	if (in_array($website_language, $en_languages_array)) {
		$to_watch_media_type_file = $notepad_watch_history_folder.'To Watch MediaType '.strtoupper($enus_language).'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$to_watch_media_type_file = $notepad_watch_history_folder.'To Watch MediaType '.strtoupper($ptbr_language).'.txt';
	}

	if (file_exists($to_watch_episodes_file) == true) {
		$to_watch_line_number = 0;
		$handle = fopen ($to_watch_episodes_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$to_watch_line_number++;
		}
	}

	if (file_exists($to_watch_episodes_file) == true) {
		$file = fopen($to_watch_episodes_file, 'r', 'UTF-8');
		if ($file) {
			$to_watch_text = explode("\n", fread($file, filesize($to_watch_episodes_file)));
			$to_watch_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $to_watch_text);
		}
	}

	if (file_exists($to_watch_status_file) == true) {
		$file = fopen($to_watch_status_file, 'r', 'UTF-8');
		if ($file) {
			$to_watch_status_file_text = explode("\n", fread($file, filesize($to_watch_status_file)));
			$to_watch_status_file_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), " ", $to_watch_status_file_text);
		}
	}

	if (file_exists($to_watch_folders_file) == true) {
		$file = fopen($to_watch_folders_file, 'r', 'UTF-8');
		if ($file) {
			$to_watch_folders_text = explode("\n", fread($file, filesize($to_watch_folders_file)));
			$to_watch_folders_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $to_watch_folders_text);
		}
	}

	if (file_exists($to_watch_media_type_file) == true) {
		$file = fopen($to_watch_media_type_file, 'r', 'UTF-8');
		if ($file) {
			$to_watch_media_type_text = explode("\n", fread($file, filesize($to_watch_media_type_file)));
			$to_watch_media_type_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $to_watch_media_type_text);
		}
	}

	if (file_exists($watched_movies_file) == true) {
		$watched_movies_line_number = 0;
		$handle = fopen ($watched_movies_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$watched_movies_line_number++;
		}
	}

	if (file_exists($watched_movies_file) == true) {
		$file = fopen($watched_movies_file, 'r', 'UTF-8');
		if ($file) {
			$watched_movies_text = explode("\n", fread($file, filesize($watched_movies_file)));
			$watched_movies_text = str_replace(";", ":", $watched_movies_text);
			$watched_movies_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watched_movies_text);
		}
	}

	if (file_exists($watched_movies_time_file) == true) {
		$file = fopen($watched_movies_time_file, 'r', 'UTF-8'); 
		if ($file) {
			$watchedmoviestimearray = explode("\n", fread($file, filesize($watched_movies_time_file)));
			$watched_movies_time = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watched_movies_time);
		}
	}
}

if ($website_name == $sitewatch or in_array($website_name, $years_array)) {
	$current_year_watched_episodes_file = $notepad_watch_history_folder.$current_year.'/Watched '.$current_year.' Episodes.txt';
	$current_year_watched_time_file = $notepad_watch_history_folder.$current_year.'/Watched '.$current_year.' Time.txt';

	if (in_array($website_language, $en_languages_array)) {
		$current_year_watched_media_type_file = $notepad_watch_history_folder.$current_year.'/Watched '.$current_year.' MediaType '.strtoupper($enus_language).'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$current_year_watched_media_type_file = $notepad_watch_history_folder.$current_year.'/Watched '.$current_year.' MediaType '.strtoupper($ptbr_language).'.txt';
	}

	$file = $current_year_watched_episodes_file;
	if (file_exists($file) == true) {
		$current_year_watched_episodes_line_number = 0;
		$handle = fopen ($file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$current_year_watched_episodes_line_number++;
		}
	}

	$file = $current_year_watched_episodes_file;
	if (file_exists($file) == true) {
		$file = fopen($file, 'r', 'UTF-8');
		if ($file) {
			$current_year_watched_episodes_text = explode("\n", fread($file, filesize($file)));
			$current_year_watched_episodes_text = str_replace(";", ":", $current_year_watched_episodes_text);
			$current_year_watched_episodes_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $current_year_watched_episodes_text);
		}
	}

	$file = $current_year_watched_time_file;
	if (file_exists($file) == true) {
		$file = fopen($file, 'r', 'UTF-8');
		if ($file) {
			$current_year_watched_time_text = explode("\n", fread($file, filesize($file)));
			$current_year_watched_time_text = str_replace(";", ":", $current_year_watched_time_text);
			$current_year_watched_time_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $current_year_watched_time_text);
		}
	}

	$file = $current_year_watched_media_type_file;
	if (file_exists($file) == true) {
		$file = fopen($file, 'r', 'UTF-8');
		if ($file) {
			$current_year_watched_media_type_text = explode("\n", fread($file, filesize($file)));
			$current_year_watched_media_type_text = str_replace(";", ":", $current_year_watched_media_type_text);
			$current_year_watched_media_type_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $current_year_watched_media_type_text);
		}
	}
}

if ($website_name == $sitewatch or in_array($website_name, $years_array)) {
	require ($watch_history_text_file_reader_module);
}

if ($website_name == $sitepequenata or $website_name == $sitenazzevo or $sitetype1 == $website_types_array[1]) {
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

	if ($website_name == $sitenazzevo) {
		$chapter_number_file = $story_folder.'ChaptersNumber.txt'; 
	}

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
	if (file_exists($titles_file) == true) {
		$chapters = 0;
		$handle = fopen ($titles_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$chapters++;
		}
	}

	if (file_exists($story_comments_file) == true) {
		$story_comments_number = 0;
		$handle = fopen ($story_comments_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$story_comments_number++;
		}
	}

	/*$file = $story_comments_check_file;
	if (file_exists($file) == true) {
		${str_replace("file", "number", "$file")} = 0;
		$handle = fopen ($file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			${str_replace("file", "number", print_var_name($story_comments_check_file))}++;
			$newvar = ${str_replace("file", "number", print_var_name($story_comments_check_file))};
		}
	}*/

	
	$file = $story_comments_check_file;
	if (file_exists($file) == true) {
		$comments_check_number = 0;
		$handle = fopen ($file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$comments_check_number++;
		}
	}


	if (file_exists($story_readers_file) == true) {
		$readersnumb = 0;
		$handle = fopen ($story_readers_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$readersnumb++;
		}
	}

	if (file_exists($story_reads_file) == true) {
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
	if (file_exists($titles_file) == true) {
		$fp = fopen($titles_file, 'r', 'UTF-8'); 
		if ($fp) {
			$titlestxt = explode("\n", fread($fp, filesize($titles_file)));
			$chapter_titles = str_replace("^", "", $titlestxt);
		}
	}

	if (file_exists($titles_enus_file) == true) {
		$fp = fopen($titles_enus_file, 'r', 'UTF-8'); 
		if ($fp) {
			$titlesenustxt = explode("\n", fread($fp, filesize($titles_enus_file)));
			$titlesenus = str_replace("^", "", $titlesenustxt);
		}
	}

	if (file_exists($story_readers_file) == true) {
		$fp = fopen($story_readers_file, 'r', 'UTF-8'); 
		if ($fp) {
			$story_readers_file = explode("\n", fread($fp, filesize($story_readers_file)));
			$readers = str_replace("^", "", $story_readers_file);
		}
	}

	if (file_exists($story_comments_file) == true) {
		$fp = fopen($story_comments_file, 'r', 'UTF-8'); 
		if ($fp) {
			$commentsfilearray = explode("\n", fread($fp, filesize($story_comments_file)));
			$comments = str_replace("|", "", $commentsfilearray);
		}
	}

	if (file_exists($story_reads_file) == true) {
		$fp = fopen($story_reads_file, 'r', 'UTF-8'); 
		if ($fp) {
			$readsfilearray = explode("\n", fread($fp, filesize($story_reads_file)));
			$readstxt = str_replace("|", "", $readsfilearray);
		}
	}

	if (file_exists($story_creation_date_file) == true) {
		$fp = fopen($story_creation_date_file, 'r', 'UTF-8'); 
		if ($fp) {
			$story_namedatetext = explode("\n", fread($fp, filesize($story_creation_date_file)));
			$story_namedate = str_replace("^", "", $story_namedatetext);
		}
	}

	if (file_exists($story_synopsis_file) == true) {
		$fp = fopen($story_synopsis_file, 'r', 'UTF-8'); 
		if ($fp) {
			$synopsistext = explode("\n", fread($fp, filesize($story_synopsis_file)));
			$story_synopsis = str_replace("^", "", $synopsistext);
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

	if ($website_name == $sitenazzevo) {
		if (file_exists($chapter_number_file) == true) {
			$fp = fopen($chapter_number_file, 'r', 'UTF-8'); 
			if ($fp) {
				$chapterstext = explode("\n", fread($fp, filesize($chapter_number_file)));
				$chapters = str_replace("^", "", $chapterstext);
			}
		}
	}

	if (file_exists($chapter_number_file) == true) {
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

	if (isset($story_namedate)) {
		$story_namedate = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $story_namedate);
	}

	if (isset($story_synopsis)) {
		$story_synopsis = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $story_synopsis);
	}

	if ($website_name == $sitenazzevo) {
		$chapters = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $chapters);
	}
}

if ($website_has_changelog_setting == true) {
	#Changelog text file definer
	if ($website_name == $sitewatch) {
		if (in_array($website_language, $en_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$languages_array[1].'.php';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$languages_array[2].'.php';
		}
	}

	#Changelog text file definer
	else {
		if (in_array($website_language, $en_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$languages_array[1].'.txt';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$languages_array[2].'.txt';
		}
	}

	if (file_exists($website_changelog_file) == true) {
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