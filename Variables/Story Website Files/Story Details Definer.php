<?php 

$website_comments_folder = $story_folder.$website_comments_english_folder_text;
$story_chapter_comments_folder = $story_folder.$chapter_comments_english_folder_text;

# Defines the website image if the website has book covers or not
if ($website_story_has_book_covers_setting == True) {
	$story_book_cover_filename = 'Book Cover';

	if (isset($image_format) == False) {
		$image_format = "png";
	}

	$website_image = $story_book_cover_folder.$story_book_cover_filename.".".$image_format;
	$website_image_size_computer = 60;
	$website_image_size_mobile = 88;
}

else {
	if (isset($image_format) == False) {
		$image_format = "jpg";
	}

	$website_image = $website_media_images_website_icons.$website_image.".".$image_format;

	$website_image_size_computer = 30;
	$website_image_size_mobile = 77;
}

$website_image_link = $website_image;

$story_synopsis = Language_Item_Definer($story_synopsis_english, $story_synopsis_portuguese);

if (isset($custom_website_descriptions) == True) {
	$website_meta_description = $website_meta_descriptions[$language_number];
	$website_header_description = $website_header_descriptions[$language_number];

	if ($website_title == $website_titles["Diary"] and isset($diary_blocks_explaining_text) == True) {
		$website_header_description .= $diary_blocks_explaining_text;
	}
}

if (isset($custom_website_descriptions) == False) {
	$website_meta_description = format(Language_Item_Definer("Website about my story, {}, made by Stake2, Funkysnipa Cat, Izaque.", "Site sobre a minha história, {}, feito por Stake2, Funkysnipa Cat, Izaque."), $website_story_name);

	$website_header_description = format($synopsis_text.': <i class="fas fa-scroll"></i> "{}'.'"<br />', $story_synopsis);

	if ($website_title == $website_titles["Diary"] and isset($diary_blocks_explaining_text) == True) {
		$website_header_description .= $diary_blocks_explaining_text;
	}
}

$website_link = $story_website_links[$english_story_name].Language_Item_Definer_Per_Language("en-us/", "pt-br/", "pt-pt/", $general_item = "");

# Website name in English and Brazilian Portuguese language
$websites_names_array = array(
$title_enus = $website_story_name,
$title_ptbr = $website_story_name,
);

?>