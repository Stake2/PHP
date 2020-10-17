<?php 

if ($sitehasnotifications == true and $deactivatenotification != true) {
	echo '<script>
ChangeTitle();
</script>';
}

#Site notification file includer if setting is true
if ($sitehasnotifications == true and $deactivatenotification == false) {
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

if ($sitename == $sitethingsido) {
	echo '
<style>
a:link {color: blue!important;}
a:visited {color: blue!important;}
a:hover {color: blue!important;}
a:active {color: blue!important;} 
</style>';
}

if ($newdesign == true) {
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

#var_dump($website_style_variables_array);
#echo $current_website_folder;

?>