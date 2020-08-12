<?php 

if ($siteusesuniversalfilereader == true) {
	$i = 0;
	foreach ($filenamesarray as $file) {
		$filesarray[$i] = $file;

		$i++;
	}

	#File text reader that makes an array of the text files
	$i = 0;
	foreach ($filesarray as $file) {
		if (file_exists($file) == true) {
			$fp = fopen($file, 'r', 'UTF-8'); 
			if ($fp) {
				${"$filetextarraynames[$i]"} = explode("\n", fread($fp, filesize($file)));
				${"$filetextarraynames[$i]"} = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", ${"$filetextarraynames[$i]"});

				$filetexts[$i] = ${"$filetextarraynames[$i]"};
			}
		}

		$i++;
	}

	#File line number counter
	$i = 0;
	foreach ($filesarray as $file) {
		if (file_exists($file) == true) {
			${"$filenumberarraynames[$i]"} = 0;
			$handle = fopen ($file, "r");
			while (!feof ($handle)){
				$line = fgets ($handle);
				${"$filenumberarraynames[$i]"}++;
			}

			$filenumbers[$i] = ${"$filenumberarraynames[$i]"};
		}

		$i++;
	}
}
/*
if ($sitename == $sitexenaeizaque) {
	if (in_array($lang, $en_langs)) {
		$tabdescfile = 'TabDescription1'.ucwords($enus_lang).'';
	}

	if (in_array($lang, $pt_langs)) {
		$tabdescfile = 'TabDescription1';
	}

	$filenamesarray = array(
	'Descriptions',
	$tabdescfile,
	);

	$i = 0;
	foreach ($filenamesarray as $file) {
		$filesarray[$i] = $sitephpfolder2.$filenamesarray[$i].'.txt';

		$i++;
	}

	$i = 0;
	foreach ($filesarray as $file) {
		if (file_exists($file) == true) {
			$filefp = fopen($file, 'r', 'UTF-8');
			if ($filefp) {
				${"$filenamesarray[$i]"} = explode("\n", fread($filefp, filesize($file)));
				${"$filenamesarray[$i]"} = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", ${"$filenamesarray[$i]"});
			}
		}

		$i++;
	}
}*/

if ($sitename == $sitediario) {
	$diarionumbersfile = $used_folder.'Diário Numbers.txt';

	if (file_exists($diarionumbersfile) == true) {
		$diarionumbersfp = fopen($diarionumbersfile, 'r', 'UTF-8');
		if ($diarionumbersfp) {
			$blocksnumber = explode("\n", fread($diarionumbersfp, filesize($diarionumbersfile)));
		}
	}
}

