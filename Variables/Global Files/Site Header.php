<?php 

if ($newdesign == false and $notsomuchspace == false) {
	$computerspace = '<div class="'.$computervar.'"><br /><br /><br /><br /><br /><br /><br /><br />'.$divc."\n";
}

elseif ($notsomuchspace == false) {
	$computerspace = '<div class="'.$computervar.'"><br /><br /><br />'.$divc;
}

elseif ($notsomuchspace == true) {
	$computerspace = '';
}

#if ($sitename != $sitediario and $site != $sitediario and $sitename == $sitepqnt or $sitename == $sitenazzevo) {
#	$sitedesc = $sitedesc.'<br /> <b>'.$divzoomanimlouco.$orangespan.$redondodesc.$spanc.$divc.'</b>'."\n";
#	$sitedesc2 = $sitedesc2.'<br /> <b>'.$divzoomanimlouco.$orangespan.$redondodesc.$spanc.$divc.'</b>'."\n";
#}
#
#if ($sitename != $sitediario and $site != $sitediario and $sitename != $sitepqnt and $sitename != $sitenazzevo ) {
#	$sitedesc = $sitedesc.'<br /> <b>'.$divzoomanimlouco.$bluespan.$redondodesc.$spanc.$divc.'</b>'."\n";
#	$sitedesc2 = $sitedesc2.'<br /> <b>'.$divzoomanimlouco.$bluespan.$redondodesc.$spanc.$divc.'</b>'."\n";
#}

if (!isset($sitetitulo2) and !isset($sitedesc) and $deactivateheader == false) {
	$siteimage = $cdnimg.'Template.png';
	$imglink = $siteimage;
	$imagesize1 = 33;
	$imagesize2 = 44;

	if ($lang == $langs[0] or $lang == $langs[1]) {
		$sitetitulo2 = 'Placeholder for the Title: [Icon]';
	}

	if ($lang == $langs[2]) {
		$sitetitulo2 = 'Espaço reservado para o Título: [Ícone]';
	}

	$mainimage = '<img src="'.$imglink.'" width="'.$imagesize1.'%" class="'.$colortext.' '.$computervar.'" style="'.$border2.''.$roundedborderstyle2.'" />';
	$mainimagem = '<img src="'.$imglink.'" width="'.$imagesize2.'%" class="'.$colortext.' '.$mobilevar.'" style="'.$border2.''.$roundedborderstyle2.'" />';

	$imgbtn = '<div class="'.$computervar.'">'.'<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="window.open('."'".$imglink."'".')">'.'<'.$m.'>'.ucfirst($imglinktxt).': '.$icons[2].'</'.$m.'>'.'</button>'.$divc;
	$imgbtnm = '<div class="'.$mobilevar.'">'.'<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="window.open('."'".$imglink."'".')">'.'<'.$m.'>'.ucfirst($imglinktxt).': '.$icons[2].'</'.$m.'>'.'</button>'.$divc;

	$imagens = $mainimage."\n".$imgbtn.
	"\n".
	$mainimagem."\n".$imgbtnm.
	"\n";

	if ($sitename == $sitexenaeizaque) {
		$styletext1 = '';
		$styletext2 = 'class="'.$color5.'"';
	}

	if ($sitename != $sitexenaeizaque) {
		$styletext1 = 'background-color:black;';
		$styletext2 = '';
	}

	$sitewrapper = $computerspace.
	'<div '.$styletext2.' style="'.$styletext1.';margin-left:5%;margin-right:5%;'.$border.''.$roundedborderstyle2.'">
	<'.$n.' class="'.$colortext.' '.$zoomanim.'"><p><br /><b>'.$sitetitulo2.'</b><br /><br /><p></'.$n.'>'."\n".'
	<hr class="'.$sitehr.'" />
	'.$imagens.'
	<'.$n.' class="'.$colortext.' '.$computervar.'">'.$sitedesc.'</'.$n.'>
	<'.$m.' class="'.$colortext.' '.$mobilevar.'">'.$sitedesc.'</'.$m.'>
	<br />
	'.$divc."\n";	
}

