<?php 

$website_style_variable_names_array = array(
"website_background_color",
"",
);

if ($alternative_website_style == false) {
	require $website_style_file;
}

if ($alternative_website_style == True) {
	$alternative_website_style_file = $alternative_website_style_folder."Website Style.php";

	require $alternative_website_style_file;
}

# Website Style Variables Foreach.php file includer
require $website_style_variables_foreach;

?>