<?php

$i = 0;
$total_buttons_created = 0;
$computer_buttons = array();
$mobile_buttons = array();

$hide_computer_buttons_bar = '<br />'."\n".'<center><button id="hide_computer_buttons" class="w3-center w3-btn '.$first_button_style.' '.$computer_variable.'" '.$roundedborderstyle.' onclick="Hide_Computer_Buttons();"><h2>'.$icons[17].'</h2></button></center>'."\n";

$show_computer_buttons_bar = '<button id="show_computer_buttons" class="w3-center w3-btn '.$first_button_style.' '.$computer_variable.'" style="display:none;float:right;'.$rounded_border_style_2.'" onclick="Show_Computer_Buttons();"><h2>'.$icons[18].'</h2></button>'."\n";

$open_mobile_buttons_sidebar = '<button id="show_mobile_buttons" class="w3-center w3-btn '.$first_button_style.' '.$mobile_variable.'" style="float:left;position:fixed;'.$rounded_border_style_2.'" onclick="Show_Mobile_Buttons();"><h2>'.$icons[16].'</h2></button>'."\n";

$tabnamestxt = $tabnames;

if ($website_name == $website_diario) {
	include $websites_tab_button_maker;
	$tabnumb2 = $tabnumb;
}

if ($website_name == $website_watch_history) {
	$tabnumb2 = $tabnumb - 3;
	$tabnamestxt = $tab_titles_without_html;
}

if ($website_name == $website_2018) {
	$tabnumb2 = $tabnumb;
}

if ($website_name == $website_2019) {
	$tabnumb2 = $tabnumb - 5;
}

if ($website_name == $website_the_life_of_littletato) {
	$tabnumb2 = $tabnumb - 1;
}

if ($website_name == $website_spaceliving) {
	$tabnumb2 = $tabnumb;
}

if ($website_name == $website_nazzevo) {
	$tabnumb2 = $tabnumb;
}

if (isset($tabnumb2) == False) {
	$tabnumb2 = $tabnumb;
}

