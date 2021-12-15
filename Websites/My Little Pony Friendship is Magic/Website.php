<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	# Website title and name definer
	$website_name = $selected_website;
	$choosed_website_css_file = Remove_Non_File_Characters($local_website_name);

	# Website settings setter file includer
	require $setting_parameters_file;

	$website_settings["tab_body_generator"] = True;
	$website_settings["custom_css_style"] = True;

	# Website Tab names array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array("Read Thankful Text", "Characters", "My friends", "Stories", "Pictures", "Videos", "Episodes list");
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array("Ler Texto de Agradecimento", "Personagens", "Meus amigos", "Histórias", "Fotos", "Vídeos", "Lista de episódios");
	}

	#Number of tabs
	$website_tab_number = count($tab_names) - 1;

	$found_selected_website = True;
}

?>