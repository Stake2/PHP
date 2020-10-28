<?php 

echo 'function OpenChapter() {'."\n".
	'	var site = window.location;'."\n".
	'	var site2 = '."'".'"'."'".' + site + '."'".'"'."'".';'."\n".
	'	var userLang = navigator.language || navigator.userLanguage;'."\n".
	'	var captext1 = "'.$chapter_div_text.'";
	'.

	'
	if (userLang == "pt-BR" || userLang == "pt-PT") {
		var captext2 = "ler-capitulo-";
	}

	else {
		var captext2 = "read-chapter-";
	}
	';

$i = 0;
while ($i < $chapters) {
	$i2 = $i + 1;

	echo '
	var first_check_'.$i2.' = site2.includes(captext2 + "'.$i2.'");
	var second_check_'.$i2.' = site2.includes(captext2 + "['.$i2.']");
	var third_check_'.$i2.' = site2.includes(captext2 + '."'".'"'."'"." + ".$i2." + "."'".'"'."'".');
	var fourth_check_'.$i2.' = site2.includes(captext2 + "%22'.$i2.'%22");';

	$i++;
}

echo "\n"."\n";

$i = 0;
while ($i < $chapters) {
	$i2 = $i + 1;

	echo '	if (first_check_'.$i2.' === true || second_check_'.$i2.' === true || third_check_'.$i2.' === true || fourth_check_'.$i2.' === true) {'."\n";
	echo '		var captext = captext1 + "'.$i2.'";'."\n";
	echo '		openCity(captext);'."\n";
	echo '		document.getElementById(captext).scrollIntoView();'."\n";
	echo '	}'."\n";

	if ($i != $chapters) {
		echo "\n";
	}

	$i++;
}

echo '}
console.log("Open Chapter Script was loaded.");'."\n";

echo "\n";
echo 'OpenChapter();'."\n";

?>