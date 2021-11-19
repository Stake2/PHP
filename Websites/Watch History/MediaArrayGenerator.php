<?php 

require $year_variables_file;

if ($website_name == $sitethingsido) {
	#TextFileReader.php file includer
	$sitename2 = $website_name;
	$website_name = $sitewatch;
	require $textfilereaderphp;
	$website_name = $sitename2;

	if ($make2018medias == True and $make2019medias == false) {
		$thingsnumb = 221;
		$thingsnumb2 = 3.108;
		$watched_number_ = $watched_episodes_2018_line_number;

		$watched_movies_number = 4; 
		$watched_cartoons_number = 5;
		$watched_series_number = 5; 
		$watched_animes_number = 18;
		$watched_videos_number = 20;

		$websites_number = 6;
		$friendsnumb = 17;
		$cmntsnumb1 = 106;
		$tasksnumb = 44;
		$sizenumb = $bluespan.'16'.$spanc.'GBs';

		#Line number for the 2018 Watched VideoTypes.txt
		$original1 = 12;
		$original2 = 18;
		$original3 = 25;
		$original4 = 32;
		$original5 = 52;

		$media_type_movies_line = $original1;
		$media_type_cartoons_line = $original2;
		$media_type_series_line = $original3;
		$media_type_animes_line = $original4;
		$media_type_videos_line = $original5;
	}

	if ($make2019medias == True and $make2018medias == false) {
		$thingsnumb = 524;
		$watched_number_ = $watched_episodes_2019_line_number;

		$watched_movies_number = 4; 
		$watched_series_number = 9; 
		$watched_cartoons_number = 60;
		$watched_animes_number = 87;
		$watched_videos_number = 134;

		$story_namenumb = 4;
		$websites_number = 11;
		$a = 24;
		$friendsnumb = $yearnumbs2019txt[$a];
		$cmntsnumb1 = 92;
		$cmntsnumb2 = 183;
		$tasksnumb = 44;

		#Line number for the 2019 Watched VideoTypes.txt
		$original1 = 12;
		$original2 = 18;
		$original3 = 29;
		$original4 = 91;
		$original5 = 180;

		$media_type_movies_line = $original1;
		$media_type_series_line = $original2;
		$media_type_cartoons_line = $original3;
		$media_type_animes_line = $original4;
		$media_type_videos_line = $original5;
	}

	#English texts
	if (in_array($website_language, $en_languages_array)) {
		$mediatxt = 'Media';

		#Texts array
		$txts = array(
		'Date of creation',
		'Date of edition',
		'This but on Pastebin',
		'Things made in '.$local_current_year,
		'Watched things',
		'"Watched" on Pastebin',
		'Movies',
		'Series',
		'Cartoons',
		'Animes',
		'Videos',
		'chapter',
		'words',
		'characters',
		'New websites',
		"People that I've met",
		'Link',
		'Comments on SuperAnimes',
		'lines',
		'songs',
		'along with all the downloaded songs',
		'weight size of downloaded music',
		);

		$screenshotsdesc = 'Click on the link below to see the gif/animated image.<br />'.
		'Screenshots from '.$bluespan.'01/01/2019'.$spanc.' to '.$bluespan.'01/12/2019'.$spanc.'.';
		$tasksdesc = 'Made tasks';
	}

	#Brazilian Portuguese texts
	if (in_array($website_language, $pt_languages_array)) {
		$mediatxt = 'Mídia';
		
		#Texts array
		$txts = array(
		'Data de criação',
		'Data de edição',
		'Isso só que no Pastebin',
		'Coisas feitas em '.$local_current_year,
		'Coisas assistidas',
		'"Assistidos" no Pastebin',
		'Filmes',
		'Séries',
		'Desenhos',
		'Animes',
		'Videos',
		'capítulo',
		'palavras',
		'caracteres',
		'Sites novos',
		'Pessoas que conheci',
		'Link',
		'Comentários no SuperAnimes',
		'linhas',
		'musicas',
		'junto com todas as musicas baixadas',
		'Tamanho do peso das musicas baixadas',
		);

		$screenshotsdesc = 'Clique no link abaixo para ver a gif/imagem animada.<br />'.
		'Prints de '.$bluespan.'01/01/2019'.$spanc.' até '.$bluespan.'01/12/2019'.$spanc.'.';
		$tasksdesc = 'Tarefas feitas';
	}
	
	#Years folder
	$year_text_files_folder = $notepad_years_folder;
	
	#YearsNumbers.txt files
	$yearnumbsfile2018 = $year_text_files_folder.$site2018.'/'.$site2018.' Numbers.txt';
	$yearnumbsfile2019 = $year_text_files_folder.$site2019.'/'.$site2019.' Numbers.txt';
	
	#YearNumbers.txt 2018 number counter
	$yearnumbsnumber2018 = 0;
	if (file_exists($yearnumbsfile2018)) {
		$handle = fopen ($yearnumbsfile2018, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$yearnumbsnumber2018++;
		}
	}

	#YearNumbers.txt 2019 number counter
	$yearnumbsnumber2019 = 0;
	if (file_exists($yearnumbsfile2019)) {
		$handle = fopen ($yearnumbsfile2019, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$yearnumbsnumber2019++;
		}
	}
	
	#YearNumbers.txt 2018 and 2019 numbers
	$yearnumbsnumb2018file = $yearnumbsnumber2018 - 1;
	$yearnumbsnumb2018filetxt = $yearnumbsnumber2018;
	
	$yearnumbsnumb2019file = $yearnumbsnumber2019 - 1;
	$yearnumbsnumb2019filetxt = $yearnumbsnumber2019;
	
	#YearNumbers.txt 2018 file reader
	if (file_exists($yearnumbsfile2018)) {
		$yearnumbs2018fp = fopen($yearnumbsfile2018, 'r', 'UTF-8');
		if ($yearnumbs2018fp) {
			$yearnumbs2018root = explode("\n", fread($yearnumbs2018fp, filesize($yearnumbsfile2018)));
			$yearnumbs2018txt = str_replace("^", "", $yearnumbs2018root);
		}
	}
	
	#YearNumbers.txt 2019 file reader
	if (file_exists($yearnumbsfile2019)) {
		$yearnumbs2019fp = fopen($yearnumbsfile2019, 'r', 'UTF-8');
		if ($yearnumbs2019fp) {
			$yearnumbs2019root = explode("\n", fread($yearnumbs2019fp, filesize($yearnumbsfile2019)));
			$yearnumbs2019txt = str_replace("^", "", $yearnumbs2019root);
		}
	}
	
	#Replacer for characters
	$yearnumbs2018txt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $yearnumbs2018txt);
	$yearnumbs2019txt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $yearnumbs2019txt);
}

$i = 6;
$v = 0;
if ($media_array_year == $site2018 and $thingsidofake == True) {
	while ($i <= 10) {
		$medias[$v] = $blackspan.$media_types_plural[$i].': '.$spanc.$bluespan.$yearnumbs2018txt[$i].$spanc.'<br />'."\n";

		$i++;
		$v++;
	}
}

$i = 6;
$v = 0;
if ($media_array_year == $site2018 and $thingsidofake == null) {
	while ($i <= count($media_types_plural) - 1) {
		$medias[$v] = $whitespan.$media_types_plural[$i].': '.$spanc.$bluespan.$yearnumbs2018txt[$i].$spanc.'<br />'."\n";

		$i++;
		$v++;
	}
}

$i = 6;
$v = 0;
if ($media_array_year == $site2019) {
	while ($i <= 10) {
		$medias[$v] = $whitespan.$txts[$i].': '.$spanc.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";

		$i++;
		$v++;
	}
}

?>