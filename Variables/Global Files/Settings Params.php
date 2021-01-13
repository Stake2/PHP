<?php 

$settings_params_array = array(
'write_new_chapter',
'show_write_form_text',
'show_title_text',
);

foreach ($settings_params_array as $param) {	
	if (strpos($host_text, $param.'='.'true') == true) {
		${"$param"} = true;
	}

	if (strpos($host_text, $param.'='.'false') == true) {
		${"$param"} = false;
	}

	else {
		${"$param"} = ${"$param"};
	}
}

if (strpos($host_text, $setting_parameters[0].'='.'true') == true) {
	$website_has_notifications = true;
}

if (strpos($host_text, $setting_parameters[0].'='.'false') == true) {
	$website_has_notifications = false;
}

else {
	$website_has_notifications = $website_has_notifications;
}


if (strpos($host_text, $setting_parameters[1].'='.'true') == true) {
	$website_has_comments_tab = true;
}

if (strpos($host_text, $setting_parameters[1].'='.'false') == true) {
	$website_has_comments_tab = false;
}

else {
	$website_has_comments_tab = $website_has_comments_tab;
}


if (strpos($host_text, $setting_parameters[2].'='.'true') == true) {
	$website_shows_comments = true;
}

if (strpos($host_text, $setting_parameters[2].'='.'false') == true) {
	$website_shows_comments = false;
}

else {
	$website_shows_comments = $website_shows_comments;
}


if (strpos($host_text, $setting_parameters[3].'='.'true') == true) {
	$website_has_stories_tab_setting = true;
}

if (strpos($host_text, $setting_parameters[3].'='.'false') == true) {
	$website_has_stories_tab_setting = false;
}

else {
	$website_has_stories_tab_setting = $website_has_stories_tab_setting;
}


if (strpos($host_text, $setting_parameters[4].'='.'true') == true) {
	$website_has_changelog_setting = true;
}

if (strpos($host_text, $setting_parameters[4].'='.'false') == true) {
	$website_has_changelog_setting = false;
}

else {
	$website_has_changelog_setting = $website_has_changelog_setting;
}


if (strpos($host_text, $setting_parameters[5].'='.'true') == true) {
	$website_write_story_setting = true;
}

if (strpos($host_text, $setting_parameters[5].'='.'false') == true) {
	$website_write_story_setting = false;
}

else {
	$website_write_story_setting = $website_write_story_setting;
}


if (strpos($host_text, $setting_parameters[6].'='.'true') == true) {
	$website_show_write_form_text_setting = true;
}

if (strpos($host_text, $setting_parameters[6].'='.'false') == true) {
	$website_show_write_form_text_setting = false;
}

else {
	$website_show_write_form_text_setting = $website_show_write_form_text_setting;
}


if (strpos($host_text, $setting_parameters[7].'='.'true') == true) {
	$website_show_chapter_text_on_write_form_setting = true;
}

if (strpos($host_text, $setting_parameters[7].'='.'false') == true) {
	$website_show_chapter_text_on_write_form_setting = false;
}

else {
	$website_show_chapter_text_on_write_form_setting = $website_show_chapter_text_on_write_form_setting;
}

if (strpos($host_text, $setting_parameters[8].'='.'true') == true) {
	$website_translate_story_setting = true;
}

if (strpos($host_text, $setting_parameters[8].'='.'false') == true) {
	$website_translate_story_setting = false;
}

$i = 1;
$c = 1;
while ($c < 50) {
	if (strpos($host_text, $setting_parameters[9].'='.'['.(string)$i.']') == true) {
		$website_chapter_to_write_setting = (string)$i;
	}

	else {
		$i++;
	}

	$c++;
}


if (strpos($host_text, $setting_parameters[18].'='.'true') == true) {
	$website_show_chapter_text_on_write_form_setting = true;
	$new_write_style = true;
	$website_writing_pack_setting = true;
	$show_write_form_text = true;
}

if (strpos($host_text, $setting_parameters[18].'='.'false') == true) {
	$website_show_chapter_text_on_write_form_setting = false;
	$new_write_style = false;
	$website_writing_pack_setting = false;
	$show_write_form_text = false;
}


if (strpos($host_text, $setting_parameters[10].'='.'true') == true) {
	$website_story_has_bookcovers_setting = true;
}

if (strpos($host_text, $setting_parameters[10].'='.'false') == true) {
	$website_story_has_bookcovers_setting = false;
}

else {
	$website_story_has_bookcovers_setting = $website_story_has_bookcovers_setting;
}


if (strpos($host_text, $setting_parameters[11].'='.'true') == true) {
	$website_deactivate_top_buttons_setting = true;
}

if (strpos($host_text, $setting_parameters[11].'='.'false') == true) {
	$website_deactivate_top_buttons_setting = false;
}


if (strpos($host_text, $setting_parameters[12].'='.'true') == true) {
	$website_deactivate_tabs_setting = true;
}

if (strpos($host_text, $setting_parameters[12].'='.'false') == true) {
	$website_deactivate_tabs_setting = false;
}


if (strpos($host_text, $setting_parameters[20].'='.'true') == true) {
	$website_deactivate_header_setting = true;
}

if (strpos($host_text, $setting_parameters[20].'='.'false') == true) {
	$website_deactivate_header_setting = false;
}


if (strpos($host_text, $setting_parameters[13].'='.'true') == true) {
	$website_deactivate_notification_setting = true;
}

if (strpos($host_text, $setting_parameters[13].'='.'false') == true) {
	$website_deactivate_notification_setting = false;
}

if (strpos($host_text, $setting_parameters[19].'='.'true') == true) {
	$website_deactivate_top_buttons_setting = true;
	$website_deactivate_tabs_setting = true;
	$website_deactivate_notification_setting = true;
	$website_deactivate_header_setting = true;
}

if ($website_deactivate_all_setting == true) {
	$website_deactivate_top_buttons_setting = true;
	$website_deactivate_tabs_setting = true;
	$website_deactivate_notification_setting = true;
	$website_deactivate_header_setting = true;
}

if (strpos($host_text, $setting_parameters[19].'='.'false') == true) {
	$website_deactivate_top_buttons_setting = false;
	$website_deactivate_tabs_setting = false;
	$website_deactivate_notification_setting = false;
	$website_deactivate_header_setting = false;
}


if (strpos($host_text, $setting_parameters[14].'='.'true') == true) {
	$website_new_design_setting = true;
}

if (strpos($host_text, $setting_parameters[14].'='.'false') == true) {
	$website_new_design_setting = false;
}

if (strpos ($host_text, $setting_parameters[15].'='.'true') == true) {
    $website_watch_history_show_to_watch_only_setting = true;
}

if (strpos ($host_text, $setting_parameters[15].'='.'false') == true) {
    $website_watch_history_show_to_watch_only_setting = false;
}

if (strpos ($host_text, $setting_parameters[16].'='.'true') == true) {
    $website_watch_history_new_watched_style_setting = true;
}

if (strpos ($host_text, $setting_parameters[16].'='.'false') == true) {
    $website_watch_history_new_watched_style_setting = false;
}

if (strpos ($host_text, 'hidecities=true') == true) {
    $hidecitysetting = true;
}

if (strpos ($host_text, 'hidecities=false') == true) {
    $hidecitysetting = false;
}

?>