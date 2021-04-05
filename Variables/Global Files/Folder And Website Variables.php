<?php 

# CDN and Website variables
$cdn = $main_website_url.'cdn/';
$local_cdn = $mega_folder_diario.'cdn/';

$cdnimg = $cdn.'img/';
$local_cdn_img = $local_cdn.'img/';
$cdn_image_stories = $cdnimg.'Stories/';
$cdn_image_drawings = $cdnimg.'Drawings/';
$local_cdn_image_drawings = $local_cdn_img.'Drawings/';

$cdn_image_stories_pequenata = $cdn_image_stories.'Pequenata/';
$cdn_image_stories_spaceliving = $cdn_image_stories.'SpaceLiving/';
$cdn_image_stories_nazzevo = $cdn_image_stories.'Nazzevo/';
$cdn_image_stories_desertisland = $cdn_image_stories.'Desert Island/';

$cdntxt = $cdn.'txt/';
$cdn_text_movie_comments = $cdntxt.'Movie Comments/';

$cdnjs = $cdn.'js/';
$cdn_css = $cdn.'css/';

$website_media_images = $main_website_url.'Images/';
$website_media_images_website_icons = $website_media_images.'Website Icons/';
$website_media_images_story_covers = $website_media_images.'Story Covers/';

$website_media_images_story_covers_array = array(
"The Life of Littletato" => $website_media_images_story_covers."The Life of Littletato/",
);

# Notepad folder variables
$notepad_folder = $mega_folder.'Bloco De Notas/';

$notepad_effort_folder = $notepad_folder.'Dedicação/';
$notepad_networks_folder = $notepad_effort_folder.'Networks/';
$notepad_media_network_folder = $notepad_networks_folder.'Media Network/';
$notepad_media_network_comments_folder = $notepad_media_network_folder.'Comentarios/';
$notepad_mdn_movie_comments_folder = $notepad_media_network_comments_folder.'Filmes/';
$notepad_watch_history_folder = $notepad_media_network_folder.'Watch History/';

$diario_folder = $notepad_folder.'Diario/';
$diario_folder_blocks = $diario_folder.'Blocks/';

$notepad_stories_folder = $notepad_effort_folder.'Historias/';
$notepad_years_folder = $notepad_effort_folder.'Anos/';

$notepad_stories_folder_variable = $notepad_stories_folder;
$notepad_years_folder_variable = $notepad_years_folder;
$notepad_effort_folder_variable = $notepad_effort_folder;

$story_files_php_folder = $php_variables.'Story PHP Files/';
$newdesign_php_folder = $php_variables.'New Design/';
$css_packs_php_folder = $php_variables.'CSS Packs/';

$story_php_files_folder_variable = $story_files_php_folder;
$newdesign_php_folder_variable = $newdesign_php_folder;

$websites_tab_folder = $php_tabs.'Websites Tab/';
$websites_tab_folder_variable = $websites_tab_folder;

?>