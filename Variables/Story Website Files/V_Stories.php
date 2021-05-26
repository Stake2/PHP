<?php 

# Stories number
$stories_number = 4;

# Story status text array
$status = array(
'finished',
'writing',
'revising and editing',
'finished and publishing',
);

$status_finished = $status[0];
$status_writing = $status[1];
$status_reviewing_and_editing = $status[2];
$status_finished_and_publishing = $status[3];

if ($website_type == $normal_website_type and $website_name != $website_diario) {
	$story_name = '';
}

if (isset($story_name) == False) {
	$story_name = "";
}

if (isset($story_status) == False) {
	$story_status = "";
}

$littletato_anime_image_link_not_cdn = '<a target="_blank" href="https://static.zerochan.net/Shouin.600.1344153.jpg" class="w3-text-white">https://static.zerochan.net/Shouin.600.1344153.jpg</a>';

$littletato_anime_image_link = $website_media_images_website_images.$website_name_the_life_of_littletato."/Chapter Images/Littletato Anime.jpg";
$littletato_anime_image = Make_Linked_Image($littletato_anime_image_link, $is_chapter_image = True);

# ---

$human_the_life_of_littletato_image_link = $website_media_images_website_images.$website_name_the_life_of_littletato."/Other Images/Human Littletato.jpg";
$human_littletato_image = Make_Linked_Image($human_the_life_of_littletato_image_link, $is_chapter_image = True);

# ---

$lisa_image_link = $website_media_images_website_images.$website_name_spaceliving."/Chapter Images/Lisa.jpg";
$lisa_image = Make_Linked_Image($lisa_image_link, $is_chapter_image = True);

# ---

$titles_enus_text = 'Titles';
$titles_ptbr_text = 'Títulos';
$titles_text = Language_Item_Definer($titles_enus_text, $titles_ptbr_text);

$english = array(
'finished',
'writing',
'revising and editing',
'finished and publishing',
);

$brazilian_portuguese = array(
'terminada',
'escrevendo',
'revisando e editando',
'terminada e postando',
);

$story_status_texts = Language_Item_Definer($english, $brazilian_portuguese);

$english = array(
$reading_text = "You're reading",
$reading_text.': '.ucwords($story_name),
'I Read It ✓',
'I read the Chapter',
'Read the Chapter',
'Readings',
'Readers',
'Reader',
);

$brazilian_portuguese = array(
$reading_text = "Você está lendo",
$reading_text.': '.ucwords($story_name),
'Eu li ✓',
'Eu li o Capítulo',
'Leu o Capítulo',
'Leituras',
'Leitores',
'Leitor',
);

$read_and_reader_texts_array = Language_Item_Definer($english, $brazilian_portuguese);

$i_read_it_text = Language_Item_Definer("I Read It ✓", "Eu Li ✓");
$read_text = Language_Item_Definer("Read", "Leitura");

$english = array(
'Comment',
'Comment',
'Commented',
'in the',
'on',
'Say what you think about the story',
'Say what you think about the chapter',
);

$brazilian_portuguese = array(
'Comentário',
'Comentar',
'Comentado',
'no',
'em',
'Comente o que achou da história',
'Comente o que achou do capítulo',
);

$comments_texts_array = Language_Item_Definer($english, $brazilian_portuguese);
$commenter_text = Language_Item_Definer("Commenter", "Comentador");
$commented_on_text = Language_Item_Definer("Commented on", "Comentado em");
$comment_text = Language_Item_Definer("Comment", "Comentário");

$english = array(
'Write',
'Write the Chapter',
substr($reading_text, 0, -8).' '.strtolower('Writing').': '.ucwords($story_name),
);

$write_texts_array = array(
'Escrever',
'Escreva o capítulo',
substr($reading_text, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story_name),
);

$write_texts_array = Language_Item_Definer($english, $brazilian_portuguese);

$chapters_text = Language_Item_Definer("Chapters", "Capítulos");
$chapter_title_text = Language_Item_Definer("Chapter", "Capítulo");
$in_text = Language_Item_Definer("in", "em");
$chapter_in_language = $chapters_text." ".$in_text." ".$full_language;

