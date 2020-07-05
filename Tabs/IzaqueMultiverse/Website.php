<?php 

#2018 Website setter
if (strpos ($host, $params[0].'='.$siteizaquemultiverse) == true) {
	$choosenwebsite = $siteizaquemultiverse;

	$site = $choosenwebsite;
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	#Site settings
	$siteusescitybodygenerator = true;
	$siteusesuniversalfilereader = true;

	$tabs = array();

	#Site settings setter file includer
	include $settingsparamsfile;

	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('First Tab');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Primeira Aba');
	}

	if (empty($tabnames)) {
		if ($lang == $langs[0] or $lang == $langs[1]) {
			array_push($tabnames, 'Placeholder of the Tab');
		}

		if ($lang == $langs[2]) {
			array_push($tabnames, 'Espaço reservado para a Aba');
		}
	}

	$tabnumb = 0;
	$tabnumb2 = $tabnumb;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>