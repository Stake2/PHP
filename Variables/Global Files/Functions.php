<?php

function Show_Text($file) {
	global $variable_inserter_array;

	$file_read = Open_File($file);

	while(!feof($file_read)) {
		$text_line = fgets($file_read);
		$text_line = Remove_Text_From_String($text_line);
		$text_line = Variable_Inserter($variable_inserter_array, $text_line);
		$text_line = Variable_Inserter($variable_inserter_array, $text_line);

		echo $text_line."\n".'<br />';
	}
}

function Line_Number($file) {
	$file = Open_File($file);

	$line_number = 0;
	while (!feof($file)) {
		$line = fgets($file);
		$line_number++;
	}

	return $line_number;
}

function Word_Number($file) {
	$file_read = Open_File($file);

	$lines = Read_Lines($file);
	$lines_text = "";

	foreach ($lines as $line) {
		$lines_text .= $line;
	}

	$words = number_format(str_word_count($lines_text));

	return $words;
}

function Language_Item_Definer($enus_item, $ptbr_item, $ptpt_item, $same_from_ptbr = False) {
	global $website_language;
	global $language_enus;
	global $language_ptbr;
	global $language_ptpt;

	if ($website_language == $language_enus) {
		return $enus_item;
	}

	if ($website_language == $language_ptbr) {
		return $ptbr_item;
	}

	if ($website_language == $language_ptpt and $same_from_ptbr == False) {
		return $ptpt_item;
	}

	if ($website_language == $language_ptpt and $same_from_ptbr == True) {
		return $ptbr_item;
	}
}

function Language_Item_Definer_By_Array($english_variable, $portuguese_variable) {
	global $website_language;
	global $en_languages_array;
	global $pt_languages_array;

	if (in_array($website_language, $en_languages_array)) {
		$variable = $english_variable;
	}

	if (in_array($website_language, $pt_languages_array)) {
		$variable = $portuguese_variable;
	}

	return $variable;
}

function Make_Linked_Image($image_link, $is_chapter_image = False) {
	global $computer_div;
	global $mobile_div;
	global $div_close;
	global $chapter_image_style;

	$a_href = '<a href="'.$image_link.'">';

	$image_style = 'align="left"';

	if ($is_chapter_image == True) {
		$image_style = $chapter_image_style;
	}

	$image = "<br />".$computer_div.$a_href.'<img src="'.$image_link.'" width="35%" '.$image_style.' />'."</a>".$div_close."\n".
$mobile_div.$a_href.'<img src="'.$image_link.'" width="100%" '.$image_style.' />'."</a>".$div_close;

	$image = $image.$computer_div."<br /><br /><br /><br /><br /><br /><br /><br />".$div_close."<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";

	return $image;
}

function Make_Link($link, $link_text = Null, $link_color = Null) {
	if ($link_color == Null) {
		$link_color = format('class="{}"', "w3-text-white");
	}

	if ($link_color != Null) {
		$link_color = format('class="{}"', $link_color);
	}

	if ($link_text == Null) {
		$link_text = $link;
	}

	$link = '<a '.$link_color.' href="'.$link.'">'.$link_text.'</a>';

	return $link;
}

?>