# English texts for story websites
if (in_array($website_language, $en_languages_array)) {
	$chapter_text = 'chapter';
	$chapter_tab_text = $chapter_text.'-text';

	$author_text = 'Author of the story';
	$chapter_date_text = 'Story creation date';
	$chapter_date_text_two = ucwords($chapter_text).' written in';

	$person_name_text = 'Name';
	$person_name_text_two = 'Your';
	$send_form_text = 'Send';

	$titletxt = 'Title';
	$story_text_text = 'Story text';
	$time_text = 'Time';
	$stories_text = 'Stories';
	$form_name = 'Name';
	$form_text = 'Form';
	$words_text = "Words";

	$readers_description = 'Thanks everyone ♥';
	$website_notification_text = 'New reviewed chapter';

	$write_new_chapter_tab_text = 'write-new-chapter';
	$write_button_text = 'write-button';

	$story_names_array = array(
	$littletato_story_name = 'The Life of Littletato',
	$spaceliving_story_name = 'SpaceLiving',
	$the_story_of_the_nazzevo_brothers_story_name = 'The Story of the Nazzevo Brothers',
	$desert_island_story_name = 'Desert Island',
	);

	$crossover_next_chapter_text = "This chapter continues here";
}

# Brazilian Portuguese texts for story websites
if (in_array($website_language, $pt_languages_array)) {
	$chapter_text = 'capítulo';
	$chapter_tab_text = 'texto-'.$chapter_text;

	$author_text = 'Autor da história';
	$chapter_date_text = 'Data de criação da história';
	$chapter_date_text_two = ucwords($chapter_text).' escrito em';

	$person_name_text = 'Nome';
	$person_name_text_two = 'Seu';
	$send_form_text = 'Enviar';

	$titletxt = 'Título';
	$story_text_text = 'Texto da história';
	$time_text = 'Tempo';
	$stories_text = 'Histórias';
	$form_name = 'Nome';
	$form_text = 'Formulário';
	$words_text = "Palavras";

	$readers_description = 'Obrigado a todos ♥';
	$website_notification_text = 'Novo capítulo revisado';

	$write_new_chapter_tab_text = 'escrever-novo-capítulo';
	$write_button_text = 'botão-de-escrever';

	$story_names_array = array(
	$littletato_story_name = 'A Vida de Pequenata',
	$spaceliving_story_name = 'SpaceLiving',
	$the_story_of_the_nazzevo_brothers_story_name = 'A História dos Irmãos Nazzevo',
	$desert_island_story_name = 'Ilha Deserta',
	);
}

# Status text definer, that sets the status text with [] around it
$story_status_text = '['.ucfirst($story_status).']';

$spaceliving_link_name = Language_Item_Definer("SpaceLiving SpaceShip Network", "Rede de EspaçoNaves SpaceLiving");
$the_life_of_littletato_link_name = Language_Item_Definer("The Life of Littletato", "A Vida de Pequenata");
$the_story_of_the_nazzevo_brothers_link_name = Language_Item_Definer("The Story of the Nazzevo Brothers", "A História dos Irmãos Nazzevo");
$read_chapter_text = Language_Item_Definer("read-chapter-[{}]", "ler-capitulo-[{}]");
$website_language_text = Language_Item_Definer_Per_Language("en-us/", "pt-br/", "pt-pt/");
$crossover_next_chapter_text = Language_Item_Definer("This chapter continues here", "Este capítulo continua aqui")." (Crossover)";
$crossover_preivous_chapter_text = Language_Item_Definer("Part one of this chapter", "Parte um deste capítulo")." (Crossover)";
$reader_text = Language_Item_Definer("Reader", "Leitor");

$readers_and_reads_folder_text = "Readers and Reads/";
$reads_folder_text = $readers_and_reads_folder_text."Reads/";

$comments_english_folder_text = "Comments/";
$chapter_comments_english_folder_text = $comments_english_folder_text."Chapter/";
$website_comments_english_folder_text = $comments_english_folder_text."Website/";