if ($sitetype1 == $types[0] and $deactivateheader == false or $sitetype1 == 'Years' and $deactivateheader == false) {
	if ($site == $sitediario) {
		$blockstextonheader = $blockstext.'<br />'."\n";
		$diariostuff1 = '<'.$n.' class="'.$colortext.' '.$computervar.'">'.$blockstextonheader.'</'.$n.'>
		';
		$diariostuff2 = '<'.$m.' class="'.$colortext.' '.$mobilevar.'">'.$blockstextonheader.'</'.$m.'>
		';
	}

	if ($site != $sitediario) {
		$blockstextonheader = '';
		$diariostuff1 = '';
		$diariostuff2 = '';
	}

	if ($sitename == $sitexenaeizaque) {
		$styletext1 = '';
		$styletext2 = 'class="'.$color5.'"';
	}

	if ($sitename != $sitexenaeizaque) {
		$styletext1 = 'background-color:black;';
		$styletext2 = '';
	}

	$sitewrapper = $computerspace.
	'<div '.$styletext2.' style="'.$styletext1.';margin-left:5%;margin-right:5%;'.$border.''.$roundedborderstyle2.'">
	<'.$n.' class="'.$colortext.' '.$zoomanim.'"><p><br /><b>'.$sitetitulo2.'</b><br /><br /><p></'.$n.'>'."\n".'
	<hr class="'.$sitehr.'" />
	'.$imagens.'
	<'.$n.' class="'.$colortext.' '.$computervar.'">'.$sitedesc.'</'.$n.'>
	<'.$m.' class="'.$colortext.' '.$mobilevar.'">'.$sitedesc.'</'.$m.'>'
	.$diariostuff1.$diariostuff2.
	'<br />
	'.$divc."\n";
}

if ($sitetype1 == $types[1]) {
	if ($storystatus != $storystatuses[1] or $storystatus != $storystatuses[2]) {
		$newchaptertext = '';
	}

	if ($storystatus == $storystatuses[1] or $storystatus == $storystatuses[2]) {
		$newchaptertext = $spannewtextcolor.' ['.$newtxt.'!]'.$spanc;
	}

	$sitewrapper = $computerspace.
	'<div style="background-color:black;margin-left:5%;margin-right:5%;'.$border.''.$roundedborderstyle2.'">'."\n".
	$margin.'<'.$n.' class="'.$colortext.' '.$zoomanim.'"><p><br /><b>'.$sitetitulo2.'</b><br /><br /><p></'.$n.'>'.$divc."\n".
	'<hr class="'.$sitehr.'" />'."\n".
	$imagens."\n".
	'<'.$m.' class="'.$colortext.'" style="'.$margincss1.'">'.$sitedesc2.'</'.$m.'>'."\n".
	'<'.$m.' class="'.$colortext.'">'."\n".
	$authortxt.": ".'<span class="'.$colorsubtext.'">'.$authorname."<br />".'</span>'."\n".
	$captxt.': <span class="'.$colorsubtext.'">'.$chapters.$newchaptertext.'</span><br />'."\n".
	$readtxts[6].': <span class="'.$colorsubtext.'">'.$readersnumb.' '.$iconbookreader.'</span><br />'."\n".
	$datatxt.': <span class="'.$colorsubtext.'">'.$storydate.'</span><br />'."\n".
	'Status: <span class="'.$colorsubtext.'">'.$statustxt.'</span></'.$m.'>'.'<br />'."\n".
	'</div>'."\n";
}

if ($sitehasnotifications == true and $deactivatenotification == false) {
	$changetitlescript = '<script>
var olddocumenttitle = "";

function ChangeTitle() {
	olddocumenttitle = document.title;
	document.title = "(1) " + document.title;
}

function ResetTitle() {
	document.title = olddocumenttitle;
}
</script>';

	$sitenotification = $sitenotification;
}

else {
	$changetitlescript = '';

	$sitenotification = '';
}

if ($newdesign == true) {
	$sitewrappershow = $sitewrapper;
}

if ($deactivateheader == true) {
	$sitewrappershow = '';
}

if ($deactivateheader == false) {
	$sitewrappershow = $sitewrapper;
}

if ($deactivate_js == true) {
	$site_js = null;
}

if ($deactivate_js == false) {
	$site_js = $sitejs;
}

if ($deactivateall == true) {
	$center = null;
}

if ($deactivateall == false) {
	$center = '<center>';
}

$siteheader = '<head>'.
$sitehead."\n".
$site_js.
'</head>
<body>'.$center."\n".
$buttons."\n".

$changetitlescript."\n".

$sitewrappershow."\n".

$sitenotification."\n";

?>