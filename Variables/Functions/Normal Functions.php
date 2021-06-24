<?php

function Show_Text($file, $style_format = Null, $use_variable_inserter = True) {
	global $variable_inserter_array;

	$file_read = Open_File($file);

	while(!feof($file_read)) {
		$text_line = fgets($file_read);
		$text_line = Remove_Text_From_String($text_line);

		if ($style_format != Null) {
			$text_line = format($style_format, $text_line);
		}

		if ($use_variable_inserter == True) {
			$text_line = Variable_Inserter($variable_inserter_array, $text_line);
			$text_line = Variable_Inserter($variable_inserter_array, $text_line);
		}

		echo $text_line."\n".'<br />';
	}
}

function Line_Number($file) {
	$file = Open_File($file);

	$line_number = 0;
	if ($file != Null) {
		while (!feof($file)) {
			$line = fgets($file);
			$line_number++;
		}
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

function Language_Item_Definer_Per_Language($enus_item, $ptbr_item, $ptpt_item, $same_from_ptbr = False) {
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

function Make_Linked_Image($image_link, $is_chapter_image = False, $computer_width = null) {
	global $computer_div;
	global $mobile_div;
	global $div_close;
	global $chapter_image_style;

	$a_href = '<a href="'.$image_link.'">';

	$image_style = 'align="left"';

	if ($is_chapter_image == True) {
		$image_style = $chapter_image_style;
	}

	if ($computer_width == null) {
		$computer_width = "35";
	}

	$image = "<br />".$computer_div.$a_href.'<img src="'.$image_link.'" width="'.$computer_width.'%" '.$image_style.' />'."</a>".$div_close."\n".
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

function Create_Element($element, $class, $text, $custom_parameters = Null) {
	if (is_array($class) == True) {
		$new_class = "";

		foreach ($class as $class_name) {
			$new_class .= $class_name." ";
		}

		$class = $new_class;
	}

	if ($custom_parameters != Null) {
		if (is_array($custom_parameters) == True) {
			$new_custom_parameters = "";

			foreach ($custom_parameters as $custom_parameter) {
				$new_custom_parameters .= $custom_parameter." ";
			}

			$custom_parameters = $new_custom_parameters;
		}
	}

	else {
		$custom_parameters = "";
	}

	$element_prototype = '<{} class="{}" {}>{}</{}>';

	$parameters = array(
	$element,
	$class,
	$custom_parameters,
	$text,
	$element,
	);

	return format($element_prototype, $parameters);
}

function Show_Story_Readers($text_color, $number_text_color, $hover_color) {
	global $story_readers_number_file;
	global $computer_variable;
	global $mobile_variable;
	global $readers;
	global $n;
	global $m;
	global $text_hover_white_css_class;
	global $zoom_animation_class;
	global $span_element;

	$classes = array(
	$text_hover_white_css_class,
	$zoom_animation_class,
	$computer_variable,
	);

	$i = 0;
	while ($i <= $story_readers_number_file) {
		$i2 = $i + 1;

		$reader_name = $readers[$i];

		$reader_number_text = Create_Element($span_element, $number_text_color, $i2);
		$reader_name_text = Create_Element($n, $classes, $reader_number_text." - ".$reader_name);

		echo $reader_name_text;

		#echo '<'.$n.' class="'.$hover_variable.' '.$zoom_animation_class.' '.$computer_variable.'">'.$text_color.$i2.$spanc.' - '..'</'.$n.'>'."\n";

		$i++;
	}

	echo "\n";

	$classes = array(
	$text_hover_white_css_class,
	$zoom_animation_class,
	$mobile_variable,
	);

	$i = 0;
	while ($i <= $story_readers_number_file) {
		$i2 = $i + 1;

		$reader_name = $readers[$i];

		$reader_number_text = Create_Element($span_element, $number_text_color, $i2);
		$reader_name_text = Create_Element($n, $classes, $reader_number_text." - ".$reader_name);

		echo $reader_name_text;

		#echo '<'.$m.' class="'.$hover_variable.' '.$zoom_animation_class.' '.$mobile_variable.'">'.$text_color.$i2.$spanc.' - '.$readers[$i]."</".$m.'>'."\n";

		$i++;
	}
}

function Add_Leading_Zeros($number) {
	if ($number <= 9) {
		return "0".(string)$number;
	}

	if ($number > 9) {
		return $number;
	}
}

function Remove_Leading_Zeros($number) {
	if ($number <= 9) {
		return str_replace("0", "", (string)$number);
	}
}

function Mix_Arrays($first_array, $second_array, $left_or_right = Null, $additional_value = False) {
	global $left_english_text;
	global $right_english_text;

	$length = count($first_array) - 1;

	if ($additional_value != False) {
		$additional_value_direction = $additional_value[1];
		$additional_value = $additional_value[0];
	}

	$i = 0;
	while ($i <= $length) {
		$first_value = $first_array[$i];
		$second_value = $second_array[$i];

		if ($additional_value != False) {
			if ($additional_value_direction == $left_english_text) {
				$second_value = $additional_value.$second_value;
			}

			if ($additional_value_direction == $right_english_text) {
				$second_value = $second_value.$additional_value;
			}
		}

		if ($left_or_right == $left_english_text) {
			$value = $second_value.$first_value;
		}

		if ($left_or_right == $right_english_text) {
			$value = $first_value.$second_value;
		}

		$first_array[$i] = $value;

		$i++;
	}

	return $first_array;
}

function Make_Button_Names() {
	global $tab_texts;
	global $tab_titles;

	# Button names definer
	$i = 0;
	foreach ($tab_titles as $tab_name) {
		$tab_texts[$i] = $tab_name;

		$i++;
	}
}

function Make_Tab_Titles($custom_tab_titles_array = Null) {
	global $tab_titles;
	global $div_zoom_animation;
	global $n;
	global $div_close;
	global $alternative_tab_full_border;
	global $city_titles;

	if ($custom_tab_titles_array != Null) {
		$tab_titles = $custom_tab_titles_array;
	}

	$i = 0;
	foreach ($tab_titles as $value) {
		$city_titles[$i] = $div_zoom_animation.'<'.$n.' class="w3-center"><p></p><br /><b>'.$value.'</b><br /><br /><p></p></'.$n.'>'.$div_close.'<hr class="'.$alternative_tab_full_border.'" />'."\n";

		$i++;
	}
}

?>