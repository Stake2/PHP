<?php 

#Sets the local Cover folder and lists the files inside it
$dir = $local_cover_folder;
$x2 = 0;
$zz2 = 0;

$number_of_files = 0;

if (is_dir($dir)) {
	if ($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			$files[$zz2] = $online_cover_folder.$file;
			$x2++;
			$zz2++;

			$number_of_files++;
		}

		closedir($dh);
	}
}

$i = 1;
$cover_number = count($files) - 3;
while ($i <= $cover_number) {
	if ($newwritestyle == true) {
		$onclickscript = 'openCity('."'".$capdiv.$i."'".');DefineChapter('.$i.', '."'".$titles[$i]."'".');';
	}

	else if ($newwritestyle == false) {
		$onclickscript = 'openCity('."'".$capdiv.$i."'".');';
	}

	$online_image_link = $online_cover_folder.$i.'.png';

	$coverimages[$i] = '<div class="'.$computervar.'">'.'<img src="'.$online_image_link.'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$computervar.'" />'."\n";

	$coverimagesm[$i] = '<div class="'.$mobilevar.'">'.'<img src="'.$online_image_link.'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$mobilevar.'" />'."\n";

	$i++;
}

/*
#Cover image array creator
$a = 1;
$i = 3;
$z = 1;
$c = 1;
while ($c <= (count($files))) {
	$onclickscript = 'openCity('."'".$capdiv.$z."'".');DefineChapter('.$z.');';

	$online_image_link = $online_cover_folder.$z.'.png';

	$coverimages[$a] = '<div class="'.$computervar.'">'.'<img src="'.$online_image_link.'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$computervar.'" />'."\n";

	$coverimagesm[$a] = '<div class="'.$mobilevar.'">'.'<img src="'.$online_image_link.'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$mobilevar.'" />'."\n";

	$a++;
	$i++;
	$z++;
	$c++;

/*
	if (isset($files[$a]) == true) {
		if ($c == 3) {
			$z--;
			$onclickscript = 'openCity('."'".$capdiv.$z."'".');DefineChapter('.$z.');';

			$online_image_link = $online_cover_folder.$i.' '.ucwords($chaptertxt).'.png';

			$coverimages[$a] = '<div class="'.$computervar.'">'.'<img src="'.$files[$i].'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$computervar.'" />'."\n";

			$coverimagesm[$a] = '<div class="'.$mobilevar.'">'.'<img src="'.$files[$i].'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$mobilevar.'" />'."\n";
		}

		if ($c == 2) {
			$onclickscript = 'openCity('."'".$capdiv.($z + 8)."'".');DefineChapter('.($z + 8).');';

			$coverimages[$a] = '<div class="'.$computervar.'">'.'<img src="'.$files[$i].'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$computervar.'" />'."\n";

			$coverimagesm[$a] = '<div class="'.$mobilevar.'">'.'<img src="'.$files[$i].'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$mobilevar.'" />'."\n";
		}

		else {
			$coverimages[$a] = '<div class="'.$computervar.'">'.'<img src="'.$files[$i].'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$computervar.'" />'."\n";

			$coverimagesm[$a] = '<div class="'.$mobilevar.'">'.'<img src="'.$files[$i].'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$mobilevar.'" />'."\n";
		}


		$a++;
		$i++;
		$z++;
		$c++;
	}

	else {
		$c++;
	}
*/
/*}*/

?>