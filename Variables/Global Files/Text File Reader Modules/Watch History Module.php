<?php 

$watched_number_2018array = array(2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51);
$watched_number_2018timearray = array(1, 9, 10, 11, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 46, 47, 48, 49, 50, 51);
$watchedmovie2018numbarray = array(0, 1, 3, 33, 23, 81, 148, 164);
$watchedmovie2018timenumbarray = array(1, 4, 5, 6 , 7);
$watchedmovie2019numbarray = array(23, 81, 148, 164);
$watchedmovienumbarray = array(0, 1, 3, 33, 23, 81, 148, 164, 180);

$current_year_number = $year_code_numbes_array[$current_year];
$current_year_watched_number_file = $watched_number_filearray[$current_year_number];
$current_year_watched_episodes_text = $watchedtxtarray[$current_year_number];
$current_year_watched_time = $watchedtimearray[$current_year_number];
$current_year_watched_media_type = $watchedmediatypearray[$current_year_number];
$current_year_watched_media_type_file = $current_year_watched_media_type_file_array[$current_year_number];

if (file_exists($current_year_watched_media_type_file) == True) {
	$i = 0;
	$watched_animes_number = 0;
	if (count($current_year_watched_media_type) != 0) {
		while ($i <= $current_year_watched_number_file) {
			if ($current_year_watched_media_type[$i] == 'Anime') {
				$watched_animes_number++;
			}

			$i++;
		}
	}

	$i = 0;
	$watched_cartoons_number = 0;
	while ($i <= $current_year_watched_number_file) {
		if ($current_year_watched_media_type[$i] == 'Cartoon' or $current_year_watched_media_type[$i] == 'Desenho') {
			$watched_cartoons_number++;
		}

		$i++;
	}

	$i = 0;
	$watched_series_number = 0;
	while ($i <= $current_year_watched_number_file) {
		if ($current_year_watched_media_type[$i] == 'Series' or $current_year_watched_media_type[$i] == 'Série') {
			$watched_series_number++;
		}

		$i++;
	}

	$i = 0;
	$watched_movies_number = 0;
	while ($i <= $current_year_watched_number_file) {
		if ($current_year_watched_media_type[$i] == 'Movie' or $current_year_watched_media_type[$i] == 'Filme') {
			$watched_movies_number++;
		}

		$i++;
	}

	$i = 0;
	$watched_videos_number = 0;
	while ($i <= $current_year_watched_number_file) {
		if ($current_year_watched_media_type[$i] == 'Video' or $current_year_watched_media_type[$i] == 'Vídeo') {
			$watched_videos_number++;
		}

		$i++;
	}
}

# Media numbers array
$watched_media_numbers = array(
0 => $watched_animes_number, #Animes
1 => $watched_cartoons_number, #Cartoons
2 => $watched_series_number, #Series
3 => $watched_movies_number, #Movies
4 => $watched_videos_number, #Videos
);

if (file_exists($to_watch_episodes_file) == True) {
	$i = 0;
	$to_watch_items = 0;
	while ($i <= $to_watch_file_number) {
		if (strpos ($to_watch_status_file_text[$i], $to_watch_string) == True) {
			$to_watch_items++;
		}

		$i++;
	}
}

?>