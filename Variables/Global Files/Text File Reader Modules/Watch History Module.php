<?php 

#Files definer for Watch.php and Years websites
$watched_episodes_2018_file = $notepad_watch_history_folder.$site2018.'/Watched '.$site2018.' Episodes.txt';
$watched_time_2018_file = $notepad_watch_history_folder.$site2018.'/Watched '.$site2018.' Time.txt';

if (in_array($website_language, $en_languages_array)) {
	$watched_media_type_2018_file = $notepad_watch_history_folder.$site2018.'/Watched '.$site2018.' MediaType '.strtoupper($enus_language).'.txt';
}

if (in_array($website_language, $pt_languages_array)) {
	$watched_media_type_2018_file = $notepad_watch_history_folder.$site2018.'/Watched '.$site2018.' MediaType '.strtoupper($ptbr_language).'.txt';
}

$watched_episodes_2019_file = $notepad_watch_history_folder.$site2019.'/Watched '.$site2019.' Episodes.txt';
$watched_time_2019_file = $notepad_watch_history_folder.$site2019.'/Watched '.$site2019.' Time.txt';

if (in_array($website_language, $en_languages_array)) {
	$watched_media_type_2019_file = $notepad_watch_history_folder.$site2019.'/Watched '.$site2019.' MediaType '.strtoupper($enus_language).'.txt';
}

if (in_array($website_language, $pt_languages_array)) {
	$watched_media_type_2019_file = $notepad_watch_history_folder.$site2019.'/Watched '.$site2019.' MediaType '.strtoupper($ptbr_language).'.txt';
}

$watched_episodes_2020_file = $notepad_watch_history_folder.$site2020.'/Watched '.$site2020.' Episodes.txt';
$watched_time_2020_file = $notepad_watch_history_folder.$site2020.'/Watched '.$site2020.' Time.txt';

if (in_array($website_language, $en_languages_array)) {
	$watched_media_type_2020_file = $notepad_watch_history_folder.$site2020.'/Watched '.$site2020.' MediaType '.strtoupper($enus_language).'.txt';
}

if (in_array($website_language, $pt_languages_array)) {
	$watched_media_type_2020_file = $notepad_watch_history_folder.$site2020.'/Watched '.$site2020.' MediaType '.strtoupper($ptbr_language).'.txt';
}

$current_year_watched_media_type_file_array = array(
$watched_media_type_2018_file,
$watched_media_type_2019_file,
$watched_media_type_2020_file,
);

if (file_exists($watched_episodes_2020_file) == true) {
	$watched_episodes_2020_line_number = 0;
	$handle = fopen ($watched_episodes_2020_file, "r");
	while (!feof ($handle)){
		$line = fgets ($handle);
		$watched_episodes_2020_line_number++;
	}
}

if (file_exists($watched_episodes_2019_file) == true) {
	$watched_episodes_2019_line_number = 0;
	$handle = fopen ($watched_episodes_2019_file, "r");
	while (!feof ($handle)){
		$line = fgets ($handle);
		$watched_episodes_2019_line_number++;
	}
}

if (file_exists($watched_episodes_2018_file) == true) {
	$watched_episodes_2018_line_number = 0;
	$handle = fopen ($watched_episodes_2018_file, "r");
	while (!feof ($handle)){
		$line = fgets ($handle);
		$watched_episodes_2018_line_number++;
	}
}

if (file_exists($watched_episodes_2020_file) == true) {
	$watched2020fp = fopen($watched_episodes_2020_file, 'r', 'UTF-8');
	if ($watched2020fp) {
		$watched2020textroot = explode("\n", fread($watched2020fp, filesize($watched_episodes_2020_file)));
		$watched2020textarray = str_replace(";", ":", $watched2020textroot);
	}
}

if (file_exists($watched_media_type_2018_file) == true) {
	$watched2018mediatypefp  = fopen($watched_media_type_2018_file, 'r', 'UTF-8');
	if ($watched2018mediatypefp) {
		$watched2018mediatypearray = explode("\n", fread($watched2018mediatypefp, filesize($watched_media_type_2018_file)));
		$watched2018mediatypetxt = str_replace("^", "", $watched2018mediatypearray);
		$watched2018mediatypetxt = str_replace("\n", "", $watched2018mediatypetxt);
	}
}	

if (file_exists($watched_time_2018_file) == true) {
	$watched2018fp = fopen($watched_time_2018_file, 'r', 'UTF-8');
	if ($watched2018fp) {
		$watched2018timeroot = explode("\n", fread($watched2018fp, filesize($watched_time_2018_file)));
		$watched2018time = str_replace(";", ":", $watched2018timeroot);
		$watched2018time = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watched2018time);
	}
}

