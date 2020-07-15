<?php 

$siteicons = array(
'📘',
'🦄',
'👁',
'📅',
'⊡',
'🎵',
'🎮',
'🗒',
);

$sitecodes = array(
'my_little_pony'.' '.$siteicons[1],
'watch'.' '.$siteicons[2],
'music'.' '.$siteicons[5],
'games'.' '.$siteicons[6],
'foobar_albums'.' '.$siteicons[5],
'terraria_talk'.' '.$siteicons[6],
'tasks'.' '.$siteicons[7],
'things_I_do',
'years'.' '.$siteicons[3],
'2018',
'2019',
'2020',
'stories_historias'.' '.$siteicons[0],
'new_world'.' '.$siteicons[4],
'pequenata'.' '.$siteicons[0],
'new_world'.' '.$siteicons[4].'/'.'spaceliving'.' '.$siteicons[0],
'nazzevo'.' '.$siteicons[0],
'lonely stories',
'mental_frameworks',
'template',
'stake2',
);

if (in_array($lang, $en_langs)) {
	$thingsIdolink = $url.$sitecodes[7].'/';
}

if (in_array($lang, $pt_langs)) {
	$thingsIdolink = $url.'coisas_que_eu_faço'.'/';
}

$sitelinks = array(
'https://printsofcomputer.netlify.app', #POCB Link
$url.$siteicons[0].'/',
$url.$sitecodes[0].'/',
$url.$sitecodes[1].'/',
$url.$sitecodes[2].'/',
$url.$sitecodes[3].'/',
$url.$sitecodes[4].'/',
$url.$sitecodes[5].'/',
$url.$sitecodes[6].'/',
$thingsIdolink, #Things I Do
$url.$sitecodes[8].'/',
$url.$sitecodes[9].'/',
$url.$sitecodes[10].'/',
$url.$sitecodes[11].'/',
$url.$sitecodes[12].'/',
$url.$sitecodes[13].'/',
$sitepqntlink = $url.$sitecodes[14].'/',
$sitesllink = $url.$sitecodes[15].'/',
$sitenazzevolink = $url.$sitecodes[16].'/',
$sitelslink = $url.$sitecodes[17].'/',
$url.$sitecodes[18].'/',
$url.$sitecodes[19].'/',
$url.$sitecodes[20].'/',
);

$storynames2 = array(
$sitename_pequenata = $pqntstoryname.' '.$siteicons[0],
$sitename_spaceliving = $slstoryname.' '.$siteicons[0],
$sitename_nazzevo = $nazzevostoryname.' '.$siteicons[0],
$sitename_lonelystories = $lonelystoryname.' '.$siteicons[0],
);

if (in_array($lang, $en_langs)) {
	$replacesitenamesarray = array(
	$sitename_diario = 'Diary'.' '.$siteicons[0],
	$sitename_music = 'Music'.' '.$siteicons[5],
	$sitename_games = 'Games'.' '.$siteicons[6],
	$sitename_foobaralbums = 'Foobar_Albums'.' '.$siteicons[5],
	$sitename_tasks = 'Tasks'.' '.$siteicons[7],
	$sitename_thingsido = 'Things I Do'.' '.$siteicons[7],
	$sitename_years = 'Years'.' '.$siteicons[3],
	$sitename_stories = 'Stories'.' '.$siteicons[0],
	$sitename_mentalframeworks = 'Mental_Frameworks',
	$sitename_websitetemplate = 'Website Template',
	);
}

if (in_array($lang, $pt_langs)) {
	$replacesitenamesarray = array(
	$sitename_diario = 'Diário'.' '.$siteicons[0],
	$sitename_music = 'Música'.' '.$siteicons[5],
	$sitename_games = 'Jogos'.' '.$siteicons[6],
	$sitename_foobaralbums = 'Albuns do Foobar (Foobar_Albums)'.' '.$siteicons[5],
	$sitename_tasks = 'Tarefas'.' '.$siteicons[7],
	$sitename_thingsido = 'Coisas Que Eu Faço'.' '.$siteicons[7],
	$sitename_years = 'Anos'.' '.$siteicons[3],
	$sitename_stories = 'Histórias'.' '.$siteicons[0],
	$sitename_mentalframeworks = 'Frameworks Mentais',
	$sitename_websitetemplate = 'Modelo de Site',
	);
}

$sitenames = array(
'Prints Of Computer Blocks', 
$sitename_diario, 
'My Little Pony'.' '.$siteicons[1],
'Watch History'.' '.$siteicons[2],
$sitename_music,
$sitename_games,
$sitename_foobaralbums,
'Terraria_Talk'.' '.$siteicons[6],
$sitename_tasks,
$sitename_thingsido,
$sitename_years,
'2018 '.$siteicons[3],
'2019 '.$siteicons[3],
'2020 '.$siteicons[3],
$sitename_stories,
'New World'.' '.$siteicons[4],
$sitename_pequenata,
$sitename_spaceliving,
$sitename_nazzevo,
$sitename_lonelystories,
$sitename_mentalframeworks,
$sitename_websitetemplate,
'Stake2',
);

