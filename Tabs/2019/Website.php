<?php 

#2019 Website setter
if (strpos ($host, $params[0].'='.$site2019) == true) {
	$choosenwebsite = $site2019;

	$site = $choosenwebsite;
	$ano = $site;
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	#Site settings setter file includer
	include $settingsparamsfile;

	$tabs = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');

	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');
	}

	if ($lang == $langs[2]) {
		$tabnames = array($ano, 'Mídia', 'Amigos', 'Prints', 'Tarefas', 'Anos');
	}

	$tabnumb = 5;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>