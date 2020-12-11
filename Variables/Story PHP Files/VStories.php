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

$status_finished = $status[0];
$status_writing = $status[1];
$status_reviewing_and_editing = $status[2];
$status_finished_and_publishing = $status[3];

if ($sitetype1 == $website_types_array[0] and $website_name != $sitediario) {
	$story_name_variable = '';
}

$titles_enus_text = 'Titles';

# English texts for story websites
if (in_array($website_language, $en_languages_array)) {
	$story_namestatuses = array(
	'finished',
	'writing',
	'reviewing and editing',
	'finished and publishing',
	);

	$read_texts_array = array(
	$readingtxt = "You're reading",
	$readingtxt.': '.ucwords($story_name),
	'I Read It ✓',
	'I read the Chapter',
	'Read the Chapter',
	'Readings',
	'Readers',
	'Reader',
	);

	$comments_texts_array = array(
	'Comment',
	'Comment',
	'Commented',
	'in the',
	'on',
	'Say what you think about the story',
	'Say what you think about the chapter',
	);

	$write_texts_array = array(
	'Write',
	'Write the Chapter',
	substr($readingtxt, 0, -8).' '.strtolower('Writing').': '.ucwords($story_name),
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
	$titles_text = 'Titles';
	$story_nametxt = 'Story text';
	$timetxt = 'Time';
	$storiestxt = 'Stories';
	$formname = 'Name';
	$formtxt = 'Form';

	$readersdesc = 'Thanks everyone ♥';
	$notificationtext = 'New reviewed chapter';

	$write_new_chapter_tab_text = 'write-new-chapter';
	$write_button_text = 'write-button';

	$story_names_array = array(
	$littletato_story_name = 'The Life of Littletato',
	$spaceliving_story_name = 'SpaceLiving',
	$nazzevo_story_name = 'The Story of the Nazzevo Brothers',
	$desert_island_story_name = 'Desert Island',
	$lonely_story_name = 'Lonely Stories',
	);
}

#Brazilian Portuguese texts for story websites
if (in_array($website_language, $pt_languages_array)) {
	$story_namestatuses = array(
	'terminada',
	'escrevendo',
	'revisando e editando',
	'terminada e postando',
	);

	$read_texts_array = array(
	$readingtxt = "Você está lendo",
	$readingtxt.': '.ucwords($story_name),
	'Eu li ✓',
	'Eu li o Capítulo',
	'Leu o Capítulo',
	'Leituras',
	'Leitores',
	'Leitor',
	);

	$comments_texts_array = array(
	'Comentário',
	'Comentar',
	'Comentado',
	'no',
	'em',
	'Comente o que achou da história',
	'Comente o que achou do capítulo',
	);

	$write_texts_array = array(
	'Escrever',
	'Escreva o capítulo',
	substr($readingtxt, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story_name),
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
	$titles_text = 'Títulos';
	$story_nametxt = 'Texto da história';
	$timetxt = 'Tempo';
	$storiestxt = 'Histórias';
	$formname = 'Nome';
	$formtxt = 'Formulário';

	$readersdesc = 'Obrigado a todos ♥';
	$notificationtext = 'Novo capítulo revisado';

	$write_new_chapter_tab_text = 'escrever-novo-capítulo';
	$write_button_text = 'botão-de-escrever';

	$story_names_array = array(
	$littletato_story_name = 'A Vida de Pequenata',
	$spaceliving_story_name = 'SpaceLiving',
	$nazzevo_story_name = 'A História dos Irmãos Nazzevo',
	$desert_island_story_name = 'Ilha Deserta',
	$lonely_story_name = 'Histórias Solitárias',
	);
}

$chapter_div_text = $chaptertxt.'-';
$captextdiv = $chaptertabtxt.'-';

if ($sitetype1 == $website_types_array[1]) {
	#Story status definer
	if ($story_status == $status[0]) {
		$story_status = $story_namestatuses[0];
	}
	
	if ($story_status == $status[1]) {
		$story_status = $story_namestatuses[1];
	}
	
	if ($story_status == $status[2]) {
		$story_status = $story_namestatuses[2];
	}
	
	if ($story_status == $status[3]) {
		$story_status = $story_namestatuses[3];
	}
}

#Story names array
$stories = array(
$littletato_story_name,
$spaceliving_story_name,
$nazzevo_story_name,
$desert_island_story_name,
$lonely_story_name,
);

#Story folders array
$story_namefolders = array(
$pequenata_story_folder = 'Pequenata - Littletato',
$slstoryfolder = 'SpaceLiving',
$nazzevostoryfolder = 'The Story of the Nazzevo Brothers',
$desert_island_story_folder = 'Desert Island',
$lsstoryfolder = 'Lonely Stories',
$sistoryfolder = 'Yours truly, Izaque',
);

if ($sitetype1 == $website_types_array[1]) {
	$commentheader = $computer_div.'<br />'.$div_close.
	$mobile_div.'<br /><br />'.$div_close.
	$computer_div.'<'.$n.'><b>'.$comments_texts_array[0].'s:</b> '.$icons[12].'</'.$n.'>'.$div_close.
	$mobile_div.'<'.$m.'><b>'.$comments_texts_array[0].'s:</b> '.$icons[12].'</'.$m.'>'.$div_close.
	''.
	$mobile_div.'<br /><br />'.$div_close.
	$computer_div.'<br /><br />'.$div_close.
	$margin;
	
	$readingsheader = $computer_div.'<br />'.$div_close.
	$mobile_div.'<br />'.$div_close.
	$computer_div.'<'.$n.'><b>'.$read_texts_array[5].': ✓</b></'.$n.'>'.$div_close.
	$mobile_div.'<'.$m.'><b>'.$read_texts_array[5].': ✓</b></'.$m.'>'.$div_close.
	''.
	$computer_div.'<br /><br />'.$div_close.
	$mobile_div.'<br /><br />'.$div_close;
}

$pequenata_border = $border_4px_solid_dark_brown_css_class;
$pequenata_background = $background_brown_css_class." ".$pequenata_border.' shakesidetoside';
$pequenata_text = $text_dark_brown_css_class.' shakesidetoside';
$pequenata_link = $main_website_url.'pequenata/';
$pequenata_online_cover_folder = $cdn_image_stories_pequenata.'Capas/Kids/';

$nazzevo_border = $border_4px_solid_dark_brown_css_class;
$nazzevo_background = $background_brown_css_class." ".$nazzevo_border.' shakesidetoside';
$nazzevo_text = $text_dark_brown_css_class.' shakesidetoside';
$nazzevo_link = $main_website_url.'nazzevo/';
$nazzevo_online_cover_folder = $cdn_image_stories_nazzevo.'Capas/';

$spaceliving_border = $border_4px_solid_blue_css_class;
$spaceliving_background = $background_dark_blue_css_class." ".$spaceliving_border.' shakesidetoside';
$spaceliving_text = $text_blue_css_class.' shakesidetoside';
$spaceliving_link = $main_website_url.'new_world/spaceliving/';
$spaceliving_image_link = $cdnimg.'SpaceLiving Logo.jpg';

$desert_island_border = $border_4px_solid_blue_css_class;
$desert_island_background = $background_green_water_css_class." ".$desert_island_border.' shakesidetoside';
$desert_island_text = $text_dark_green_water_css_class;
$desert_island_new_link = str_replace(' ', '_', strtolower($sitename_desertisland));
$desert_island_link = $main_website_url.$desert_island_new_link.'/';
$desert_island_image_link = $cdn_image_stories_desertisland.'Capa Original.jpg';

$lonelystories_border = $border_4px_solid_black_css_class;
$lonelystories_background = $background_grey_css_class." ".$lonelystories_border.' shakesidetoside';
$lonelystories_text = $text_black_css_class.' shakesidetoside';
$lonelystories_link = $main_website_url.'Lonely%20Stories/';
$lonelystories_image_link = $cdnimg.'Lonely Stories.jpg';

$cover_text = 'Cover';
$story_name_cover_image_filename = '1';

if ($website_language == $geral_language) {
	$website_language = $enus_language;

	$pequenata_folder = $pequenata_online_cover_folder.strtoupper($website_language).'/'.$cover_text.'/';
	$nazzevo_folder = $nazzevo_online_cover_folder.strtoupper($website_language).'/'.$cover_text.'/';

	$pequenata_image_link = $pequenata_folder.$story_name_cover_image_filename.'.png';
	$nazzevo_image_link = $nazzevo_folder.$story_name_cover_image_filename.'.png';

	$website_language = $geral_language;
}

else {
	if (in_array($website_language, $en_languages_array)) {
		$pequenata_folder = $pequenata_online_cover_folder.strtoupper($website_language).'/'.$cover_text.'/';
		$nazzevo_folder = $nazzevo_online_cover_folder.strtoupper($website_language).'/'.$cover_text.'/';

		$pequenata_image_link = $pequenata_folder.$story_name_cover_image_filename.'.png';
		$nazzevo_image_link = $nazzevo_folder.$story_name_cover_image_filename.'.png';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$pequenata_folder = $pequenata_online_cover_folder.strtoupper($ptbr_language).'/'.$cover_text.'/';
		$nazzevo_folder = $nazzevo_online_cover_folder.strtoupper($ptbr_language).'/'.$cover_text.'/';

		$pequenata_image_link = $pequenata_folder.$story_name_cover_image_filename.'.png';
		$nazzevo_image_link = $nazzevo_folder.$story_name_cover_image_filename.'.png';
	}
}

$size_variable = $n;
$pequenata_story_card_computer = '<a class="w3-btn '.$background_hover_white_css_class.' '.$pequenata_background.'" href="'.$pequenata_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$pequenata_text.'"><b style="white-space: break-spaces;">'.$stories[0].'</b></'.$size_variable.'><img class="'.$pequenata_border.'" src="'.$pequenata_image_link.'"  width="650"><br /><br /></a><br />';

$spaceliving_story_card_computer = '<a class="w3-btn '.$background_hover_white_css_class.' '.$spaceliving_background.'" href="'.$spaceliving_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$spaceliving_text.'"><b style="white-space: break-spaces;">'.$stories[1].'</b></'.$size_variable.'><img class="'.$spaceliving_border.'" src="'.$spaceliving_image_link.'" width="650"><br /><br /></a><br />';

$nazzevo_story_card_computer = '<a class="w3-btn '.$background_hover_white_css_class.' '.$nazzevo_background.'" href="'.$nazzevo_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$nazzevo_text.'"><b>'.$stories[2].'</b></'.$size_variable.'><img class="'.$nazzevo_border.'" src="'.$nazzevo_image_link.'" width="650"><br /><br /></a><br />';

$desert_island_story_card_computer = '<a class="w3-btn '.$background_hover_white_css_class.' '.$desert_island_background.'" href="'.$desert_island_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$desert_island_text.'"><b>'.$desert_island_story_name.'</b></'.$size_variable.'><img class="'.$desert_island_border.'" src="'.$desert_island_image_link.'" width="650"><br /><br /></a><br />';

$lonelystories_story_card_computer = '<a class="w3-btn '.$background_hover_white_css_class." ".$lonelystories_text.' '.$lonelystories_background.'" href="'.$lonelystories_link.'" '.$roundedborderstyle.'><'.$size_variable.'><b>'.$lonely_story_name.'</b></'.$size_variable.'><img class="'.$lonelystories_border.'" src="'.$lonelystories_image_link.'" width="650"><br /><br /></a><br />';

$size_variable = $m;
$pequenata_story_card_mobile = '<a class="w3-btn '.$background_hover_white_css_class.' '.$pequenata_background.'" href="'.$pequenata_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$pequenata_text.'"><b style="white-space: break-spaces;">'.$stories[0].'</b></'.$size_variable.'><img class="'.$pequenata_border.'" src="'.$pequenata_image_link.'" width="230" height="170"><br /><br /></a><br />';

$spaceliving_story_card_mobile = '<a class="w3-btn  '.$background_hover_white_css_class.' '.$spaceliving_background.'" href="'.$spaceliving_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$spaceliving_text.'"><b style="white-space: break-spaces;">'.$stories[1].'</b></'.$size_variable.'><img class="'.$spaceliving_border.'" src="'.$spaceliving_image_link.'" width="230" height="170"><br /><br /></a><br />';

$nazzevo_story_card_mobile = '<a class="w3-btn '.$background_hover_white_css_class.' '.$nazzevo_background.'" href="'.$nazzevo_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$nazzevo_text.'"><b style="white-space: break-spaces;">'.$stories[2].'</b></'.$m.'><img class="'.$nazzevo_border.'" src="'.$nazzevo_image_link.'" width="230" height="170"><br /><br /></a><br />';

$desert_island_story_card_mobile = '<a class="w3-btn '.$background_hover_white_css_class.' '.$desert_island_background.'" href="'.$desert_island_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$desert_island_text.'"><b>'.$desert_island_story_name.'</b></'.$size_variable.'><img class="'.$desert_island_border.'" src="'.$desert_island_image_link.'" width="230"><br /><br /></a><br />';

$lonelystories_story_card_mobile = '<a class="w3-btn '.$background_hover_white_css_class.' '.$lonelystories_background." ".$lonelystories_text.'" href="'.$lonelystories_link.'" '.$roundedborderstyle.'><'.$m.'><b style="white-space: break-spaces;">'.$lonely_story_name.'</b></'.$size_variable.'><img class="'.$lonely_stories_border.'" src="'.$lonelystories_image_link.'" width="230" height="170"><br /><br /></a><br />';

$story_name_cards_computer = "\n".
$pequenata_story_card_computer."<br />"."\n"."\n".
$spaceliving_story_card_computer."<br />"."\n"."\n".
$nazzevo_story_card_computer."<br />"."\n"."\n".
$desert_island_story_card_computer."<br /> "."\n"."\n".
$lonelystories_story_card_computer."\n";

$story_name_cards_mobile = "\n".
$pequenata_story_card_mobile."<br />"."\n"."\n".
$spaceliving_story_card_mobile."<br />"."\n"."\n".
$nazzevo_story_card_mobile."<br />"."\n"."\n".
$desert_island_story_card_mobile."<br />"."\n"."\n".
$lonelystories_story_card_mobile."\n";

?>