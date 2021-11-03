<?php 

foreach ($website_titles as $value) {
	$local_website_title = Language_Item_Definer($value, $website_portuguese_titles[$value]);
	$local_website_link = $website_links[$value];

	$website_link_buttons[$value] = Make_Website_Button($local_website_link, $local_website_title, $first_button_style);
}

unset($website_link_buttons[$website_title_backup]);

?>