<?php

$hide_computer_buttons_bar = '<br />'."\n".'<center><button id="hide_computer_buttons" class="w3-center w3-btn '.$first_button_style.' '.$computer_variable.'" '.$roundedborderstyle.' onclick="Hide_Computer_Buttons();"><h2>'.$icons[17].'</h2></button></center>'."\n";

$show_computer_buttons_bar = '<button id="show_computer_buttons" class="w3-center w3-btn '.$first_button_style.' '.$computer_variable.'" style="display:none;float:right;'.$rounded_border_style_2.'" onclick="Show_Computer_Buttons();"><h2>'.$icons[18].'</h2></button>'."\n";

$open_mobile_buttons_sidebar = '<button id="show_mobile_buttons" class="w3-center w3-btn '.$first_button_style.' '.$mobile_variable.'" style="float:left;position:fixed;'.$rounded_border_style_2.'" onclick="Show_Mobile_Buttons();"><h2>'.$icons[16].'</h2></button>'."\n";

$tabnamestxt = $tab_names;

if ($website_name == $website_diario) {
	require $websites_tab_button_maker;
	$tabnumb2 = $website_tab_number;
}

if ($website_name == $website_watch_history) {
	$tabnumb2 = $website_tab_number - 3;
	$tabnamestxt = $tab_titles_without_html;
}

if ($website_name == $website_2018) {
	$tabnumb2 = $website_tab_number;
}

if ($website_name == $website_2019) {
	$tabnumb2 = $website_tab_number - 5;
}

if ($website_name == $website_the_life_of_littletato) {
	$tabnumb2 = $website_tab_number - 1;
}

if ($website_name == $website_spaceliving) {
	$tabnumb2 = $website_tab_number;
}

if ($website_name == $website_nazzevo) {
	$tabnumb2 = $website_tab_number;
}

if (isset($tabnumb2) == False) {
	$tabnumb2 = $website_tab_number;
}

$i = 0;
$total_buttons_created = 0;

