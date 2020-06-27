<?php 

#Xena e Izaque 3 meses Website setter
if (strpos ($host, $params[0].'='.$sitexenaeizaque) == true) {
	$choosenwebsite = $sitexenaeizaque;

	#Site title and name definer
	$site = ucwords($choosenwebsite);
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	$siteusescitybodygenerator = true;
	$siteusesuniversalfilereader = true;

	#Site settings setter file includer
	include $settingsparamsfile;

	#Site Tabs array
	$tabs = array('Show :3');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array(
		'Show :3',
		);
	}

	if ($lang == $langs[2]) {
		$tabnames = array(
		'Mostrar :3', 
		);
	}

	#Number of tabs
	$tabnumb = count($tabnames) - 1;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>