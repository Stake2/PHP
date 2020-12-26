<?php 

# Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_folder = $php_tabs.ucwords($selected_website).'/';
$website_style_file = $selected_website_folder.'Website Style.php';

$yeartabcode = array(
$yearlinks[0],
$yearlinks[1],
$yearlinks[2],
);

$yeartabtxt = array(
$years_array[0],
$years_array[1],
$years_array[2],
);

$creation_date = str_replace(["Creation date: ", "Data de criação: "], "", $year_2020_summary_text[1]);

$edit_date = str_replace(["Edit date: ", "Data de edição: "], "", $year_2020_summary_text[2]);

if (in_array($website_language, $en_languages_array)) {
	$text_to_find = "/Things made in [0-9][0-9][0-9][0-9]: /i";
	$things_made_in_current_year = preg_split($text_to_find, $year_2020_summary_text[6]);

	$text_to_find = "/along with comments and people met/i";
	$things_made_in_current_year = preg_split($text_to_find, $things_made_in_current_year[1]);
	$things_made_in_current_year = $things_made_in_current_year[0];

	$text_to_find = "/ \(/i";
	$things_made_in_current_year = preg_split($text_to_find, $things_made_in_current_year);
	$things_made_in_current_year = str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />"], "", $things_made_in_current_year);

	$things_made_in_current_year_expanded = (int)str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />", "(", ")", " along with comments and people met"], "", $year_2020_summary_text[7]);

	$things_made_in_current_year = (int)str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />"], "", $things_made_in_current_year[0]);

	$text_to_find = "/Comments on the SuperAnimes website: /i";
	$comments_on_superanimes = preg_split($text_to_find, $year_2020_summary_text[15]);

	$text_to_find = "/[0-9][0-9][0-9] \(/i";
	$comments_on_superanimes_last_comment = preg_split($text_to_find, $comments_on_superanimes[1]);

	$text_to_find = "/#/i";
	$comments_on_superanimes_last_comment = str_replace(")", "", preg_split($text_to_find, $comments_on_superanimes_last_comment[1])[1]);

	$text_to_find = "/ \([^()]+\)/i";
	$comments_on_superanimes_number = preg_split($text_to_find, $comments_on_superanimes[1])[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$text_to_find = "/Coisas feitas em [0-9][0-9][0-9][0-9]: /i";
	$things_made_in_current_year = preg_split($text_to_find, $year_2020_summary_text[6]);

	$text_to_find = "/junto com comentários e pessoas conhecidas/i";
	$things_made_in_current_year = preg_split($text_to_find, $things_made_in_current_year[1]);
	$things_made_in_current_year = $things_made_in_current_year[0];

	$text_to_find = "/ \(/i";
	$things_made_in_current_year = str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />"], "", $things_made_in_current_year);

	$things_made_in_current_year_expanded = (int)str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />", "(", ")", " junto com comentários e pessoas conhecidas"], "", $year_2020_summary_text[7]);

	$things_made_in_current_year = (int)str_replace(["\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "<br />"], "", $things_made_in_current_year[0]);

	$text_to_find = "/Comentários no site SuperAnimes: /i";
	$comments_on_superanimes = preg_split($text_to_find, $year_2020_summary_text[15]);

	$text_to_find = "/[0-9][0-9][0-9] \(/i";
	$comments_on_superanimes_last_comment = preg_split($text_to_find, $comments_on_superanimes[1]);

	$text_to_find = "/#/i";
	$comments_on_superanimes_last_comment = str_replace(")", "", preg_split($text_to_find, $comments_on_superanimes_last_comment[1])[1]);

	$text_to_find = "/ \([^()]+\)/i";
	$comments_on_superanimes_number = preg_split($text_to_find, $comments_on_superanimes[1])[0];
}

$thingsnumb = $things_made_in_current_year;

$i = 9;
$productive_things_number = (int)str_replace(["Productive things: ", "Coisas produtivas: "], "", $year_2020_summary_text[$i]);
$i++;

$watched_things_number = (int)str_replace(["Watched things: ", "Coisas assistidas: "], "", $year_2020_summary_text[$i]);
$i++;

$new_stories_number = (int)str_replace(["New stories: ", "Novas histórias: "], "", $year_2020_summary_text[$i]);
$i++;

$story_progress_number = (int)str_replace(["Story progress: ", "Progresso das histórias: "], "", $year_2020_summary_text[$i]);
$i++;

$new_websites_number = (int)str_replace(["New websites: ", "Novos sites: "], "", $year_2020_summary_text[$i]);
$i++;

$people_that_i_met_number = (int)str_replace(["People that I have met: ", "Pessoas que conheci: "], "", $year_2020_summary_text[$i]);
$i++;

$year_creation_and_edit_dates = array(
$creation_date,
$edit_date,
);

$year_numbers = array(
$things_made_in_current_year,
$productive_things_number,
$watched_things_number,
$new_stories_number,
$story_progress_number,
$people_that_i_met_number,
$comments_on_superanimes_number,
);

$year_number_texts = array(
"Things made in ".$current_year,
"Productive things",
"Watched things",
"New stories",
"Story progress",
"People that I met",
"Comments on SuperAnimes",
);

#var_dump($year_creation_and_edit_dates);

$websites_number = 11;
$friendsnumb = $people_that_i_met_number;
$cmntsnumb1 = 92;
$cmntsnumb2 = 183;
$tasksnumb = 44;

$original1 = 12;
$original2 = 18;
$original3 = 29;
$original4 = 91;
$original5 = 180;

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

$strycapnumb = array(1, 13, 5, 1, 15);
$strywordnumb = array(512, 17.374, '7.440', 1.218, 7.401);
$strycharnumb = 41.162;

$pastebinlinks = array(
'<a href="https://pastebin.com/4j99vwMy">https://pastebin.com/4j99vwMy</a>', 
'<a href="https://pastebin.com/cx0jA1fx">https://pastebin.com/cx0jA1fx</a>',
'<a href="https://pastebin.com/FaGftvR0">https://pastebin.com/FaGftvR0</a>',
);

#$citybodyfiles = array(
#$selected_website_folder.'CityBody1.php', 
#$selected_website_folder.'CityBody2.php', 
#$selected_website_folder.'CityBody3.php', 
#$selected_website_folder.'CityBody4.php',
#$selected_website_folder.'CityBody5.php', 
#$selected_website_folder.'CityBody6.php',
#);

#ob_start();
#include $phptabs.'Btns.php';
#$buttons = ob_get_clean();
#
#include $citybodyfiles[0];
#include $citybodyfiles[1];
#include $citybodyfiles[2];
#include $citybodyfiles[3];
#include $citybodyfiles[4];
#include $citybodyfiles[5];
#
#ob_start();
#include $selected_website_folder.'CityContent2.php';
#$citycontents2 = ob_get_clean();
#
#ob_start();
#include $selected_website_folder.'CityContent3.php';
#$citycontents3 = ob_get_clean();
#
#ob_start();
#include $selected_website_folder.'CityContent5.php';
#$citycontents5 = ob_get_clean();
#
#ob_start();
#include $selected_website_folder.'CityContent6.php';
#$citycontents6 = ob_get_clean();
#
#$citycontents = array(
#$selected_website_folder.'CityContent2.php',
#$selected_website_folder.'CityContent3.php',
#$selected_website_folder.'CityContent5.php',
#);
#
#$citiescontent = array(
#$citytitle1.$citybody1,
#$citytitle2.$citybody2.$citycontents2,
#$citytitle3.$citybody3.$citycontents3,
#$citytitle4.$citybody4,
#$citytitle5.$citybody5.$citycontents5,
#$citytitle6.$citybody6.$citycontents6,
#);

$citiestxts = array(
$langreadtext.': '.$siteicon,
$tabnames[1].': '.$icons[0],
$tabnames[2].': '.$icons[1],
$tabnames[3].': '.$icons[2],
$tabnames[4].': '.$icons[4],
$tabnames[5].': '.$icons[3],
);

#Previous year button
$last_year_button_computer = '<button class="w3-btn '.$first_button_style.'" onclick="window.open('."'".$main_website_url."years/".$current_yearanterior."/'".')"><'.$n.'>'.$current_yearanterior.': <i class="fas fa-globe-americas"></i></'.$n.'></button>';

#Mobile previous year button
$last_year_button_mobile = '<button class="w3-btn '.$first_button_style.'" onclick="window.open('."'".$main_website_url."years/".$current_yearanterior."/'".')"><'.$m.'>'.$current_yearanterior.': <i class="fas fa-globe-americas"></i></'.$m.'></button>';

#TabGenerator.php includer
include $website_tabs_generator;

?>