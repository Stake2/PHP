<?php 

#Array of button names
$i = 0;
while ($i <= $tabnumb) {
	$txtsize = 'h2';

	if (isset($citiestxts[$i])) {
		$citytxts[$i] = '<'.$txtsize.'>'.$citiestxts[$i].'</'.$txtsize.'>';
	}

	$i++;
}

#Array of tab texts
$i = 0;
while ($i <= $tabnumb) {
	$tabtxts[$i] = $citytxts[$i];

	$i++;
}

if ($website_name == $sitethingsido or $site == $sitethingsido) {
	$i = 0;
	while ($i <= $tabnumb) {
		if ($i < 1) {
			$txtsize = 'h6';	
		}

		if ($i > 1) {
			$txtsize = 'h4';	
		}

		$citytxts[$i] = '<'.$txtsize.'>'.$citiestxts[$i].'</'.$txtsize.'>';
		$i++;
	}
}

else {
	#Array of mobile button names
	$i = 0;
	while ($i <= $tabnumb) {
		$txtsize = 'h4';
		$citytxts[$i] = '<'.$txtsize.'>'.$citiestxts[$i].'</'.$txtsize.'>';
	
		$i++;
	}
}

#Array of mobile tab texts
$i = 0;
while ($i <= $tabnumb) {
	$tabtxtsm[$i] = $citytxts[$i];

	$i++;
}

