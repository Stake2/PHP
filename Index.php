<?php

#Get the localhost link
$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

#Site variables
$url = 'https://diario.netlify.app/';
$mega_folder = 'C:/Mega/';
$mega_folder_diario = $mega_folder.'Diario/';
$sitephpfolder = $mega_folder.'PHP/';

$folder1 = 'Tabs';
$folder2 = 'Variables';
$folder3 = 'Years';
$global = 'Global';
$generic = 'Generic';

$sitephpfoldertabs = $sitephpfolder.$folder1.'/';
$sitephpfoldervars = $sitephpfolder.$folder2.'/';
$sitetabsgeralfolder = $sitephpfolder.$folder1.'/'.$generic.$folder1.'/';
$siteglobaltabsfolder = $sitephpfolder.$folder1.'/'.$global.$folder1.'/';

$php_tabs = $sitephpfoldertabs;
$php_variables = $sitephpfoldervars;
$php_global_tabs = $siteglobaltabsfolder;

$php_tabs_variable = $php_tabs;

$vglobal_php = $php_variables.'VGlobal.php';

$websiteselectorfile = $php_variables.'Website Selector.php';
$genericcitiesgeneratorfile = $php_variables.'GenericCities Generator.php';
$settingsparamsfile = $php_variables.'Settings Params.php';

#Queries for parameters
$params = array(
'site',
'type',
'lang',
);

#Queries for parameters of settings
$settingsparams = array(
'notif',
'commenttab',
'showcomments',
'hasstories',
'hascl',
'writestory',
'writeformtxt',
'showchaptertext', #7
'translatestory',
'chaptertowrite',
'storyhascovers',
'deactivatetopbtns',
'deactivatetabs',
'deactivatenotification',
'newdesign',
'twonly',
'newwatchedstyle',
'newwritestyle',
'writingpack',
'deactivateall',
'deactivateheader',
);

#Queries for site types
$types = array(
'site',
'story',
);

#Queries for site languages
$langs = array(
'geral',
'enus',
'ptbr',
'ptpt',
);

$geral_lang = $langs[0];
$enus_lang = $langs[1];
$ptbr_lang = $langs[2];
$ptpt_lang = $langs[3];

#Array of Portuguese languages
$pt_langs = array(
'ptbr',
'ptpt',
);

#Array of English languages
$en_langs = array(
'geral',
'enus',
);

#CSS file variables
$cssfiles = array(
$pocbcss = 'Pocb',
$pqntcss = 'Pequenata',
$slcss = 'SpaceLiving',
$watchcss = 'Watch',
);

#Array of website names
$sitearray = array(
'printsOfComputerBlocks',
'diario',
'myLittlePony',
'watch',
'music',
'games',
'foobarAlbums',
'terrariaTalk',
'tasks',
'thingsido',
'years',
'2018',
'2019',
'2020',
'stories',
'izaqueMultiverse',
'nw',
'pequenata',
'spaceliving',
'nazzevo',
'lonelyStories',
'yourstruly_izaque',
'mentalFrameworks',
'websiteTemplate',
'stake2',
'textMaker',
'xenaeizaque',
);

#Array of website titles
$sitetitlesarray = array(
'Prints of Computer Blocks',
'Diário',
'My Little Pony',
'Watch History',
'Music',
'Games',
'Foobar Albums',
'Terraria Talk',
'Tasks',
'Things I Do',
'Years',
'2018',
'2019',
'2020',
'Stories',
'New World',
'Pequenata',
'SpaceLiving',
'Nazzevo',
'Lonely Stories',
'Yours truly, Izaque.',
'Mental Frameworks',
'Website Template',
'Stake2',
'Text Maker',
'Xena E Izaque',
);

#Websites array
$i = 0;
foreach ($sitearray as $value) {
	$value = strtolower($value);

    ${"site$value"} = $value;

	$sitenamesarray[$i] = ${"site$value"};

	$i++;
}

#Website titles array
$i = 0;
foreach ($sitetitlesarray as $value) {
	$varresource = strtolower($sitenamesarray[$i]);

    ${"sitename_$varresource"} = $value;

	$sitetitlesarray[$i] = ${"sitename_$varresource"};

	$i++;
}

#Array of the paths of the website folders in the local drive
$i = 0;
foreach ($sitenamesarray as $value) {
    ${"sitefolder_$value"} = $php_tabs.ucwords($sitearray[$i]).'/';

	$sitefolders[$i] = ${"sitefolder_$value"};

	$i++;
}

$i = 0;
foreach ($sitefolders as $folder) {
	if (!file_exists($folder)) {
		mkdir($folder);
	}

	$i++;
}

#V[Site].php Files array
$i = 0;
foreach ($sitearray as $value) {
	$varsfile = $php_tabs.ucwords($value).'/'.'V'.ucwords($value).'.php';
	if (file_exists($varsfile)) {
		$sitefilevars[$i] = $varsfile;
	}

	else {
		fopen($varsfile, 'w', 'UTF-8');
	}

	$i++;
}

#Website.php Files array
$i = 0;
foreach ($sitearray as $value) {
	$websitefile = $php_tabs.ucwords($value).'/'.'Website.php';

	if (file_exists($websitefile)) {
		$sitewebsitefiles[$i] = $websitefile;
	}

	else {
		fopen($websitefile, 'w', 'UTF-8');
	}

	$i++;
}

#Year websites array
$yeararray = array(
$site2018,
$site2019,
$site2020,
);

