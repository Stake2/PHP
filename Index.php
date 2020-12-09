<?php

# Get the localhost link
$host_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

# Site variables
$main_website_url = 'https://diario.netlify.app/';
$hard_drive_letter = "C";
$mega_folder = $hard_drive_letter.':/Mega/';

if (!file_exists($mega_folder)) {
	$hard_drive_letter = "D";
	$mega_folder = $hard_drive_letter.':/Mega/';
}

$mega_folder_diario = $mega_folder.'Diario/';
$main_php_folder = $mega_folder.'PHP/';

$tabs_folder_variable = 'Tabs';
$variables_folder_variable = 'Variables';
$years_folder_variable = 'Years';
$global_variable = 'Global';
$generic_variable = 'Generic';

$php_folder_tabs = $main_php_folder.$tabs_folder_variable.'/';
$php_folder_variables = $main_php_folder.$variables_folder_variable.'/';
$generic_tabs_folder = $main_php_folder.$tabs_folder_variable.'/'.$generic_variable.$tabs_folder_variable.'/';
$global_tabs_folder = $main_php_folder.$tabs_folder_variable.'/'.$global_variable.$tabs_folder_variable.'/';

$php_tabs = $php_folder_tabs;

$php_variables = $php_folder_variables;
$php_vars = $php_folder_variables;

$php_variables_global_files = $php_folder_variables.$global_variable.' Files/';
$php_variables_website_classes = $php_variables_global_files.'Website Classes/';
$php_vars_global_files = $php_variables_global_files;
$php_variables_website_classes = $php_variables_global_files.'Website Classes/';
$website_classes_folder = $php_variables_website_classes;
$php_vars_website_classes = $php_variables_website_classes;

$php_global_tabs = $global_tabs_folder;

$main_arrays_php = $php_vars_global_files.'Main Arrays.php';
$global_arrays_php = $php_vars_global_files.'Global Arrays.php';
$website_language_and_type_definer_php = $php_vars_global_files.'Website Language And Type Definer.php';
$website_arrays_generator_php = $php_vars_global_files.'Websites Array Generator.php';
$default_setting_values_php = $php_vars_global_files.'Default Setting Values.php';
$vglobal_php = $php_variables.'VGlobal.php';
$other_index_stuff_php = $php_vars_global_files.'Other Index Stuff.php';

$website_selector_file = $php_variables.'Website Selector.php';
$website_style_chooser_file = $php_vars_global_files.'Website Style Chooser.php';
$website_style_variables_foreach = $php_vars_global_files.'Website Style Variables Foreach.php';
$generic_tabs_generator_file = $php_vars_global_files.'GenericCities Generator.php';
$setting_parameters_file = $php_vars_global_files.'Settings Params.php';

# Main Arrays PHP file loader
require $main_arrays_php;

# Global Arrays PHP file loader
require $global_arrays_php;

# Websites Array Generator PHP file loader
require $website_arrays_generator_php;

$year_arrays_php = $sitefolder_years.'Year Arrays.php';

# Year Arrays PHP file loader
require $year_arrays_php;

# Website Language and Type Definer PHP file loader
require $website_language_and_type_definer_php;

require $default_setting_values_php;

# Website selector file includer
require $website_selector_file;

# Language modifier
$hyphen_separated_website_language = strtoupper($website_language);
$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

if ($site_is_prototype == false) {
	#VGlobal.php variables file includer
	require $vglobal_php;
}

if ($site_is_prototype == true) {
	#VGlobal.php variables file includer
	@require $vglobal_php;
}

?>
<!DOCTYPE html>
<?php 

# Website Header displayer
echo $website_header;

if ($website_deactivate_tabs_setting == false and $site_is_prototype == false) {
	#"Tabs loader" file loader
	require $website_tabs_loader;
}

require $other_index_stuff_php;

echo '</center>
</body>
</html>';

?>