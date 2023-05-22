<?php

$hard_drive_letter = "C";
$folders["mega"]["root"] = $hard_drive_letter.":/Mega/";

if (!file_exists($folders["mega"]["root"])) {
	$hard_drive_letter = "D";
	$folders["mega"]["root"] = $hard_drive_letter.":/Mega/";
}

$folders["mega"]["websites"]["root"] = $folders["mega"]["root"]."Websites/";
$folders["mega"]["php"]["root"] = $folders["mega"]["root"]."PHP/";

$index_variables_php_file = $hard_drive_letter.":/Mega/PHP/Variables/Index Variables.php";

require $index_variables_php_file;

$folders["mega"]["php"]["websites"]["root"] = "Websites";
$variables_folder_variable = "Variables";
$global_variable = "Global";

$folders["mega"]["php"]["variables"]["root"] = $folders["mega"]["php"]["root"].$variables_folder_variable."/";
$folders["mega"]["php"]["variables"]["global_files"]["root"] = $folders["mega"]["php"]["variables"]["root"].$global_variable." Files/";
$folders["mega"]["php"]["variables"]["global_files"]["root"] = $folders["mega"]["php"]["variables"]["global_files"]["root"];
$folders["mega"]["php"]["variables"]["global_files"]["main_arrays"] = $folders["mega"]["php"]["variables"]["global_files"]["root"]."Main Arrays.php";

$index_php = $folders["mega"]["php"]["root"]."Index.php";

# "Main PHP Folders" PHP File Loader
require $folders["mega"]["php"]["variables"]["folders_and_files"];

require $folders["mega"]["php"]["variables"]["global_files"]["main_arrays"];

$slim_php = $raintpl_folder."Slim.php";

require_once $slim_php;

ob_start();

require_once $index_php;

$website = ob_get_clean();

# Website CSS and Javascript definer
require $website_css_and_javascript_definer_php;

if (isset($website_information["website_folder_name"]) == True) {
	$local_website_title = $website_information["website_folder_name"];
}

if (isset($website_information["website_folder_name"]) == False) {
	$local_website_title = $website_information["english_title"];
}

$root_html_folder = $folders["mega"]["websites"]["root"].Remove_Non_File_Characters($local_website_title)."/";

if (file_exists($root_html_folder) == False) {
	mkdir($root_html_folder);
}

if (isset($website_information["language"]) == False) {
	exit;
}

if ($website_information["language"] != "general") {
	$html_folder = $root_html_folder.$website_information["language"]."/";
}

else {
	$html_folder = $root_html_folder;
}

$html_folder = str_replace("%20", " ", $html_folder);

if (file_exists($html_folder) == False) {
	mkdir($html_folder);
}

$html_index_file = $html_folder."Index.html";

function Update_HTML_File($folder, $file) {
	global $website;
	global $file_exists;

	if (file_exists($folder) == False) {
		mkdir($folder);
	}

	if (file_exists($file) == True) {
		$file_exists = True;
	}

	if (file_exists($file) == False) {
		$file_exists = False;
	}

	$file_open = fopen($file, 'w');
	fwrite($file_open, $website);
	fclose($file_open);
}

Update_HTML_File($html_folder, $html_index_file);

$local_website_title_backup = $website_information["language_title"];
$local_website_title = Language_Item_Definer("Website HTML File Generator", "Gerador de Arquivos HTML de Sites").": ".$local_website_title_backup;
$website_link = "";
$website_image = "";
$website_meta_description = Language_Item_Definer("Generator of HTML files for the selected website", "Gerador de arquivos HTMl para o site selecionado").": ".$local_website_title_backup;
$website_information["image_format"] = "png";
$data = date("d/m/Y");

$website_head = '<!DOCTYPE html>
<head>
<title>'.$local_website_title.'</title>
<meta property="og:type" content="website" />
<meta property="og:title" content="'.$local_website_title.'" />
<meta property="og:site_name" content="'.$local_website_title.'" />
<meta property="og:url" content="'.$website_link.'" />
<meta property="og:image" content="'.$website_image.'" />
<meta property="og:description" content="'.$website_meta_description.'" />
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="pt_BR" />
<meta property="og:locale:alternate" content="pt_PT" />
<link rel="canonical" href="'.$website_link.'" />
<link rel="icon" type="image/'.$website_information["image_format"].'" href="'.$website_image.'" />
<link rel="image_src" type="image/'.$website_information["image_format"].'" href="'.$website_image.'" />
<meta name="description" content="'.$website_meta_description.'" />
<meta name="revised" content="'."Stake2's Enterprise TM".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
<meta charset="UTF-8" />
</head>'.
format($css_link_string, array("https://www.w3schools.com/lib/w3"))."\n".
format($css_link_string, array($website_css_styler_css_folder."W3"))."\n".
format($css_link_string, array($website_css_styler_css_folder."Colors"))."\n".
format($css_link_string, array($website_css_styler_css_folder."Main_CSS"))."\n".
'<body style="background-color: black;">'."\n";

echo $website_head;

echo '<center>'."\n";

echo "\n".'<h1 class="text_grey"><b>'."\n".
$website_information["language_title"].": <br />"."\n"
."</h1>"."\n";

$show_text = Language_Item_Definer("This is the name of the website", "Este é o nome do site");

echo "\n".'<h2 class="text_grey"><b>'."\n".
$show_text.": </b><br />"."\n".
$website_information["language_title"]."\n"
."</h2>"."\n"."\n";

$show_text = Language_Item_Definer("This is the folder where the selected website is", "Esta é a pasta onde o site selecionado está");

echo '<h2 class="text_grey"><b>'."\n".
$show_text.": </b><br />"."\n".
Make_Link("file:///".$html_folder, $html_folder, $target = "_blank")."\n"
."</h2>"."\n"."\n";

$show_text = Language_Item_Definer("This is the path to the website HTML file", "Este é o caminho para o arquivo HTML do site");

echo format('<h2 class="text_grey"><b>'."\n".
"{}: </b><br />"."\n".
"{}"."\n"
."</h2>"."\n", array($show_text, Make_Link("file:///".$html_index_file, $html_index_file, $target = "_blank")))."\n";

if ($file_exists == True) {
	$text = Language_Item_Definer("updated with new contents", "atualizado com novos conteúdos");
}

if ($file_exists == False) {
	$text = Language_Item_Definer("created", "criado");
}

$show_text = Language_Item_Definer("The file of the website was {}", "O arquivo do site foi {}");

echo '<h2 class="text_grey"><b>'."\n".
format($show_text, $text)."."."\n"
."</b></h1><br />"."\n";

echo "\n"."</center>";

echo "\n".'</body>'."\n".
'</html>';

?>