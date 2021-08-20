<?php 

# Folder variables
$selected_website_url = $website_the_story_of_the_nazzevo_brothers_link;

$story_folder = $the_story_of_the_nazzevo_brothers_folder;
$story_name = $the_story_of_the_nazzevo_brothers_story_name;
$no_language_story_folder = $notepad_stories_folder_variable.$story_folder."/";
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php_variable;

# Story name definer
$story_name_variable = Language_Item_Definer($the_story_of_the_nazzevo_brothers_english_story_name, $the_story_of_the_nazzevo_brothers_story_name);
$english_story_name_variable = $the_story_of_the_nazzevo_brothers_english_story_name;
$general_story_name = $english_story_name_variable." Geral";

# Story name definer
$story_name_variable = $the_story_of_the_nazzevo_brothers_story_name;

# Story status
$story_status = $status_finished_and_publishing;

# Form code for the comment and read forms
$website_form_code = $english_story_name_variable;
$comments_number = 0;
$comments_number_text = $comments_number + 1;
$website_comments_number = 0;
$website_comments_number_to_show = $website_comments_number - 1;
$number_of_chapter_comments = $comments_number_text - $website_comments_number;
$readed_number = 1;
$author_name = $person_names_painted["Izaque"]." ".Create_Element("span", $text_brown_css_class, $and_text)." ".$person_names_painted["Lulu"];

# Text File Reader.php file includer
require $text_file_reader_file_php;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

# Reads the book cover image directory if the website has book covers
if ($website_story_has_book_covers_setting == True) {
	require $cover_images_generator_php_variable;
}

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = $general_story_name;
$website_title_header = $general_story_name.': '.$icons[11];
$website_link = $selected_website_url;

if ($website_language != $language_geral) {
	$website_title = $story_name_variable;
	$website_title_header = $website_title.': '.$icons[11];
	$website_link .= $website_link_language."/";
}

# Button names
$tab_texts = array(
$tab_names[0].': '.$icons_array["open book"],
$tab_names[1].': '.$icons_array["reader"]." ❤️",
$tab_names[2].': '.$icons_array["book"],
);

$variable_inserter_array = array(
$nazzevo_reference_1_chapter_1,
$zootopia_soundtrack_work_slowly_and_carry_a_big_shtick,
$a_name_nazzevo_reference_1_chapter_1,
$source_nazzevo_reference_1_chapter_1,
$nazzevo_reference_1_chapter_2,
$a_name_nazzevo_reference_1_chapter_2,
$nazzevo_reference_1_chapter_3,
$a_name_nazzevo_reference_1_chapter_3,
);

# Website Style.php File Includer
require $selected_website_style_file;

# Tab Generator.php includer
require $website_tabs_generator;

?>