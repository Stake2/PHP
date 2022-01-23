<?php 

# Story status text array
$status = array(
"finished",
"writing",
"revising and editing",
"finished and publishing",
);

$status_finished = $status[0];
$status_writing = $status[1];
$status_reviewing_and_editing = $status[2];
$status_finished_and_publishing = $status[3];

$story_statuses_names = array(
"Writing" => Language_Item_Definer("Writing", "Escrevendo"),
"Rewriting" => Language_Item_Definer("Rewriting", "Reescrevendo"),
"Reviewing and Rewriting" => Language_Item_Definer("Reviewing and Rewriting", "Revisando e Reescrevendo"),
"Reviewing" => Language_Item_Definer("Reviewing", "Revisando"),
"Finished and Published" => Language_Item_Definer("Finished and Published", "Completada e Publicada"),
"Finished" => Language_Item_Definer("Finished", "Completada"),
"Paused" => Language_Item_Definer("Paused", "Pausada"),
);

$stories_folder = $mega_stories_folder;
$story_database_folder = $stories_folder."Story Database/";
$story_database_year_folders = $story_database_folder."Year Folders/";

$story_database_file_names = array(
"Authors",
"Background Colors",
"Creation Dates",
"Links",
"Names",
"Number",
"Status",
"Stories To Slice",
"Text Colors",
"Wattpad IDs",
);

$story_database_files = array();

foreach ($story_database_file_names as $file_name) {
	$file = $story_database_folder.$file_name.$dot_text;
	Create_File($file);

	$story_database_files[$file_name] = $story_database_folder.$file_name.$dot_text;
}

$story_names = Read_Lines($story_database_files["Names"]);

foreach ($story_names as $story_name) {
	$local_english_story_name = explode(", ", $story_name)[0];
	$local_portuguese_story_name = explode(", ", $story_name)[1];

	$story_names[$local_english_story_name] = Language_Item_Definer($local_english_story_name, $local_portuguese_story_name);
	$english_story_names[$local_english_story_name] = $local_english_story_name;
	$portuguese_story_names[$local_english_story_name] = $local_portuguese_story_name;
}

$story_website_names_text = Read_Lines($story_database_files["Links"]);

$i = 0;
foreach ($story_website_names_text as $story_website_name) {
	$local_english_story_name = explode(", ", $story_names[$i])[0];
	$local_portuguese_story_name = explode(", ", $story_names[$i])[1];

	$story_website_links[$local_english_story_name] = $main_website_url.str_replace(" ", "%20", Language_Item_Definer($local_english_story_name, $local_portuguese_story_name))."/";

	$i++;
}

$story_backgrounds_text = Read_Lines($story_database_files["Background Colors"]);

$i = 0;
foreach ($story_backgrounds_text as $story_background) {
	$local_english_story_name = explode(", ", $story_names[$i])[0];

	$story_backgrounds[$local_english_story_name] = $story_background;

	$i++;
}

$story_text_colors_text = Read_Lines($story_database_files["Text Colors"]);

$i = 0;
foreach ($story_text_colors_text as $text_color) {
	$local_english_story_name = explode(", ", $story_names[$i])[0];

	$story_text_colors[$local_english_story_name] = $text_color;

	$i++;
}

$story_statuses_text = Read_Lines($story_database_files["Status"]);

$i = 0;
foreach ($story_statuses_text as $local_story_status) {
	$local_english_story_name = explode(", ", $story_names[$i])[0];

	$story_statuses[$local_english_story_name] = $local_story_status;

	if (isset($english_story_name) == True) {
		if ($english_story_name == $local_english_story_name) {
			$story_status = $story_statuses_names[$local_story_status];
		}
	}

	$i++;
}

$chapter_images_text = "Chapter Images";
$other_images_text = "Other Images";

foreach ($english_story_names as $story_name) {
	$story_chapter_images_folder[$story_name] = $website_media_images_website_images.$story_name."/".$chapter_images_text."/";
}

foreach ($english_story_names as $story_name) {
	$other_images_folder[$story_name] = $website_media_images_website_images.$story_name."/".$other_images_text."/";
}

$middle_path = "/".$full_language."/Landscape/Story/Book Cover.png";

foreach ($english_story_names as $local_story_name) {
	$story_covers[$local_story_name] = $website_media_images_story_covers.$local_story_name.$middle_path;
}