if ($sitename == $sitewatch or in_array($sitename, $yeararray)) {
	#Files definer for Watch.php and Years websites
	$watched2018textfile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2018.'/Watched'.$site2018.'.txt';
	$watched2018timefile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2018.'/Watched'.$site2018.'Time.txt';

	if (in_array($lang, $en_langs)) {
		$watched2018mediatypefile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2018.'/Watched'.$site2018.'MediaType'.ucwords($enus_lang).'.txt';
	}

	if (in_array($lang, $pt_langs)) {
		$watched2018mediatypefile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2018.'/Watched'.$site2018.'MediaType'.ucwords($ptbr_lang).'.txt';
	}

	$watched2019textfile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2019.'/Watched'.$site2019.'.txt';
	$watched2019timefile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2019.'/Watched'.$site2019.'Time.txt';

	if (in_array($lang, $en_langs)) {
		$watched2019mediatypefile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2019.'/Watched'.$site2019.'MediaType'.ucwords($enus_lang).'.txt';
	}

	if (in_array($lang, $pt_langs)) {
		$watched2019mediatypefile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2019.'/Watched'.$site2019.'MediaType'.ucwords($ptbr_lang).'.txt';
	}

	$watched2020textfile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2020.'/Watched'.$site2020.'.txt';
	$watched2020timefile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2020.'/Watched'.$site2020.'Time.txt';

	if (in_array($lang, $en_langs)) {
		$watched2020mediatypefile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2020.'/Watched'.$site2020.'MediaType'.ucwords($enus_lang).'.txt';
	}

	if (in_array($lang, $pt_langs)) {
		$watched2020mediatypefile = $notepad_folder_effort_medianetwork.'/Watch History/'.$site2020.'/Watched'.$site2020.'MediaType'.ucwords($ptbr_lang).'.txt';
	}

	$watchedmediatypefilearray = array(
	$watched2018mediatypefile,
	$watched2019mediatypefile,
	$watched2020mediatypefile,
	);

	$watchedmoviestextfile = $notepad_folder_effort_medianetwork.'/Watch History/WatchedMovies.txt';
	$watchedmoviestimefile = $notepad_folder_effort_medianetwork.'/Watch History/WatchedMoviestime.txt';
	$twfile = $notepad_folder_effort_medianetwork.'/Watch History/ToWatch.txt';
	$twstatusfile = $notepad_folder_effort_medianetwork.'/Watch History/ToWatchStatus.txt';
	$twmediafile = $notepad_folder_effort_medianetwork.'/Watch History/ToWatchMedia.txt';

	if (in_array($lang, $en_langs)) {
		$twmediatypefile = $notepad_folder_effort_medianetwork.'/Watch History/ToWatchMediaType'.ucwords($enus_lang).'.txt';
	}

	if (in_array($lang, $pt_langs)) {
		$twmediatypefile = $notepad_folder_effort_medianetwork.'/Watch History/ToWatchMediaType'.ucwords($ptbr_lang).'.txt';
	}

	$twmediatypeenusfile = $notepad_folder_effort_medianetwork.'/Watch History/ToWatchMediaType'.ucwords($enus_lang).'.txt';
	$twmediatypeptbrfile = $notepad_folder_effort_medianetwork.'/Watch History/ToWatchMediaType'.ucwords($ptbr_lang).'.txt';

	if (file_exists($watchedmoviestextfile) == true) {
		$moviesnumber = 0;
		$handle = fopen ($watchedmoviestextfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$moviesnumber++;
		}
	}

	if (file_exists($watched2018textfile) == true) {
		$watched2018number = 0;
		$handle = fopen ($watched2018textfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$watched2018number++;
		}
	}

	if (file_exists($watched2019textfile) == true) {
		$watched2019number = 0;
		$handle = fopen ($watched2019textfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$watched2019number++;
		}
	}

	if (file_exists($watched2020textfile) == true) {
		$watched2020number = 0;
		$handle = fopen ($watched2020textfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$watched2020number++;
		}
	}

	if (file_exists($twfile) == true) {
		$twnumber = 0;
		$handle = fopen ($twfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$twnumber++;
		}
	}

	if (file_exists($watchedmoviestextfile) == true) {
		$watchedmoviesfp = fopen($watchedmoviestextfile, 'r', 'UTF-8');
		if ($watchedmoviesfp) {
			$watchedmoviestextroot = explode("\n", fread($watchedmoviesfp, filesize($watchedmoviestextfile)));
			$watchedmoviestextarray = str_replace(";", ":", $watchedmoviestextroot);
		}
	}

	if (file_exists($watched2020textfile) == true) {
		$watched2020fp = fopen($watched2020textfile, 'r', 'UTF-8');
		if ($watched2020fp) {
			$watched2020textroot = explode("\n", fread($watched2020fp, filesize($watched2020textfile)));
			$watched2020textarray = str_replace(";", ":", $watched2020textroot);
		}
	}

	if (file_exists($watchedmoviestimefile) == true) {
		$watchedmoviesfp = fopen($watchedmoviestimefile, 'r', 'UTF-8'); 
		if ($watchedmoviesfp) {
			$watchedmoviestimearray = explode("\n", fread($watchedmoviesfp, filesize($watchedmoviestimefile)));
			$watchedmoviestime = str_replace("^", "", $watchedmoviestimearray);
			$watchedmoviestime = str_replace("\n", "", $watchedmoviestime);
		}
	}

	if (file_exists($watchedmoviestextfile) == true) {
		$watchedmoviesfp = fopen($watchedmoviestextfile, 'r', 'UTF-8'); 
		if ($watchedmoviesfp) {
			$watchedmoviestxt = str_replace("^", "", $watchedmoviestextarray);
			$watchedmoviestxt = str_replace("\n", "", $watchedmoviestxt);
		}
	}

	if (file_exists($watched2018mediatypefile) == true) {
		$watched2018mediatypefp  = fopen($watched2018mediatypefile, 'r', 'UTF-8');
		if ($watched2018mediatypefp) {
			$watched2018mediatypearray = explode("\n", fread($watched2018mediatypefp, filesize($watched2018mediatypefile)));
			$watched2018mediatypetxt = str_replace("^", "", $watched2018mediatypearray);
			$watched2018mediatypetxt = str_replace("\n", "", $watched2018mediatypetxt);
		}
	}	

	if (file_exists($watched2018timefile) == true) {
		$watched2018fp = fopen($watched2018timefile, 'r', 'UTF-8');
		if ($watched2018fp) {
			$watched2018timeroot = explode("\n", fread($watched2018fp, filesize($watched2018timefile)));
			$watched2018time = str_replace(";", ":", $watched2018timeroot);
			$watched2018time = str_replace("\n", "", $watched2018time);
		}
	}

	if (file_exists($watched2018textfile) == true) {
		$watched2018fp = fopen($watched2018textfile, 'r', 'UTF-8');
		if ($watched2018fp) {
			$watched2018textroot = explode("\n", fread($watched2018fp, filesize($watched2018textfile)));
			$watched2018txt = str_replace(";", ":", $watched2018textroot);
			$watched2018txt = str_replace("\n", "", $watched2018txt);
		}
	}

	if (file_exists($watched2019mediatypefile) == true) {
		$watched2019mediatypefp  = fopen($watched2019mediatypefile, 'r', 'UTF-8');
		if ($watched2019mediatypefp) {
			$watched2019mediatypearray = explode("\n", fread($watched2019mediatypefp, filesize($watched2019mediatypefile)));
			$watched2019mediatypetxt = str_replace("^", "", $watched2019mediatypearray);
			$watched2019mediatypetxt = str_replace("\n", "", $watched2019mediatypetxt);
		}
	}

	if (file_exists($watched2019timefile) == true) {
		$watched2019fp = fopen($watched2019timefile, 'r', 'UTF-8');
		if ($watched2019fp) {
			$watched2019timeroot = explode("\n", fread($watched2019fp, filesize($watched2019timefile)));
			$watched2019time = str_replace("^", "", $watched2019timeroot);
			$watched2019time = str_replace("\n", "", $watched2019time);
		}
	}

	if (file_exists($watched2019textfile) == true) {
		$watched2019fp = fopen($watched2019textfile, 'r', 'UTF-8');
		if ($watched2019fp) {
			$watched2019textroot = explode("\n", fread($watched2019fp, filesize($watched2019textfile)));
			$watched2019txt = str_replace(";", ":", $watched2019textroot);
			$watched2019txt = str_replace("\n", "", $watched2019txt);
		}
	}

	if (file_exists($watched2020mediatypefile) == true) {
		$watched2020mediatypefp = fopen($watched2020mediatypefile, 'r', 'UTF-8');
		if ($watched2020mediatypefp) {
			$watched2020mediatypearray = explode("\n", fread($watched2020mediatypefp, filesize($watched2020mediatypefile)));
			$watched2020mediatypetxt = str_replace("^", "", $watched2020mediatypearray);
			$watched2020mediatypetxt = str_replace("\n", "", $watched2020mediatypetxt);
		}
	}

	if (file_exists($watched2020timefile) == true) {
		$watched2020fp = fopen($watched2020timefile, 'r', 'UTF-8'); 
		if ($watched2020fp) {
			$watched2020timearray = explode("\n", fread($watched2020fp, filesize($watched2020timefile)));
			$watched2020time = str_replace("^", "", $watched2020timearray);
			$watched2020time = str_replace("\n", "", $watched2020time);
		}
	}

	if (file_exists($watched2020textfile) == true) {
		$watched2020fp = fopen($watched2020textfile, 'r', 'UTF-8'); 
		if ($watched2020fp) {
			$watched2020txt = str_replace("^", "", $watched2020textarray);
			$watched2020txt = str_replace("\n", "", $watched2020txt);
		}
	}

	if (file_exists($twfile) == true) {
		$twfilefp = fopen($twfile, 'r', 'UTF-8');
		if ($twfilefp) {
			$twroot = explode("\n", fread($twfilefp, filesize($twfile)));
			$twtxt = str_replace("\n", "", $twroot);
		}
	}

	if (file_exists($twstatusfile) == true) {
		$twstatusfilefp = fopen($twstatusfile, 'r', 'UTF-8');
		if ($twstatusfilefp) {
			$twstatusroot = explode("\n", fread($twstatusfilefp, filesize($twstatusfile)));
			$twstatustxt = str_replace("\n", " ", $twstatusroot);
		}
	}

	if (file_exists($twmediafile) == true) {
		$twmediafilefp = fopen($twmediafile, 'r', 'UTF-8');
		if ($twmediafilefp) {
			$twmediaroot = explode("\n", fread($twmediafilefp, filesize($twmediafile)));
			$twmediatxt = str_replace("^", "", $twmediaroot);
			$twmediatxt = str_replace("\n", "", $twmediatxt);
		}
	}

	if (file_exists($twmediatypefile) == true) {
		$twmediatypefilefp = fopen($twmediatypefile, 'r', 'UTF-8');
		if ($twmediatypefilefp) {
			$twmediatyperoot = explode("\n", fread($twmediatypefilefp, filesize($twmediatypefile)));
			$twmediatypetxt = str_replace("^", "", $twmediatyperoot);
			$twmediatypetxt = str_replace("\n", "", $twmediatypetxt);
		}
	}

	$watchedmoviestxt = str_replace(array("\r\n", "\r", "\n"), "", $watchedmoviestxt);
	$twtxt = str_replace(array("\r\n", "\r", "\n"), "", $twtxt);
	$twstatustxt = str_replace(array("\r\n", "\r", "\n"), "", $twstatustxt);
	$twmediatxt = str_replace(array("\r\n", "\r", "\n"), "", $twmediatxt);
	$twmediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $twmediatypetxt);

	$watchedtxtarray = array(
	$watched2018txt = str_replace(array("\r\n", "\r", "\n"), "", $watched2018txt),
	$watched2019txt = str_replace(array("\r\n", "\r", "\n"), "", $watched2019txt),
	$watched2020txt = str_replace(array("\r\n", "\r", "\n"), "", $watched2020txt),
	);

	$watchedtimearray = array(
	$watched2018time = str_replace(array("\r\n", "\r", "\n"), "", $watched2018time),
	$watched2019time = str_replace(array("\r\n", "\r", "\n"), "", $watched2019time),
	$watched2020time = str_replace(array("\r\n", "\r", "\n"), "", $watched2020time),
	);

	$watchedmediatypearray = array(
	$watched2018mediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $watched2018mediatypetxt),
	$watched2019mediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $watched2019mediatypetxt),
	$watched2020mediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $watched2020mediatypetxt),
	);

	$watchednumb2018filetext = $watched2018number;
	$watchednumb2018 = $watchednumb2018filetext;

	$watchednumb2019filetext = $watched2019number;
	$watchednumb2019 = $watchednumb2019filetext;

	$watchednumb2020filetext = $watched2020number;
	$watchednumb2020 = $watchednumb2020filetext;

	$watchednumbfilearray = array(
	$watchednumb2018file = $watched2018number - 1,
	$watchednumb2019file = $watched2019number - 1,
	$watchednumb2020file = $watched2020number - 1,
	);

	$twnumbfile = $twnumber - 1;
	$twnumbfiletxt = $twnumber;
	$towatchnumb = $twnumbfiletxt;
	$watchedmoviesnumbfile = $moviesnumber - 1;
	$watchedmoviesnumbfiletext = $moviesnumber;
	$moviesnumb = $watchedmoviesnumbfiletext;
	$archnumb = 2;
	$linksnumb = 6;
	$watchednumbtxt = $watchednumb2020filetext;
	$everywatchednumb = $watchednumb2020filetext + $watchednumb2019filetext + $watchednumb2018filetext;

	$watchednumb2018array = array(2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51);
	$watchednumb2018timearray = array(1, 9, 10, 11, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 46, 47, 48, 49, 50, 51);
	$watchedmovie2018numbarray = array(0, 1, 3, 33, 23, 81, 148, 164);
	$watchedmovie2018timenumbarray = array(1, 4, 5, 6 , 7);
	$watchedmovie2019numbarray = array(23, 81, 148, 164);
	$watchedmovienumbarray = array(0, 1, 3, 33, 23, 81, 148, 164);
	$watchedmovietimenumbarray = array(1, 4, 5, 6, 7, 8);
	$watchedmoviecommentarray = array(1, 4, 5, 6, 7, 8);

	if ($ano == 2018) {
		#Media lines array
		$linesarray = array(
		$moviesline = 1, #Movies
		$seriesline = 14, #Series
		$cartoonsline = 3, #Cartoons
		$animeline = '0', #Animes
		$videoline = 2, #Videos
		);
	}

	if ($ano == 2019) {
		#Media lines array
		$linesarray = array(
		$moviesline = 23, #Movies
		$seriesline = 10, #Series
		$cartoonsline = 2, #Cartoons
		$animeline = 7, #Animes
		$videoline = '0', #Videos
		);
	}

	if ($ano == 2020) {
		#Media lines array
		$linesarray = array(
		$moviesline = 84, #Movies
		$seriesline = 16, #Series
		$cartoonsline = 62, #Cartoons
		$animeline = 2, #Animes
		$videoline = '0', #Videos
		);
	}

	$yearnumber = 2;
	$watchednumbfile = $watchednumbfilearray[$yearnumber];
	$watchedtxtmedia = $watchedtxtarray[$yearnumber];
	$watchedtime = $watchedtimearray[$yearnumber];
	$watchedtype = $watchedmediatypearray[$yearnumber];
	$watchedtypefile = $watchedmediatypefilearray[$yearnumber];

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$moviesnumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Movie' or $watchedtype[$i] == 'Filme') {
				$moviesnumb++;
			}

			$i++;
		}
	}

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$seriesnumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Series' or $watchedtype[$i] == 'Série') {
				$seriesnumb++;
			}

			$i++;
		}
	}

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$cartoonsnumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Cartoon' or $watchedtype[$i] == 'Desenho' or $watchedtype[$i] == 'Cartoon^') {
				$cartoonsnumb++;
			}

			$i++;
		}
	}

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$animesnumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Anime') {
				$animesnumb++;
			}

			$i++;
		}
	}

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$videonumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Video') {
				$videonumb++;
			}

			$i++;
		}
	}

	#Media numbers array
	$medianumbers = array(
	$moviesnumb, #Movies
	$seriesnumb, #Series
	$cartoonsnumb, #Cartoons
	$animesnumb, #Animes
	$videonumb, #Videos
	);

	if (file_exists($twfile) == true) {
		$i = 0;
		$twitems = 0;
		while ($i <= $twnumbfile) {
			if (strpos ($twstatustxt[$i], 'w') == true) {
				echo '';
			}
			
			if (strpos ($twstatustxt[$i], 'tw') == true) {
				$twitems++;
			}

			$i++;
		}
	}
}

