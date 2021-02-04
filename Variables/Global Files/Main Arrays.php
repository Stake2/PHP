<?php 

#Queries for parameters
$website_selector_parameters = array(
'website',
'website_type',
'website_language',
);

#Queries for parameters of settings
$setting_parameters = array(
'website_notification_setting',
'website_comment_tab_setting',
'website_show_comments_setting',
'website_has_stories_setting',
'website_has_change_log_tab_setting',
'website_write_story_setting',
'website_show_write_form_text_setting',
'website_show_chapter_text_on_write_form_setting', #7
'website_translate_story_setting',
'website_chapter_to_write_setting',
'website_story_has_bookcovers_setting',
'website_deactivate_top_buttons_setting',
'website_deactivate_tabs_setting',
'website_deactivate_notification_setting',
'website_new_design_setting',
'website_watch_history_show_to_watch_only_setting',
'website_watch_history_new_watched_style_setting',
'website_new_write_style_setting',
'website_writing_pack_setting',
'website_deactivate_all_setting',
'website_deactivate_header_setting',
);

#Queries for website languages
$languages_array = array(
'geral',
'enus',
'ptbr',
'ptpt',
);

$geral_language = $languages_array[0];
$enus_language = $languages_array[1];
$ptbr_language = $languages_array[2];
$ptpt_language = $languages_array[3];

$language_geral = $languages_array[0];
$language_enus = $languages_array[1];
$language_ptbr = $languages_array[2];
$language_ptpt = $languages_array[3];

#Array of Portuguese languages
$pt_languages_array = array(
$ptbr_language,
$ptpt_language,
);

#Array of English languages
$en_languages_array = array(
$geral_language,
$enus_language,
);

#CSS file variables
$website_css_files_array = array(
$css_file_pocb = 'Pocb',
$css_file_pequenata = 'Pequenata',
$css_file_spaceliving = 'SpaceLiving',
$css_file_watch_history = 'Watch',
$css_file_desert_island = 'Desert_Island',
);

?>