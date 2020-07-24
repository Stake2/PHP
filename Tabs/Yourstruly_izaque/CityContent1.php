<?php 

echo $divzoomanim."\n";

echo '<'.$m.'>'."\n";
echo $textalign_left;

#Chapter file text link array generator, it generates the array to access the text files of the chapters
$a = 0;
$z = 1;
while ($a <= $chapters) {
	$caps[$a] = $rootstoryfolder2.$z.' - '.$titles[$a].'.txt';
	$caps[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?"), "<br />", $caps[$a]);

	$a++;
	$z++;
}

echo $blackspan."\n";

$array = $caps;
$capnum1 = 0;
$c = 0;
while ($c <= count($array) - 1) {
	#Chapter text reader
	if (file_exists($caps[$capnum1]) == true) {
		if ($file = fopen($caps[$capnum1], "r")) {
		while(!feof($file)) {
			$line = fgets($file);
			echo $line.'<br />'."\n";
		}
			fclose($file);
		}
	}

	$capnum1++;
	$c++;
}

echo $spanc."\n";

echo $divc."\n";
echo '</'.$m.'>'."\n";

echo $divc."\n";

?>