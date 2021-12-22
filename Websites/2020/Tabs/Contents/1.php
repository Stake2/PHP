<?php 

echo $div_zoom_animation."\n";
echo '<div style="text-align:left;">'."\n";

$website_settings["variable_inserter"] = False;

$year_summary_text = "";

$year_summary_text .= Language_Item_Definer("Author", "Autor").": ".$person_names_array["Izaque"]."\n";
$year_summary_text .= Language_Item_Definer("Created In", $data_file_names_translated["Created In"]).": ".$data_texts["Created In"][0]."\n";
$year_summary_text .= Language_Item_Definer("Edited In", $data_file_names_translated["Edited In"]).": ".$data_texts["Edited In"][0]."\n";

echo Create_Element("b", "", Language_Item_Definer("Author", "Autor").": ").$person_names_array["Izaque"]."\n"."<br />";
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
				#echo "\n"."<br />";
			}
		}
	}
}

$year_summary_text .= "\n-----\n\n";

echo "\n"."<br />";
echo Create_Element("b", "", "-----")."\n";
echo "\n"."<br />";
echo "\n"."<br />";

$year_summary_text .= Language_Item_Definer("Things Done In", "Coisas Feitas Em")." ".$local_website_name.": ".$total_things_done_on_current_year."\n";

echo Create_Element("b", "", Language_Item_Definer("Things Done In", "Coisas Feitas Em")." ".$local_website_name.": ").$total_things_done_on_current_year."\n";
echo "\n"."<br />";

$local_number = 0;
foreach ($data_file_names as $file_name) {
	$file = $data_files[$file_name];
	$file_name = Language_Item_Definer($file_name, $data_file_names_translated[$file_name]);

	$add_br = False;

	$file_name_title = Create_Element("b", "", $file_name.": ")."\n";

	$year_summary_text .= $file_name.": ";

	if ($add_br == True) {
		$file_name_title .= "<br />";
		$year_summary_text .= "\n";
	}

	echo $file_name_title;

	if (in_array($file_name, $files_to_show_number) == False) {
		$i = 1;
		foreach (Read_Lines($file) as $text) {
			if ($file_name == Language_Item_Definer("New Stories", "Novas Histórias")) {
				echo "\n"."<br />";

				$year_summary_text .= "\n";

				Show((string)$i." - ".explode(", ", $text)[Language_Item_Definer(0, 1)], $add_br);

				$year_summary_text .= (string)$i." - ".explode(", ", $text)[Language_Item_Definer(0, 1)];

				if ($add_br == True) {
					$year_summary_text .= "\n";
				}

				if ($text == array_reverse(Read_Lines($file))[0]) {
					echo "\n"."<br />";
					$year_summary_text .= "\n";
				}
			}

			elseif ($file_name == Language_Item_Definer("People", "Pessoas")) {
				$text_to_show = $text." ".Define_Text_By_Number((int)Read_Lines($file)[0], Language_Item_Definer("person", "pessoa"), Language_Item_Definer("people", "pessoas"));

				Show($text_to_show, $add_br);

				$year_summary_text .= $text_to_show;
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

				$year_summary_text .= "\n".$text;

				if ($text_backup == array_reverse(Read_Lines($file))[0]) {
					echo "\n"."<br />";
					$year_summary_text .= "\n";
				}

				if ($add_br == True) {
					$year_summary_text .= "\n";
				}
			}

			else {
				if (count(Read_Lines($file)) <= 1) {
					Show($text, $add_br);

					$year_summary_text .= $text;
				}

				else {
					if ($text == Read_Lines($file)[0]) {
						echo "\n"."<br />";

						$year_summary_text .= "\n";
					}

					if (in_array($file_name, $countable_files)) {
						Show((string)$i." - ".$text, $add_br = True);

						$year_summary_text .= (string)$i." - ".$text."\n";
					}

					else {
						Show($text, $add_br = True);

						$year_summary_text .= $text."\n";
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
			Show(Line_Number($file), $add_br);

			$year_summary_text .= Line_Number($file);

			if ($add_br == True) {
				$year_summary_text .= "\n";
			}
		}

		elseif (in_array($file_name, $number_in_first_line_files) == True) {
			Show(Read_Lines($file)[0], $add_br = $add_br);

			$year_summary_text .= Read_Lines($file)[0];

			if ($add_br == True) {
				$year_summary_text .= "\n";
			}

			if ($file_name == Language_Item_Definer("Media Comments", "Comentários de Mídia")) {
				echo "\n"."<br />";
				$year_summary_text .= "\n";
			}
		}
	}

	if ($local_number != count(array_keys($data_file_names))) {
		$year_summary_text .= "\n";
	}

	echo "\n"."<br />";

	$local_number++;
}

echo $div_close."\n";
echo $div_close."\n";

?>