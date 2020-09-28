<?php 

# Pequenata CSS Pack file includer
include $css_pack_desertisland;

# HTML and HTML Style variables
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'"';
$border = 'border-width:4px;border-color:'.'#ffffb3'.';border-style:solid;';
$border2 = 'border-width:7px;border-color:'.$color3.';border-style:solid;';
$h2 = '<'.$n.' class="'.$computervar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'">';'.$roundedborderstyle2.';
$h4 = '<'.$m.' class="'.$mobilevar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'">';
$widthsize = '';
$size = '';
$sitenumbcolor = $subtextspan;
$sitenumbhovercolor = $cssbtn5;

$textstyle = 'w3-text-black'.' '.$ultimate_bg_color;

# New site name generator, generates: "desert_island"
$new_site_name = str_replace(' ', '_', strtolower($sitename_desertisland));

# Folder variables
$siteurlgeral = $url.$new_site_name.'/';
$sitephpfolder2 = $php_tabs_variable.ucwords($choosenwebsite).'/';
$storyfolder = $desert_island_story_folder;

# Form code for the comment and read forms
$formcode = 'desert_island';

$nolangstoryfolder = $notepad_stories_folder_variable.$storyfolder.'/';
$no_language_story_folder = $notepad_stories_folder_variable.$storyfolder.'/';

$single_cover_folder = 'Capas';
$cover_folder = $cdn_image_stories_desertisland.$single_cover_folder.'/';

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_displayer_php_variable;

# Story name definer
$story = $desert_island_story_name;

# Story status
$storystatus = $status[1];

# Site image vars
$site_image = 'Capa Original.jpg';
$siteimage = $cdn_image_stories_desertisland.$site_image;
$imglink = $siteimage;

$imagesize1 = 60;
$imagesize2 = 100;

# TextFileReader.php file includer
require $text_file_reader_file_php;

$chapters = $chapter_number[0];

# Story Details Definer.php file includer
require $story_details_definer_php;

$commentsnumb = 1;
$commentsnumbtext = $commentsnumb + 1;
$commentsnormalnumb = 0;
$commentsnormalnumbtowrite = $commentsnormalnumb - 1;
$commentschapternumb = $commentsnumbtext - $commentsnormalnumb;

$readednumb = 1;

# Reads the book cover image directory if the site has book covers
if ($storyhascovers == true) {
	require $cover_images_generator_php_variable;
}

# Re-include of the StoryVars.php file to set the story name
include $story_variables_php_variable;

# English texts for Desert Island website
if (in_array($lang, $en_langs)) {
	$readtxts = array(
	$readingtxt = "You're reading",
	$readingtxt.': '.ucwords($story),
	'I Read It ✓',
	'I read the Chapter',
	'Read the Chapter',
	'Readings',
	'Readers',
	'Reader',
	);

	$writetxts = array(
	'Write',
	'Write the Chapter',
	substr($readingtxt, 0, -8).' '.strtolower('Writing').': '.ucwords($story),
	);
}

#Brazilian Portuguese texts for Desert Island website
if (in_array($lang, $pt_langs)) {
	$readtxts = array(
	$readingtxt = "Você está lendo",
	$readingtxt.': '.ucwords($story),
	'Eu li ✓',
	'Eu li o Capítulo',
	'Leu o Capítulo',
	'Leituras',
	'Leitores',
	'Leitor',
	);

	$writetxts = array(
	'Escrever',
	'Escreva o capítulo',
	substr($readingtxt, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story),
	);
}

#Status text definer, that sets the status text with [] around it
$statustxt = '['.ucfirst($storystatus).']';

#Site name, title, url and description setter
if ($lang == $geral_lang) {
	$lang = $enus_lang;
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$lang = $geral_lang;

	$sitename = $enus_title.' '.$lang2;
	$sitetitulo = $enus_title.' '.ucwords($lang);
	$sitetitulo2 = $enus_title.': '.$icons[11];
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
	$sitetitulo2 = $enus_title.': '.$icons[11];
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

#Button names
$citiestxts = array(
$tabnames[0].': '.$icons[21].' '.$blackspan.'['.$newtxt.' '.$chapters.']'.$spanc,
$tabnames[1].': '.$icons[20].' '.$icon_heart_painted_red.' ❤️ '.$icon_smile_beam_painted_black.' 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$icons[11],
$icons[13],
);

#Buttons and tabs definer
#Tab titles definer
$tabtitles = array(
$tabnames[0].': '.$icons[21].' '.$blackspan.'['.$newtxt.' '.$chapters.']'.$spanc,
$tabnames[1].': '.$icons[20].' '.$icon_heart_painted_red.' ❤️ '.$icon_smile_beam_painted_black.' 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$blackspan.$storiesnumb.$spanc.' '.$icons[11],
);

#Button names definer
$i = 0;
foreach ($tabtitles as $tabname) {
	$citiestxts[$i] = $tabname;

	$i++;
}

#TabGenerator.php includer
include $tabgeneratorphp;

?>