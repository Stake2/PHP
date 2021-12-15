<?php

$hide_computer_buttons_bar = '<br />'."\n".'<center><button id="hide_computer_buttons" class="w3-center w3-btn '.$first_button_style.' '.$computer_variable.'" '.$roundedborderstyle.' onclick="Hide_Computer_Buttons();"><h2>'.$icons[17].'</h2></button></center>'."\n";

$show_computer_buttons_bar = '<button id="show_computer_buttons" class="w3-center w3-btn '.$first_button_style.' '.$computer_variable.'" style="display:none;float:right;'.$rounded_border_style_2.'" onclick="Show_Computer_Buttons();"><h2>'.$icons[18].'</h2></button>'."\n";

$open_mobile_buttons_sidebar = '<button id="show_mobile_buttons" class="w3-center w3-btn '.$first_button_style.' '.$mobile_variable.'" style="float:left;position:fixed;'.$rounded_border_style_2.'" onclick="Show_Mobile_Buttons();"><h2>'.$icons[16].'</h2></button>'."\n";

$tabnamestxt = $tab_names;

$local_website_tab_number = $website_tab_number;

require $websites_tab_button_maker;

if ($website_title == $website_titles["Diary"]) {require $websites_tab_button_maker;
	$local_website_tab_number = $website_tab_number;
}

if ($website_title_backup == $website_titles["Watch History"]) {
	$local_website_tab_number = $website_tab_number_less;
	$tabnamestxt = $tab_titles_without_html;
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
		$hide_notification_attribute = 'Hide_Computer_Notification();Hide_Mobile_Notification();';
	}

	else {
		$hide_notification_attribute = '';
	}

	while ($i <= $website_tab_number) {
		if ($i == $website_tab_number and $website_title == $website_titles["Diary"]) {
			$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

			$button = '<span title="'.$tab_names[$i].'" alt="'.$tab_names[$i].'">'."\n".'<a href="#'.$website_tab_codes_computer[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="Hide_Computer_Buttons();openCity('."'".$website_tab_codes_computer[$i]."')".';'.$script.'">'.$website_tab_titles_computer[$i].'</button></a>'."\n".$spanc."\n"."\n";

			if ($website_settings[$uses_custom_buttons_bar_text] == False) {
				#$computer_buttons_bar .= $button;
			}

			$computer_buttons[$i] = $button;

			$total_buttons_created++;
		}

		else {
			if ($i == 0 and $website_has_notifications == True and $website_hides_notification_on_clicking_on_read_tab_setting == True) {
				$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

				$button = '<span title="'.$tab_names[$i].'" alt="'.$tab_names[$i].'">'."\n".'<a href="#'.$website_tab_codes_computer[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="Hide_Computer_Buttons();'.$hide_notification_attribute.'openCity('."'".$website_tab_codes_computer[$i]."')".';'.$script.'">'.$website_tab_titles_computer[$i].'</button></a>'."\n".$spanc."\n"."\n";

				if ($website_settings[$uses_custom_buttons_bar_text] == False) {
					#$computer_buttons_bar .= $button;
				}

				$computer_buttons[$i] = $button;

				$total_buttons_created++;
			}

			else {
				$script = 'Define_Button('."'".'computer_button_'.($i + 1)."'".');Change_Button_Color();';

				$button = '<span title="'.$tab_names[$i].'" alt="'.$tab_names[$i].'">'."\n".'<a href="#'.$website_tab_codes_computer[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="Hide_Computer_Buttons();openCity('."'".$website_tab_codes_computer[$i]."')".';'.$script.'">'.$website_tab_titles_computer[$i].'</button></a>'."\n".$spanc."\n"."\n";

				if ($website_settings[$uses_custom_buttons_bar_text] == False) {
					#$computer_buttons_bar .= $button;
				}

				$computer_buttons[$i] = $button;

				$total_buttons_created++;
			}
		}

		$i++;
	}

	$hide_computer_buttons_element = $hide_computer_buttons_bar.
	$div_close."\n"."\n".
	'<!-- "Show Computer Buttons" button bar -->'."\n".
	'<div id="show_computer_button_bar" class="w3-bar" style="position:fixed;float:right;">'."\n".
	$show_computer_buttons_bar.$div_close;

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
	
		if ($i == $website_tab_number and $website_title == $website_titles["Diary"]) {
			$script = 'Define_Button('."'".'mobile_button_'.($i + 1)."'".');Change_Button_Color();';

			$button = '<a href="#'.$website_tab_codes_mobile[$i].'" onclick="Hide_Mobile_Buttons();">'."\n".'<button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i]."')".';'.$script.'">'."\n".$website_tab_titles_mobile[$i]."\n".'</button>'."\n".'</a>'."\n";

			if ($website_settings[$uses_custom_buttons_bar_text] == False) {
				#$mobile_buttons_bar .= $button;
			}

			$mobile_buttons[$i] = $button;

			$total_buttons_created++;
		}
	
		else {
			$script = 'Define_Button('."'".'mobile_button_'.($i + 1)."'".');Change_Button_Color();';

			if ($i == 0 and $website_has_notifications == True and $website_hides_notification_on_clicking_on_read_tab_setting == True) {
				$button = '<a href="#'.$website_tab_codes_mobile[$i].'" onclick="Hide_Mobile_Buttons();">'."\n".'<button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="'.$hide_notification_attribute.'openCity('."'".$website_tab_codes_mobile[$i]."')".';'.$script.'">'."\n".$website_tab_titles_mobile[$i]."\n".'</button>'."\n".'</a>'."\n";

				if ($website_settings[$uses_custom_buttons_bar_text] == False) {
					#$mobile_buttons_bar .= $button;
				}

				$mobile_buttons[$i] = $button;

				$total_buttons_created++;
			}
	
			else {
				$button = '<a href="#'.$website_tab_codes_mobile[$i].'" onclick="Hide_Mobile_Buttons();">'."\n".'<button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i]."')".';'.$script.'">'."\n".$website_tab_titles_mobile[$i]."\n".'</button>'."\n".'</a>'."\n";

				if ($website_settings[$uses_custom_buttons_bar_text] == False) {
					#$mobile_buttons_bar .= $button;
				}

				$mobile_buttons[$i] = $button;

				$total_buttons_created++;
			}
		}

		$i++;
	}

	$close_mobile_div = "\n".$div_close."\n"."\n".
	$mobile_div.$open_mobile_buttons_sidebar.$div_close;

	#$mobile_buttons_bar .= $close_mobile_div;
}

