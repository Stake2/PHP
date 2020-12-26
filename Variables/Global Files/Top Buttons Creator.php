<?php

$i = 0;
$computer_buttons = array();
$mobile_buttons = array();

$hide_computer_buttons_bar = '<br />'."\n".'<button id="hide_computer_buttons" class="w3-btn '.$first_button_style.' '.$computer_variable.'" '.$roundedborderstyle.' onclick="Hide_Computer_Buttons();"><h2>'.$icons[17].'</h2></button>'."\n";

$show_computer_buttons_bar = '<button id="show_computer_buttons" class="w3-btn '.$first_button_style.' '.$computer_variable.'" style="display:none;float:right;'.$rounded_border_style_2.'" onclick="Show_Computer_Buttons();"><h2>'.$icons[18].'</h2></button>'."\n";

$open_mobile_buttons_sidebar = '<button id="show_mobile_buttons" class="w3-btn '.$first_button_style.' '.$mobile_variable.'" style="float:left;position:fixed;'.$rounded_border_style_2.'" onclick="Show_Mobile_Buttons();"><h2>'.$icons[16].'</h2></button>'."\n";

$tabnamestxt = $tabnames;

if ($website_name == $sitediario) {
	include $websites_tab_button_maker;
	$tabnumb2 = $tabnumb;
}

if ($website_name == $sitewatch) {
	$tabnumb2 = $tabnumb - 5;
	$tabnamestxt = $citiestxtswithouthtml;
}

if ($website_name == $site2018) {
	$tabnumb2 = $tabnumb;
}

if ($website_name == $site2019) {
	$tabnumb2 = $tabnumb - 5;
}

#if ($website_name == $site2020) {
#	$tabnumb2 = $tabnumb - 0;
#}

if ($website_name == $sitepequenata) {
	$tabnumb2 = $tabnumb - 1;
}

if ($website_name == $sitespaceliving) {
	$tabnumb2 = $tabnumb;
}

if ($website_name == $sitenazzevo) {
	$tabnumb2 = $tabnumb;
}

if ($website_name == $sitetextmaker) {
	$tabnumb2 = $tabnumb - 2;
}

if ($website_name == $sitethingsido) {
	$tabnumb2 = $tabnumb - $prodbtnsnumb;
	$tabnumb2 = $tabnumb2 - $unprodbtnsnumb;
	$tabnumb2 = $tabnumb2 - $mediabtnsnumb;
	$tabnumb2 = $tabnumb2 - 1;
}

if ($website_name == $siteyourstruly_izaque) {
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

	echo '<div id="computer_buttons_bar" class="w3-bar mobileHide w3-animate-top" style="position:fixed;float:right;">'."\n";
	$sitebtnecho = true;

	if ($website_name == $sitepequenata) {
		$hide_notification_attribute = 'hidenotif();';
	}

	else {
		$hide_notification_attribute = '';
	}

	while ($i <= $tabnumb) {
		if ($i == $tabnumb and $website_name == $sitediario) {
			$computer_buttons[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".';">'.$tabtxts[$i].'</button></a>'."\n".$spanc."\n"."\n";
		}

		else {
			if ($i == 0 and $website_has_notifications == true and $sitehidenotifonclickreadtab == true) {
				$computer_buttons[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="'.$hide_notification_attribute.'openCity('."'".$tabcodes[$i]."')".';">'.$tabtxts[$i].'</button></a>'."\n".$spanc."\n"."\n";
			}

			else {
				$computer_buttons[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".';">'.$tabtxts[$i].'</button></a>'."\n".$spanc."\n"."\n";
			}
		}

		if ($i <= $tabnumb2 and $website_name != $site2019) {
			if (strpos($computer_buttons[$i], 'Comment') and strpos($computer_buttons[$i], 'Comentar' and $sitehidescommentstab == true)) {
				#echo $computer_buttons[$i];
			}

			else {
				echo $computer_buttons[$i];
			}
		}

		if ($i <= $tabnumb and $website_name == $site2019) {
			echo $computer_buttons[$i];
		}

		if ($website_name == $sitediario and $sitebtnecho == true and $i == $tabnumb) {
			echo ' '.$websites_tab_button_not_centered;

			$sitebtnecho = false;
		}

		$i++;
	}

	if ($website_name == $sitewatch) {
		echo $computer_buttons[7];
	}

	if ($website_name == $sitepequenata) {
		echo $computer_buttons[5];
	}

	$i = 0;
	while ($i <= $tabnumb) {
		$yellow_computer_buttons[$i] = '<span title="'.$tabnamestxt[$i].'" alt="'.$tabnamestxt[$i].'">'."\n".	'<a href="#'.$tabcodes[$i].'"><button class="w3-btn '.$default_text_color." ".$background_yellow_css_class." ".$second_full_border." ".$default_background_hover_color.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".';">'.$tabtxts[$i].'</button></a>'.$spanc."\n";
	
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

	echo "\n".'<div id="mobile_button_sidebar" class="mobile_button_sidebar_css mobileShow ">'."\n"."\n".
	'<a href="javascript:void(0)" class="close_mobile_sidebar_button" onclick="Hide_Mobile_Buttons();"><i class="fas fa-times-circle"></i></a>'."\n"."\n".
	'<'.$n.' class="'.$mobile_variable.' '.$first_text_color.'">'.$btnmenutxt.'</'.$n.'>'."\n"."\n";
	
	$i = 0;
	while ($i <= $tabnumb) {
		$i2 = $i + 1;
	
		if ($i == $tabnumb and $website_name == $sitediario) {
			$mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".';">'.$tabtxtsm[$i].'</button></a>';
		}
	
		else {
			if ($i == 0 and $website_has_notifications == true and $sitehidenotifonclickreadtab == true) {
				$mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="'.$hide_notification_attribute.'openCity('."'".$tabcodesm[$i]."')".';">'.$tabtxtsm[$i].'</button></a>';
			}
	
			else {
				$mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button id="mobile_button_'.($i + 1).'" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".';">'.$tabtxtsm[$i].'</button></a>';
			}
		}

		if ($i <= $tabnumb2 and $website_name != $site2019) {
			echo $mobile_buttons[$i];
		}

		if ($i != $tabnumb) {
			echo "\n";
		}

		if ($i <= $tabnumb and $website_name == $site2019) {
			echo $mobile_buttons[$i];
		}

		if ($i != $tabnumb) {
			echo "\n";
		}

		if ($website_name == $sitediario and $sitebtnecho == true and $i == $tabnumb) {
			echo ' '.$websites_tab_button_not_centered;

			$sitebtnecho = false;
		}

		$i++;
	}
	
	if ($website_name == $sitewatch) {
		echo $mobile_buttons[7]."\n"."\n";
	}
	
	if ($website_name == $sitepequenata) {
		echo $mobile_buttons[5]."\n"."\n";
	}
	
	if ($website_name == $sitetextmaker) {
		echo $mobile_buttons[1]."\n"."\n";
	}
	
	$i = 0;
	while ($i <= $tabnumb) {
		$yellow_mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button class="w3-btn '.$default_text_color." ".$background_yellow_css_class." ".$second_full_border." ".$default_background_hover_color.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".';">'.$tabtxtsm[$i].'</button></a>';

		$i++;
	}
	
	echo "\n".$div_close."\n"."\n".
	$open_mobile_buttons_sidebar;
}

?>