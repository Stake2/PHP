<?php

#Get the localhost link
$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

#Site variables
$sitephpfolder = "C:/Mega/Diario/PHP/";
$url = "https://diario.netlify.app";
$site = 'Pequenata';
$historiasmall = 'PQNT';
$site2 = 'Littletato';
$folder1 = 'Tabs';
$folder2 = 'Variables';
$global = 'Global';
$generic = 'Generic';

#URL parameters
$params = array(
'site', 
'type', 
'lang', 
'twonly',
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
'txtmaker',
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
$sitetxtmaker = $sitearray[23],
);

$yeararray = array(
$site2018,
$site2019,
$site2020,
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

#Pequenata Website setter
if (strpos ($host, $params[0].'='.$sitepqnt) == true) {
	#Site title and name definer
	$sitename = $sitepqnt;

	#Site settings
	$sitehascommentstab = true; #If site has a Comments Tab variable
	$sitehasnotifications = true; #If site has notifications on

	#Site Tabs array
	$tabs = array('Read', 'Readers', 'Comment', 'Write', 'Stories', 'Changelog');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Read story', 'Readers', 'Comment', 'Write', 'Stories', 'Changelog', 'Chapters', 'Comments');
		$site = ucwords('littletato');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Ler história', 'Leitores', 'Comentar', 'Escrever', 'Histórias', 'Registro de Mudanças', 'Capítulos', 'Comentários');
		$site = ucwords($sitepqnt);
	}

	#Number of tabs
	$tabnumb = 5;

	#Array of the GenericTabs files
	$i = 0;
	while ($i <= $tabnumb) {
		$i2 = $i + 1;
		$cities[$i] = $sitetabsgeralfolder.'City'.$i2.'.php';
		$i++;
	}
}

if (strpos ($host, 'title') == true) {
	$sitecap = 'title';
}

else {
	$sitecap = '';
}

if (strpos ($host, 'natal') == true) {
	$natal = true;
}

else {
	$natal = false;
}

$lang2 = strtoupper($lang);
$lang2 = substr_replace($lang2,'-', 2, 0);

include "C:/Mega/Diario/PHP/".$site."/".$folder2."/V".$historiasmall.".php";
include "C:/Mega/Diario/PHP/".$global."/".$folder2."/FilesGeral.php";

 ?>
<!DOCTYPE html>
<?php echo $siteheader."\n"; ?>

<?php

include $tabsphp;
echo $archivebtn;
echo "\n";
echo $sitebtn;
include $sitesbtnphp;
echo "</center>"."\n";

?>
</body>
</html>