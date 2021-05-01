<?php 

# Website notification file includer if setting is True
if ($website_has_notifications == True and $website_deactivate_notification_setting == False) {
	echo $notification_script."\n"."\n";
}

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

if ($site_is_prototype == False and $website_uses_custom_layout_setting == False) {
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

echo "\n"."\n".'<script>
function getElementByXpath(path) {
  return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
}
</script>';

if ($website_uses_custom_layout_setting == False) {
	echo '<div style="display:none;" id="click_website_button_color">'.$click_button_color.$div_close."\n";
	echo '<div style="display:none;" id="old_website_button_color">'.$first_button_color.$div_close."\n";
	echo '<div style="display:none;" id="button_number">'.$tabnumb.$div_close."\n";
}

if ($website_type == $story_website_type) {
	echo "\n".'<script>
Chapter_Number = 1;
var Last_Chapter = '.$chapters.';
</script>';
}

echo "\n\n".'<style>
:root {
	--one-dot-six-line-height: 1.6;
}

@media screen and (max-width: 2000px) {
	h2 {
		font-size: 30px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	h3 {
		font-size: 25px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	div.chapter-text-class {
		font-size: 18px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}
}

@media screen and (max-width: 1500px) {
	h2 {
		font-size: 25px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	h3 {
		font-size: 23px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	div.chapter-text-class {
		font-size: 16px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}
}

@media screen and (max-width: 1000px) {
	h2 {
		font-size: 18px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	h3 {
		font-size: 17px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	div.chapter-text-class {
		font-size: 14px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}
}

@media screen and (max-width: 700px) {
	h2 {
		font-size: 17px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	h3 {
		font-size: 16px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	div.chapter-text-class {
		font-size: 13px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}
}

@media screen and (min-width: 400px) and (max-width: 500px) {
	h2 {
		font-size: 19px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	h3 {
		font-size: 19px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	div.chapter-text-class {
		font-size: 13px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}
}

@media screen and (min-width: 100px) and (max-width: 300px) {
	h2 {
		font-size: 13px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	h3 {
		font-size: 14px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}

	div.chapter-text-class {
		font-size: 10px!important;
		line-height: var(--one-dot-six-line-height)!important;
	}
}
</style>'."\n\n";

# Chapter Opener Script includer if the setting is True
if ($story_website_uses_chapter_opener == True) {
	echo "\n";
	echo '<script>'."\n";
	require $open_chapter_script_php;
	echo '</script>'."\n";
	echo "\n";
}

if ($website == $website_diario or $website_type == $story_website_type) {
	echo '<script>
	Get_Title();
	</script>'."\n";
}

?>