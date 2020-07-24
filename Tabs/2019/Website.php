<?php 

#2019 Website setter
if (strpos ($host, $params[0].'='.$site2019) == true) {
	$choosenwebsite = $site2019;

	$site = $choosenwebsite;
	$ano = $site;
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	$siteusescitybodygenerator = false;

	#Site settings setter file includer
	include $settingsparamsfile;

	$tabs = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');

	if (in_array($lang, $en_langs)) {
		$tabnames = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');
	}

	if (in_array($lang, $pt_langs)) {
		$tabnames = array($ano, 'Mídia', 'Amigos', 'Prints', 'Tarefas', 'Anos');
	}

	$tabnumb = count($tabnames) - 1;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>