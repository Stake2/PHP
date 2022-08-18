<?php 

# Year definer
$local_current_year = strftime("%Y");
$current_year_backup = $local_current_year;

# Website settings
$website_settings["use_custom_buttons_bar"] = True;
$website_settings["use_custom_tab_titles"] = True;

$website_info["theme_color"] = "#2196F3";

# Website tab names array
$english = array("Watched Media in ".$local_current_year, "Media Being Watched", "Movies", "Archived Media");
$portuguese = array("Mídias Assistidas em ".$local_current_year, "Mídias Sendo Assitidas", "Filmes", "Mídias Arquivadas");

?>