<?php

#Get the localhost link
$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$files = array(
'Tabs/ThindsIDo/Index.php',
);

$phpfile = true;

#Site variables
$url = "https://diario.netlify.app";
$folder1 = 'Tabs';
$folder2 = 'Variables';
$folder3 = 'Years';
$global = 'Global';
$generic = 'Generic';
$sitephpfolder = "C:/Mega/Diario/PHP/";
$sitephpfoldergeraltabs = $sitephpfolder.$global.'/'.$folder1.'/';
$sitephpfoldergeralvars = $sitephpfolder.$global.'/'.$folder2.'/';
$settingsparamsfile = $sitephpfoldergeralvars.'Settings Params'.'.php';

#URL parameters
$params = array(
'site', 
'type', 
'lang', 
'twonly',
'subsite',
);

#URL settings parameters
$settingsparams = array(
'notif',
'commenttab',
'showcomments',
'hasstories',
'hascl',
'writestory',
'writeformtxt',
'writestorytext',
'translate',
'chaptertowrite',
);

#URL Site types
$types = array(
'site', 
'story',
);

#URL Site languages
$langs = array(
'geral', 
'enus', 
'ptbr',
);

#Folder variables
$sitetabsgeralvarsfolder = $sitephpfolder.$global.'/'.$folder2.'/';
$sitetabsgeralfolder = $sitephpfolder.$global."/".$folder1."/".$generic.$folder1."/";
$siteglobaltabsfolder = $sitephpfolder.$global."/".$folder1."/".$global.$folder1."/";

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

$yeararray = array(
$site2018,
$site2019,
$site2020,
);

#Links for the years
$yearlinks = array(
$url.'/'.$folder3.'/'.$site2018.'/', 
$url.'/'.$folder3.'/'.$site2019.'/', 
$url.'/'.$folder3.'/'.$site2020.'/',
);

$yearnumb = 2;

#Language definer
if (strpos ($host, $params[2].'='.$langs[0]) == true) {
    $lang = $langs[0];
}

if (strpos ($host, $params[2].'='.$langs[1]) == true) {
    $lang = $langs[1];
}

if (strpos ($host, $params[2].'='.$langs[2]) == true) {
    $lang = $langs[2];
}

#Normal site type definer
if (strpos ($host, $params[1].'='.$types[0]) == true) {
	#Sitetype definer
	$sitetype1 = $types[0];
}

#Story site type definer
if (strpos ($host, $params[1].'='.$types[1]) == true) {
	#Sitetype definer
	$sitetype1 = $types[1];

	#"Site has stories" setting definer
	$sitehasstories = true;
}

#Years site type definer
if (in_array($host, $yeararray)) {
	$sitetype2 = 'Years';
}

$sitesbuttonintab = false;
$sitehasnotifications = false;
$sitehasstories = false;
$siteshowscomments = false;
$sitehaschangelog = false;
$sitestorywrite = false;
$chaptertowrite = false;
$roundedbuttonson = true;
$thingsidofake = false;
$watchmedias2018 = false;
$watchmedias2019 = false;

#"Things I do" Website definer
if (strpos ($host, $params[0].'='.$sitethingsido) == true) {
	#Site title and name definer
	$sitename = $sitethingsido;
	$site = $sitethingsido;

	#Site settings
	$showembeds = true; #If site shows Youtube embeds
	$showembeds2 = false; #If site shows Youtube embeds

	#Site Tabs array
	$tabs = array('Productive Things', 'Not Productive Things');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Productive Things', 'Not Productive Things', 'To Write', 'Make Websites', 'To Program/Code', 'Edit Videos', 'To Draw', 'Listen to Music', 'To Talk', 'To Watch', 'To Play Games', 'Songs', 'Playlists');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Coisas Produtivas', 'Coisas Não Produtivas', 'Escrever', 'Fazer Sites', 'Programar', 'Editar Vídeos', 'Desenhar', 'Ouvir música', 'Conversar', 'Assistir', 'Jogar Jogos', 'Músicas', 'Playlists');
	}

	#Number of tabs
	$tabnumb = 2;

	$cities[0] = $sitetabsgeralfolder.'City1.php';
	$cities[1] = $sitetabsgeralfolder.'City2.php';
	$cities[2] = $sitetabsgeralfolder.'City3.php';
}

#Lang modifier
$lang2 = strtoupper($lang);
$lang2 = substr_replace($lang2, '-', 2, 0);

#VGlobal.php variables file includer
include $sitetabsgeralvarsfolder."VGlobal.php";

?>
<!DOCTYPE html>
<?php 

#Siteheader displayer
echo $siteheader;

#Site notification file includer if setting is true
if ($sitehasnotifications == true) {
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