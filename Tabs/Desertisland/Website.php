<?php 

#Pequenata Website setter
if (strpos ($host, $params[0].'='.$sitedesertisland) == true) {
	$choosenwebsite = $sitedesertisland;

	#Site title and name definer
	$site = $choosenwebsite;
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	#Site settings definer
	$deactivateall = true;
	$site_is_prototype = true;
	$site_haves_additional_website_content = true;

	#Site settings setter file includer
	include $settingsparamsfile;

	#Site Tabs array
	$tabs = array('X');

	#Site Tabnames array
	if (in_array($lang, $en_langs)) {
		$tabnames = array('X');
	}

	if (in_array($lang, $pt_langs)) {
		$tabnames = array('X');
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;

	#Array of the GenericTabs files
	$i = 0;
	while ($i <= $tabnumb) {
		$i2 = $i + 1;
		$cities[$i] = $sitetabsgeralfolder.'City'.$i2.'.php';
		$i++;
	}
}

?>