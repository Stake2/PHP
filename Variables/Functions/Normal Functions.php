<?php

function Show_Text($file, $style_format = Null) {
	global $variable_inserter_array;
	global $use_variable_inserter;
	global $website_name;
	global $website_the_story_of_the_bulkan_siblings;

	$file_read = Open_File($file);

	if ($file_read != Null) {
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

function Write_To_File($file, $text) {
	file_put_contents($file, $text);
}

function Language_Item_Definer_Per_Language($enus_item, $ptbr_item, $ptpt_item, $same_from_ptbr = False, $general_item = Null) {
	global $website_language;
	global $language_enus;
	global $language_ptbr;
	global $language_ptpt;

	if ($general_item != Null and $website_language == $language_geral) {
		return $general_item;
	}

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

function Define_Text_By_Number($number, $singular_text, $plural_text) {
	if ($number <= 1) {
		return $singular_text;
	}

	if ($number > 1) {
		return $plural_text;
	}
}

function Make_Image($image_link, $image_style, $image_width) {
	return '<img src="'.$image_link.'" width="'.$image_width.'" style="'.$image_style.'" />';
}

function Make_Linked_Image($image_link, $is_chapter_image = False, $computer_width = Null, $custom_image_style = Null, $has_space = True) {
	global $computer_div;
	global $mobile_div;
	global $div_close;
	global $chapter_image_style;

	$a_href = '<a href="'.$image_link.'" target="_blank">';

	$image_style = 'align="left"';

	if ($is_chapter_image == True) {
		$image_style = $chapter_image_style;
	}

	elseif ($custom_image_style != Null) {
		$image_style = $custom_image_style;
	}

	if ($computer_width == Null) {
		$computer_width = "35";
	}

	$image = "<br />".$computer_div."\n".$a_href.Make_Image($image_link, $image_style, $computer_width."%")."</a>"."\n".$div_close."\n";

	$image_width = "100%";

	$image .= $mobile_div."\n".$a_href.Make_Image($image_link, $image_style, $image_width."%")."</a>"."\n".$div_close;

	$image = $image.$computer_div;

	if ($has_space == True) {
		$image .= "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
	}

	$image .= $div_close;

	if ($has_space == True) {
		$image .= "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
	}

	return $image;
}

function Make_Link($link, $link_text = Null, $link_color = Null, $new_tab = False) {
	if ($link_color == Null) {
		$link_color = format('class="{}"', "w3-text-white");
	}

	if ($link_color != Null) {
		$link_color = format('class="{}"', $link_color);
	}

	if ($link_text == Null) {
		$link_text = $link;
	}

	if ($new_tab == True) {
		$target = "_blank";
	}

	if ($new_tab == False) {
		$target = "_self";
	}

	$link_element = '<a '.$link_color.' href="'.$link.'" target="'.$target.'">'.$link_text.'</a>';

	return $link_element;
}

function Show_Story_Readers($text_color, $number_text_color, $hover_color) {
	global $story_readers_number_file;
	global $computer_variable;
	global $mobile_variable;
	global $readers;
	global $h2_element;
	global $h4_element;
	global $text_hover_white_css_class;
	global $zoom_animation_class;
	global $span_element;

	$classes = array(
	$text_hover_white_css_class,
	$zoom_animation_class,
	);

	$classes[2] = $computer_variable;

	$i = 0;
	while ($i <= $story_readers_number_file) {
		$i2 = $i + 1;

		$reader_name = $readers[$i];

		$reader_number_text = Create_Element($span_element, $number_text_color, $i2);
		$reader_name_text = Create_Element($h2_element, $classes, $reader_number_text." - ".$reader_name);

		echo $reader_name_text."\n";

		$i++;
	}

	echo "\n";

	$classes[2] = $mobile_variable;

	$i = 0;
	while ($i <= $story_readers_number_file) {
		$i2 = $i + 1;

		$reader_name = $readers[$i];

		$reader_number_text = Create_Element($span_element, $number_text_color, $i2);
		$reader_name_text = Create_Element($h2_element, $classes, $reader_number_text." - ".$reader_name);

		echo $reader_name_text."\n";

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

	else {
		return $number;
	}
}

function Stringfy_Array($array, $add_br = False) {
	$string_array = "";

	foreach ($array as $text) {
		$string_array .= $text;

		if ($add_br == True) {
			$string_array .= "<br />"."\n";
		}
	}

	return $string_array;
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
	global $h2_element;
	global $div_close;
	global $alternative_tab_full_border;
	global $city_titles;

	if ($custom_tab_titles_array != Null) {
		$tab_titles = $custom_tab_titles_array;
	}

	$i = 0;
	foreach ($tab_titles as $value) {
		$city_titles[$i] = $div_zoom_animation.'<'.$h2_element.' class="w3-center"><p></p><br /><b>'.$value.'</b><br /><br /><p></p></'.$h2_element.'>'.$div_close.'<hr class="'.$alternative_tab_full_border.'" />'."\n";

		$i++;
	}
}

function show($thing, $add_br = False) {
	$separator = Null;
	$add_number = "";
	$position = "";
	$separator = (($separator == Null) ? $separator = "": $separator = $separator);

	if (is_array($thing) == True) {
		$i = 0;
		$c = 1;
		foreach ($thing as $text) {
			if (is_array($text) == True) {
				$i = 0;
				foreach ($text as $text_value) {
					if (is_array($text_value) == True) {
						foreach ($text_value as $text_value_value) {
							$text_to_show = $text_value_value;

							if ($add_number == True) {
								if ($position == "left") {
									$text_to_show = (string)$i.$separator.$text_to_show;
								}

								if ($position == "right") {
									$text_to_show = $text_to_show.$separator.(string)$i;
								}
							}

							if ($add_br == True) {
								$text_to_show .= "<br />"."\n";
							}

							else {
								$text_to_show .= "\n";
							}
						}

						echo $text_to_show;
					}

					if (is_array($text_value) == False) {
						$text_to_show = $text_value_value;

						if ($position == "left") {
							$text_to_show = (string)$i.$separator.$text_to_show;
						}

						if ($position == "right") {
							$text_to_show = $text_to_show.$separator.(string)$i;
						}

						if ($add_br == True) {
							$text_to_show .= "<br />"."\n";
						}

						else {
							$text_to_show .= "\n";
						}

						echo $text_to_show;
					}

					$i++;
				}
			}

			if (is_array($text) == False) {
				$text_to_show = $text;

				if ($add_number == True) {
					if ($position == "left") {
						$text_to_show = (string)$c.$separator.$text_to_show;
					}

					if ($position == "right") {
						$text_to_show = $text_to_show.$separator.(string)$c;
					}
				}

				if ($add_br == True) {
					$text_to_show .= "<br />"."\n";
				}

				if ($add_br == False) {
					$text_to_show .= "\n";
				}

				echo $text_to_show;

				$c++;
			}
		}

		$i++;
	}

	if (is_array($thing) == False) {
		$text_to_show = $thing;

		if ($add_br == True) {
			$text_to_show .= "<br />"."\n";
		}

		else {
			$text_to_show .= "\n";
		}

		echo $text_to_show;
	}
}

function Show_True_Or_False($value) {
	if ($value == True) {
		Show("True");
	}

	if ($value == False) {
		Show("False");
	}
}

?>