if ($sitename == $sitepequenata or $sitename == $sitenazzevo or $sitetype1 == $types[1]) {
	#Readers, comments, readings, synopsis and story date file links
	$readersfile = $notepad_stories_folder_variable.$storyfolder.'/Readers.txt';
	$commentsfile = $notepad_stories_folder_variable.$storyfolder.'/Comments.txt';
	$comments_check_file = $notepad_stories_folder_variable.$storyfolder.'/CommentsCheck.txt';
	$storydatefile = $notepad_stories_folder_variable.$storyfolder.'/Story date.txt';
	$synopsisfile = $notepad_stories_folder_variable.$storyfolder.'/Synopsis.txt';

	if ($sitename == $sitenazzevo) {
		$chapternumberfile = $notepad_stories_folder_variable.$storyfolder.'/ChaptersNumber.txt'; 
	}

	$titlesenusfile = $notepad_stories_folder_variable.$storyfolder.'/CapTitles '.strtoupper($langs[1]).'.txt';

	#Language-dependent text files
	if (in_array($lang, $en_langs)) {
		$titlesfile = $notepad_stories_folder_variable.$storyfolder.'/CapTitles '.strtoupper($langs[1]).'.txt';
		$readsfile = $notepad_stories_folder_variable.$storyfolder.'/Leituras '.strtoupper($langs[1]).'.txt';
	}

	if (in_array($lang, $pt_langs)) {
		$titlesfile = $notepad_stories_folder_variable.$storyfolder.'/CapTitles '.strtoupper($langs[2]).'.txt';
		$readsfile = $notepad_stories_folder_variable.$storyfolder.'/Leituras '.strtoupper($langs[2]).'.txt';
	}

	#File line number counters
	if (file_exists($titlesfile) == true) {
		$chapters = 0;
		$handle = fopen ($titlesfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$chapters++;
		}
	}

	if (file_exists($commentsfile) == true) {
		$cmntsnumb = 0;
		$handle = fopen ($commentsfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$cmntsnumb++;
		}
	}

	/*$file = $comments_check_file;
	if (file_exists($file) == true) {
		${str_replace("file", "number", "$file")} = 0;
		$handle = fopen ($file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			${str_replace("file", "number", print_var_name($comments_check_file))}++;
			$newvar = ${str_replace("file", "number", print_var_name($comments_check_file))};
		}
	}*/

	
	$file = $comments_check_file;
	if (file_exists($file) == true) {
		$comments_check_number = 0;
		$handle = fopen ($file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$comments_check_number++;
		}
	}


	if (file_exists($readersfile) == true) {
		$readersnumb = 0;
		$handle = fopen ($readersfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$readersnumb++;
		}
	}

	if (file_exists($readsfile) == true) {
		$readsnumb = 0;
		$handle = fopen ($readsfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$readsnumb++;
		}
	}

	#File line number fixers
    if (isset($cmntsnumb)) {
        $cmntsfile = $cmntsnumb - 1;
        $cmntstxt = $cmntsnumb;
    }

    if (isset($readersnumb)) {
        $readersfilenumb = $readersnumb - 1;
        $readerstxt = $readersnumb;
    }

    if (isset($readsnumb)) {
        $readsfilenumb = $readsnumb - 1;
        $readsfiletxt = $readsnumb;
    }

	#File text readers
	if (file_exists($titlesfile) == true) {
		$fp = fopen($titlesfile, 'r', 'UTF-8'); 
		if ($fp) {
			$titlestxt = explode("\n", fread($fp, filesize($titlesfile)));
			$titles = str_replace("^", "", $titlestxt);
		}
	}

	if (file_exists($titlesenusfile) == true) {
		$fp = fopen($titlesenusfile, 'r', 'UTF-8'); 
		if ($fp) {
			$titlesenustxt = explode("\n", fread($fp, filesize($titlesenusfile)));
			$titlesenus = str_replace("^", "", $titlesenustxt);
		}
	}

	if (file_exists($readersfile) == true) {
		$fp = fopen($readersfile, 'r', 'UTF-8'); 
		if ($fp) {
			$readersfile = explode("\n", fread($fp, filesize($readersfile)));
			$readers = str_replace("^", "", $readersfile);
		}
	}

	if (file_exists($commentsfile) == true) {
		$fp = fopen($commentsfile, 'r', 'UTF-8'); 
		if ($fp) {
			$commentsfilearray = explode("\n", fread($fp, filesize($commentsfile)));
			$comments = str_replace("|", "", $commentsfilearray);
		}
	}

	if (file_exists($readsfile) == true) {
		$fp = fopen($readsfile, 'r', 'UTF-8'); 
		if ($fp) {
			$readsfilearray = explode("\n", fread($fp, filesize($readsfile)));
			$readstxt = str_replace("|", "", $readsfilearray);
		}
	}

	if (file_exists($storydatefile) == true) {
		$fp = fopen($storydatefile, 'r', 'UTF-8'); 
		if ($fp) {
			$storydatetext = explode("\n", fread($fp, filesize($storydatefile)));
			$storydate = str_replace("^", "", $storydatetext);
		}
	}

	if (file_exists($synopsisfile) == true) {
		$fp = fopen($synopsisfile, 'r', 'UTF-8'); 
		if ($fp) {
			$synopsistext = explode("\n", fread($fp, filesize($synopsisfile)));
			$synopsis = str_replace("^", "", $synopsistext);
		}
	}

	if ($sitename == $sitenazzevo) {
		if (file_exists($chapternumberfile) == true) {
			$fp = fopen($chapternumberfile, 'r', 'UTF-8'); 
			if ($fp) {
				$chapterstext = explode("\n", fread($fp, filesize($chapternumberfile)));
				$chapters = str_replace("^", "", $chapterstext);
			}
		}
	}

	#File character replacers
    if (isset($titlesenus)) {
		$titlesenus = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $titlesenus);
    }

    if (isset($titles)) {
		$titles = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $titles);
    }

	if (isset($readers)) {
		$readers = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $readers);
	}

	if (isset($comments)) {
		$comments = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $comments);
	}

	if (isset($readstxt)) {
		$readstxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $readstxt);
	}

	if (isset($storydate)) {
		$storydate = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $storydate);
	}

	if (isset($synopsis)) {
		$synopsis = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $synopsis);
	}

	if ($sitename == $sitenazzevo) {
		$chapters = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $chapters);
	}
}

