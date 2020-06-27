<?php 

#Diário Website setter
if (strpos ($host, $params[0].'='.$sitediario) == true) {
	$choosenwebsite = $sitediario;

	#Site title and name definer
	$site = ucwords($choosenwebsite);
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	#Site settings
	$sitesbuttonintab = true; #If site has the Sites Button on the top bar
	$sitehascommentstab = true; #If site has a Comments Tab
	$siteshowscomments = false; #If site shows the comments on the Comments Tab

	#Site settings setter file includer
	include $settingsparamsfile;

	#Site Tabs array
	$tabs = array('Blocks', 'Characters', 'BlocksTexts', 'Comment');

	if ($sitehasstories == true) {
		array_push($tabs, 'Stories');
	}

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Read the Diary', 'Characters', 'Comment');

		if ($sitehasstories == true) {
			array_push($tabnames, 'Stories');
		}
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Ler o Diário', 'Personagens', 'Comentar');

		if ($sitehasstories == true) {
			array_push($tabnames, 'Histórias');
		}
	}

	#Number of tabs
	$tabnumb = 2;

	if ($sitehasstories == true) {
		array_push($tabnumb, $tabnumb + 1);
	}

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>