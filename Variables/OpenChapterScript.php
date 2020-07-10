<?php 

echo 'function OpenChapter() {'."\n".
	'	var site = window.location;'."\n".
	'	var site2 = '."'".'"'."'".' + site + '."'".'"'."'".';'."\n".
	'	var userLang = navigator.language || navigator.userLanguage;'."\n".
	'	var captext1 = "'.$capdiv.'";
	'.

	'
	if (userLang === "pt-BR") {
		var captext2 = "ler-capitulo-";
	}
	
	else {
		var captext2 = "read-chapter-";
	}
	';

$i = 1;
while ($i < $chapters) {
	echo '
	var check'.$i.' = site2.includes(captext2 + "'.$i.'");';

	$i++;
}

echo "\n"."\n";

$i = 1;
while ($i <= $chapters) {
	echo '	if (check'.$i.' === true) {'."\n";
	echo '		var captext = captext1 + "'.$i.'";'."\n";
	echo '		openCity(captext);'."\n";
	echo '		document.getElementById(captext).scrollIntoView();'."\n";
	echo '	}'."\n";

	if ($i != $chapters) {
		echo "\n";
	}

	$i++;
}

echo '}'."\n";

echo "\n";
echo 'OpenChapter();'."\n";

?>