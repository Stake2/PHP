<?php

#Get the localhost link
$host_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$files = array(
'Tabs/ThindsIDo/Index.php',
);

$phpfile = True;

# Website variables
$folders["mega"]["php"]["websites"]["root"] = 'Tabs';
$variables_folder_variable = 'Variables';
$years_folder_variable = 'Years';
$global_variable = 'Global';
$generic_variable = 'Generic';
$folders["mega"]["php"]["root"] = "C:/Mega/Diario/PHP/";
$sitephpfoldergeraltabs = $folders["mega"]["php"]["root"].$global_variable.'/'.$folders["mega"]["php"]["websites"]["root"].'/';
$sitephpfoldergeralvars = $folders["mega"]["php"]["root"].$global_variable.'/'.$variables_folder_variable.'/';
$setting_parameters_file = $sitephpfoldergeralvars.'Settings Params'.'.php';

#URL parameters
$website_selector_parameters = array(
'website', 
'type', 
'website_language', 
'subsite',
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
$sitetabsgeralvarsfolder = $folders["mega"]["php"]["root"].$global_variable.'/'.$variables_folder_variable.'/';
$generic_tabs_folder = $folders["mega"]["php"]["root"].$global_variable."/".$folders["mega"]["php"]["websites"]["root"]."/".$generic_variable.$folders["mega"]["php"]["websites"]["root"]."/";
$global_tabs_folder = $folders["mega"]["php"]["root"].$global_variable."/".$folders["mega"]["php"]["websites"]["root"]."/".$global_variable.$folders["mega"]["php"]["websites"]["root"]."/";

#Array of website names
$websites_array = array(
'pocb',
'diario',
'mlp',
'watch',
'music',
'games',
'fb',
'tasks',
'years',
'2018',
'2019',
'2020',
'stories',
'nw',
'pequenata',
'spaceliving',
'bulkan',
'stake2',
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
$sitebulkan = $websites_array[17],
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
$website["url"].'/'.$years_folder_variable.'/'.$site2018.'/', 
$website["url"].'/'.$years_folder_variable.'/'.$site2019.'/', 
$website["url"].'/'.$years_folder_variable.'/'.$site2020.'/',
);

$years_number = 2;

#Language definer
if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[0]) == True) {
    $website_information["language"] = $languages_array[0];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[1]) == True) {
    $website_information["language"] = $languages_array[1];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[2]) == True) {
    $website_information["language"] = $languages_array[2];
}

#Normal website type definer
if (strpos ($host_text, $website_selector_parameters[1].'='.$website_types_array[0]) == True) {
	#Website Type definer
	$website_information["type"] = $website_types_array[0];
}

#Story website type definer
if (strpos ($host_text, $website_selector_parameters[1].'='.$website_types_array[1]) == True) {
	#Website Type definer
	$website_information["type"] = $website_types_array[1];

	#"Website has stories" setting definer
	$story_website_settings["has_story_covers"] = True;
}

#Years website type definer
if (in_array($host_text, $years_array)) {
	$sub_website_type = 'Years';
}

#"Things I do" Website definer
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitethingsido) == True) {
	#Website title and name definer
	$website_information["english_title"] = $sitethingsido;
	$website = $sitethingsido;

	#Website settings
	$showembeds = True;
	$showembeds2 = false;

	#Website Tabs array
	$tabs = array('Productive Things', 'Not Productive Things');

	#Website Tabnames array
	if (in_array($website_information["language"], $en_languages_array)) {
		#$tab_names = array('Productive Things', 'Not Productive Things', 'To Write', 'Make Websites', 'To Program/Code', 'Edit Videos', 'To Draw', 'Listen to Music', 'To Talk', 'To Watch', 'To Play Games', 'Songs', 'Playlists');
	}

	if (in_array($website_information["language"], $pt_languages_array)) {
		#$tab_names = array('Coisas Produtivas', 'Coisas Não Produtivas', 'Escrever', 'Fazer Sites', 'Programar', 'Editar Vídeos', 'Desenhar', 'Ouvir música', 'Conversar', 'Assistir', 'Jogar Jogos', 'Músicas', 'Playlists');
	}

	# Number of tabs
	$website_tab_number = 2;
}

#Lang modifier
$hyphen_separated_website_language = strtoupper($website_information["language"]);
$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

#VGlobal.php variables file includer
require $sitetabsgeralvarsfolder."VGlobal.php";

?>
<!DOCTYPE html>
<?php 

#Siteheader displayer
echo $website_header;

#Website notification file includer if setting is True
if ($website_settings["notifications"] == True) {
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
require $sitetabsgeralvarsfolder."Tabs.php";

?>
</center>
</body>
</html>