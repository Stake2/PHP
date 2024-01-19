<?php

# Index.php

session_start();

# Load the "Folders.php" file to define the folders
require "Folders.php";

if (function_exists("str_contains") == False) {
    function str_contains($haystack, $needle) {
        return $needle !== "" && mb_strpos($haystack, $needle) !== False;
    }
}

if (function_exists("array_insert") == False) {
	function array_insert(&$array, $position, $insert) {
		if (is_int($position)) {
			array_splice($array, $position, 0, $insert);
		}

		else {
			$position = array_search($position, array_keys($array));

			$array = array_merge(
				array_slice($array, 0, $position),
				$insert,
				array_slice($array, $position)
			);
		}

		return $array;
	}
}

# Load the auto linker
require $folders["Mega"]["PHP"]["Modules"]["root"]."lib_autolink.php";

# Loads the classes, including the module ones (Slim, RainTPL)
require $folders["Mega"]["PHP"]["Classes"]["Loader"];

if (isset($parse) == False) {
	$parse = parse_url($_SERVER["REQUEST_URI"])["path"];
}

# Define the local switches
$switches = $Global_Switches -> global_switches;

$has_switches = False;

# Check if the "_GET" variable contains switches
foreach (array_keys($Global_Switches -> global_switches) as $switch) {
	if (
		isset($_GET[$switch]) == True or 
		isset($_POST[$switch]) == True
	) {
		if (isset($_GET[$switch]) == True) {
			$method = $_GET;
		}

		if (isset($_POST[$switch]) == True) {
			$method = $_POST;
		}

		$switches[$switch] = (string)$method[$switch];
		$switches[$switch] = filter_var($method[$switch], FILTER_VALIDATE_BOOLEAN);

		$has_switches = True;
	}
}

# Switch to either the default switches or the modified ones
$Global_Switches -> Switch($switches);

# If the local switches and global switches were not equal, reload classes
if ($switches != $Global_Switches -> switches) {
	# Loads the classes, including the module ones (Slim, RainTPL)
	require $folders["Mega"]["PHP"]["Classes"]["Loader"];
}

# Creates the "website" array and fills it
require $folders["PHP"]["Website"];

# Runs the "SQL.php" file to update the database with the website information
require $folders["PHP"]["SQL"];

# Assign the website array and the Language class instance variables to RainTPL
$tpl -> assign("website", $website);
$tpl -> assign("Language", $Language);
$tpl -> assign("parse", $parse);
$tpl -> assign("website", $website);

function Generate_Website() {
	global $tpl;
	global $website;
	global $folders;
	global $parse;
	global $File;

	# Create website HTML for generate route
	$website["html"] = "";

	$website["html"] .= $tpl -> draw("Head", $toString = True);

	if ($website["language"] != "general") {
		$website["html"] .= $tpl -> draw("Body", $toString = True);
	}

	$website["html"] .= $tpl -> draw("Footer", $toString = True);

	# Define HTML file for website
	$html_file = $website["Data"]["Folders"]["Local website"]["Language"]."Index.html";

	# Define website state
	if (file_exists($html_file) == False) {
		$website["state"] = $website["Language texts"]["the_website_file_did_not_exist_the_new_content_was_written_into_it"];
	}

	$old_contents = $File -> Contents($html_file, $add_br = False, $add_n = False);

	# Update the HTML file with the website contents
	$File -> Edit($html_file, $website["html"], "w");

	$new_contents = $File -> Contents($html_file, $add_br = False, $add_n = False);

	if (file_exists($html_file) == True) {
		$website["state"] = $website["Language texts"]["the_website_file_was_not_updated"];

		if ($old_contents["string"] != $new_contents["string"]) {
			$website["state"] = $website["Language texts"]["the_website_file_was_updated_with_the_new_content"];
		}
	}

	# Show information about generated website
	$website["Data"]["description"]["html"] = Text::Format($website["Language texts"]["website_to_generate_the_website_{}"], $website["Data"]["titles"]["language"]);

	# Make backup of website title and define website title for Generate route
	$website["Data"]["titles"]["backup"] = $website["Data"]["titles"]["language"];
	$website["Data"]["titles"]["language"] = $website["Language texts"]["generate_website"].': "'.$website["Data"]["titles"]["backup"].'"';
	$website["Data"]["titles"]["sanitized"] = str_replace('"', "'", $website["Data"]["titles"]["language"]);

	# Define the website meta title
	$website["Meta title"] = str_replace('"', "'", $website["Data"]["titles"]["language"]);

	# Define website link
	$website["Data"]["links"]["language"] = $website["Local URL"]["Index"];

	# Remove JavaScript stuff
	$website["javascript"]["links"] = "";
	$website["javascript"]["links"] = "";
	$website["javascript"]["class_attributes"]["body"] = "";
	$parse = "/";

	Generate_Form();

	$website["content"] = "<br />"."<br />"."<br />"."<br />"."<br />"."\n\n".
	$website["form"];

	$tpl -> assign("website", $website);
	$tpl -> assign("parse", $parse);
	$tpl -> draw("Generate/Body", False);
}

# Define route for the Index ("Code" programming mode)
$slim -> get("/", function() {
	global $tpl;
	global $parse;
	global $website;

	if (
		isset($website["mode"]) and
		$website["mode"] == "Generate"
	) {
		header("Location: /generate");
		exit;
	}

	$tpl -> draw("Body");
});

$slim -> post("/", function() {
	global $tpl;
	global $website;

	if (
		isset($website["mode"]) and
		$website["mode"] == "Generate"
	) {
		header("Location: /generate");
		exit;
	}

	$tpl -> draw("Body");
});

# Define route for the Select website page
$slim -> get("/select", function() {
	global $tpl;
	global $website;

	$website["Data"]["titles"] = [
		"language" => $website["Language texts"]["select_website"]
	];

	$website["Data"]["titles"]["sanitized"] = str_replace('"', "'", $website["Data"]["titles"]["language"]);

	$website["content"] = "<br />"."<br />"."<br />"."<br />"."<br />"."\n\n".
	$website["form"];

	$tpl -> assign("website", $website);
	$tpl -> draw("Select/Body");
});

# Define route for the Generate programming mode
$slim -> get("/generate", function() {
	Generate_Website();
});

$slim -> post("/generate", function() {
	Generate_Website();
});

# Run the Slim app to check routes
$slim -> run();

if ($website["verbose"] == True) {
	if ($_POST != []) {
		Text::Show_Variable($_POST);
	}

	if ($_GET != []) {
		Text::Show_Variable($_GET);
	}
}

?>