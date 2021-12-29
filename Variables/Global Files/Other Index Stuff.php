<?php 

if ($website_settings["notifications"] == True) {
	echo "\n"."<script>"."\n";
	echo "Change_Title();"."\n";
	echo "</script>"."\n";
}

if ($website_function_settings["is_prototype"] == False and $website_settings["custom_layout"] == False) {
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

if ($website_type == $story_website_type) {
	$text_to_show = "\n"."<script>"."\n".
	"Chapter_Number = 1;"."\n".
	"var Last_Chapter = ".$chapters.";"."\n";

	if ($website_story_has_titles == True) {
		$text_to_show .= "var Last_Chapter_Title = \"".$chapters." - ".$chapter_titles[($chapters - 1)]."\";"."\n";
	}

	else {
		$text_to_show .= "var Last_Chapter_Title = \"".$chapters."\";"."\n";
	}

	$text_to_show .= "</script>";

	echo $text_to_show;

	echo "<script>"."\n".
	"Get_Title();"."\n".
	"</script>"."\n";
}

# Website notification script link includer if setting is True
if ($website_settings["notifications"] == True) {
	echo format($javascript_link_string, array($notifications_javascript_link));
}

# Chapter Opener Script includer if the setting is True
if ($website_type == $story_website_type and $story_website_settings["chapter_opener"] == True) {
	echo "\n";
	echo '<script>'."\n";
	require $open_chapter_script_php;
	echo '</script>'."\n";
	echo "\n";
}

echo "<script>"."\n".
"Hide_Mobile_Buttons();"."\n".
"</script>"."\n";

if (isset($website_settings["custom_css_style"]) and $website_settings["custom_css_style"] == True) {
	echo Create_Element("style", "", $custom_css_style);
}

if ($website_title == $website_titles["My Little Pony: Friendship Is Magic"]) {
	Show($jquery, $add_br = True);
}

?>