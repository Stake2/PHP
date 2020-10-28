<?php 

$citytxt1_ = $langreadtext.': '.$siteicon;
$citytxt2_ = $tabnames[1].': '.$icons[0];
$citytxt3_ = $tabnames[2].': '.$icons[1];
$citytxt4_ = $tabnames[3].': '.$icons[2];
$citytxt5_ = $tabnames[4].': '.$icons[4];
$citytxt6_ = $tabnames[5].': '.$icons[3];

$txts = 'h2';
$citytxt1 = '<'.$txts.'>'.$citytxt1_.'</'.$txts.'>';
$citytxt2 = '<'.$txts.'>'.$citytxt2_.'</'.$txts.'>';
$citytxt3 = '<'.$txts.'>'.$citytxt3_.'</'.$txts.'>';
$citytxt4 = '<'.$txts.'>'.$citytxt4_.'</'.$txts.'>';
$citytxt5 = '<'.$txts.'>'.$citytxt5_.'</'.$txts.'>';
$citytxt6 = '<'.$txts.'>'.$citytxt6_.'</'.$txts.'>';

$tabcode = array(
$ano,
$ano.strtolower($tabnames[1]),
$ano.strtolower($tabnames[2]),
$ano.strtolower($tabnames[3]),
$ano.strtolower($tabnames[4]),
$ano.strtolower($tabnames[5]),
);

$tabtxt = array(
$citytxt1,
$citytxt2,
$citytxt3,
$citytxt4,
$citytxt5,
$citytxt6,
);

$yeartabcode = array(
$yearlinks[0],
$yearlinks[1],
$yearlinks[2],
);

$yeartabtxt = array(
$yeararray[0],
$yeararray[1],
$yeararray[2],
);

$txts = 'h4';
$citytxt1 = '<'.$txts.'>'.$citytxt1_.'</'.$txts.'>';
$citytxt2 = '<'.$txts.'>'.$citytxt2_.'</'.$txts.'>';
$citytxt3 = '<'.$txts.'>'.$citytxt3_.'</'.$txts.'>';
$citytxt4 = '<'.$txts.'>'.$citytxt4_.'</'.$txts.'>';
$citytxt5 = '<'.$txts.'>'.$citytxt5_.'</'.$txts.'>';
$citytxt6 = '<'.$txts.'>'.$citytxt6_.'</'.$txts.'>';

$tabcodem = array(
$tabcode[0].'m',
$tabcode[1].'m', 
$tabcode[2].'m',
$tabcode[3].'m',
$tabcode[4].'m',
$tabcode[5].'m',
);

$tabtxtm = array(
$citytxt1,
$citytxt2,
$citytxt3,
$citytxt4,
$citytxt5,
$citytxt6,
);

$thingsnumb = 524;
$watchednumb = 294;
$moviesnumb = 4; 
$seriesnumb = 9; 
$cartoonsnumb = 60;
$animesnumb = 87;
$videosnumb = 134;
$story_namenumb = 4;
$websites_number = 11;
$friendsnumb = 108;
$cmntsnumb1 = 92;
$cmntsnumb2 = 183;
$tasksnumb = 44;

$original1 = 12;
$original2 = 18;
$original3 = 29;
$original4 = 91;
$original5 = 180;

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

if ($website_language == 'enus' or $website_language == 'geral') {
	$stry5 = 'Littletato';
}

if ($website_language == 'ptbr') {
	$stry5 = 'Pequenata';
}

$strynames = array(
'A Perfect World', 
'SpaceLiving', 
'A História dos irmãos Nazzevo', 
'A Visita de Luiza (The Visit of Luiza)',  
$stry5,
);

$strylnks = array(
'<a href="https://diario.netlify.com/lonely%20stories/" class="'.$colortext2.'">'.$strynames[0].'</a>', 
'<a href="https://diario.netlify.com/new_world/spaceliving/" class="'.$colortext2.'">'.$strynames[1].'</a>', 
'<a href="https://diario.netlify.com/nazzevo/" class="'.$colortext2.'">'.$strynames[2].'</a>', 
'<a href="https://diario.netlify.com/luiza/" class="'.$colortext2.'">'.$strynames[3].'</a>', 
'<a href="https://diario.netlify.com/pequenata/" class="'.$colortext2.'">'.$strynames[4].'</a>', );

$strycapnumb = array(1, 13, 5, 1, 15);
$strywordnumb = array(512, 17.374, '7.440', 1.218, 7.401);
$strycharnumb = 41.162;

$date1 = $bluespan.'21:11 05/08/2019'.$spanc;
$date2 = $bluespan.'02:15 07/12/2019'.$spanc;
$date1 = $datetxt1.': '.$date1;
$date2 = $datetxt2.': '.$date2;

$dates = $date1.'<br />'.'
'.$date2.'<br /><br />';

$pastebinlinks = array(
'<a href="https://pastebin.com/4j99vwMy">https://pastebin.com/4j99vwMy</a>', 
'<a href="https://pastebin.com/cx0jA1fx">https://pastebin.com/cx0jA1fx</a>',
'<a href="https://pastebin.com/FaGftvR0">https://pastebin.com/FaGftvR0</a>',
);

$citybodyfiles = array(
$selected_website_folder.'CityBody1.php', 
$selected_website_folder.'CityBody2.php', 
$selected_website_folder.'CityBody3.php', 
$selected_website_folder.'CityBody4.php',
$selected_website_folder.'CityBody5.php', 
$selected_website_folder.'CityBody6.php',
);

ob_start();
include $phptabs.'Btns.php';
$buttons = ob_get_clean();

include $citybodyfiles[0];
include $citybodyfiles[1];
include $citybodyfiles[2];
include $citybodyfiles[3];
include $citybodyfiles[4];
include $citybodyfiles[5];

ob_start();
include $selected_website_folder.'CityContent2.php';
$citycontents2 = ob_get_clean();

ob_start();
include $selected_website_folder.'CityContent3.php';
$citycontents3 = ob_get_clean();

ob_start();
include $selected_website_folder.'CityContent5.php';
$citycontents5 = ob_get_clean();

ob_start();
include $selected_website_folder.'CityContent6.php';
$citycontents6 = ob_get_clean();

$citycontents = array(
$selected_website_folder.'CityContent2.php',
$selected_website_folder.'CityContent3.php',
$selected_website_folder.'CityContent5.php',
);

$citiescontent = array(
$citytitle1.$citybody1,
$citytitle2.$citybody2.$citycontents2,
$citytitle3.$citybody3.$citycontents3,
$citytitle4.$citybody4,
$citytitle5.$citybody5.$citycontents5,
$citytitle6.$citybody6.$citycontents6,
);

?>