<?php 

# Folder variables
$no_language_story_folder = $diary_chapters_folder;
$local_chapters_folder = $diary_chapters_folder;
$chapter_titles_folder = $diary_chapter_titles_folder;
$story_chapter_files_folder_language = $local_chapters_folder;
$chapter_titles_file = $diary_chapter_titles_folder."Títulos.txt";
$chapter_titles_en_file = $chapter_titles_file;

$span_second_text_color = '<span class="'.$second_text_color." ".$third_text_color.'">';

$custom_website_descriptions = True;

$english_template = "Website to show my {} in HTML form, made by {}.";
$portuguese_template = "Site para mostrar o meu ".$website_story_name." em forma de HTML, feito por {}.";
$span_website_name = Create_Element("span", "w3-text-white", $website_story_name);

# Website descriptions
$website_descriptions = array(
	Null,
	format($english_template, array($website_story_name, $multi_persons["Izaque"])),
	format($portuguese_template, array($website_story_name, $multi_persons["Izaque"])),
);

$website_header_descriptions = array(
	Null,
	format($english_template, array($span_website_name, $multi_persons_painted["Izaque"])),
	format($portuguese_template, array($span_website_name, $multi_persons_painted["Izaque"])),
);

# Language dependent presenter names
$nodus_name = "Nodus (".Language_Item_Definer("Artificial Intelligence", "Inteligência Artificial").")";
$ted_name = "Ted (".Language_Item_Definer("Random Guy", "Cara Aleatório").")";

# Characters array
$presenters = array(
	$margin_3_h1."\n".$person_names_painted["Izaque"]."\n".'</b>'.$h1c."\n",
	$margin_3_h1."\n".$bluespan.$nodus_name.':'.$spanc."\n".'</b>'.$h1c."\n",
	$margin_3_h1."\n".$cyanspan.$ted_name.':'.$spanc."\n".'</b>'.$h1c."\n",
);

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

$time = "01:10 20/10/2022";
$my_dialogue_text = Language_Item_Definer("My dialogue", "Meu diálogo");
$his_dialogue_text = Language_Item_Definer("His dialogue", "Diálogo dele");

# Texts for the English language
if (in_array($website_information["language"], $en_languages_array)) {
	$diary_blocks_explaining_text = "<br />The ".Create_Element("span", "w3-text-white", $website_story_name)." has ".Create_Element("span", "w3-text-white", $story_info["chapter_number"])." Blocks written, each Block is a chapter.";

	$presenter_descriptions = array(
		"\n".'<div style="margin-left:3%;">'."\n".'Me of course xD, my dialogue is shown with:<br />'."\n".
		"<br />"."\n".
		'[Current time]:<br />
		'.$my_dialogue_text.'.<br />'.
		'<br />'."\n".
		$time.':<br />'.
		'"My dialogue"<br />'.
		"\n".$div_close."\n",

		"\n".'<div style="margin-left:3%;">'."\n".'My friend "from the future", he is an Artificial Intelligence, his dialogue is shown with:'.
		'<br />'."\n".
		"<br />"."\n".
		'[Current time]:<br />'.
		'//His dialogue<br />'.
		'<br />'."\n".
		$time.':<br />'.
		'//His dialogue<br />'.
		"\n".$div_close."\n",

		"\n".'<div style="margin-left:3%;">'."\n".'A random guy that appears sometimes, his dialogue is shown with:<br />'."\n".
		"<br />"."\n".
		'[Current time]:<br />'.
		'~His dialogue<br />'.
		'<br />'."\n".
		$time.':<br />'.
		'~His dialogue'.
		"\n".$div_close."\n",
	);
}

# Texts for the Brazilian Portuguese language
if (in_array($website_information["language"], $pt_languages_array)) {
	$diary_blocks_explaining_text = "<br />O ".Create_Element("span", "w3-text-white", $website_story_name)." tem ".Create_Element("span", "w3-text-white", $story_info["chapter_number"])." Blocks escritos, cada Block é um capítulo.";

	$presenter_descriptions = array(
		"\n".'<div style="margin-left:3%;">'."\n".'Eu, é claro kkkkk, meu diálogo é mostrado com:<br />'."\n".
		"<br />"."\n".
		'[Hora atual]:<br />"'.$my_dialogue_text.'"<br /><br />'."\n".
		$time.':<br />"Meu diálogo"'."\n".$div_close."\n",

		"\n".'<div style="margin-left:3%;">'."\n".'Meu amigo "do futuro", ele é uma Inteligência Artificial, seu diálogo é mostrado com:<br />'."\n".
		"<br />"."\n".
		'[Hora atual]:<br />//O diálogo dele<br /><br />'."\n".
		$time.':<br />//O diálogo dele'."\n".$div_close."\n",

		"\n".'<div style="margin-left:3%;">'."\n".'Um cara aleatório que aparece às vezes, seu diálogo é mostrado com ele:<br />'."\n".
		"<br />"."\n".
		'[Hora atual]:<br />~O diálogo dele<br /><br />'."\n".
		$time.':<br />~O diálogo dele'."\n".$div_close."\n",
	);
}

$diary_blocks_explaining_text .= "<br />";

# Story Details Definer PHP file includer
require $story_details_definer;

# Story name and presenters text array
$diary_presenter_descriptions = $margin."\n".
$margin."\n".
'<div style="border-width:0px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".
"\n".'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".$presenters[0]."\n".$margin.$presenter_descriptions[0].$div_close."\n".'<br />'."\n".$div_close."\n"."\n".'<br /><br />'."\n".
"\n".'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".$presenters[1]."\n".$margin.$presenter_descriptions[1].$div_close."\n".'<br />'."\n".$div_close."\n"."\n".'<br /><br />'."\n".
"\n".'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".$presenters[2]."\n".$margin.$presenter_descriptions[2].$div_close."\n".'<br />'."\n".$div_close."\n"."\n".
$div_close."\n".
$div_close."\n".
$div_close."\n";

# Buttons and tabs definer
# Tab chapter_titles definer
$tab_titles_prototype = array(
	$icons_array["open book"],
	$icons[1],
	$icons[12],
);

if ($story_website_settings["show_new_chapter_text"] == True)  {
	$tab_titles_prototype[0] = $tab_titles_prototype[0]." [".$new_text." ".ucwords($chapter_text)." ".$published_blocks."]".$spanc;
}

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = "";

$custom_tab_titles = array(
	$chapter_in_language.": ".$website_language_icon,
	": ".$icons[1],
	": ".Create_Element("span", $w3_text_colors["white"], $stories_number)." ".$icons[11],
);

$custom_tab_titles = Mix_Arrays($custom_tab_names, $custom_tab_titles, $left_or_right = "right");

$tab_texts = array();

Make_Button_Names();

$website_custom_button_bar_numbers = array(
	0,
	1,
	2,
	3,
);

# Website name, title, URL and description setter, by language
$website_information["language_title"] = $website_story_name;
$website_information["language_title_with_icon"] = $website_information["language_title"].": ".$icons[11];

?>