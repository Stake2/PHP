<?php

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
$cover_type = "Landscape";
$story_chapter_cover_folder = $cover_type.'/Chapter';
$story_book_cover_folder = $cover_type.'/Story';

$cover_folder = $website_media_images_story_covers.$story_folder."/";
$local_cover_folder = $mega_stories_folder.$story_folder."/";

$story_chapter_files_folder = $no_language_story_folder.'Chapters/';

if ($story_website_settings["has_custom_story_folder"] == True) {
	$story_chapter_files_folder = $local_chapters_folder;
}

Create_Folder($story_chapter_files_folder);

$story_chapter_files_folder_language = $story_chapter_files_folder."English/";

if ($story_website_settings["has_custom_story_folder"] == True) {
	$story_chapter_files_folder_language = $local_chapters_folder;
}

Create_Folder($story_chapter_files_folder_language);

$story_chapter_files_folder_language = $story_chapter_files_folder."Português Brasileiro/";

if ($story_website_settings["has_custom_story_folder"] == True) {
	$story_chapter_files_folder_language = $local_chapters_folder;
}

Create_Folder($story_chapter_files_folder_language);

$full_language = $full_languages_array[$language_number];

$story_chapter_files_folder_language = $story_chapter_files_folder;

if ($story_website_settings["has_custom_story_folder"] == False) {
	$story_chapter_files_folder_language .= $full_language.'/';
}

if ($story_website_settings["has_story_covers"] == True) {
	$story_book_cover_folder = $cover_folder.$full_language.'/'.$story_book_cover_folder.'/';

	$story_chapter_covers_folder = $cover_folder.$full_language.'/'.$story_chapter_cover_folder.'/';
	$local_story_chapter_covers_folder = $local_cover_folder.$full_language.'/'.$story_chapter_cover_folder.'/';
}

Create_Folder($story_chapter_files_folder_language);

?>