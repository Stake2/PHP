<?php 

if ($website_has_notifications == True and $website_deactivate_notification_setting != True) {
	echo '<script>
Change_Title();
</script>';
}

/*
$i = 0;
while ($i <= 0) {
	$text_to_use = $current_year_watched_episodes_text[208];
	$text_to_find = "/(".$rewatched_text_enus." 1x - ".$rewatched_text_ptbr." 1x)/i";

	#echo preg_replace($text_to_find, $rewatched_text." 1x", $text_to_use) . "<br />"."\n";

	$a = $text_to_use;
	#echo $newString;

	$i++;
}
*/


#Website notification file includer if setting is True
if ($website_has_notifications == True and $website_deactivate_notification_setting == false) {
	echo $notification_script."\n"."\n";
}

if ($site_haves_additional_website_content == True) {
	if (isset($additional_website_content)) {
		echo $additional_website_content;
	}
}

if ($site_is_prototype == false) {
	echo $animationstylecss."\n"."\n";
}

if ($website_name == $website_things_i_do) {
	echo '
<style>
a:link {color: blue!important;}
a:visited {color: blue!important;}
a:hover {color: blue!important;}
a:active {color: blue!important;} 
</style>';
}

if ($website_new_design_setting == True) {
	#SuperAnimes test loader
	require $newdesignsitephp;
	echo $new_design_script;
}

#Chapter Opener Script includer if the setting is True
if ($story_website_uses_chapter_opener == True) {
	echo "\n";
	echo '<script>'."\n";
	require $open_chapter_script_php;
	echo '</script>'."\n";
	echo "\n";
}

#echo $website_style_file;

/*
echo '<div class="'.$alternative_full_tab_style.'" style="'.$margin_style_10percent.' '.$rounded_border_style_2.'">';

echo '<h2><b><textarea type="text" id="websites_list" class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle7.'height: 1200px;width: 1200px;" placeholder="';

$array = "";

foreach ($websites_names_array_2 as $website) {
	$array .= $website.'
';
}

echo '"></textarea></b></h2>'."\n";

echo $div_close;

echo '<script>
document.getElementById("websites_list").value = `'.$array.'`; 

function Copy_Text_To_Clipboard() {

  var text_element = document.getElementById("websites_list");

	var text_content = text_element.textContent;

  console.log(text_content);
}

async function Test() {
	await navigator.clipboard.write("Hello");
}
</script>';

echo '<script>
Copy_Text_To_Clipboard();
Test();
</script>';

#print_r($websites_names_array_2);
*/

#echo $sitecodes[16];

echo '<script>
function getElementByXpath(path) {
  return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
}
</script>'."\n\n";

echo '<div style="display:none;" id="click_website_button_color">'.$click_button_color.$div_close."\n";
echo '<div style="display:none;" id="old_website_button_color">'.$first_button_color.$div_close."\n";
echo '<div style="display:none;" id="button_number">'.$tabnumb.$div_close."\n";

#echo "\n".'<div class="w3-text-white" style="text-weight: bold;">'."\n";

$i = 0;
foreach ($website_titles_array as $title) {
	#echo $i." - ".$title.": ".$website_types_array[$i]."<br />\n";

	$i++;
}

#echo $div_close."\n\n";

?>