<?php 

# Year definer
$local_current_year = strftime("%Y");
$current_year_backup = $local_current_year;

# Website settings
$website_settings["use_custom_buttons_bar"] = True;
$website_settings["use_custom_tab_titles"] = True;

$website_info["theme_color"] = "#2196F3";

# Website tab names array
$english = array("Watched media in ".$local_current_year, "Media being watched", "Movies", "Archived media");
$portuguese = array("Mídia assistidas em ".$local_current_year, "Mídia sendo assistida", "Filmes", "Mídia arquivada");

?>