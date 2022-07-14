<?php

session_start();

$php_settings = array(
	"allow_current_year" => False,
);

$website_request = False;
$set_session = False;

if ($_POST == [] and isset($_SESSION["POST"]) == True) {
	$_POST = $_SESSION["POST"];
	$set_session = True;
}

if ($_POST == [] and isset($_SESSION["POST"]) == False) {
	$php_settings["method"] = $_POST;
}

if ($_POST != []) {
	$_SESSION["POST"] = $_POST;

	$php_settings["method"] = $_POST;

	$website_request = True;
}

if ($_POST == [] and $_GET != []) {
	$_SESSION["GET"] = $_GET;

	$php_settings["method"] = $_GET;

	$website_request = True;
}

$http_method = $php_settings["method"];

if (isset($return) == False) {
	$return = False;
}

$current_year = strftime("%Y");

$website_author = "Stake2";
$twitter_author = $website_author."_";

$hard_drive_letter = "C";

if (file_exists($hard_drive_letter.":/Mega/") == False) {
	$hard_drive_letter = "D";
}

$index_variables_php_file = $hard_drive_letter.":/Mega/PHP/Variables/Index Variables.php";

require $index_variables_php_file;

$global_texts_php = $global_files_folder."Global Texts.php";
$global_style_file_php = $global_files_folder."Global Style.php";

$sql_php = $database_folder."SQL.php";

$website_info = array();

# "Main PHP Folders" PHP File Loader
require $main_folders_and_files;

# Crucial Functions PHP File Loader
require $crucial_functions_file_php;

if (strpos($_SERVER["REQUEST_URI"], "Website%20HTML") == False) {
	$slim_php = $raintpl_folder."Slim.php";

	require_once $slim_php;

	$app->get("/", function() {
		$useless_variable = "";
	});

	$app->post("/", function() {
		$useless_variable = "";
	});

	$app->get("/Website%20HTML%20File%20Generator.php", function() {
		$useless_variable = "";
	});

	$app->get("/Select%20Website", function() {
		header("Location: /Select_Website.php");
		exit;
	});

	$app->post("/Select", function() {
		$form = '<form name="select_website" action="{}" method="post" style="display: none;">
	<label for="Websites"><h3>Websites:</h3></label>
	<select name="website" id="Websites" value="{}">
	</select>
	<label for="Languages"><h3>Language:</h3></label>
	<select name="language" id="Languages" value="{}">
	</select>
	<select name="website_settings" value="{}">
	<select name="story_website_settings" value="{}">
	<button type="submit">Submit</button>
</form>

<script>
	document.forms["select_website"].submit();
</script>
		';

		if ($_POST["mode"] == "Code") {
			$website = "Index.php";
		}

		if ($_POST["mode"] == "Generate") {
			$_POST["website_setting"] = "nothing";
			$website = "Website HTML File Generator.php";
		}

		$form = format($form, array($website, $_POST["website"], $_POST["language"], $_POST["website_setting"], $_POST["story_website_setting"]));

		echo $form;
	});

	$app->run();
}

# Main Arrays PHP file loader
require $main_arrays_php;

# Website Language Definer file require
require $website_language_definer_php;

# Global Arrays PHP file loader
require $global_arrays_php;

# Connect to Database
require $sql_php;

# Websites Array Generator PHP file loader
require $website_arrays_generator_php;

# Default Setting Values file require
require $website_settings_checker;

# Variable Inserter PHP file loader
require $website_variable_inserter_php;

# Global CSS variables loader
require $global_style_file_php;

# Global Texts PHP file loader
require $global_texts_php;

# Website selector file require
require $website_selector_file;

# Check website setting and story website setting on $_POST
Check_Website_Setting();

if (strpos($_SERVER["REQUEST_URI"], "Index.php") == True and $website_settings["notifications"] == True) {
	$website_settings["notifications"] = False;
}

# V_Global.php variables file require
require $v_global_php;

Write_To_File($websites_list_folder."Mixed Websites.txt", Stringfy_Array($mixed_websites));

Write_To_File($websites_list_folder."English Websites.txt", Stringfy_Array($websites));
Write_To_File($websites_list_folder."English Websites Array.txt", "[".Stringfy_Array($array_english_websites)."]");
Write_To_File($websites_list_text_files_local."English Websites Array.txt", "[".Stringfy_Array($array_english_websites)."]");

Write_To_File($websites_list_folder."Portuguese Websites.txt", Stringfy_Array(array_values($website_portuguese_titles)));

Write_To_File($websites_list_folder."Portuguese Websites Keyed.txt", "{".Stringfy_Array($keyed_portuguese_websites)."}");
Write_To_File($websites_list_text_files_local."Portuguese Websites Keyed.txt", "{".Stringfy_Array($keyed_portuguese_websites)."}");

Write_To_File($websites_list_folder."English Websites Keyed.txt", "{".Stringfy_Array($keyed_english_websites)."}");

# RainTPL Loader.php require
require $raintpl_loader;

// Draw the template
$tpl->draw("Head");

echo "\n";

$tpl->draw("Body");

$tpl->draw("Header Descriptions/".$website_info["type"]);

echo $div_close."\n";
echo "<!-- End of header -->";

echo "\n"."\n";

echo "<br />"."<br />"."\n";

# Select Website Form.php require
require $select_website_form;

if (strpos($_SERVER["REQUEST_URI"], "Website%20HTML") == False and $website_function_settings["select_website_form"] == True) {
	echo Make_Form();
}

if ($website_function_settings["tabs"] == True and $website_settings["custom_layout"] == False and $website_info["language"] != $language_geral) {
	# "Tabs loader" file loader
	echo "<!-- Start of website tabs -->"."\n";
	require $website_tabs_loader;
	echo "<!-- End of website tabs -->"."\n";
}

require $website_extra_website_things;

if ($website_info["language"] != $language_geral) {
	echo "<script>"."\n".
	"Define_Colors_And_Styles();"."\n".
	"</script>"."\n\n";
}

echo '</body>
</html>';

$full_website = $tpl->draw("Head", True);

$full_website .= "\n";

$full_website .= $tpl->draw("Body", True);

$full_website .= $tpl->draw("Header Descriptions/".$website_info["type"], True);

$full_website .= $div_close."\n";
$full_website .= "<!-- End of header -->";

$full_website .= "\n"."\n";

if ($website_function_settings["tabs"] == True and $website_settings["custom_layout"] == False) {
	# "Tabs Loader" file loader

	$full_website .= "<!-- Start of website tabs -->"."\n";

	ob_start();
	require $website_tabs_loader;
	$full_website .= ob_get_clean();

	$full_website .= "<!-- End of website tabs -->"."\n";
}

ob_start();
require $website_extra_website_things;
$full_website .= ob_get_clean();

if ($website_info["language"] != $language_geral) {
	$full_website .= "<script>"."\n".
	"Define_Colors_And_Styles();"."\n".
	"</script>"."\n\n";
}

if ($website_settings["custom_layout"] == False) {
	$full_website .= '</center>'."\n";
}

$full_website .= '</body>
</html>';

if (in_array($website_info["english_title"], $year_websites) == True) {
	$year_summary_file = $year_language_folders[$full_language][$website_info["english_title"]].Language_Item_Definer("Summary", "Sumário").".txt";

	if ($website_info["english_title"] == "2020" and $website_info["language"] == $language_ptbr) {
		$year_summary_text = substr_replace($year_summary_text, "", -1);
	}

	Write_To_File($year_summary_file, $year_summary_text);
}

?>