# ---------- #

if (isset($story_name) == False) {
	$story_name = "";
}

if (isset($website_story_name) == False) {
	$website_story_name = "";
}

if (isset($story_status) == False) {
	$story_status = "";
}

$title_text = Language_Item_Definer("Title", "Título");
$titles_english_text = "Titles";
$titles_portuguese_text = "Títulos";
$titles_text = Language_Item_Definer($titles_english_text, $titles_portuguese_text);

$story_text = Language_Item_Definer("Story", "História");
$story_text_text = Language_Item_Definer($story_text." ".$text_text, $text_text." ".$of_feminine_text." ".$story_text);
$stories_text = $story_text."s";

$chapter_title_text = Language_Item_Definer("Chapter", "Capítulo");
$chapter_text = mb_strtolower($chapter_title_text);
$chapters_text = $chapter_title_text."s";
$chapter_tab_text = $chapter_text."-text";
$chapter_in_language = $chapters_text." ".$in_text." ".$full_language;

$author_text = Language_Item_Definer("Author of the story", "Autor da história");
$authors_text = Language_Item_Definer("Authors of the story", "Autores da história");
$story_creation_date_text = Language_Item_Definer("Story creation date", "Data de criação da história");
$chapter_written_in_text = $chapter_title_text." ".Language_Item_Definer("written in", "escrito em");
$your_name_text = Language_Item_Definer("Your", "Seu")." ".mb_strtolower($name_text);
$synopsis_text = Language_Item_Definer("Synopsis", "Sinopse");

$english = array(
"finished",
"writing",
"revising and editing",
"finished and publishing",
);

$brazilian_portuguese = array(
"terminada",
"escrevendo",
"revisando e editando",
"terminada e postando",
);

$story_status_texts = Language_Item_Definer($english, $brazilian_portuguese);

$you_are_reading_text = Language_Item_Definer("You are reading", "Você está lendo");

if (isset($website_story_name)) {
	$you_are_reading_story_text = $you_are_reading_text.": ".$website_story_name;
}

$i_read_it_text = Language_Item_Definer("I Read It ✓", "Eu Li ✓");
$i_read_the_chapter_text = Language_Item_Definer("I read the", "Eu li o")." ".$chapter_text;
$read_text = Language_Item_Definer("Read", "Leitura");
$reader_text = Language_Item_Definer("Reader", "Leitor");
$readers_text = Language_Item_Definer($reader_text."s", $reader_text."es");
$thanks_everyone_text = Language_Item_Definer("Thanks everyone", "Obrigado à todos")." 😊 ❤️";
$read_the_chapter_text = Language_Item_Definer("Read the Chapter", "Leu o Capítulo");
$readers_and_reads_folder_text = "Readers and Reads/";
$reads_folder_text = $readers_and_reads_folder_text."Reads/";

$commenter_text = Language_Item_Definer("Commenter", "Comentador");
$commented_on_text = Language_Item_Definer("Commented on", "Comentado em");
$comment_text = Language_Item_Definer("Comment", "Comentário");
$comments_text = $comment_text."s";
$to_comment_text = Language_Item_Definer($comment_text, "Comentar");
$comment_what_you_think_about_the_text = Language_Item_Definer("Comment what you think about the", "Comente o que achou d");
$comment_what_you_think_on_story_text = $comment_what_you_think_about_the_text.Language_Item_Definer(" ".$story_text, "a ".$story_text);
$comment_what_you_think_on_chapter_text = $comment_what_you_think_about_the_text.Language_Item_Definer(" ".$chapter_text, "o ".$chapter_text);
$comment_on_chapter_text = $to_comment_text." ".$on_text." ".$chapter_text;

$comments_english_folder_text = "Comments/";
$chapter_comments_english_folder_text = $comments_english_folder_text."Chapter/";
$website_comments_english_folder_text = $comments_english_folder_text."Website/";

$english = array(
"Write",
"Write the Chapter",
substr("Reading", 0, -8)." ".mb_strtolower("Writing").": ".ucwords($story_name),
);

$write_texts_array = array(
"Escrever",
"Escreva o capítulo",
substr("Lendo", 0, -6)." ".mb_strtolower("Escrevendo").": ".ucwords($story_name),
);

$write_texts_array = Language_Item_Definer($english, $brazilian_portuguese);