#Links for the year websites
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

if (strpos ($host, $params[2].'='.$langs[3]) == true) {
    $lang = $langs[3];
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

#Default value for website settings
$roundedbuttonson = true;
$sitehasnotifications = false;
$sitesbuttonintab = false;
$sitehasstories = false;
$siteshowscomments = false;
$sitehascomments = false;
$sitehascommentstab = false;
$sitehaschangelog = false;
$sitestorywrite = false;
$chaptertowrite = false;
$writingpack = false;
$showwriteformtext = false;
$showchaptertext = false;
$thingsidofake = false;
$watchmedias2018 = false;
$watchmedias2019 = false;
$siteuseschapteropener = false;
$deactivatetopbtns = false;
$deactivatetabs = false;
$deactivatenotification = false;
$deactivateheader = false;
$deactivatesitesbtn = false;
$newdesign = false;
$newwritestyle = false;
$translatestory = false;
$hidecitysetting = true;
$notsomuchspace = false;
$storyhascovers = false;
$storywritesstoryfiles = false;
$storyhaswriteform = false;
$storyhasreads = false;
$storyhastitles = false;
$storyusestatus = false;
$storyhaschaptercomments = false;
$siteusescitybodygenerator = false;
$siteusesuniversalfilereader = false;
$sitehidescommentstab = false;
$site_uses_new_comment_and_read_displayer = false;

#Website selector file includer
require $websiteselectorfile;

#Lang modifier
$lang2 = strtoupper($lang);
$lang2 = substr_replace($lang2, '-', 2, 0);

/*
$i = 0;
foreach ($sitearray as $value) {
	$value = strtolower($value);

	if (!strpos ($host, $params[0].'='.${"site$value"}) == true) {
		$siteisnotdefined = true;
		$notdefinedsite = '';
	}

	if (strpos ($host, $params[0].'='.${"site$value"}) == true) {
		$siteisnotdefined = false;
		$notdefinedsite = "site$value";
	}

	$i++;
}

$i = 1;

if ($siteisnotdefined == true) {
	echo '<h2>Error '.$i.": Your didn't defined a website to program.</h2>";
}

if ($siteisnotdefined == false) {
	echo '<h2>Website '.$notdefinedsite.' not found.</h2>';
}*/

$i = 1;

$i++;

if (!isset($site)) {
	echo '<h2>Error '.$i.': Site variable is not defined.</h2>';
}

$i++;

if (!isset($sitename)) {
	echo '<h2>Error '.$i.': Sitename variable is not defined.</h2>';
}

if (!isset($sitename) and !isset($site)) {
	die('<h2>$website, $site, and $sitename variables are not defined.</h2>');
}

#VGlobal.php variables file includer
require $vglobal_php;

?>
<!DOCTYPE html>
<?php 

#Siteheader displayer
echo $siteheader;

if ($sitehasnotifications == true and $deactivatenotification != true) {
	echo '<script>
ChangeTitle();
</script>';
}

#Inserts a CSS style tag for a style used in all the websites
echo '<style>
textarea {outline: none!important;}
</style>'."\n"."\n";

#Site notification file includer if setting is true
if ($sitehasnotifications == true and $deactivatenotification == false) {
	echo $notificationscript."\n"."\n";
}

if ($deactivatetabs == false) {
	#Tabs loader
	include $php_variables.'Tab Loader.php';
}

echo $animationstylecss."\n"."\n";

if ($sitename == $sitethingsido) {
	echo '
<style>
a:link {color: blue!important;}
a:visited {color: blue!important;}
a:hover {color: blue!important;}
a:active {color: blue!important;} 
</style>';
}

#Site test script includer if setting is true
if ($siteuseschapteropener == true) {
	echo "\n";
	echo '<script>'."\n";
	include $php_variables.'OpenChapterScript.php';
	echo '</script>'."\n";
	echo "\n";
}

if ($newdesign == true) {
	#SuperAnimes test loader
	include $newdesignsitephp;
	echo $newdesignscript;
}

/*
$servername = "localhost";
$username = "root";
$dbname = "Sitenames";
$tablename = "WebsiteNames";
$columnname = "diario";

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO ".$tablename." (".$columnname.")
VALUES ('SITEDIARIO')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
}

else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
*/


#Test for the new arrays for the Comment generation
/*
echo '<'.$n.' class="w3-text-white">'."\n";

#echo $cmntschapter[0];
print_r($reads);

echo '</'.$n.'>'."\n";

$i = 1;
while ($i <= count($comments) - 1) {
	if (is_array($comments[$i]) == true and $comments[$i] != null) {
		echo '<'.$n.' class="w3-text-white">'."\n";
		echo '<b>Comments on chapter '.$i.': </b><br />'."\n";
		echo '</'.$n.'>'."\n";

		$c = 0;
		while ($c <= count($comments[$i]) - 1) {
			#echo $comments[$i][$c].'<br />'."\n";

			$c++;
		}

		echo '<br />'."\n";
	}

	else if ($comments[$i] != null) {
		echo '<'.$n.' class="w3-text-white">'."\n";
		echo '<b>Comment on chapter '.$i.': </b><br />'."\n";
		echo '</'.$n.'>'."\n";

		#echo $comments[$i].'<br />'."\n";
		echo '<br />'."\n";
	}

	$i++;
}

$i = 7;
$number_variable = $capnum1;
require $new_chapter_comment_and_read_displayer_php_variable;
*/

?>
</center>
</body>
</html>