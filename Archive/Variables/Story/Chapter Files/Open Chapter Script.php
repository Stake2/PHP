<?php 

echo 'var chapter_text = "'.$chapter_div_text.'";'."\n"."\n";

echo "function Open_Chapter(chapter_title, chapter_number) {"."\n";
echo "	var new_chapter_text = chapter_text + chapter_number;"."\n";
echo "	openCity(new_chapter_text);"."\n";
echo "	document.getElementById(new_chapter_text).scrollIntoView();"."\n";
echo "	Chapter_Number = chapter_number;"."\n";
echo "	Define_Chapter(Chapter_Number);"."\n";
echo '	Add_To_Website_Title(chapter_title, "notification");'."\n";
echo "	Hide_Computer_Buttons();"."\n";
echo '	console.log("Opened chapter number " + chapter_number);'."\n";

if ($website_settings["notifications"] == True) {
	echo "	Hide_Computer_Notification();"."\n";
	echo "	Hide_Mobile_Notification();"."\n";
}

echo "}"."\n";

echo '
function Check_Chapter_Number_On_Link() {
	var website_url = String(window.location);
	var user_language = navigator.website_language || navigator.userLanguage || navigator.language;

	var english_language = "en-US";
	var english_languages = ["en", "en-US", "en-BZ", "en-CA", "en-IE", "en-JM", "en-NZ", "en-PH", "en-ZA", "en-TT", "en-GB", "en-ZW"]

	var portuguese_language = "pt-BR" || "pt-PT";
	var portuguese_languages = ["pt", "pt-BR", "pt-PT"];

	if (english_languages.includes(user_language)) {
		var read_chapter_text = "read-chapter-";
	}

	if (portuguese_languages.includes(user_language)) {
		var read_chapter_text = "ler-capitulo-";
	}

	var chapter_number = '.$story_info["chapter_number"].';'."\n";

$i = 0;
while ($i < $story_info["chapter_number"]) {
	$i2 = $i + 1;

	if ($website_information["english_title"] != $website_titles["Diary Slim"]) {
		echo '
	var first_check_'.$i2.' = website_url.includes(read_chapter_text + '.$i2.');
	var second_check_'.$i2.' = website_url.includes(read_chapter_text + "['.$i2.']");
	var third_check_'.$i2.' = website_url.includes(read_chapter_text + '."'".'"'."'"." + ".$i2." + "."'".'"'."'".');
	var fourth_check_'.$i2.' = website_url.includes(read_chapter_text + "%22'.$i2.'%22");
	var fifth_check_'.$i2.' = website_url.includes("('.$i2.')");';
	}

	echo 
'	var sixth_check_'.$i2.' = website_url.includes("['.$i2.']");';

	$i++;
}

echo "\n"."\n";

$i = 0;
while ($i < $story_info["chapter_number"]) {
	$i2 = $i + 1;

	if ($website_information["english_title"] != $website_titles["Diary Slim"]) {
		echo '	if (first_check_'.$i2.' === true || second_check_'.$i2.' === true || third_check_'.$i2.' === true || fourth_check_'.$i2.' === true || fifth_check_'.$i2.' === true || sixth_check_'.$i2.' == true) {'."\n";
	}

	if ($website_information["english_title"] == $website_titles["Diary Slim"]) {
		echo '	if (sixth_check_'.$i2.' == true) {'."\n";
	}

	echo '		var chapter_title = " - '.$chapter_title_text.": ".$i2." - ".$chapter_titles[$i2 - 1].'";'."\n";
	echo '		var current_chapter_number = '.$i2.';'."\n";
	echo '		Open_Chapter(chapter_title, current_chapter_number);'."\n";
	echo '	}'."\n";

	if ($i != $story_info["chapter_number"]) {
		echo "\n";
	}

	$i++;
}

echo "}"."\n"."\n".
'console.log("Open Chapter Script was loaded.");'."\n";

echo "\n";
echo "Check_Chapter_Number_On_Link();"."\n";
echo "\n";
echo "var local_website_url = String(window.location);"."\n";
echo "\n";
echo 'var last_chapter_texts = [
"Last_Chapter",
"Last Chapter",
"last_chapter",
"last chapter",

"Último_Capítulo",
"último_capítulo",
"Último Capítulo",
"último capítulo",
"Último%20Capítulo",
"último%20capítulo",

"%C3%9Altimo_Capítulo",
"%C3%BAltimo_cap%C3%ADtulo",
"%C3%9Altimo Capítulo",
"%C3%BAltimo cap%C3%ADtulo",
"%C3%9Altimo Cap%C3%ADtulo",
"%C3%9Altimo%20Capítulo",
"%C3%BAltimo%20cap%C3%ADtulo",
"%C3%9Altimo%20Cap%C3%ADtulo",

"Ultimo_Capítulo",
"ultimo_capítulo",
"Ultimo Capítulo",
"ultimo capítulo",
"Ultimo%20Capítulo",
"ultimo%20capítulo",
];

var parameter_text = local_website_url.split("?")[local_website_url.split("?").length - 1];
var parameter_text_replaced = parameter_text.replace("[", "").replace("]", "").replace("(", "").replace(")", "").replace("%20", " ").replace("#", " ");

parameter_text_replaced = parameter_text_replaced.split("&")[parameter_text_replaced.split("&").length - 1];

console.log("Parameter Text: " + parameter_text);
console.log("Replaced Parameter Text: " + parameter_text_replaced);

if (last_chapter_texts.indexOf(parameter_text_replaced) != -1) {
	console.log("Website URL includes last chapter text.");
	Open_Chapter(Last_Chapter_Title, Last_Chapter);
}'."\n";

?>