<?php 

if ($sitename == $sitethingsido) {
	#TextFileReader.php file includer
	$sitename2 = $sitename;
	$sitename = $sitewatch;
	include $textfilereaderphp;
	$sitename = $sitename2;

	if ($make2018medias == true and $make2019medias == false) {
		$thingsnumb = 221;
		$thingsnumb2 = 3.108;
		$watchednumb = $watched2018number;

		$moviesnumb = 4; 
		$cartoonsnumb = 5;
		$seriesnumb = 5; 
		$animesnumb = 18;
		$videosnumb = 20;

		$sitesnumb = 6;
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

		$moviesline = $original1;
		$cartoonsline = $original2;
		$seriesline = $original3;
		$animesline = $original4;
		$videosline = $original5;
	}

	if ($make2019medias == true and $make2018medias == false) {
		$thingsnumb = 524;
		$watchednumb = $watched2019number;

		$moviesnumb = 4; 
		$seriesnumb = 9; 
		$cartoonsnumb = 60;
		$animesnumb = 87;
		$videosnumb = 134;

		$storynumb = 4;
		$sitesnumb = 11;
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

		$moviesline = $original1;
		$seriesline = $original2;
		$cartoonsline = $original3;
		$animesline = $original4;
		$videosline = $original5;
	}

	#English texts
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$mediatxt = 'Media';

		#Texts array
		$txts = array(
		'Date of creation',
		'Date of edition',
		'This but on Pastebin',
		'Things made in '.$ano,
		'Watched things',
		'"Watched" on Pastebin',
		'Movies',
		'Series',
		'Cartoons',
		'Animes',
		'Videos',
		$stories[0],
		$stories[1],
		$stories[2],
		$stories[3],
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
	if ($lang == $langs[2]) {
		$mediatxt = 'Mídia';
		
		#Texts array
		$txts = array(
		'Data de criação',
		'Data de edição',
		'Isso só que no Pastebin',
		'Coisas feitas em '.$ano,
		'Coisas assistidas',
		'"Assistidos" no Pastebin',
		'Filmes',
		'Séries',
		'Desenhos',
		'Animes',
		'Videos',
		$stories[0],
		$stories[1],
		$stories[2],
		$stories[3],
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
	$yeartxtfolder = $maintextfolder2.'/Anos/';
	
	#YearsNumbers.txt files
	$yearnumbsfile2018 = $yeartxtfolder.''.$site2018.'/'.$site2018.' Numbers'.'.txt';
	$yearnumbsfile2019 = $yeartxtfolder.''.$site2019.'/'.$site2019.' Numbers'.'.txt';
	
	#YearNumbers.txt 2018 number counter
	$yearnumbsnumber2018 = 0;
	$handle = fopen ($yearnumbsfile2018, "r");
	while (!feof ($handle)){
		$line = fgets ($handle);
		$yearnumbsnumber2018++;
	}
	
	#YearNumbers.txt 2019 number counter
	$yearnumbsnumber2019 = 0;
	$handle = fopen ($yearnumbsfile2019, "r");
	while (!feof ($handle)){
		$line = fgets ($handle);
		$yearnumbsnumber2019++;
	}
	
	#YearNumbers.txt 2018 and 2019 numbers
	$yearnumbsnumb2018file = $yearnumbsnumber2018 - 1;
	$yearnumbsnumb2018filetxt = $yearnumbsnumber2018;
	
	$yearnumbsnumb2019file = $yearnumbsnumber2019 - 1;
	$yearnumbsnumb2019filetxt = $yearnumbsnumber2019;
	
	#YearNumbers.txt 2018 file reader
	$yearnumbs2018fp = @fopen($yearnumbsfile2018, 'r', 'UTF-8');
	if ($yearnumbs2018fp) {
		$yearnumbs2018root = explode("\n", fread($yearnumbs2018fp, filesize($yearnumbsfile2018)));
		$yearnumbs2018txt = str_replace("^", "", $yearnumbs2018root);
	}
	
	#YearNumbers.txt 2019 file reader
	$yearnumbs2019fp = @fopen($yearnumbsfile2019, 'r', 'UTF-8');
	if ($yearnumbs2019fp) {
		$yearnumbs2019root = explode("\n", fread($yearnumbs2019fp, filesize($yearnumbsfile2019)));
		$yearnumbs2019txt = str_replace("^", "", $yearnumbs2019root);
	}
	
	#Replacer for characters
	$yearnumbs2018txt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $yearnumbs2018txt);
	$yearnumbs2019txt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $yearnumbs2019txt);
}

$i = 6;
$v = 0;
if ($mediaarrayyear == $site2018 and $thingsidofake == true) {
	while ($i <= 10) {
		$medias[$v] = $blackspan.$txts[$i].': '.$spanc.$bluespan.$yearnumbs2018txt[$i].$spanc.'<br />'."\n";

		$i++;
		$v++;
	}
}

$i = 6;
$v = 0;
if ($mediaarrayyear == $site2018 and $thingsidofake == null) {
	while ($i <= 10) {
		$medias[$v] = $whitespan.$txts[$i].': '.$spanc.$bluespan.$yearnumbs2018txt[$i].$spanc.'<br />'."\n";

		$i++;
		$v++;
	}
}

$i = 6;
$v = 0;
if ($mediaarrayyear == $site2019) {
	while ($i <= 10) {
		$medias[$v] = $whitespan.$txts[$i].': '.$spanc.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";

		$i++;
		$v++;
	}
}

?>