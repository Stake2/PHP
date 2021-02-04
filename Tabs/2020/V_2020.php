<?php 

# Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_folder = $php_tabs.ucwords($selected_website).'/';
$website_style_file = $selected_website_folder.'Website Style.php';

$yeartabcode = array(
$year_websites_links[0],
$year_websites_links[1],
$year_websites_links[2],
);

$yeartabtxt = array(
$years_array[0],
$years_array[1],
$years_array[2],
);

$text_to_find = "/, /i";
$find_array = preg_split($text_to_find, $year_stuff_file_text);

$has_stuff_array = array(
$new_stories_text_key => $has_new_stories = $find_array[0],
$story_progress_text_key => $has_story_progress = $find_array[1],
$new_websites_text_key => $has_new_websites = $find_array[2],
);

$has_stuff_string_array = array(
$new_stories_text_key,
$story_progress_text_key,
$new_websites_text_key,
);

$has_stuff_array_keys = array_keys($has_stuff_array);

$i = 0;
foreach ($has_stuff_array as $stuff) {
	if ($stuff == "True") {
		${"$has_stuff_array_keys[$i]"."_switch"} = True;
		$has_stuff_array[$has_stuff_string_array[$i]] = ${"$has_stuff_array_keys[$i]"."_switch"} = True;
	}

	if ($stuff == "False") {
		${"$has_stuff_array_keys[$i]"."_switch"} = False;
		$has_stuff_array[$has_stuff_string_array[$i]] = ${"$has_stuff_array_keys[$i]"."_switch"} = False;
	}

	$i++;
}

$creation_date = str_replace(["Creation date: ", "Data de criação: "], "", $year_summary_file_text[1]);

$edit_date = str_replace(["Edit date: ", "Data de edição: "], "", $year_summary_file_text[2]);