if (file_exists($watched_episodes_2018_file) == true) {
	$watched2018fp = fopen($watched_episodes_2018_file, 'r', 'UTF-8');
	if ($watched2018fp) {
		$watched2018textroot = explode("\n", fread($watched2018fp, filesize($watched_episodes_2018_file)));
		$watched2018txt = str_replace(";", ":", $watched2018textroot);
		$watched2018txt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watched2018txt);
	}
}

if (file_exists($watched_media_type_2019_file) == true) {
	$watched2019mediatypefp  = fopen($watched_media_type_2019_file, 'r', 'UTF-8');
	if ($watched2019mediatypefp) {
		$watched2019mediatypearray = explode("\n", fread($watched2019mediatypefp, filesize($watched_media_type_2019_file)));
		$watched2019mediatypetxt = str_replace("^", "", $watched2019mediatypearray);
		$watched2019mediatypetxt = str_replace("\n", "", $watched2019mediatypetxt);
	}
}

if (file_exists($watched_time_2019_file) == true) {
	$watched2019fp = fopen($watched_time_2019_file, 'r', 'UTF-8');
	if ($watched2019fp) {
		$watched2019timeroot = explode("\n", fread($watched2019fp, filesize($watched_time_2019_file)));
		$watched2019time = str_replace("^", "", $watched2019timeroot);
		$watched2019time = str_replace("\n", "", $watched2019time);
	}
}

if (file_exists($watched_episodes_2019_file) == true) {
	$watched2019fp = fopen($watched_episodes_2019_file, 'r', 'UTF-8');
	if ($watched2019fp) {
		$watched2019textroot = explode("\n", fread($watched2019fp, filesize($watched_episodes_2019_file)));
		$watched2019txt = str_replace(";", ":", $watched2019textroot);
		$watched2019txt = str_replace("\n", "", $watched2019txt);
	}
}

if (file_exists($watched_media_type_2020_file) == true) {
	$watched2020mediatypefp = fopen($watched_media_type_2020_file, 'r', 'UTF-8');
	if ($watched2020mediatypefp) {
		$watched2020mediatypearray = explode("\n", fread($watched2020mediatypefp, filesize($watched_media_type_2020_file)));
		$watched2020mediatypetxt = str_replace("^", "", $watched2020mediatypearray);
		$watched2020mediatypetxt = str_replace("\n", "", $watched2020mediatypetxt);
	}
}

if (file_exists($watched_time_2020_file) == true) {
	$watched2020fp = fopen($watched_time_2020_file, 'r', 'UTF-8'); 
	if ($watched2020fp) {
		$watched2020timearray = explode("\n", fread($watched2020fp, filesize($watched_time_2020_file)));
		$watched2020time = str_replace("^", "", $watched2020timearray);
		$watched2020time = str_replace("\n", "", $watched2020time);
	}
}

if (file_exists($watched_episodes_2020_file) == true) {
	$watched2020fp = fopen($watched_episodes_2020_file, 'r', 'UTF-8'); 
	if ($watched2020fp) {
		$watched2020txt = str_replace("^", "", $watched2020textarray);
		$watched2020txt = str_replace("\n", "", $watched2020txt);
	}
}

$watchedtxtarray = array(
$watched2018txt = str_replace(array("\r\n", "\r", "\n"), "", $watched2018txt),
$watched2019txt = str_replace(array("\r\n", "\r", "\n"), "", $watched2019txt),
$watched2020txt = str_replace(array("\r\n", "\r", "\n"), "", $watched2020txt),
);

$watchedtimearray = array(
$watched2018time = str_replace(array("\r\n", "\r", "\n"), "", $watched2018time),
$watched2019time = str_replace(array("\r\n", "\r", "\n"), "", $watched2019time),
$watched2020time = str_replace(array("\r\n", "\r", "\n"), "", $watched2020time),
);

$watchedmediatypearray = array(
$watched2018mediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $watched2018mediatypetxt),
$watched2019mediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $watched2019mediatypetxt),
$watched2020mediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $watched2020mediatypetxt),
);

$watchednumb2018filetext = $watched_episodes_2018_line_number;
$watchednumb2018 = $watchednumb2018filetext;

$watchednumb2019filetext = $watched_episodes_2019_line_number;
$watchednumb2019 = $watchednumb2019filetext;

$watchednumb2020filetext = $watched_episodes_2020_line_number;
$watchednumb2020 = $watchednumb2020filetext;

$watchednumbfilearray = array(
$watchednumb2018file = $watched_episodes_2018_line_number - 1,
$watchednumb2019file = $watched_episodes_2019_line_number - 1,
$watchednumb2020file = $watched_episodes_2020_line_number - 1,
);

$to_watch_file_number = $to_watch_line_number - 1;
$twnumbfiletxt = $to_watch_line_number;
$towatchnumb = $twnumbfiletxt;
$watchedmoviesnumbfile = $watched_movies_line_number - 1;
$watchedmoviesnumbfiletext = $watched_movies_line_number;
$watched_movies_number = $watchedmoviesnumbfiletext;
$archnumb = 2;
$linksnumb = 6;
$watchednumbtxt = $watchednumb2020filetext;
$everywatchednumb = $watchednumb2020filetext + $watchednumb2019filetext + $watchednumb2018filetext;

