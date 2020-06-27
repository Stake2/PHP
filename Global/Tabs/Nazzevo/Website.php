<?php 

#Nazzevo Website setter
if (strpos ($host, $params[0].'='.$sitenazzevo) == true) {
	$choosenwebsite = $sitenazzevo;

	#Site title and name definer
	$site = $sitenazzevo;
	$sitename = $sitenazzevo;
	$setsitecssfile = $pqntcss;

	#Site settings
	$sitehasnotifications = false; #If site has notifications on
	$sitehascommentstab = true; #If site has a Comments Tab variable
	$siteshowscomments = true; #If site shows the comments on the Comments Tab
	$sitehasstories = true; #If site has a Stories Tab
	$storyhascovers = true; #If site has book covers for the story

	#Site Tabs array
	$tabs = array('Read', 'Readers', 'Comment', 'Write', 'Stories', 'Changelog');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Read story', 'Readers', 'Comment', 'Write', 'Stories', 'Changelog', 'Chapters', 'Comments');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Ler história', 'Leitores', 'Comentar', 'Escrever', 'Histórias', 'Registro de Mudanças', 'Capítulos', 'Comentários');
	}

	#Number of tabs
	$tabnumb = 5;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>