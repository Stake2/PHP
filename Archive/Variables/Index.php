<?php

# Variables PHP file loader
require "Variables.php";

require "PHP Settings.php";

$current_year = strftime("%Y");

# Loader of "Folders and Files" PHP file
require $folders["mega"]["php"]["variables"]["folders_and_files"];

# Loader of "Main Arrays" PHP file
require $folders["mega"]["php"]["variables"]["global_files"]["main_arrays"];

# Crucial Functions PHP File Loader
require $crucial_functions_file_php;

# Global Arrays PHP file loader
require $folders["mega"]["php"]["variables"]["global_files"]["arrays"];

if (strpos($_SERVER["REQUEST_URI"], "Website%20HTML") == False) {
	$slim_php = $raintpl_folder."Slim.php";

	require_once $slim_php;

	$app->get("/", function() {
		global $http_method;

		if (isset($http_method) == False) {
			$route = "Select Website";
			$link = "http://php.stake2.site:8080/Select_Website.php";
			echo "<!DOCTYPE HTML>"."\n";
			echo "<head>"."\n";
			echo "<title>Index.php</title>";
			echo '<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/lib/w3.css" />'."\n";
			echo '<link rel="stylesheet" type="text/css" href="'.$website["url"].'CSS/Styler CSS/Main_CSS.css" />'."\n";
			echo '<link rel="stylesheet" type="text/css" href="'.$website["url"].'CSS/Styler CSS/Colors.css" />'."\n";
			echo "</head>"."\n";
			echo '<body style="background-color:black">'."\n";
			echo "<center>"."\n";
			echo '<h1 class="text_grey"><b>'.format(Language_Item_Definer('No website or language was selected.<br />Please use the route "{}" to select a website', 'Nenhum site ou idioma foi selecionado.<br />Por favor utilize a rota "{}" para selecionar um site'), $route).":"."</b></h1>"."\n";
			echo Create_Element("h2", "", Create_Element("a", "text_grey background_black", $link, 'href="'.$link.'"'))."\n";
			echo "</center>"."\n";
			echo "</body>"."\n";
			echo "</html>";
			exit();
		}
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

# Connect to Database
require $folders["mega"]["php"]["variables"]["database"]["sql"];

# Websites Array Generator PHP file loader
require $website_arrays_generator_php;

# Default Setting Values file require
require $website_settings_checker;

# Variable Inserter PHP file loader
require $website_variable_inserter_php;

# Global CSS variables loader
require $folders["mega"]["php"]["variables"]["global_files"]["style"];

# Global Texts PHP file loader
require $folders["mega"]["php"]["variables"]["global_files"]["texts"];

# Website selector file require
require $folders["mega"]["php"]["variables"]["website_definer"];

# Check website setting and story website setting on $_POST
Check_Website_Setting();

if (strpos($_SERVER["REQUEST_URI"], "Index.php") == True and $website_settings["notifications"] == True) {
	$website_settings["notifications"] = False;
}

# V_Global.php variables file require
require $folders["mega"]["php"]["variables"]["variables"];

Write_To_File($websites_list_folder."Mixed websites.txt", Stringfy_Array($mixed_websites));

Write_To_File($websites_list_folder."English websites.txt", Stringfy_Array($websites));
Write_To_File($websites_list_folder."English websites array.txt", "[".Stringfy_Array($array_english_websites)."]");
Write_To_File($websites_list_text_files_local."English websites array.txt", "[".Stringfy_Array($array_english_websites)."]");

Write_To_File($websites_list_folder."Portuguese websites.txt", Stringfy_Array(array_values($website_portuguese_titles)));

Write_To_File($websites_list_folder."Portuguese websites keyed.txt", "{".Stringfy_Array($keyed_portuguese_websites)."}");
Write_To_File($websites_list_text_files_local."Portuguese websites keyed.txt", "{".Stringfy_Array($keyed_portuguese_websites)."}");

Write_To_File($websites_list_folder."English websites keyed.txt", "{".Stringfy_Array($keyed_english_websites)."}");

Write_To_File($websites_list_folder."Website links.txt", "{".Stringfy_Array(array_values($website_links))."}");
Write_To_File($websites_list_text_files_local."Website links.txt", "{".Stringfy_Array(array_values($website_links))."}");

# RainTPL Loader.php require
require $raintpl_loader;

// Draw the template
$tpl->draw("Head");

echo "\n";

$tpl->draw("Body");

$tpl->draw("Header Descriptions/".$website_information["type"]);

echo $div_close."\n";
echo "<!-- End of header -->";

echo "\n"."\n";

echo "<br />"."<br />"."\n";

# Select Website Form.php require
require $select_website_form;

if (strpos($_SERVER["REQUEST_URI"], "Website%20HTML") == False and $website_function_settings["select_website_form"] == True) {
	echo Make_Form();
}

if ($website_function_settings["tabs"] == True and $website_settings["custom_layout"] == False and $website_information["language"] != $language_geral) {
	# "Tabs loader" file loader
	echo "<!-- Start of website tabs -->"."\n";
	require $website_tabs_loader;
	echo "<!-- End of website tabs -->"."\n";
}

require $website_extra_website_things;

if ($website_information["language"] != $language_geral) {
	echo "<script>"."\n".
	"Define_Colors_And_Styles();"."\n".
	"</script>"."\n\n";
}

echo "</body>
</html>";

$full_website = $tpl->draw("Head", True);

$full_website .= "\n";

$full_website .= $tpl->draw("Body", True);

$full_website .= $tpl->draw("Header Descriptions/".$website_information["type"], True);

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

if ($website_information["language"] != $language_geral) {
	$full_website .= "<script>"."\n".
	"Define_Colors_And_Styles();"."\n".
	"</script>"."\n\n";
}

if ($website_settings["custom_layout"] == False) {
	$full_website .= '</center>'."\n";
}

$full_website .= "</body>
</html>";

Text::Show_Variable($website_information);

?>