<?php 

# Session
session_start();

# POST and GET definition
if ($_POST == [] and isset($_SESSION["POST"]) == True and $_GET == []) {
	$_POST = $_SESSION["POST"];
}

if ($_POST == [] and isset($_SESSION["POST"]) == False and $_GET == []) {
	$php_settings["method"] = $_POST;
}

if ($_POST == [] and $_GET != []) {
	$_SESSION["GET"] = $_GET;

	$php_settings["method"] = $_GET;
}

if ($_POST != []) {
	$_SESSION["POST"] = $_POST;

	$php_settings["method"] = $_POST;
}

$http_method = $php_settings["method"];

# Define folders array
$folders = [
	"hard_drive_letter" => substr(__FILE__, 0, 2)."/"
];

# Define root folders
foreach (["Apps", "Mega", "Mídias"] as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders[$key] = [
		"root" => $folders["hard_drive_letter"].$item."/"
	];
}

# Define Apps folders
foreach (["Module files", "Modules"] as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["apps"][$key] = [
		"root" => $folders["apps"]["root"].$item."/"
	];
}

# Define "Module files" files
$folders["apps"]["module_files"]["utility"]["language"] = [
	"root" => $folders["apps"]["module_files"]["root"]."Language/"
];

$folders["apps"]["module_files"]["utility"]["language"]["languages"] = $folders["apps"]["module_files"]["utility"]["language"]["root"]."Languages.json";

# Define Mega folders
foreach (["Bloco De Notas", "Image", "PHP", "Stories", "Websites"] as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"][$key] = [
		"root" => $folders["mega"]["root"].$item."/"
	];
}

# Define PHP folders
foreach (["Variables", "Websites"] as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"][$key] = [
		"root" => $folders["mega"]["php"]["root"].$item."/"
	];
}

# Define PHP Variables folders
foreach (["Classes", "Database", "Functions", "Global Files", "RainTPL", "Story", "Website"] as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"]["variables"][$key] = [
		"root" => $folders["mega"]["php"]["variables"]["root"].$item."/"
	];
}

# Define PHP Variables files
foreach (["Folders and Files", "Variables", "Website Definer"] as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"]["variables"][$key] = $folders["mega"]["php"]["variables"]["root"].$item.".php";
}

# Define text files folder on Classes folder
$folders["mega"]["php"]["variables"]["classes"]["text_files"] = [
	"root" => $folders["mega"]["php"]["variables"]["classes"]["root"]."Text files/"
];

# Switches file
$folders["mega"]["php"]["variables"]["classes"]["text_files"]["switches"] = $folders["mega"]["php"]["variables"]["classes"]["text_files"]["root"]."Switches.txt";

# Class list file
$folders["mega"]["php"]["variables"]["classes"]["class_list"] = $folders["mega"]["php"]["variables"]["classes"]["root"]."Class list.txt";

# Define Database file
$folders["mega"]["php"]["variables"]["database"]["sql"] = $folders["mega"]["php"]["variables"]["database"]["root"]."SQL.php";

# Define PHP Variables "Global Files" files
foreach (["Arrays", "Style", "Texts", "Main Arrays"] as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"]["variables"]["global_files"][$key] = $folders["mega"]["php"]["variables"]["global_files"]["root"].$item.".php";
}

# Website variables
$folders["mega"]["websites"]["subdomain"] = $folders["mega"]["websites"]["root"]."Subdomain.txt";

# Register autoload
spl_autoload_register(
	function($class_name) {
		global $folders;

		require $folders["mega"]["php"]["variables"]["classes"]["root"].$class_name.".php";
	}
);

# File class initiation
$File = new File();

$class_list = $File -> Contents($folders["mega"]["php"]["variables"]["classes"]["class_list"])["lines"];

# Initiation of classes
foreach ($class_list as $class) {
	${$class} = new $class;
}

# Website dictionary
$website = [
	"author" => "Stake2",
	"format" => "https://{}.{}/",
	"netlify" => "netlify.app",
	"subdomain" => $File -> Contents($folders["mega"]["websites"]["subdomain"])["lines"][0],
];

$website["netlify_format"] = "https://{}.".$website["netlify"]."/";

$website["url"] = $Text -> format($website["format"], array($website["subdomain"], $website["netlify"]));

# Remove autoload function
$functions = spl_autoload_functions();

foreach($functions as $function) {
	spl_autoload_unregister($function);
}

?>