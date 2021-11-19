<?php 

if ($thingsidofake == True) {
	$spanstyle = $blackspan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
	$number_text_color_span = '<span class="'.$number_text_color.'">';

	if ($mobileversion == True) {
		$margindivstyle = '<div>';
		$mobileaname = 'm';
	}

	if ($mobileversion == false) {
		$margindivstyle = '<div style="margin-left:30px;">';
		$mobileaname = '';
	}
}

if ($thingsidofake == null) {
	$spanstyle = $whitespan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
	$number_text_color_span = '<span class="'.$number_text_color.'">';

	if ($mobileversion == True) {
		$margindivstyle = '<div>';
		$mobileaname = 'm';
	}

	if ($mobileversion == null) {
		$margindivstyle = '<div style="margin-left:30px;">';
		$mobileaname = '';
	}
}

$html = $archived_media_text.' '.$current_variable_year.': '.'<span class="'.$second_text_color.'">'.' ['.${"watched_number_".$current_variable_year}.']'.$spanc;

$tab_header = '<span class="'.$first_text_color.'">'.$html.$spanc;

$tab_title = '
<div class="'.$computer_variable.'">'.$every_watched_button_computer.$div_close."\n".
'<div class="'.$mobile_variable.'">'.$every_watched_button_mobile.$div_close."\n".
'<hr class="'.$header_full_border.'" />
'.$div_zoom_animation.'<'.$h2_element.'><p></p><br /><b>'.$tab_header.'</b><br /><br /><p></p></'.$h2_element.'>'.$div_close.'
<hr class="'.$header_full_border.'" />'."\n".
$div_zoom_animation.'<div class="'.$computer_variable.'">'.$archived_media_buttons.$div_close."\n".
'<div class="'.$mobile_variable.'">'.$archived_media_mobile_buttons.$div_close.$div_close;

echo $tab_title."\n";

echo '<hr class="'.$header_full_border.'" />'."\n";
echo '<'.$h4_element.' class="'.$number_text_color.'" style="text-align:left;">'."\n";

# Current Year Watched Media Generator file includer
$mobile_version = False;
echo $computer_div;

$current_year_watched_number = ${"watched_episodes_".$local_current_year."_line_number"} - 1;
$current_year_watched_episodes_text = ${"year_".$local_current_year."_watched_episodes_text"};
$current_year_watched_time_text = ${"year_".$local_current_year."_watched_time_text"};
$current_year_watched_media_type_text =  ${"year_".$local_current_year."_watched_media_type_text"};
$media_type_text_file_lines_array = $media_type_text_file_lines_arrays[$local_current_year];
$watched_media_numbers_current_year = ${"watched_media_numbers_".$local_current_year};

$fixing = False;

if ($fixing == False) {
	require $current_year_watched_media_generator;
}

else {
	echo "<center>"."\n";

	if (in_array($website_language, $en_languages_array)) {
		echo '<'.$h2_element.' class="'.$first_text_color.' mobileHide"><b>The Archived Media of '.$selected_year.' are being fixed.</b></'.$h2_element.'>'."\n";
		echo '<'.$h4_element.' class="'.$first_text_color.' mobileShow"><b>The Archived Media of '.$selected_year.' are being fixed.</b></'.$h4_element.'>'."\n";
	}

	if (in_array($website_language, $pt_languages_array)) {
		echo '<'.$h2_element.' class="'.$first_text_color.' mobileHide"><b>As Mídias Arquivadas de '.$selected_year.' estão sendo consertadas.</b></'.$h2_element.'>'."\n";
		echo '<'.$h4_element.' class="'.$first_text_color.' mobileShow"><b>As Mídias Arquivadas de '.$selected_year.' estão sendo consertadas.</b></'.$h4_element.'>'."\n";
	}

	echo "</center>"."\n";
}

echo $div_close."\n";

# Current Year Watched Media Generator file includer
$mobile_version = True;

echo $mobile_div;

if ($fixing == False) {
	require $current_year_watched_media_generator;
}

else {
	echo "<center>"."\n";

	if (in_array($website_language, $en_languages_array)) {
		echo '<'.$h2_element.' class="'.$first_text_color.' mobileHide"><b>The Archived Media of '.$selected_year.' are being fixed.</b></'.$h2_element.'>'."\n";
		echo '<'.$h4_element.' class="'.$first_text_color.' mobileShow"><b>The Archived Media of '.$selected_year.' are being fixed.</b></'.$h4_element.'>'."\n";
	}

	if (in_array($website_language, $pt_languages_array)) {
		echo '<'.$h2_element.' class="'.$first_text_color.' mobileHide"><b>As Mídias Arquivadas de '.$selected_year.' estão sendo consertadas.</b></'.$h2_element.'>'."\n";
		echo '<'.$h4_element.' class="'.$first_text_color.' mobileShow"><b>As Mídias Arquivadas de '.$selected_year.' estão sendo consertadas.</b></'.$h4_element.'>'."\n";
	}

	echo "</center>"."\n";
}

echo $div_close;

echo '</'.$h4_element.'>'."\n";

$local_current_year = $current_year_backup;

?>