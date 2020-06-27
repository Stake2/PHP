<?php 

#SpaceLiving Website setter
if (strpos ($host, $params[0].'='.$sitespaceliving) == true) {
	$choosenwebsite = $sitespaceliving;

	#Site title and name definer
	$site = ucwords($choosenwebsite);
	$sitename = $choosenwebsite;
	$setsitecssfile = $slcss;

	#Site settings
	$sitehasnotifications = false; #If site has notifications on
	$sitehascommentstab = true; #If site has a Comments Tab variable
	$siteshowscomments = true; #If site shows the comments on the Comments Tab
	$sitehasstories = true; #If site has a Stories Tab
	$sitehaschangelog = false; #If site has a changelog tab and file to be read
	$storyhascovers = false; #If site has book covers for the story
	$sitestorywrite = false; #If site has a story writing chapter
	$showwriteformtext = false; #If site shows title and story text on the writing chapter
	$showchaptertext = false; #If site shows the chapter text on the writing chapter form
	$sitehidenotifonclickreadtab = false; #If site hides the notification when you click on the "Read story" button
	$siteuseschapteropener = true; #If site uses the Chapter Opener script

	#Site settings setter file includer
	include $settingsparamsfile;

	#Site Tabs array
	$tabs = array('Read', 'Readers', 'Comment', 'Write', 'Stories');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Read story', 'Readers', 'Comment', 'Write', 'Stories', 'Chapters', 'Comments');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Ler história', 'Leitores', 'Comentar', 'Escrever', 'Histórias', 'Capítulos', 'Comentários');
	}

	#Number of tabs
	$tabnumb = 6;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>