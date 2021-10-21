<?php 

$use_variable_inserter = False;

foreach ($data_file_names as $file_name) {
	$file = $data_files[$file_name];
	$file_name = Language_Item_Definer($file_name, $data_file_names_translated[$file_name]);

	echo Create_Element("b", "", $file_name.": ")."\n"."<br />";

	foreach (Read_Lines($file) as $text) {
		if ($file_name == Language_Item_Definer("New Stories", "Novas Histórias")) {
			Show(explode(", ", $text)[Language_Item_Definer(0, 1)], $add_br = True);
		}

		else {
			Show($text, $add_br = True);
		}
	}

	echo "\n"."<br />";
}

?>