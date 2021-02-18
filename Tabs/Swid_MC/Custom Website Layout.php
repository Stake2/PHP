<?php 

$css_files = #format('<link rel="stylesheet" type="text/css" href="'.$cdn_css."{}".'.css" />', $selected_website_title_with_underline)."\n".
format('<link rel="stylesheet" type="text/css" href="{}" />', "https://www.w3schools.com/w3css/4/w3.css");

$website_css_files = "\n".$css_files;

$page_setting_parameter = "page";

if (strpos($host_text, $page_setting_parameter."=") == True) {
	$current_page = str_replace((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]/?no-redirect=true&website_language=".$website_language."&website=".$selected_website_name."&".$page_setting_parameter."=", "", $host_text);

	if ($current_page == "0") {
		$current_page = False;
	}

	else {
		$current_page = ucwords($current_page);

		$website_title = $website_title." - ".$current_page;
	}
}

else {
	$current_page = False;
}

# English texts for the Swid_MC website
if (in_array($website_language, $en_languages_array)) {
	$website_description = "A website for a Minecraft server.";
	$website_title = $website_title;

	$home_text = "Home";
	$search_text = "Search";
}

# Brazilian Portuguese texts for the Swid_MC website
if (in_array($website_language, $pt_languages_array)) {
	$website_description = "Um site para um servidor de Minecraft.";
	$website_title = $website_title;

	$home_text = "Início";
	$search_text = "Pesquisar";
}

$custom_layout = '<div class="w3-container">
<h2 class="w3-center">'."\n".$website_title."\n".'</h2>
<p class="w3-center">'.$website_description.'</p>
</div>

<div style="margin-right: auto; margin-left: auto; max-width: 65%;">

<div class="w3-bar w3-blue w3-border w3-round">'."\n";

if (in_array($website_language, $en_languages_array)) {
	$page_names = array(
	$home_text,
	"Shop",
	"Help",
	"Team",
	);
}

if (in_array($website_language, $pt_languages_array)) {
	$page_names = array(
	$home_text,
	"Loja",
	"Ajuda",
	"Equipe",
	);
}

$page_links = array(
"",
"Default",
"Default",
"Default",
);

$i = 0;
foreach ($page_names as $page_name) {
	$page_link = $page_links[$i];

	if ($page_link == "Default") {
		$custom_layout .= '<a class="w3-bar-item w3-btn w3-middle w3-round" href="/'.strtolower($page_name).'">'.$page_name."</a>"."\n";
	}

	else {
		$custom_layout .= '<a class="w3-bar-item w3-btn w3-middle w3-round" href="/'.$page_link.'">'.$page_name."</a>"."\n";
	}

	$i++;
}

$custom_layout .= '<input type="text" class="w3-bar-item w3-input w3-right w3-border w3-light-grey" placeholder="'.$search_text.'...">'."\n";

$custom_layout .= $div_close."\n"."\n";

$custom_layout .= $div_close."\n"."\n";

$custom_layout .= "<br /><br />";

if ($current_page != False) {
	$custom_layout .= '<div class="w3-center">
	'.ucwords($current_page).'
	</div>';
}

return $custom_layout;

?>