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
	$image_format = "jpg";

	$website_image = $website_media_images_website_icons.$website_image.".".$image_format;

	$website_image_size_computer = 30;
	$website_image_size_mobile = 77;
}

$website_image_link = $website_image;

$story_synopsis = Language_Item_Definer($story_synopsis_english, $story_synopsis_portuguese);

$website_meta_description = format(Language_Item_Definer("Website about my story, {}, made by Stake2, Funkysnipa Cat, Izaque.", "Site sobre a minha história, {}, feito por Stake2, Funkysnipa Cat, Izaque."), $story_name_variable);

$website_header_description = format($synopsis_text.': <i class="fas fa-scroll"></i> "{}'.'"<br />', $story_synopsis);

# Website name in English and Brazilian Portuguese language
$websites_names_array = array(
$title_enus = $story_name_variable,
$title_ptbr = $story_name_variable,
);

?>