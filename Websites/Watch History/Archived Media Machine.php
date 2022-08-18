<?php 

$spanstyle = $whitespan;
$hover_text_color = $text_hover_white_css_class;
$number_text_color = $first_text_color;
$number_text_color_span = '<span class="'.$number_text_color.'">';

if ($mobile_version == True) {
	$margin_div_style = "<div>";
	$mobile_a_name = "m";
}

if ($mobile_version == False) {
	$margin_div_style = '<div style="margin-left:30px;">';
	$mobile_a_name = "";
}

$tab_header = '<span class="'.$first_text_color.'">'.
$archived_media_text.' '.$current_variable_year.': '.'<span class="'.$second_text_color.'">'.' ['.${"watched_number_".$current_variable_year}.']'.
$spanc.$spanc;

$tab_title = '
<div class="'.$computer_variable.'">'.$every_watched_button_computer.$div_close."\n".
'<div class="'.$mobile_variable.'">'.$every_watched_button_mobile.$div_close."\n".
'<hr class="'.$header_full_border.'" />
'.$div_zoom_animation.'<'.$h2_element.'><p></p><br /><b>'.$tab_header.'</b><br /><br /><p></p></'.$h2_element.'>'.$div_close.'
<hr class="'.$header_full_border.'" />'."\n".
$div_zoom_animation.'<div class="'.$computer_variable.'">'.$archived_media_buttons.$div_close."\n".
'<div class="'.$mobile_variable.'">'.$archived_media_mobile_buttons.$div_close.$div_close;

$archived_media_string = "";

$archived_media_string .= $tab_title."\n";

$archived_media_string .= '<hr class="'.$header_full_border.'" />'."\n";
$archived_media_string .= '<'.$h4_element.' class="'.$number_text_color.'" style="text-align:left;">'."\n";

# Current Year Watched Media Generator file includer
$mobile_version = False;
$archived_media_string .= $computer_div;

$current_year_watched_number = ${"watched_episodes_".$module_current_year."_line_number"} - 1;
$current_year_watched_episodes_text = ${"year_".$module_current_year."_watched_episodes_text"};
$current_year_watched_time_text = ${"year_".$module_current_year."_watched_time_text"};
$current_year_watched_media_type_text =  ${"year_".$module_current_year."_watched_media_type_text"};
$media_type_text_file_lines_array = $media_type_text_file_lines_arrays[$module_current_year];
$watched_media_numbers_current_year = ${"watched_media_numbers_".$module_current_year};

$fixing = False;

if ($fixing == False) {
	require $watched_media_generator;
	$archived_media_string .= $full_string;
}

else {
	$archived_media_string .= "<center>"."\n";

	if (in_array($website_info["language"], $en_languages_array)) {
		$archived_media_string .= '<'.$h2_element.' class="'.$first_text_color.' mobileHide"><b>The Archived Media of '.$selected_year.' are being fixed.</b></'.$h2_element.'>'."\n";
		$archived_media_string .= '<'.$h4_element.' class="'.$first_text_color.' mobileShow"><b>The Archived Media of '.$selected_year.' are being fixed.</b></'.$h4_element.'>'."\n";
	}

	if (in_array($website_info["language"], $pt_languages_array)) {
		$archived_media_string .= '<'.$h2_element.' class="'.$first_text_color.' mobileHide"><b>As Mídias Arquivadas de '.$selected_year.' estão sendo consertadas.</b></'.$h2_element.'>'."\n";
		$archived_media_string .= '<'.$h4_element.' class="'.$first_text_color.' mobileShow"><b>As Mídias Arquivadas de '.$selected_year.' estão sendo consertadas.</b></'.$h4_element.'>'."\n";
	}

	$archived_media_string .= "</center>"."\n";
}

$archived_media_string .= $div_close."\n";

# Current Year Watched Media Generator file includer
$mobile_version = True;

$archived_media_string .= $mobile_div;

$archived_media_string .= $div_close;

$archived_media_string .= '</'.$h4_element.'>'."\n";

?>