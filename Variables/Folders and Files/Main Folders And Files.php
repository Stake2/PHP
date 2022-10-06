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

$website_media_texts = $main_website_url."Texts/";
$websites_list_text_files = $website_media_texts."Websites List/";

$website_media_texts_local = $mega_folder_stake2_website."Texts/";
$websites_list_text_files_local = $website_media_texts_local."Websites List/";

$website_media_audio = $main_website_url."Audio/";
$website_media_website_audio = $website_media_audio."Website Audio/";

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

$notepad_folder = $mega_folder."Bloco De Notas/";

$notepad_effort_folder = $notepad_folder."Dedicação/";
$notepad_learning_everything_folder = $notepad_effort_folder."Learning Everything - Aprendendo Tudo/";
$notepad_learning_izaque_folder = $notepad_learning_everything_folder."Izaque Sanvezzo/";
$izaque_people_i_know_folder = $notepad_learning_izaque_folder."People that I know - Pessoas que conheço/";
$notepad_izaque_about_me_folder = $notepad_learning_izaque_folder."About me - Sobre mim/";
$notepad_networks_folder = $notepad_effort_folder."Networks/";
$media_networks_database_folder = $notepad_networks_folder."Media Networks Database/";
$productive_network_folder = $notepad_networks_folder."Productive Network/";
$networks_text_file = $media_networks_database_folder."Networks.txt";

$diary_folder = $notepad_effort_folder."Diary/";
$diary_chapters_folder = $diary_folder."Chapters/";
$diary_chapter_titles_folder = $diary_chapters_folder."Títulos/";

$diary_slim_folder = $notepad_effort_folder."Diary Slim/";
$diary_slim_database_folder = $diary_slim_folder."Slim Database/";

$mega_stories_folder = $mega_folder."Stories/";
$story_database_folder = $mega_stories_folder."Story Database/";
$notepad_years_folder = $notepad_effort_folder."Years/";
$notepad_productive_network_folder = $notepad_effort_folder."Productive Network/";
$notepad_productive_done_folder = $notepad_productive_network_folder."Done/";

$notepad_social_networks_folder = $notepad_effort_folder."Social Networks/";
$notepad_social_networks_years_friends_numbers_folder = $notepad_social_networks_folder."Years Friends Numbers/";

$my_little_pony_folder = $mega_folder."My Little Pony/";
$my_little_pony_friendship_is_magic_folder = $my_little_pony_folder."Friendship is Magic/";
$mlp_fim_texts_folder = $my_little_pony_friendship_is_magic_folder."Texts - Textos/";
$mlp_fim_feeling_texts_folder = $mlp_fim_texts_folder."Feeling Texts - Textos de Sentimentos/";
$mlp_fim_english_texts_folder = $mlp_fim_texts_folder."English/";
$mlp_fim_portuguese_texts_folder = $mlp_fim_texts_folder."Português Brasileiro/";

# Notepad folder variables
$notepad_audiovisual_media_network_folder = $notepad_networks_folder.explode("/", explode("\n", fread(fopen($networks_text_file, "r", 'UTF-8'), filesize($networks_text_file)))[0])[0]."/";
$media_info_folder = $notepad_audiovisual_media_network_folder."Media Info/";
$media_info_media_details_folder = $media_info_folder."Media Details/";
$audiovisual_media_network_comment_writer_folder = $notepad_audiovisual_media_network_folder."Comment_Writer/";
$comment_writer_year_comment_numbers_folder = $audiovisual_media_network_comment_writer_folder."Year Comment Numbers/";

$notepad_watch_history_folder = $notepad_audiovisual_media_network_folder."Watch History/";
$notepad_movies_folder = $notepad_watch_history_folder."Movies/";

$watch_history_watched_folder_string = $notepad_watch_history_folder."Watched/{}/";

# "Variables" folder folders
$functions_folder = $php_folder_variables."Functions/";
$website_php_files_folder = $php_folder_variables."Website PHP Files/";
$websites_list_folder = $website_php_files_folder."Websites List/";
$website_tool_files_folder = $php_folder_variables."Website Tool Files/";
$websites_tab_folder = $website_php_files_folder."Websites Tab/";
$raintpl_folder = $php_folder_variables."RainTPL/";
$raintpl_class_folder = $raintpl_folder."Classes/";
$raintpl_loader = $raintpl_folder."Loader.php";

