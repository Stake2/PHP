<?php 

if ($website_settings["use_custom_tab_titles"] == True) {
	Make_Tab_Titles($custom_tab_titles_array);
}

else {
	Make_Tab_Titles();
}

?>