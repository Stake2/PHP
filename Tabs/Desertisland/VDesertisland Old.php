<?php 

$siteurlgeral = $url.str_replace(' ', '_', strtolower($sitename_desertisland)).'/';
$sitephpfolder2 = $php_tabs.ucwords($choosenwebsite).'/';

$site_image = 'Capa Original.jpg';
$siteimage = $cdn_image_stories_desertisland.$site_image;
$imglink = $siteimage;

$storyfolder = $desert_island_story_folder;

#TextFileReader.php file includer
include $text_file_reader_file_php;

#Site descriptions
$sitedescs = array(
'Website about my story, '.$story.', made by stake2', 
'Site sobre a minha história, '.$story.', feito por stake2',
);

#Synopsis text definer using the $synopsis that is generated from TextFileReader.php
$descs = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$synopsis.'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$sinopse.'"<br />',
);

$custom_website_head_content = '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
'."<style>
body, h1, h2, h3 ".'{
	font-family: "Raleway", sans-serif;
}
'."
body, html {
	height: 100%
}

.bgimg {
  background-image: url('".$siteimage."');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>".
'<script type="text/javascript">
function pad(
  a, // the number to convert 
  b // number of resulting characters
){
  return (
    1e15 + a + // combine with large number
    "" // convert to string
  ).slice(-b) // cut leading "1"
}

var launch_date = new Date(2020, 10, 11);

var launch_date_day = launch_date.getDate();

var launch_date_month = launch_date.getMonth();
var launch_date_month = pad(launch_date_month, 2);

var launch_date_year = launch_date.getFullYear();

var launch_date = String(launch_date_day) + "/" + String(launch_date_month) + "/" + String(launch_date_year);

var today_date = new Date();

var today_date_day = today_date.getDate();

var today_date_month = today_date.getMonth() + 1;
var today_date_month = pad(today_date_month, 2);

var today_date_year = today_date.getFullYear();

var today_date = String(today_date_day) + "/" + String(today_date_month) + "/" + String(today_date_year);

var dateFirst = new Date(2020, 10, 11);
var dateSecond = new Date();

// time difference
var timeDiff = Math.abs(dateSecond.getTime() - dateFirst.getTime());

var DateDiff = {
    inDays: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();

        return parseInt((t2 - t1)/(24 * 3600 * 1000));
    },

    inWeeks: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();

        return parseInt((t2 - t1) / ( 24 * 3600 * 1000 * 7));
    },

    inMonths: function(d1, d2) {
        var d1Y = d1.getFullYear();
        var d2Y = d2.getFullYear();
        var d1M = d1.getMonth() + 1;
        var d2M = d2.getMonth();

        return (d2M + 12 * d2Y)-(d1M + 12 * d1Y);
    },

    inYears: function(d1, d2) {
        return d2.getFullYear() - d1.getFullYear();
    }
}

var d1 = new Date();
var d2 = new Date(2020, 10, 11);
var months = DateDiff.inYears(d1, d2) * 12;
var month = DateDiff.inMonths(d1, d2) - months;
//var days = DateDiff.inYears(d1, d2) * 365;
//var dy = DateDiff.inDays(d1, d2) - days;

console.log("The launch date is: " + launch_date);
console.log("Today is: " + today_date);
</script>
';

#Site name in English and Brazilian Portuguese language
$sitenames = array(
$enus_title = 'A New Story',
$pt_title = 'Uma Nova História',
);

/*
#Site descriptions
$sitedescs = array(
'Site about a new story that is coming, made by stake2.',
'Site sobre uma nova história que está chegando, feito por stake2.',
);

$descs = array(
'Site about a new story that is coming, made by stake2.',
'Site sobre uma nova história que está chegando, feito por stake2.',
);
*/

#Story name definer
$story = $desert_island_story_name;

#Re-include of the StoryVars.php file to set the story name
include $story_variables_php_variable;

#Story name definer
$story = $desert_island_story_name;

$number_until_date_of_publication = 1;
$date_to_publish = (string)($number_until_date_of_publication);

if ($number_until_date_of_publication > 1) {
	$string_text_to_use = $months_text;
	$publish_date_text_helper_pt = 'Faltam';
}

if ($number_until_date_of_publication <= 1) {
	$string_text_to_use = $month_text;
	$publish_date_text_helper_pt = 'Falta';
}

#English texts for Pequenata website
if (in_array($lang, $en_langs)) {
	$website_texts = array(
	'Coming soon',
	'The new story of Izaque Sanvezzo',
	'<span id="launch_date">'.$date_to_publish.'</span> '.$string_text_to_use.' until a big reveal...<br />
	Prepare your boats',
	);
}

#Brazilian Portuguese texts for Pequenata website
if (in_array($lang, $pt_langs)) {
	$publish_date_number = '<span id="launch_date">'.$date_to_publish.'</span>';
	$publish_date_text = $string_text_to_use;

	$string_to_format = $publish_date_text_helper_pt.' %s %s para uma grande revelação...<br />
	Preparem seus barcos';

	$string_to_format = sprintf($string_to_format, $publish_date_number, $publish_date_text);

	$website_texts = array(
	'Em breve',
	'A nova história de Izaque Sanvezzo',
	$string_to_format,
	);
}

$array = $website_texts;
$additional_website_content = '
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
<div class="w3-display-middle" style="text-align:center!important;">
<h1 class="w3-jumbo w3-animate-top">'.$array[0].':<br /></h1>
<h3 class="w3-jumbo w3-animate-top">'.$array[1].'.</h3>
<hr class="w3-border-grey" style="margin:auto;width:40%">
<h3 class="w3-center">'.$array[2].'.</h3>
</div>
</div>

<script>
launch_date_div = document.getElementById("launch_date");
launch_date_div.innerHTML = month;
console.log("Replaced the date with the difference between the two dates.");
</script>
';

#Site name, title, url and description setter
if ($lang == $geral_lang) {
	$lang = $enus_lang;
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$lang = $geral_lang;

	$sitename = $enus_title.' '.$lang2;
	$sitetitulo = $enus_title.' '.ucwords($lang);
	$sitetitulo2 = $enus_title.': '.$icons[4].' '.$icons[22];
	$siteurl = $siteurlgeral;
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];

	$lang = $geral_lang;
}

if ($lang == $enus_lang) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);

	$sitename = $enus_title;
	$sitetitulo = $enus_title;
	$sitetitulo2 = $enus_title.': '.$icons[4].' '.$icons[22];
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
}

if (in_array($lang, $pt_langs)) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);

	if ($lang == $ptpt_lang) {
		$sitetitulo = $sitenames[1].' '.strtoupper($lang2);
	}

	else {
		$sitetitulo = $sitenames[1];
	}

	$sitename = $choosenwebsite;
	$sitetitulo2 = $story.': '.$icons[11];
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[1];
	$sitedesc2 = $descs[1];
}

?>