<?php 

if (strpos($host, $settingsparams[0].'='.'true') == true) {
	$sitehasnotifications = true;
}

if (strpos($host, $settingsparams[0].'='.'false') == true) {
	$sitehasnotifications = false;
}

else {
	$sitehasnotifications = $sitehasnotifications;
}


if (strpos($host, $settingsparams[1].'='.'true') == true) {
	$sitehascommentstab = true;
}

if (strpos($host, $settingsparams[1].'='.'false') == true) {
	$sitehascommentstab = false;
}

else {
	$sitehascommentstab = $sitehascommentstab;
}


if (strpos($host, $settingsparams[2].'='.'true') == true) {
	$siteshowscomments = true;
}

if (strpos($host, $settingsparams[2].'='.'false') == true) {
	$siteshowscomments = false;
}

else {
	$siteshowscomments = $siteshowscomments;
}


if (strpos($host, $settingsparams[3].'='.'true') == true) {
	$sitehasstories = true;
}

if (strpos($host, $settingsparams[3].'='.'false') == true) {
	$sitehasstories = false;
}

else {
	$sitehasstories = $sitehasstories;
}


if (strpos($host, $settingsparams[4].'='.'true') == true) {
	$sitehaschangelog = true;
}

if (strpos($host, $settingsparams[4].'='.'false') == true) {
	$sitehaschangelog = false;
}

else {
	$sitehaschangelog = $sitehaschangelog;
}


if (strpos($host, $settingsparams[5].'='.'true') == true) {
	$sitestorywrite = true;
}

if (strpos($host, $settingsparams[5].'='.'false') == true) {
	$sitestorywrite = false;
}

else {
	$sitestorywrite = $sitestorywrite;
}


if (strpos($host, $settingsparams[6].'='.'true') == true) {
	$showwriteformtext = true;
}

if (strpos($host, $settingsparams[6].'='.'false') == true) {
	$showwriteformtext = false;
}

else {
	$showwriteformtext = $showwriteformtext;
}


if (strpos($host, $settingsparams[7].'='.'true') == true) {
	$showchaptertext = true;
}

if (strpos($host, $settingsparams[7].'='.'false') == true) {
	$showchaptertext = false;
}

else {
	$showchaptertext = $showchaptertext;
}


$i = 1;
$c = 1;
while ($c < 30) {
	if (strpos($host, $settingsparams[9].'='.'['.(string)$i.']') == true) {
		$chaptertowrite = (string)$i;
	}

	else {
		$i++;
	}

	$c++;
}


if (strpos($host, $settingsparams[17].'='.'true') == true) {
	$newwritestyle = true;
}

if (strpos($host, $settingsparams[17].'='.'false') == true) {
	$newwritestyle = false;
}

else {
	$newwritestyle = $newwritestyle;
}


if (strpos($host, $settingsparams[18].'='.'true') == true) {
	$showchaptertext = true;
	$newwritestyle = true;
	$writingpack = true;
}

if (strpos($host, $settingsparams[18].'='.'false') == true) {
	$showchaptertext = false;
	$newwritestyle = false;
	$writingpack = false;
}

else {
	$showchaptertext = $showchaptertext;
	$newwritestyle = $newwritestyle;
	$writingpack = $writingpack;
}


if (strpos($host, $settingsparams[10].'='.'true') == true) {
	$storyhascovers = true;
}

if (strpos($host, $settingsparams[10].'='.'false') == true) {
	$storyhascovers = false;
}

else {
	$storyhascovers = $storyhascovers;
}


if (strpos($host, $settingsparams[11].'='.'true') == true) {
	$deactivatetopbtns = true;
}

if (strpos($host, $settingsparams[11].'='.'false') == true) {
	$deactivatetopbtns = false;
}


if (strpos($host, $settingsparams[12].'='.'true') == true) {
	$deactivatetabs = true;
}

if (strpos($host, $settingsparams[12].'='.'false') == true) {
	$deactivatetabs = false;
}


if (strpos($host, $settingsparams[20].'='.'true') == true) {
	$deactivateheader = true;
}

if (strpos($host, $settingsparams[20].'='.'false') == true) {
	$deactivateheader = false;
}

else {
	$deactivateheader = false;
}


if (strpos($host, $settingsparams[13].'='.'true') == true) {
	$deactivatenotification = true;
}

if (strpos($host, $settingsparams[13].'='.'false') == true) {
	$deactivatenotification = false;
}

if (strpos($host, $settingsparams[19].'='.'true') == true) {
	$deactivatetopbtns = true;
	$deactivatetabs = true;
	$deactivatenotification = true;
	$deactivateheader = true;
}

if (strpos($host, $settingsparams[19].'='.'false') == true) {
	$deactivatetopbtns = false;
	$deactivatetabs = false;
	$deactivatenotification = false;
	$deactivateheader = false;
}

if (strpos($host, $settingsparams[14].'='.'true') == true) {
	$newdesign = true;
}

if (strpos($host, $settingsparams[14].'='.'false') == true) {
	$newdesign = false;
}

if (strpos ($host, $settingsparams[15].'='.'true') == true) {
    $twonly = true;
}

if (strpos ($host, $settingsparams[15].'='.'false') == true) {
    $twonly = false;
}

if (strpos ($host, $settingsparams[16].'='.'true') == true) {
    $newwatchedstyle = true;
}

if (strpos ($host, $settingsparams[16].'='.'false') == true) {
    $newwatchedstyle = false;
}

?>