$till_chapter_nine_text = Language_Item_Definer("till chapter nine", "até o capítulo nove");
$chapter_ten_text = Language_Item_Definer("chapter number ten", "capítulo número dez");
$chapter_twenty_six_text = Language_Item_Definer("chapter number twenty-six", "capítulo número vinte e seis");

$chapter_div_text = $chapter_text.'-';
$chapter_tab_div_text = $chapter_tab_text.'-';

if ($website_type == $story_website_type) {
	# Story status definer
	if ($story_status == $status[0]) {
		$story_status = $story_status_texts[0];
	}
	
	if ($story_status == $status[1]) {
		$story_status = $story_status_texts[1];
	}
	
	if ($story_status == $status[2]) {
		$story_status = $story_status_texts[2];
	}
	
	if ($story_status == $status[3]) {
		$story_status = $story_status_texts[3];
	}
}

if (isset($website_spaceliving_link)) {
	$crossover_chapter = 10;
	$chapter_link = $website_spaceliving_link.$website_language_text.'?no-redirect=true&amp;('.$crossover_chapter.")";
	$crossover_next_chapter_text_with_link_spaceliving = $crossover_next_chapter_text.": ".$chapter_link;

	$span_style = 'style="margin-left:50px;margin-right:50px;"';

	$the_life_of_littletato_spaceliving_chapter_crossover_link = '<div class="w3-animate-zoom" onclick="window.open('."'".$chapter_link."'".');" ><center><h3 class="w3-btn '.$background_blue_css_class.' '.$text_black_css_class.' shake_side_to_side_animation" style="border-width:3px;border-color:black;border-style:solid;border-radius:50px;"><span '.$span_style.'><br />'.$crossover_next_chapter_text.': '.$website_spaceliving_link.$crossover_chapter.'/<br /><br /></span></h3></center></div>';
}

if (isset($website_the_life_of_littletato_link)) {
	$crossover_chapter = 26;
	$chapter_link = $website_the_life_of_littletato_link.$website_language_text.'?no-redirect=true&amp;('.$crossover_chapter.")";
	$crossover_previous_chapter_text_with_link_the_life_of_littletato = $crossover_preivous_chapter_text.": ".$chapter_link;

	$spaceliving_the_life_of_littletato_chapter_crossover_link = '<div class="w3-animate-zoom" onclick="window.open('."'".$chapter_link."'".');" ><center><h3 class="w3-btn '.$background_brown_css_class.' '.$text_black_css_class.' shake_side_to_side_animation" style="border-width:3px;border-color:black;border-style:solid;border-radius:50px;"><span '.$span_style.'>'.$crossover_preivous_chapter_text.': '.$website_the_life_of_littletato_link.$crossover_chapter.'/</span></h3></center></div>';
}

$website_subdomain_name = "spaceliving";
$normal_link = $https_text.$website_subdomain_name.$netlify_url."/";

$spaceliving_discord_join_link = Language_Item_Definer($normal_link."join_the_discord/", $normal_link."entre_no_discord/");

$the_life_of_littletato_chapter_links = array(Null);

if (isset($website_the_life_of_littletato_link)) {
	$i = 1;
	while ($i <= 26) {
		$local_story_name = "the_life_of_littletato";

		$chapter_link = Make_Link($website_the_life_of_littletato_link.$website_language_text.'?no-redirect=true&amp;('.$i.")", $chapter_twenty_six_text, $text_white_css_class);

		${$local_story_name."_chapter_".$i} = $chapter_link;
		array_push($the_life_of_littletato_chapter_links, $chapter_link);

		$i++;
	}
}

$spaceliving_chapter_links = array(Null);

if (isset($website_spaceliving_link)) {
	$i = 1;
	while ($i <= 15) {
		$local_story_name = "spaceliving";

		$chapter_link = Make_Link($website_spaceliving_link.$website_language_text.'?no-redirect=true&amp;('.$i.")", $till_chapter_nine_text, $text_white_css_class);

		if ($i == 10) {
			$chapter_link = Make_Link($website_spaceliving_link.$website_language_text.'?no-redirect=true&amp;('.$i.")", $chapter_ten_text, $text_white_css_class);
		}

		${$local_story_name."_chapter_".$i} = $chapter_link;
		array_push($spaceliving_chapter_links, $chapter_link);

		$i++;
	}
}

