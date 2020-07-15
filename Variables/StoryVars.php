<?php 

#Stories numb
$storiesnumb = 4;

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

	$storynames = array(
	$pqntstoryname = 'The Life of Littletato',
	$slstoryname = 'SpaceLiving',
	$nazzevostoryname = 'The Story of the Nazzevo Brothers',
	$lonelystoryname = 'Lonely Stories',
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

	$storynames = array(
	$pqntstoryname = 'A Vida de Pequenata',
	$slstoryname = 'SpaceLiving',
	$nazzevostoryname = 'A História dos Irmãos Nazzevo',
	$lonelystoryname = 'Histórias Solitárias',
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
$lonelystoryname,
);

#Story folders array
$storyfolders = array(
$pqntstoryfolder = 'Pequenata - Littletato',
$slstoryfolder = 'SpaceLiving',
$nazzevostoryfolder = 'A História dos irmãos Nazzevo',
$lsstoryfolder = 'Lonely Stories',
$sistoryfolder = 'Yours truly, Izaque',
);

if ($sitetype1 == $types[1]) {
	$commentheader = '<div class="'.$computervar.'">'.'<br />'.$divc.
	'<div class="'.$mobilevar.'">'.'<br /><br />'.$divc.
	'<div class="'.$computervar.'">'.'<'.$n.'><b>'.$cmntstxts[0].'s:</b> '.$icons[12].'</'.$n.'>'.$divc.
	'<div class="'.$mobilevar.'">'.'<'.$m.'><b>'.$cmntstxts[0].'s:</b> '.$icons[12].'</'.$m.'>'.$divc.
	''.
	'<div class="'.$mobilevar.'">'.'<br /><br />'.$divc.
	'<div class="'.$computervar.'">'.'<br /><br />'.$divc.
	$margin;
	
	$readingsheader = '<div class="'.$computervar.'">'.'<br />'.$divc.
	'<div class="'.$mobilevar.'">'.'<br />'.$divc.
	'<div class="'.$computervar.'">'.'<'.$n.'><b>'.$readtxts[5].': ✓</b></'.$n.'>'.$divc.
	'<div class="'.$mobilevar.'">'.'<'.$m.'><b>'.$readtxts[5].': ✓</b></'.$m.'>'.$divc.
	''.
	'<div class="'.$computervar.'">'.'<br /><br />'.$divc.
	'<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;
}

?>