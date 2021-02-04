<?php

#Get the localhost link
$host_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$files = array(
'Tabs/ThindsIDo/Index.php',
);

$phpfile = True;

#Website variables
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
'website', 
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

#URL Website website_types_array
$website_types_array = array(
'website', 
'story',
);

#URL Website languages
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
$websites_array = array(
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
$sitepocb = $websites_array[0],
$sitediario = $websites_array[1],
$sitemlp = $websites_array[2],
$sitewatch = $websites_array[3],
$sitemusic = $websites_array[4],
$sitegames = $websites_array[5],
$sitefb = $websites_array[6],
$sitett = $websites_array[7],
$sitetasks = $websites_array[8],
$siteyears = $websites_array[9],
$site2018 = $websites_array[10], 
$site2019 = $websites_array[11], 
$site2020 = $websites_array[12],
$sitestories = $websites_array[13],
$sitenw = $websites_array[14],
$sitepqnt = $websites_array[15],
$sitesl = $websites_array[16],
$sitenazzevo = $websites_array[17],
$sitels = $websites_array[18],
$siteluiza = $websites_array[19],
$sitemf = $websites_array[20],
$sitewt = $websites_array[21],
$sitestake2 = $websites_array[22],
$sitetextmaker = $websites_array[23],
$sitethingsido = $websites_array[24],
);

$years_array = array(
$site2018,
$site2019,
$site2020,
);

#Links for the years
$year_websites_links = array(
$main_website_url.'/'.$years_folder_variable.'/'.$site2018.'/', 
$main_website_url.'/'.$years_folder_variable.'/'.$site2019.'/', 
$main_website_url.'/'.$years_folder_variable.'/'.$site2020.'/',
);

$years_number = 2;

#Language definer
if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[0]) == True) {
    $website_language = $languages_array[0];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[1]) == True) {
    $website_language = $languages_array[1];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[2]) == True) {
    $website_language = $languages_array[2];
}

#Normal website type definer
if (strpos ($host_text, $website_selector_parameters[1].'='.$website_types_array[0]) == True) {
	#Website Type definer
	$website_type = $website_types_array[0];
}

#Story website type definer
if (strpos ($host_text, $website_selector_parameters[1].'='.$website_types_array[1]) == True) {
	#Website Type definer
	$website_type = $website_types_array[1];

	#"Website has stories" setting definer
	$website_has_stories_tab_setting = True;
}

#Years website type definer
if (in_array($host_text, $years_array)) {
	$sub_website_type = 'Years';
}

$sitesbuttonintab = false;
$website_has_notifications = false;
$website_has_stories_tab_setting = false;
$website_shows_comments = false;
$website_has_changelog_setting = false;
$website_write_story_setting = false;
$website_chapter_to_write_setting = false;
$roundedbuttonson = True;
$thingsidofake = false;
$watchmedias2018 = false;
$watchmedias2019 = false;

#"Things I do" Website definer
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitethingsido) == True) {
	#Website title and name definer
	$website_name = $sitethingsido;
	$website = $sitethingsido;

	#Website settings
	$showembeds = True; #If website shows Youtube embeds
	$showembeds2 = false; #If website shows Youtube embeds

	#Website Tabs array
	$tabs = array('Productive Things', 'Not Productive Things');

	#Website Tabnames array
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

#Website notification file includer if setting is True
if ($website_has_notifications == True) {
	echo $notification_script;
	echo '<script>
function Hide_Notification() {
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