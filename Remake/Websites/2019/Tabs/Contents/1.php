<?php 

echo $div_zoom_animation."\n";
echo '<div style="text-align:left;">'."\n";

$website_settings["variable_inserter"] = False;

echo Create_Element("b", "", Language_Item_Definer("Author", "Autor").": ").$person_names["Izaque"]."\n"."<br />";
echo Create_Element("b", "", Language_Item_Definer("Created In", $data_file_names_translated["Created In"]).": ").$data_texts["Created In"][0]."\n"."<br />";
echo Create_Element("b", "", Language_Item_Definer("Edited In", $data_file_names_translated["Edited In"]).": ").$data_texts["Edited In"][0]."\n"."<br />";

$array = array(
"Created In",
"Edited In",
);

foreach ($array as $item) {
	$item_backup = $item;

	$i = 0;
	foreach ($data_file_names as $file_name) {
		if ($file_name == $item) {
			unset($data_file_names[$i]);
		}

		$i++;
	}

	$data_file_names = array_values($data_file_names);

	$item = $item_backup;
	
	unset($data_file_names_translated[$item]);
	unset($data_texts[$item]);
	unset($data_files[$item]);
}

$total_things_done_on_current_year = 0;

foreach ($data_file_names as $file_name) {
	$file = $data_files[$file_name];
	$file_name = Language_Item_Definer($file_name, $data_file_names_translated[$file_name]);

	if ($file_name != Language_Item_Definer("Media Comments", "Comentários de Mídia") and $file_name != Language_Item_Definer("People Known", "Pessoas Conhecidas")) {
		if (in_array($file_name, $number_in_first_line_files) == False) {
			$number = (int)Line_Number($file);
			$total_things_done_on_current_year += $number;
		}

		elseif (in_array($file_name, $number_in_first_line_files) == True) {
			$number = (int)Read_Lines($file)[0];
			$total_things_done_on_current_year += $number;

			if ($file_name == Language_Item_Definer("Media Comments", "Comentários de Mídia")) {
				echo "\n"."<br />";
			}
		}
	}
}

echo "\n"."<br />";
echo Create_Element("b", "", "-----")."\n";
echo "\n"."<br />";
echo "\n"."<br />";

echo Create_Element("b", "", Language_Item_Definer("Things Done In", "Coisas Feitas Em")." ".$local_website_name.": ").$total_things_done_on_current_year."\n";
echo "\n"."<br />";

foreach ($data_file_names as $file_name) {
	$file = $data_files[$file_name];
	$file_name = Language_Item_Definer($file_name, $data_file_names_translated[$file_name]);

	$add_br = False;

	$showed_text = False;

	$file_name_title = Create_Element("b", "", $file_name.": ")."\n";

	if ($add_br == True) {
		$file_name_title .= "<br />";
	}

	if (in_array($file_name, $number_in_first_line_files) == False) {
		if (Line_Number($file) != 1) {
			echo $file_name_title;
			$showed_text = True;
		}
	}

	elseif (in_array($file_name, $number_in_first_line_files) == True and $showed_text == False) {
		if ((int)Read_Lines($file)[0] != 0) {
			echo $file_name_title;
			$showed_text = True;
		}
	}

	elseif ($showed_text == False) {
		echo "\n"."<br />";
		echo $file_name_title."aaaaa";
		$showed_text = True;
	}

	if (in_array($file_name, $files_to_show_number) == False) {
		$i = 1;
		foreach (Read_Lines($file) as $text) {
			if ($file_name == Language_Item_Definer("New Stories", "Novas Histórias")) {
				echo "\n"."<br />";

				Show((string)$i." - ".explode(", ", $text)[Language_Item_Definer(0, 1)], $add_br);

				if ($text == array_reverse(Read_Lines($file))[0]) {
					echo "\n"."<br />";
				}
			}

			elseif ($file_name == Language_Item_Definer("Known People", "Pessoas Conhecidas")) {
				#$number = (int)Read_Lines($file)[0];
				$number = 94;

				Show($text." ".Define_Text_By_Number($number, Language_Item_Definer("person", "pessoa"), Language_Item_Definer("people", "pessoas")), $add_br);
			}

			elseif ($file_name == Language_Item_Definer("Story Progress", "Progresso das Histórias")) {
				$text_backup = $text;

				$explode = explode(", ", $text);

				$local_story_name = Language_Item_Definer($explode[0], $story_names[$explode[0]]);
				$chapter_number = $explode[1];
				$words_number = $explode[2];

				$text = $local_story_name.": ";

				if ((int)$chapter_number != 0) {
					$text .= Define_Text_By_Number((int)$chapter_number, ucwords($chapter_text), $chapters_text).": ".$chapter_number.", ";
				}

				$text .= Define_Text_By_Number((int)$words_number, $word_text, $words_text).": ".$words_number;

				echo "\n"."<br />";
				Show($text, $add_br);

				if ($text_backup == array_reverse(Read_Lines($file))[0]) {
					echo "\n"."<br />";
				}
			}

			else {
				if (count(Read_Lines($file)) <= 1) {
					Show($text, $add_br);
				}

				else {
					if ($text == Read_Lines($file)[0]) {
						echo "\n"."<br />";
					}

					if (in_array($file_name, $countable_files)) {
						Show((string)$i." - ".$text, $add_br = True);
					}

					else {
						Show($text, $add_br = True);
					}

					if ($text == array_reverse(Read_Lines($file))[0]) {
						#echo "\n"."<br />";
					}
				}
			}

			$i++;
		}
	}

	else {
		if (in_array($file_name, $number_in_first_line_files) == False) {
			if (Line_Number($file) != 1) {
				Show(Line_Number($file), $add_br);
			}
		}

		elseif (in_array($file_name, $number_in_first_line_files) == True) {
			$number = (int)Read_Lines($file)[0];

			if ($file_name == Language_Item_Definer("Known People", "Pessoas Conhecidas")) {
				$number = 94;
			}

			if ($number != 0) {
				Show($number, $add_br = $add_br);
			}

			if ($file_name == Language_Item_Definer("Media Comments", "Comentários de Mídia")) {
				echo "\n"."<br />";
			}
		}
	}

	if ($showed_text == True) {
		echo "\n"."<br />";
	}
}

echo $div_close."\n";
echo $div_close."\n";

?>