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




# Website Info Class
/*

A Class that contains the title of the website, the description, images
A Class that contains the styles of the selected website


*/

interface Website_Info_Interface {

	public function get_title():string;
	public function setTitle($website_title);

	public function get_description():string;
	public function setDescription($website_description);

	public function get_header_description():string;
	public function setHeaderDescription($website_header_description);

	public function get_images():string;
	public function setImages($website_images);

	public function __construct($a, $b, $c, $d);

	public function showWebsiteInfo();

}

interface Website_Style_Interface {

	public function set_style_file($website_folder);
	public function get_style_file();

}

abstract class Website_Style_Abstract_Class implements Website_Style_Interface {

	private $website_style_file;

	public function get_style_file() {

		return $this -> website_style_file;

	}

	public function set_style_file($website_folder) {

		$this -> website_style_file = $website_folder."Website Style.php";

	}

}

abstract class Website_Info_Abstract_Class implements Website_Info_Interface {

	private $website_title;
	private $website_description;
	private $website_header_description;
	private $website_images;

	public function get_title():string {

		return $this -> website_title;

	}

	public function setTitle($website_title) {

		$this -> website_title = $website_title;

	}

	public function get_description():string {

		return $this -> website_description;

	}

	public function setDescription($website_description) {

		$this -> website_description = $website_description;

	}

	public function get_header_description():string {

		return $this -> website_header_description;

	}

	public function setHeaderDescription($website_header_description) {

		$this -> website_header_description = $website_header_description;

	}

	public function get_images():string {

		return $this -> website_images;

	}

	public function setImages($website_images) {

		$this -> website_images = $website_images;

	}

	public function __construct($a, $b, $c, $d) {

		$this -> website_title = $a;
		$this -> website_description = $b;
		$this -> website_header_description = $c;
		$this -> website_images = $d;

	}

	public function showWebsiteInfo() {

		return array(
			"website_title" => $this -> get_title(),
			"website_description" => $this -> get_description(),
			"website_header_description" => $this -> get_header_description(),
			"website_images" => $this -> get_images(),
		);

	}

}

class Website_Info extends Website_Info_Abstract_Class {

}

class Website_Style extends Website_Style_Abstract_Class {

	private $website_style_file;

	public function get_style_file() {

		echo $this -> website_style_file;

	}

	public function set_style_file($website_folder) {

		$this -> website_style_file = $website_folder."Website Style.php";

	}

}

class Website extends Website_Info_Abstract_Class {



}

$website_style = new Website_style();
$website_style -> set_style_file($sitephpfolder2);

$website_info = new Website($sitetitulo2, $sitedesc, $sitedesc2, $imagens);

$website_title = $website_info -> get_title();
$website_description = $website_info -> get_description();
$website_header_description = $website_info -> get_header_description();
$website_images = $website_info -> get_images();

function format($text, $parameters) {
	$parameters = (array)$parameters;

	$text = preg_replace_callback("#\{\}#",
	function ($parameters_array) {
		static $i = 0;
		return '{'.($i++).'}';
	},
	$text);

	return str_replace(
		array_map(
		function ($key) {
			return '{'.$key.'}';
		},

		array_keys($parameters)),

		array_values($parameters),

		$text
	);

}

# Blank website generator using templates
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

	$styletext2 = '';

	$sitewrapper = $computerspace.
	'<div class="'.$default_background_color.'" '.$styletext2.' style="margin-left:5%;margin-right:5%;'.$border.''.$roundedborderstyle2.'">
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

	$styletext2 = '';

	$sitewrapper = $computerspace.
	'<div class="'.$default_background_color.'" '.$styletext2.' style="margin-left:5%;margin-right:5%;'.$border.''.$roundedborderstyle2.'">
	<'.$n.' class="'.$colortext.' '.$zoomanim.'"><p><br /><b>'.$website_title.'</b><br /><br /><p></'.$n.'>'."\n".'
	<hr class="'.$sitehr.'" />
	'.$imagens.'
	<'.$n.' class="'.$colortext.' '.$computervar.'">'.$website_description.'</'.$n.'>
	<'.$m.' class="'.$colortext.' '.$mobilevar.'">'.$website_description.'</'.$m.'>'
	.$diariostuff1.$diariostuff2.
	'<br />
	'.$divc."\n";
}

# Story website header generator
if ($sitetype1 == $types[1]) {
	if ($storystatus != $storystatuses[1] or $storystatus != $storystatuses[2]) {
		$newchaptertext = '';
	}

	if ($storystatus == $storystatuses[1] or $storystatus == $storystatuses[2]) {
		$newchaptertext = $spannewtextcolor.' ['.$newtxt.'!]'.$spanc;
	}

/*
	$sitewrapper = $computerspace.
	'<div style="background-color:black;margin-left:5%;margin-right:5%;'.$border.''.$roundedborderstyle2.'">'."\n".
	$margin.'<'.$n.' class="'.$colortext.' '.$zoomanim.'"><p><br /><b>'.$website_title.'</b><br /><br /><p></'.$n.'>'.$divc."\n".
	'<hr class="'.$sitehr.'" />'."\n".
	$website_images."\n".
	'<'.$m.' class="'.$colortext.'" style="'.$margincss1.'">'.$website_header_description.'</'.$m.'>'."\n".
	'<'.$m.' class="'.$colortext.'">'."\n".
	$authortxt.": ".'<span class="'.$colorsubtext.'">'.$authorname."<br />".'</span>'."\n".
	$captxt.': <span class="'.$colorsubtext.'">'.$chapters.$newchaptertext.'</span><br />'."\n".
	$readtxts[6].': <span class="'.$colorsubtext.'">'.$readersnumb.' '.$iconbookreader.'</span><br />'."\n".
	$datatxt.': <span class="'.$colorsubtext.'">'.$storydate.'</span><br />'."\n".
	'Status: <span class="'.$colorsubtext.'">'.$statustxt.'</span></'.$m.'>'.'<br />'."\n".
	'</div>'."\n";
*/

	$sitewrapper = $computerspace.
	'<div class="'.$default_background_color.'" style="margin-left:5%;margin-right:5%;'.$border.''.$roundedborderstyle2.'">'."\n".
	$margin.'<'.$n.' class="'.$colortext.' '.$zoomanim.'"><p><br /><b>'.$website_title.'</b><br /><br /><p></'.$n.'>'.$divc."\n".
	'<hr class="'.$sitehr.'" />'."\n".
	$website_images."\n".
	format('<'.$m.' class="'.$colortext.'" style="'.$margincss1.'">{}</'.$m.'>'."\n", $website_header_description).
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
<body>
'.$center."\n"."\n".
$buttons."\n".

$changetitlescript."\n".

$sitewrappershow."\n".

$sitenotification."\n";

?>