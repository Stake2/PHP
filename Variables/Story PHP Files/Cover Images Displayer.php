<?php

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
if ($lang == $langs[0]) {
	$lang = $langs[1];

	$rootstoryfolder2 = $notepad_stories_folder_variable.$storyfolder.'/'.strtoupper($lang).'/';

	if ($storyhascovers == true) {
		$online_cover_folder = $cover_folder.strtoupper($lang).'/';
		$local_cover_folder = substr($rootstoryfolder2, 0, -5).'Foto/'.$single_cover_folder.strtoupper($lang).'/';
	}

	$lang = $langs[0];
}

else {
	if (in_array($lang, $en_langs)) {
		$rootstoryfolder2 = $notepad_stories_folder_variable.$storyfolder.'/'.strtoupper($lang).'/';
	}

	if (in_array($lang, $pt_langs)) {
		$rootstoryfolder2 = $notepad_stories_folder_variable.$storyfolder.'/'.strtoupper($langs[2]).'/';
	}

	if ($storyhascovers == true) {
		if (in_array($lang, $en_langs)) {
			$online_cover_folder = $cover_folder.strtoupper($lang).'/';
			$local_cover_folder = substr($rootstoryfolder2, 0, -5).'Foto/'.$single_cover_folder.strtoupper($lang).'/';
		}

		if (in_array($lang, $pt_langs)) {
			$online_cover_folder = $cover_folder.strtoupper($langs[2]).'/';
			$local_cover_folder = substr($rootstoryfolder2, 0, -5).'Foto/'.$single_cover_folder.strtoupper($langs[2]).'/';
		}
	}
}

?>