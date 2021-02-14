<?php 

$watched_string = "Watched";
$to_watch_string = "To_Watch";

#English texts for all websites
if (in_array($website_language, $en_languages_array)) {
	$andtxt = 'and';
	$newtxt = 'New';
	$ortxt = 'or';
	$numbertxt = 'number';
	$langreadtext = 'Read';
	$website_image_link_text = 'image link';
	$siteicon = '🇺🇸';
	$btnmenutxt = 'Mobile button menu: ';
	$editbtntxt1 = 'Edit text';
	$editbtntxt2 = 'Activate';
	$editbtntxt3 = 'Deactivate';
	$copybtntxt1 = 'Copy HTML';
	$copybtntxt2 = 'Copy text';
	$redondodesc = 'Round revolution ahead!';
	$covertxt = 'Cover';
	$cannotfindfiletxt = 'This file could not be found, sorry';

	$month_text = 'month';
	$months_text = 'months';
	$day_text = 'day';
	$days_text = 'days';

	if ($website_new_design_setting == True) {
		$newdesigntxts = array(
		'Story menu',
		'Chapter menu',
		);
	}
}

#Brazilian Portuguese texts for all websites
if (in_array($website_language, $pt_languages_array)) {
	$andtxt = 'e';
	$newtxt = 'Novo';
	$newtxt2 = 'Nova';
	$ortxt = 'ou';
	$numbertxt = 'número';
	$langreadtext = 'Ler';
	$website_image_link_text = 'link da imagem';
	$siteicon = '🇧🇷';
	$btnmenutxt = 'Menu de botões mobile: ';
	$editbtntxt1 = 'Editar texto';
	$editbtntxt2 = 'Ativar';
	$editbtntxt3 = 'Desativar';
	$copybtntxt1 = 'Copiar HTML';
	$copybtntxt2 = 'Copiar texto';
	$redondodesc = 'Revolução redonda avante!';
	$covertxt = 'Capa';
	$cannotfindfiletxt = 'Não foi possível encontrar este arquivo, desculpe';

	$month_text = 'mês';
	$months_text = 'meses';
	$day_text = 'dia';
	$days_text = 'dias';

	if ($website_new_design_setting == True) {
		$newdesigntxts = array(
		'Menu de histórias',
		'Menu de capítulos',
		);
	}
}

$watched_episodes_text = "Watched Episodes";
$watched_time_text = "Watched Times";
$watched_media_type_text = "Watched Media Types";

$langreadtext2 = strtolower($langreadtext);
$author_name = 'Izaque Sanvezzo (stake2)';

?>