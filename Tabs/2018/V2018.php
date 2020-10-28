<?php 

$website_folder = "Years";

$pastebinlinks = array(
'<a href="https://pastebin.com/LKWyzY20">https://pastebin.com/LKWyzY20</a>',
'<a href="https://pastebin.com/e0ETLLzC">https://pastebin.com/e0ETLLzC</a>',
'<a href="https://pastebin.com/QMuPJ21b">https://pastebin.com/QMuPJ21b</a>',
'<a href="https://pastebin.com/mj1PR9PE">https://pastebin.com/mj1PR9PE</a>',
);

if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
	$pastebinlinkyear = $pastebinlinks[0];
	$pastebinlinkmedias = $pastebinlinks[2];
}

if ($website_language == $languages_array[2]) {
	$pastebinlinkyear = $pastebinlinks[1];
	$pastebinlinkmedias = $pastebinlinks[3];
}

$thingsnumb = 221;
$thingsnumb2 = 3.108;
$watchednumb = $watched2018number;

$moviesnumb = 4; 
$cartoonsnumb = 5;
$seriesnumb = 5; 
$animesnumb = 18;
$videosnumb = 20;

$websites_number = 6;
$friendsnumb = 17;
$cmntsnumb1 = 106;
$tasksnumb = 44;
$sizenumb = $bluespan.'16'.$spanc.'GBs';

#Line number for the 2018 Watched VideoTypes.txt
$original1 = 12;
$original2 = 18;
$original3 = 25;
$original4 = 32;
$original5 = 52;

$moviesline = $original1;
$cartoonsline = $original2;
$seriesline = $original3;
$animesline = $original4;
$videosline = $original5;

if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
	$stry5 = 'The Life of Littletato';
	$stry6 = 'My Diary';
	$pqntlink = 'littletato';
}

if ($website_language == $languages_array[2]) {
	$stry5 = 'A Vida de Pequenata';
	$stry6 = 'Meu Diário';
	$pqntlink = 'pequenata';
}

$strynames = array(
$stry5, 
$stry6);

$strylnks = array(
'<a href="'.$main_website_url.'📘/" class="'.$colortext2.'">'.$strynames[1].'</a>', 
'<a href="'.$main_website_url.$pqntlink.'/" class="'.$colortext2.'">'.$strynames[0].'</a>',
);

$strycapnumb = array(22, 7);
$strywordnumb = array(4.053);
$strylinesnumb = array(555);
$strycharnumb = '12.730';

$date1 = $bluespan.'05:16 25/12/2018'.$spanc;
$date1 = $txts[0].': '.$date1;

$dates = $date1.'<br />';

$citiestxts = array(
$langreadtext.': '.$siteicon,
$tabnames[1].': '.$icons[0],
$tabnames[2].': '.$icons[4],
$tabnames[3].': '.$icons[3],
);

#TabGenerator.php includer
include $website_tabs_generator;

?>