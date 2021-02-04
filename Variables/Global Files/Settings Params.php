<?php 

$settings_params_array = array(
'write_new_chapter',
'show_write_form_text',
'show_title_text',
);

foreach ($settings_params_array as $param) {	
	if (strpos($host_text, $param.'='.'true') == True) {
		${"$param"} = True;
	}

	if (strpos($host_text, $param.'='.'false') == True) {
		${"$param"} = false;
	}

	else {
		${"$param"} = ${"$param"};
	}
}

if (strpos($host_text, $setting_parameters[0].'='.'true') == True) {
	$website_has_notifications = True;
}

if (strpos($host_text, $setting_parameters[0].'='.'false') == True) {
	$website_has_notifications = false;
}

else {
	$website_has_notifications = $website_has_notifications;
}


if (strpos($host_text, $setting_parameters[1].'='.'true') == True) {
	$website_has_comments_tab = True;
}

if (strpos($host_text, $setting_parameters[1].'='.'false') == True) {
	$website_has_comments_tab = false;
}

else {
	$website_has_comments_tab = $website_has_comments_tab;
}


if (strpos($host_text, $setting_parameters[2].'='.'true') == True) {
	$website_shows_comments = True;
}

if (strpos($host_text, $setting_parameters[2].'='.'false') == True) {
	$website_shows_comments = false;
}

else {
	$website_shows_comments = $website_shows_comments;
}


if (strpos($host_text, $setting_parameters[3].'='.'true') == True) {
	$website_has_stories_tab_setting = True;
}

if (strpos($host_text, $setting_parameters[3].'='.'false') == True) {
	$website_has_stories_tab_setting = false;
}

else {
	$website_has_stories_tab_setting = $website_has_stories_tab_setting;
}


if (strpos($host_text, $setting_parameters[4].'='.'true') == True) {
	$website_has_changelog_setting = True;
}

if (strpos($host_text, $setting_parameters[4].'='.'false') == True) {
	$website_has_changelog_setting = false;
}

else {
	$website_has_changelog_setting = $website_has_changelog_setting;
}


if (strpos($host_text, $setting_parameters[5].'='.'true') == True) {
	$website_write_story_setting = True;
}

if (strpos($host_text, $setting_parameters[5].'='.'false') == True) {
	$website_write_story_setting = false;
}

else {
	$website_write_story_setting = $website_write_story_setting;
}


if (strpos($host_text, $setting_parameters[6].'='.'true') == True) {
	$website_show_write_form_text_setting = True;
}

if (strpos($host_text, $setting_parameters[6].'='.'false') == True) {
	$website_show_write_form_text_setting = false;
}

else {
	$website_show_write_form_text_setting = $website_show_write_form_text_setting;
}


if (strpos($host_text, $setting_parameters[7].'='.'true') == True) {
	$website_show_chapter_text_on_write_form_setting = True;
}

if (strpos($host_text, $setting_parameters[7].'='.'false') == True) {
	$website_show_chapter_text_on_write_form_setting = false;
}

else {
	$website_show_chapter_text_on_write_form_setting = $website_show_chapter_text_on_write_form_setting;
}

if (strpos($host_text, $setting_parameters[8].'='.'true') == True) {
	$website_translate_story_setting = True;
}

if (strpos($host_text, $setting_parameters[8].'='.'false') == True) {
	$website_translate_story_setting = false;
}

$i = 1;
$c = 1;
while ($c < 50) {
	if (strpos($host_text, $setting_parameters[9].'='.'['.(string)$i.']') == True) {
		$website_chapter_to_write_setting = (string)$i;
	}

	else {
		$i++;
	}

	$c++;
}


if (strpos($host_text, $setting_parameters[18].'='.'true') == True) {
	$website_show_chapter_text_on_write_form_setting = True;
	$new_write_style = True;
	$website_writing_pack_setting = True;
	$show_write_form_text = True;
}

if (strpos($host_text, $setting_parameters[18].'='.'false') == True) {
	$website_show_chapter_text_on_write_form_setting = false;
	$new_write_style = false;
	$website_writing_pack_setting = false;
	$show_write_form_text = false;
}


if (strpos($host_text, $setting_parameters[10].'='.'true') == True) {
	$website_story_has_bookcovers_setting = True;
}

if (strpos($host_text, $setting_parameters[10].'='.'false') == True) {
	$website_story_has_bookcovers_setting = false;
}

else {
	$website_story_has_bookcovers_setting = $website_story_has_bookcovers_setting;
}


if (strpos($host_text, $setting_parameters[11].'='.'true') == True) {
	$website_deactivate_top_buttons_setting = True;
}

if (strpos($host_text, $setting_parameters[11].'='.'false') == True) {
	$website_deactivate_top_buttons_setting = false;
}


if (strpos($host_text, $setting_parameters[12].'='.'true') == True) {
	$website_deactivate_tabs_setting = True;
}

if (strpos($host_text, $setting_parameters[12].'='.'false') == True) {
	$website_deactivate_tabs_setting = false;
}


if (strpos($host_text, $setting_parameters[20].'='.'true') == True) {
	$website_deactivate_header_setting = True;
}

if (strpos($host_text, $setting_parameters[20].'='.'false') == True) {
	$website_deactivate_header_setting = false;
}


if (strpos($host_text, $setting_parameters[13].'='.'true') == True) {
	$website_deactivate_notification_setting = True;
}

if (strpos($host_text, $setting_parameters[13].'='.'false') == True) {
	$website_deactivate_notification_setting = false;
}

if (strpos($host_text, $setting_parameters[19].'='.'true') == True) {
	$website_deactivate_top_buttons_setting = True;
	$website_deactivate_tabs_setting = True;
	$website_deactivate_notification_setting = True;
	$website_deactivate_header_setting = True;
}

if ($website_deactivate_all_setting == True) {
	$website_deactivate_top_buttons_setting = True;
	$website_deactivate_tabs_setting = True;
	$website_deactivate_notification_setting = True;
	$website_deactivate_header_setting = True;
}

if (strpos($host_text, $setting_parameters[19].'='.'false') == True) {
	$website_deactivate_top_buttons_setting = false;
	$website_deactivate_tabs_setting = false;
	$website_deactivate_notification_setting = false;
	$website_deactivate_header_setting = false;
}


if (strpos($host_text, $setting_parameters[14].'='.'true') == True) {
	$website_new_design_setting = True;
}

if (strpos($host_text, $setting_parameters[14].'='.'false') == True) {
	$website_new_design_setting = false;
}

if (strpos ($host_text, $setting_parameters[15].'='.'true') == True) {
    $website_watch_history_show_to_watch_only_setting = True;
}

if (strpos ($host_text, $setting_parameters[15].'='.'false') == True) {
    $website_watch_history_show_to_watch_only_setting = false;
}

if (strpos ($host_text, $setting_parameters[16].'='.'true') == True) {
    $website_watch_history_new_watched_style_setting = True;
}

if (strpos ($host_text, $setting_parameters[16].'='.'false') == True) {
    $website_watch_history_new_watched_style_setting = false;
}

if (strpos ($host_text, 'hidecities=True') == True) {
    $website_hide_tabs_setting = True;
}

if (strpos ($host_text, 'hidecities=false') == True) {
    $website_hide_tabs_setting = false;
}

?>