<?php 

#Watch History Website setter
if (strpos ($host, $params[0].'='.$sitewatch) == true) {
	$choosenwebsite = $sitewatch;

	#Year definer
	$ano = 2020;
	$anoantes = $ano - 1;
	$anoantes2 = $ano - 2;

	#Site title and name definer
	$site = ucwords($choosenwebsite);
	$sitename = $choosenwebsite;
	$setsitecssfile = $watchcss;

	#Site settings
	$sitehaschangelog = true; #If site has a changelog tab and file to be read
	$twonly = true; #If site shows only the Ready To Watch medias or not
	$newwatchedstyle = true; #If site uses the new Watched Media displaying style or not

	#Site settings setter file includer
	include $settingsparamsfile;

	#Site Tabs array
	$tabs = array('Watched', 'To Watch', 'Links', 'Movies', 'Arch', 'Arch'.$anoantes2, 'Arch'.$anoantes, 'Changelog');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Watched'.$ano, 'To Watch', 'Links', 'Movies', 'Archived Media', 'Archived '.$anoantes2, 'Archived '.$anoantes, 'Changelog');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Assistidos'.$ano, 'Para Assistir', 'Links', 'Filmes', 'Mídias Arquivadas', 'Arquivado '.$anoantes2, 'Arquivado '.$anoantes, 'Registro de Mudanças');
	}

	#Number of tabs
	$tabnumb = 7;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>