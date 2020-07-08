<?php 

#Pequenata Website setter
if (strpos ($host, $params[0].'='.$sitepequenata) == true) {
	$choosenwebsite = $sitepequenata;

	#Site title and name definer
	$sitename = $choosenwebsite;
	$setsitecssfile = $pqntcss;

	#Site settings definer
	$sitehasnotifications = true; #Defines if site has notifications on
	$sitehascommentstab = true; #Defines if site has a Comments Tab variable
	$siteshowscomments = true; #Defines if site shows the comments on the Comments Tab
	$sitehasstories = true; #Defines if site has a Stories Tab
	$sitehaschangelog = true; #Defines if site has a changelog tab and file to be read
	$storyhascovers = true; #Defines if site has book covers for the story
	$sitestorywrite = false; #Defines if site has a story writing chapter
	$showwriteformtext = false; #Defines if site shows title and story text on the writing chapter
	$showchaptertext = false; #Defines if site shows the chapter text on the writing chapter form
	$sitehidenotifonclickreadtab = false; #Defines if site hides the notification when you click on the "Read story" button
	$siteuseschapteropener = true; #Defines if the website uses the ChapterOpener Script
	$newwritestyle = false; #Defines if the website uses the new writing style for chapters
	$storywritesstoryfiles = false; #Defines if the story website creates text files with the story text (chapters)
	$storyhasreads = true; #Defines if the story website has "reads" number, file and elements

	#Site settings setter file includer
	include $settingsparamsfile;

	#Site Tabs array
	$tabs = array('Read', 'Readers', 'Comment', 'Write', 'Stories', 'Changelog');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Read story', 'Readers', 'Comment', 'Write', 'Stories', 'Changelog', 'Chapters', 'Comments');
		$site = ucwords('littletato');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Ler história', 'Leitores', 'Comentar', 'Escrever', 'Histórias', 'Registro de Mudanças', 'Capítulos', 'Comentários');
		$site = ucwords($choosenwebsite);
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;

	#Array of the GenericTabs files
	$i = 0;
	while ($i <= $tabnumb) {
		$i2 = $i + 1;
		$cities[$i] = $sitetabsgeralfolder.'City'.$i2.'.php';
		$i++;
	}
}

?>