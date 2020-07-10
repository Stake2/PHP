<?php 

#SpaceLiving Website setter
if (strpos ($host, $params[0].'='.$sitespaceliving) == true) {
	$choosenwebsite = $sitespaceliving;

	#Site title and name definer
	$site = ucwords($choosenwebsite);
	$sitename = $choosenwebsite;
	$setsitecssfile = $slcss;

	#Site settings
	$sitehasnotifications = false; #Defines if site has notifications on
	$sitehascommentstab = true; #Defines if site has a Comments Tab variable
	$sitehidescommentstab = false; #Defines if site has a Comments Tab variable
	$sitehascomments = false; #Defines the site has comments
	$siteshowscomments = true; #Defines if site shows the comments on the Comments Tab
	$sitehasstories = true; #Defines if site has a Stories Tab
	$sitehaschangelog = false; #Defines if site has a changelog tab and file to be read
	$showwriteformtext = false; #Defines if site shows title and story text on the writing chapter
	$showchaptertext = false; #Defines if site shows the chapter text on the writing chapter form
	$sitehidenotifonclickreadtab = false; #Defines if site hides the notification when you click on the "Read story" button
	$siteuseschapteropener = true; #Defines if site uses the Chapter Opener script
    $siteusescitybodygenerator = true; #Defines if the site uses the CityBody generator
	$sitestorywrite = false; #Defines if site has a story writing chapter
	$storyhascovers = false; #Defines if site has book covers for the story
	$storyhasreads = true; #Defines if the story website has "reads" number, file and elements
	$storyhasdates = false; #Defines if the story has dates
	$storyhastitles = true; #Defines if the story has titles
	$storyusestatus = true; #Defines if the story uses the story statuses
	$storyhaschaptercomments = true; #Defines if the story has comments on the chapter
	$storyhaswriteform = true; #Defines if the story has writing form to write the story
	$storycontainsreads = false; #Defines if the story has reads on it
	$storycontainscomments = false; #Defines if the story has comments on it

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
	$tabnumb = count($tabs) - 1;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>