<?php

$website = [
	"author" => "Stake2",
	"website_author" => "Izaque Sanvezzo (Stake2, Funkysnipa Cat)",
	"format" => "https://{}.{}/",
];

$json = File::JSON($folders["mega"]["websites"]["website"]);

foreach (array_keys($json) as $key) {
	$website[$key] = $json[$key];
}

$website["painted_author"] = HTML::Element("span", $website["website_author"], "", "text_orange");

$website["netlify_format"] = "https://{}.".$website["netlify"]."/";

# Define Netlify url
$website["url"] = Text::Format($website["format"], [$website["subdomain"], $website["netlify"]]);

# Define local url
$website["local_url"] = [
	"index" => (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on" ? "https" : "http")."://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"],
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

if (file_exists($folders["php"]["json"]["url"]) == False) {
	File::Edit($folders["php"]["json"]["url"], $website["local_url"], "w");
}

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
if ($_POST == [] and isset($website["method"]) == False and isset($_SESSION["method"]) == True or $_POST != [] and isset($_POST["website"]) == False and isset($website["method"]) == False and isset($_SESSION["method"]) == True) {
	$website["method"] = $_SESSION["method"];
}

# Define method from POST
if ($_POST != [] and isset($_POST["website"]) == True and isset($website["method"]) == False) {
	$website["method"] = $_POST;
	$_SESSION["POST"] = $_POST;
}

if ($_POST == [] and isset($website["method"]) == False) {
	$website["method"] = [
		"language" => "Portuguese",
		"website" => "The Life of Littletato",
	];
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
}

# Define user language (website language)
$Language -> Define_User_Language();

$website["languages"] = $Language -> languages;

# Define stories array
$stories = File::JSON($folders["mega"]["stories"]["database"]["stories"]);

# Define story painted authors
$stories["painted_authors"] = [];

$colors = [
	"text_orange",
	"text_green_water",
	"text_yellow",
];

$i = 0;
foreach ($stories["authors"] as $author) {
	$color = $colors[$i];

	$stories["painted_authors"][$author] = HTML::Element("span", $author, "", $color);

	$i++;
}

# Define website list array
$website["list"] = File::JSON($folders["php"]["websites"]["root_websites"]);

# Add story titles of each language into each language website list
foreach (array_keys($stories["titles"]) as $language) {
	$story_titles = $stories["titles"][$language];

	foreach ($story_titles as $story_title) {
		if (in_array($story_title, $website["list"][$language]) == False) {
			array_push($website["list"][$language], $story_title);
		}
	}
}

# Add "Years" website to website list
foreach ($Language -> languages["small"] as $language) {
	if (isset($website["list"][$language]) == True) {
		array_push($website["list"][$language], $website["texts"]["years, title()"][$language]);
	}
}

# Add year websites to website list
foreach (Date::Create_Years_List() as $year) {
	foreach ($Language -> languages["small"] as $language) {
		if (isset($website["list"][$language]) == True) {
			array_push($website["list"][$language], $year);
		}
	}
}

# Update websites JSON file
File::Edit($folders["mega"]["php"]["json"]["websites"], $website["list"], "w");

# Define website icons
$website["icons"] = File::JSON($folders["php"]["json"]["icons"]);

# Define website style dictionary
$website["style"] = [
	"background" => [
		"black" => "background_black",
	],
	"text" => [
		"black" => "text_black",
	],
	"border_radius" => "border_radius_15_cent",
];

# Create an array on the "dictionary" key of the website array to contain all of the information about a specific website
$website["dictionary"] = [];
$website["website_buttons"] = "";

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

# Create years array
$website["years"] = Date::Create_Years_List();

# Add websites and website data to website dictionary
require $folders["php"]["website_dictionary"];

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

$website["locale"] = $Language -> languages["ISO_639-1"][$language];

if (is_array($website["locale"]) == True) {
	$website["locale_alternate"] = $website["locale"][1];

	$website["locale"] = $website["locale"][0];
}

$websites = "";
$option_template = "\t\t\t\t".'<option class="text_size" value="{}">{}</option>';

$i = 0;
foreach ($website["list"]["en"] as $website_title) {
	$language_website_title = $website["list"][$language][$i];

	$item = Text::Format($option_template, [$website_title, $language_website_title]);

	if (isset($website["website"]) == True and $website["website"] == $website_title) {
		$item = str_replace('">', '" selected>', $item);
	}

	if ($website_title != array_reverse($website["list"][$language])[0]) {
		$item .= "\n";
	}

	$websites .= $item;

	$i++;
}

$languages = "";

foreach (array_values($Language -> languages["small"]) as $language) {
	$full_language = $Language -> languages["full"][$language];

	$item = Text::Format($option_template, [$language, $full_language]);

	if (array_key_exists("language", $website) == True and $language == $website["language"]) {
		$item = str_replace('">', '" selected>', $item);
	}

	if ($language != array_reverse($Language -> languages["small"])[0]) {
		$item .= "\n";
	}

	$languages .= $item;
}

$tpl -> assign("website", $website);

# Make Form radio buttons
$h4 = HTML::Element("h4", HTML::Element("b", "{}"), "", "text_size", ["new_line" => True, "tab" => "\t\t\t\t"]);

$input = HTML::Element("input", HTML::Element("b", "{}"), 'type="radio" id="{}" value="{}" name="mode"', "w3-center w3-input ".$website["style"]["radio_input"], ["new_line" => True, "tab" => "\t\t\t"]);

$radio_template = "\t\t"."<!-- {} -->"."\n"."\t\t".HTML::Element("div", $h4."\n".$input, 'id="{}_div" style="width: 17%; height: auto; display: inline-block; border-radius: 45%;"', "w3-btn div_size ".$website["style"]["button"]["theme"]["light"]." ".$website["style"]["radio"], ["new_line" => True, "tab" => "\t\t"]);

$radio_buttons = "";
foreach (["code", "generate"] as $item) {
	$language_text = $website["language_texts"][$item.", title()"];
	$item_capitalize = ucfirst($item);

	$radio_buttons .= Text::Format($radio_template, [$item_capitalize, $item_capitalize, $language_text, $item_capitalize, $item_capitalize]);

	if ($item == "code") {
		$radio_buttons = str_replace('" />', '" checked="True" />', $radio_buttons);
		$radio_buttons = str_replace('<!--', "\n"."\t\t".'<!--', $radio_buttons);
		$radio_buttons .= "\n\n";
	}
}

# Define website POST form
$website["form"] = $tpl -> draw("Form", $toString = True);
$website["form"] = Text::Format($website["form"], [$websites, $languages, $radio_buttons]);

# Define website CSS files
$file_names = [
	"W3",
	"Colors",
	"Main",
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
		$website["css"]["links"] .= $website["folders"]["css"]["root"];
	}

	$website["css"]["links"] .= $file_name.".css";

	$website["css"]["links"] .= '" />';

	$website["css"]["links"] .= "\n";
}

# Define website JavaScript files
$file_names = array(
	"https://www.w3schools.com/lib/w3",
	"Language",
	"Functions",
	"Language_Redirector",
	"Tabs",
	"Tab_By_Key",
);

# Define default website data
$website["data"] = $website["dictionary"]["The Life of Littletato"];

# Define website data for the selected website
if (array_key_exists("website", $website) == True) {
	$website["data"] = $website["dictionary"][$website["website"]];
}

if ($website["data"]["type"] == "Story") {
	array_push($file_names, "Story");
}

#array_push($file_names, "https://code.jquery.com/jquery-3.6.0.slim.min");
array_push($file_names, "https://kit.fontawesome.com/6f0935b8d2");

$website["javascript"] = [];
$website["javascript"]["links"] = "\t";

foreach ($file_names as $file_name) {
	if ($file_name != $file_names[0]) {
		$website["javascript"]["links"] .= "\t";
	}

	$website["javascript"]["links"] .= '<script type="text/javascript" src="';

	if (strpos($file_name, ".com") == False) {
		#$website["javascript"]["links"] .= "/JavaScript/";
		$website["javascript"]["links"] .= $website["folders"]["javascript"]["root"];
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

	$website["elements"][$element] = [
		"black" => '<hr class="'.$website["style"][$border]["black"].' margin_sides_5_cent" />',
		"theme" => [
			"normal" => '<hr class="'.$website["style"][$border]["theme"]["normal"].' margin_sides_5_cent" />',
			"light" => '<hr class="'.$website["style"][$border]["theme"]["light"].' margin_sides_5_cent" />',
			"dark" => '<hr class="'.$website["style"][$border]["theme"]["dark"].' margin_sides_5_cent" />',
		],
		"secondary_theme" => [
			"normal" => '<hr class="'.$website["style"][$border]["secondary_theme"]["normal"].' margin_sides_5_cent" />',
			"light" => '<hr class="'.$website["style"][$border]["secondary_theme"]["light"].' margin_sides_5_cent" />',
			"dark" => '<hr class="'.$website["style"][$border]["secondary_theme"]["dark"].' margin_sides_5_cent" />',
		],
	];

	$website["elements"][$element."_no_margin"] = [
		"black" => '<hr class="'.$website["style"][$border]["black"].'" />',
		"theme" => [
			"normal" => '<hr class="'.$website["style"][$border]["theme"]["normal"].'" />',
			"light" => '<hr class="'.$website["style"][$border]["theme"]["light"].'" />',
			"dark" => '<hr class="'.$website["style"][$border]["theme"]["dark"].'" />',
		],
		"secondary_theme" => [
			"normal" => '<hr class="'.$website["style"][$border]["secondary_theme"]["normal"].'" />',
			"light" => '<hr class="'.$website["style"][$border]["secondary_theme"]["light"].'" />',
			"dark" => '<hr class="'.$website["style"][$border]["secondary_theme"]["dark"].'" />',
		],
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

# Create website image button if website data exists
if (isset($website["data"]) == True) {
	$h4 = HTML::Element("h4", $website["language_texts"]["open_image_in_new_tab"].": ".$website["icons"]["images"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

	$website["data"]["image"]["button"] = "\n".
	"	<!-- Website image button -->"."\n".
	"\t".HTML::Element("button", $h4, 'onclick="window.open('."'".$website["data"]["image"]["link"]."'".')" style="z-index: 2;"', "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

	if (file_exists($website["data"]["folders"]["php"]["website_php"])) {
		require $website["data"]["folders"]["php"]["website_php"];
	}

	$website["data"]["image"]["elements"]["theme"]["light"] .= $website["data"]["image"]["button"]."\n";

	$website["tabs"] = $website["data"]["json"]["tabs"];

	# Create websites tab and add it to the tabs array
	$website["tabs"]["data"]["websites_tab"] = [
		"id" => "websites_tab",
		"name" => $website["language_texts"]["websites, title()"],
		"add" => " ".HTML::Element("span", count($website["list"]["en"]), "", $website["style"]["text_highlight"]),
		"class" => $website["style"]["tab"]["theme_dark"],
		"icon" => "globe",
		"content" => $website["website_buttons"],
	];
}

# Define story of website and run Story.php file
if ($website["data"]["type"] == "Story") {
	$story = $website["data"]["story"];

	require $folders["php"]["story"];
}

# Define website data related to year websites
if ($website["data"]["title"] == "Years" or in_array($website["data"]["title"], $website["years"])) {
	$year_buttons = "";

	foreach ($website["years"] as $year) {
		$year_button = $website["dictionary"][$year]["button"];

		$year_buttons .= $year_button."\n";
	}

	# Create years tab template
	$website["tabs"]["templates"] = [
		"summary" => [
			"name" => $website["language_texts"]["summary, title()"],
			"file" => $website["data"]["files"]["summary"],
			"empty_message" => $website["language_texts"]["the_year_summary_has_not_been_created_yet"],
			"text_style" => "text-align: left;",
			"icon" => "clipboard",
		],
		"this_year_i" => [
			"name" => $website["language_texts"]["this_year_i"],
			"file" => $website["data"]["files"]["this_year_i"],
			"empty_message" => Text::Format($website["language_texts"]["the_{}_text_has_not_been_created_yet"], $website["language_texts"]["this_year_i"]),
			"text_style" => "text-align: left;",
			"icon" => "calendar_days",
		],
		"watched_things" => [
			"name" => $website["language_texts"]["watched_things"],
			"add" => " ".HTML::Element("span", $website["tab_content"]["watched_things"]["number"], "", $website["style"]["text_highlight"]),
			"text_style" => "text-align: left;",
			"content" => $website["tab_content"]["watched_things"]["string"],
			"icon" => "eye",
		],
		"tasks" => [
			"name" => $website["language_texts"]["tasks, title()"],
			"add" => " ".HTML::Element("span", $website["tab_content"]["tasks"]["number"], "", $website["style"]["text_highlight"]),
			"text_style" => "text-align: left;",
			"content" => $website["tab_content"]["tasks"]["string"],
			"icon" => "check",
		],
		"years" => [
			"name" => $website["language_texts"]["years, title()"],
			"add" => " ".HTML::Element("span", count($website["years"]), "", $website["style"]["text_highlight"]),
			"content" => $year_buttons,
			"icon" => "calendar_days",
		],
	];
}

# Define the website content, adding the "select website" form
$website["content"] = "<br />"."<br />"."<br />"."<br />"."<br />"."\n\n";

# Create website buttons
$buttons = HTML::Generate_Buttons();

# Add website buttons to website content
$website["buttons"] = $buttons["hamburger_menu"]."\n";

# Create website tabs
$tabs = HTML::Generate_Tabs();

# Add tabs to website content
foreach ($tabs as $tab) {
	$website["content"] .= $tab;

	if ($tab != array_slice($tabs, -1)) {
		$website["content"] .= "\n\n";
	}
}

if ($website["data"]["type"] == "Story") {
	$website["content"] .= $story["chapters"]."\n\n";

	$website["content"] .= "<script>"."\n".
	"\t"."var last_chapter = ".$story["Information"]["Chapter number"]."\n".
	"</script>";
}

# Add form if the request is not "generate"
if ($parse != "/generate") {
	$website["content"] .= "\n\n".
	"<br />"."<br />"."\n\n".
	$website["form"];
}

?>