# Story names array
$stories = array(
$littletato_story_name,
$spaceliving_story_name,
$the_story_of_the_nazzevo_brothers_story_name,
$desert_island_story_name,
);

# Story folders array
$story_folders_array = array(
$the_life_of_littletato_story_folder = 'The Life of Littletato',
$spaceliving_story_folder = 'SpaceLiving',
$nazzevo_story_folder = 'The Story of the Nazzevo Brothers',
$desert_island_story_folder = 'Desert Island',
);

if ($website_type == $story_website_type) {
	$comment_header = $computer_div.'<br />'.$div_close.
	$mobile_div.'<br /><br />'.$div_close.
	$computer_div.'<'.$n.'><b>'.$comments_texts_array[0].'s:</b> '.$icons[12].'</'.$n.'>'.$div_close.
	$mobile_div.'<'.$m.'><b>'.$comments_texts_array[0].'s:</b> '.$icons[12].'</'.$m.'>'.$div_close.
	''.
	$mobile_div.'<br /><br />'.$div_close.
	$computer_div.'<br /><br />'.$div_close.
	$margin;
	
	$readings_header = $computer_div.'<br />'.$div_close.
	$mobile_div.'<br />'.$div_close.
	$computer_div.'<'.$n.'><b>'.$read_and_reader_texts_array[5].': ✓</b></'.$n.'>'.$div_close.
	$mobile_div.'<'.$m.'><b>'.$read_and_reader_texts_array[5].': ✓</b></'.$m.'>'.$div_close.
	''.
	$computer_div.'<br /><br />'.$div_close.
	$mobile_div.'<br /><br />'.$div_close;
}

$cover_type = "Landscape";

$middle_path = "/".$full_language."/".$cover_type."/Story/Book Cover.png";

$littletato_border = $border_4px_solid_dark_brown_css_class;
$littletato_background = $background_brown_css_class." ".$littletato_border.' shake_side_to_side_animation';
$littletato_text = $text_dark_brown_css_class.' shake_side_to_side_animation';
$littletato_link = $main_website_url.'pequenata/';

$nazzevo_border = $border_4px_solid_dark_brown_css_class;
$nazzevo_background = $background_brown_css_class." ".$nazzevo_border.' shake_side_to_side_animation';
$nazzevo_text = $text_dark_brown_css_class.' shake_side_to_side_animation';
$nazzevo_link = $main_website_url.'nazzevo/';

$spaceliving_border = $border_4px_solid_blue_css_class;
$spaceliving_background = $background_dark_blue_css_class." ".$spaceliving_border.' shake_side_to_side_animation';
$spaceliving_text = $text_blue_css_class.' shake_side_to_side_animation';
$spaceliving_link = $main_website_url.'new_world/spaceliving/';

$desert_island_border = $border_4px_solid_blue_css_class;
$desert_island_background = $background_green_water_css_class." ".$desert_island_border.' shake_side_to_side_animation';
$desert_island_text = $text_dark_green_water_css_class;
$desert_island_new_link = str_replace(' ', '_', strtolower($website_desert_island));
$desert_island_link = $main_website_url.$desert_island_new_link.'/';

$cover_text = 'Covers';
$story_book_cover_filename = 'Book Cover';

$the_life_of_littletato_image_link = $website_media_images_story_covers.$the_life_of_littletato_story_folder.$middle_path;
$nazzevo_image_link = $website_media_images_story_covers.$nazzevo_story_folder.$middle_path;
$spaceliving_image_link = $website_media_images_story_covers.$spaceliving_story_folder.$middle_path;
$desert_island_image_link = $website_media_images_story_covers.$desert_island_story_folder.$middle_path;

$size_variable = $n;
$border_radius_variable = "5";
$story_image_style = 'border-radius: '.$border_radius_variable.'%;';
$story_text_style = 'white-space: initial!important;';

