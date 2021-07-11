<?php 

# Add leading zeros to chapter number one
$new_chapter_number_1 = Add_Leading_Zeros($chapter_number_1);

$show_chapter_on_read = False;

# Folders definer
$reads_folder = $story_folder.$reads_folder_text;
$current_chapter_reads_folder = $reads_folder.$new_chapter_number_1."/";

# Files definer
$read_date_file = $current_chapter_reads_folder."Read Date.txt";
$reader_file = $current_chapter_reads_folder."Reader.txt";

# Text array creators
$read_dates = Read_Lines($read_date_file, $add_none = True);
$chapter_readers = Read_Lines($reader_file, $add_none = True);

if ($read_dates != Null) {
	$reads_number = count($read_dates) - 1;
}

else {
	$reads_number = Null;
}

if ($reads_number != 0 and $reads_number != Null) {
	$chapter_reads_number = $reads_number;
	$chapter_read_numbers_array[$chapter_number_1] = $chapter_reads_number;
}

else {
	$chapter_read_numbers_array[$chapter_number_1] = "0";
}

# Read Style definer
$read_style = $additional_background_color." ".$text_black_css_class." ".$border_3px_solid_black_css_class;

if ($reads_number > 1 and $read_dates != Null) {
	$current_chapter_read_number = 1;

	while ($current_chapter_read_number <= $reads_number) {
		$read_date = date("H:i d/m/Y", strtotime($read_dates[$current_chapter_read_number]));
		$reader = $chapter_readers[$current_chapter_read_number];

		# Read creation
		$read = $margin.'<'.$m.' class="'.$read_style.'" style="text-align:left;'.$rounded_border_style_2.'">'.'<div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.

		# Reader text and name
		$reader_text.': </b>'.$reader.'<br /><b>';

		# Chapter text and title
		if ($show_chapter_on_read == True) {
			$read .= $chapter_title_text.':</b> '.$chapter_titles[$chapter_number_3].'<br />'.'<b>';
		}

		# Read time text and time
		$read .= ucwords($in_text).':</b> '.$read_date.' <br /><br />'.$div_close.'</'.$m.'>'.$div_close."\n";

		$reads_array[$chapter_number_1][$current_chapter_read_number] = $read;

		$current_chapter_read_number++;
	}
}

if ($reads_number == 1 and $read_dates != Null) {
	$read_date = date("H:i d/m/Y", strtotime($read_dates[1]));
	$reader = $chapter_readers[1];

	$read = $margin.'<'.$m.' class="'.$read_style.'" style="text-align:left;'.$rounded_border_style_2.'"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.
	# Reader text and name
	$reader_text.': </b>'.$reader.'<br /><b>';

	# Chapter text and title
	if ($show_chapter_on_read == True) {
		$read .= $chapter_title_text.':</b> '.$chapter_titles[$chapter_number_3].'<br />'.'<b>';
	}

	# Read time text and time
	$read .= ucwords($in_text).':</b> '.$read_date.' <br /><br />';

	$read .= $div_close.'</'.$m.'>'.$div_close."\n";

	$reads_array[$chapter_number_1] = $read;
}

?>