$computer_buttons[] = $websites_tab_button_computer;
$mobile_buttons[] = $websites_tab_button_mobile;

if ($website_title_backup == $website_titles["Watch History"]) {
	$archived_media_buttons_array = array();

	$current_variable_year = 2018;

	$i = 0;
	while ($current_variable_year <= $current_year - 1) {
		$script = 'Define_Button('."'".'watched_archived_button_'.($i + 1)."'".');Change_Button_Color();';

		$text = $archived_media_text.' '.$current_variable_year.': ['.${"watched_number_".$current_variable_year}.']';
		$html = $archived_media_text.' '.$current_variable_year.' ['.${"watched_number_".$current_variable_year}.']: '.$icons[8];
		$code = "Watched_".$archived_text."_".$current_variable_year.'_Computer';

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
		$code = "Watched_".$archived_text."_".$current_variable_year.'_Mobile';

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

if ($website_settings[$uses_custom_buttons_bar_text] == False) {
	if (isset($readers) == True and $readers[0] == "No Readers - Sem Leitores") {
		unset($computer_buttons[1]);
		$computer_buttons = array_values($computer_buttons);

		unset($mobile_buttons[1]);
		$mobile_buttons = array_values($mobile_buttons);
	}
}

if ($website_settings[$uses_custom_buttons_bar_text] == False) {
	foreach ($computer_buttons as $button) {
		$computer_buttons_bar .= $button;
	}
}

else {
	foreach ($website_custom_button_bar_numbers as $button_number) {
		$computer_buttons_bar .= $computer_buttons[$button_number];
	}
}

if ($website_settings[$uses_custom_buttons_bar_text] == False) {
	foreach ($mobile_buttons as $button) {
		$mobile_buttons_bar .= $button;
	}
}

else {
	foreach ($website_custom_button_bar_numbers as $button_number) {
		$mobile_buttons_bar .= $mobile_buttons[$button_number];
	}
}

$computer_buttons_bar .= $hide_computer_buttons_element."\n";
$mobile_buttons_bar .= $close_mobile_div;

$website_buttons = $computer_buttons_bar."\n".$mobile_buttons_bar;

?>