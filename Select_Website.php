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
	"language" => "pt",
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
	"language" => "pt",
	"website_setting" => "notifications",
	"story_website_setting" => "nothing"
);

unset($_POST);

$form = Make_Form("Select");

$data = array(
	"data" => format('<h1 class="text_grey">'."\n".
		"<b>{}:</b> <br />"."\n".
		"</h1>", array($website_info["language_title"])),

	"form" => $form,
	"body_color" => "background_black",
);

$tpl -> setTpl("Body", $data);

echo "\n".'<style>
.fade-animation {
	-webkit-animation: fading 1s infinite;
	animation: fading 1s infinite;
	animation-iteration-count: 1;
	animation-timing-function: ease-out;
}

@-webkit-keyframes fading {
	0% {opacity:1}
	100% {opacity:0}
}

@keyframes fading {
	0% {opacity:1}
	100% {opacity:0}
}
</style>

<script>
var button;

function Style_Element(element) {
  element.style.backgroundColor = "#808080";
  element.style.color = "black";
}

option_elements = document.getElementsByTagName("option");
option_elements_array = Array.from(option_elements);
option_elements_array.forEach(Style_Element);

function insertAfter(new_node, reference_node) {
    reference_node.parentNode.insertBefore(new_node, reference_node.nextSibling);
}

function Language_Item_Definer(item_english, item_portuguese) {
  var user_language = navigator.website_language || navigator.userLanguage || navigator.language;

	if (user_language.includes("en")) {
		return item_english;
	}

	if (user_language.includes("pt")) {
		return item_portuguese;
	}
}

var configuration_inputs_text = " " + Language_Item_Definer("configuration inputs", "entradas de configuração");
var hide_text = Language_Item_Definer("Hide", "Esconder") + configuration_inputs_text;
var show_text = Language_Item_Definer("Show", "Mostrar") + configuration_inputs_text;

function Add_Button(element) {
	var br = document.createElement("br");

	button = document.createElement("button");
	button.classList = "text_black background_grey border_color_black border_3px background_hover_white";
	button.style.borderRadius = "50px";
	button.type = "button";
	button.innerHTML = "<b>" + show_text + "</b>";
	button.onclick = function() {
		Show_Configuration();
	};

	insertAfter(button, element);
	insertAfter(br, button);
}

function Hide_Element(element) {
	element.classList = "spoiler_content fade-animation";
	setTimeout(function() {
		element.style.display = "none";
	}, 800);

	button.onclick = function() {
		Show_Element(element);
	};

	button.innerHTML = "<b>" + hide_text + "</b>";
}

function Show_Element(element) {
	element.style.display = "block";
	element.classList = "spoiler_content w3-animate-zoom";

	button.onclick = function() {
		Hide_Configuration();
	};

	button.innerHTML = "<b>" + hide_text + "</b>";
}

function Show_Configuration() {
	spoiler_divs_array.forEach(Show_Element);
}

function Hide_Configuration() {
	spoiler_divs_array.forEach(Hide_Element);
}

var spoiler_divs = document.getElementsByClassName("spoiler_content");

spoiler_divs_array = Array.from(spoiler_divs);
spoiler_divs_array.forEach(Add_Button);
</script>'."\n";

echo "\n".
"</body>
</html>";

$slim_php = $raintpl_folder."Slim.php";

require_once $slim_php;

$app->get("/Select_Website", function() {
	header("Location: /Select_Website.php");
	exit;
});

?>