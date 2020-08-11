<?php 

$capnum1 = 1;
$capnum2 = 1;
$capnum3 = 1;
$capnum4 = 0;
while ($capnum1 <= $chapters) {
	if ($storyhascovers == true) {
		if (isset($coverimages[$capnum1]) and isset($coverimagesm[$capnum1])) {
			$cover_image_button = '<center>'."\n".'<a href="#'.$capdiv.''.$capnum1.'" title="'.$capnum1.' - '.$titles[$capnum4].'">'.$coverimages[$capnum1]."\n".'</a>'.
			"\n"."\n".
			'<a href="#'.$capdiv.''.$capnum1.'">'."\n".$coverimagesm[$capnum1]."\n".'</a>'.
			"\n".'</center>'.
			"\n".'<br />'."\n"."\n";
		}

		else {
			$cover_image_button = '';
		}
	}

	else {
		$cover_image_button = '';
	}

	if ($capnum1 == $chapters) {
		if ($newwritestyle == true) {
			$onclickscript = 'openCity('."'".$capdiv.$capnum1."'".');DefineChapter('.$capnum1.');';
		}

		else if ($newwritestyle == false) {
			$onclickscript = 'openCity('."'".$capdiv.$capnum1."'".');';
		}

		if ($deactivatenotification == true) {
			$hidenotifattribute = '';
		}

		elseif (isset($hidenotifattribute)) {
			$hidenotifattribute = $hidenotifattribute;
		}

		if ($capnum1 == $reviewedcap and $sitehasnotifications == true) {
			echo '<div class="'.$shakesidetosideanim.'">'."\n";

			if ($storyhastitles == true) {
				$textvar = $capnum1.' - '.$titles[$capnum4];
			}

			else {
				$textvar = $capnum1;
			}
			
			$chapterbtn = '<a href="#'.$capdiv.''.$capnum1.'" title="'.$textvar.'"><button class="w3-btn '.$btnstyle3.'" '.$roundedborderstyle.' onclick="'.$hidenotifattribute.$onclickscript.'">'.$textvar.' <span class="w3-text-yellow">['.$newtxt.'!]</span>'."</button></a> "."\n";

			echo $chapterbtn;

			echo $cover_image_button;

			echo $divc;

			$chapterbtns[$capnum2] = $chapterbtn;

			$capnum4++;
		}

		else {
			echo '<div class="'.$shakesidetosideanim.'">'."\n";

			if ($storyhastitles == true) {
				$textvar = $capnum1.' - '.$titles[$capnum4];
			}

			else {
				$textvar = $capnum1;
			}

			$chapterbtn = '<a href="#'.$capdiv.''.$capnum1.'" title="'.$textvar.'"><button class="w3-btn '.$btnstyle3.'" '.$roundedborderstyle.' onclick="'.$onclickscript.'">'.$textvar.' <span class="w3-text-yellow">['.$newtxt.'!]</span>'."</button></a> "."\n";

			echo $chapterbtn;

			echo $cover_image_button;

			echo $divc;

			$chapterbtns[$capnum2] = $chapterbtn;

			$capnum4++;
		}
	}

	else {
		if ($newwritestyle == true) {
			$onclickscript = 'openCity('."'".$capdiv.$capnum1."'".');DefineChapter('.$capnum1.');';
		}

		else if ($newwritestyle == false) {
			$onclickscript = 'openCity('."'".$capdiv.$capnum1."'".');';
		}

		if ($deactivatenotification == true) {
			$hidenotifattribute = '';
		}

		elseif (isset($hidenotifattribute)) {
			$hidenotifattribute = $hidenotifattribute;
		}

		if ($capnum1 == $reviewedcap and $sitehasnotifications == true) {
			echo '<div class="'.$shakesidetosideanim.'">'."\n";

			if ($storyhastitles == true) {
				$textvar = $capnum1.' - '.$titles[$capnum4];
			}

			else {
				$textvar = $capnum1;
			}

			$chapterbtn = '<a href="#'.$capdiv.''.$capnum1.'" title="'.$textvar.'"><button class="w3-btn '.$btnstyle3.'" '.$roundedborderstyle.' onclick="'.$hidenotifattribute.$onclickscript.'">'.$textvar."</button></a> "."\n";

			echo $chapterbtn;

			echo $cover_image_button;

			echo $divc;

			$chapterbtns[$capnum2] = $chapterbtn;

			$capnum4++;
		}

		else {
			echo '<div class="'.$shakesidetosideanim.'">'."\n";

			if ($storyhastitles == true) {
				$textvar = $capnum1.' - '.$titles[$capnum4];
			}

			else {
				$textvar = $capnum1;
			}

			$chapterbtn = '<a href="#'.$capdiv.''.$capnum1.'" title="'.$textvar.'"><button class="w3-btn '.$btnstyle3.'" '.$roundedborderstyle.' onclick="'.$onclickscript.'">'.$textvar."</button></a> "."\n";

			echo $chapterbtn;

			echo $cover_image_button;

			echo $divc;

			$chapterbtns[$capnum2] = $chapterbtn;
	
			$capnum4++;
		}
	}

	$capnum1++;
	$capnum2++;
	$capnum3++;
}

?>