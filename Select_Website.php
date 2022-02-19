<?php 

$php_settings = array(
	"allow_current_year" => False,
);

$current_year = strftime("%Y");
date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/Y");

$website_author = "Stake2";
$twitter_author = $website_author."_";

$hard_drive_letter = "C";

if (file_exists($hard_drive_letter.":/Mega/") == False) {
	$hard_drive_letter = "D";
}

$index_variables_php_file = $hard_drive_letter.":/Mega/PHP/Variables/Index Variables.php";

require $index_variables_php_file;

# "Main PHP Folders" PHP File Loader
require $main_folders_and_files;

$index_php = $main_php_folder."Index.php";

$raintpl_folder = $php_folder_variables."RainTPL/";
$raintpl_class_folder = $raintpl_folder."Classes/";
$raintpl_loader = $raintpl_folder."Loader.php";

$website_title = "Select Website";
$website_titles[$website_title] = $website_title;
$website_portuguese_titles[$website_title] = "Selecionar Site";

$website_info = array(
"language" => "ptbr",
"english_title" => $website_titles[$website_title],
"portuguese_title" => $website_portuguese_titles[$website_title],
"type" => "Normal Website Type",
);

$http_method["language"] = $website_info["language"];

# Main Arrays PHP file loader
require $main_arrays_php;

# Crucial Functions PHP File Loader
require $crucial_functions_file_php;

$website_info["language_title"] = Language_Item_Definer($website_titles[$website_title], $website_portuguese_titles[$website_title]);
$website_info["language_title_with_icon"] = $website_info["language_title"];
$website_info["meta_description"] = Language_Item_Definer("Website to select one website to open and code", "Site para selecionar um site para abrir e programar");

unset($http_method["language"]);
unset($website_titles);
unset($website_portuguese_titles);

# Default Setting Values file require
require $website_settings_checker;

# Website CSS and Javascript definer
require $website_css_and_javascript_definer_php;

# Global Arrays PHP file loader
require $global_arrays_php;

# Websites Array Generator PHP file loader
require $website_arrays_generator_php;

$data = array("data" => array(
"title" => $website_info["language_title"],
"link" => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
"description" => $website_info["meta_description"],
"website_author" => $website_author,
"twitter_author" => $twitter_author,
"data" => $data,
"website_css_links" => $website_css_links,
));

$tpl = new Make_TPL($data, $tpl_dir = "Select Website/");

echo "\n";

$first_button_style = "text_black background_grey border_color_black border_3px background_hover_white";

$full_tab_style = "background_black text_grey border_color_grey border_4px";

$first_full_border = "border_4px border_color_grey";

# Select Website Form.php require
require $select_website_form;

$_SESSION["POST"] = array(
	"website" => Language_Item_Definer("The Life of Littletato", "A Vida de Pequenata"),
	"language" => "ptbr",
);

unset($_POST);

$form = Make_Form("Select");

/*
$form = '<form name="select_website" action="/Select" method="post">
		<select name="website" id="Websites">
{}
		</select>
	<br />
	<br />
	<label for="Languages"><h3>'.Language_Item_Definer("Language", "Idioma").':</h3></label>
		<select name="language" id="Languages">
{}
		</select>
	<br />
	<br />
	<input type="radio" id="Code" name="mode" value="Code" checked="True">
		<label for="Code">Code</label><br>

	<input type="radio" id="Generate" name="mode" value="Generate">
		<label for="Generate">Generate</label><br>
	<br />
	<button type="submit">'.Language_Item_Definer("Submit", "Enviar").'</button>
</form>
';

$websites = "";

foreach (array_values($website_titles) as $local_website) {
	$string = "\t\t\t".format('<option value="{}">{}</option>', array($local_website, $local_website));

	if ($local_website == "The Life of Littletato") {
		$string = str_replace("\">", '" selected="True">', $string);
	}

	$websites .= $string;

	if ($local_website != array_reverse(array_values($website_titles))[0]) {
		$websites .= "\n";
	}
}

$languages = "";

foreach ($beautiful_languages as $local_language) {
	$string = "\t\t\t".format('<option value="{}">{}</option>', array($local_language, $local_language));

	if ($local_language == "English") {
		$string = str_replace("\">", '" selected="True">', $string);
	}

	$languages .= $string;

	if ($local_language != array_reverse(array_values($beautiful_languages))[0]) {
		$languages .= "\n";
	}
}

$form = format($form, array($websites, $languages));
*/

$data = array(
	"data" => format("<h1>"."\n".
		"<b>{}:</b> <br />"."\n".
		"</h1>", array($website_info["language_title"])),

	"form" => $form,
);

$tpl -> setTpl("Body", $data);

echo "\n".
"</body>
</html>";

$slim_php = $raintpl_folder."Slim.php";

require_once $slim_php;

$app->get("/Select_Website", function() {
	header("Location: /Select_Website.php");
	exit;
});

$app->post("/Select", function() {
	var_dump($_POST);
	header("Location: /Select.php");
	exit;
});

?>