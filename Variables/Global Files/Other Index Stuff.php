<?php 

if ($website_has_notifications == True) {
	echo '<script>'."\n";
	echo 'Change_Title();'."\n";
	echo '</script>';
}

if ($site_haves_additional_website_content == True) {
	if (isset($additional_website_content)) {
		echo $additional_website_content;
	}
}

if ($website_is_prototype_setting == False and $website_uses_custom_layout_setting == False) {
	echo $animationstylecss."\n"."\n";
}

if ($website_title == $website_titles["Things I Do"]) {
	echo '
<style>
a:link {color: blue!important;}
a:visited {color: blue!important;}
a:hover {color: blue!important;}
a:active {color: blue!important;} 
</style>';
}

echo "\n"."\n".'<script>
function getElementByXpath(path) {
  return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
}
</script>';

if ($website_uses_custom_layout_setting == False) {
	echo '<div style="display:none;" id="click_website_button_color">'.$click_button_color.$div_close."\n";
	echo '<div style="display:none;" id="old_website_button_color">'.$first_button_color.$div_close."\n";
	echo '<div style="display:none;" id="button_number">'.$website_tab_number.$div_close."\n";
}

if ($website_type == $story_website_type) {
	echo "\n".'<script>"."\n".
	Chapter_Number = 1;"."\n".
	"var Last_Chapter = '.$chapters.';"."\n".
	"</script>';

	echo "<script>"."\n".
	"Get_Title();"."\n".
	"</script>"."\n";
}

# Website notification script link includer if setting is True
if ($website_has_notifications == True and $website_deactivate_notification_setting == False) {
	echo format($javascript_link_string, array($notifications_javascript_link));
}

# Chapter Opener Script includer if the setting is True
if ($story_website_uses_chapter_opener == True) {
	echo "\n";
	echo '<script>'."\n";
	require $open_chapter_script_php;
	echo '</script>'."\n";
	echo "\n";
}

echo "<script>"."\n".
"Hide_Mobile_Buttons();"."\n".
"</script>"."\n";

?>