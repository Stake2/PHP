<?php 

#Sets the local Cover folder and lists the files inside it
$dir = $local_cover_folder;
$x2 = 0;
$zz2 = 0;
if (is_dir($dir)) {
	if ($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			$files[$zz2] = $online_cover_folder.$file;
			$x2++;
			$zz2++;
		}
		closedir($dh);
	}
}

#Cover image array creator
$a = 1;
$i = 3;
$z = 1;
$c = 1;
while ($c <= (count($files) - 3)) {
	if (isset($files[$a]) == true) {
		$onclickscript = 'openCity('."'".$capdiv.$z."'".');DefineChapter('.$z.');';
		if ($c == 3) {
			$z--;
			$onclickscript = 'openCity('."'".$capdiv.$z."'".');DefineChapter('.$z.');';

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
}

?>