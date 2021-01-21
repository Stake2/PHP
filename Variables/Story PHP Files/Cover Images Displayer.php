<?php

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
$sub_folder_text = 'Cover';

$story_chapter_files_folder = $no_language_story_folder.'Chapters/';

if ($website_language == $geral_language) {
	$website_language = $enus_language;

	$story_chapter_files_folder_language = $story_chapter_files_folder.strtoupper($website_language).'/';

	if ($website_story_has_bookcovers_setting == True) {
		$online_cover_folder = $cover_folder.strtoupper($website_language).'/';
		$local_cover_folder = $no_language_story_folder.'Foto/'.$single_cover_folder.strtoupper($website_language).'/';

		$online_cover_subfolder = $online_cover_folder.$sub_folder_text.'/';
		$local_cover_subfolder = $local_cover_folder.$sub_folder_text.'/';
	}

	$website_language = $geral_language;
}

else {
	if (in_array($website_language, $en_languages_array)) {
		$story_chapter_files_folder_language = $story_chapter_files_folder.strtoupper($website_language).'/';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$story_chapter_files_folder_language = $story_chapter_files_folder.strtoupper($ptbr_language).'/';
	}

	if ($website_story_has_bookcovers_setting == True) {
		if (in_array($website_language, $en_languages_array)) {
			$online_cover_folder = $cover_folder.strtoupper($website_language).'/';
			$local_cover_folder = $no_language_story_folder.'Foto/'.$single_cover_folder.strtoupper($website_language).'/';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$online_cover_folder = $cover_folder.strtoupper($ptbr_language).'/';
			$local_cover_folder = $no_language_story_folder.'Foto/'.$single_cover_folder.strtoupper($ptbr_language).'/';
		}

		$online_cover_subfolder = $online_cover_folder.$sub_folder_text.'/';
		$local_cover_subfolder = $local_cover_folder.$sub_folder_text.'/';
	}
}

?>