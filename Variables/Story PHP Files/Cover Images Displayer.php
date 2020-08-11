<?php

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
$sub_folder_text = 'Cover';

if ($lang == $geral_lang) {
	$lang = $enus_lang;

	$rootstoryfolder2 = $nolangstoryfolder.strtoupper($lang).'/';

	if ($storyhascovers == true) {
		$online_cover_folder = $cover_folder.strtoupper($lang).'/';
		$local_cover_folder = $nolangstoryfolder.'Foto/'.$single_cover_folder.strtoupper($lang).'/';

		$online_cover_subfolder = $online_cover_folder.$sub_folder_text.'/';
		$local_cover_subfolder = $local_cover_folder.$sub_folder_text.'/';
	}

	$lang = $geral_lang;
}

else {
	if (in_array($lang, $en_langs)) {
		$rootstoryfolder2 = $nolangstoryfolder.strtoupper($lang).'/';
	}

	if (in_array($lang, $pt_langs)) {
		$rootstoryfolder2 = $nolangstoryfolder.strtoupper($ptbr_lang).'/';
	}

	if ($storyhascovers == true) {
		if (in_array($lang, $en_langs)) {
			$online_cover_folder = $cover_folder.strtoupper($lang).'/';
			$local_cover_folder = $nolangstoryfolder.'Foto/'.$single_cover_folder.strtoupper($lang).'/';
		}

		if (in_array($lang, $pt_langs)) {
			$online_cover_folder = $cover_folder.strtoupper($ptbr_lang).'/';
			$local_cover_folder = $nolangstoryfolder.'Foto/'.$single_cover_folder.strtoupper($ptbr_lang).'/';
		}

		$online_cover_subfolder = $online_cover_folder.$sub_folder_text.'/';
		$local_cover_subfolder = $local_cover_folder.$sub_folder_text.'/';
	}
}

?>