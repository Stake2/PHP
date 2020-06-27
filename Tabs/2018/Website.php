<?php 

#2018 Website setter
if (strpos ($host, $params[0].'='.$site2018) == true) {
	$choosenwebsite = $site2018;

	$site = $choosenwebsite;
	$ano = $site;
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	$tabs = array($ano, 'Media', 'Tasks', 'Years');

	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array($ano, 'Media', 'Tasks', 'Years');
	}

	if ($lang == $langs[2]) {
		$tabnames = array($ano, 'Mídia', 'Tarefas', 'Anos');
	}

	$tabnumb = 3;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>