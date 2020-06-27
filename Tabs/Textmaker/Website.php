<?php 

#Text Maker Website setter
if (strpos ($host, $params[0].'='.$sitetextmaker) == true) {
	$choosenwebsite = $sitetextmaker;

	#Site title and name definer
	$site = ucwords($choosenwebsite);
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	#Site Tabs array
	$tabs = array('Output', 'My Year', 'My Stories');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Output', 'My Year', 'My Stories');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Resultado', 'Meu Ano', 'Minhas Histórias');
	}

	#Number of tabs
	$tabnumb = 2;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>