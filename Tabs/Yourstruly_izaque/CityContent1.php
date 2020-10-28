<?php 

echo $div_zoom_animation."\n";

echo '<'.$m.'>'."\n";
echo $textalign_left;

#Chapter file text link array generator, it generates the array to access the text files of the chapters
$a = 0;
$z = 1;
while ($a <= $chapters) {
	$normal_chapters[$a] = $main_story_folder_2.$z.' - '.$chapter_titles[$a].'.txt';
	$normal_chapters[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?"), "<br />", $normal_chapters[$a]);

	$a++;
	$z++;
}

echo $blackspan."\n";

$array = $normal_chapters;
$chapter_number_1 = 0;
$c = 0;
while ($c <= count($array) - 1) {
	#Chapter text reader
	if (file_exists($normal_chapters[$chapter_number_1]) == true) {
		if ($file = fopen($normal_chapters[$chapter_number_1], "r")) {
		while(!feof($file)) {
			$line = fgets($file);
			echo $line.'<br />'."\n";
		}
			fclose($file);
		}
	}

	$chapter_number_1++;
	$c++;
}

echo $spanc."\n";

echo $div_close."\n";
echo '</'.$m.'>'."\n";

echo $div_close."\n";

?>