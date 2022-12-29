<?php 

# Chapter_Tabs

# Create chapter buttons and chapters
$story["chapter_buttons"] = "";
$story["chapters"] = "";

if (isset($website["data"]["json"]["story"]) == False) {
	$chapter_titles = $story["Information"]["Chapter titles"][$language];
}

else {
	$chapter_titles = $story["Information"]["Chapter titles"];
}

# Generate chapter tabs
Story::Chapter_Tabs($chapter_titles);

$story["chapters"] .= "\n\n";

?>