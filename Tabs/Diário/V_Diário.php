<?php 

# Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_folder = ${"website_folder_".$website_names_array[$selected_website_number]};
$story_folder = $diario_folder_blocks;

$no_language_story_folder = $story_folder;
$story_chapter_files_folder = $no_language_story_folder;

$story_chapter_files_folder_language = $story_chapter_files_folder;

# Diario name in English and Brazilian Portuguese language
$diario_names = array(
'Diary',
ucwords(substr_replace($website_diario, 'á', 2, 1)),
);

# Website has comments settings
$sitecomments = false;

# Website image vars
if (in_array($website_language, $en_languages_array)) {
	$website_image = 'diario 2 enus';
	$story_name = $diario_names[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$website_image = 'diario 2';
	$story_name = $diario_names[1];
}

$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;
$website_image_size_computer = 30;
$website_image_size_mobile = 66;

$span_second_text_color = '<span class="'.$second_text_color.' '.$third_text_color.'">';

# Website descriptions
$website_descriptions_array = array(
'Website to show my '.$diario_names[0].' in HTML form, made by stake2.',
'Website para mostrar o meu '.$diario_names[1].' em forma de HTML, feito por stake2.',
);

$website_html_descriptions_array = array(
'Website to show my '.$span_second_text_color.$diario_names[0].$spanc.' in HTML form, made by '.$span_second_text_color.'stake2'.$spanc.'.',
'Website para mostrar o meu '.$span_second_text_color.$diario_names[1].$spanc.' em forma de HTML, feito por '.$span_second_text_color.'stake2'.$spanc.'.',
);

# Language dependent character names
if ($website_language == $languages_array[0] or $website_language == $languages_array [1]) {
	$story_name_variable = $diario_names[0];
	$nodus_character_name = 'Nodus (Artificial Intelligence)';
	$ted_character_name = 'Ted (Random guy)';
}

if (in_array($website_language, $pt_languages_array)) {
	$story_name_variable = $diario_names[1];
	$nodus_character_name = 'Nodus (Inteligência Artificial)';
	$ted_character_name = 'Ted (Cara aleatório)';
}

# Characters array
$characters = array(
$margin_3_h1."\n".$orangespan.'Izaque (stake2):'.$spanc."\n".'</b>'.$h1c."\n",
$margin_3_h1."\n".$bluespan.$nodus_character_name.':'.$spanc."\n".'</b>'.$h1c."\n",
$margin_3_h1."\n".$cyanspan.$ted_character_name.':'.$spanc."\n".'</b>'.$h1c."\n",
);

# Text File Reader.php file includer
$used_folder = $diario_folder;
require $text_file_reader_file_php;

#Website numbers
$blocks = 118;
$published_blocks = $diario_blocks_number[0];
$chapters = $published_blocks;

$comments_number = 0;
$comments_number_text = $comments_number + 1;
$number_of_chapter_comments = 0;

# Re require of the VStories.php file to set the story name
require $story_variables_php;

$formcode = 'diario';
$chapters_text = $formcode.'-';

# Texts for English language
if (in_array($website_language, $en_languages_array)) {
	$blockstext = 'The '.$diario_names[0].' has ['.$bluespan.$blocks.$spanc.'] blocks written, each block is a chapter.';
	$charactersdescs = array(
	"\n".'<div style="margin-left:3%;">'."\n".'Me of course xD, my dialogue is shown with:<br />'."\n".
	'[Current time]: "My dialogue"<br /><br />'."\n".
	'In other words:<br />'."\n".
	'23:42 19/04/2020: "My dialogue"<br />'."\n".$div_close."\n",

	"\n".'<div style="margin-left:3%;">'."\n".'My friend "from the future", he is an Artificial Intelligence, and a robot if you will, his dialogue is shown with:<br />'."\n".
	'[Current time]: //His dialogue<br /><br />'."\n".
	'In other words:<br />'."\n".
	'23:42 19/04/2020: //His dialogue<br />'."\n".$div_close."\n",

	"\n".'<div style="margin-left:3%;">'."\n".'A random guy that appears sometimes, his dialogue is shown with:<br />'."\n".
	'[Current time]: ~His dialogue<br /><br />'."\n".
	'In other words:<br />'."\n".
	'23:42 19/04/2020: ~His dialogue'."\n".$div_close."\n",
	);

	$person_name_text = 'Name';
	$person_name_text_two = 'Your';
	$send_form_text = 'Send';
	$commenttxt = 'Comment';
	$commenttxt2 = "Comment";
	$commenttxt3 = "Commented";
	$commenttxt4 = 'in the';
	$commenttxt5 = 'on';
	$commentdesc1 = "Say what you think about the story";
	$commentdesc2 = "Say what you think about the chapter";
	$form_name = "Name";
	$form_text = 'Form';
	$writetxt = 'Write';
	$writedesc = "Write the Chapter";
}

#Texts for Brazilian Portuguese language
if (in_array($website_language, $pt_languages_array)) {
	$blockstext = 'O '.$diario_names[1].' tem ['.$bluespan.$blocks.$spanc.'] blocks escritos, cada block é um capítulo.';
	$charactersdescs = array(
	"\n".'<div style="margin-left:3%;">'."\n".'Eu, é claro kkkkk, meu diálogo é mostrado com:<br />."\n"'.
	'[Hora atual]: "Meu diálogo"<br /><br />'."\n".
	'Em outras palavras:<br />'."\n".
	'23:42 19/04/2020: "Meu diálogo"'."\n".$div_close."\n",

	"\n".'<div style="margin-left:3%;">'."\n".'Meu amigo "do futuro", ele é uma Inteligência Artificial, e um robô se você quiser, seu diálogo é mostrado com:<br />'."\n".
	'[Hora atual]: //O diálogo dele<br /><br />'."\n".
	'Em outras palavras:<br />'."\n".
	'23:42 19/04/2020: //O diálogo dele'."\n".$div_close."\n",

	"\n".'<div style="margin-left:3%;">'."\n".'Um cara aleatório que aparece às vezes, seu diálogo é mostrado com ele:<br />'."\n".
	'[Hora atual]: ~O diálogo dele<br /><br />'."\n".
	'Em outras palavras:<br />'."\n".
	'23:42 19/04/2020: ~O diálogo dele'."\n".$div_close."\n",
	);

	$person_name_text = 'Nome';
	$person_name_text_two = 'Seu';
	$send_form_text = 'Enviar';
	$commenttxt = 'Comentário';
	$commenttxt2 = "Comentar";
	$commenttxt3 = "Comentado";
	$commenttxt4 = 'no';
	$commenttxt5 = 'em';
	$commentdesc1 = "Comente o que achou da história";
	$commentdesc2 = "Comente o que achou do capítulo";
	$form_name = "Nome";
	$form_text = 'Formulário';
	$writetxt = "Escrever";
	$writedesc = "Escreva o capítulo";
}

# English texts for Pequenata website
if (in_array($website_language, $en_languages_array)) {
	$read_texts_array = array(
	$reading_text = "You're reading",
	$reading_text.': '.ucwords($story_name),
	'I Read It ✓',
	'I read the Chapter',
	'Read the Chapter',
	'Readings',
	'Readers',
	'Reader',
	);

	$write_texts_array = array(
	'Write',
	'Write the Chapter',
	substr($reading_text, 0, -8).' '.strtolower('Writing').': '.ucwords($story_name),
	);
}

# Brazilian Portuguese texts for Pequenata website
if (in_array($website_language, $pt_languages_array)) {
	$read_texts_array = array(
	$reading_text = "Você está lendo",
	$reading_text.': '.ucwords($story_name),
	'Eu li ✓',
	'Eu li o Capítulo',
	'Leu o Capítulo',
	'Leituras',
	'Leitores',
	'Leitor',
	);

	$write_texts_array = array(
	'Escrever',
	'Escreva o capítulo',
	substr($reading_text, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story_name),
	);
}

# Story name and characters text array
$characterstext = $margin."\n".
$margin."\n".
'<div style="border-width:0px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".
"\n".'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".$characters[0]."\n".$margin.$charactersdescs[0].$div_close."\n".'<br />'."\n".$div_close."\n"."\n".'<br /><br />'."\n".
"\n".'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".$characters[1]."\n".$margin.$charactersdescs[1].$div_close."\n".'<br />'."\n".$div_close."\n"."\n".'<br /><br />'."\n".
"\n".'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".$characters[2]."\n".$margin.$charactersdescs[2].$div_close."\n".'<br />'."\n".$div_close."\n"."\n".
$div_close."\n".
$div_close."\n".
$div_close."\n";

#"You're reading" text definers
if (in_array($website_language, $en_languages_array)) {
	$reading = "<b>You're reading: ".ucwords($story_name).'<br />'." </b>";
}

if (in_array($website_language, $pt_languages_array)) {
	$reading = "<b>Você está lendo: ".ucwords($story_name).'<br />'." </b>";
}

#Buttons definer
#Buttons names
$citiestxts = array(
$tabnames[0].': '.$icons[21].' '.$span_second_text_color.' ['.$newtxt.' '.ucwords($chapter_text).' '.$published_blocks.']'.$spanc,
$tabnames[1].': '.$icons[1],
$tabnames[2].': '.$icons[12],
);

if ($website_has_stories_tab_setting == True) {
	array_push($citiestxts, end(array_values($tabnames)).': '.$icons[11]);
}

# Tab Generator.php includer
require $website_tabs_generator;

# Website name, title, main_website_url and description setter
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $diario_names[0].' '.$hyphen_separated_website_language;
	$website_language = $languages_array[0];
	
	$website_title = $diario_names[0];
	$website_title_html = $diario_names[0].': '.$icons[11];
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
	$website_language = $languages_array[0];
}

if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $diario_names[0];

	$website_title = $diario_names[0].' '.$hyphen_separated_website_language;
	$website_title_html = $diario_names[0].': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $diario_names[1].' '.$hyphen_separated_website_language;

	if ($website_language == $ptpt_language) {
		$website_title = $diario_names[1].' '.strtoupper($hyphen_separated_website_language);
	}

	else {
		$website_title = $diario_names[1];
	}

	#$website_title = $diario_names[1].' '.$hyphen_separated_website_language;
	$website_title_html = $website_title.': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
}

# Website Style.php File Includer
require $website_style_file;

?>