<?php 

$new_synopsis = $story_synopsis[0];
$new_sinopse = $story_synopsis[1];

# Website descriptions
$website_descriptions_array = array(
'Synopsis: '.$new_synopsis,
'Sinopse: '.$new_sinopse,
);

# Synopsis text definer using the $synopsis that is generated from TextFileReader.php
$website_html_descriptions_array = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$new_synopsis.'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$new_sinopse.'"<br />',
);

# Website name in English and Brazilian Portuguese language
$websites_names_array = array(
$enus_title = $story_name_variable,
$pt_title = $story_name_variable,
);

# Story date definer using story date text file
$story_creation_date = $story_creation_date[0];

?>