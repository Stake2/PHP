<?php 

# Website CSS folder
$website_css_folder = $main_website_url."CSS/";
$website_css_website_css_folder = $website_css_folder."Website CSS/";
$website_css_styler_css_folder = $website_css_folder."Styler CSS/";

$website_javascript_folder = $main_website_url."JavaScript/";
$website_function_javascript_folder = $website_javascript_folder."Function/";
$website_story_websites_javascript_folder = $website_javascript_folder."Story Websites/";

# Website Meida Images folder
$website_media_images = $main_website_url.'Images/';
$website_media_images_website_icons = $website_media_images.'Website Icons/';
$website_media_images_website_images = $website_media_images.'Website Images/';
$website_media_images_story_covers = $website_media_images.'Story Covers/';

$littletato_name = "The Life of Littletato";

$website_media_images_story_covers_array = array(
$littletato_name => $website_media_images_story_covers.$littletato_name."/",
);

# CDN and Website variables
$cdn = $main_website_url.'cdn/';
$local_cdn = $mega_folder_stake2_website.'cdn/';

$cdnimg = $cdn.'img/';
$local_cdn_img = $local_cdn.'img/';
$cdn_image_stories = $cdnimg.'Stories/';
$cdn_image_drawings = $cdnimg.'Drawings/';
$local_cdn_image_drawings = $local_cdn_img.'Drawings/';

$cdn_image_stories_pequenata = $cdn_image_stories.'Pequenata/';
$cdn_image_stories_spaceliving = $cdn_image_stories.'SpaceLiving/';
$cdn_image_stories_nazzevo = $cdn_image_stories.'Nazzevo/';
#$cdn_image_stories_desertisland = $cdn_image_stories.'Desert Island/';

$cdntxt = $cdn.'txt/';
$cdn_text_movie_comments = $cdntxt.'Movie Comments/';

$cdnjs = $cdn.'js/';
$cdn_css = $cdn.'css/';

# Notepad folder variables
$notepad_folder = $mega_folder.'Bloco De Notas/';

$notepad_effort_folder = $notepad_folder.'Dedicação/';
$notepad_networks_folder = $notepad_effort_folder.'Networks/';
$notepad_media_network_folder = $notepad_networks_folder.'Media Network/';
$notepad_media_network_comments_folder = $notepad_media_network_folder.'Comentarios/';
$notepad_mdn_movie_comments_folder = $notepad_media_network_comments_folder.'Filmes/';
$notepad_watch_history_folder = $notepad_media_network_folder.'Watch History/';
$notepad_to_watch_folder = $notepad_watch_history_folder.'To Watch/';
$notepad_movies_folder = $notepad_watch_history_folder.'Movies/';
$watched_string = "Watched";
$current_year_watched_folder = $notepad_watch_history_folder.$watched_string.'/'.$current_year.'/';

$diario_folder = $notepad_effort_folder.'Diario/';
$diario_folder_blocks = $diario_folder.'Blocks/';

$notepad_stories_folder = $notepad_effort_folder.'Historias/';
$notepad_years_folder = $notepad_effort_folder.'Anos/';

$notepad_stories_folder_variable = $notepad_stories_folder;
$notepad_years_folder_variable = $notepad_years_folder;
$notepad_effort_folder_variable = $notepad_effort_folder;

?>