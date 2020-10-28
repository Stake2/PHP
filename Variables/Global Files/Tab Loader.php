<?php

#Cities array includer
$i = 0;
while ($i <= $tabnumb) {
	include $cities[$i];
	
	if ($i != $tabnumb) {
		echo "\n";
	}

	$i++;
}

#Diario site php file loader
if ($website_name == $sitediario or $website_name == ucwords($sitediario) or $site == $sitediario) {
	include $websites_tab_generator;
	require $chapter_generator_global_variable;
}

#ChapterReader.php includer for Pequenata website
if ($sitetype1 == $website_types_array[1]) {
	require $chapter_generator_global_variable;
}

if ($website_name != $sitediario or $website_name != ucwords($sitediario) or $site != $sitediario) {
	#SiteButton displayer and SiteButtons tab includer
	if ($website_deactivate_website_buttons_setting == false) {
		echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />"."\n";
		echo $websites_tab_button_centered."\n";
	}

	include $websites_tab_generator;
}

?>