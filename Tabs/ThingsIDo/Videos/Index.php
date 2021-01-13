<?php

#Get the localhost link
$host_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$files = array(
'Tabs/ThindsIDo/Index.php',
);

$phpfile = true;

#Site variables
$main_website_url = "https://diario.netlify.app";
$tabs_folder_variable = 'Tabs';
$variables_folder_variable = 'Variables';
$years_folder_variable = 'Years';
$global_variable = 'Global';
$generic_variable = 'Generic';
$main_php_folder = "C:/Mega/Diario/PHP/";
$sitephpfoldergeraltabs = $main_php_folder.$global_variable.'/'.$tabs_folder_variable.'/';
$sitephpfoldergeralvars = $main_php_folder.$global_variable.'/'.$variables_folder_variable.'/';
$setting_parameters_file = $sitephpfoldergeralvars.'Settings Params'.'.php';

#URL parameters
$website_selector_parameters = array(
'site', 
'type', 
'website_language', 
'website_watch_history_show_to_watch_only_setting',
'subsite',
);

#URL settings parameters
$setting_parameters = array(
'website_notification_setting',
'website_comment_tab_setting',
'website_show_comments_setting',
'website_has_stories_setting',
'website_has_change_log_tab_setting',
'website_write_story_setting',
'website_show_write_form_text_setting',
'writestorytext',
'translate',
'website_chapter_to_write_setting',
);

#URL Site website_types_array
$website_types_array = array(
'site', 
'story',
);

#URL Site languages
$languages_array = array(
'geral', 
'enus', 
'ptbr',
);

#Folder variables
$sitetabsgeralvarsfolder = $main_php_folder.$global_variable.'/'.$variables_folder_variable.'/';
$generic_tabs_folder = $main_php_folder.$global_variable."/".$tabs_folder_variable."/".$generic_variable.$tabs_folder_variable."/";
$global_tabs_folder = $main_php_folder.$global_variable."/".$tabs_folder_variable."/".$global_variable.$tabs_folder_variable."/";

#Array of website names
$sitearray = array(
'pocb',
'diario',
'mlp',
'watch',
'music',
'games',
'fb',
'tt',
'tasks',
'years',
'2018',
'2019',
'2020',
'stories',
'nw',
'pequenata',
'spaceliving',
'nazzevo',
'ls',
'luiza',
'mf',
'wt',
'stake2',
'textmaker',
'thingsido',
);

#Sites array
$sites = array(
$sitepocb = $sitearray[0],
$sitediario = $sitearray[1],
$sitemlp = $sitearray[2],
$sitewatch = $sitearray[3],
$sitemusic = $sitearray[4],
$sitegames = $sitearray[5],
$sitefb = $sitearray[6],
$sitett = $sitearray[7],
$sitetasks = $sitearray[8],
$siteyears = $sitearray[9],
$site2018 = $sitearray[10], 
$site2019 = $sitearray[11], 
$site2020 = $sitearray[12],
$sitestories = $sitearray[13],
$sitenw = $sitearray[14],
$sitepqnt = $sitearray[15],
$sitesl = $sitearray[16],
$sitenazzevo = $sitearray[17],
$sitels = $sitearray[18],
$siteluiza = $sitearray[19],
$sitemf = $sitearray[20],
$sitewt = $sitearray[21],
$sitestake2 = $sitearray[22],
$sitetextmaker = $sitearray[23],
$sitethingsido = $sitearray[24],
);

$years_array = array(
$site2018,
$site2019,
$site2020,
);

#Links for the years
$yearlinks = array(
$main_website_url.'/'.$years_folder_variable.'/'.$site2018.'/', 
$main_website_url.'/'.$years_folder_variable.'/'.$site2019.'/', 
$main_website_url.'/'.$years_folder_variable.'/'.$site2020.'/',
);

$yearnumb = 2;

#Language definer
if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[0]) == true) {
    $website_language = $languages_array[0];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[1]) == true) {
    $website_language = $languages_array[1];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[2]) == true) {
    $website_language = $languages_array[2];
}

#Normal site type definer
if (strpos ($host_text, $website_selector_parameters[1].'='.$website_types_array[0]) == true) {
	#Sitetype definer
	$sitetype1 = $website_types_array[0];
}

#Story site type definer
if (strpos ($host_text, $website_selector_parameters[1].'='.$website_types_array[1]) == true) {
	#Sitetype definer
	$sitetype1 = $website_types_array[1];

	#"Site has stories" setting definer
	$website_has_stories_tab_setting = true;
}

#Years site type definer
if (in_array($host_text, $years_array)) {
	$sitetype2 = 'Years';
}

$sitesbuttonintab = false;
$website_has_notifications = false;
$website_has_stories_tab_setting = false;
$website_shows_comments = false;
$website_has_changelog_setting = false;
$website_write_story_setting = false;
$website_chapter_to_write_setting = false;
$roundedbuttonson = true;
$thingsidofake = false;
$watchmedias2018 = false;
$watchmedias2019 = false;

#"Things I do" Website definer
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitethingsido) == true) {
	#Site title and name definer
	$website_name = $sitethingsido;
	$site = $sitethingsido;

	#Site settings
	$showembeds = true; #If site shows Youtube embeds
	$showembeds2 = false; #If site shows Youtube embeds

	#Site Tabs array
	$tabs = array('Productive Things', 'Not Productive Things');

	#Site Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Productive Things', 'Not Productive Things', 'To Write', 'Make Websites', 'To Program/Code', 'Edit Videos', 'To Draw', 'Listen to Music', 'To Talk', 'To Watch', 'To Play Games', 'Songs', 'Playlists');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Coisas Produtivas', 'Coisas Não Produtivas', 'Escrever', 'Fazer Sites', 'Programar', 'Editar Vídeos', 'Desenhar', 'Ouvir música', 'Conversar', 'Assistir', 'Jogar Jogos', 'Músicas', 'Playlists');
	}

	#Number of tabs
	$tabnumb = 2;

	$cities[0] = $generic_tabs_folder.'City1.php';
	$cities[1] = $generic_tabs_folder.'City2.php';
	$cities[2] = $generic_tabs_folder.'City3.php';
}

#Lang modifier
$hyphen_separated_website_language = strtoupper($website_language);
$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

#VGlobal.php variables file includer
include $sitetabsgeralvarsfolder."VGlobal.php";

?>
<!DOCTYPE html>
<?php 

#Siteheader displayer
echo $website_header;

#Site notification file includer if setting is true
if ($website_has_notifications == true) {
	echo $notificationscript;
	echo '<script>
function hidenotif() {
	var notifdiv = document.getElementById("notificationdiv");
	var notifclosebtn = document.getElementById("notificationclose");

	//Animates the div element from top to bottom, hiding it
	notifdiv.className = notifdiv.className.replace("stake2animatebottom", "stake2animatebottomrevert");

	//Changes the text of the div element
	notifdiv.innerHTML = "<h1 width='."'50%'".'>" + btnText1 + "</h1>";

	//Hides the div element after the animation has stopped
	setTimeout(function() {
		notifdiv.style.display = "none";
	}, 10000);
}
</script>';
}

#Tabs loader
include $sitetabsgeralvarsfolder."Tabs.php";

?>
</center>
</body>
</html>