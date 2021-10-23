<?php 

$use_variable_inserter = False;

echo Create_Element("b", "", Language_Item_Definer("Author", "Autor").": ").$person_names_array["Izaque"]."\n"."<br />";

$read_file = False;

foreach ($data_file_names as $file_name) {
	$file = $data_files[$file_name];
	$file_name = Language_Item_Definer($file_name, $data_file_names_translated[$file_name]);

	$add_br = False;

	$file_name_title = Create_Element("b", "", $file_name.": ")."\n";

	if ($add_br == True) {
		$file_name_title .= "<br />";
	}

	echo $file_name_title;

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

			elseif ($file_name == Language_Item_Definer("People", "Pessoas")) {
				Show($text." ".Define_Text_By_Number((int)Read_Lines($file)[0], Language_Item_Definer("person", "pessoa"), Language_Item_Definer("people", "pessoas")), $add_br);
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

					#Show($text, $add_br = True);
					#Show(array_reverse(Read_Lines($file))[0], $add_br = True);

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
			Show(Line_Number($file), $add_br);
		}

		elseif (in_array($file_name, $number_in_first_line_files) == True) {
			Show(Read_Lines($file)[0], $add_br = $add_br);

			if ($file_name == Language_Item_Definer("Media Comments", "Comentários de Mídia")) {
				echo "\n"."<br />";
			}
		}
	}

	echo "\n"."<br />";
}

?>