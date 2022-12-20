<?php

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
$story_cover_folder = "Story";
$chapter_cover_folder = "Chapter";

$cover_folder = $website_media_images_story_covers.$website_information["english_title"]."/";
$local_cover_folder = $mega_stories_folder.$website_information["english_title"]."/Covers/";

$story_chapter_files_folder = $no_language_story_folder."Chapters/";

if ($story_website_settings["has_custom_story_folder"] == True) {
	$story_chapter_files_folder = $local_chapters_folder;
}

Create_Folder($story_chapter_files_folder);

$story_chapter_files_folder_language = $story_chapter_files_folder."English/";

if ($story_website_settings["has_custom_story_folder"] == True) {
	$story_chapter_files_folder_language = $local_chapters_folder;
}

Create_Folder($story_chapter_files_folder_language);

$story_chapter_files_folder_language = $story_chapter_files_folder."Português/";

if ($story_website_settings["has_custom_story_folder"] == True) {
	$story_chapter_files_folder_language = $local_chapters_folder;
}

Create_Folder($story_chapter_files_folder_language);

$story_chapter_files_folder_language = $story_chapter_files_folder;

if ($story_website_settings["has_custom_story_folder"] == False) {
	$story_chapter_files_folder_language .= $website_information["full_language"]."/";
}

if ($story_website_settings["has_story_covers"] == True) {
	$story_book_cover_folder = $cover_folder;
	$story_chapter_covers_folder = $cover_folder;
	$local_story_chapter_covers_folder = $local_cover_folder."Landscape/";

	if (isset($website_information["website_folder_name"]) == False) {
		$story_book_cover_folder .= $website_information["full_language"]."/";	
	}

	$local_story_chapter_covers_folder .= $website_information["full_language"]."/";
	$story_chapter_covers_folder .= $website_information["full_language"]."/";
}

Create_Folder($story_chapter_files_folder_language);

?>