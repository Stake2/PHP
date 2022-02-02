<?php 

# Story name definer
$local_website_name = "SpaceLiving";
$website_story_name = $story_names[$local_website_name];
$english_story_name = $english_story_names[$local_website_name];
$portuguese_story_name = $portuguese_story_names[$english_story_name];
$general_story_name = $english_story_name;

# Folder variables
$story_folder = $english_story_name;
$no_language_story_folder = $mega_stories_folder.$story_folder."/";
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Form code for the comment and read forms
$website_form_code = $english_story_name;

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php;

# Story status
$story_status = $status[2];

# Website numbers
$crossover = 9;
$comments_number = 3;
$website_comments_number = 0;
$comments_number_text = $comments_number;

$number_of_chapter_comments = $comments_number_text;

# Text File Reader PHP file includer
require $text_file_reader_file_php;

#$comments_number = $story_comments_check_number - 1;
$readed_number = 5;

# Re-require of the StoryVars.php file to set the story name
require $story_variables_php;

$website_info["image_format"] = "gif";

# Story Details Definer PHP file includer
require $story_details_definer;

# Reads the book cover image directory if the website has book covers
if ($story_website_settings["has_story_covers"] == True) {
	require $cover_images_generator_php;
}

# Buttons and tabs definer
# Tab chapter_titles definer
$tab_titles_prototype = array(
$icons[21],
$icons[20].' ❤️',
" ".$icons[11],
);

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = "";

$custom_tab_titles_array = array(
$chapter_in_language.": ".$website_language_icon,
": ".Create_Element("span", $w3_text_colors["white"]." ".$text_hover_white_css_class, $readers_number)." ".$icons[20]."<br />".$thanks_everyone_text,
": ".Create_Element("span", $w3_text_colors["white"], $stories_number)." ".$icons[11],
);

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$website_settings["use_custom_tab_titles"] = True;

$tab_texts = array();

Make_Button_Names();

$gods_warrior_still_got_something_name = Language_Item_Definer("'Still Got Something' from God's Warrior", "'Still Got Something' do God's Warrior");

$songs = array(
"God's Warrior - Still Got Something" => '<a class="w3-text-white" href="https://www.youtube.com/watch?v=8WYMQbWUxGM">{}</a>',
);

$gods_warrior_still_got_something = format($songs["God's Warrior - Still Got Something"], "'Still Got Something'");
$gods_warrior_still_got_something_link = Make_Link("https://www.youtube.com/watch?v=8WYMQbWUxGM", $gods_warrior_still_got_something_name, $text_white_css_class, $new_tab = True);

$skybreak_mizu_aurora_link = Make_Link("https://www.youtube.com/watch?v=J2P1_v9aFV8", "Skybreak & Mizu - Aurora", $text_white_css_class, $new_tab = True);

$panda_eyes_take_my_hand_ft_azuria_sky_zane_remix = Make_Link("https://www.youtube.com/watch?v=OCIEd71mViM", "Panda Eyes - Take My Hand Ft. Azuria Sky (Z∆NE Remix)", $text_white_css_class, $new_tab = True);

$panda_eyes_opposite_side = Make_Link("https://www.youtube.com/watch?v=e0nay70SaXs", "Panda Eyes - Opposite Side", $text_white_css_class, $new_tab = True);

$tom_and_jerrys_2021_soundtrack_playlist_name = Language_Item_Definer("the soundtrack of the Tom & Jerry movie from 2021", "a trilha sonora do filme Tom e Jerry de 2021");
$tom_and_jerrys_2021_soundtrack_playlist = Make_Link("https://www.youtube.com/playlist?list=PLDisKgcnAC4TkSDGxuPm1DeohG8FMEMNa", $tom_and_jerrys_2021_soundtrack_playlist_name, $text_white_css_class, $new_tab = True);

$link = "https://www.youtube.com/watch?v=cAlTw8szj6Q&list=PLDisKgcnAC4TkSDGxuPm1DeohG8FMEMNa&index=42";
$link = '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/cAlTw8szj6Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br />';

$tom_and_jerry_2021_married_in_the_park = $link;#Make_Link($link, "Tom & Jerry 2021 - Married In The Park", $text_white_css_class, $new_tab = True);

$link = "https://www.youtube.com/watch?v=SCxnA10GOMA&list=PLDisKgcnAC4TkSDGxuPm1DeohG8FMEMNa&index=40";
$link = '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/SCxnA10GOMA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br />';

$tom_and_jerry_2021_the_weddings_off = $link;#Make_Link($link, "Tom & Jerry 2021 - The Wedding's Off", $text_white_css_class, $new_tab = True);

$among_us_trap_remix_by_leonz_link_name = Language_Item_Definer("Among Us Drip Theme Song Original (Among Us Trap Remix / Amogus Meme Music) by Leonz", "Tema musical original drip do Among Us (Remix de Trap do Among Us / Música de Meme do Amogus) por Leonz");
$among_us_trap_remix_by_leonz = Make_Link("https://www.youtube.com/watch?v=grd-K33tOSM", $among_us_trap_remix_by_leonz_link_name, $text_white_css_class, $new_tab = True);

$variable_inserter_array = array(
$porter_robinson_madeon_shelter_official_video,
$gods_warrior_still_got_something,
$skybreak_mizu_aurora_link,
$panda_eyes_take_my_hand_ft_azuria_sky_zane_remix,
$panda_eyes_opposite_side,
$tom_and_jerrys_2021_soundtrack_playlist,
$tom_and_jerry_2021_married_in_the_park,
$tom_and_jerry_2021_the_weddings_off,
$among_us_trap_remix_by_leonz,
$website_the_life_of_littletato_linked,
$website_the_story_of_the_bulkan_siblings_linked,
$website_spaceliving_linked,
$human_littletato_image,
$lisa_image,
$spaceliving_the_life_of_littletato_chapter_crossover_link,
$the_life_of_littletato_chapter_26,
$spaceliving_discord_join_link,
$spaceliving_lonelyship_pixel_art_story_cover,
$spaceliving_lonelyship_pixel_art_front_signboards,
$my_little_pony_fim_wikipedia_link,
$orignal_sharks_frog_party_song_cover,
$edited_sharks_frog_party_song_cover,
$funky_black_cat_original_picture,
$audacity_blue_bass_waveform,
);

$variable_inserter_replacer_array = array(
$gods_warrior_still_got_something_name." ",
"Skybreak & Mizu - Aurora ",
"Panda Eyes - Take My Hand Ft. Azuria Sky (Z∆NE Remix)",
$tom_and_jerrys_2021_soundtrack_playlist_name,
#"Tom & Jerry 2021 - Married In The Park ",
#"Tom & Jerry 2021 - Married In The Park ",
"Panda Eyes - Opposite Side ",
$the_life_of_littletato_link_name." ",
$story_names["SpaceLiving"]." ",
$story_names["The Story of the Bulkan Siblings"]." ",
$chapter_twenty_six_text." ",
);

# Website name, title, URL and description setter, by language
$website_title_text = $general_story_name;
$website_title_header = $general_story_name.": ".$icons[11];

if ($website_language != $language_geral) {
	$website_title_text = $website_story_name." ".$website_title_language;

	$website_title_header = $website_title_text.": ".$icons[11];
}

?>