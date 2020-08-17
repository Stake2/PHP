<?php

#Chapter text reader
if ($newwritestyle == true) {
	echo $writestorybtn;
	echo '<div style="display:none;">'.$readstorybtn.$divc;
}

if (isset($caps[$capnum1])) {
	if (file_exists($caps[$capnum1]) == true) {
		if ($storywritesstoryfiles == true) {
			if (file_exists($writefolder) == true) {
				$chapter_test_file = fopen($writefolder.$capnum1.' - '.str_replace("?", "", $titles[($capnum4 - 1)]).'.txt', 'w');
			}
		}

		if ($file = fopen($caps[$capnum1], "r")) {
			while(!feof($file)) {
				$line = fgets($file);
				$line = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $line);

				if ($storywritesstoryfiles == true) {
					if (file_exists($writefolder) == true) {
						$chapter_text[$z123] = $line;
						$chapter_line_number++;
						$chapter_lines_array[$capnum1] = $chapter_line_number;
						$z123++;

						if (feof($file)) {
							fwrite($chapter_test_file, $line);
						}
						
						else {
							fwrite($chapter_test_file, $line."\n");
						}
					}
				}

				echo $line."\n".'<br />';
			}
			fclose($file);

			if ($storywritesstoryfiles == true) {
				if (file_exists($writefolder) == true) {
					fclose($chapter_test_file);
				}
			}
		}
	}

	if (file_exists($caps[$capnum1]) == false) {
		echo $cannotfindfiletxt.': <br />'.$caps[$capnum1].'<br />';
	}
}

if ($write_new_chapter == true and $capnum1 == $chapters + 1) {
	require $chapter_writer_form_php_variable;
}

#Chapter date displayer
if ($sitename != $sitenazzevo and $storyhasdates == true) {
	if (file_exists($capdatesfile) == true) {
		$fp = fopen($capdatesfile, 'r', 'UTF-8'); 
		if ($fp) {
			$capdatas = explode("\n", fread($fp, filesize($capdatesfile)));
			$datas = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $capdatas);
		}
	}

	echo '<br />';
	if (isset($datas[$capdatanumb])) {
		echo $datatxt2.': '.$datas[$capdatanumb].'.';
	}
}

echo $newwritestylescript."\n";
echo $divc."\n";
echo $divc."\n";
echo '<br /><br />'."\n";

if ($newwritestyle == true) {
	#JavaScript version for the read story text
	echo '<script>'.
	'var ReadContent'.$capnum1.' = `';

	echo $writestorybtn;
	echo '<div style="display:none;">'.$readstorybtn.$divc;

	if (file_exists($caps[$capnum1]) == true) {
		if ($storywritesstoryfiles == true) {
			if (file_exists($writefolder) == true) {
				$chapter_test_file = fopen($writefolder.$capnum1.' - '.str_replace("?", "", $titles[($capnum4 - 1)]).'.txt', 'w');
			}
		}

		if ($file = fopen($caps[$capnum1], "r")) {
		while(!feof($file)) {
			$line = fgets($file);
			$line = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $line);

			if ($storywritesstoryfiles == true) {
				if (file_exists($writefolder) == true) {
					$chapter_text[$z123] = $line;
					$chapter_line_number++;
					$chapter_lines_array[$capnum1] = $chapter_line_number;
					$z123++;

					if (feof($file)) {
						fwrite($chapter_test_file, $line);
					}
					
					else {
						fwrite($chapter_test_file, $line."\n");
					}
				}
			}

			echo $line.'<br />'."\n";
		}
			fclose($file);

			if ($storywritesstoryfiles == true) {
				if (file_exists($writefolder) == true) {
					fclose($chapter_test_file);
				}
			}
		}
	}

	else {
		echo $cannotfindfiletxt.': <br />'.$caps[$capnum1].'<br />';
	}

	#Chapter date displayer
	if ($sitename != $sitenazzevo and $storyhasdates == true) {
		if (file_exists($capdatesfile) == true) {
			$fp = fopen($capdatesfile, 'r', 'UTF-8'); 
			if ($fp) {
				$capdatas = explode("\n", fread($fp, filesize($capdatesfile)));
				$datas = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $capdatas);
			}
		}

		echo '<br />';
		echo $datatxt2.': '.$datas[$capdatanumb].'.';
	}

	echo '`;'.
	'</script>'.
	$newwritestylescript;

	#JavaScript version for the write story form
	echo '<script>'.
	'var WriteContent'.$capnum1.' = `';

	echo $readstorybtn;
	echo '<div style="display:none;">'.$writestorybtn.$divc;

	echo '<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$titletxt.': " style="height:85px;'.$roundedborderstyle3.'">'."\n";

	#Checks if the variable show_write_form_text is set to true
	if ($show_write_form_text == true) {
		#Checks if the variable showwriteformtext is set to true and shows the title text
		if ($showwriteformtext == true) {
			echo $titletxt.': '."\n".$capnum1.' - '.$titles[($capnum4 - 1)];
		}

		else {
			echo $capnum1.' - '.$titles[($capnum4 - 1)];
		}
	}

	echo '</textarea>'."\n";

	echo '<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$storytxt.': " style="height:3000px;'.$roundedborderstyle3.'">'."\n";

	if ($showwriteformtext == true) {
		echo $storytxt.': '."\n"."\n";
	}

	if ($show_write_form_text == true) {
		if (strpos($host, $settingsparams[8].'='.'true')) {
			#Chapter text reader
			if (file_exists($capsenus[$capnum1]) == true) {
				if ($file = fopen($capsenus[$capnum1], "r")) {
				while(!feof($file)) {
					$line = fgets($file);
					$line = str_replace(array("\r\n", "\r", "\n"), "", $line);
					echo $line."\n";
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
					echo $line."\n";
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
		if ($sitename != $sitenazzevo) {
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
	}

	echo '`;'.
	'</script>';
}

if ($write_new_chapter == true) {
	echo '<script>
	function Open_Chapter() {
		openCity("'.$capdiv.($chapters + 1).'");
	}
	</script>';
}

?>