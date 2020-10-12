<?php

$i = 0;
$computer_buttons = array();
$mobile_buttons = array();

$hide_computer_buttons_bar = '<br />'."\n".'<button id="hide_computer_buttons" class="w3-btn '.$btnstyle.' '.$computervar.'" '.$roundedborderstyle.' onclick="Hide_Computer_Buttons();"><h2>'.$icons[17].'</h2></button>'."\n";

$show_computer_buttons_bar = '<button id="show_computer_buttons" class="w3-btn '.$btnstyle.' '.$computervar.'" style="display:none;float:right;'.$roundedborderstyle2.'" onclick="Show_Computer_Buttons();"><h2>'.$icons[18].'</h2></button>'."\n";

$open_mobile_buttons_sidebar = '<button id="show_mobile_buttons" class="w3-btn '.$btnstyle.' '.$mobilevar.'" style="float:left;position:fixed;'.$roundedborderstyle2.'" onclick="Show_Mobile_Buttons();"><h2>'.$icons[16].'</h2></button>'."\n";

$tabnamestxt = $tabnames;

if ($sitename == $sitediario) {
	include $sitesbuttonscreator;
	$tabnumb2 = $tabnumb;
}

if ($sitename == $sitewatch) {
	$tabnumb2 = $tabnumb - 5;
	$tabnamestxt = $citiestxtswithouthtml;
}

if ($sitename == $site2018) {
	$tabnumb2 = $tabnumb;
}

if ($sitename == $site2019) {
	$tabnumb2 = $tabnumb - 5;
}

if ($sitename == $site2020) {
	$tabnumb2 = $tabnumb - 5;
}

if ($sitename == $sitepequenata) {
	$tabnumb2 = $tabnumb - 1;
}

if ($sitename == $sitespaceliving) {
	$tabnumb2 = $tabnumb ;
}

if ($sitename == $sitenazzevo) {
	$tabnumb2 = $tabnumb;
}

if ($sitename == $sitetextmaker) {
	$tabnumb2 = $tabnumb - 2;
}

if ($sitename == $sitethingsido) {
	$tabnumb2 = $tabnumb - $prodbtnsnumb;
	$tabnumb2 = $tabnumb2 - $unprodbtnsnumb;
	$tabnumb2 = $tabnumb2 - $mediabtnsnumb;
	$tabnumb2 = $tabnumb2 - 1;
}

if ($sitename == $siteyourstruly_izaque) {
	$tabnumb2 = $tabnumb;
}

