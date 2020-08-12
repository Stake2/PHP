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
if ($sitename == $sitediario or $sitename == ucwords($sitediario) or $site == $sitediario) {
	include $sitesbuttonstab;
	require $chapter_generator_global_variable;
}

#ChapterReader.php includer for Pequenata website
if ($sitetype1 == $types[1]) {
	if ($sitename == $sitepequenata) {
		$pqntcr = true;
	}

	else {
		$pqntcr = false;
	}

	require $chapter_generator_global_variable;
}

if ($sitename == $sitediario or $sitename == ucwords($sitediario) or $site == $sitediario) {
	echo '';
}

else {
	#SiteButton displayer and SiteButtons tab includer
	if ($deactivatesitesbtn == false) {
		echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />"."\n";
		echo $sitebtn."\n";
	}

	include $sitesbuttonstab;
}

?>