if ($website_deactivate_top_buttons_setting == False) {
	#######################################

	# Computer buttons bar generation     #

	#######################################

	$computer_buttons_bar = "";

	$comment_computer_buttons_bar = "<!--- Computer Button bar on the top -->"."\n";

	$computer_buttons_bar_element = '<div id="computer_buttons_bar" class="w3-center w3-bar mobileHide w3-animate-top" style="position:fixed;float:right;">'."\n";

	$computer_buttons_bar .= $comment_computer_buttons_bar;
	$computer_buttons_bar .= $computer_buttons_bar_element;

	$sitebtnecho = True;

	if ($website_has_notifications == True) {
		$hide_notification_attribute = 'Hide_Notification();';
	}

	else {
		$hide_notification_attribute = '';
	}

	while ($i <= $website_tab_number) {
		if ($i == $website_tab_number and $website_name == $website_diario) {
			$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

			$button = '<span title="'.$tab_names[$i].'" alt="'.$tab_names[$i].'">'."\n".'<a href="#'.$website_tab_codes_computer[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[$i]."')".';'.$script.'">'.$website_tab_titles_computer[$i].'</button></a>'."\n".$spanc."\n"."\n";

			$computer_buttons_bar .= $button;

			$total_buttons_created++;
		}

		else {
			if ($i == 0 and $website_has_notifications == True and $website_hides_notification_on_clicking_on_read_tab_setting == True) {
				$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

				$button = '<span title="'.$tab_names[$i].'" alt="'.$tab_names[$i].'">'."\n".'<a href="#'.$website_tab_codes_computer[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="'.$hide_notification_attribute.'openCity('."'".$website_tab_codes_computer[$i]."')".';'.$script.'">'.$website_tab_titles_computer[$i].'</button></a>'."\n".$spanc."\n"."\n";

				$computer_buttons_bar .= $button;

				$total_buttons_created++;
			}

			else {
				$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

				$button = '<span title="'.$tab_names[$i].'" alt="'.$tab_names[$i].'">'."\n".'<a href="#'.$website_tab_codes_computer[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[$i]."')".';'.$script.'">'.$website_tab_titles_computer[$i].'</button></a>'."\n".$spanc."\n"."\n";

				$computer_buttons_bar .= $button;

				$total_buttons_created++;
			}
		}

		/*
		if ($show_buttons_bar == True) {
			if ($i <= $tabnumb2 and $website_name != $website_2019) {
				echo $computer_buttons[$i];
			}

			if ($i <= $website_tab_number and $website_name == $website_2019) {
				echo $computer_buttons[$i];
			}

			if ($website_name == $website_diario and $sitebtnecho == True and $i == $website_tab_number) {
				echo ' '.$websites_tab_button_not_centered;

				$sitebtnecho = False;
			}
		}
		*/

		$i++;
	}

	$hide_computer_buttons_element = $hide_computer_buttons_bar.
	$div_close."\n"."\n".
	'<!-- "Show Computer Buttons" button bar -->'."\n".
	'<div id="show_computer_button_bar" class="w3-bar" style="position:fixed;float:right;">'."\n".
	$show_computer_buttons_bar.$div_close;

	$computer_buttons_bar .= $hide_computer_buttons_element."\n";

	#######################################

	# Mobile buttons sidebar generation   #

	#######################################

	$mobile_buttons_bar = "";

	$comment_mobile_buttons_bar = "\n".
	'<!--- Mobile Button bar at the left -->'."\n";

	$mobile_buttons_bar_element = '<div id="mobile_button_sidebar" class="w3-center mobile_button_sidebar_css mobileShow ">'."\n"."\n".
	'<a href="javascript:void(0)" class="close_mobile_sidebar_button" onclick="Hide_Mobile_Buttons();" style="font-size:35px;">'."\n".
	'<i class="fas fa-times-circle"></i>'."\n".
	"</a>"."\n"."\n".
	'<span style="font-size:30px;" class="'.$mobile_variable.' '.$first_text_color.'">'.$mobile_buttons_menu_text.': </span>'."\n"."\n";

	$mobile_buttons_bar .= $comment_mobile_buttons_bar;
	$mobile_buttons_bar .= $mobile_buttons_bar_element;
	
	$i = 0;
	while ($i <= $website_tab_number) {
		$script = 'Define_Button('."'".'mobile_button_'.($i + 1)."'".');Change_Button_Color();';

		$i2 = $i + 1;
	
		if ($i == $website_tab_number and $website_name == $website_diario) {
			$script = 'Define_Button('."'".'mobile_button_'.($i + 1)."'".');Change_Button_Color();';

			$button = '<a href="#'.$website_tab_codes_mobile[$i].'" onclick="Hide_Mobile_Buttons();">'."\n".'<button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i]."')".';'.$script.'">'."\n".$website_tab_titles_mobile[$i]."\n".'</button>'."\n".'</a>';

			$mobile_buttons_bar .= $button."\n";

			$total_buttons_created++;
		}
	
		else {
			$script = 'Define_Button('."'".'mobile_button_'.($i + 1)."'".');Change_Button_Color();';

			if ($i == 0 and $website_has_notifications == True and $website_hides_notification_on_clicking_on_read_tab_setting == True) {
				$button = '<a href="#'.$website_tab_codes_mobile[$i].'" onclick="Hide_Mobile_Buttons();">'."\n".'<button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="'.$hide_notification_attribute.'openCity('."'".$website_tab_codes_mobile[$i]."')".';'.$script.'">'."\n".$website_tab_titles_mobile[$i]."\n".'</button>'."\n".'</a>';

				$mobile_buttons_bar .= $button."\n";

				$total_buttons_created++;
			}
	
			else {
				$button = '<a href="#'.$website_tab_codes_mobile[$i].'" onclick="Hide_Mobile_Buttons();">'."\n".'<button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i]."')".';'.$script.'">'."\n".$website_tab_titles_mobile[$i]."\n".'</button>'."\n".'</a>';

				$mobile_buttons_bar .= $button."\n";

				$total_buttons_created++;
			}
		}

		/*
		if ($show_buttons_bar == True) {
			if ($i <= $tabnumb2 and $website_name != $website_2019) {
				echo $mobile_buttons[$i];
			}

			if ($i != $website_tab_number) {
				echo "\n";
			}

			if ($i <= $website_tab_number and $website_name == $website_2019) {
				echo $mobile_buttons[$i];
			}

			if ($i != $website_tab_number) {
				echo "\n";
			}

			if ($website_name == $website_diario and $sitebtnecho == True and $i == $website_tab_number) {
				echo ' '.$websites_tab_button_not_centered;

				$sitebtnecho = False;
			}
		}
		*/

		$i++;
	}

	$close_mobile_div = "\n".$div_close."\n"."\n".
	$mobile_div.$open_mobile_buttons_sidebar.$div_close;

	$mobile_buttons_bar .= $close_mobile_div;
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

		$archived_media_buttons_array[$i] = '<span title="'.$text.'" alt="'.$text.'">'."\n".'<a href="#'.$code.'"><button id="watched_archived_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$code."')".';'.$script.'">'.'<'.$h2_element.'>'.$html.'</'.$h2_element.'>'.'</button></a>'."\n".$spanc."\n"."\n";

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

		$archived_media_mobile_buttons_array[$i] = '<span title="'.$text.'" alt="'.$text.'">'."\n".'<a href="#'.$code.'"><button id="watched_archived_mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$code."')".';'.$script.'">'.'<'.$h4_element.'>'.$html.'</'.$h4_element.'>'.'</button></a>'."\n".$spanc."\n"."\n";

		$current_variable_year++;
		$i++;
		$total_buttons_created++;
	}

	$archived_media_mobile_buttons = "";

	foreach ($archived_media_mobile_buttons_array as $button) {
		$archived_media_mobile_buttons .= $button."<br />";
	}
}

$website_buttons = $computer_buttons_bar."\n".$mobile_buttons_bar;

?>