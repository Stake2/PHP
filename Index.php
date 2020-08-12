<?php

#Get the localhost link
$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

#Site variables
$url = 'https://diario.netlify.app/';
$mega_folder = 'C:/Mega/';
$mega_folder_diario = $mega_folder.'Diario/';
$sitephpfolder = $mega_folder.'PHP/';

$folder1 = 'Tabs';
$folder2 = 'Variables';
$folder3 = 'Years';
$global = 'Global';
$generic = 'Generic';

$sitephpfoldertabs = $sitephpfolder.$folder1.'/';
$sitephpfoldervars = $sitephpfolder.$folder2.'/';
$sitetabsgeralfolder = $sitephpfolder.$folder1.'/'.$generic.$folder1.'/';
$siteglobaltabsfolder = $sitephpfolder.$folder1.'/'.$global.$folder1.'/';

$php_tabs = $sitephpfoldertabs;

$php_variables = $sitephpfoldervars;
$php_vars = $sitephpfoldervars;
$php_variables_global_files = $sitephpfoldervars.$global.' Files/';
$php_vars_global_files = $php_variables_global_files;

$php_global_tabs = $siteglobaltabsfolder;

$php_tabs_variable = $php_tabs;

$main_arrays_php = $php_vars_global_files.'Main Arrays.php';
$global_arrays_php = $php_vars_global_files.'Global Arrays.php';
$website_language_and_type_definer_php = $php_vars_global_files.'Website Language And Type Definer.php';
$website_arrays_generator_php = $php_vars_global_files.'Websites Array Generator.php';
$default_setting_values_php = $php_vars_global_files.'Default Setting Values.php';
$vglobal_php = $php_variables.'VGlobal.php';
$other_index_stuff_php = $php_vars_global_files.'Other Index Stuff.php';

$website_selector_file = $php_variables.'Website Selector.php';
$genericcitiesgeneratorfile = $php_variables.'GenericCities Generator.php';
$settingsparamsfile = $php_variables.'Settings Params.php';

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

#Website selector file includer
require $website_selector_file;

#Lang modifier
$lang2 = strtoupper($lang);
$lang2 = substr_replace($lang2, '-', 2, 0);

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

#Siteheader displayer
echo $siteheader;

if ($deactivatetabs == false and $site_is_prototype == false) {
	#"Tabs loader" file loader
	require $tab_loader_php;
}

require $other_index_stuff_php;

echo $center.'
</body>
</html>';

?>