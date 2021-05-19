<?php 

# Defines the website image if the website has book covers or not
if ($website_story_has_book_covers_setting == True) {
	$story_book_cover_filename = 'Book Cover';

	$image_format = "png";

	$website_image = $story_book_cover_folder.$story_book_cover_filename.".".$image_format;
	$website_image_size_computer = 60;
	$website_image_size_mobile = 88;
}

else {
	$image_format = "jpg";

	$website_image = $cdnimg.$website_image.".".$image_format;

	$website_image_size_computer = 30;
	$website_image_size_mobile = 77;
}

$website_image_link = $website_image;

$story_synopsis = Language_Item_Definer($story_synopsis_english, $story_synopsis_portuguese);

$website_meta_description = format(Language_Item_Definer("Website about my story, {}, made by stake2.", "Site sobre a minha história, {}, feito por stake2."), $story_name_variable);

$website_header_description = format(Language_Item_Definer("Synopsis", "Sinopse").': <i class="fas fa-scroll"></i> "{}'.'"<br />', $story_synopsis);

# Website name in English and Brazilian Portuguese language
$websites_names_array = array(
$title_enus = $story_name_variable,
$title_ptbr = $story_name_variable,
);

?>