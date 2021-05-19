<?php

function Include_Classes($class_name) {
	$class_php_file = $class_name.".php";
	$website_classes_folder = $GLOBALS["website_classes_folder"];

	$class_php_file_inside_folder = $website_classes_folder.$class_php_file;

	if (file_exists($class_php_file)) {
		require_once($class_php_file);
	}

	else if (file_exists($class_php_file_inside_folder)) {
		require_once($class_php_file_inside_folder);
	}
}

Include_Classes("Website Info Interface and Abstract Class");
Include_Classes("Website Style Interface and Abstract Class");
#require($website_classes_folder."Website_Info.php");
#require($website_classes_folder."Website_Style.php");

spl_autoload_register("Include_Classes");

$website_style = new Website_Style();
$website_style -> set_style_file($current_website_folder);
$website_style_file = $website_style -> get_style_file();

$website_info = new Website_Info($website_title_header, $website_meta_description, $website_header_description, $website_images_variable);

$website_header_title = $website_info -> get_title();
$website_description = $website_info -> get_description();
$website_header_description = $website_info -> get_header_description();
$website_images = $website_info -> get_images();

?>