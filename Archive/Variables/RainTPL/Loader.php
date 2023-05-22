<?php 

require_once($raintpl_class_folder."autoload.php");

use RainTPL\Classes\Tpl;

// config
$config = array(
    "tpl_dir"       => "Variables/RainTPL/Template/",
    "cache_dir"     => "Variables/RainTPL/Cache/",
	"auto_escape"   => False,
	"debug"         => True,
);

Tpl::configure($config);

$tpl = new Tpl();

// assign a variable
$tpl->assign("title", $website_information["language_title"]);

if (isset($website_information["language_title_with_icon_header"])) {
	$tpl->assign("title_with_icon", $website_information["language_title_with_icon_header"]);	
}

else {
	$tpl->assign("title_with_icon", $website_information["language_title_with_icon"]);
}

$tpl->assign("website", $website);
$tpl->assign("language_title", $website_information["english_title"]." ".$website_information["full_language"]);
$tpl->assign("language", $website_information["language"]);
$tpl->assign("language_geral", $language_geral);

$tpl->assign("description", $website_information["meta_description"]);
$tpl->assign("theme_color", $website_information["theme_color"]);
$tpl->assign("header_description", $website_information["header_description"]);
$tpl->assign("link", $website_information["link"]);
$tpl->assign("image_link", $website_information["image_link"]);
$tpl->assign("image_format", $website_information["image_format"]);
$tpl->assign("website_images_variable", $website_images_variable);
$tpl->assign("date", $todays_date);
$tpl->assign("website_author", $website_information["author"]);
$tpl->assign("twitter_author", $website_information["author"]."_");
$tpl->assign("website_css_links", $website_css_links);
$tpl->assign("website_javascript_links", $website_javascript_links);
$tpl->assign("h2", $h2_element);
$tpl->assign("computer_variable", $computer_variable);
$tpl->assign("first_text_color", $first_text_color);
$tpl->assign("first_border_color", $first_border_color);
$tpl->assign("header_background_color", $header_background_color);
$tpl->assign("zoom_animation_class", $zoom_animation_class);
$tpl->assign("header_hr", $header_hr);
$tpl->assign("h4", $h4_element);
$tpl->assign("mobile_variable", $mobile_variable);
$tpl->assign("zoom_animation", $div_zoom_animation);
$tpl->assign("tab_margin", $margincss1);
$tpl->assign("header_margin", $margincss3.$rounded_border_style_2);

if (isset($website_buttons)) {
	$tpl->assign("website_buttons", $website_buttons);
}

$tpl->assign("website_notification", $website_notification);
$tpl->assign("change_website_title_script", $change_website_title_script."\n");

if ($website_information["type"] == $story_website_type) {
	$tpl->assign("author_text", $story_info["author_number_text"]);
	$tpl->assign("author", $story_info["author_name"]);
	$tpl->assign("chapter_text", $story_info["chapter_number_text"]);
	$tpl->assign("chapters_number", format($website_information["second_text_color_span"], $story_info["chapter_number"]." ".$icons_array["open book"].$new_chapter_text));

	if (isset($story_info["readers"]) == True and $story_info["readers"] != ["No Readers - Sem Leitores"]) {
		$tpl->assign("readers", $readers_text.": ".format($website_information["second_text_color_span"], $story_info["readers_number"]." ".$icons_array["reader"])."<br />");
	}

	else {
		$tpl->assign("readers", "");
	}
	
	$tpl->assign("creation_date_text", $story_creation_date_text);
	$tpl->assign("creation_date", format($website_information["second_text_color_span"], $story_creation_date));
	$tpl->assign("status", format($website_information["second_text_color_span"], $story_status_text));
}

?>