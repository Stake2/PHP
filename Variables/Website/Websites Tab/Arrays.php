<?php 

foreach ($website_titles as $value) {
	$local_website_title = Language_Item_Definer($value, $website_portuguese_titles[$value]);
	$local_website_link = $website_links[$value];
	$local_website_type = $website_types[$value];

	$button_style = $first_button_style;
	$new_tab = True;

	if ($value == $website_information["english_title"]) {
		$local_website_link = "return false;";
		$button_style = $default_text_color." ".$click_button_color." ".$second_full_border." ".$default_background_hover_color;
		$new_tab = False;
	}

	$add_to_button_name = "";
	$add_to_button_title = "";

	if ($local_website_type == $story_website_type) {
		$add_to_button_name .= " ".$icons_array["book"];
		$add_to_button_title .= " 📗";
	}

	if (in_array($local_website_title, $year_websites)) {
		$add_to_button_name .= " ".$icons_array["calendar"];
		$add_to_button_title .= " 📅";
	}

	$website_link_buttons[$value] = Make_Website_Button($local_website_link, $local_website_title, $button_style, $add_to_button_name, $add_to_button_title, $new_tab);
}

?>