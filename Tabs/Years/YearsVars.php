<?php 

#Year texts

#Author text
$author = 'Izaque Sanvezzo (hm182002) (stake2, Funkysnipa Cat)';

#Story variables for English language
if ($lang == $langs[0] or $lang == $langs[1]) {
	$nazzevo = 'The Story of the Nazzevo Brothers';
	$luiza = 'The Visit of Luiza';
	$pequenata = 'The Life of Littletato';
}

#Story variables for Brazilian Portuguese language
if ($lang == $langs[2]) {
	$nazzevo = 'A História dos irmãos Nazzevo';
	$luiza = 'A Visita de Luiza';
	$pequenata = 'A Vida de Pequenata';
}

if ($lang == $langs[0] or $lang == $langs[1]) {
	$newtxt = $newtxt;
}

if ($lang == $langs[2]) {
	$newtxt = $newtxt2;
}

#Story language variables array setter
$stories = array(
$pequenata,
'SpaceLiving',
'A Perfect World',
$nazzevo,
$luiza,
);

#Story links array
$storylinks = array(
$url.'pequenata/',
$url.'new_world/spaceliving/',
$url.'lonely stories/',
$url.'nazzevo/',
$url.'luiza/',
);

#Links array
$links = array(
$url.'stake2/',
);

#English texts
if ($lang == $langs[0] or $lang == $langs[1]) {
	$sitename2 = 'Text Maker';
	$author = 'Written by '.'<a href="'.$links[0].'" class="w3-text-orange">'.$author.'</a>';
	$author2 = 'I am Izaque Sanvezzo (stake2) and these are my stories.';
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
	$stories[4],
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
	$sitename2 = 'Fazedor de Texto';
	$author = 'Escrito por '.'<a href="'.$links[0].'" class="w3-text-orange">'.$author.'</a>';
	$author2 = 'Eu sou Izaque Sanvezzo (stake2) e estas são as minhas histórias.';
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
	$stories[4],
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
$yeartxtfolder = $notepad_years_folder_variable;

#YearsNumbers.txt files
$yearnumbsfile2018 = $yeartxtfolder.$site2018.'/'.$site2018.' Numbers.txt';
$yearnumbsfile2019 = $yeartxtfolder.$site2019.'/'.$site2019.' Numbers.txt';

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

?>