if ($website_name == $sitewatch) {
	#Citycodes array generator
	$i = 0;
	while ($i <= $tabnumb) {
		if ($i < 3) {
			$citycodes[$i] = $site.'-'.strtolower($tabnames[$i]);
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
	#Array of button codes
	$i = 0;
	while ($i <= $tabnumb) {
		$citycodes[$i] = $site.'-'.strtolower($tabnames[$i]);

		$i++;
	}
}

#Array of city codes
$i = 0;
while ($i <= $tabnumb) {
	$tabcodes[$i] = $citycodes[$i];

	$i++;
}

#Array of mobile city codes
$i = 0;
while ($i <= $tabnumb) {
	$tabcodesm[$i] = $citycodes[$i].'m';

	$i++;
}

if ($hidecitysetting == true) {
	$hidecitytextvariable = 'style="display:none;"';
}

if ($hidecitysetting != true) {
	$hidecitytextvariable = '';
}

if ($website_uses_tab_body_generator == false) {
	#Array of the city body files
	$i = 0;
	$i2 = $i + 1;

	#$citybodyfiles_array[$i] = $selected_website_folder.'CityBody'.$i2.'.php';

	if (file_exists($selected_website_folder.'CityBody'.$i2.'.php')) {
		while ($i <= $tabnumb) {
			$i2 = $i + 1;

			$citybodyfiles[$i] = $selected_website_folder.'CityBody'.$i2.'.php';

			$i++;
		}
	}

	else {
		if (in_array($website_language, $en_languages_array)) {
			$placeholdercitybody = 'Placeholder for the Body of the Tab: [Icon]';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$placeholdercitybody = 'Espaço reservado para o Corpo da Aba: [Ícone]';
		}

		$citybodyfiles[$i] = $placeholdercitybody;
	}
}

if ($website_name == $sitewatch or $site == $sitewatch) {
	#Include the buttons loader PHP file
	include $computer_buttons_bar_loader;

	#Every Watched Button Yellow
	$every_watched_button_first_button_yellow_computer = $yellow_computer_buttons[0].$computer_buttons[3].$computer_buttons[4];
	$every_watched_button_second_button_yellow_computer = $computer_buttons[0].$yellow_computer_buttons[3].$computer_buttons[4];
	$every_watched_button_third_button_yellow_computer = $computer_buttons[0].$computer_buttons[3].$yellow_computer_buttons[4];

	#Mobile Every Watched Button Yellow
	$every_watched_button_first_button_yellow_mobile = $yellow_mobile_buttons[0].$mobile_buttons[3].$mobile_buttons[4];
	$every_watched_button_second_button_yellow_mobile = $mobile_buttons[0].$yellow_mobile_buttons[3].$mobile_buttons[4];
	$every_watched_button_third_button_yellow_mobile = $mobile_buttons[0].$mobile_buttons[3].$yellow_mobile_buttons[4];

	#Every Archived Button Yellow
	$everyarchbtn = $div_left_animation.$computer_buttons[5].$div_close.$div_right_animation.$computer_buttons[6].$div_close;
	$every_archived_media_button_first_button_yellow = $div_right_animation.$yellow_computer_buttons[5].$div_close.$div_left_animation.$computer_buttons[6].$div_close;
	$every_archived_media_button_second_button_yellow = $div_left_animation.$computer_buttons[5].$div_close.$div_right_animation.$yellow_computer_buttons[6].$div_close;

	#Mobile Every Archived Button Yellow
	$everyarchbtnm = $div_left_animation.$mobile_buttons[5].$div_close.$div_right_animation.$mobile_buttons[6].$div_close;
	$everyarchbtny1m = $div_right_animation.$yellow_mobile_buttons[5].$div_close.$div_left_animation.$mobile_buttons[6].$div_close;
	$everyarchbtny2m = $div_left_animation.$mobile_buttons[5].$div_close.$div_right_animation.$yellow_mobile_buttons[6].$div_close;
}

if ($website_name == $sitethingsido or $site == $sitethingsido or $website_name == $sitetextmaker) {
	#Include the buttons loader PHP file
	include $computer_buttons_bar_loader;
}

#City body files includer
$i = 0;
while ($i <= $tabnumb) {
	if (isset($citybodyfiles[$i])) {
		if (file_exists($citybodyfiles[$i])) {
			include $citybodyfiles[$i];
		}
	}

	$i++;
}

if ($website_name == $sitethingsido or $site == $sitethingsido) {
	#Include the buttons loader PHP file
	include $computer_buttons_bar_loader;
}

#Comments Tab includer if the setting is true
if ($website_has_comments_tab == true or $story_namehaswriteform == true) {
	include $website_forms_php;
}

#Stories Tab includer if the setting is true
if ($sitehasstories == true) {
	include $story_name_variables_php_variable;
}

if ($website_uses_tab_body_generator == true) {
	require $tab_bodies_generator_php_variable;
}

#City content array generator
$zzz = 0;
$zxx = 1;
$tabnumb3 = $tabnumb + 1;
while ($zzz <= $tabnumb3) {
	if (file_exists($selected_website_folder.'CityContent'.$zxx.'.php')) {
		ob_start();
		include $selected_website_folder.'CityContent'.$zxx.'.php';
		$citycontents[$zzz] = ob_get_clean();
		ob_clean();
	}

	else {
		if (in_array($website_language, $en_languages_array)) {
			$placeholdercitycontent = $div_zoom_animation.'Placeholder for the Content of the Tab.'.$div_close;
		}

		if (in_array($website_language, $pt_languages_array)) {
			$placeholdercitycontent = $div_zoom_animation.'Espaço reservado para o Conteúdo da Aba.'.$div_close;
		}

		$citycontents[$zzz] = $placeholdercitycontent;
	}

	$zxx++;
	$zzz++;
}

#Citiescontent array generator
$i = 0;
while ($i <= $tabnumb) {
	$i2 = $i + 1;

	if (isset($citybodies[$i])) {
		if (isset($citytitles)) {
			$citiescontent[$i] = $citytitles[$i].$citybodies[$i].$citycontents[$i];
		}

		if (!isset($citytitles)) {
			$citiescontent[$i] = $citybodies[$i].$citycontents[$i];
		}
	}

	else {
		#print_r($citytitles);
		if (isset($citytitles)) {
			$citiescontent[$i] = $citytitles[$i].$citycontents[$i];
		}

		if (!isset($citytitles)) {
			$citiescontent[$i] = $citycontents[$i];
		}
	}

	$i++;
}

if ($website_name != $sitethingsido or $site != $sitethingsido and $website_name != $sitewatch or $site != $sitewatch) {
	#Include the buttons loader PHP file
	include $computer_buttons_bar_loader;
}

?>