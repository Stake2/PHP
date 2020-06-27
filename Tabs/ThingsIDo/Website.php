<?php 

#"Things I do" Website definer
if (strpos ($host, $params[0].'='.$sitethingsido) == true) {
	$choosenwebsite = $sitethingsido;

	#Site title and name definer
	$site = $choosenwebsite;
	$sitename = $choosenwebsite;
	$setsitecssfile = $pocbcss;

	#Site settings
	$showembeds = false; #If site shows Youtube embeds
	$showembeds2 = false; #If site shows Youtube embeds 2
	$showplaylistembed = false; #If site shows Youtube playlist embeds
	$sitehasstories = true; #If site has a Stories Tab

	#Site Tabs array
	$tabs = array('Productive Things', 'Not Productive Things');

	#Site Tabnames array
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$tabnames = array('Productive Things', 'Not Productive Things', 'To Write', 'Make Websites', 'To Program/Code', 'Edit Videos', 'To Draw', 'Listen to Music', 'To Talk', 'To Watch', 'To Play Games', 'Songs', 'Playlists');
	}

	if ($lang == $langs[2]) {
		$tabnames = array('Coisas Produtivas', 'Coisas Não Produtivas', 'Escrever', 'Fazer Sites', 'Programar', 'Editar Vídeos', 'Desenhar', 'Ouvir música', 'Conversar', 'Assistir', 'Jogar Jogos', 'Músicas', 'Playlists');
	}

	#Number of tabs
	$tabnumb = 12;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>