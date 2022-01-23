<?php 

# Story name definer
$local_story_name = "Diary";
$website_story_name = $story_names[$local_story_name];
$english_story_name = $english_story_names[$local_story_name];
$portuguese_story_name = $portuguese_story_names[$english_story_name];
$general_story_name = $local_story_name." General";

# Folder variables
$story_folder = $english_story_name;
$no_language_story_folder = $mega_stories_folder.$story_folder."/";
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php;

# Website has comments settings
$sitecomments = false;

$span_second_text_color = '<span class="'.$second_text_color.' '.$third_text_color.'">';

$custom_website_descriptions = True;

# Website descriptions
$website_meta_descriptions = array(
Null,
"Website to show my ".$website_story_name." in HTML form, made by ".$multi_persons["Izaque"].".",
"Site para mostrar o meu ".$website_story_name." em forma de HTML, feito por ".$multi_persons["Izaque"]."."
);

$website_header_descriptions = array(
Null,
"Website to show my ".Create_Element("span", "w3-text-white", $website_story_name)." in HTML form, made by ".$multi_persons_painted["Izaque"].".",
"Site para mostrar o meu ".Create_Element("span", "w3-text-white", $website_story_name)." em forma de HTML, feito por ".$multi_persons_painted["Izaque"].".",
);

# Language dependent character names
$nodus_character_name = "Nodus (".Language_Item_Definer("Artificial Intelligence", "Inteligência Artificial").")";
$ted_character_name = "Ted (".Language_Item_Definer("Random Guy", "Cara Aleatório").")";

# Characters array
$characters = array(
$margin_3_h1."\n".$orangespan.'Izaque (Stake2, Funkysnipa Cat):'.$spanc."\n".'</b>'.$h1c."\n",
$margin_3_h1."\n".$bluespan.$nodus_character_name.':'.$spanc."\n".'</b>'.$h1c."\n",
$margin_3_h1."\n".$cyanspan.$ted_character_name.':'.$spanc."\n".'</b>'.$h1c."\n",
);

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

#Website numbers
$blocks_number = 119;

$comments_number = 0;
$comments_number_text = $comments_number + 1;
$number_of_chapter_comments = 0;

$website_form_code = $website_name;
$chapters_text = $english_story_name."-";

$time = "13:15 13/10/2021";
$in_other_words_text = Language_Item_Definer("In other words", "Em outras palavras");

# Texts for the English language
if (in_array($website_language, $en_languages_array)) {
	$diary_blocks_explaining_text = "<br />The ".Create_Element("span", "w3-text-white", $website_story_name)." has ".Create_Element("span", "w3-text-white", $blocks_number)." Blocks written, each Block is a chapter.";
	$charactersdescs = array(
	"\n".'<div style="margin-left:3%;">'."\n".'Me of course xD, my dialogue is shown with:<br />'."\n".
	'[Current time]:<br />"My dialogue"<br /><br />'."\n".
	$in_other_words_text.':<br />'."\n".
	$time.':<br />"My dialogue"<br />'."\n".$div_close."\n",

	"\n".'<div style="margin-left:3%;">'."\n".'My friend "from the future", he is an Artificial Intelligence, and a robot if you will, his dialogue is shown with:<br />'."\n".
	'[Current time]:<br />//His dialogue<br /><br />'."\n".
	$in_other_words_text.':<br />'."\n".
	$time.':<br />//His dialogue<br />'."\n".$div_close."\n",

	"\n".'<div style="margin-left:3%;">'."\n".'A random guy that appears sometimes, his dialogue is shown with:<br />'."\n".
	'[Current time]:<br />~His dialogue<br /><br />'."\n".
	$in_other_words_text.':<br />'."\n".
	$time.':<br />~His dialogue'."\n".$div_close."\n",
	);
}

# Texts for the Brazilian Portuguese language
if (in_array($website_language, $pt_languages_array)) {
	$diary_blocks_explaining_text = "<br />O ".Create_Element("span", "w3-text-white", $website_story_name)." tem ".Create_Element("span", "w3-text-white", $blocks_number)." Blocks escritos, cada Block é um capítulo.";
	$charactersdescs = array(
	"\n".'<div style="margin-left:3%;">'."\n".'Eu, é claro kkkkk, meu diálogo é mostrado com:<br />'."\n".
	'[Hora atual]:<br />"Meu diálogo"<br /><br />'."\n".
	'Em outras palavras:<br />'."\n".
	$time.':<br />"Meu diálogo"'."\n".$div_close."\n",

	"\n".'<div style="margin-left:3%;">'."\n".'Meu amigo "do futuro", ele é uma Inteligência Artificial, e um robô se você quiser, seu diálogo é mostrado com:<br />'."\n".
	'[Hora atual]:<br />//O diálogo dele<br /><br />'."\n".
	'Em outras palavras:<br />'."\n".
	$time.':<br />//O diálogo dele'."\n".$div_close."\n",

	"\n".'<div style="margin-left:3%;">'."\n".'Um cara aleatório que aparece às vezes, seu diálogo é mostrado com ele:<br />'."\n".
	'[Hora atual]:<br />~O diálogo dele<br /><br />'."\n".
	'Em outras palavras:<br />'."\n".
	$time.':<br />~O diálogo dele'."\n".$div_close."\n",
	);
}

# Story Details Definer PHP file includer
require $story_details_definer;

$readed_number = 31;

# Story name and characters text array
$diary_character_descriptions = $margin."\n".
$margin."\n".
'<div style="border-width:0px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".
"\n".'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".$characters[0]."\n".$margin.$charactersdescs[0].$div_close."\n".'<br />'."\n".$div_close."\n"."\n".'<br /><br />'."\n".
"\n".'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".$characters[1]."\n".$margin.$charactersdescs[1].$div_close."\n".'<br />'."\n".$div_close."\n"."\n".'<br /><br />'."\n".
"\n".'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'."\n".$characters[2]."\n".$margin.$charactersdescs[2].$div_close."\n".'<br />'."\n".$div_close."\n"."\n".
$div_close."\n".
$div_close."\n".
$div_close."\n";

$website_settings["variable_inserter"] = False;

# Buttons and tabs definer
# Tab chapter_titles definer
$tab_titles_prototype = array(
$icons_array["open book"],
#$icons[20].' ❤️',
$icons[1],
$icons[12],
);

if ($story_website_settings["show_new_chapter_text"] == True)  {
	$tab_titles_prototype[0] = $tab_titles_prototype[0]." [".$new_text." ".ucwords($chapter_text)." ".$published_blocks."]".$spanc;
}

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = "";

$custom_tab_titles_array = array(
$chapter_in_language.": ".$website_language_icon,
": ".$icons[1],
": ".Create_Element("span", $w3_text_colors["white"], $stories_number)." ".$icons[11],
);

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$website_settings["use_custom_tab_titles"] = True;

$tab_texts = array();

Make_Button_Names();

# Website name, title, URL and description setter, by language
$website_title_text = $general_story_name;
$website_title_header = $general_story_name.': '.$icons[11];

if ($website_language != $language_geral) {
	$website_title_text = $website_story_name;

	$website_title_header = $website_title_text." ".$full_languages_dict[$website_language].': '.$icons[11];

	if ($website_language == $ptpt_language) {
		$website_title_text = $website_story_name." ".strtoupper($website_title_language);
	}

	$website_info["link"] .= $website_link_language."/";
}

$website_custom_button_bar_numbers = array(
0,
1,
2,
3,
);

?>