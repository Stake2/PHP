<?php 

if ($website_settings["use_custom_tab_titles"] == True) {
	Make_Tab_Titles($custom_tab_titles);
}

else {
	Make_Tab_Titles();
}

?>