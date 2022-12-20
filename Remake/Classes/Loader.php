<?php 

# Loader

# Register autoload
spl_autoload_register(
	function($class_name) {
		global $folders;

		$file = $folders["mega"]["php"]["classes"]["root"].$class_name.".php";

		if (file_exists($file) == True) {
			require $file;
		}

		if (file_exists($file) == False) {
			echo $class_name."<br>";
			echo $folders["mega"]["php"]["modules"]["root"].$class_name.".php";
			require $folders["mega"]["php"]["modules"]["root"].$class_name.".php";
		}
	}
);

# File class initiation
$File = new File();

$class_list = $File -> Contents($folders["mega"]["php"]["classes"]["class_list"])["lines"];

# Initiation of classes
foreach ($class_list as $class) {
	${$class} = new $class;
}

# Remove autoload function
$functions = spl_autoload_functions();

foreach($functions as $function) {
	spl_autoload_unregister($function);
}

require $folders["mega"]["php"]["modules"]["root"]."Loader.php";

?>