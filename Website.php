<?php

# Website.php

require "Functions.php";

$website = [
	"author" => "Izaque Sanvezzo (Stake2, Funkysnipa Cat)",
	"Twitter author" => "Stake2",
	"format" => "https://{}.{}/"
];

$json = $JSON -> To_PHP($folders["mega"]["websites"]["website"]);

foreach (array_keys($json) as $key) {
	$website[$key] = $json[$key];
}

$website["painted_author"] = HTML::Element("span", $website["author"], "", "text_orange");

$website["netlify_format"] = "https://{}.".$website["netlify"]."/";

# Define Netlify url
$website["url"] = Text::Format($website["format"], [$website["subdomain"], $website["netlify"]]);

# Define local url
$website["local_url"] = [
	"index" => (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on" ? "https" : "http")."://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]
];

$website["local_url"]["generate"] = $website["local_url"]["index"]."generate";

$website["local_url"]["generate_template"] = $website["local_url"]["generate"]."?language={}&website={}";

$json = $website["local_url"];

$i = 0;
foreach ($json as $item) {
	if (strpos($item, "?") !== True) {
		$json[$i] = explode("?", $item)[0];
	}

	$i++;
}

if ($File -> Exist($folders["php"]["json"]["url"]) == False) {
	$JSON -> Edit($folders["php"]["json"]["url"], $website["local_url"], "w");
}

$website["Image formats"] = [
	"png",
	"jpeg",
	"jpg",
	"gif"
];

$website["folders"] = [];

foreach (array_keys($folders["mega"]["websites"]) as $key) {
	if (is_array($folders["mega"]["websites"][$key]) == False) {
		$website["folders"][$key] = str_replace($folders["mega"]["websites"]["root"], $website["url"], $folders["mega"]["websites"][$key]);
	}

	else {
		foreach (array_keys($folders["mega"]["websites"][$key]) as $sub_key) {
			$website["folders"][$key][$sub_key] = str_replace($folders["mega"]["websites"]["root"], $website["url"], $folders["mega"]["websites"][$key][$sub_key]);
		}
	}
}

# Get method from SESSION if POST is empty
if (
	$_POST == [] and
	isset($website["method"]) == False and
	isset($_SESSION["method"]) == True or
	$_POST != [] and
	isset($_POST["website"]) == False and
	isset($website["method"]) == False and
	isset($_SESSION["method"]) == True
) {
	$website["method"] = $_SESSION["method"];
}

# Define method from POST
if ($_POST != [] and isset($_POST["website"]) == True and isset($website["method"]) == False) {
	$website["method"] = $_POST;
	$_SESSION["POST"] = $_POST;
}

$default_website = [
	"language" => "Portuguese",
	"website" => "The Life of Littletato"
];

if (isset($website["method"]) == False) {
	if ($_POST == [] or $_GET == []) {
		$website["method"] = $default_website;
	}
}

# Define method from GET
if ($_GET != [] and isset($_GET["website"]) == True and isset($_GET["website"])) {
	$website["method"] = $_GET;
	$_SESSION["GET"] = $_GET;
}

# Define method on SESSION
if (isset($website["method"]) == True) {
	$_SESSION["method"] = $website["method"];
}

# Get method from SESSION
if (isset($website["method"]) == False and isset($_SESSION["method"]) == True) {
	$website["method"] = $_SESSION["method"];
}

# Define method on SESSION
if (isset($website["method"]) == True) {
	$_SESSION["method"] = $website["method"];
}

# Add keys and values of method to website array
if (isset($website["method"]) == True) {
	foreach (array_keys($website["method"]) as $key) {
		$website[$key] = $website["method"][$key];
	}

	foreach (array_keys($switches) as $switch) {
		$website[$switch] = $switches[$switch];
	}
}

# Define user language (website language)
$Language -> Define_User_Language();

$website["languages"] = $Language -> languages;

# Create the "small_languages" list and remove the "general" language from it
$website["small_languages"] = $Language -> languages["small"];
$website["small_languages"] = array_diff($website["small_languages"], ["general"]);

# Load the "Additional folders.php" file to define the additional folders that require the classes to be defined
require "Additional folders.php";

$website["States"] = [
	"Watch History" => [
		"Entry tabs" => True,
		"Past registry entry tabs" => True
	],
	"Tasks" => [
		"Entry tabs" => True
	],
	"Website" => [
		"Parent" => False
	]
];

# Define stories array
$stories = $JSON -> To_PHP($folders["mega"]["stories"]["database"]["stories"]);

# Define story painted authors
$stories["Authors (painted)"] = [];

$colors = [
	"text_orange",
	"text_green_water",
	"text_yellow"
];

$i = 0;
foreach ($stories["Authors"] as $author) {
	$color = $colors[$i];

	$stories["Authors (painted)"][$author] = HTML::Element("span", $author, "", $color);

	$i++;
}

# Define website list array
$websites = $JSON -> To_PHP($folders["php"]["websites"]["Websites"]);

# Add story titles of each language into each language website list
$keys = array_keys($stories["Titles"]);
$keys = array_diff($keys, ["All"]);

foreach ($keys as $language) {
	$story_titles = $stories["Titles"][$language];

	foreach ($story_titles as $story_title) {
		if (in_array($story_title, $websites["List"][$language]) == False) {
			array_push($websites["List"][$language], $story_title);
		}
	}
}

# Add "Years" website to website list
foreach ($Language -> languages["small"] as $language) {
	if (isset($websites["List"][$language]) == True) {
		array_push($websites["List"][$language], $website["texts"]["years, title()"][$language]);
	}
}

# Create years array
$website["years"] = Date::Create_Years_List();

# Add year websites to website list
foreach ($website["years"] as $year) {
	foreach ($Language -> languages["small"] as $language) {
		if (isset($websites["List"][$language]) == True) {
			array_push($websites["List"][$language], $year);
		}
	}
}

# Update websites JSON file
$JSON -> Edit($folders["mega"]["php"]["json"]["websites"], $websites, "w");

# Define website icons
$website["icons"] = $JSON -> To_PHP($folders["php"]["json"]["icons"]);

# Define website style dictionary
$website["style"] = [
	"background" => [
		"black" => "background_black"
	],
	"text" => [
		"black" => "text_black"
	],
	"border_radius" => "border_radius_15_cent"
];

# Create an array on the "dictionary" key of the website array to contain all of the information about a specific website
$website["dictionary"] = [];
$website["website_buttons"] = "";

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

# Add websites and website data to website dictionary
require $folders["php"]["make_website_dictionary"];

$website["style"] = array_merge($website["style"], $website["dictionary"][$website["website"]]["style"]);

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

$website["locale"] = $Language -> languages["Language with country"][$language];

if (is_array($website["locale"]) == True) {
	$website["locale_alternate"] = $website["locale"][1];

	$website["locale"] = $website["locale"][0];
}

$websites_string = "";
$option_template = "\t\t\t\t".'<option class="text_size" value="{}">{}</option>';

$i = 0;
foreach ($websites["List"]["en"] as $website_title) {
	$language_website_title = $websites["List"][$language][$i];

	$item = Text::Format($option_template, [$website_title, $language_website_title]);

	if (isset($website["website"]) == True and $website["website"] == $website_title) {
		$item = str_replace('">', '" selected>', $item);
	}

	if ($website_title != array_reverse($websites["List"][$language])[0]) {
		$item .= "\n";
	}

	$websites_string .= $item;

	$i++;
}

$languages_string = "";

foreach (array_values($Language -> languages["small"]) as $language) {
	$full_language = $Language -> languages["full"][$language];

	$item = Text::Format($option_template, [$language, $full_language]);

	if (array_key_exists("language", $website) == True and $language == $website["language"]) {
		$item = str_replace('">', '" selected>', $item);
	}

	if ($language != array_reverse($Language -> languages["small"])[0]) {
		$item .= "\n";
	}

	$languages_string .= $item;
}

$tpl -> assign("website", $website);

function Generate_Form() {
	global $website;
	global $websites_string;
	global $languages_string;
	global $radio_buttons;
	global $tpl;

	# Make Form radio buttons
	$h4 = HTML::Element("h4", HTML::Element("b", "{}"), "", "text_size", ["new_line" => True, "tab" => "\t\t\t\t"]);

	$input = HTML::Element("input", HTML::Element("b", "{}"), 'type="radio" id="{}" value="{}" name="mode"', "w3-center w3-input ".$website["style"]["radio_input"], ["new_line" => True, "tab" => "\t\t\t"]);

	$radio_template = "\t\t"."<!-- {} -->"."\n"."\t\t".HTML::Element("div", $h4."\n".$input, 'id="{}_div" style="width: 17%; height: auto; display: inline-block; border-radius: 45%;"', "w3-btn div_size ".$website["style"]["button"]["theme"]["light"]." ".$website["style"]["radio"], ["new_line" => True, "tab" => "\t\t"]);

	$radio_buttons = "";

	foreach (["code", "generate"] as $item) {
		$language_text = $website["language_texts"][$item.", title()"];
		$item_capitalize = ucfirst($item);

		$radio_buttons .= Text::Format($radio_template, [$item_capitalize, $item_capitalize, $language_text, $item_capitalize, $item_capitalize]);

		$parse = parse_url($_SERVER["REQUEST_URI"])["path"];

		if (
			isset($website["method"]["mode"]) == True and ucfirst($item) == $website["method"]["mode"] or
			isset($website["method"]["mode"]) == False and "/".$item == $parse or
			isset($website["method"]["mode"]) == False and $item == "code"
		) {
			$radio_buttons = str_replace('" />', '" checked="True" />', $radio_buttons);
			$radio_buttons = str_replace('<!--', "\n"."\t\t".'<!--', $radio_buttons);
			$radio_buttons .= "\n\n";
		}
	}

	# Define website POST form
	$form_items = [
		$websites_string,
		$languages_string,
		$radio_buttons
	];

	$website["form"] = $tpl -> draw("Form", $toString = True);
	$website["form"] = Text::Format($website["form"], $form_items);

	# Reload the "Functions" class
	$website["form"] .= "\n\n".
	'<script type="text/javascript" src="JavaScript/Functions.js"></script>';
}

Generate_Form();

$tpl -> assign("website", $website);

# Define website CSS files
$file_names = [
	"W3",
	"Colors",
	"Main"
];

$website["css"] = [];
$website["css"]["links"] = "\t";

$i = 0;
foreach ($file_names as $file_name) {
	if ($file_name != $file_names[0]) {
		$website["css"]["links"] .= "\t";
	}

	$website["css"]["links"] .= '<link rel="stylesheet" type="text/css" href="';

	if (strpos($file_name, ".com") == False) {
		$website["css"]["links"] .= "/CSS/";
		#$website["css"]["links"] .= $website["folders"]["css"]["root"];
	}

	$website["css"]["links"] .= $file_name.".css";

	$website["css"]["links"] .= '" />';

	$website["css"]["links"] .= "\n";
}

# Define website JavaScript files
$file_names = [
	"https://www.w3schools.com/lib/w3",
	"Language",
	"Functions",
	"Language_Redirector",
	"Tabs"
];

# Define default website data
$website["data"] = $website["dictionary"]["The Life of Littletato"];

# Define website data for the selected website
if (array_key_exists("website", $website) == True) {
	$website["data"] = $website["dictionary"][$website["website"]];
}

if ($website["data"]["type"] == "Story" or isset($website["data"]["json"]["story"])) {
	array_push($file_names, "Story");
}

$GLOBALS["link_class"] = $website["data"]["style"]["text_highlight"]." ".$website["data"]["style"]["text_hover"];

$website["style"]["background_image"] = "";

if (isset($website["data"]["json"]["background_image"]) == True) {
	$local_image_file = $website["data"]["folders"]["local_website"]["images"]["images"]["root"];

	if ($website["data"]["json"]["background_image"] != "") {
		$local_image_file .= $website["data"]["json"]["background_image"];
	}

	else {
		$local_image_file .= "Background";
	}

	foreach ($website["Image formats"] as $format) {	
		$local_image = $local_image_file.".".$format;

		if (file_exists($local_image) == True) {
			$link = $website["data"]["folders"]["website"]["images"]["images"]["root"].$website["data"]["json"]["background_image"].".".$format;
		}
	}

	$website["style"]["background_image"] = ' style="background: url('."'".$link."'".') no-repeat center center fixed; background-size: 100% 100%;"';
}

array_push($file_names, "https://code.jquery.com/jquery-3.6.0.slim.min");
array_push($file_names, "https://kit.fontawesome.com/6f0935b8d2");

$website["javascript"] = [];
$website["javascript"]["links"] = "\t";

foreach ($file_names as $file_name) {
	if ($file_name != $file_names[0]) {
		$website["javascript"]["links"] .= "\t";
	}

	$website["javascript"]["links"] .= '<script type="text/javascript" src="';

	if (strpos($file_name, ".com") == False) {
		$website["javascript"]["links"] .= "/JavaScript/";
		#$website["javascript"]["links"] .= $website["folders"]["javascript"]["root"];
	}

	$website["javascript"]["links"] .= $file_name.".js";

	$website["javascript"]["links"] .= '"';
	
	if (strpos($file_name, "fontawesome") == True) {
		$website["javascript"]["links"] .= ' crossorigin="anonymous"';
	}

	$website["javascript"]["links"] .= "></script>";

	if ($file_name != array_reverse($file_names)[0]) {
		$website["javascript"]["links"] .= "\n";
	}
}

$website["javascript"]["class_attributes"] = [
	"body" => 'onLoad="Remove_Zoom();"',
];

$website["notification"] = "";

$website["elements"] = [];

$i = 1;
while ($i <= 4) {
	$element = "hr_".$i."px";
	$border = "border_".$i."px";

	$theme_border = $website["style"][$border]["theme"];
	$secondary_theme_border = $website["style"][$border]["theme"];

	$website["elements"][$element] = [
		"black" => '<hr class="'.$website["style"][$border]["black"].' margin_sides_5_cent" />',
		"theme" => [
			"normal" => '<hr class="'.$theme_border["normal"].' margin_sides_5_cent" />',
			"light" => '<hr class="'.$theme_border["light"].' margin_sides_5_cent" />',
			"dark" => '<hr class="'.$theme_border["dark"].' margin_sides_5_cent" />'
		],
		"secondary_theme" => [
			"normal" => '<hr class="'.$secondary_theme_border["normal"].' margin_sides_5_cent" />',
			"light" => '<hr class="'.$secondary_theme_border["light"].' margin_sides_5_cent" />',
			"dark" => '<hr class="'.$secondary_theme_border["dark"].' margin_sides_5_cent" />'
		]
	];

	$website["elements"][$element."_no_margin"] = [
		"black" => '<hr class="'.$website["style"][$border]["black"].'" />',
		"theme" => [
			"normal" => '<hr class="'.$theme_border["normal"].'" />',
			"light" => '<hr class="'.$theme_border["light"].'" />',
			"dark" => '<hr class="'.$theme_border["dark"].'" />'
		],
		"secondary_theme" => [
			"normal" => '<hr class="'.$secondary_theme_border["normal"].'" />',
			"light" => '<hr class="'.$secondary_theme_border["light"].'" />',
			"dark" => '<hr class="'.$secondary_theme_border["dark"].'" />'
		]
	];

	$i++;
}

# Define website date
$website["date"] = $Date -> Now();

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

if ($language == "general") {
	$language = "en";
}

$full_language = $Language -> languages["full"][$language];

$website["tabs"]["templates"] = [];

# Create website image button if website data exists
if (isset($website["data"]) == True) {
	$h4 = HTML::Element("h4", $website["language_texts"]["open_image_in_a_new_tab"].": ".$website["icons"]["images"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

	$website["data"]["image"]["button"] = "\n".
	"	<!-- Website image button -->"."\n".
	"\t".HTML::Element("button", $h4, 'onclick="window.open('."'".$website["data"]["image"]["link"]."'".')" style="z-index: 2;"', "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

	$website["data"]["image"]["elements"]["theme"]["light"] .= $website["data"]["image"]["button"]."\n";

	if (isset($website["data"]["json"]["tabs"]) == False) {
		$website["data"]["json"]["tabs"] = [];
	}

	$website["tabs"] = $website["data"]["json"]["tabs"];

	$website["tabs"]["templates"] = [];

	if (file_exists($website["data"]["folders"]["php"]["website_php"]) == True) {
		require $website["data"]["folders"]["php"]["website_php"];
	}

	# Create websites tab and add it to the tabs array
	$website["tabs"]["data"]["websites_tab"] = [
		"id" => "websites_tab",
		"name" => $website["language_texts"]["websites, title()"],
		"add" => " ".HTML::Element("span", count($websites["List"]["en"]), "", $website["style"]["text_highlight"]),
		"class" => $website["style"]["tab"]["theme_dark"],
		"icon" => "globe",
		"content" => $website["website_buttons"]
	];
}

# Define story of website and run Story.php file
if ($website["data"]["type"] == "Story" or isset($website["data"]["json"]["story"])) {
	$story = $website["data"]["story"];

	# Require the "Story.php" file to define story website variables
	require $folders["php"]["story"];
}

# Define website data related to year websites
if (
	$website["data"]["title"] == "Years" or
	in_array($website["data"]["title"], $website["years"])
) {
	$year_buttons = "";

	foreach ($website["years"] as $year) {
		$year_button = $website["dictionary"][$year]["button"];

		$year_buttons .= $year_button."\n";
	}

	# Add tab keys and templates
	$tab_titles = [
		"summary"
	];

	if ((int)$website["data"]["title"] >= 2022) {
		array_push($tab_titles, "this_year_i");
	}

	# Add the "Years" tab
	$more_tabs = [
		"watched_things",
		"completed_tasks",
		"years",
	];

	$tab_titles = array_merge($tab_titles, $more_tabs);

	$tabs = [];

	foreach ($tab_titles as $tab) {
		$tabs[$tab] = [
			"template" => $tab
		];
	}

	$website["tabs"]["data"] = $website["tabs"]["data"] + $tabs;

	# Create the years tab template
	$website["tabs"]["templates"]["years"] = [
		"name" => $website["language_texts"]["years, title()"],
		"add" => " ".HTML::Element("span", count($website["years"]), "", $website["style"]["text_highlight"]),
		"content" => $year_buttons,
		"icon" => "calendar_days"
	];

	# Move the websites tab template to the end
	$backup = $website["tabs"]["data"]["websites_tab"];

	unset($website["tabs"]["data"]["websites_tab"]);

	$website["tabs"]["data"]["websites_tab"] = $backup;
}

# Define the website content, adding the "select website" form
$website["content"] = "<br />"."<br />"."<br />"."<br />"."<br />"."\n\n";

# Create website buttons
$buttons = HTML::Generate_Buttons();

# Add website buttons to website content
$website["buttons"] = $buttons["hamburger_menu"]."\n";
$website["buttons_list"] = $buttons["list"];

# Create website tabs
$website["tabs"]["array"] = HTML::Generate_Tabs();

# Add tabs to website content
foreach ($website["tabs"]["array"]["List"] as $tab) {
	$tab = $website["tabs"]["array"]["Dictionary"][$tab];

	$website["content"] .= $tab["content"];

	if ($tab != array_slice($website["tabs"]["array"]["List"], -1)) {
		$website["content"] .= "\n\n";
	}
}

if (array_key_exists("additional_tabs", $website) == True and $website["additional_tabs"]["data"] != []) {
	# Create website tabs
	$tabs = HTML::Generate_Tabs($website["additional_tabs"], $buttons = True, $all_buttons = True);

	# Add tabs to website content
	foreach ($tabs["List"] as $tab) {
		$tab = $tabs["Dictionary"][$tab];

		$website["content"] .= $tab["content"];

		if ($tab != array_slice($tabs["List"], -1)) {
			$website["content"] .= "\n\n";
		}
	}
}

# Add chapter tabs and chapter number variable to website content
if ($website["data"]["type"] == "Story" or isset($website["data"]["json"]["story"])) {
	$website["content"] .= $story["chapters"]."\n\n";

	$website["content"] .= "<script>"."\n".
	"\t"."var last_chapter = ".$story["Information"]["Chapters"]["Number"]."\n".
	"</script>";
}

# Add form if the request is not "generate"
if ($parse != "/generate") {
	$website["content"] .= "\n\n".
	"<br />"."<br />"."\n\n".
	$website["form"];
}

if ($parse != "/generate") {
	$website["content"] .= '<script>
function Resize() {
	var textareas = Array.from(document.getElementsByTagName("textarea"))

	textareas.forEach(
		function(element) {
			element.style.height = element.scrollHeight + "px"
		}
	)
}

window.addEventListener("load", Resize)

//var textareas = Array.from(document.getElementsByTagName("textarea"))

//textareas.forEach(
//	function(element) {
//		element.addEventListener("click", function() {
//			element.style.height = element.scrollHeight + "px"
//		})
//	}
//)
</script>';
}

$dictionary = $website;
unset($dictionary["content"]);

$JSON -> Edit($folders["mega"]["php"]["Dictionary"], $dictionary);

?>