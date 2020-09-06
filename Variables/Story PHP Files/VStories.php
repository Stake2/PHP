<?php 

#Stories numb
$storiesnumb = 5;

#Story status text array
$status = array(
'finished',
'writing',
'reviewing and editing',
'finished and publishing',
);

if ($sitetype1 == $types[0] and $sitename != $sitediario) {
	$story = '';
}

#English texts for story websites
if (in_array($lang, $en_langs)) {
	$storystatuses = array(
	'finished',
	'writing',
	'reviewing and editing',
	'finished and publishing',
	);

	$readtxts = array(
	$readingtxt = "You're reading",
	$readingtxt.': '.ucwords($story),
	'I Read It ✓',
	'I read the Chapter',
	'Read the Chapter',
	'Readings',
	'Readers',
	'Reader',
	);

	$cmntstxts = array(
	'Comment',
	'Comment',
	'Commented',
	'in the',
	'on',
	'Say what you think about the story',
	'Say what you think about the chapter',
	);

	$writetxts = array(
	'Write',
	'Write the Chapter',
	substr($readingtxt, 0, -8).' '.strtolower('Writing').': '.ucwords($story),
	);

	$chaptertxt = 'chapter';
	$chaptertabtxt = $chaptertxt.'-text';

	$authortxt = 'Author';
	$captxt = 'Chapters';
	$datatxt = 'Date';
	$datatxt2 = 'Made in';

	$nametxt1 = 'Name';
	$nametxt2 = 'Your';
	$sendtxt = 'Send';

	$titletxt = 'Title';
	$storytxt = 'Story text';
	$timetxt = 'Time';
	$storiestxt = 'Stories';
	$formname = 'Name';
	$formtxt = 'Form';

	$readersdesc = 'Thanks everyone ♥';
	$notificationtext = 'New reviewed chapter';

	$write_new_chapter_tab_text = 'write-new-chapter';

	$storynames = array(
	$pqntstoryname = 'The Life of Littletato',
	$slstoryname = 'SpaceLiving',
	$nazzevostoryname = 'The Story of the Nazzevo Brothers',
	$desert_island_story_name = 'Desert Island',
	$lonely_story_name = 'Lonely Stories',
	);
}

#Brazilian Portuguese texts for story websites
if (in_array($lang, $pt_langs)) {
	$storystatuses = array(
	'terminada',
	'escrevendo',
	'revisando e editando',
	'terminada e postando',
	);

	$readtxts = array(
	$readingtxt = "Você está lendo",
	$readingtxt.': '.ucwords($story),
	'Eu li ✓',
	'Eu li o Capítulo',
	'Leu o Capítulo',
	'Leituras',
	'Leitores',
	'Leitor',
	);

	$cmntstxts = array(
	'Comentário',
	'Comentar',
	'Comentado',
	'no',
	'em',
	'Comente o que achou da história',
	'Comente o que achou do capítulo',
	);

	$writetxts = array(
	'Escrever',
	'Escreva o capítulo',
	substr($readingtxt, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story),
	);

	$chaptertxt = 'capítulo';
	$chaptertabtxt = 'texto-'.$chaptertxt;

	$authortxt = 'Autor';
	$captxt = 'Capítulos';
	$datatxt = 'Data';
	$datatxt2 = 'Feito em';

	$nametxt1 = 'Nome';
	$nametxt2 = 'Seu';
	$sendtxt = 'Enviar';

	$titletxt = 'Título';
	$storytxt = 'Texto da história';
	$timetxt = 'Tempo';
	$storiestxt = 'Histórias';
	$formname = 'Nome';
	$formtxt = 'Formulário';

	$readersdesc = 'Obrigado a todos ♥';
	$notificationtext = 'Novo capítulo revisado';

	$write_new_chapter_tab_text = 'escrever-novo-capítulo';

	$storynames = array(
	$pqntstoryname = 'A Vida de Pequenata',
	$slstoryname = 'SpaceLiving',
	$nazzevostoryname = 'A História dos Irmãos Nazzevo',
	$desert_island_story_name = 'Ilha Deserta',
	$lonely_story_name = 'Histórias Solitárias',
	);
}

$capdiv = $chaptertxt.'-';
$captextdiv = $chaptertabtxt.'-';

