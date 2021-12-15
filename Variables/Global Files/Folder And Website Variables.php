<?php 

# Website CSS folder
$website_css_folder = $main_website_url."CSS/";
$website_css_website_css_folder = $website_css_folder."Website CSS/";
$website_css_styler_css_folder = $website_css_folder."Styler CSS/";

$website_javascript_folder = $main_website_url."JavaScript/";
$website_function_javascript_folder = $website_javascript_folder."Function/";
$website_story_websites_javascript_folder = $website_javascript_folder."Story Websites/";

# Website Meida Images folder
$website_media_images = $main_website_url."Images/";
$website_media_images_website_icons = $website_media_images."Website Icons/";
$website_media_images_website_images = $website_media_images."Website Images/";
$website_media_images_story_covers = $website_media_images."Story Covers/";

$website_media_audio = $main_website_url."Audio/";
$website_media_website_audio = $website_media_audio."Website Audio/";

$littletato_name = "The Life of Littletato";

$website_media_images_story_covers_array = array(
$littletato_name => $website_media_images_story_covers.$littletato_name."/",
);

# CDN and Website variables
$cdn = $main_website_url."cdn/";
$local_cdn = $mega_folder_stake2_website."cdn/";

$cdnimg = $cdn."img/";
$local_cdn_img = $local_cdn."img/";
$cdn_image_stories = $cdnimg."Stories/";
$cdn_image_drawings = $cdnimg."Drawings/";
$local_cdn_image_drawings = $local_cdn_img."Drawings/";

$cdntxt = $cdn."txt/";
$cdn_text_movie_comments = $cdntxt."Movie Comments/";

$cdnjs = $cdn."js/";
$cdn_css = $cdn."css/";

$my_little_pony_folder = $mega_folder."My Little Pony/";
$my_little_pony_friendship_is_magic_folder = $my_little_pony_folder."Friendship is Magic/";
$mlp_fim_texts_folder = $my_little_pony_friendship_is_magic_folder."Texts - Textos/";
$mlp_fim_feeling_texts_folder = $mlp_fim_texts_folder."Feeling Texts - Textos de Sentimentos/";
$mlp_fim_english_texts_folder = $mlp_fim_texts_folder."English/";
$mlp_fim_portuguese_texts_folder = $mlp_fim_texts_folder."Português Brasileiro/";
$mlp_fim_language_texts_folder = Language_Item_Definer($mlp_fim_english_texts_folder, $mlp_fim_portuguese_texts_folder);
$mlp_fim_episode_list_folder = $mlp_fim_language_texts_folder.Language_Item_Definer("Episode List", "Lista de Episódios")."/";

# Notepad folder variables
$notepad_folder = $mega_folder."Bloco De Notas/";

$notepad_effort_folder = $notepad_folder."Dedicação/";
$notepad_learning_everything_folder = $notepad_effort_folder."Learning Everything - Aprendendo Tudo/";
$notepad_learning_izaque_folder = $notepad_learning_everything_folder."Izaque Sanvezzo/";
$izaque_people_i_know_folder = $notepad_learning_izaque_folder."People that I know - Pessoas que conheço/";
$notepad_izaque_about_me_folder = $notepad_learning_izaque_folder."About me - Sobre mim/";
$notepad_networks_folder = $notepad_effort_folder."Networks/";
$media_networks_database_folder = $notepad_networks_folder."Media Networks Database/";
$networks_text_file = $media_networks_database_folder."Networks.txt";

$notepad_audiovisual_media_network_folder = $notepad_networks_folder.explode("/", Read_Lines($networks_text_file)[0])[0]."/";
$media_info_folder = $notepad_audiovisual_media_network_folder."Media Info/";
$media_info_media_details_folder = $media_info_folder."Media Details/";
$audiovisual_media_network_comment_writer_folder = $notepad_audiovisual_media_network_folder."Comment_Writer/";
$comment_writer_year_comment_numbers_folder = $audiovisual_media_network_comment_writer_folder."Year Comment Numbers/";

$notepad_watch_history_folder = $notepad_audiovisual_media_network_folder."Watch History/";
$notepad_movies_folder = $notepad_watch_history_folder."Movies/";

$watch_history_watched_folder_string = $notepad_watch_history_folder.$watched_string."/{}/";
$diary_folder = $notepad_effort_folder."Diary/";
$diary_folder_chapters = $diary_folder."Chapters/";

$diary_slim_folder = $diary_folder."Slim/";
$diary_slim_database_folder = $diary_slim_folder."Slim Database/";

$mega_stories_folder = $mega_folder."Stories/";
$notepad_years_folder = $notepad_effort_folder."Years/";
$notepad_productive_network_folder = $notepad_effort_folder."Productive Network/";
$notepad_productive_done_folder = $notepad_productive_network_folder."Done/";

$notepad_social_networks_folder = $notepad_effort_folder."Social Networks/";
$notepad_social_networks_years_friends_numbers_folder = $notepad_social_networks_folder."Years Friends Numbers/";

$year_folders = array();

$year_folders = Add_Years_To_Array($year_folders, $mode = "dict", $custom_value = $notepad_years_folder."{}"."/");

$year_language_folders = array();

foreach ($full_languages_array_no_null as $local_language) {
	$year_language_folders[$local_language] = array();
	$year_language_folders[$local_language] = Add_Years_To_Array($year_language_folders[$local_language], $mode = "dict", $custom_value = $notepad_years_folder."{}"."/".$local_language."/");
}

?>