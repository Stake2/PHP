<?php 

# Loader.php

# Register autoload
spl_autoload_register(
	function($class_name) {
		global $folders;

		$file = $folders["Mega"]["PHP"]["Classes"]["root"].$class_name.".php";

		if (file_exists($file) == True) {
			require $file;
		}

		if (file_exists($file) == False) {
			echo $class_name."<br>";
			echo $folders["Mega"]["PHP"]["Modules"]["root"].$class_name.".php";
			require $folders["Mega"]["PHP"]["Modules"]["root"].$class_name.".php";
		}
	}
);

# File class initiation
$File = new File();

$JSON = new JSON();

$class_list = $File -> Contents($folders["Mega"]["PHP"]["Classes"]["Class list"])["lines"];

# Initiation of classes
foreach ($class_list as $class) {
	${$class} = new $class();
}

# Remove autoload function
$functions = spl_autoload_functions();

foreach($functions as $function) {
	spl_autoload_unregister($function);
}

require $folders["Mega"]["PHP"]["Modules"]["root"]."Loader.php";

?>