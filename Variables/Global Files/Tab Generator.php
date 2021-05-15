<?php 

# Array of button names
$i = 0;
while ($i <= $website_tab_number) {
	$text_size = 'h2';

	if (isset($citiestxts[$i])) {
		$citytxts[$i] = '<'.$text_size.'>'.$citiestxts[$i].'</'.$text_size.'>';
	}

	$i++;
}

# Array of tab texts
$i = 0;
while ($i <= $website_tab_number) {
	$tabtxts[$i] = $citytxts[$i];

	$i++;
}

if ($website_name == $website_things_i_do) {
	$i = 0;
	while ($i <= $website_tab_number) {
		if ($i < 1) {
			$text_size = 'h6';	
		}

		if ($i > 1) {
			$text_size = 'h4';	
		}

		$citytxts[$i] = '<'.$text_size.'>'.$citiestxts[$i].'</'.$text_size.'>';
		$i++;
	}
}

else {
	# Array of mobile button names
	$i = 0;
	while ($i <= $website_tab_number) {
		$text_size = 'h4';
		$citytxts[$i] = '<'.$text_size.'>'.$citiestxts[$i].'</'.$text_size.'>';
	
		$i++;
	}
}

# Array of mobile tab texts
$i = 0;
while ($i <= $website_tab_number) {
	$tabtxtsm[$i] = $citytxts[$i];

	$i++;
}

if ($website_name == $website_watch_history) {
	# Citycodes array generator
	$i = 0;
	while ($i <= $website_tab_number) {
		if ($i < 3) {
			$citycodes[$i] = $website.'-'.strtolower($tabnames[$i]);
		}
	
		if ($i >= 3) {
			$citycodes[$i] = 'watched'.'-'.strtolower($tabnames[$i]);
		}
		
		if ($i == 7) {
			$citycodes[$i] = strtolower($tabnames[7]);
		}
	
		$i++;
	}
}

else {
	# Array of button codes
	$i = 0;
	while ($i <= $website_tab_number) {
		$citycodes[$i] = $website.'-'.strtolower($tabnames[$i]);

		$i++;
	}
}

# Array of city codes
$i = 0;
while ($i <= $website_tab_number) {
	$tabcodes[$i] = $citycodes[$i];

	$i++;
}

# Array of mobile city codes
$i = 0;
while ($i <= $website_tab_number) {
	$tabcodesm[$i] = $citycodes[$i].'m';

	$i++;
}

if ($website_hide_tabs_setting == True) {
	$hide_tabs_text = 'style="display:none;"';
}

if ($website_hide_tabs_setting != True) {
	$hide_tabs_text = '';
}

if ($website_uses_tab_body_generator == False) {
	# Array of the city body files
	$i = 0;
	$i2 = $i + 1;

	#$citybodyfiles_array[$i] = $selected_website_folder.'CityBody'.$i2.'.php';

	if (file_exists($selected_website_folder.'CityBody'.$i2.'.php')) {
		while ($i <= $website_tab_number) {
			$i2 = $i + 1;

			$city_body_files[$i] = $selected_website_folder.'CityBody'.$i2.'.php';

			$i++;
		}
	}

	else {
		if (in_array($website_language, $en_languages_array)) {
			$city_body_place_holder = 'Placeholder for the Body of the Tab: [Icon]';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$city_body_place_holder = 'Espaço reservado para o Corpo da Aba: [Ícone]';
		}

		$city_body_files[$i] = $city_body_place_holder;
	}
}

if ($website_name == $website_watch_history) {
	# Include the buttons loader PHP file
	require $computer_buttons_bar_loader;

	# Every Watched Button Computer
	$every_watched_button_computer = $computer_buttons[0].$computer_buttons[3].$computer_buttons[4];

	# Mobile Every Watched Button
	$every_watched_button_mobile = $mobile_buttons[0].$mobile_buttons[3].$mobile_buttons[4];

	# Every Archived Button Yellow
	#$every_archived_medias_button = $div_left_animation.$computer_buttons[5].$div_close.$div_right_animation.$computer_buttons[5].$div_close;

	# Mobile Every Archived Button Yellow
	#$every_archived_medias_button_mobile = $div_left_animation.$mobile_buttons[5].$div_close.$div_right_animation.$mobile_buttons[5].$div_close;
}

if ($website_name == $website_things_i_do) {
	# Include the buttons loader PHP file
	require $computer_buttons_bar_loader;
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

if ($website_name == $website_things_i_do) {
	#Include the buttons loader PHP file
	require $computer_buttons_bar_loader;
}

# Comments Tab includer if the setting is True
if ($website_has_comments_tab == True or $story_name_has_write_form == True) {
	require $website_forms_php;
}

# Stories Tab includer if the setting is True
if ($website_has_stories_tab_setting == True) {
	require $story_variables_php;
}

if ($website_uses_tab_body_generator == True) {
	require $tab_bodies_generator_php_variable;
}

$first_number = 0;
$second_number = 1;

# "Tab Contents" array generator
while ($first_number <= $website_tab_number + 1) {
	$tab_contents_file = $selected_website_folder."Tabs/Contents/".$second_number.'.php';

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

#Citiescontent array generator
$i = 0;
while ($i <= $website_tab_number) {
	$i2 = $i + 1;

	if (isset($city_bodies[$i])) {
		if (isset($city_titles)) {
			$city_contents[$i] = $city_titles[$i].$city_bodies[$i].$tab_contents[$i];
		}

		if (!isset($city_titles)) {
			$city_contents[$i] = $city_bodies[$i].$tab_contents[$i];
		}
	}

	else {
		#print_r($city_titles);
		if (isset($city_titles)) {
			$city_contents[$i] = $city_titles[$i].$tab_contents[$i];
		}

		if (!isset($city_titles)) {
			$city_contents[$i] = $tab_contents[$i];
		}
	}

	$i++;
}

if ($website_name != $website_things_i_do and $website_name != $website_watch_history) {
	#Include the buttons loader PHP file
	require $computer_buttons_bar_loader;
}

?>