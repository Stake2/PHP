<?php 

#Nazzevo Website setter
if (strpos ($host, $params[0].'='.$sitenazzevo) == true) {
	$choosenwebsite = $sitenazzevo;

	#Site title and name definer
	$site = $sitenazzevo;
	$sitename = $sitenazzevo;
	$setsitecssfile = $pqntcss;

	#Site settings
	$sitehasnotifications = false; #Defines if site has notifications on
	$sitehascommentstab = true; #Defines if site has a Comments Tab variable
	$sitehascomments = true; #Defines the site has comments
	$siteshowscomments = true; #Defines if site shows the comments on the Comments Tab
	$sitehasstories = true; #Defines if site has a Stories Tab
	$storyhascovers = true; #Defines if site has book covers for the story
	$storyhasreads = true; #Defines if the story website has "reads" number, file and elements
	$storyhaschaptercomments = true; #Defines if the story has comments on the chapter
	$storyhasdates = false; #Defines if the story has dates
	$storyhastitles = true; #Defines if the story has titles
	$storyusestatus = true; #Defines if the story uses the story statuses
	$storycontainsreads = true; #Defines if the story has reads on it
	$storycontainscomments = true; #Defines if the story has comments on it

	#Site Tabs array
	$tabs = array('Read', 'Readers', 'Comment', 'Write', 'Stories');

	#Site Tabnames array
	if (in_array($lang, $en_langs)) {
		$tabnames = array('Read story', 'Readers', 'Comment', 'Write', 'Stories', 'Changelog', 'Chapters', 'Comments');
	}

	if (in_array($lang, $pt_langs)) {
		$tabnames = array('Ler história', 'Leitores', 'Comentar', 'Escrever', 'Histórias', 'Registro de Mudanças', 'Capítulos', 'Comentários');
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>