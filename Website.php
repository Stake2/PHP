<?php

# Website.php

require "Functions.php";

$website = [
	"author" => "Izaque Sanvezzo (Stake2, Funkysnipa Cat)",
	"Twitter author" => "Stake2",
	"format" => "https://{}.{}/"
];

$json = $JSON -> To_PHP($folders["Mega"]["Websites"]["Website"]);

foreach (array_keys($json) as $key) {
	$website[$key] = $json[$key];
}

$website["painted_author"] = HTML::Element("span", $website["author"], "", "text_orange");

$website["netlify_format"] = "https://{}.".$website["Netlify"]."/";

$website["Variable_Inserter"] = [];

# Define Netlify url
$website["URL"] = Text::Format($website["format"], [$website["Sub-domain"], $website["Netlify"]]);

$website["URL parameters"] = Get_URL_Parameters();

# Define the local URL dictionary
$website["Local URL"] = [
	"Index" => (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on" ? "https" : "http")."://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]
];

$website["Local URL"]["Index"] = explode("?", $website["Local URL"]["Index"])[0];

# Define the local URL "Code" dictionary
$website["Local URL"]["Code"] = [
	"Link" => $website["Local URL"]["Index"],
	"Templates" => []
];

# Add a URL template
$website["Local URL"]["Code"]["Templates"]["Normal"] = $website["Local URL"]["Code"]["Link"]."?website={}";

$website["Local URL"]["Code"]["Templates"]["With language"] = $website["Local URL"]["Code"]["Link"]."?website={}&language={}";

# Define the local URL "Generate" dictionary
$website["Local URL"]["Generate"] = [
	"Link" => $website["Local URL"]["Index"]."generate",
	"Templates" => []
];

# Add URL templates
$website["Local URL"]["Generate"]["Templates"]["Normal"] = $website["Local URL"]["Generate"]["Link"]."?website={}";

$website["Local URL"]["Generate"]["Templates"]["With language"] = $website["Local URL"]["Generate"]["Link"]."?website={}&language={}";

# Edit the "URL.json" file
$JSON -> Edit($folders["PHP"]["JSON"]["URL"], $website["Local URL"], "w");

$website["Local URL"]["Code"]["Templates"]["With tab"] = $website["Local URL"]["Code"]["Link"]."?website={}";

# Add the tab parameter as a template if it exists
if (isset($website["URL parameters"]["tab"])) {
	$tab = $website["URL parameters"]["tab"];

	$website["Local URL"]["Code"]["Templates"]["With tab"] .= "&tab=".$tab;
}

$website["Image formats"] = [
	"png",
	"jpeg",
	"jpg",
	"gif"
];

# Define the "Folders" key inside the "website" dictionary
$website["Folders"] = [];

foreach (array_keys($folders["Mega"]["Websites"]) as $key) {
	if (is_array($folders["Mega"]["Websites"][$key]) == False) {
		$website["Folders"][$key] = str_replace($folders["Mega"]["Websites"]["root"], $website["URL"], $folders["Mega"]["Websites"][$key]);
	}

	else {
		foreach (array_keys($folders["Mega"]["Websites"][$key]) as $sub_key) {
			$website["Folders"][$key][$sub_key] = str_replace($folders["Mega"]["Websites"]["root"], $website["URL"], $folders["Mega"]["Websites"][$key][$sub_key]);
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
if (
	$_POST != [] and
	isset($_POST["website"]) == True and
	isset($website["method"]) == False
) {
	$website["method"] = $_POST;
	$_SESSION["POST"] = $_POST;
}

$default_website = [
	"language" => "Portuguese",
	"website" => "The Life of Littletato"
];

if (isset($website["method"]) == False) {
	if (
		$_POST == [] or
		$_GET == []
	) {
		$website["method"] = $default_website;
	}
}

# Define method from GET
if (
	$_GET != [] and
	isset($_GET["website"]) == True
) {
	$website["method"] = $_GET;
	$_SESSION["GET"] = $_GET;
}

# Define method on SESSION
if (isset($website["method"]) == True) {
	$_SESSION["method"] = $website["method"];
}

# Get method from SESSION
if (
	isset($website["method"]) == False and
	isset($_SESSION["method"]) == True
) {
	$website["method"] = $_SESSION["method"];
}

# Define method on SESSION
if (isset($website["method"]) == True) {
	$_SESSION["method"] = $website["method"];
}

if (isset($website["method"]["language"]) == False) {
	$website["method"]["language"] = "pt";
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
	],
	"Story" => [
		"Write" => False
	]
];

# Define the stories array
$stories = $JSON -> To_PHP($folders["Mega"]["Stories"]["Database"]["Stories"]);

# Define the story painted authors
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
$websites = $JSON -> To_PHP($folders["PHP"]["Websites"]["Websites"]);

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
		array_push($websites["List"][$language], $website["Texts"]["years, title()"][$language]);
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

$website["current_year"] = end($website["years"]);

# Update the "Websites.json" file
$JSON -> Edit($folders["Mega"]["PHP"]["JSON"]["Websites"], $websites, "w");

# Define the website icons
$website["Icons"] = $JSON -> To_PHP($folders["PHP"]["JSON"]["Icons"]);

# Define website style dictionary
$website["Style"] = [
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

# Add the websites and website data to the "website" dictionary
require $folders["PHP"]["Make website dictionary"];

$website["Style"] = array_merge($website["Style"], $website["dictionary"][$website["website"]]["Style"]);

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

	if ($website_title != end($websites["List"][$language])) {
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

	if ($language != end($Language -> languages["small"])) {
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

	$input = HTML::Element("input", HTML::Element("b", "{}"), 'type="radio" id="{}" value="{}" name="mode"', "w3-center w3-input ".$website["Style"]["radio_input"], ["new_line" => True, "tab" => "\t\t\t"]);

	$radio_template = "\t\t"."<!-- {} -->"."\n"."\t\t".HTML::Element("div", $h4."\n".$input, 'id="{}_div" style="width: 17%; height: auto; display: inline-block; border-radius: 45%;"', "w3-btn div_size ".$website["Style"]["button"]["theme"]["light"]." ".$website["Style"]["radio"], ["new_line" => True, "tab" => "\t\t"]);

	$radio_buttons = "";

	foreach (["code", "generate"] as $item) {
		$text_key = $item.", title()";

		if ($item == "code") {
			$text_key = $item."_2, title()";
		}

		$language_text = $website["Language texts"][$text_key];

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
	}

	$website["css"]["links"] .= $file_name.".css";

	$website["css"]["links"] .= '" />';

	$website["css"]["links"] .= "\n";
}

# Define default website data
$website["Data"] = $website["dictionary"]["The Life of Littletato"];

# Define website data for the selected website
if (array_key_exists("website", $website) == True) {
	$website["Data"] = $website["dictionary"][$website["website"]];
}

$GLOBALS["link_class"] = $website["Data"]["Style"]["text_highlight"]." ".$website["Data"]["Style"]["text_hover"];

$website["Style"]["background_image"] = "";

if (isset($website["Data"]["JSON"]["background_image"]) == True) {
	$local_image_file = $website["Data"]["Folders"]["Local website"]["Images"]["Images"]["root"];

	if ($website["Data"]["JSON"]["background_image"] != "") {
		$file_name = $website["Data"]["JSON"]["background_image"];
	}

	else {
		$file_name = "Background";
	}

	$link = "";

	foreach ($website["Image formats"] as $format) {	
		$local_image = $local_image_file.$file_name.".".$format;

		if (file_exists($local_image) == True) {
			$link = $website["Data"]["Folders"]["Website"]["Website images"]["Images"]["root"].$file_name.".".$format;
		}
	}

	if ($link != "") {
		$website["Style"]["background_image"] = ' style="background: url('."'".$link."'".') no-repeat center center fixed; background-size: 100% 100%;"';
	}
}

$tpl -> assign("website", $website);

# Define the website JavaScript files
$file_names = [
	"https://code.jquery.com/jquery-3.6.0.slim.min",
	"https://www.w3schools.com/lib/w3",
	"Language",
	"Functions",
	"Language_Redirector",
	"Tabs"
];

if (
	$website["Data"]["type"] == "Story" or
	isset($website["Data"]["JSON"]["story"])
) {
	array_push($file_names, "Story");
}

array_push($file_names, "https://kit.fontawesome.com/6f0935b8d2");

$website["javascript"] = [];
$website["javascript"]["links"] = "\t";

foreach ($file_names as $file_name) {
	if ($file_name != $file_names[0]) {
		$website["javascript"]["links"] .= "\t";
	}

	$website["javascript"]["links"] .= '<script type="text/javascript" src="';

	if (str_contains($file_name, ".com") == False) {
		$website["javascript"]["links"] .= "/JavaScript/";
	}

	$website["javascript"]["links"] .= $file_name.".js";

	$website["javascript"]["links"] .= '"';
	
	if (str_contains($file_name, "fontawesome") == True) {
		$website["javascript"]["links"] .= ' crossorigin="anonymous"';
	}

	$website["javascript"]["links"] .= "></script>";

	if ($file_name != end($file_names)) {
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

	$theme_border = $website["Style"][$border]["theme"];
	$secondary_theme_border = $website["Style"][$border]["secondary_theme"];

	$website["elements"][$element] = [
		"black" => '<hr class="'.$website["Style"][$border]["black"].' margin_sides_5_cent" />',
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
		"black" => '<hr class="'.$website["Style"][$border]["black"].'" />',
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
$website["Date"] = $Date -> Now();

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
if (isset($website["Data"]) == True) {
	$h4 = HTML::Element("h4", $website["Language texts"]["open_image_in_a_new_tab"].": ".$website["Icons"]["images"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

	$website["Data"]["image"]["button"] = "\n".
	"	<!-- Website image button -->"."\n".
	"\t".HTML::Element("button", $h4, 'onclick="window.open('."'".$website["Data"]["image"]["link"]."'".')" style="z-index: 2;"', "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

	$website["Data"]["image"]["elements"]["theme"]["light"] .= $website["Data"]["image"]["button"]."\n";

	if (isset($website["Data"]["JSON"]["tabs"]) == False) {
		$website["Data"]["JSON"]["tabs"] = [];
	}

	$website["tabs"] = $website["Data"]["JSON"]["tabs"];

	$keys = [
		"templates",
		"data"
	];

	foreach ($keys as $key) {
		if (isset($website["tabs"][$key]) == False) {
			$website["tabs"][$key] = [];
		}
	}

	$website["tabs"]["To remove"] = [];

	# Create websites tab and add it to the tabs array
	$website["tabs"]["data"]["websites_tab"] = [
		"id" => "websites_tab",
		"name" => $website["Language texts"]["websites, title()"],
		"add" => " ".HTML::Element("span", count($websites["List"]["en"]), "", $website["Style"]["text"]["theme"]["dark"]),
		"class" => $website["Style"]["tab"]["theme_dark"],
		"icon" => "globe",
		"content" => $website["website_buttons"]
	];

	if (file_exists($website["Data"]["Folders"]["PHP"]["Website (PHP)"]) == True) {
		require $website["Data"]["Folders"]["PHP"]["Website (PHP)"];
	}
}

# Define the story of website and run the "Story.php" file to define the story variables
if (
	$website["Data"]["type"] == "Story" or
	isset($website["Data"]["JSON"]["story"])
) {
	$story = $website["Data"]["story"];

	if (
		$parse != "/generate" and
		isset($_GET["write"]) and
		$_GET["write"] == True
	) {
		$website["States"]["Story"]["Write"] = True;
	}

	# Require the "Story.php" file to define story website variables
	require $folders["PHP"]["Story"];
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
if ($website["Data"]["type"] == "Story" or isset($website["Data"]["JSON"]["story"])) {
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
// Get the URL parameters
parameters = Object.fromEntries(  
	new URLSearchParams(window.location.search)
)

// Define the function to resize text areas
function Resize_Textarea() {
	chapter_write_anchor_id = "chapter_" + chapter_number + "_write_anchor"
	chapter_write_element = document.getElementById(chapter_write_anchor_id)

	$("textarea").each(function () {
		this.style.height = "auto"
		this.style.height = (this.scrollHeight) + "px;"
	}).on("input", function () {
		this.style.height = "auto"
		this.style.height = (this.scrollHeight) + "px"
	})
}

// Resize all text areas if the "chapter" key is present in the URL parameters
if (Object.keys(parameters).includes("chapter") == true) {
	window.addEventListener("load", Resize_Textarea)
}

// Resize all text areas
$("textarea").each(function () {
	this.style.height = "auto"
	this.style.height = (this.scrollHeight) + "px;"
}).on("input", function () {
	this.style.height = "auto"
	this.style.height = (this.scrollHeight) + "px"
})
</script>';
}

# Define the website meta title
$website["Meta title"] = $website["Data"]["titles"]["language"];

# Assign the "website" dictionary to RainTPL variables
$tpl -> assign("website", $website);

?>