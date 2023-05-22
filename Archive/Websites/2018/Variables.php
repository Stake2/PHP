<?php 

$website_information["php_folder"] = "Years";

$pastebinlinks = array(
'<a href="https://pastebin.com/LKWyzY20">https://pastebin.com/LKWyzY20</a>',
'<a href="https://pastebin.com/e0ETLLzC">https://pastebin.com/e0ETLLzC</a>',
'<a href="https://pastebin.com/QMuPJ21b">https://pastebin.com/QMuPJ21b</a>',
'<a href="https://pastebin.com/mj1PR9PE">https://pastebin.com/mj1PR9PE</a>',
);

if (in_array($website_information["language"], $en_languages_array)) {
	$pastebinlinkyear = $pastebinlinks[0];
	$pastebinlinkmedias = $pastebinlinks[2];
}

if (in_array($website_information["language"], $pt_languages_array)) {
	$pastebinlinkyear = $pastebinlinks[1];
	$pastebinlinkmedias = $pastebinlinks[3];
}

$thingsnumb = 221;
$thingsnumb2 = 3.108;
$watched_number_ = $watched_episodes_2018_line_number;

$watched_movies_number = 4; 
$watched_cartoons_number = 5;
$watched_series_number = 5; 
$watched_animes_number = 18;
$watched_videos_number = 20;

$websites_number = 6;
$friendsnumb = 17;
$cmntsnumb1 = 106;
$tasksnumb = 44;
$sizenumb = $bluespan.'16'.$spanc.'GBs';

$media_type_movies_line = $original1;
$media_type_cartoons_line = $original2;
$media_type_series_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

if (in_array($website_information["language"], $en_languages_array)) {
	$stry5 = 'The Life of Littletato';
	$stry6 = 'My Diary';
	$pqntlink = 'littletato';
}

if (in_array($website_information["language"], $pt_languages_array)) {
	$stry5 = 'A Vida de Pequenata';
	$stry6 = 'Meu Diário';
	$pqntlink = 'pequenata';
}

$strynames = array(
$stry5, 
$stry6);

$strylnks = array(
'<a href="'.$website["url"].'📘/" class="'.$colortext2.'">'.$strynames[1].'</a>', 
'<a href="'.$website["url"].$pqntlink.'/" class="'.$colortext2.'">'.$strynames[0].'</a>',
);

$strycapnumb = array(22, 7);
$strywordnumb = array(4.053);
$strylinesnumb = array(555);
$strycharnumb = '12.730';

$date1 = $bluespan.'05:16 25/12/2018'.$spanc;
$date1 = $txts[0].': '.$date1;

$dates = $date1.'<br />';

$tab_texts = array(
$read_text.': '.$siteicon,
$tab_names[1].': '.$icons[0],
$tab_names[2].': '.$icons[4],
$tab_names[3].': '.$icons[3],
);

#TabGenerator.php includer
require $website_tabs_generator;

?>