$watchednumb2018array = array(2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51);
$watchednumb2018timearray = array(1, 9, 10, 11, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 46, 47, 48, 49, 50, 51);
$watchedmovie2018numbarray = array(0, 1, 3, 33, 23, 81, 148, 164);
$watchedmovie2018timenumbarray = array(1, 4, 5, 6 , 7);
$watchedmovie2019numbarray = array(23, 81, 148, 164);
$watchedmovienumbarray = array(0, 1, 3, 33, 23, 81, 148, 164, 180);
$watchedmovietimenumbarray = array(1, 4, 5, 6, 7, 8, 9, 10);
$watchedmoviecommentarray = array(1, 4, 5, 6, 7, 8);

if ($current_year == 2018) {
	#Media lines array
	$media_type_text_file_lines_array = array(
	$media_type_movies_line = 1, #Movies
	$media_type_series_line = 14, #Series
	$media_type_cartoons_line = 3, #Cartoons
	$media_type_anime_line = '0', #Animes
	$media_type_video_line = 2, #Videos
	);
}

if ($current_year == 2019) {
	#Media lines array
	$media_type_text_file_lines_array = array(
	$media_type_movies_line = 23, #Movies
	$media_type_series_line = 10, #Series
	$media_type_cartoons_line = 2, #Cartoons
	$media_type_anime_line = 7, #Animes
	$media_type_video_line = '0', #Videos
	);
}

if ($current_year == 2020) {
	#Media lines array
	$media_type_text_file_lines_array = array(
	$media_type_anime_line = 2, #Animes
	$media_type_cartoons_line = 62, #Cartoons
	$media_type_series_line = 16, #Series
	$media_type_movies_line = 84, #Movies
	$media_type_video_line = '0', #Videos
	);
}

$current_year_number = $year_code_numbes_array[$current_year];
$current_year_watched_number_file = $watchednumbfilearray[$current_year_number];
$current_year_watched_episodes_text = $watchedtxtarray[$current_year_number];
$current_year_watched_time = $watchedtimearray[$current_year_number];
$current_year_watched_media_type = $watchedmediatypearray[$current_year_number];
$current_year_watched_media_type_file = $current_year_watched_media_type_file_array[$current_year_number];

if (file_exists($current_year_watched_media_type_file) == true) {
	$i = 0;
	$watched_animes_number = 0;
	while ($i <= $current_year_watched_number_file) {
		if ($current_year_watched_media_type[$i] == 'Anime') {
			$watched_animes_number++;
		}

		$i++;
	}

	$i = 0;
	$watched_cartoons_number = 0;
	while ($i <= $current_year_watched_number_file) {
		if ($current_year_watched_media_type[$i] == 'Cartoon' or $current_year_watched_media_type[$i] == 'Desenho' or $current_year_watched_media_type[$i] == 'Cartoon^') {
			$watched_cartoons_number++;
		}

		$i++;
	}

	$i = 0;
	$watched_series_number = 0;
	while ($i <= $current_year_watched_number_file) {
		if ($current_year_watched_media_type[$i] == 'Series' or $current_year_watched_media_type[$i] == 'Série' or $current_year_watched_media_type[$i] == 'Série^') {
			$watched_series_number++;
		}

		$i++;
	}

	$i = 0;
	$watched_movies_number = 0;
	while ($i <= $current_year_watched_number_file) {
		if ($current_year_watched_media_type[$i] == 'Movie' or $current_year_watched_media_type[$i] == 'Filme' or $current_year_watched_media_type[$i] == 'Movie^' or $current_year_watched_media_type[$i] == 'Filme^') {
			$watched_movies_number++;
		}

		$i++;
	}

	$i = 0;
	$watched_videos_number = 0;
	while ($i <= $current_year_watched_number_file) {
		if ($current_year_watched_media_type[$i] == 'Video' or $current_year_watched_media_type[$i] == 'Vídeo' or $current_year_watched_media_type[$i] == 'Video^' or $current_year_watched_media_type[$i] == 'Vídeo^') {
			$watched_videos_number++;
		}

		$i++;
	}
}

# Media numbers array
$watched_media_numbers = array(
$watched_animes_number, #Animes
$watched_cartoons_number, #Cartoons
$watched_series_number, #Series
$watched_movies_number, #Movies
$watched_videos_number, #Videos
);

if (file_exists($to_watch_episodes_file) == true) {
	$i = 0;
	$to_watch_items = 0;
	while ($i <= $to_watch_file_number) {
		if (strpos ($to_watch_status_file_text[$i], $to_watch_string) == true) {
			$to_watch_items++;
		}

		$i++;
	}
}

?>