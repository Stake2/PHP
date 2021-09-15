<?php 

# Story name definer
$text = "Diary";
$website_story_name = $story_names[$text];
$english_story_name = $english_story_names[$text];
$portuguese_story_name = $portuguese_story_names[$english_story_name];
$general_story_name = "Diary";

# Folder variables
$selected_website_url = $story_website_links[$english_story_name];

$story_folder = $english_story_name;
$no_language_story_folder = $mega_stories_folder.$story_folder."/";
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Folder variables
$selected_website_folder = ${"website_folder_".$website_names_array[$selected_website_number]};

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php_variable;

# Website has comments settings
$sitecomments = false;

$span_second_text_color = '<span class="'.$second_text_color.' '.$third_text_color.'">';

$custom_website_descriptions = True;

# Website descriptions
$website_meta_descriptions = array(
Null,
"Website to show my ".$story_name." in HTML form, made by ".$multi_persons["Izaque"].".",
"Site para mostrar o meu ".$story_name." em forma de HTML, feito por ".$multi_persons["Izaque"]."."
);

$website_header_descriptions = array(
Null,
"Website to show my ".Create_Element("span", "w3-text-white", $story_name)." in HTML form, made by ".$multi_persons_painted["Izaque"].".",
"Site para mostrar o meu ".Create_Element("span", "w3-text-white", $story_name)." em forma de HTML, feito por ".$multi_persons_painted["Izaque"].".",
);

# Language dependent character names
$nodus_character_name = "Nodus (".Language_Item_Definer("Artificial Intelligence", "Inteligência Artificial").")";
$ted_character_name = "Ted (".Language_Item_Definer("Random Guy", "Cara Aleatório").")";

# Characters array
$characters = array(
$margin_3_h1."\n".$orangespan.'Izaque (stake2):'.$spanc."\n".'</b>'.$h1c."\n",
$margin_3_h1."\n".$bluespan.$nodus_character_name.':'.$spanc."\n".'</b>'.$h1c."\n",
$margin_3_h1."\n".$cyanspan.$ted_character_name.':'.$spanc."\n".'</b>'.$h1c."\n",
);

# Text File Reader.php file includer
$used_folder = $diario_folder;

require $text_file_reader_file_php;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

#Website numbers
$blocks = 118;
$published_blocks = $diario_blocks_number[0];
$chapters = $published_blocks;

$comments_number = 0;
$comments_number_text = $comments_number + 1;
$number_of_chapter_comments = 0;

# Re require of the VStories.php file to set the story name
require $story_variables_php;

$website_form_code = $website_name;
$chapters_text = $website_form_code.'-';

# Texts for English language
if (in_array($website_language, $en_languages_array)) {
	$diario_blocks_text = 'The '.$story_name.' has ['.$bluespan.$blocks.$spanc.'] blocks written, each block is a chapter.';
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
}

#Texts for Brazilian Portuguese language
if (in_array($website_language, $pt_languages_array)) {
	$diario_blocks_text = 'O '.$story_name.' tem ['.$bluespan.$blocks.$spanc.'] blocks escritos, cada block é um capítulo.';
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

$use_variable_inserter = False;

$tab_texts = array(
$tab_names[0].': '.$icons[21].' '.$span_second_text_color.' ['.$new_text.' '.ucwords($chapter_text).' '.$published_blocks.']'.$spanc,
$tab_names[1].': '.$icons[1],
$tab_names[2].': '.$icons[12],
);

if ($website_has_stories_tab_setting == True) {
	array_push($tab_texts, array_reverse($tab_names)[0].': '.$icons[11]);
}

# Tab Generator.php includer
require $website_tabs_generator;

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = $general_story_name;
$website_title_header = $general_story_name.': '.$icons[11];
$website_link = $selected_website_url;

if ($website_language != $language_geral) {
	$website_title = $website_story_name;

	if ($website_language == $ptpt_language) {
		$website_title = $website_story_name." ".strtoupper($website_title_language);
	}

	$website_title_header = $website_title.': '.$icons[11];
	$website_link .= $website_link_language."/";
}

# Website Style.php File Includer
require $website_style_file;

?>