/*
if (in_array($lang, $en_langs)) {
	$replacesitenamesarray = array(
	$sitename_diario = 'Diary'.' '.$siteicons[0],
	$sitename_music = 'Music'.' '.$siteicons[5],
	$sitename_games = 'Games'.' '.$siteicons[6],
	$sitename_foobaralbums = 'Foobar_Albums'.' '.$siteicons[5],
	$sitename_tasks = 'Tasks'.' '.$siteicons[7],
	$sitename_thingsido = 'Things I Do'.' '.$siteicons[7],
	$sitename_years = 'Years'.' '.$siteicons[3],
	$sitename_stories = 'Stories'.' '.$siteicons[0],
	$sitename_mentalframeworks = 'Mental_Frameworks',
	$sitename_websitetemplate = 'Website Template',
	);
}

if (in_array($lang, $pt_langs)) {
	$replacesitenamesarray = array(
	$sitename_diario = 'Diário'.' '.$siteicons[0],
	$sitename_music = 'Música'.' '.$siteicons[5],
	$sitename_games = 'Jogos'.' '.$siteicons[6],
	$sitename_foobaralbums = 'Albuns do Foobar (Foobar_Albums)'.' '.$siteicons[5],
	$sitename_tasks = 'Tarefas'.' '.$siteicons[7],
	$sitename_thingsido = 'Coisas Que Eu Faço'.' '.$siteicons[7],
	$sitename_years = 'Anos'.' '.$siteicons[3],
	$sitename_stories = 'Histórias'.' '.$siteicons[0],
	$sitename_mentalframeworks = 'Frameworks Mentais',
	$sitename_websitetemplate = 'Modelo de Site',
	);
}


$i = 0;
foreach ($sitetitlesarray as $value) {
	$sitenames[$i] = $value;

	$i++;
}

$i = 0;
foreach ($sitenamesarray as $value) {
	$sitelinks[$i] = $url.strtolower($value).'/';

	$i++;
}
*/

/*
$i = 0;
foreach ($sitenames as $value) {
	$varresource = strtolower($sitenamesarray[$i]);

	echo 'Before: '.$sitenames[$i].'<br />';
	echo 'Real var: '.${"sitename_$varresource"}.'<br />';

	if (in_array(${"sitename_$varresource"}, $sitenames)) {
		$sitenames[$i] = $replacesitenamesarray[$i];
	}

	echo 'After: '.$sitenames[$i].'<br />'.'<br />';

	$i++;
}
*/

$yearnames = array(
'2018',
'2019',
'2020',
);

$storylinks = array(
$sitepqntlink,
$sitesllink,
$sitenazzevolink,
$sitelslink,
);

#$sitesnumb = count($sitenamesarray) - 1; #22

$sitesnumb = 22;
$storiessitesnumb = $storiesnumb - 1;
$sitesnumbtext = count($sitelinks);

#Normal Sites Buttons generator
$i = 0;
$sitenumb = $sitesnumb;
while ($i <= $sitenumb) {
	$sitesbtns[$i] = '<button class="w3-btn '.$sitewhilestyle.' w3-text-black '.$cssbtn1.' '.$computervar.'" title="'.$sitenames[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$i]."');".'"'."><".$n.">".$sitenames[$i]."</".$n."></button>";

	$i++;
}

$i = 0;
$sitenumb = $sitesnumb;
while ($i <= $sitenumb) {
	$sitesbtnsm[$i] = '<button class="w3-btn '.$sitewhilestyle.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" title="'.$sitenames[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$i]."');".'"'."><".$m.">".$sitenames[$i]."</".$m."></button>";

	$i++;
}


#Blue Sites Buttons generator
$i = 0;
$sitenumb = $sitesnumb;
while ($i <= $sitenumb) {
	$sitesbtnsblue[$i] = '<button class="w3-btn w3-blue w3-text-black '.$cssbtn1.' '.$computervar.'" title="'.$sitenames[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$i]."');".'"'."><".$n.">".$sitenames[$i]."</".$n."></button>";

	$i++;
}

$i = 0;
$sitenumb = $sitesnumb;
while ($i <= $sitenumb) {
	$sitesbtnsbluem[$i] = '<button class="w3-btn w3-blue w3-text-black '.$cssbtn1.' '.$mobilevar.'" title="'.$sitenames[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$i]."');".'"'."><".$m.">".$sitenames[$i]."</".$m."></button>";

	$i++;
}


#Stories Sites Buttons generator
$i = 0;
$storiessitenumb = $storiessitesnumb;
while ($i <= $storiessitenumb) {
	$storiessitesbtns[$i] = '<button class="w3-btn '.$sitewhilestyle.' w3-text-black '.$cssbtn1.' '.$computervar.'" title="'.$storynames2[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$storylinks[$i]."');".'"'."><".$n.">".$storynames2[$i]."</".$n."></button>";

	$i++;
}

$i = 0;
$storiessitenumb = $storiessitesnumb;
while ($i <= $storiessitenumb) {
	$storiessitesbtnsm[$i] = '<button class="w3-btn '.$sitewhilestyle.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" title="'.$storynames2[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$storylinks[$i]."');".'"'."><".$m.">".$storynames2[$i]."</".$m."></button>";

	$i++;
}


#Year Sites Buttons generator
$i = 0;
$z = 11;
while ($i <= $yearnumb) {
	$sitesbtnsyear[$i] = '<button class="w3-btn '.$sitewhilestyle.' w3-text-black '.$cssbtn1.' '.$computervar.'" title="'.$yearnames[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$z]."');".'"'."><".$n.">".$yearnames[$i].": ".$icons[3]."</".$n."></button>";

	$z++;
	$i++;
}

$i = 0;
$z = 11;
while ($i <= $yearnumb) {
	$sitesbtnsyearm[$i] = '<button class="w3-btn '.$sitewhilestyle.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" title="'.$yearnames[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$z]."');".'"'."><".$m.">".$yearnames[$i].": ".$icons[3]."</".$m."></button>";

	$z++;
	$i++;
}

?>