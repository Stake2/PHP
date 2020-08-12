<?php 

$siteurlgeral = $url.str_replace(' ', '_', strtolower($sitename_desertisland)).'/';
$sitephpfolder2 = $php_tabs.ucwords($choosenwebsite).'/';

$site_image = 'desert island/capa original.jpg';
$siteimage = $cdn_image_stories.$site_image;
$imglink = $siteimage;

$custom_website_head_content = '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
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
</style>";

#Site name in English and Brazilian Portuguese language
$sitenames = array(
$enus_title = 'A New Story',
$pt_title = 'Uma Nova História',
);

#Site descriptions
$sitedescs = array(
'Site about a new story that is coming, made by stake2.',
'Site sobre uma nova história que está chegando, feito por stake2.',
);

$descs = array(
'Site about a new story that is coming, made by stake2.',
'Site sobre uma nova história que está chegando, feito por stake2.',
);

#Story name definer
$story = $desert_island_story_name;

#Re-include of the StoryVars.php file to set the story name
include $story_variables_php_variable;

#Story name definer
$story = $desert_island_story_name;

#English texts for Pequenata website
if (in_array($lang, $en_langs)) {
	$website_texts = array(
	'Coming soon',
	'The new story of Izaque Sanvezzo',
	'30 days until a big reveal',
	);
}

#Brazilian Portuguese texts for Pequenata website
if (in_array($lang, $pt_langs)) {
	$website_texts = array(
	'Em breve',
	'A nova história de Izaque Sanvezzo',
	'Faltam 30 dias para uma grande revelação',
	);
}

$array = $website_texts;
$additional_website_content = '
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
<div class="w3-display-middle" style="text-align:center!important;">
<h1 class="w3-jumbo w3-animate-top">'.$array[0].':<br /></h1>
<h3 class="w3-jumbo w3-animate-top">'.$array[1].'.</h3>
<hr class="w3-border-grey" style="margin:auto;width:40%">
<h3 class="w3-center">'.$array[2].'...</h3>
</div>
</div>';

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