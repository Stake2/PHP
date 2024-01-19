<?php 

# Chapter_Tabs

# Create chapter buttons and chapters
$story["chapter_buttons"] = "";
$story["chapters"] = "";

if (isset($website["Data"]["JSON"]["story"]) == False) {
	$chapter_titles = $story["Information"]["Chapters"]["Titles"][$language];
}

else {
	$chapter_titles = $story["Information"]["Chapters"]["Titles"];
}

# Generate chapter tabs
$Story -> Chapter_Tabs($chapter_titles);

$story["chapters"] .= "\n\n";

?>