if ($website_deactivate_top_buttons_setting == false) {

	#######################################

	# Computer buttons bar generation     #

	#######################################

	echo '
<!--- Computer Button bar on the top -->
';

	echo '<div id="computer_buttons_bar" class="w3-center w3-bar mobileHide w3-animate-top" style="position:fixed;float:right;">'."\n";
	$sitebtnecho = True;

	if ($website_name == $website_the_life_of_littletato) {
		$hide_notification_attribute = 'Hide_Notification();';
	}

	else {
		$hide_notification_attribute = '';
	}

	while ($i <= $tabnumb) {
		if ($i == $tabnumb and $website_name == $website_diario) {
			$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

			$computer_buttons[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".';'.$script.'">'.$tabtxts[$i].'</button></a>'."\n".$spanc."\n"."\n";

			$total_buttons_created++;
		}

		else {
			if ($i == 0 and $website_has_notifications == True and $website_hides_notification_on_clicking_on_read_tab_setting == True) {
				$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

				$computer_buttons[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="'.$hide_notification_attribute.'openCity('."'".$tabcodes[$i]."')".';'.$script.'">'.$tabtxts[$i].'</button></a>'."\n".$spanc."\n"."\n";

				$total_buttons_created++;
			}

			else {
				$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

				$computer_buttons[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".';'.$script.'">'.$tabtxts[$i].'</button></a>'."\n".$spanc."\n"."\n";

				$total_buttons_created++;
			}
		}

		if ($i <= $tabnumb2 and $website_name != $website_2019) {
			if (strpos($computer_buttons[$i], 'Comment') and strpos($computer_buttons[$i], 'Comentar' and $website_has_comments_tab_setting == True)) {
				#echo $computer_buttons[$i];
			}

			else {
				echo $computer_buttons[$i];
			}
		}

		if ($i <= $tabnumb and $website_name == $website_2019) {
			echo $computer_buttons[$i];
		}

		if ($website_name == $website_diario and $sitebtnecho == True and $i == $tabnumb) {
			echo ' '.$websites_tab_button_not_centered;

			$sitebtnecho = false;
		}

		$i++;
	}

	if ($website_name == $website_watch_history) {
		echo $computer_buttons[5];
	}

	if ($website_name == $website_the_life_of_littletato) {
		echo $computer_buttons[5];
	}

	$i = 0;
	while ($i <= $tabnumb) {
		$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

		$yellow_computer_buttons[$i] = '<span title="'.$tabnamestxt[$i].'" alt="'.$tabnamestxt[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button class="w3-btn '.$default_text_color." ".$background_yellow_css_class." ".$second_full_border." ".$default_background_hover_color.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".';'.$script.'">'.$tabtxts[$i].'</button></a>'.$spanc."\n";

		$total_buttons_created++;
	
		$i++;
	}

	echo $hide_computer_buttons_bar.
	$div_close."\n"."\n".
	'<!-- "Show Computer Buttons" button bar -->
<div id="show_computer_button_bar" class="w3-bar" style="position:fixed;float:right;">'."\n".
	$show_computer_buttons_bar.$div_close."\n";


	#######################################

	# Mobile buttons sidebar generation   #

	#######################################

	echo '
<!--- Mobile Button bar at the left -->';

	echo "\n".'<div id="mobile_button_sidebar" class="w3-center mobile_button_sidebar_css mobileShow ">'."\n"."\n".
	'<a href="javascript:void(0)" class="close_mobile_sidebar_button" onclick="Hide_Mobile_Buttons();" style="font-size:35px;"><i class="fas fa-times-circle"></i></a>'."\n"."\n".
	'<span style="font-size:30px;" class="'.$mobile_variable.' '.$first_text_color.'">'.$btnmenutxt.'</span>'."\n"."\n";
	
	$i = 0;
	while ($i <= $tabnumb) {
		$script = 'Define_Button('."'".'mobile_button_'.($i + 1)."'".');Change_Button_Color();';

		$i2 = $i + 1;
	
		if ($i == $tabnumb and $website_name == $website_diario) {
			$script = 'Define_Button('."'".'mobile_button_'.($i + 1)."'".');Change_Button_Color();';

			$mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".';'.$script.'">'.$tabtxtsm[$i].'</button></a>';

			$total_buttons_created++;
		}
	
		else {
			$script = 'Define_Button('."'".'mobile_button_'.($i + 1)."'".');Change_Button_Color();';

			if ($i == 0 and $website_has_notifications == True and $website_hides_notification_on_clicking_on_read_tab_setting == True) {
				$mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="'.$hide_notification_attribute.'openCity('."'".$tabcodesm[$i]."')".';'.$script.'">'.$tabtxtsm[$i].'</button></a>';

				$total_buttons_created++;
			}
	
			else {
				$mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".';'.$script.'">'.$tabtxtsm[$i].'</button></a>';

				$total_buttons_created++;
			}
		}

		if ($i <= $tabnumb2 and $website_name != $website_2019) {
			echo $mobile_buttons[$i];
		}

		if ($i != $tabnumb) {
			echo "\n";
		}

		if ($i <= $tabnumb and $website_name == $website_2019) {
			echo $mobile_buttons[$i];
		}

		if ($i != $tabnumb) {
			echo "\n";
		}

		if ($website_name == $website_diario and $sitebtnecho == True and $i == $tabnumb) {
			echo ' '.$websites_tab_button_not_centered;

			$sitebtnecho = false;
		}

		$i++;
	}

	if ($website_name == $website_watch_history) {
		echo $mobile_buttons[7]."\n"."\n";
	}

	if ($website_name == $website_the_life_of_littletato) {
		echo $mobile_buttons[5]."\n"."\n";
	}

	$i = 0;
	while ($i <= $tabnumb) {
		$script = 'Define_Button('."'".'mobile_button_'.($i + 1)."'".');Change_Button_Color();';

		$yellow_mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button class="w3-btn '.$default_text_color." ".$background_yellow_css_class." ".$second_full_border." ".$default_background_hover_color.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".';'.$script.'">'.$tabtxtsm[$i].'</button></a>';

		$i++;
		$total_buttons_created++;
	}
	
	echo "\n".$div_close."\n"."\n".
	$mobile_div.$open_mobile_buttons_sidebar.$div_close;
}

if ($website_name == $website_watch_history) {
	$archived_media_buttons_array = array();

	$current_variable_year = 2018;

	$i = 0;
	while ($current_variable_year <= $current_year - 1) {
		$script = 'Define_Button('."'".'watched_archived_button_'.($i + 1)."'".');Change_Button_Color();';

		$text = $archived_media_text.' '.$current_variable_year.': ['.${"watched_number_".$current_variable_year}.']';
		$html = $archived_media_text.' '.$current_variable_year.' ['.${"watched_number_".$current_variable_year}.']: '.$icons[8];
		$code = 'watched'.'-'.strtolower($archived_text).' '.strtolower($current_variable_year);

		$archived_media_buttons_array[$i] = '<span title="'.$text.'" alt="'.$text.'">'."\n".'<a href="#'.$code.'"><button id="watched_archived_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$code."')".';'.$script.'">'.'<'.$n.'>'.$html.'</'.$n.'>'.'</button></a>'."\n".$spanc."\n"."\n";

		$current_variable_year++;
		$i++;
		$total_buttons_created++;
	}

	$archived_media_buttons = "";

	foreach ($archived_media_buttons_array as $button) {
		$archived_media_buttons .= $button."<br />";
	}

	#######################################

	#      Mobile buttons generation      #

	#######################################

	$archived_media_mobile_buttons_array = array();

	$current_variable_year = 2018;

	$i = 0;
	while ($current_variable_year <= $current_year - 1) {
		$script = 'Define_Button('."'".'watched_archived_button_'.($i + 1)."'".');Change_Button_Color();';

		$text = $archived_media_text.' '.$current_variable_year.': ['.${"watched_number_".$current_variable_year}.']';
		$html = $archived_media_text.' '.$current_variable_year.' ['.${"watched_number_".$current_variable_year}.']: '.$icons[8];
		$code = 'watched'.'-'.strtolower($archived_text).' '.strtolower($current_variable_year).'_mobile';

		$archived_media_mobile_buttons_array[$i] = '<span title="'.$text.'" alt="'.$text.'">'."\n".'<a href="#'.$code.'"><button id="watched_archived_mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$code."')".';'.$script.'">'.'<'.$m.'>'.$html.'</'.$m.'>'.'</button></a>'."\n".$spanc."\n"."\n";

		$current_variable_year++;
		$i++;
		$total_buttons_created++;
	}

	$archived_media_mobile_buttons = "";

	foreach ($archived_media_mobile_buttons_array as $button) {
		$archived_media_mobile_buttons .= $button."<br />";
	}
}

echo "<script>
Hide_Mobile_Buttons();
</script>";

?>