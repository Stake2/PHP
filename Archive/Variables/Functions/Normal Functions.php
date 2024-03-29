<?php

function For_Each_Replace($search_items, $replace_items, $string) {
	$i = 0;
	foreach ($replace_items as $item) {
		$item_to_use = $item;

		if (strpos($item_to_use, "{}")) {
			$item_to_use = format(str_replace("search_item", "", $item_to_use), $search_items[$i]);
		}

		$string = str_replace($search_items[$i], $item_to_use, $string);

		$i++;
	}

	return $string;
}

function Show_Text($file, $style_format = Null) {
	global $variable_inserter_array;
	global $website_settings;
	global $story_website_settings;
	global $story_texts_to_replace;
	global $story_texts_to_add;

	$file_read = Open_File($file);

	if ($file_read != Null) {
		while(!feof($file_read)) {
			$text_line = fgets($file_read);
			$text_line = Remove_Text_From_String($text_line);

			if ($style_format != Null) {
				$text_line = format($style_format, $text_line);
			}

			if ($story_website_settings["replace_story_text"] == True and isset($story_texts_to_replace) == True and isset($story_texts_to_add) == True) {
				$text_line = For_Each_Replace($story_texts_to_replace, $story_texts_to_add, $text_line);
			}

			if ($website_settings["variable_inserter"] == True) {
				$text_line = Variable_Inserter($variable_inserter_array, $text_line);

				if ($website_settings["variable_inserter_double"] == True) {
					$text_line = Variable_Inserter($variable_inserter_array, $text_line);
				}
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

	$lines = Read_Lines($file, False, True);

	$words = number_format(str_word_count($lines));

	return $words;
}

function str_contains($contains, $string) {
	return strpos($string, $contains);
}

function Write_To_File($file, $text) {
	file_put_contents($file, $text);
}

function Language_Item_Definer_Per_Language($en_item, $pt_item, $general_item = Null) {
	global $website_information;
	global $language_en;
	global $language_pt;

	if ($general_item != Null and $website_information["language"] == $language_geral) {
		return $general_item;
	}

	if ($website_information["language"] == $language_en) {
		return $en_item;
	}

	if ($website_information["language"] == $language_pt) {
		return $pt_item;
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

function Make_Linked_Image($image_link, $is_chapter_image = False, $computer_width = Null, $custom_image_style = Null, $has_space = True, $custom_link = Null) {
	global $computer_div;
	global $mobile_div;
	global $div_close;
	global $chapter_image_style;

	$image_link_text = $image_link;

	if ($custom_link != Null) {
		$image_link_text = $custom_link;
	}

	$a_href = '<a href="'.$image_link_text.'" target="_blank">';

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

function Make_Link($link, $link_text = Null, $link_color_parameter = Null, $new_tab = False, $new_window = False) {
	if ($link_color_parameter == Null) {
		$link_color = format('class="{}"', "w3-text-white");
	}

	if ($link_color_parameter != Null) {
		$link_color = format('class="{}"', $link_color_parameter);
	}

	if ($link_text == Null) {
		$link_text = $link;
	}

	$target = "_self";
	$onclick = "";

	if ($new_tab == True) {
		$target = "_blank";
	}

	if ($new_window == True) {
		$target = "";
		$onclick = " onclick=\"window.open('".$link."', '_blank', 'height=' + screen.height + ',width=' + screen.width + ', resizable=yes, scrollbars=yes, toolbar=yes, menubar=yes, location=yes')\" style=\"cursor: pointer;text-decoration: underline;\"";
		$link = "";
		$href = "";
	}

	if ($new_window == False) {
		$href = ' href="'.$link.'"';
	}

	$link_element = '<a '.$link_color.''.$href.' target="'.$target.'"'.$onclick.'>'.$link_text.'</a>';

	return $link_element;
}

function Make_Links_In_Text($text, $link_color = "") {
	// The Regular Expression filter
	$pattern = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

	// Check if there is a url in the text
	if (preg_match_all($pattern, $text, $url)) {
		// Loop through all matches
		foreach ($url[0] as $new_link) {
			if (strstr($new_link, ":") === False){
				$link = 'http://'.$new_link;
			}

			else {
				$link = $new_link;
			}

			// Create Search and Replace strings
			$search = $new_link;
			$replace = '<a href="'.$link.'" class="'.$link_color.'" title="'.$new_link.'" target="_blank">'.$link."</a>";
			$text = str_replace($search, $replace, $text);
		}
	}

	// Return result
	return $text;
}

function Linkfy($link, $link_color_parameter = Null) {
	$pattern = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

	$link_color = " class=\"".$link_color_parameter."\"";

	if ($link_color_parameter == Null) {
		$link_color = "";
	}

	preg_match_all($pattern, $link, $url);

	return '<a href="'.$url[0][0].'"'.$link_color.' title="'.$url[0][0].'" target="_blank">'.$url[0][0]."</a>";
}

function Show_Story_Readers($text_color, $number_text_color, $hover_color) {
	global $story_readers_number_file;
	global $computer_variable;
	global $mobile_variable;
	global $story_info;
	global $h2_element;
	global $h4_element;
	global $text_hover_white_css_class;
	global $zoom_animation_class;

	$classes = array(
	$text_hover_white_css_class,
	$zoom_animation_class,
	);

	$classes[2] = $computer_variable;

	$i = 0;
	while ($i <= $story_readers_number_file) {
		$i2 = $i + 1;

		$reader_name = $story_info["readers"][$i];

		$reader_number_text = Create_Element("span", $number_text_color, $i2);
		$reader_name_text = Create_Element($h2_element, $classes, $reader_number_text." - ".$reader_name);

		echo $reader_name_text."\n";

		$i++;
	}

	echo "\n";

	$classes[2] = $mobile_variable;

	$i = 0;
	while ($i <= $story_readers_number_file) {
		$i2 = $i + 1;

		$reader_name = $story_info["readers"][$i];

		$reader_number_text = Create_Element("span", $number_text_color, $i2);
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

	foreach ($array as $line) {
		$string_array .= $line;

		if ($add_br == True) {
			$string_array .= "<br />";
		}

		if ($line != array_reverse($array)[0]) {
			$string_array .= "\n";
		}
	}

	return $string_array;
}

function Mix_Arrays($the_first_array, $the_the_second_array, $left_or_right = Null, $additional_value = False) {
	global $left_english_text;
	global $right_english_text;

	$length = count($the_first_array) - 1;

	if ($additional_value != False) {
		$additional_value_direction = $additional_value[1];
		$additional_value = $additional_value[0];
	}

	$i = 0;
	while ($i <= $length) {
		$first_value = $the_first_array[$i];
		$second_value = $the_the_second_array[$i];

		if ($additional_value != False) {
			if ($additional_value_direction == $left_english_text) {
				$second_value = $additional_value.$second_value;
			}

			if ($additional_value_direction == $right_english_text) {
				$second_value = $second_value.$additional_value;
			}
		}

		if ($left_or_right == $left_english_text) {
			$local_value = $second_value.$first_value;
		}

		if ($left_or_right == $right_english_text) {
			$local_value = $first_value.$second_value;
		}

		$the_first_array[$i] = $local_value;

		$i++;
	}

	return $the_first_array;
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

function Make_Tab_Titles($custom_tab_titles = Null) {
	global $tab_titles;
	global $div_zoom_animation;
	global $h2_element;
	global $div_close;
	global $alternative_tab_full_border;
	global $tab_html_titles;

	$local_tab_titles = $tab_titles;

	if ($custom_tab_titles != Null) {
		$local_tab_titles = $custom_tab_titles;
	}

	$i = 0;
	foreach ($local_tab_titles as $value) {
		if ($custom_tab_titles != Null and $value == "") {
			$value = $tab_titles[$i];
		}
			
		$tab_html_titles[$i] = $div_zoom_animation.'<'.$h2_element.' class="w3-center"><p></p><br /><b>'.$value.'</b><br /><br /><p></p></'.$h2_element.'>'.$div_close.'<hr class="'.$alternative_tab_full_border.'" />'."\n";

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