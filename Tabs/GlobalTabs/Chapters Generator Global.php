<?php 

#Defines some number variables
$chapter_number_1 = 1;
$chapter_number_2 = 2;
$chapter_number_3 = 0;
$chapter_number_4 = 0;
$chapter_number_4a = 0;
$chapter_number_7 = 0;
$captxtname = str_replace("s", "", $chapters_text);

$chapter_write_to_folder = $story_chapter_files_folder_language.'Test/';

# Chapter file text link array generator, it generates the array to access the text files of the chapters
$chapter_date_number = 1;
$a = 1;
$z = 1;
while ($a <= $chapters) {
	$a2 = $a - 1;

	if ($website_story_has_titles == true) {
		$normal_chapters[$a] = $story_chapter_files_folder_language.$z.' - '.$chapter_titles[$a2].'.txt';
		$normal_chapters[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $normal_chapters[$a]);
	}

	else {
		$normal_chapters[$a] = $story_chapter_files_folder_language.$z.'.txt';
		$normal_chapters[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $normal_chapters[$a]);
	}

	$z++;
	$a++;
}

#Chapter file text link array generator for the English language, it generates the array to access the English text files of the chapters
$a = 1;
$z = 1;

if (strpos($host_text, $website_translate_story_setting.'='.'true')) {
	$main_story_folder_3 = $story_chapter_files_folder.strtoupper($enus_language).'/';
}

if (strpos($host_text, $website_translate_story_setting.'='.'false') or strpos($host_text, $website_translate_story_setting.'='.'false') == false) {
	$main_story_folder_3 = $story_chapter_files_folder.strtoupper($website_language).'/';
}

while ($a <= $chapters) {
	$a2 = $a - 1;

	$main_story_folder_4 = $story_chapter_files_folder.strtoupper($enus_language).'/';

	if ($website_story_has_titles == true) {
		$english_chapters[$a] = $main_story_folder_4.$z.' - '.$titlesenus[$a2].'.txt';
		$english_chapters[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $english_chapters[$a]);
	}

	else {
		$english_chapters[$a] = $main_story_folder_4.$z.'.txt';
		$english_chapters[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $normal_chapters[$a]);
	}

	$z++;
	$a++;
}

#Chapter date file reader, it generates the capdate array which contains the date that the chapter was written
$a = 0;
$z = 0;
if ($story_name_has_dates == true) {
	while ($a <= $chapters) {
		$a2 = $a - 1;

		$chapter_dates_file = $story_info_folder.'Chapter Written Dates.txt';

		$fp = fopen($chapter_dates_file, 'r', 'UTF-8'); 
		if ($fp) {
			$chapter_dates = explode("\n", fread($fp, filesize($chapter_dates_file)));
			$chapter_dates = str_replace("^", "", $chapter_dates);
		}

		$chapter_dates[$a] = str_replace(array("\r\n", "\r", "\n"), "<br />", $chapter_dates[$a]);
	
		$z++;
		$a++;
	}
}

echo "\n";

#Comment and read modal style CSS definer
echo '<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>';
echo "\n";

if ($story_name_has_reads == true and $story_website_contains_reads == true) {
	require $reads_generator_php_variable;

	$h = $readed_number;
}

$z123 = 0;
$chapter_line_number = 0;
$b1 = 0;
$b2 = 1;

if ($site_uses_new_comment_and_read_displayer == true and $story_website_contains_reads == true and $story_website_contains_comments == true) {
	if ($website_name == $sitepequenata) {
		$comments_array = array(
		null,
		$story_name_chapter_comments_array[0],
		[$story_name_chapter_comments_array[1], $story_name_chapter_comments_array[6]],
		$story_name_chapter_comments_array[2],
		null,
		null,
		null,
		null,
		null,
		);

		$reads_array = array(
		null,
		[$story_name_reads_array[1], $story_name_reads_array[2], $story_name_reads_array[3], $story_name_reads_array[5]],
		[$story_name_reads_array[0]],
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		$story_name_reads_array[4],
		);
	}

	if ($website_name == $sitespaceliving) {
		$comments_array = array(
		null,
		$story_name_chapter_comments_array[0],
		null,
		$story_name_chapter_comments_array[1],
		$story_name_chapter_comments_array[2],
		null,
		null,
		null,
		null,
		);

		$reads_array = array(
		null,
		$story_name_reads_array[0],
		null,
		$story_name_reads_array[1],
		$story_name_reads_array[2],
		null,
		null,
		null,
		null,
		null,
		null,
		);
	}

	$array1 = $comments_array;
	$array2 = $reads_array;
	$number_variable = $chapter_number_1;
}

