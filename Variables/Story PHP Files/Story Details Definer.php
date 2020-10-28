<?php 

$new_synopsis = str_replace('<br />', "\n", $synopsis);
$new_sinopse = str_replace('<br />', "\n", $sinopse);

# Site descriptions
$website_descriptions_array = array(
'Synopsis: '.$new_synopsis,
'Sinopse: '.$new_sinopse,
);

# Synopsis text definer using the $synopsis that is generated from TextFileReader.php
$website_html_descriptions_array = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$synopsis.'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$sinopse.'"<br />',
);

# Site name in English and Brazilian Portuguese language
$websites_names_array = array(
$enus_title = $story_name_name,
$pt_title = $story_name_name,
);

# Story date definer using story date text file
$story_namedate = $story_namedate[0];

?>