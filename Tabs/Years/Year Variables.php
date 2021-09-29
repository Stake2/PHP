<?php 

# Years PHP Files
$year_variables_file = $website_folder_years."Year Variables.php";

#Author text
$author = 'Izaque Sanvezzo (hm182002) (stake2, Funkysnipa Cat)';

#Story variables for English language
if (in_array($website_language, $en_languages_array)) {
	$bulkan = 'The Story of the Bulkan Siblings';
	$pequenata = 'The Life of Littletato';
}

#Story variables for Brazilian Portuguese language
if (in_array($website_language, $pt_languages_array)) {
	$bulkan = 'A História dos irmãos Bulkan';
	$pequenata = 'A Vida de Pequenata';
}

if (in_array($website_language, $en_languages_array)) {
	$new_text = $new_text;
}

if (in_array($website_language, $pt_languages_array)) {
	$new_text = $new_feminine_text;
}

#Story language variables array setter
$stories = array(
$pequenata,
'SpaceLiving',
'A Perfect World',
$bulkan,
$luiza,
);

#Story links array
$story_namelinks = array(
$main_website_url.'pequenata/',
$main_website_url.'new_world/spaceliving/',
$main_website_url.'lonely stories/',
$main_website_url.'bulkan/',
$main_website_url.'luiza/',
);

#Links array
$links = array(
$main_website_url.'stake2/',
);

#English texts
if (in_array($website_language, $en_languages_array)) {
	$sitename2 = 'Text Maker';
	$author = 'Written by '.'<a href="'.$links[0].'" class="w3-text-orange">'.$author.'</a>';
	$author2 = 'I am Izaque Sanvezzo (stake2) and these are my stories.';
	$mediatxt = 'Media';
	
	#Texts array
	$txts = array(
	'Date of creation',
	'Edit date',
	'Things made in '.$current_year,
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

	$additional_things_made_in_year_text = "along with comments and people met";

	$year_summary_text = "My";
	$creation_date_text = "Creation date";
	$edit_date_text = "Edit date";

	$things_made_in_current_year_text = "Things made in ".$current_year;
	$productive_things_text = "Productive things";
	$watched_things_text = "Watched things";
	$new_stories_text = "New stories";
	$story_progress_text = "Story progress";
	$new_websites_text = "New websites";
	$people_text_i_met_text = "People that I have met";
	$comments_on_super_animes_text = "Comments on Super Animes";
}

#Brazilian Portuguese texts
if (in_array($website_language, $pt_languages_array)) {
	$sitename2 = 'Fazedor de Texto';
	$author = 'Escrito por '.'<a href="'.$links[0].'" class="w3-text-orange">'.$author.'</a>';
	$author2 = 'Eu sou Izaque Sanvezzo (stake2) e estas são as minhas histórias.';
	$mediatxt = 'Mídia';
	
	#Texts array
	$txts = array(
	'Data de criação',
	'Data de edição',
	'Coisas feitas em '.$current_year,
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

	$additional_things_made_in_year_text = "junto com comentários e pessoas conhecidas";

	$year_summary_text = "Meu";
	$creation_date_text = "Data de Criação";
	$edit_date_text = "Data de edição";

	$things_made_in_current_year_text = "Coisas feitas em ".$current_year;
	$productive_things_text = "Coisas produtivas";
	$watched_things_text = "Coisas assistidas";
	$new_stories_text = "Novas histórias";
	$story_progress_text = "Progresso das histórias";
	$new_websites_text = "Novos sites";
	$people_text_i_met_text = "Pessoas que conheci";
	$comments_on_super_animes_text = "Comentários no website Super Animes";
}

$things_made_in_current_year_text_key = strtolower(str_replace(" ", "_", str_replace(" ".$current_year, " year", $things_made_in_current_year_text)));
$productive_things_key = strtolower(str_replace(" ", "_", $productive_things_text));
$watched_things_text_key = strtolower(str_replace(" ", "_", $watched_things_text));
$new_stories_text_key = strtolower(str_replace(" ", "_", $new_stories_text));
$story_progress_text_key = strtolower(str_replace(" ", "_", $story_progress_text));
$new_websites_text_key = strtolower(str_replace(" ", "_", $new_websites_text));
$people_text_i_met_text_key = strtolower(str_replace(" ", "_", $people_text_i_met_text));
$comments_on_super_animes_key = strtolower(str_replace(" ", "_", $comments_on_super_animes_text));

#Years folder
$year_text_files_folder = $notepad_years_folder;

#YearsNumbers.txt files
$yearnumbsfile2018 = $year_text_files_folder.$website_2018.'/'.$website_2018.' Numbers.txt';
$yearnumbsfile2019 = $year_text_files_folder.$website_2018.'/'.$website_2019.' Numbers.txt';

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
#if (file_exists($yearnumbsfile2018)) {
#	$yearnumbs2018fp = fopen($yearnumbsfile2018, 'r', 'UTF-8');
#	if ($yearnumbs2018fp) {
#		$yearnumbs2018root = explode("\n", fread($yearnumbs2018fp, filesize($yearnumbsfile2018)));
#		$yearnumbs2018txt = str_replace("^", "", $yearnumbs2018root);
#	}
#}

#YearNumbers.txt 2019 file reader
#if (file_exists($yearnumbsfile2019)) {
#	$yearnumbs2019fp = fopen($yearnumbsfile2019, 'r', 'UTF-8');
#	if ($yearnumbs2019fp) {
#		$yearnumbs2019root = explode("\n", fread($yearnumbs2019fp, filesize($yearnumbsfile2019)));
#		$yearnumbs2019txt = str_replace("^", "", $yearnumbs2019root);
#	}
#}

#Replacer for characters
#$yearnumbs2018txt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $yearnumbs2018txt);
#$yearnumbs2019txt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $yearnumbs2019txt);

?>