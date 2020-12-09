<?php 

if ($website_has_notifications == true and $website_deactivate_notification_setting != true) {
	echo '<script>
ChangeTitle();
</script>';
}

/*
$i = 0;
while ($i <= 0) {
	$text_to_use = $watchedtxtmedia[208];
	$text_to_find = "/(".$rewatched_text_enus." 1x - ".$rewatched_text_ptbr." 1x)/i";

	#echo preg_replace($text_to_find, $rewatched_text." 1x", $text_to_use) . "<br />"."\n";

	$a = $text_to_use;
	#echo $newString;

	$i++;
}
*/


#Site notification file includer if setting is true
if ($website_has_notifications == true and $website_deactivate_notification_setting == false) {
	echo $notificationscript."\n"."\n";
}

if ($site_haves_additional_website_content == true) {
	if (isset($additional_website_content)) {
		echo $additional_website_content;
	}
}

if ($site_is_prototype == false) {
	echo $animationstylecss."\n"."\n";
}

if ($website_name == $sitethingsido) {
	echo '
<style>
a:link {color: blue!important;}
a:visited {color: blue!important;}
a:hover {color: blue!important;}
a:active {color: blue!important;} 
</style>';
}

if ($website_new_design_setting == true) {
	#SuperAnimes test loader
	require $newdesignsitephp;
	echo $newdesignscript;
}

#Chapter Opener Script includer if the setting is true
if ($siteuseschapteropener == true) {
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

?>