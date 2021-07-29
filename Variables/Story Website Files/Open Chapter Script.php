<?php 

echo '	var chapter_text = "'.$chapter_div_text.'";';

echo 'function Really_Open_Chapter(chapter_title, chapter_number) {'."\n";
echo '		var new_chapter_text = chapter_text + chapter_number;'."\n";
echo '		openCity(new_chapter_text);'."\n";
echo '		document.getElementById(new_chapter_text).scrollIntoView();'."\n";
echo '		Chapter_Number = chapter_number;'."\n";
echo '		Define_Chapter(Chapter_Number);'."\n";
echo '		Add_To_Website_Title(chapter_title, "notification");'."\n";
echo '		Hide_Computer_Notification();'."\n";
echo '		Hide_Mobile_Notification();'."\n";
echo '	}'."\n";

echo '
function Open_Chapter() {'."\n".
	'	var first_website_url = window.location;'."\n".
	'	var second_website_url = '."'".'"'."'".' + first_website_url + '."'".'"'."'".';'."\n".
	'	var userLang = navigator.language || navigator.userLanguage;'."\n".
	'
	if (userLang == "pt-BR" || userLang == "pt-PT") {
		var read_chapter_text = "ler-capitulo-";
	}

	else {
		var read_chapter_text = "read-chapter-";
	}

	var chapter_number = '.$i2.';'."\n";

$i = 0;
while ($i < $chapters) {
	$i2 = $i + 1;

	echo '
	var first_check_'.$i2.' = second_website_url.includes(read_chapter_text + chapter_number);
	var second_check_'.$i2.' = second_website_url.includes(read_chapter_text + "['.$i2.']");
	var third_check_'.$i2.' = second_website_url.includes(read_chapter_text + '."'".'"'."'"." + ".$i2." + "."'".'"'."'".');
	var fourth_check_'.$i2.' = second_website_url.includes(read_chapter_text + "%22'.$i2.'%22");
	var fifth_check_'.$i2.' = second_website_url.includes("('.$i2.')");
	var sixth_check_'.$i2.' = second_website_url.includes("['.$i2.']");';

	$i++;
}

echo "\n"."\n";

$i = 0;
while ($i < $chapters) {
	$i2 = $i + 1;

	echo '	if (first_check_'.$i2.' === true || second_check_'.$i2.' === true || third_check_'.$i2.' === true || fourth_check_'.$i2.' === true || fifth_check_'.$i2.' === true || sixth_check_'.$i2.' == true) {'."\n";
	echo '		var chapter_title = "'." - ".ucwords($chapter_text). ": ".$i2." - ".$chapter_titles[$i2 - 1].'";'."\n";
	echo '		var current_chapter_number = '.$i2.';'."\n";
	#echo '		var new_chapter_text = chapter_text + "'.$i2.'";'."\n";
	#echo '		openCity(new_chapter_text);'."\n";
	#echo '		document.getElementById(new_chapter_text).scrollIntoView();'."\n";
	#echo '		Chapter_Number = '.$i2.';'."\n";
	#echo '		Define_Chapter('.$i2.');'."\n";
	#echo '		Add_To_Website_Title("'." - ".ucwords($chapter_text). ": ".$i2." - ".$chapter_titles[$i2 - 1].'", "notification");'."\n";
	echo '		Really_Open_Chapter(chapter_title, current_chapter_number);'."\n";
	echo '	}'."\n";

	if ($i != $chapters) {
		echo "\n";
	}

	$i++;
}

echo '}
console.log("Open Chapter Script was loaded.");'."\n";

echo "\n";
echo 'Open_Chapter();'."\n";

?>