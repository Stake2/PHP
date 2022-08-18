<?php 

if ($website_settings["notifications"] == True and $website_info["language"] != $language_geral) {
	echo "\n"."<script>"."\n";
	echo "Change_Title();"."\n";
	echo "</script>"."\n";
}

if ($website_function_settings["is_prototype"] == False and $website_settings["custom_layout"] == False and $website_info["language"] != $language_geral) {
	echo $animationstylecss."\n"."\n";
}

echo "\n"."\n".'<script>
function getElementByXpath(path) {
  return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
}
</script>';

if ($website_settings["custom_layout"] == False) {
	echo '<div style="display:none;" id="click_website_button_color">'.$click_button_color.$div_close."\n";
	echo '<div style="display:none;" id="old_website_button_color">'.$first_button_color.$div_close."\n";
	echo '<div style="display:none;" id="button_number">'.$website_tab_number.$div_close."\n";
}

if ($website_info["type"] == $story_website_type and $website_info["language"] != $language_geral) {
	$text_to_show = "\n"."<script>"."\n".
	"Chapter_Number = 1;"."\n".
	"var Last_Chapter = ".$story_info["chapter_number"].";"."\n";

	if ($story_website_settings["has_titles"] == True) {
		$text_to_show .= 'var Last_Chapter_Title = "'.$story_info["chapter_number"]." - ".$chapter_titles[($story_info["chapter_number"] - 1)]."\";"."\n";
	}

	else {
		$text_to_show .= 'var Last_Chapter_Title = "'.$story_info["chapter_number"].'";'."\n";
	}

	$text_to_show .= "</script>";

	echo $text_to_show;

	echo "<script>
	Get_Title();
</script>"."\n";
}

# Website notification script link includer if setting is True
if ($website_settings["notifications"] == True and $website_info["language"] != $language_geral) {
	echo format($javascript_link_string, array($notifications_javascript_link));
}

# Chapter Opener Script includer if the setting is True
if ($website_info["type"] == $story_website_type and $story_website_settings["chapter_opener"] == True and $website_info["language"] != $language_geral) {
	echo "\n";
	echo '<script>'."\n";
	require $open_chapter_script_php;
	echo '</script>'."\n";
	echo "\n";
}

if ($website_info["language"] != $language_geral) {
	echo "<script>"."\n".
	"Hide_Mobile_Buttons();"."\n".
	"</script>"."\n";
}

if (isset($website_settings["custom_css_style"]) and $website_settings["custom_css_style"] == True and $website_info["language"] != $language_geral) {
	echo Create_Element("style", "", $custom_css_style);
}

if ($website_info["english_title"] == $website_titles["My Little Pony: Friendship Is Magic"]) {
	Show($jquery, $add_br = True);
}

if (file_exists($website_info["php_folder"]."Website Content.php")) {
	require $website_info["php_folder"]."Website Content.php";
}

?>