if ($sitehaschangelog == true) {
	#Changelog text file definer
	if ($sitename == $sitewatch) {
		if (in_array($lang, $en_langs)) {
			$changelogfile = $sitephpfolder2.'Changelog '.$langs[1].'.php';
		}

		if (in_array($lang, $pt_langs)) {
			$changelogfile = $sitephpfolder2.'Changelog '.$langs[2].'.php';
		}
	}

	#Changelog text file definer
	else {
		if (in_array($lang, $en_langs)) {
			$changelogfile = $sitephpfolder2.'Changelog '.$langs[1].'.txt';
		}

		if (in_array($lang, $pt_langs)) {
			$changelogfile = $sitephpfolder2.'Changelog '.$langs[2].'.txt';
		}
	}

	if (file_exists($changelogfile) == true) {
		#Changelog number counter
		$clnumber = 0;
		$handle = fopen ($changelogfile, "r");
		while (!feof ($handle)) {
			$line = fgets ($handle);
			$clnumber++;
		}
	
		#Changelog number
		$clfile = $clnumber - 1;
		$clfiletext = $clnumber;
	
		#Changelog file reader
		$clfilefp = fopen ($changelogfile, 'r', 'UTF-8');
		if ($clfilefp) {
			$clroot = explode("\n", fread($clfilefp, filesize($changelogfile)));
			$cltxt = str_replace("^", "", $clroot);
		}
	}
}

?>