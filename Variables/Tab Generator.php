<?php 

#Array of button names
$i = 0;
while ($i <= $tabnumb) {
	$txtsize = 'h2';

	if (isset($citiestxts[$i])) {
		$citytxts[$i] = '<'.$txtsize.'>'.$citiestxts[$i].'</'.$txtsize.'>';
	}

	$i++;
}

#Array of tab texts
$i = 0;
while ($i <= $tabnumb) {
	$tabtxts[$i] = $citytxts[$i];

	$i++;
}

if ($sitename == $sitethingsido or $site == $sitethingsido) {
	$i = 0;
	while ($i <= $tabnumb) {
		if ($i < 1) {
			$txtsize = 'h6';	
		}

		if ($i > 1) {
			$txtsize = 'h4';	
		}

		$citytxts[$i] = '<'.$txtsize.'>'.$citiestxts[$i].'</'.$txtsize.'>';
		$i++;
	}
}

else {
	#Array of mobile button names
	$i = 0;
	while ($i <= $tabnumb) {
		$txtsize = 'h4';
		$citytxts[$i] = '<'.$txtsize.'>'.$citiestxts[$i].'</'.$txtsize.'>';
	
		$i++;
	}
}

#Array of mobile tab texts
$i = 0;
while ($i <= $tabnumb) {
	$tabtxtsm[$i] = $citytxts[$i];

	$i++;
}

if ($sitename == $sitewatch) {
	#Citycodes array generator
	$i = 0;
	while ($i <= $tabnumb) {
		if ($i < 3) {
			$citycodes[$i] = $site.'-'.strtolower($tabnames[$i]);
		}
	
		if ($i >= 3) {
			$citycodes[$i] = 'watched'.'-'.strtolower($tabnames[$i]);
		}
		
		if ($i == 7) {
			$citycodes[$i] = strtolower($tabnames[7]);
		}
	
		$i++;
	}
}

else {
	#Array of button codes
	$i = 0;
	while ($i <= $tabnumb) {
		$citycodes[$i] = $site.'-'.strtolower($tabnames[$i]);

		$i++;
	}
}

#Array of city codes
$i = 0;
while ($i <= $tabnumb) {
	$tabcodes[$i] = $citycodes[$i];

	$i++;
}

#Array of mobile city codes
$i = 0;
while ($i <= $tabnumb) {
	$tabcodesm[$i] = $citycodes[$i].'m';

	$i++;
}

if ($hidecitysetting == true) {
	$hidecitytextvariable = 'style="display:none;"';
}

if ($hidecitysetting != true) {
	$hidecitytextvariable = '';
}

if ($siteusescitybodygenerator == false) {
	#Array of the city body files
	$i = 0;
	$i2 = $i + 1;

	#$citybodyfiles_array[$i] = $sitephpfolder2.'CityBody'.$i2.'.php';

	if (file_exists($sitephpfolder2.'CityBody'.$i2.'.php')) {
		while ($i <= $tabnumb) {
			$i2 = $i + 1;

			$citybodyfiles[$i] = $sitephpfolder2.'CityBody'.$i2.'.php';

			$i++;
		}
	}

	else {
		if ($lang == $langs[0] or $lang == $langs[1]) {
			$placeholdercitybody = 'Placeholder for the Body of the Tab: [Icon]';
		}

		if ($lang == $langs[2]) {
			$placeholdercitybody = 'Espaço reservado para o Corpo da Aba: [Ícone]';
		}

		$citybodyfiles[$i] = $placeholdercitybody;
	}
}

