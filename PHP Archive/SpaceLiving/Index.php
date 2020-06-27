<?php

$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$sitephpfolder = "C:/Mega/Diario/PHP/";
$url = "https://diario.netlify.com";
$folder1 = 'Tabs';
$folder2 = 'Variables';
$folder3 = 'Years';
$global = 'Global';
$sitearray = array('Pequenata', 'sl', '2018', '2019', '2020');
$yeararray = array($sitearray[2], $sitearray[3], $sitearray[4]);
$yearnumb = 2;
$yearlinks = array($url.'/'.$folder3.'/'.$yeararray[0].'/', $url.'/'.$folder3.'/'.$yeararray[1].'/', $url.'/'.$folder3.'/'.$yeararray[2].'/');

if (strpos ($host, 'geral') == true) {
    $lang = 'geral';
}

if (strpos ($host, 'enus') == true) {
    $lang = 'enus';
}

if (strpos ($host, 'ptbr') == true) {
    $lang = 'ptbr';
}

if (strpos ($host, 'story') == true) {
	$sitetype1 = 'story';
}

if (strpos ($host, 'site') == true) {
	$sitetype1 = 'site';
}

if (strpos ($host, $yeararray[0]) or strpos ($host,  $yeararray[1]) or strpos ($host,  $yeararray[2]) == true) {
	$sitetype2 = 'Years';
}

if (strpos ($host, 'title') == true) {
	$sitecap = true;
}

if (strpos ($host, 'title') == false) {
	$sitecap = false;
}

if (strpos ($host, 'sl') == true) {
	$tabs = array('Comment', 'Write', 'Stories', 'CapBtn', 'Readers', 'CapText');
	$sitetype2 = 'sl';

	$site = 'SpaceLiving';

	if ($lang == 'enus' or $lang == 'geral') {
		$tabnames = array('Comment', 'Write', 'Stories', 'CapBtn', 'Readers', 'CapText');
	}

	if ($lang == 'ptbr') {
		$tabnames = array('Comment', 'Write', 'Stories', 'CapBtn', 'Readers', 'CapText');
	}

	$tabnumb = 6;

	$cities = array($sitephpfolder.$global."/".$folder1."/City1.php", $sitephpfolder.$global."/".$folder1."/City2.php", $sitephpfolder.$global."/".$folder1."/City3.php");
}

if (strpos ($host, $yeararray[0]) == true) {
	$site = $yeararray[0];
    $ano = $site;
	$tabs = array($ano, 'Tasks', 'Years');

	if ($lang == 'enus' or $lang == 'geral') {
		$tabnames = array($ano, 'Tasks', 'Years');
	}

	if ($lang == 'ptbr') {
		$tabnames = array($ano, 'Tarefas', 'Anos');
	}

	$tabnumb = 2;

	$cities = array($sitephpfolder.$global."/".$folder1."/City1.php", $sitephpfolder.$global."/".$folder1."/City2.php", $sitephpfolder.$global."/".$folder1."/City3.php");
}

if (strpos ($host, $yeararray[1]) == true) {
	$site = $yeararray[1];
    $ano = $site;
	$tabs = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');

	if ($lang == 'enus' or $lang == 'geral') {
		$tabnames = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');
	}

	if ($lang == 'ptbr') {
		$tabnames = array($ano, 'Mídia', 'Amigos', 'Prints', 'Tarefas', 'Anos');
	}

	$tabnumb = 5;

	$cities = array($sitephpfolder.$global."/".$folder1."/City1.php", $sitephpfolder.$global."/".$folder1."/City2.php", $sitephpfolder.$global."/".$folder1."/City3.php", $sitephpfolder.$global."/".$folder1."/City4.php", $sitephpfolder.$global."/".$folder1."/City5.php", $sitephpfolder.$global."/".$folder1."/City6.php");
}

if (strpos ($host, $yeararray[2]) == true) {
	$site = $yeararray[2];
    $ano = $site;
	$tabs = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');

	if ($lang == 'enus' or $lang == 'geral') {
		$tabnames = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');
	}

	if ($lang == 'ptbr') {
		$tabnames = array($ano, 'Mídia', 'Amigos', 'Prints', 'Tarefas', 'Anos');
	}

	$tabnumb = 5;

	$cities = array($sitephpfolder.$global."/".$folder1."/City1.php", $sitephpfolder.$global."/".$folder1."/City2.php", $sitephpfolder.$global."/".$folder1."/City3.php", $sitephpfolder.$global."/".$folder1."/City4.php", $sitephpfolder.$global."/".$folder1."/City5.php", $sitephpfolder.$global."/".$folder1."/City6.php");
}

$lang2 = strtoupper($lang);
$lang2 = substr_replace($lang2, '-', 2, 0);

include "C:/Mega/Diario/PHP/".$global."/".$folder2."/V".$sitetype2.".php";

 ?>
<!DOCTYPE html>
<?php

echo $siteheader;

include "C:/Mega/Diario/PHP/".$global."/".$folder2."/Tabs.php";

?>
</body>
</html>