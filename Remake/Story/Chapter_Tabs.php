<?php 

# Chapter_Tabs

# Create chapter buttons and chapters
$story["chapter_buttons"] = "";
$story["chapters"] = "";

$chapter_titles = $story["Information"]["Chapter titles"][$language];

# Generate chapter tabs
Story::Chapter_Tabs($chapter_titles);

$story["chapters"] .= "\n\n";

?>