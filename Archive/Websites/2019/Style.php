<?php 

/*

Array that has the name of the variables inside the global_website_style_variable_names_array ("website_background_color").

Array that has the CSS variables, "called website_style_variables_array" ($background_color = $background_brown_css_class).

Foreach that cycles through the "website_style_variables_array" array and created global_variable "website_(css variable name here)" variables like:
$website_background_color = $website_style_variables_array[$i];

# Fazer amarelo para select e border amarela para sub-tab

*/

$website_style_variables_array = array(
$background_color = $background_grey_css_class,
$header_background_color = $background_black_css_class,
$tab_background_color = $background_black_css_class,
$additional_background_color = $background_grey_css_class,

$first_text_color = $text_grey_css_class,
$second_text_color = "w3-text-white",
$third_text_color = $text_hover_yellow_css_class,
$tab_text_color = $first_text_color,

$first_border_color = $border_color_grey_css_class,
$second_border_color = $border_color_grey_css_class,
$third_border_color = $border_color_black_css_class,
$tab_border_color = $border_color_grey_css_class,
$websites_tab_border_color = $border_color_black_css_class,

$first_button_color = $additional_background_color,
$second_button_color = $background_color,
$click_button_color = $background_cyan_css_class,

$border_color = $default_border_color,
$border_size = $default_border_color,

$first_full_border = $first_border_color." ".$border_4px_solid_css_class,
$second_full_border = $third_border_color." ".$border_3px_solid_css_class,
$third_full_border = $third_border_color." ".$border_1px_solid_css_class,
$header_full_border = $first_border_color." ".$border_1px_solid_css_class,
$tab_full_border = $tab_border_color." ".$border_4px_solid_css_class,
$alternative_tab_full_border = $tab_border_color." ".$border_1px_solid_css_class,

$full_tab_style = $tab_background_color." ".$tab_text_color." ".$tab_full_border,
$alternative_full_tab_style = $background_color." ".$default_text_color,

$first_button_style = $default_text_color." ".$first_button_color." ".$second_full_border." ".$default_background_hover_color,
$second_button_style = $default_text_color." ".$first_button_color." ".$second_full_border." ".$default_background_hover_color,

$computer_image_size = "33",
$mobile_image_size = "55",

$form_color_border = $border_4px_solid_black_css_class,
$form_color_foreground = $background_brown_css_class,
$form_color_background = $background_darker_brown_css_class,
$form_color_text = $text_black_css_class,
$full_form_send_button_style = $border_3px_solid_black_css_class." ".$form_color_background." ".$form_color_text,
$full_form_style = $form_color_border." ".$form_color_foreground." ".$form_color_text,
);

$website_image_size_computer = $computer_image_size;
$website_image_size_mobile = $mobile_image_size;

$website_border_color = $first_border_color;

# Website Style Variables Foreach.php file includer
require $website_style_variables_foreach;

?>