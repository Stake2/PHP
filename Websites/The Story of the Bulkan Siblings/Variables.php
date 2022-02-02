<?php 

# Story name definer
$local_website_name = "The Story of the Bulkan Siblings";
$website_story_name = $story_names[$local_website_name];
$english_story_name = $english_story_names[$local_website_name];
$portuguese_story_name = $portuguese_story_names[$english_story_name];
$general_story_name = $english_story_name." Geral";

# Folder variables
$story_folder = $english_story_name;
$no_language_story_folder = $mega_stories_folder.$story_folder."/";
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php;

# Story status
# Status of text file inside Story Info folder of Story folder
$story_status = $status_finished_and_publishing;

# Form code for the comment and read forms
$website_form_code = $english_story_name;
$comments_number = 0;
$comments_number_text = $comments_number + 1;
$website_comments_number = 0;
$website_comments_number_to_show = $website_comments_number - 1;
$number_of_chapter_comments = $comments_number_text - $website_comments_number;
$readed_number = 1;

# Text File Reader.php file includer
require $text_file_reader_file_php;

$chapters = $revised_chapter;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

# Reads the book cover image directory if the website has book covers
if ($story_website_settings["has_story_covers"] == True) {
	require $cover_images_generator_php;
}

# Button names
$tab_texts = array(
$tab_names[0].': '.$icons_array["open book"],
$tab_names[1].': '.$icons_array["reader"]." ❤️",
$tab_names[2].': '.$icons_array["book"],
);

$variable_inserter_array = array(
$bulkan_wikipedia_chapter_1_tulpa_link,
$bulkan_reference_1_chapter_1,
$zootopia_soundtrack_work_slowly_and_carry_a_big_shtick,
$a_name_bulkan_reference_1_chapter_1,
$source_bulkan_reference_1_chapter_1,
$bulkan_reference_1_chapter_3,
$a_name_bulkan_reference_1_chapter_3,
);

# Website name, title, URL and description setter, by language
$website_info["language_title"] = $general_story_name;
$website_info["website_folder_name"] = $website_info["english_title"];
$website_info["language_title_with_icon"] = $website_info["language_title"].": ".$icons[11];

if ($website_language != $language_geral) {
	$website_info["language_title"] = $website_story_name;
	$website_info["website_folder_name"] = $website_story_name;

	if ($website_language == $ptpt_language) {
		$website_info["language_title"] .= " ".$website_title_language;
	}

	$website_info["language_title_with_icon"] = $website_info["language_title"].": ".$icons[11];

	$website_info["link"] .= $website_info["language_hyphen"]."/";
}

?>