$you_are_writing_text = Language_Item_Definer("You are writing", "Você está escrevendo");

if (isset($story_name)) {
	$you_are_writing_story_text = $you_are_writing_text.": ".$story_name;
}

$write_new_chapter_tab_text = Language_Item_Definer("write-new-chapter", "escrever-novo-capítulo");
$write_button_text = Language_Item_Definer("write-button", "botão-de-escrever");

$website_notification_text = Language_Item_Definer("New posted chapter", "Novo capítulo postado");

# Status text definer, that sets the status text with [] around it
$story_status_text = "[".ucfirst($story_status)."]";

$spaceliving_link_name = Language_Item_Definer("SpaceLiving SpaceShip Network", "Rede de EspaçoNaves SpaceLiving");
$the_life_of_littletato_link_name = $story_names["The Life of Littletato"];
$the_story_of_the_bulkan_siblings_link_name = $story_names["The Story of the Bulkan Siblings"];
$read_chapter_text = Language_Item_Definer("read-chapter-[{}]", "ler-capitulo-[{}]");
$website_language_text = Language_Item_Definer_Per_Language("en-us/", "pt-br/", "pt-pt/");
$crossover_next_chapter_text = Language_Item_Definer("This chapter continues here", "Este capítulo continua aqui")." (Crossover)";
$crossover_preivous_chapter_text = Language_Item_Definer("Part one of this chapter", "Parte um deste capítulo")." (Crossover)";

$till_chapter_nine_text = Language_Item_Definer("till chapter nine", "até o capítulo nove");
$chapter_ten_text = Language_Item_Definer("chapter number ten", "capítulo número dez");
$chapter_twenty_six_text = Language_Item_Definer("chapter number twenty-six", "capítulo número vinte e seis");

$chapter_div_text = $chapter_text."-";
$chapter_tab_div_text = $chapter_tab_text."-";

