<?php

#Chapter writer tab displayer
if ($newwritestyle == true) {
	echo '<div style="display:none;">'.$readstorybtn.$divc;
	echo $writestorybtn;
}

require $chapter_writer_form_php_variable;

if ($newwritestyle == true) {
	#JavaScript version for the write story form
	echo '<script>'.
	'var WriteContent'.$capnum1.' = `<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$titletxt.': " style="height:85px;'.$roundedborderstyle3.'">'."\n";

	#Checks if the variable showchaptertext is set to true
	if ($showchaptertext == true) {
		#Checks if the variable showwriteformtext is set to true and shows the title text
		if ($show_write_form_text == true) {
			echo $titletxt.': '."\n".$capnum1.' - '.$titles[($capnum4 - 1)];
		}

		else {
			echo $capnum1.' - '.$titles[($capnum4 - 1)];
		}
	}

	echo '</textarea>'."\n";

	echo '<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$storytxt.': " style="height:3000px;'.$roundedborderstyle3.'">'."\n";

	if ($show_write_form_text == true) {
		echo $storytxt.': '."\n"."\n";
	}

	if ($show_write_form_text == true) {
		if (strpos($host, $translatestory.'='.'true')) {
			#Chapter text reader
			if (file_exists($capsenus[$capnum1]) == true) {
				if ($file = fopen($capsenus[$capnum1], "r")) {
				while(!feof($file)) {
					$line = fgets($file);
					$line = str_replace(array("\r\n", "\r", "\n"), "", $line);

					if (feof(file)) {
						echo $line."\n";
					}

					else {
						echo $line;
					}
				}
					fclose($file);
				}
			}

			else {
				echo $cannotfindfiletxt.': <br />'.$caps[$capnum1].'<br />';
			}
		}

		else {
			#Chapter text reader
			if (file_exists($caps[$capnum1]) == true) {
				if ($file = fopen($caps[$capnum1], "r")) {
				while(!feof($file)) {
					$line = fgets($file);
					$line = str_replace(array("\r\n", "\r", "\n"), "", $line);

					if (feof(file)) {
						echo $line."\n";
					}

					else {
						echo $line;
					}
				}
					fclose($file);
				}
			}

			else {
				echo $cannotfindfiletxt.': <br />'.$caps[$capnum1].'<br />';
			}
		}
	}

	echo '</textarea>'."\n";

	if ($show_write_form_text == true and $storyhasdates == true) {
		#Chapter date displayer
		if (file_exists($capdatesfile) == true) {
			$fp = fopen($capdatesfile, 'r', 'UTF-8'); 
			if ($fp) {
				$capdatas = explode("\n", fread($fp, filesize($capdatesfile)));
				$datas = str_replace("^", "", $capdatas);
				$datas = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $datas);
			}
		}

		echo '<br />'."\n";
		echo $datatxt2.': '.$datas[$capdatanumb].'.';
	}

	echo '`;'.
	'</script>';
	#$write_chapter_script;
}

?>