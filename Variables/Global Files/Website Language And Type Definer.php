<?php 

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

?>