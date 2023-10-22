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
require $folders["mega"]["php"]["modules"]["root"]."lib_autolink.php";

# Loads the classes, including the module ones (Slim, RainTPL)
require $folders["mega"]["php"]["classes"]["loader"];

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
	require $folders["mega"]["php"]["classes"]["loader"];
}

# Creates the "website" array and populates it
require $folders["php"]["website"];

# Runs the SQL.php file to update database with website information
require $folders["php"]["sql"];

# Assign website array and Language class instance variables to RainTPL
$tpl -> assign("website", $website);
$tpl -> assign("Language", $Language);
$tpl -> assign("parse", $parse);

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
	$html_file = $website["data"]["folders"]["local_website"]["language"]."Index.html";

	# Define website state
	if (file_exists($html_file) == False) {
		$website["state"] = $website["language_texts"]["the_website_file_did_not_exist_the_new_content_was_written_into_it"];
	}

	if (file_exists($html_file) == True) {
		$website["state"] = $website["language_texts"]["the_website_file_was_updated_with_the_new_content"];
	}

	# Update HTML file with website contents
	$File -> Edit($html_file, $website["html"], "w");

	# Show information about generated website
	$website["data"]["description"]["html"] = Text::Format($website["language_texts"]["website_to_generate_the_website_{}"], $website["data"]["titles"]["language"]);

	# Make backup of website title and define website title for Generate route
	$website["data"]["titles"]["backup"] = $website["data"]["titles"]["language"];
	$website["data"]["titles"]["language"] = $website["language_texts"]["generate_website"].': "'.$website["data"]["titles"]["backup"].'"';
	$website["data"]["titles"]["sanitized"] = str_replace('"', "'", $website["data"]["titles"]["language"]);

	# Define website link
	$website["data"]["links"]["language"] = $website["local_url"]["index"];

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

	if (isset($website["mode"]) and $website["mode"] == "Generate") {
		header("Location: /generate");
		exit;
	}

	$tpl -> draw("Body");
});

$slim -> post("/", function() {
	global $tpl;
	global $website;

	if (isset($website["mode"]) and $website["mode"] == "Generate") {
		header("Location: /generate");
		exit;
	}

	$tpl -> draw("Body");
});

# Define route for the Select website page
$slim -> get("/select", function() {
	global $tpl;
	global $website;

	$website["data"]["titles"] = [
		"language" => $website["language_texts"]["select_website"]
	];

	$website["data"]["titles"]["sanitized"] = str_replace('"', "'", $website["data"]["titles"]["language"]);

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