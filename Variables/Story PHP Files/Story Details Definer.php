<?php 

$new_synopsis = str_replace('<br />', "\n", $synopsis);
$new_sinopse = str_replace('<br />', "\n", $sinopse);

# Site descriptions
$sitedescs = array(
'Synopsis: '.$new_synopsis,
'Sinopse: '.$new_sinopse,
);

# Synopsis text definer using the $synopsis that is generated from TextFileReader.php
$descs = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$synopsis.'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$sinopse.'"<br />',
);

# Site name in English and Brazilian Portuguese language
$sitenames = array(
$enus_title = $story,
$pt_title = $story,
);

# Story date definer using story date text file
$storydate = $storydate[0];

?>