<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0].'='.$website_keys[$local_website_name]) == True) {
	$selected_website = $local_website_name;

	# Website title definer
	$website_name = $website_titles[$selected_website];

	$choosed_website_css_file = $css_file_pocb;

	#Website settings
	$showembeds = false; #If website shows Youtube embeds
	$showembeds2 = false; #If website shows Youtube embeds 2
	$showplaylistembed = false; #If website shows Youtube playlist embeds
	$story_website_settings["show_chapter_covers"] = True; #If website has a Stories Tab

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
	$website_tab_number = count($tab_names) - 1;

	$found_selected_website = True;
}

else {
	$found_selected_website = False;
}

?>