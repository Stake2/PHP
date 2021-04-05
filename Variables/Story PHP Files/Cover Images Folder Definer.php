<?php

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
$cover_type = "Landscape";
$story_chapter_cover_folder = $cover_type.'/Chapter';
$story_book_cover_folder = $cover_type.'/Story';

$story_chapter_files_folder = $no_language_story_folder.'Chapters/';

$full_language = $full_languages_array[$language_number];

if ($website_language == $geral_language) {
	$website_language = $enus_language;

	$story_chapter_files_folder_language = $story_chapter_files_folder.$full_language.'/';

	if ($website_story_has_book_covers_setting == True) {
		$story_book_cover_folder = $cover_folder.$full_language.'/'.$story_book_cover_folder.'/';

		$story_chapter_covers_folder = $cover_folder.$story_chapter_cover_folder.'/';
	}

	$website_language = $geral_language;
}

else {
	if (in_array($website_language, $en_languages_array)) {
		$story_chapter_files_folder_language = $story_chapter_files_folder.$full_language.'/';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$story_chapter_files_folder_language = $story_chapter_files_folder.$full_language.'/';
	}

	if ($website_story_has_book_covers_setting == True) {
		$story_book_cover_folder = $cover_folder.$full_language.'/'.$story_book_cover_folder.'/';

		$story_chapter_covers_folder = $cover_folder.$story_chapter_cover_folder.'/';
	}
}

?>