if (in_array($website_language, $en_languages_array)) {
	$text_to_find = "/Things made in [0-9][0-9][0-9][0-9]: /i";
	$things_made_in_current_year = preg_split($text_to_find, $year_summary_file_text[6]);

	$text_to_find = "/along with comments and people met/i";
	$things_made_in_current_year = preg_split($text_to_find, $things_made_in_current_year[1]);
	$things_made_in_current_year = $things_made_in_current_year[0];

	$text_to_find = "/ \(/i";
	$things_made_in_current_year = preg_split($text_to_find, $things_made_in_current_year);
	$things_made_in_current_year = str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />"], "", $things_made_in_current_year);

	$things_made_in_current_year_expanded = (int)str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />", "(", ")", " along with comments and people met"], "", $year_summary_file_text[7]);

	$things_made_in_current_year = (int)str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />"], "", $things_made_in_current_year[0]);

	$i = 0;
	while ($i <= count($year_summary_file_text) - 1) {
		if (strpos($year_summary_file_text[$i], "omments on the Super Animes website") == True) {
			$number = $i;
		}

		$i++;
	}

	$text_to_find = "/Comments on the Super Animes website: /i";
	$comments_on_superanimes = preg_split($text_to_find, $year_summary_file_text[$number]);

	$text_to_find = "/[0-9][0-9][0-9] \(/i";
	$comments_on_superanimes_last_comment = preg_split($text_to_find, $comments_on_superanimes[1]);

	$text_to_find = "/#/i";
	$comments_on_superanimes_last_comment = str_replace(")", "", preg_split($text_to_find, $comments_on_superanimes_last_comment[1])[1]);

	$text_to_find = "/ \([^()]+\)/i";
	$comments_on_superanimes_number = preg_split($text_to_find, $comments_on_superanimes[1])[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$text_to_find = "/Coisas feitas em [0-9][0-9][0-9][0-9]: /i";
	$things_made_in_current_year = preg_split($text_to_find, $year_summary_file_text[6]);

	$text_to_find = "/junto com comentários e pessoas conhecidas/i";
	$things_made_in_current_year = preg_split($text_to_find, $things_made_in_current_year[1]);
	$things_made_in_current_year = $things_made_in_current_year[0];

	$text_to_find = "/ \(/i";
	$things_made_in_current_year = str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />"], "", $things_made_in_current_year);

	$things_made_in_current_year_expanded = (int)str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />", "(", ")", " junto com comentários e pessoas conhecidas"], "", $year_summary_file_text[7]);

	$things_made_in_current_year = (int)str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />"], "", $things_made_in_current_year[0]);

	$i = 0;
	while ($i <= count($year_summary_file_text) - 1) {
		if (strpos($year_summary_file_text[$i], "omentários no website Super Animes") == True) {
			$number = $i;
		}

		$i++;
	}

	$text_to_find = "/Comentários no website Super Animes: /i";
	$comments_on_superanimes = preg_split($text_to_find, $year_summary_file_text[$number]);

	$text_to_find = "/[0-9][0-9][0-9] \(/i";
	$comments_on_superanimes_last_comment = preg_split($text_to_find, $comments_on_superanimes[1]);

	$text_to_find = "/#/i";
	$comments_on_superanimes_last_comment = str_replace(")", "", preg_split($text_to_find, $comments_on_superanimes_last_comment[1])[1]);

	$text_to_find = "/ \([^()]+\)/i";
	$comments_on_superanimes_number = preg_split($text_to_find, $comments_on_superanimes[1])[0];
}

$thingsnumb = $things_made_in_current_year;

$i = 9;
$productive_things_number = (int)str_replace(["Productive things: ", "Coisas produtivas: "], "", $year_summary_file_text[$i]);
$i++;

$watched_things_number = (int)str_replace(["Watched things: ", "Coisas assistidas: "], "", $year_summary_file_text[$i]);
$i++;

if ($new_stories_switch == True) {
	$new_stories_number = (int)str_replace(["New stories: ", "Novas histórias: "], "", $year_summary_file_text[$i]);
	$i++;
}

if ($story_progress_switch == True) {
	$story_progress_number = (int)str_replace(["Story progress: ", "Progresso das histórias: "], "", $year_summary_file_text[$i]);
	$i++;
}

if ($new_websites_switch == True) {
	$new_websites_number = (int)str_replace(["New websites: ", "Novos sites: "], "", $year_summary_file_text[$i]);
	$i++;
}

$people_that_i_met_number = (int)str_replace(["People that I have met: ", "Pessoas que conheci: "], "", $year_summary_file_text[$i]);
$i++;

$year_creation_and_edit_dates = array(
$creation_date,
$edit_date,
);

$year_numbers = array(
$things_made_in_current_year_text_key => $things_made_in_current_year,
$productive_things_key => $productive_things_number,
$watched_things_text_key => $watched_things_number,
);

if ($new_stories_switch == True) {
	$year_numbers[$new_stories_text_key] = $new_stories_number;
}

if ($story_progress_switch == True) {
	$year_numbers[$story_progress_text_key] = $story_progress_number;
}

if ($new_websites_switch == True) {
	$year_numbers[$new_websites_text_key] = $new_websites_number;
}

$year_numbers[$people_text_i_met_text_key] = $people_that_i_met_number;
$year_numbers[$comments_on_super_animes_key] = $comments_on_superanimes_number;

$year_numbers_keys = array_keys($year_numbers);

$year_number_texts = array(
$things_made_in_current_year_text_key => $things_made_in_current_year_text,
$productive_things_key => $productive_things_text,
$watched_things_text_key => $watched_things_text,
);

if ($new_stories_switch == True) {
	$year_number_texts[$new_stories_text_key] = $new_stories_text;
}

if ($story_progress_switch == True) {
	$year_number_texts[$story_progress_text_key] = $story_progress_text;
}

if ($new_websites_switch == True) {
	$year_number_texts[$new_websites_text_key] = $new_websites_text;
}

$year_number_texts[$people_text_i_met_text_key] = $people_text_i_met_text;
$year_number_texts[$comments_on_super_animes_key] = $comments_on_super_animes_text;

$citiestxts = array(
$langreadtext.': '.$siteicon,
$tabnames[1].': '.$icons[0],
$tabnames[2].': '.$icons[1],
$tabnames[3].': '.$icons[2],
$tabnames[4].': '.$icons[3],
);

#Previous year button
$last_year_button_computer = '<button class="w3-btn '.$first_button_style.'" onclick="window.open('."'".$main_website_url."years/".$current_yearanterior."/'".')"><'.$n.'>'.$current_yearanterior.': <i class="fas fa-globe-americas"></i></'.$n.'></button>';

#Mobile previous year button
$last_year_button_mobile = '<button class="w3-btn '.$first_button_style.'" onclick="window.open('."'".$main_website_url."years/".$current_yearanterior."/'".')"><'.$m.'>'.$current_yearanterior.': <i class="fas fa-globe-americas"></i></'.$m.'></button>';

# Website Style.php File Includer
$website_image = $current_year;
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;
$website_style_file = $sitefolder_2020.'Website Style.php';
require $website_style_file;

#TabGenerator.php includer
include $website_tabs_generator;

?>