<?php 

#Pequenata Website setter
if (strpos ($host, $params[0].'='.$siteyourstruly_izaque) == true) {
	$choosenwebsite = $siteyourstruly_izaque;

	#Site title and name definer
	$site = $choosenwebsite;
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	$deactivatetopbtns = false;
	$deactivatesitesbtn = true;
	$hidecitysetting = true;
	$notsomuchspace = false;
	$siteusescitybodygenerator = true;
	$siteusesuniversalfilereader = true;

	#Site settings setter file includer
	include $settingsparamsfile;

	#Site Tabs array
	$tabs = array('Read');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Read:');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Ler:');
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>