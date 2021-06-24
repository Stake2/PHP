<?php 

#"Things I do" Website definer
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_things_i_do) == True) {
	$selected_website = $website_things_i_do;

	#Website title and name definer
	$website = $selected_website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Website settings
	$showembeds = false; #If website shows Youtube embeds
	$showembeds2 = false; #If website shows Youtube embeds 2
	$showplaylistembed = false; #If website shows Youtube playlist embeds
	$website_has_stories_tab_setting = True; #If website has a Stories Tab

	#Website settings setter file includer
	require $setting_parameters_file;

	#Website Tabs array
	$tabs = array('Productive Things', 'Not Productive Things');

	#Website Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array('Productive Things', 'Not Productive Things', 'To Write', 'Make Websites', 'To Program/Code', 'Edit Videos', 'To Draw', 'Listen to Music', 'To Talk', 'To Watch', 'To Play Games', 'Songs', 'Playlists');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array('Coisas Produtivas', 'Coisas Não Produtivas', 'Escrever', 'Fazer Sites', 'Programar', 'Editar Vídeos', 'Desenhar', 'Ouvir música', 'Conversar', 'Assistir', 'Jogar Jogos', 'Músicas', 'Playlists');
	}

	# Number of tabs
	$website_tab_number = count($tabs) - 1;

	# Includer of the array of the GenericTabs files
	require $generic_tabs_generator_file;

	$found_selected_website = True;
}

else {
	$found_selected_website = False;
}

?>