$zw = 1;
$zq = 1;
$za = 2;
$mzz = 10;
$zzcxx = 3;
$book_cover_number = 1;
$a = 1;

echo '<div id="'.strtolower($chapters_text).'-div">'."\n";

#Chapter reader/writer/displayer, it generates the tabs for the chapters to be read by the user
while ($chapter_number_1 <= $chapters) {
	require $chapter_tab_generator_php_variable;
}

if ($write_new_chapter == true) {
	require $chapter_tab_generator_php_variable;
}

echo '</div>'."\n";

while ($chapter_number_1 <= $chapters) {
	$testscript = '';

	echo $testscript;
}

if ($story_name_has_reads == true) {
	#Read-modal Tab generator PHP file
	require $read_modal_generator_php_variable;
}

if ($website_has_comments_tab == true and $story_name_has_chapter_comments == true) {
	#Comment-modal Tab generator PHP file
	require $comment_modal_generator_php_variable;
}

/*
Deactivated Form Comment Tab generator

$i = 0;
$chapter_number_4 = 0;
$chapters2 = $chapters - 1;

while ($i <= $chapters2) {
	$i2 = $i + 1;
	echo '<a name="'.$formcode.'-comment-'.$i2.'"></a>'."\n";
	echo '<div id="'.$formcode.'-comment-'.$i2.'" class="'.$tab_style.'" style="display:none;">'."\n";
	echo $bigspace."\n";
	echo '<'.$m.' class="'.$computer_variable.' '.$textstyle.'" style="'.$margin_style_10percent_rounded_border.'">'."\n";
	echo $margin."\n";
	echo $div_zoom_animation.'<'.$n.'><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($chapters_text, 0, -1).'<br /> "'.$i2.' - '.$chapter_titles[$chapter_number_4].'": '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$div_close.'<hr class="'.$tab_full_border.'" />'."\n";
	echo $div_zoom_animation."\n";
	echo '<div class="'.$computer_variable.'">'."\n";
	echo '<form name="'.$formcode.'-comment-'.$i2.'" method="POST" data-netlify="true">'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$form_name.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '</span><br />'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$commentdesc.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;"><i class="fas fa-paper-plane"></i></button>';
	echo '</'.$n.'>'."\n";
	echo '</span>'."\n";
	echo '</form>'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo '</'.$m.'>'."\n";
	echo $div_close."\n";
	echo "\n";
	echo '<a name="'.$formcode.'-comment-'.$i2.'m"></a>'."\n";
	echo '<div id="'.$formcode.'-comment-'.$i2.'m" class="'.$tab_style_mobile.'" style="display:none;">'."\n";
	echo $bigspace."\n";
	echo '<'.$m.' class="'.$mobile_variable.' '.$textstyle.'" style="'.$margin_style_10percent_rounded_border.'">'."\n";
	echo $margin."\n";
	echo $div_zoom_animation.'<'.$n.'><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($chapters_text, 0, -1).'<br /> "'.$i2.' - '.$chapter_titles[$chapter_number_4].'": '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$div_close.'<hr class="'.$tab_full_border.'" />'."\n";
	echo $div_zoom_animation."\n";
	echo '<div class="'.$mobile_variable.'">'."\n";
	echo '<form name="'.$formcode.'-comment-'.$i2.'" method="POST" data-netlify="true">'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$form_name.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '</span><br />'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$commentdesc.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input"></textarea> '."\n";
	echo '<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;"><i class="fas fa-paper-plane"></i></button>';
	echo '</'.$n.'>'."\n";
	echo '</span>'."\n";
	echo '</form>'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo '</'.$m.'>'."\n";
	echo $div_close."\n";
	echo "\n";

	$i++;
	$chapter_number_4++;
}
*/

?>