$littletato_story_card_computer = '<a class="w3-btn '.$background_hover_white_css_class.' '.$littletato_background.'" href="'.$littletato_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$littletato_text.'"><b style="white-space: break-spaces;">'.$stories[0].'</b></'.$size_variable.'><img class="'.$littletato_border.'" src="'.$the_life_of_littletato_image_link.'"  width="650" style="'.$story_image_style.'"><br /><br /></a><br />';

$spaceliving_story_card_computer = '<a class="w3-btn '.$background_hover_white_css_class.' '.$spaceliving_background.'" href="'.$spaceliving_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$spaceliving_text.'"><b style="white-space: break-spaces;">'.$stories[1].'</b></'.$size_variable.'><img class="'.$spaceliving_border.'" src="'.$spaceliving_image_link.'" width="650" style="'.$story_image_style.'"><br /><br /></a><br />';

$nazzevo_story_card_computer = '<a class="w3-btn '.$background_hover_white_css_class.' '.$nazzevo_background.'" href="'.$nazzevo_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$nazzevo_text.'"><b>'.$stories[2].'</b></'.$size_variable.'><img class="'.$nazzevo_border.'" src="'.$nazzevo_image_link.'" width="650" style="'.$story_image_style.'"><br /><br /></a><br />';

$desert_island_story_card_computer = '<a class="w3-btn '.$background_hover_white_css_class.' '.$desert_island_background.'" href="'.$desert_island_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$desert_island_text.'"><b>'.$desert_island_story_name.'</b></'.$size_variable.'><img class="'.$desert_island_border.'" src="'.$desert_island_image_link.'" width="650" style="'.$story_image_style.'"><br /><br /></a><br />';

$size_variable = $m;
$border_radius_variable = "9";
$story_image_style = 'border-radius: '.$border_radius_variable.'%;white-space: initial!important;';
$littletato_story_card_mobile = '<a class="w3-btn '.$background_hover_white_css_class.' '.$littletato_background.'" href="'.$littletato_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$littletato_text.'"><b style="white-space: break-spaces;">'.$stories[0].'</b></'.$size_variable.'><img class="'.$littletato_border.'" src="'.$the_life_of_littletato_image_link.'" width="230" height="170" style="'.$story_image_style.'"><br /><br /></a><br />';

$spaceliving_story_card_mobile = '<a class="w3-btn  '.$background_hover_white_css_class.' '.$spaceliving_background.'" href="'.$spaceliving_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$spaceliving_text.'"><b style="white-space: break-spaces;">'.$stories[1].'</b></'.$size_variable.'><img class="'.$spaceliving_border.'" src="'.$spaceliving_image_link.'" width="230" height="170" style="'.$story_image_style.'"><br /><br /></a><br />';

$nazzevo_story_card_mobile = '<a class="w3-btn '.$background_hover_white_css_class.' '.$nazzevo_background.'" href="'.$nazzevo_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$nazzevo_text.'"><b class="'.$story_text_style.'">'.$stories[2].'</b></'.$m.'><img class="'.$nazzevo_border.'" src="'.$nazzevo_image_link.'" width="230" height="170" style="'.$story_image_style.'"><br /><br /></a><br />';

$desert_island_story_card_mobile = '<a class="w3-btn '.$background_hover_white_css_class.' '.$desert_island_background.'" href="'.$desert_island_link.'" '.$roundedborderstyle.'><'.$size_variable.' class="'.$desert_island_text.'"><b>'.$desert_island_story_name.'</b></'.$size_variable.'><img class="'.$desert_island_border.'" src="'.$desert_island_image_link.'" width="230" style="'.$story_image_style.'"><br /><br /></a><br />';

$story_cards_computer = "\n".
$littletato_story_card_computer."<br />"."\n"."\n".
$spaceliving_story_card_computer."<br />"."\n"."\n".
$nazzevo_story_card_computer."<br />"."\n"."\n".
$desert_island_story_card_computer."\n";

$story_cards_mobile = "\n".
$littletato_story_card_mobile."<br />"."\n"."\n".
$spaceliving_story_card_mobile."<br />"."\n"."\n".
$nazzevo_story_card_mobile."<br />"."\n"."\n".
$desert_island_story_card_mobile."\n";

?>