<?php 

$website_style_variable_names_array = array(
"website_background_color",
);

#$website_;

/*
Array that has the name of the variables inside the global_website_style_variable_names_array ("website_background_color").

Array that has the CSS variables, "called website_style_variables_array" ($background_color = $background_brown_css_class).

Foreach that cycles through the "website_style_variables_array" array and created global "website_(css variable name here)" variables like:
$website_background_color = $website_style_variables_array[$i];

*/

$website_style_variables_array = array(
$background_color = $background_brown_css_class,
$header_background_color = $background_black_css_class,
$tab_background_color = $background_brown_css_class,
$additional_background_color = $background_brown_css_class,

$first_border_color = $border_color_brown_css_class,
$second_border_color = $border_color_brown_css_class,
$third_border_color = $border_color_black_css_class,
$button_color = $background_brown_css_class,
$button_border = $default_border_color,

$first_text_color = $text_brown_css_class,
$second_text_color = 'w3-text-orange',
$third_text_color = 'w3-text-white',

$button_border = $first_text_color." ".$button_color." ".$button_border,

$computer_image_size = "",
$mobile_image_size = "",

$form_color_border = $background_brown_css_class,
$form_color_background = $background_dark_brown_css_class,
$form_color_text = $text_black_css_class,

# Variables that mixes CSS tags
$textstyle = $colortext.' blackbg',
$textstyle2 = 'w3-text-black bg',
$btnstyle = $color4.' '.$cssbtn1.$global_classes,
$btnstyle2 = $color3.' '.$cssbtn1.$global_classes,
$btnstyle3 = $color5.' '.$cssbtn1.$global_classes,
$subtextspan = '<span class="'.$colorsubtext2.'">',
$subtextspan2 = '<span class="'.$colorsubtext.'">',
$spannewtextcolor = $subtextspan,
$sitewhilestyle = $color4,
$formcolor = $color4,

# HTML and HTML Style variables
$marginstyle1 = 'style="margin:10%,border-width:3px,border-color:'.$color3.',border-style:solid,'.$roundedborderstyle2.'"',
$marginstyle2 = 'style="margin-right:70%,border-width:3px,border-color:'.$color3.',border-style:solid,'.$roundedborderstyle2.'"',
$marginstyle3 = 'style="margin-right:70%,border-width:3px,border-color:'.$color3.',border-style:solid,'.$roundedborderstyle2.'"',
$border = 'border-width:4px,border-color:'.$color3.',border-style:solid,',
$border2 = 'border-width:7px,border-color:'.$color3.',border-style:solid,',
$h2 = '<'.$n.' class="'.$computervar.' '.$textstyle.'" style="margin:10%,border-width:3px,border-color:'.$color3.',border-style:solid,'.$roundedborderstyle2.'">','.$roundedborderstyle2.',
$h4 = '<'.$m.' class="'.$mobilevar.' '.$textstyle.'" style="margin:10%,border-width:3px,border-color:'.$color3.',border-style:solid,">',
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%,border-width:3px,border-color:'.$color3.',border-style:solid,'.$roundedborderstyle2.'">',
$widthsize = '',
$size = '',
);

$i = 0;
foreach ($website_style_variable_names_array as $value) {
	${$value} = $website_style_variables_array[$i];

	$i++;
}

?>