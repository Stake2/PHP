<?php

$i = 0;
$btns = array();
$btnsm = array();
$pcbtn1 = '<br />'."\n".'<button class="w3-btn '.$btnstyle.' '.$computervar.'" '.$roundedborderstyle.' onclick="buttons();"><h2>'.$icons[17].'</h2></button>'."\n";

$pcbtn2 = '<button id="ShowButton" class="w3-btn '.$btnstyle.' '.$computervar.'" style="display:none;float:right;'.$roundedborderstyle2.'" onclick="buttons2();"><h2>'.$icons[18].'</h2></button>'."\n";

$mobilemenuopen = '<button id="ShowMenu" class="w3-btn '.$btnstyle.' '.$mobilevar.'" style="float:left;position:fixed;'.$roundedborderstyle2.'" onclick="openNav()"><h2>'.$icons[16].'</h2></button>'."\n";

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

if ($sitename == $sitexenaeizaque) {
	$tabnumb2 = $tabnumb;
}

if ($sitename == $siteyourstruly_izaque) {
	$tabnumb2 = $tabnumb;
}

if ($deactivatetopbtns == false) {
	echo '<div id="myDIV" class="w3-bar mobileHide w3-animate-top" style="position:fixed;float:right;">'."\n";
	$sitebtnecho = true;
	
	if ($sitename == $sitepequenata) {
		$hidenotifattribute = 'hidenotif();';
	}
	
	else {
		$hidenotifattribute = '';
	}
	
	while ($i <= $tabnumb) {
		if ($i == $tabnumb and $sitename == $sitediario) {
			$btns[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'.'<a href="#'.$tabcodes[$i].'"><button id="button'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".'">'.$tabtxts[$i].'</button></a>'.$spanc."\n";
		}
	
		else {
			if ($i == 0 and $sitehasnotifications == true and $sitehidenotifonclickreadtab == true) {
				$btns[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'.'<a href="#'.$tabcodes[$i].'"><button id="button'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="'.$hidenotifattribute.'openCity('."'".$tabcodes[$i]."')".'">'.$tabtxts[$i].'</button></a>'.$spanc."\n";
			}
	
			else {
				$btns[$i] = '<span title="'.$tabnames[$i].'" alt="'.$tabnames[$i].'">'.'<a href="#'.$tabcodes[$i].'"><button id="button'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".'">'.$tabtxts[$i].'</button></a>'.$spanc."\n";
			}
		}
	
		if ($i <= $tabnumb2 and $sitename != $site2019) {
			if (strpos($btns[$i], 'Comment') and strpos($btns[$i], 'Comentar' and $sitehidescommentstab == true)) {
				#echo $btns[$i];
			}

			else {
				echo $btns[$i];
			}
		}
	
		if ($i <= $tabnumb and $sitename == $site2019) {
			echo $btns[$i];
		}
	
		if ($sitename == $sitediario and $sitebtnecho == true and $i == $tabnumb) {
			echo ' '.$sitebtn2;
	
			$sitebtnecho = false;
		}
	
		$i++;
	}
	
	if ($sitename == $sitewatch) {
		echo $btns[7];
	}
	
	if ($sitename == $sitepequenata) {
		echo $btns[5];
	}
	
	$i = 0;
	while ($i <= $tabnumb) {
		$btnsy[$i] = '<span title="'.$tabnamestxt[$i].'" alt="'.$tabnamestxt[$i].'">'.'<a href="#'.$tabcodes[$i].'"><button class="w3-btn '.$btnstyle2.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".'">'.$tabtxts[$i].'</button></a>'.$spanc."\n";
	
		$i++;
	}
	
	echo $pcbtn1.
	$divc."\n".
	'<div class="w3-bar" style="position:fixed;float:right;">'."\n".
	$pcbtn2.$divc."\n";
	
	echo "\n".'<div id="mySidenav" class="sidenav mobileShow ">'."\n".
	'<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times-circle"></i></a>'."\n".
	'<'.$n.' class="'.$mobilevar.' '.$textstyle.'">'.$btnmenutxt.'</'.$n.'>'."\n";
	
	$i = 0;
	while ($i <= $tabnumb) {
		$i2 = $i + 1;
	
		if ($i == $tabnumb and $sitename == $sitediario) {
			$btnsm[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="closeNav()"><button id="button'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".'">'.$tabtxtsm[$i].'</button></a>';
		}
	
		else {
			if ($i == 0 and $sitehasnotifications == true and $sitehidenotifonclickreadtab == true) {
				$btnsm[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="closeNav()"><button id="button'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="'.$hidenotifattribute.'openCity('."'".$tabcodesm[$i]."')".'">'.$tabtxtsm[$i].'</button></a>'."\n";
			}
	
			else {
				$btnsm[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="closeNav()"><button id="button'.($i + 1).'" class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".'">'.$tabtxtsm[$i].'</button></a>'."\n";
			}
		}
		
		if ($i <= $tabnumb2 and $sitename != $site2019) {
			echo $btnsm[$i];
		}
	
		if ($i <= $tabnumb and $sitename == $site2019) {
			echo $btnsm[$i];
		}

		if ($sitename == $sitediario and $sitebtnecho == true and $i == $tabnumb) {
			echo ' '.$sitebtn2;
	
			$sitebtnecho = false;
		}

		$i++;
	}
	
	if ($sitename == $sitewatch) {
		echo $btnsm[7];
	}
	
	if ($sitename == $sitepequenata) {
		echo $btnsm[5];
	}
	
	if ($sitename == $sitetextmaker) {
		echo $btnsm[1];
	}
	
	$i = 0;
	while ($i <= $tabnumb) {
		$btnsym[$i] = '<a href="#'.$tabcodesm[$i].'" onclick="closeNav()"><button class="w3-btn '.$btnstyle2.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".'">'.$tabtxtsm[$i].'</button></a>'."\n";
	
		$i++;
	}
	
	echo $divc."\n".
	$mobilemenuopen;
}

?>