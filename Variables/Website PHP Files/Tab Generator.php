<?php 

$tabs_folder = $website_folder."Tabs/";
$tab_contents_folder = $tabs_folder."Contents/";

Create_Folder($tabs_folder);
Create_Folder($tab_contents_folder);

# Array of button names
$i = 1;
while ($i <= $website_tab_number + 1) {
	$contents_file = $tab_contents_folder."$i.php";

	if (file_exists($contents_file) == False) {
		Create_File($contents_file);

		Write_To_File($contents_file, "<?php "."\n\n\n\n"."?>");
	}

	$i++;
}

# Array of button names
$i = 0;
while ($i <= $website_tab_number) {
	$text_size = "h2";

	if (isset($tab_texts[$i])) {
		$website_tab_titles_computer[$i] = "<".$text_size.">".$tab_texts[$i]."</".$text_size.">";
	}

	$i++;
}

if ($website_title == $website_titles["Things I Do"]) {
	$i = 0;
	while ($i <= $website_tab_number) {
		if ($i < 1) {
			$text_size = "h6";	
		}

		if ($i > 1) {
			$text_size = "h4";	
		}

		$website_tab_titles_mobile[$i] = "<".$text_size.">".$tab_texts[$i]."</".$text_size.">";
		$i++;
	}
}

else {
	# Array of mobile button names
	$i = 0;
	while ($i <= $website_tab_number) {
		$text_size = "h4";

		$website_tab_titles_mobile[$i] = "<".$text_size.">".$tab_texts[$i]."</".$text_size.">";
	
		$i++;
	}
}

if ($website_title_backup == $website_titles["Watch History"]) {
	# Citycodes array generator
	$i = 0;
	while ($i <= $website_tab_number) {
		if ($i < 3) {
			$tab_codes[$i] = $website."-".strtolower($tab_names[$i]);
		}
	
		if ($i >= 3) {
			$tab_codes[$i] = "watched_".strtolower($tab_names[$i]);
		}
		
		if ($i == 7) {
			$tab_codes[$i] = strtolower($tab_names[7]);
		}
	
		$i++;
	}
}

else {
	# Array of button codes
	$i = 0;
	while ($i <= $website_tab_number) {
		$tab_codes[$i] = Remove_Non_File_Characters($website_name)."-".strtolower($tab_names[$i]);

		$i++;
	}
}

# Array of city codes
$i = 0;
while ($i <= $website_tab_number) {
	$website_tab_codes_computer[$i] = $tab_codes[$i];

	$i++;
}

# Array of mobile city codes
$i = 0;
while ($i <= $website_tab_number) {
	$website_tab_codes_mobile[$i] = $tab_codes[$i].'_Mobile';

	$i++;
}

$hide_tabs_text = "";

if ($website_hide_tabs_setting == True) {
	$hide_tabs_text = 'style="display:none;"';
}

if ($website_settings["tab_body_generator"] == False) {
	# Array of the city body files
	$i = 0;
	$i2 = $i + 1;

	#$citybodyfiles_array[$i] = $website_folder.'CityBody'.$i2.'.php';

	if (file_exists($website_folder."CityBody".$i2.".php")) {
		while ($i <= $website_tab_number) {
			$i2 = $i + 1;

			$city_body_files[$i] = $website_folder."CityBody".$i2.".php";

			$i++;
		}
	}

	else {
		if (in_array($website_language, $en_languages_array)) {
			$city_body_place_holder = "Placeholder for the Body of the Tab: [Icon]";
		}

		if (in_array($website_language, $pt_languages_array)) {
			$city_body_place_holder = "Espaço reservado para o Corpo da Aba: [Ícone]";
		}

		$city_body_files[$i] = $city_body_place_holder;
	}
}

if ($website_title_backup == $website_titles["Watch History"]) {
	# Include the buttons loader PHP file
	require $website_buttons_generator_php;

	# Every Watched Button Computer
	$every_watched_button_computer = $computer_buttons[0].$computer_buttons[2].$computer_buttons[3];

	# Mobile Every Watched Button
	$every_watched_button_mobile = $mobile_buttons[0].$mobile_buttons[2].$mobile_buttons[3];
}

if ($website_title_backup == $website_titles["Things I Do"]) {
	# Include the buttons loader PHP file
	require $website_buttons_generator_php;
}