if ($sitename == $sitewatch or $site == $sitewatch) {
	#Include the buttons loader PHP file
	include $topbuttonsloader;

	#Every Watched Button Yellow
	$everywatchedbtny1 = $btnsy[0].$btns[3].$btns[4];
	$everywatchedbtny2 = $btns[0].$btnsy[3].$btns[4];
	$everywatchedbtny3 = $btns[0].$btns[3].$btnsy[4];

	#Mobile Every Watched Button Yellow
	$everywatchedbtny1m = $btnsym[0].$btnsm[3].$btnsm[4];
	$everywatchedbtny2m = $btnsm[0].$btnsym[3].$btnsm[4];
	$everywatchedbtny3m = $btnsm[0].$btnsm[3].$btnsym[4];

	#Every Archived Button Yellow
	$everyarchbtn = $divleftanim.$btns[5].$divc.$divrightanim.$btns[6].$divc;
	$everyarchbtny1 = $divrightanim.$btnsy[5].$divc.$divleftanim.$btns[6].$divc;
	$everyarchbtny2 = $divleftanim.$btns[5].$divc.$divrightanim.$btnsy[6].$divc;

	#Mobile Every Archived Button Yellow
	$everyarchbtnm = $divleftanim.$btnsm[5].$divc.$divrightanim.$btnsm[6].$divc;
	$everyarchbtny1m = $divrightanim.$btnsym[5].$divc.$divleftanim.$btnsm[6].$divc;
	$everyarchbtny2m = $divleftanim.$btnsm[5].$divc.$divrightanim.$btnsym[6].$divc;
}

if ($sitename == $sitethingsido or $site == $sitethingsido or $sitename == $sitetextmaker) {
	#Include the buttons loader PHP file
	include $topbuttonsloader;
}

#City body files includer
$i = 0;
while ($i <= $tabnumb) {
	if (isset($citybodyfiles[$i])) {
		if (file_exists($citybodyfiles[$i])) {
			include $citybodyfiles[$i];
		}
	}

	$i++;
}

if ($sitename == $sitethingsido or $site == $sitethingsido) {
	#Include the buttons loader PHP file
	include $topbuttonsloader;
}

#Comments Tab includer if the setting is true
if ($sitehascommentstab == true or $storyhaswriteform == true) {
	include $formfile;
}

#Stories Tab includer if the setting is true
if ($sitehasstories == true) {
	include $story_links_php_variable;
}

if ($siteusescitybodygenerator == true) {
	require $city_bodies_generator_php_variable;
}

#City content array generator
$zzz = 0;
$zxx = 1;
$tabnumb3 = $tabnumb + 1;
while ($zzz <= $tabnumb3) {
	if (file_exists($sitephpfolder2.'CityContent'.$zxx.'.php')) {
		ob_start();
		include $sitephpfolder2.'CityContent'.$zxx.'.php';
		$citycontents[$zzz] = ob_get_clean();
		ob_clean();
	}

	else {
		if ($lang == $langs[0] or $lang == $langs[1]) {
			$placeholdercitycontent = $divzoomanim.'Placeholder for the Content of the Tab.'.$divc;
		}

		if ($lang == $langs[2]) {
			$placeholdercitycontent = $divzoomanim.'Espaço reservado para o Conteúdo da Aba.'.$divc;
		}

		$citycontents[$zzz] = $placeholdercitycontent;
	}

	$zxx++;
	$zzz++;
}

#Citiescontent array generator
$i = 0;
while ($i <= $tabnumb) {
	$i2 = $i + 1;

	if (isset($citybodies[$i])) {
		if (isset($citytitles)) {
			$citiescontent[$i] = $citytitles[$i].$citybodies[$i].$citycontents[$i];
		}

		if (!isset($citytitles)) {
			$citiescontent[$i] = $citybodies[$i].$citycontents[$i];
		}
	}

	else {
		#print_r($citytitles);
		if (isset($citytitles)) {
			$citiescontent[$i] = $citytitles[$i].$citycontents[$i];
		}

		if (!isset($citytitles)) {
			$citiescontent[$i] = $citycontents[$i];
		}
	}

	$i++;
}

if ($sitename != $sitethingsido or $site != $sitethingsido and $sitename != $sitewatch or $site != $sitewatch) {
	#Include the buttons loader PHP file
	include $topbuttonsloader;
}

?>