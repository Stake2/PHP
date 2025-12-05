<?php 

# Chapter_Tabs

# Create chapter buttons and chapters
$story["chapter_buttons"] = "";
$story["chapters"] = "";

if (isset($website["Data"]["JSON"]["story"]) == False) {
	$chapter_titles = $story["Information"]["Chapters"]["Lists"]["Titles"][$language];
}

else {
	$chapter_titles = $story["Information"]["Chapters"]["Titles"];
}

# Add a new chapter if the "chapter" URL parameter is a number greater than the total number of chapters
if (
	$website["States"]["Story"]["Write"] == True and
	isset($_GET["chapter"]) and
	(int)$_GET["chapter"] > count($chapter_titles)
) {
	array_push($chapter_titles, $website["Language texts"]["a_new_chapter"]);

	# Define the "New chapter" state as True
	$website["States"]["Story"]["New chapter"] = True;
}

# Generate chapter tabs
$Story -> Chapter_Tabs($chapter_titles);

$story["chapters"] .= "\n\n";

?>