if ($sitetype1 == $types[1]) {
	#Story status definer
	if ($storystatus == $status[0]) {
		$storystatus = $storystatuses[0];
	}
	
	if ($storystatus == $status[1]) {
		$storystatus = $storystatuses[1];
	}
	
	if ($storystatus == $status[2]) {
		$storystatus = $storystatuses[2];
	}
	
	if ($storystatus == $status[3]) {
		$storystatus = $storystatuses[3];
	}
}

#Story names array
$stories = array(
$pqntstoryname,
$slstoryname,
$nazzevostoryname,
$desert_island_story_name,
$lonely_story_name,
);

#Story folders array
$storyfolders = array(
$pqntstoryfolder = 'Pequenata - Littletato',
$slstoryfolder = 'SpaceLiving',
$nazzevostoryfolder = 'The Story of the Nazzevo Brothers',
$desert_island_story_folder = 'Desert Island',
$lsstoryfolder = 'Lonely Stories',
$sistoryfolder = 'Yours truly, Izaque',
);

if ($sitetype1 == $types[1]) {
	$commentheader = $computer_div.'<br />'.$divc.
	$mobile_div.'<br /><br />'.$divc.
	$computer_div.'<'.$n.'><b>'.$cmntstxts[0].'s:</b> '.$icons[12].'</'.$n.'>'.$divc.
	$mobile_div.'<'.$m.'><b>'.$cmntstxts[0].'s:</b> '.$icons[12].'</'.$m.'>'.$divc.
	''.
	$mobile_div.'<br /><br />'.$divc.
	$computer_div.'<br /><br />'.$divc.
	$margin;
	
	$readingsheader = $computer_div.'<br />'.$divc.
	$mobile_div.'<br />'.$divc.
	$computer_div.'<'.$n.'><b>'.$readtxts[5].': ✓</b></'.$n.'>'.$divc.
	$mobile_div.'<'.$m.'><b>'.$readtxts[5].': ✓</b></'.$m.'>'.$divc.
	''.
	$computer_div.'<br /><br />'.$divc.
	$mobile_div.'<br /><br />'.$divc;
}

$pqntbg = 'bg shakesidetoside';
$pqnttext = 'darkpqnttext shakesidetoside';
$slbg = 'sl3 shakesidetoside';
$lsbg = 'darksl lstext shakesidetoside';

$desert_island_link = $url.$desert_island_new_link.'/';
$desert_island_text = 'cyan-water_text_dark';
$desert_island_background = 'cyan-water_bg';
$desert_island_image = $cdn_image_stories_desertisland.'Capa Original.jpg';

$size_variable = $n;
$desert_island_story = '<a class="w3-btn '.$cssbtn1.' '.$desert_island_background.'" href="'.$desert_island_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$desert_island_text.'"><b>'.$desert_island_story_name.'</b></'.$size_variable.'><img src="'.$desert_island_image.'" width="650"><br /><br /></a><br />';

$size_variable = $m;
$desert_island_story_mobile = '<a class="w3-btn '.$cssbtn1.' '.$desert_island_background.'" href="'.$desert_island_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$desert_island_text.'"><b>'.$desert_island_story_name.'</b></'.$size_variable.'><img src="'.$desert_island_image.'" width="650"><br /><br /></a><br />';

$cover_text = 'Cover';
$pequenata_online_cover_folder = $cdn_image_stories_pequenata.'Capas/Kids/';
$nazzevo_online_cover_folder = $cdn_image_stories_nazzevo.'Capas/';
$story_cover_image_filename = '1';

if ($lang == $geral_lang) {
	$lang = $enus_lang;

	$pequenata_folder = $pequenata_online_cover_folder.strtoupper($lang).'/'.$cover_text.'/';
	$nazzevo_folder = $nazzevo_online_cover_folder.strtoupper($lang).'/'.$cover_text.'/';

	$pqntimglink = $pequenata_folder.$story_cover_image_filename.'.png';
	$nazzevoimglink = $nazzevo_folder.$story_cover_image_filename.'.png';

	$lang = $geral_lang;
}