#City body files includer
$i = 0;
while ($i <= $website_tab_number) {
	if (isset($city_body_files[$i])) {
		if (file_exists($city_body_files[$i])) {
			require $city_body_files[$i];
		}
	}

	$i++;
}

if ($website_title == $website_titles["Things I Do"]) {
	# Include the buttons loader PHP file
	require $website_buttons_generator_php;
}

# Comments Tab includer if the setting is True
if ($website_has_comments_tab == True or $story_name_has_write_form == True) {
	require $website_forms_php;
}

# Stories Tab includer if the setting is True
if ($website_has_stories_tab_setting == True) {
	require $story_variables_php;
}

if ($website_settings["tab_body_generator"] == True) {
	require $tab_bodies_generator_php_variable;
}

$first_number = 0;
$second_number = 1;

# "Tab Contents" array generator
while ($first_number <= $website_tab_number + 1) {
	$tab_contents_file = $website_folder."Tabs/Contents/".$second_number.'.php';

	if (file_exists($tab_contents_file) == True) {
		ob_start();

		require $tab_contents_file;

		$tab_contents[$first_number] = ob_get_clean();
	}

	else {
		$text = Language_Item_Definer("Placeholder for the Content of the Tab", "Espaço reservado para o Conteúdo da Aba").".";

		$tab_content_place_holder = $div_zoom_animation.$text.$div_close;

		$tab_contents[$first_number] = $tab_content_place_holder;
	}

	$first_number++;
	$second_number++;
}

# Tab Contents array generator
$i = 0;
while ($i <= $website_tab_number) {
	$i2 = $i + 1;

	if (isset($tab_bodies[$i])) {
		if (isset($tab_html_titles)) {
			$content_of_tabs[$i] = $tab_html_titles[$i].$tab_bodies[$i].$tab_contents[$i];
		}

		if (!isset($tab_html_titles)) {
			$content_of_tabs[$i] = $tab_bodies[$i].$tab_contents[$i];
		}
	}

	else {
		if (isset($tab_html_titles)) {
			$content_of_tabs[$i] = $tab_html_titles[$i].$tab_contents[$i];
		}

		if (!isset($tab_html_titles)) {
			$content_of_tabs[$i] = $tab_contents[$i];
		}
	}

	$i++;
}

if ($website_title != $website_titles["Things I Do"] and $website_title != $website_titles["Watch History"]) {
	# Require the Computer Buttons Bar Loader PHP file
	require $website_buttons_generator_php;
}

$hide_tabs_text = "";

if ($website_hide_tabs_setting == True) {
	$hide_tabs_text = 'style="display:none;"';
}

$big_space = '<div class="mobileHide"><br /><br /><br /><br /><br /><br /><br /><br /></div>';

if ($website_not_so_much_space_setting == True) {
	$big_space = "";
}

$tab_template = "<a id=\"{}\" name=\"{}\"></a>
<div id=\"{}\" class=\"".$tab_style."\" ".$hide_tabs_text.">".
    $big_space."\n".
    Create_Element("h2", $computer_variable." ".$full_tab_style, Create_Element("div", "", "<div id=\"computer_tab_content_{}\">"."\n"."{}"."\n"."</div>"."\n", "style=\"margin:3%;\""), "style=\"margin:10%;border-radius: 50px;\"")."\n"."
</div>\n\n
<a id=\"{}\" name=\"{}\"></a>
<div id=\"{}\" class=\"".$tab_style_mobile."\" ".$hide_tabs_text.">".
    $big_space."\n".
    Create_Element("h4", $mobile_variable.' '.$full_tab_style, Create_Element("div", "", "<div id=\"mobile_tab_content_{}\">"."\n"."{}"."\n"."</div>"."\n", "style=\"margin:3%;\""), "style=\"margin:10%;border-radius: 50px;\"")."\n"."
</div>\n\n";

$div_close."\n"."\n";

# Array of the Generic Tabs PHP Files
$i = 0;
while ($i <= $website_tab_number) {
	$i2 = $i + 1;

	$array_to_format = array(
	"computer_tab_$i2", $website_tab_codes_computer[$i], $website_tab_codes_computer[$i], $i2, $content_of_tabs[$i],
	"mobile_tab_$i2", $website_tab_codes_mobile[$i], $website_tab_codes_mobile[$i], $i2, $content_of_tabs[$i],
	);

	$website_tabs[$i] = format($tab_template, $array_to_format);

	$i++;
}

?>