# Story Website Files
$story_website_files_folder = $php_folder_variables."Story Website Files/";
$story_reading_files_folder = $story_website_files_folder."Reading Files/";
$story_comments_files_folder = $story_website_files_folder."Comment Files/";
$chapter_files_folder = $story_website_files_folder."Chapter Files/";
$story_tab_templates_folder = $story_website_files_folder."Tab Templates/";
$story_api_folder = $story_website_files_folder."API/";

$stories_tab_template = $story_tab_templates_folder."Stories.php";
$story_variables_php = $story_website_files_folder."V_Stories.php";
$story_details_definer = $story_website_files_folder."Story Details Definer.php";

$chapter_tab_generator = $chapter_files_folder."Tab Generator.php";
$chapter_button_generator_php = $chapter_files_folder."Button Generator.php";
$chapter_tab_content_generator = $chapter_files_folder."Tab Content Generator.php";
$chapter_text_displayer_php = $chapter_files_folder."Text Displayer.php";

$cover_images_generator_php = $story_website_files_folder."Cover Images Generator.php";
$cover_images_folder_definer_php = $story_website_files_folder."Cover Images Folder Definer.php";
$open_chapter_script_php = $chapter_files_folder."Open Chapter Script.php";

$chapter_comment_and_read_displayer_php = $story_website_files_folder."Comment And Reading Cards Displayer.php";
$reading_card_generator = $story_reading_files_folder."Reading Card Generator.php";
$read_modal_generator_php = $story_reading_files_folder."Modal Generator.php";
$comment_card_generator = $story_comments_files_folder."Comment Card Generator.php";
$comment_modal_generator_php = $story_comments_files_folder."Modal Generator.php";

# Functions PHP Files
$crucial_functions_file_php = $functions_folder."Crucial Functions.php";
$normal_functions_file_php = $functions_folder."Normal Functions.php";

# Global Files
$main_arrays_php = $global_files_folder."Main Arrays.php";
$global_arrays_php = $global_files_folder."Global Arrays.php";
$global_style_file_php = $global_files_folder."Global Style.php";

# Website PHP Files
$website_php_url_format_file = $website_php_files_folder."PHP URL Format.txt";
$html_colors_file = $website_php_files_folder."HTML Colors.txt";
$website_language_definer_php = $website_php_files_folder."Language Definer.php";
$website_arrays_generator_php = $website_php_files_folder."Websites Array Generator.php";
$website_style_chooser_file = $website_php_files_folder."Style Chooser.php";
$website_style_variables_foreach = $website_php_files_folder."Style Variables Foreach.php";
$website_settings_checker = $website_php_files_folder."Settings Checker.php";
$website_variable_inserter_php = $website_php_files_folder."Variable Inserter.php";
$website_css_and_javascript_definer_php = $website_php_files_folder."CSS And JavaScript Definer.php";
$website_image_maker = $website_php_files_folder."Image Maker.php";
$website_notifications_php = $website_php_files_folder."Notifications.php";
$buttons_generator = $website_php_files_folder."Buttons Generator.php";
$website_tabs_generator = $website_php_files_folder."Tab Generator.php";
$website_tabs_loader = $website_php_files_folder."Tab Loader.php";
$website_tab_bodies_generator = $website_php_files_folder."Tab Bodies Generator.php";
$website_extra_website_things = $website_php_files_folder."Extra Website Things.php";
$website_comments_generator = $website_php_files_folder."Comments Generator.php";
$select_website_form = $website_php_files_folder."Select Website Form.php";
$website_forms = $website_php_files_folder."Forms.php";
$websites_tab_arrays = $websites_tab_folder."Arrays.php";
$websites_tab_button_maker = $websites_tab_folder."Button Maker.php";
$websites_tab_generator = $websites_tab_folder."Tab Generator.php";

$text_file_reader_file_php = $website_tool_files_folder."Text File Reader.php";

?>