if ($website_info["type"] == $story_website_type) {
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

if (isset($story_website_links["SpaceLiving"])) {
	$crossover_chapter = 10;
	$chapter_link = $story_website_links["SpaceLiving"].$website_language_text."?no-redirect=true&amp;(".$crossover_chapter.")";
	$crossover_next_chapter_text_with_link_spaceliving = $crossover_next_chapter_text.": "."\"".$website_titles["SpaceLiving"]." ".$crossover_chapter." - ".Language_Item_Definer("SpaceTato?", "SpaceNata?")."\"";;

	$span_style = 'style="margin-left:50px;margin-right:50px;"';

	$the_life_of_littletato_spaceliving_chapter_crossover_link = '<div class="w3-animate-zoom"'.
	' onclick="window.open('."'".$chapter_link."'".');">'.
	"<center>"."\n".
	'<h3 class="w3-btn '.$background_blue_css_class." ".$text_black_css_class.' shake_side_to_side_animation" style="border-width:3px;border-color:black;border-style:solid;border-radius:50px;">'."<span ".$span_style.">"."<br />".$crossover_next_chapter_text_with_link_spaceliving."<br /><br />"."</span></h3>"."\n".
	"</center></div>";
}

if (isset($story_website_links["The Life of Littletato"])) {
	$crossover_chapter = 26;
	$chapter_link = $story_website_links["The Life of Littletato"].$website_language_text."?no-redirect=true&amp;(".$crossover_chapter.")";
	$crossover_previous_chapter_text_with_link_the_life_of_littletato = $crossover_preivous_chapter_text.": "."\"".$website_titles["The Life of Littletato"]." ".$crossover_chapter." - ".Language_Item_Definer("LittleLiving?", "PequeLiving?")."\"";

	$spaceliving_the_life_of_littletato_chapter_crossover_link = '<div class="w3-animate-zoom"'.
	' onclick="window.open('."'".$chapter_link."'".');">'.
	"<center>"."\n".
	'<h3 class="w3-btn '.$background_brown_css_class." ".$text_black_css_class.' shake_side_to_side_animation" style="border-width:3px;border-color:black;border-style:solid;border-radius:50px;">'."<span ".$span_style.">"."<br />".$crossover_previous_chapter_text_with_link_the_life_of_littletato."<br /><br />"."</span></h3>"."\n".
	"</center></div>";
}

$website_subdomain_name = "spaceliving";
$normal_link = $https_text.$website_subdomain_name.$netlify_url."/";

$spaceliving_discord_join_link = Language_Item_Definer($normal_link."join_the_discord/", $normal_link."entre_no_discord/");

$the_life_of_littletato_chapter_links = array(Null);

if (isset($story_website_links["The Life of Littletato"])) {
	$i = 1;
	while ($i <= 26) {
		$local_story_name = "the_life_of_littletato";

		$chapter_link = Make_Link($story_website_links["The Life of Littletato"].$website_language_text."?no-redirect=true&amp;(".$i.")", $chapter_twenty_six_text, $text_white_css_class);

		${$local_story_name."_chapter_".$i} = $chapter_link;
		array_push($the_life_of_littletato_chapter_links, $chapter_link);

		$i++;
	}
}

$spaceliving_chapter_links = array(Null);

if (isset($story_website_links["SpaceLiving"])) {
	$i = 1;
	while ($i <= 15) {
		$local_story_name = "spaceliving";

		$chapter_link = Make_Link($story_website_links["SpaceLiving"].$website_language_text."?no-redirect=true&amp;(".$i.")", $till_chapter_nine_text, $text_white_css_class);

		if ($i == 10) {
			$chapter_link = Make_Link($story_website_links["SpaceLiving"].$website_language_text."?no-redirect=true&amp;(".$i.")", $chapter_ten_text, $text_white_css_class);
		}

		${$local_story_name."_chapter_".$i} = $chapter_link;
		array_push($spaceliving_chapter_links, $chapter_link);

		$i++;
	}
}

if ($website_info["type"] == $story_website_type) {
	$middle_text = "<b>".$comments_text." ({}):</b> ".$icons[12];

	$comment_header = $computer_div."<br />".$div_close.
	$mobile_div."<br /><br />".$div_close.
	$computer_div."<".$h2_element.">".$middle_text."</".$h2_element.">".$div_close.
	$mobile_div."<".$h4_element.">".$middle_text."</".$h4_element.">".$div_close.
	"".
	$mobile_div."<br /><br />".$div_close.
	$computer_div."<br /><br />".$div_close.
	$margin;

	$middle_text = "<b>".$read_the_chapter_text." ({}): ✓</b>";

	$readings_header = $computer_div."<br />".$div_close.
	$mobile_div."<br />".$div_close.
	$computer_div."<".$h2_element.">".$middle_text."</".$h2_element.">".$div_close.
	$mobile_div."<".$h4_element.">".$middle_text."</".$h4_element.">".$div_close.
	"".
	$computer_div."<br /><br />".$div_close.
	$mobile_div."<br /><br />".$div_close;
}

$cover_type = "Landscape";

$middle_path = "/".$full_language."/".$cover_type."/Story/Book Cover.png";

# Temporary unset because these stories do not have a website

$array = array(
"To Be Invincible",
"Crystals & Virtual",
"My Little Pony - Rise to Equestria",
"My Little Pony - The Visit of Izaque",
);

foreach ($array as $local_story_name) {
	unset($english_story_names[$local_story_name]);
	unset($portuguese_story_names[$local_story_name]);
	unset($story_names[$local_story_name]);
	unset($story_backgrounds[$local_story_name]);
	unset($story_text_colors[$local_story_name]);
	unset($story_website_links[$local_story_name]);
	unset($story_covers[$local_story_name]);
}

$i = 0;
foreach ($english_story_names as $value) {
	$key = $value;

	$local_story_name = $story_names[$value];

	$background = $story_backgrounds[$key];
	$text_color = $story_text_colors[$key];
	$story_website_link = $story_website_links[$key];
	$story_cover = $story_covers[$key];

	$computer_card = '<a class="w3-btn '.$background_hover_white_css_class.' shake_side_to_side_animation '.$background.'" href="'.$story_website_link.'" '.$roundedborderstyle."><".$h2_element.' class="'.$text_color.' shake_side_to_side_animation"><b style="white-space: break-spaces;">'.$local_story_name.'</b></'.$h2_element.'><img class="'.explode(" ", $background)[1].'" src="'.$story_cover.'" width="650" style="border-radius: 5%;white-space: initial!important;"><br /><br /></a><br />';

	$mobile_card = '<a class="w3-btn '.$background_hover_white_css_class.' shake_side_to_side_animation '.$background.'" href="'.$story_website_link.'" '.$roundedborderstyle."><".$h4_element.' class="'.$text_color.' shake_side_to_side_animation"><b style="white-space: break-spaces;">'.$local_story_name.'</b></'.$h4_element.'><img class="'.explode(" ", $background)[1].'" src="'.$story_cover.'" width="230" style="border-radius: 9%;white-space: initial!important;"><br /><br /></a><br />';

	$story_cards[$key] = Create_Element("div", $computer_variable, $computer_card).Create_Element("div", $mobile_variable, $mobile_card);
}

$stories_number = count($story_cards) - 1;

# ---

$porter_robinson_madeon_shelter_official_video_link_text = Language_Item_Definer("Porter Robinson & Madeon - Shelter (Official Video) (Short Film with A-1 Pictures & Crunchyroll)", "Porter Robinson & Madeon - Shelter (Vídeo Oficial) (Filme curto com A-1 Pictures & Crunchyroll)");
$porter_robinson_madeon_shelter_official_video = Make_Link("https://www.youtube.com/watch?v=fzQ6gRAEoy0", $porter_robinson_madeon_shelter_official_video_link_text, $text_white_css_class, $new_tab = True);

# ---

$littletato_anime_image_link_not_cdn = '<a target="_blank" href="https://static.zerochan.net/Shouin.600.1344153.jpg" class="w3-text-white">https://static.zerochan.net/Shouin.600.1344153.jpg</a>';

$littletato_anime_image_link = $story_chapter_images_folder[$website_titles["The Life of Littletato"]]."Littletato Anime.jpg";
$littletato_anime_image = Make_Linked_Image($littletato_anime_image_link, $is_chapter_image = True, $computer_width = "40", $custom_image_style = Null, $has_space = False, $custom_link = Null);

# ---

$human_the_life_of_littletato_image_link = $story_chapter_images_folder[$website_titles["The Life of Littletato"]]."Human Littletato.jpg";
$human_littletato_image = Make_Linked_Image($human_the_life_of_littletato_image_link, $is_chapter_image = True, $computer_width = "40", $custom_image_style = Null, $has_space = False, $custom_link = Null);

# ---

$lisa_image_link = $story_chapter_images_folder[$website_titles["SpaceLiving"]]."Lisa.jpg";
$lisa_image = Make_Linked_Image($lisa_image_link, $is_chapter_image = True, $computer_width = "40", $custom_image_style = Null, $has_space = False, $custom_link = Null);

# ---

$spaceliving_lonelyship_pixel_art_story_cover_link = $story_chapter_images_folder[$website_titles["SpaceLiving"]]."LonelyShip Story Cover.png";
$spaceliving_lonelyship_pixel_art_story_cover = Make_Linked_Image($spaceliving_lonelyship_pixel_art_story_cover_link, $is_chapter_image = True, $computer_width = "65", $custom_image_style = Null, $has_space = False, $custom_link = Null);

# ---

$spaceliving_lonelyship_pixel_art_front_signboards_link = $story_chapter_images_folder[$website_titles["SpaceLiving"]]."LonelyShip Story Cover Front Signboards.png";
$spaceliving_lonelyship_pixel_art_front_signboards = Make_Linked_Image($spaceliving_lonelyship_pixel_art_front_signboards_link, $is_chapter_image = True, $computer_width = "65", $custom_image_style = Null, $has_space = False, $custom_link = Null);

# ---

$mlp_fim_wikipedia_link_text = Language_Item_Definer("Link to the cartoon page on English Wikipedia", "Link para a página do desenho na Wikipedia Brasileira");

$my_little_pony_fim_wikipedia_link = Make_Link(Language_Item_Definer("https://en.wikipedia.org/wiki/My_Little_Pony:_Friendship_Is_Magic", "https://pt.wikipedia.org/wiki/My_Little_Pony:_A_Amizade_%C3%89_M%C3%A1gica"), $mlp_fim_wikipedia_link_text, $text_white_css_class, $new_tab = True).".)";

# ---

$mansion_of_littletato_and_friends_link = $story_chapter_images_folder[$website_titles["The Life of Littletato"]]."Mansion of Littletato and Friends.png";
$mansion_of_littletato_and_friends = Make_Linked_Image($mansion_of_littletato_and_friends_link, $is_chapter_image = True, $computer_width = "65", $custom_image_style = Null, $has_space = False, $custom_link = Null);;

# ---

$orignal_sharks_frog_party_song_cover_link = $story_chapter_images_folder[$website_titles["SpaceLiving"]]."Orignal Sharks - FROG PARTY Song Cover.jpg";
$orignal_sharks_frog_party_song_cover = Make_Linked_Image($orignal_sharks_frog_party_song_cover_link, $is_chapter_image = True, $computer_width = "65", $custom_image_style = Null, $has_space = False, $custom_link = Null);

$edited_sharks_frog_party_song_cover_link = $story_chapter_images_folder[$website_titles["SpaceLiving"]]."Edited Sharks - FROG PARTY Song Cover.png";
$edited_sharks_frog_party_song_cover = Make_Linked_Image($edited_sharks_frog_party_song_cover_link, $is_chapter_image = True, $computer_width = "65", $custom_image_style = Null, $has_space = False, $custom_link = Null);

# ---

$funky_black_cat_original_picture_link = $story_chapter_images_folder[$website_titles["SpaceLiving"]]."Funky Black Cat Original Profile Picture.png";
$funky_black_cat_original_picture = Make_Linked_Image($funky_black_cat_original_picture_link, $is_chapter_image = True, $computer_width = "65", $custom_image_style = Null, $has_space = False, $custom_link = Null);

# ---

$audacity_blue_bass_waveform_link = $story_chapter_images_folder[$website_titles["SpaceLiving"]]."Audacity Blue Bass Waveform.png";
$audacity_blue_bass_waveform = Make_Linked_Image($audacity_blue_bass_waveform_link, $is_chapter_image = True, $computer_width = "65", $custom_image_style = Null, $has_space = False, $custom_link = Null);

# ---

$bulkan_reference_1_chapter_1 = '<a class="w3-text-white" href="#reference-1-chapter-1">[1]</a>';

$a_name_bulkan_reference_1_chapter_1 = '<a name="reference-1-chapter-1"></a>';

$source_bulkan_reference_1_chapter_1 = Language_Item_Definer("https://www.merriam-webster.com/dictionary/stalker", "https://www.significados.com.br/stalker/");

# ---

$bulkan_reference_1_chapter_3 = '<a href="#reference-1-chapter-3">[1]</a>';

$a_name_bulkan_reference_1_chapter_3 = '<a name="reference-1-chapter-3"></a>';

# ---

$the_link_thing = Make_Link("https://www.youtube.com/watch?v=9o3cEYOxAjs", "Disneys Zootopia - 11 - Work Slowly and Carry a Big Shtick", $text_white_css_class, $new_tab = True);

$text = "(".Language_Item_Definer("This song starts to play here and plays until the end", "Essa música começa a tocar aqui e toca até o final").":<br />";

$zootopia_soundtrack_work_slowly_and_carry_a_big_shtick = $text.$the_link_thing.")";

# ---

$text = Language_Item_Definer("Read more on Wikipedia (Click here)", "Leia mais na Wikipedia (Clique aqui)").".";

$link = Language_Item_Definer("https://en.wikipedia.org/wiki/Tulpa", "https://pt.wikipedia.org/wiki/Tulpa");

$bulkan_wikipedia_chapter_1_tulpa_link = Make_Link($link, $text, $text_white_css_class, $new_tab = True);

# ---

$link = $story_chapter_images_folder[$website_titles["The Secret of the Crystals"]]."Lapis Lazuli.png";

$lapis_lazuli_steven_universe = Make_Linked_Image($link, $is_chapter_image = True, $computer_width = "40", Null, $has_space = False);

$link = $story_chapter_images_folder[$website_titles["The Secret of the Crystals"]]."Humanoid Kódek.jpg";

$ted_humanoid_the_secret_of_the_crystals_image = Make_Linked_Image($link, $is_chapter_image = True, $computer_width = "50", Null, $has_space = False);

$website_spaceliving_linked = $website_link_elements["SpaceLiving"];
$website_spaceliving_linked_alternate = $website_link_elements["SpaceLiving"];
$website_the_life_of_littletato_linked = $website_link_elements["The Life of Littletato"];
$website_the_story_of_the_bulkan_siblings_linked = $website_link_elements["The Story of the Bulkan Siblings"];

?>