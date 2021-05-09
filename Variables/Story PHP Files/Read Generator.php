<?php 

if ($chapter_number_1 <= 9) {
	$text_to_add = "0";
}

if ($chapter_number_1 > 9) {
	$text_to_add = "";
}

$show_chapter_on_read = False;

$new_chapter_number_1 = $text_to_add.$chapter_number_1;

$reads_folder = $story_folder.$readers_and_reads_folder_text.$reads_folder_text;
$current_chapter_reads_folder = $reads_folder.$new_chapter_number_1."/";
$read_date_file = $current_chapter_reads_folder."Read Date.txt";
$reader_file = $current_chapter_reads_folder."Reader.txt";

$chapter_read_dates_text = Read_Lines($read_date_file, $add_none = True);
$chapter_readers_text = Read_Lines($reader_file, $add_none = True);

if ($chapter_read_dates_text != Null) {
	$reads_number = count($chapter_read_dates_text) - 1;
}

$read_style = $additional_background_color." ".$text_black_css_class." ".$border_3px_solid_black_css_class;

if ($reads_number > 1 and $chapter_read_dates_text != Null) {
	$current_chapter_read_number = 1;

	#$reads_array[$chapter_number_1] = array();

	while ($current_chapter_read_number <= $reads_number) {
		$read_date = $chapter_read_dates_text[$current_chapter_read_number];
		$reader = $chapter_readers_text[$current_chapter_read_number];

		#$reads_text[$v3] = substr($reads_text[$v3], 0, -1);
		$read_date = date("H:i d/m/Y", strtotime($read_date));

		$read = $margin.'<'.$m.' class="'.$read_style.'" style="text-align:left;'.$rounded_border_style_2.'">'.'<div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.
		# Reader text and name
		$reader_text.': </b>'.$reader.'<br /><b>';

		# Chapter text and title
		if ($show_chapter_on_read == True) {
			$read .= substr($chapters_text, 0, -1).':</b> '.$chapter_titles[$chapter_number_3].'<br />'.'<b>';
		}

		# Read time text and time
		$read .= $time_text.':</b> '.$read_date.' <br /><br />'.$div_close.'</'.$m.'>'.$div_close."\n";

		$reads_array[$chapter_number_1][$current_chapter_read_number] = $read;

		$current_chapter_read_number++;
	}
}

if ($reads_number == 1 and $chapter_read_dates_text != Null) {
	$read_date = $chapter_read_dates_text[1];
	$reader = $chapter_readers_text[1];

	#$reads_text[$v3] = substr($reads_text[$v3], 0, -1);
	$read_date = date("H:i d/m/Y", strtotime($read_date));

	$read = $margin.'<'.$m.' class="'.$read_style.'" style="text-align:left;'.$rounded_border_style_2.'"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.
	# Reader text and name
	$reader_text.': </b>'.$reader.'<br /><b>';

	# Chapter text and title
	if ($show_chapter_on_read == True) {
		$read .= substr($chapters_text, 0, -1).':</b> '.$chapter_titles[$chapter_number_3].'<br />'.'<b>';
	}

	# Read time text and time
	$read .= $time_text.':</b> '.$read_date.' <br /><br />'.$div_close.'</'.$m.'>'.$div_close."\n";

	$reads_array[$chapter_number_1] = $read;
}

/*
$i = 0;
$z = 1;
$a = 1;
$a2 = 1;
$b1 = 0;
$b2 = 0;
$b4 = 0;
$v1 = 0;
$v2 = 0;

$read_style = $additional_background_color." ".$text_black_css_class." ".$border_3px_solid_black_css_class;

#Read date converter, that converts the date of the readings into a date format
while ($v2 <= $story_reads_number_file) {
	$v3 = $v2 + 2;
	$reads_text[$v3] = substr($reads_text[$v3], 0, -1);
	$reads_text[$v3] = date("H:i d/m/Y", strtotime($reads_text[$v3]));

	$v2++;
	$v2++;
	$v2++;
}

#echo $website_chapter_to_write_setting;
$v1 = 0;
$readed_number = 0;

#"Reads" array generator, it generates the array of the readings
while ($b1 <= $story_reads_number_file) {
	$b22 = $b1 + 1;
	$b3 = $b1 + 2;

	$story_reads_array[$v1] = $margin.'<'.$m.' class="'.$read_style.'" style="text-align:left;'.$rounded_border_style_2.'"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.
	#Reader text and name
	$read_texts_array[7].': </b>'.$reads_text[$b1].'<br /><b>'.

	#Chapter text and title
	#substr($chapters_text, 0, -1).':</b> '.$reads_text[$b22].'<br />'.'<b>'.

	#Read time text and time
	$time_text.':</b> '.$reads_text[$b3].' <br /><br />'.$div_close.'</'.$m.'>'.$div_close."\n";

	$readed_number++;
	$b1++;
	$b1++;
	$b1++;
	$v1++;
	$b4++;
}
*/

?>