else {
	if (in_array($lang, $en_langs)) {
		$pequenata_folder = $pequenata_online_cover_folder.strtoupper($lang).'/'.$cover_text.'/';
		$nazzevo_folder = $nazzevo_online_cover_folder.strtoupper($lang).'/'.$cover_text.'/';

		$pqntimglink = $pequenata_folder.$story_cover_image_filename.'.png';
		$nazzevoimglink = $nazzevo_folder.$story_cover_image_filename.'.png';
	}

	if (in_array($lang, $pt_langs)) {
		$pequenata_folder = $pequenata_online_cover_folder.strtoupper($ptbr_lang).'/'.$cover_text.'/';
		$nazzevo_folder = $nazzevo_online_cover_folder.strtoupper($ptbr_lang).'/'.$cover_text.'/';

		$pqntimglink = $pequenata_folder.$story_cover_image_filename.'.png';
		$nazzevoimglink = $nazzevo_folder.$story_cover_image_filename.'.png';
	}
}

$pqntlink = $url.'pequenata/';

$sllink = $url.'new_world/spaceliving/';
$slimglink = $cdnimg.'SpaceLiving Logo.jpg';

$nazzevolink = $url.'nazzevo/';

$lslink = $url.'Lonely%20Stories/';
$lsimglink = $cdnimg.'Lonely Stories.jpg';

$story1 = '<a class="w3-btn  '.$cssbtn1.' '.$pqntbg.'" href="'.$pqntlink.'" '.$roundedborderstyle.'><'.$n.' class="'.$pqnttext.'"><b>'.$stories[0].'</b></'.$n.'><img src="'.$pqntimglink.'" width="650"><br /><br /></a><br />';
$story2 = '<a class="w3-btn '.$cssbtn1.' '.$slbg.'" href="'.$sllink.'" '.$roundedborderstyle.'><'.$n.' class="w3-text-blue"><b>'.$stories[1].'</b></'.$n.'><img src="'.$slimglink.'" width="650"><br /><br /></a><br />';
$story3 = '<a class="w3-btn '.$cssbtn1.' '.$pqntbg.'" href="'.$nazzevolink.'" '.$roundedborderstyle.'><'.$n.' class="'.$pqnttext.'"><b>'.$stories[2].'</b></'.$n.'><img src="'.$nazzevoimglink.'" width="650"><br /><br /></a><br />';
$story4 = '<a class="w3-btn '.$cssbtn1.' '.$lsbg.'" href="'.$lslink.'" '.$roundedborderstyle.'><'.$n.'><b>'.$lonely_story_name.'</b></'.$n.'><img src="'.$lsimglink.'" width="650"><br /><br /></a><br />';

$story1m = '<a class="w3-btn '.$cssbtn1.' '.$pqntbg.'" href="'.$pqntlink.'" '.$roundedborderstyle.'><'.$m.' class="'.$pqnttext.'"><b>'.$stories[0].'</b></'.$m.'><img src="'.$pqntimglink.'" width="350" height="210"><br /><br /></a><br />';
$story2m = '<a class="w3-btn  '.$cssbtn1.' '.$slbg.'" href="'.$sllink.'" '.$roundedborderstyle.'><'.$m.' class="w3-text-blue"><b>'.$stories[1].'</b></'.$m.'><img src="'.$slimglink.'" width="320" height="230"><br /><br /></a><br />';
$story3m = '<a class="w3-btn '.$cssbtn1.' '.$pqntbg.'" href="'.$nazzevolink.'" '.$roundedborderstyle.'><'.$m.' class="'.$pqnttext.'"><b>'.$stories[2].'</b></'.$m.'><img src="'.$nazzevoimglink.'" width="290" height="190"><br /><br /></a><br />';
$story4m = '<a class="w3-btn '.$cssbtn1.' '.$lsbg.'" href="'.$lslink.'" '.$roundedborderstyle.'><'.$m.'><b>'.$lonely_story_name.'</b></'.$m.'><img src="'.$lsimglink.'" width="290" height="190"><br /><br /></a><br />';

$storieslinkstab = "\n".
$story1."<br />"."\n"."\n".
$story2."<br />"."\n"."\n".
$story3."<br />"."\n"."\n".
$desert_island_story."<br /> "."\n"."\n".
$story4."\n";

$storieslinkstabm = "\n".
$story1m."<br />"."\n"."\n".
$story2m."<br />"."\n"."\n".
$story3m."<br />"."\n"."\n".
$desert_island_story_mobile."<br />"."\n"."\n".
$story4m."\n";

?>