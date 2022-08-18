<?php 

if (isset($no_language_story_folder) == False) {
	$no_language_story_folder = $mega_stories_folder.$english_story_name."/";
}

$website_images_folder = $website_media_images_website_images.$english_story_name."/";

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php;

$website_comments_folder = $story_folder.$website_comments_english_folder_text;
$story_chapter_comments_folder = $story_folder.$chapter_comments_english_folder_text;

# Defines the website image if the website has book covers or not
if ($story_website_settings["has_story_covers"] == True) {
	$story_book_cover_filename = "Book Cover";

	if (isset($website_info["image_format"]) == False) {
		$website_info["image_format"] = "png";
	}

	$website_image = $story_book_cover_folder.$story_book_cover_filename.".".$website_info["image_format"];
	$website_image_size_computer = 60;
	$website_image_size_mobile = 88;
}

else {
	if (isset($website_info["image_format"]) == False) {
		$website_info["image_format"] = "jpg";
	}

	$website_image = $website_media_images_website_icons.$website_info["english_title"].".".$website_info["image_format"];

	$website_image_size_computer = 30;
	$website_image_size_mobile = 77;
}

$website_info["image_link"] = $website_image;

$story_synopsis = Language_Item_Definer($story_synopsis_english, $story_synopsis_portuguese);

if (isset($custom_website_descriptions) == True) {
	$website_info["meta_description"] = $website_descriptions[$language_number];
	$website_info["header_description"] = $website_descriptions[$language_number];

	if ($website_info["english_title"] == $website_titles["Diary"] and isset($diary_blocks_explaining_text) == True) {
		$website_info["header_description"] .= $diary_blocks_explaining_text;
	}
}

if (isset($custom_website_descriptions) == False) {
	$website_info["meta_description"] = format(Language_Item_Definer("Website about my story, {}, made by Stake2, Funkysnipa Cat, Izaque.", "Site sobre a minha história, {}, feito por Stake2, Funkysnipa Cat, Izaque."), $website_story_name);

	$website_info["header_description"] = format($synopsis_text.': <i class="fas fa-scroll"></i> "{}"<br />', $story_synopsis);

	if ($website_info["english_title"] == $website_titles["Diary"] and isset($diary_blocks_explaining_text) == True) {
		$website_info["header_description"] .= $diary_blocks_explaining_text;
	}
}

# Website name in English and Brazilian Portuguese language
$websites_names_array = array(
	$title_en = $website_story_name,
	$title_pt = $website_story_name,
);

if ($story_website_settings["has_story_covers"] == True) {
	require $cover_images_generator_php;
}

?>