if ($deactivatetopbtns == false) {

	#######################################

	# Computer buttons bar generation     #

	#######################################

	echo '
<!--- Computer Button bar on the top -->
';

	echo '<div id="computer_buttons_bar" class="w3-bar mobileHide w3-animate-top" style="position:fixed;float:right;">'."\n";
	$sitebtnecho = true;

	if ($sitename == $sitepequenata) {
		$hidenotifattribute = 'hidenotif();';
	}

	else {
		$hidenotifattribute = '';
	}

	while ($i <= $tabnumb) {
		if ($i == $tabnumb and $sitename == $sitediario) {
			$computer_buttons[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".';">'.$tabtxts[$i].'</button></a>'."\n".$spanc."\n"."\n";
		}

		else {
			if ($i == 0 and $sitehasnotifications == true and $sitehidenotifonclickreadtab == true) {
				$computer_buttons[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="'.$hidenotifattribute.'openCity('."'".$tabcodes[$i]."')".';">'.$tabtxts[$i].'</button></a>'."\n".$spanc."\n"."\n";
			}

			else {
				$computer_buttons[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'."\n".'<a href="#'.$tabcodes[$i].'"><button id="computer_button_'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".';">'.$tabtxts[$i].'</button></a>'."\n".$spanc."\n"."\n";
			}
		}

		if ($i <= $tabnumb2 and $sitename != $site2019) {
			if (strpos($computer_buttons[$i], 'Comment') and strpos($computer_buttons[$i], 'Comentar' and $sitehidescommentstab == true)) {
				#echo $computer_buttons[$i];
			}

			else {
				echo $computer_buttons[$i];
			}
		}

		if ($i <= $tabnumb and $sitename == $site2019) {
			echo $computer_buttons[$i];
		}

		if ($sitename == $sitediario and $sitebtnecho == true and $i == $tabnumb) {
			echo ' '.$sitebtn2;

			$sitebtnecho = false;
		}

		$i++;
	}

	if ($sitename == $sitewatch) {
		echo $computer_buttons[7];
	}

	if ($sitename == $sitepequenata) {
		echo $computer_buttons[5];
	}

	$i = 0;
	while ($i <= $tabnumb) {
		$btnsy[$i] = '<span title="'.$tabnamestxt[$i].'" alt="'.$tabnamestxt[$i].'">'."\n".	'<a href="#'.$tabcodes[$i].'"><button class="w3-btn '.$btnstyle2.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".';">'.$tabtxts[$i].'</button></a>'.$spanc."\n";
	
		$i++;
	}

	echo $hide_computer_buttons_bar.
	$divc."\n"."\n".
	'<!-- "Show Computer Buttons" button bar -->
<div id="show_computer_button_bar" class="w3-bar" style="position:fixed;float:right;">'."\n".
	$show_computer_buttons_bar.$divc."\n";


	#######################################

	# Mobile buttons sidebar generation   #

	#######################################

	echo '
<!--- Mobile Button bar at the left -->';

	echo "\n".'<div id="mobile_button_sidebar" class="mobile_button_sidebar_css mobileShow ">'."\n"."\n".
	'<a href="javascript:void(0)" class="close_mobile_sidebar_button" onclick="Hide_Mobile_Buttons();"><i class="fas fa-times-circle"></i></a>'."\n"."\n".
	'<'.$n.' class="'.$mobilevar.' '.$textstyle.'">'.$btnmenutxt.'</'.$n.'>'."\n"."\n";
	
	$i = 0;
	while ($i <= $tabnumb) {
		$i2 = $i + 1;
	
		if ($i == $tabnumb and $sitename == $sitediario) {
			$mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button id="mobile_button_'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".';">'.$tabtxtsm[$i].'</button></a>';
		}
	
		else {
			if ($i == 0 and $sitehasnotifications == true and $sitehidenotifonclickreadtab == true) {
				$mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button id="mobile_button_'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="'.$hidenotifattribute.'openCity('."'".$tabcodesm[$i]."')".';">'.$tabtxtsm[$i].'</button></a>';
			}
	
			else {
				$mobile_buttons[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button id="mobile_button_'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".';">'.$tabtxtsm[$i].'</button></a>';
			}
		}

		if ($i <= $tabnumb2 and $sitename != $site2019) {
			echo $mobile_buttons[$i];
		}

		if ($i != $tabnumb) {
			echo "\n";
		}

		if ($i <= $tabnumb and $sitename == $site2019) {
			echo $mobile_buttons[$i];
		}

		if ($i != $tabnumb) {
			echo "\n";
		}

		if ($sitename == $sitediario and $sitebtnecho == true and $i == $tabnumb) {
			echo ' '.$sitebtn2;

			$sitebtnecho = false;
		}

		$i++;
	}
	
	if ($sitename == $sitewatch) {
		echo $mobile_buttons[7]."\n"."\n";
	}
	
	if ($sitename == $sitepequenata) {
		echo $mobile_buttons[5]."\n"."\n";
	}
	
	if ($sitename == $sitetextmaker) {
		echo $mobile_buttons[1]."\n"."\n";
	}
	
	$i = 0;
	while ($i <= $tabnumb) {
		$btnsym[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="Hide_Mobile_Buttons();"><button class="w3-btn '.$btnstyle2.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".';">'.$tabtxtsm[$i].'</button></a>';

		$i++;
	}
	
	echo "\n".$divc."\n"."\n".
	$open_mobile_buttons_sidebar;
}

?>