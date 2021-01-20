<?php 

$chapter_number_1 = 1;
$chapter_number_2 = 2;
$chapter_number_3 = 0;
$chapter_number_4 = 0;
$chapter_number_4a = 0;
$chapter_number_7 = 0;
$chapter_text_style = $textstyle2;
$captxtname = str_replace("s", "", $chapters_text);

#Defines the folder for the chapter text files that are going to be read
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];
	$story_chapter_files_folder_language = $rootstoryfolder.$story_name_folder."/".strtoupper($website_language).'/';
	$website_language = $languages_array[0];
}

else {
	$story_chapter_files_folder_language = $rootstoryfolder.$story_name_folder."/".strtoupper($website_language).'/';
}

$chapter_date_number = 1;
$a = 1;
$z = 1;

#Chapter file text link array generator
while ($a <= $chapters) {
	$a2 = $a - 1;
	$normal_chapters[$a] = $story_chapter_files_folder_language.$z.' - '.$chapter_titles[$a2].'.txt';
	$normal_chapters[$a] = str_replace(array("\r\n", "\r", "\n"), "<br />", $normal_chapters[$a]);

	$z++;
	$a++;
}

#Chapter date file reader
$a = 0;
$z = 0;

while ($a <= $chapters) {
	$a2 = $a - 1;
	$chapter_dates_file = $rootstoryfolder.$story_name_folder."/".'Datas.txt';
	$fp = fopen($chapter_dates_file, 'r', 'UTF-8'); 
	if ($fp) {
		$chapter_dates = explode("\n", fread($fp, filesize($chapter_dates_file)));
		$chapter_dates = str_replace("^", "", $chapter_dates);
	}
	$chapter_dates[$a] = str_replace(array("\r\n", "\r", "\n"), "<br />", $chapter_dates[$a]);

	$z++;
	$a++;
}

$i = 0;
$z = 1;
$a = 1;
$a2 = 1;
$b1 = 0;
$b2 = 0;
$b4 = 0;

echo "\n";

#Comment and read modal style css
echo '<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>';
echo "\n";

$v1 = 0;
$v2 = 0;

#Read date converter
while ($v2 <= $readsfilenumb) {
	$v3 = $v2 + 2;
	$readstxt[$v3] = substr($readstxt[$v3], 0, -1);
	$readstxt[$v3] = date("H:i d/m/Y", strtotime($readstxt[$v3]));

	$v2++;
	$v2++;
	$v2++;
}

$v1 = 0;

#"Reads" array generator
while ($b1 <= $readsfilenumb) {
	$b22 = $b1 + 1;
	$b3 = $b1 + 2;

	$story_name_reads_array[$v1] = $margin.'<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.
	#Reader text and name
	$readerstxt2.': </b>'.$readstxt[$b1].'<br /><b>'.
	
	#Chapter text and title
	substr($chapters_text, 0, -1).':</b> '.$readstxt[$b22].'<br />'.'<b>'.
	
	#Read time text and time
	$time_text.':</b> '.$readstxt[$b3].' <br /><br />'.$div_close.'</'.$m.'>'.$div_close."\n";
	
	$b1++;
	$b1++;
	$b1++;
	$v1++;
	$b4++;
}


$b1 = 0;
$b2 = 1;
$h = $readed_number;
$zw = 0;
$zq = 1;
$za = 2;
$m = 10;

#Chapter reader/writer
while ($chapter_number_1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$reading2 = $reading.'<b>'.$captxtname.' '.$chapter_number_1.' - '.$chapter_titles[$chapter_number_4];
	echo "\n";
	
	#Tab div id
    echo '<a name="'.$chapter_div_text.$chapter_number_1.'"></a>';
	echo "\n";
	echo '<div id="'.$chapter_div_text.$chapter_number_1.'" class="city '.$chapter_text_style.'" style="display:none;'.$hstyle2.'">';
	echo "\n";
	echo '<br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" />';
	echo "\n";
	echo '<br />';
	echo "\n";

	#'You're Reading $story_name_variable' Text
	if ($chapter_number_1 == $chapters) {
		echo '<h2 class="'.$textstyle2.'">'."\n";
		echo $div_zoom_animation.'<br />'.$reading2.'</b>'.' <span class="w3-text-yellow"><b>['.$newtxt.'!]</b></span><br />'.$div_close.'</'.$n.'>';
		$chapter_number_4++;
	} 

	else {
		echo '<h2 class="'.$chapter_text_style.'">'."\n";
		echo $div_zoom_animation.'<br />'.$reading2.'</b>'.$div_close.'</'.$n.'><br />';
		$chapter_number_4++;
	}

	echo "\n";
	echo '<h5 class="'.$chapter_text_style.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr3.'" />';
	echo "\n";
	
	#Top Next/Previous chapter button
	echo '<a href="#'.$chapter_div_text.$chapter_number_3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$chapter_div_text.$chapter_number_3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$chapter_div_text.$chapter_number_2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$chapter_div_text.$chapter_number_2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$citycodes[0].'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-right:15px;" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>';
	echo '<br /><br /><br /><br />';
	echo "\n";
	echo $div_zoom_animation;
	echo "\n";

	#Replaces the "?"s in the chapter 26 file name with nothing
	if ($chapter_number_1 == 26) {
		$normal_chapters[$chapter_number_1] = str_replace(array("?"), "", $normal_chapters[$chapter_number_1]);
	}

	if ($file = fopen($normal_chapters[$chapter_number_1], "r")) {
    while(!feof($file)) {
        $line = fgets($file);
		$line = str_replace(array("\r\n", "\r", "\n"), "", $line);
		echo $line."\n"."<br />";
    }
		fclose($file);
	}

	$fp = fopen($chapter_dates_file, 'r', 'UTF-8'); 
	if ($fp) {
		$chapter_written_dates = explode("\n", fread($fp, filesize($chapter_dates_file)));
		$chapter_written_dates = str_replace("^", "", $chapter_written_dates);
		$chapter_written_dates = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $chapter_written_dates);
	}
	echo '<br />';
	echo $chapter_date_text_two.': '.$chapter_written_dates[$chapter_date_number].'.';

	echo "\n";
	echo $div_close;
	echo "\n";
	echo '<br /><br />';
	echo "\n";

	#Bottom Next/Previous chapter button
	echo '<a href="#'.$chapter_div_text.$chapter_number_3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$chapter_div_text.$chapter_number_3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$chapter_div_text.$chapter_number_2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-left:15px;" onclick="openCity('."'".$chapter_div_text.$chapter_number_2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a> ';
	echo "\n";

	#Computer Comment and Read buttons
	echo '<div class="'.$computer_variable.'">'."\n";
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computer_variable.'" id="commentbtn'.$a.'" style="margin-left:15px;float:right;"><h3><b>'.$commenttxt2.' '.$icons[12].' ('.$number_of_chapter_comments.')</b></h3></button>'."\n";
	echo $div_close;
	echo '<div class="'.$computer_variable.'">';
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computer_variable.'" id="readbtn'.$a.'" style="margin-left:15px;float:right;"><h3><b>'.$readedtxt.' ('.$readed_number.')</b></h3></button>'."\n";
	echo $div_close."\n";
	echo '<div class="'.$mobile_variable.'"><br /><br /><br />'.$div_close.'<div class="'.$computer_variable.'"><br /><br /><br /><br /><br />'.$div_close."\n";

	#"You're Reading $story_name_variable" Text
	if ($chapter_number_1 == $chapters) {
		echo '<div style="text-align:center;">'.$div_zoom_animation.'<span class="'.$chapter_text_style.'"><br />'.$reading2.' <span class="w3-text-yellow">['.$newtxt.'!]</span>'.'</b><br /></span>'.$div_close.$div_close;
		$chapter_number_7++;
	} 

	else {
		echo '<div style="text-align:center;">'.$div_zoom_animation.'<span class="'.$chapter_text_style.'"><br />'.$reading2.'</b><br /></span>'.$div_close.$div_close;
		$chapter_number_7++;
	}

	#Mobile Comment and Read buttons
	echo "\n";
	echo '<div class="'.$mobile_variable.'"><br /><br />'.$div_close;
	echo '<div class="'.$mobile_variable.'">'."\n";
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobile_variable.'" id="commentbtn'.$a.'m" style="margin-left:15px;float:right;"><'.$m.'><b>'.$commenttxt2.' '.$icons[12].' ('.$number_of_chapter_comments.')</b></'.$m.'></button>'."\n";
	echo '<br /><br />';
	echo $div_close;
	echo '<div class="'.$mobile_variable.'">';
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobile_variable.'" id="readbtn'.$a2.'m" style="margin-left:15px;float:right;" onclick="openCity('."'".'modal-read-'.$a2."m')".'"><'.$m.'><b>'.$readedtxt.' ('.$readed_number.')</b></'.$m.'></button>'."\n";
	echo $div_close."\n";
	echo "\n";
	echo '<br /><div class="'.$mobile_variable.'"><br /><br /></div>';
	echo "\n";
	echo '<hr class="'.$sitehr3.'" />';
	echo "\n";
	echo '</h5>';
	echo "\n";

	#Readings and Comments displayer on chapters
	if ($website_name == $sitepqnt) {
		if ($chapter_number_1 == 1) {
			echo '<div class="'.$computer_variable.'">'.'<br />'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<br /><br />'.$div_close;
			echo '<div class="'.$computer_variable.'">'.'<'.$n.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$n.'>'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<'.$m.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$m.'>'.$div_close;
	
			echo '<div class="'.$mobile_variable.'">'.'<br /><br />'.$div_close;
			echo '<div class="'.$computer_variable.'">'.'<br /><br />'.$div_close;
			echo $margin;
			echo $story_name_chapter_comments_array[0];
			echo $div_close;
		}

		if ($chapter_number_1 == 2) {
			echo '<div class="'.$computer_variable.'">'.'<br />'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<br /><br />'.$div_close;
			echo '<div class="'.$computer_variable.'">'.'<'.$n.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$n.'>'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<'.$m.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$m.'>'.$div_close;
	
			echo '<div class="'.$mobile_variable.'">'.'<br /><br />'.$div_close;
			echo '<div class="'.$computer_variable.'">'.'<br /><br />'.$div_close;
			echo $margin;
			echo $story_name_chapter_comments_array[(4 + $zw)];
			echo $story_name_chapter_comments_array[(1 + $zw)];
			echo $div_close;
		}

		if ($chapter_number_1 == 3) {
			echo '<div class="'.$computer_variable.'">'.'<br />'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<br /><br />'.$div_close;
			echo '<div class="'.$computer_variable.'">'.'<'.$n.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$n.'>'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<'.$m.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$m.'>'.$div_close;
	
			echo '<div class="'.$mobile_variable.'">'.'<br /><br />'.$div_close;
			echo '<div class="'.$computer_variable.'">'.'<br /><br />'.$div_close;
			echo $margin;
			echo $story_name_chapter_comments_array[(2 + $zw)];
			echo $story_name_chapter_comments_array[(5 + $zw)];
			echo $div_close;
		}

		if ($chapter_number_1 == 8) {
			echo '<div class="'.$computer_variable.'">'.'<br />'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<br /><br />'.$div_close;
			echo '<div class="'.$computer_variable.'">'.'<'.$n.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$n.'>'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<'.$m.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$m.'>'.$div_close;
	
			echo '<div class="'.$mobile_variable.'">'.'<br /><br />'.$div_close;
			echo '<div class="'.$computer_variable.'">'.'<br /><br />'.$div_close;
			echo $margin;
			echo $story_name_chapter_comments_array[(3 + $zw)];
			echo $div_close;
		}

		if ($chapter_number_1 > 1 and $chapter_number_1 < 11) {
			echo '<div class="'.$computer_variable.'">'.'<br />'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<br />'.$div_close;
			echo '<div class="'.$computer_variable.'">'.'<'.$n.'><b>'.$readedtxt4.': ✓</b></'.$n.'>'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<'.$m.'><b>'.$readedtxt4.': ✓</b></'.$m.'>'.$div_close;

			echo '<div class="'.$computer_variable.'">'.'<br /><br />'.$div_close;
			echo '<div class="'.$mobile_variable.'">'.'<br /><br />'.$div_close;

			echo $story_name_reads_array[$h];
		}

		if ($chapter_number_1 == 1) {
			echo $story_name_reads_array[($h - ($m + $za))];
			echo $story_name_reads_array[($h - ($m + $zq))];
		}
	}

	echo $div_close;
	echo "\n";
	$i++;
	$i2++;
	$a++;
	$a2++;
	
	if ($h != 0) {
		$h--;
	}

    $chapter_number_1++;
    $chapter_number_2++;
    $chapter_number_3++;
	$chapter_date_number++;
	$chapter_date_number++;
	$chapter_date_number++;
}

$i = 1;
$i22 = 1;
$a = 1;
$a2 = 1;
$z = 1;
$z2 = 1;
$c = 0;
$c22 = 0;
$chapter_number_1 = 1;
$capnum12 = 1;
$chapter_number_4 = 0;
$capnum42 = 0;

#Read-modal Tab generation
while ($chapter_number_1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$c2 = $c + 1;

	echo "\n";
	
	#Computer Read-modal Tab div id
	echo '<a name="modal-read-'.$a.'"></a>'."\n";
	echo '<div id="modal-read-'.$a.'" class="modal" style="display:none;">'."\n";
	echo $div_zoom_animation;
	echo '<div class="modal-content w3-black">'."\n";
	echo '<div class="'.$computer_variable.'">';
	
	#Close read-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computer_variable.' close" id="closereadmodal'.$a.'">&times;</button>'."\n";
	
	#Computer Read-modal form
	echo '<form name="'.$formcode.'-read-'.$a.'" method="POST" data-netlify="true">'."\n";
	echo $div_zoom_animation.'<'.$n.' class="'.$colortext.'"><b>'.$readedtxt2.': '.$chapter_number_1.' - '.$chapter_titles[$chapter_number_4].'</b></'.$n.'>'.$div_close."\n";
	echo $margin2;
	echo $div_zoom_animation.'<'.$n.' class="'.$colortext.'"><b>'.$person_name_text_two.' '.strtolower($person_name_text).':</b></'.$n.'>'.$div_close."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input">'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computer_variable.'" style="margin-top:1px;margin-left:15px;float:right;"><'.$m.'><b>'.$send_form_text.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
	echo $div_close;
	echo '<input type="text" name="'.$formcode.'-read" value="'.$readedtxt2.': '.$i.' - '.$chapter_titles[$c].'" class="'.$formcolor.' w3-input" style="display:none;">'."\n";
	echo '<br /><br /><br /><br />';
	echo '</form>'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	echo "\n";

	#Mobile Read-modal Tab div id
	echo '<a name="modal-read-'.$a2.'m"></a>'."\n";
	echo '<div id="modal-read-'.$a2.'m" class="modal" style="display:none;">'."\n";
	echo $div_zoom_animation;
	echo '<div class="modal-content w3-black">'."\n";
	echo '<div class="'.$mobile_variable.'">';

	#Close read-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobile_variable.' close" id="closereadmodal'.$a2.'m">&times;</button><br /><br /><br />'."\n";

	#Mobile Read-modal form
	echo '<form name="'.$formcode.'-read-'.$a2.'" method="POST" data-netlify="true">'."\n";
	echo $div_zoom_animation.'<'.$m.' class="'.$colortext.'"><b>'.$readedtxt2.': '.$capnum12.' - '.$chapter_titles[$capnum42].'</b></'.$m.'>'.$div_close."\n";
	echo $margin2;
	echo '<br />';
	echo $div_zoom_animation.'<'.$m.' class="'.$colortext.'"><b>'.$person_name_text_two.' '.strtolower($person_name_text).':</b></'.$m.'>'.$div_close."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input">'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobile_variable.'" style="margin-top:1px;margin-left:15px;float:right;"><'.$m.'><b>'.$send_form_text.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
	echo $div_close;
	echo '<input type="text" name="'.$formcode.'-read" value="'.$readedtxt2.': '.$i22.' - '.$chapter_titles[$c22].'" class="'.$formcolor.' w3-input" style="display:none;">'."\n";
	echo '<br /><br /><br /><br />';
	echo '</form>'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	echo "\n";

	#Computer Read-modal open and close script
	echo '<script>
var readmodal'.$a.' = document.getElementById("modal-read-'.$a.'");

var readbtn'.$a.' = document.getElementById("readbtn'.$a.'");

var readclosebtn'.$a.' = document.getElementById("closereadmodal'.$a.'");

readbtn'.$a.'.onclick = function() {
	readmodal'.$a.'.style.display = "block";
}

readclosebtn'.$a.'.onclick = function() {
	readmodal'.$a.'.style.display = "none";
}

readmodal'.$a.'.onclick = function(event) {
	if (event.target == readmodal'.$a.') {
		readmodal'.$a.'.style.display = "none";
	}
}
</script>';

	echo "\n";

	#Mobile Read-modal open and close script
	echo '<script>
var readmodal'.$a2.'m = document.getElementById("modal-read-'.$a2.'m");

var readbtn'.$a2.'m = document.getElementById("readbtn'.$a2.'m");

var readclosebtn'.$a2.'m = document.getElementById("closereadmodal'.$a2.'m");

readbtn'.$a2.'m.onclick = function() {
	readmodal'.$a2.'m.style.display = "block";
}

readclosebtn'.$a2.'m.onclick = function() {
	readmodal'.$a2.'m.style.display = "none";
}

readmodal'.$a2.'m.onclick = function(event) {
	if (event.target == readmodal'.$a2.'m) {
		readmodal'.$a2.'m.style.display = "none";
	}
}
</script>';
	echo "\n";
	$c++;
	$c22++;
	$chapter_number_1++;
	$chapter_number_4++;
	$i++;
	$z++;
	$a++;
	$capnum12++;
	$capnum42++;
	$i22++;
	$z2++;
	$a2++;
}

$i = 1;
$i22 = 1;
$a = 1;
$a2 = 1;
$z = 1;
$z2 = 1;
$c = 0;
$c22 = 0;
$chapter_number_1 = 1;
$capnum12 = 1;
$chapter_number_4 = 0;
$capnum42 = 0;

#Comment-modal Tab generation
while ($chapter_number_1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$c2 = $c + 1;

	echo "\n";

	#Computer comment-modal Tab div id
	echo '<a name="modal-comment-'.$a.'"></a>'."\n";
	echo '<div id="modal-comment-'.$a.'" class="modal" style="display:none;">'."\n";
	echo $div_zoom_animation."\n";
	echo '<div class="modal-content w3-black">'."\n";
	echo '<div class="'.$computer_variable.'">'."\n";

    #Close comment-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computer_variable.' close" id="closecommentmodal'.$a.'">&times;</button>'."\n";

    #Computer Comment-modal form
	echo $div_zoom_animation.'<'.$n.' class="'.$colortext.'"><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($chapters_text, 0, -1).' '.$chapter_number_1.' - '.$chapter_titles[$chapter_number_4].' '.$icons[12].'</b></'.$n.'>'.$div_close.'<hr class="'.$tab_full_border.'" />'."\n";
	echo '<form name="'.$formcode.'-comment-'.$a.'" method="POST" data-netlify="true">'."\n";
	echo $margin2."\n";
	echo $div_zoom_animation.'<'.$n.' class="'.$colortext.'"><b>'.$person_name_text_two.' '.strtolower($person_name_text).':</b></'.$n.'>'.$div_close."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input">'."\n";
	echo '<br />'."\n";
	echo $div_zoom_animation.'<'.$n.' class="'.$colortext.'"><b>'.$commentdesc2.':</b></'.$n.'>'.$div_close."\n";
	echo '<input type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input">'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computer_variable.'" style="margin-top:1px;margin-left:15px;float:right;"><'.$m.'><b>'.$send_form_text.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
	echo $div_close."\n";
	echo '</form>'."\n";
	echo $div_close."\n";
	echo '<br /><br /><br /><br />'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	echo "\n";

	#Mobile Comment-modal Tab div id
	echo '<a name="modal-comment-'.$a2.'m"></a>'."\n";
	echo '<div id="modal-comment-'.$a2.'m" class="modal" style="display:none;">'."\n";
	echo $div_zoom_animation."\n";
	echo '<div class="modal-content w3-black">'."\n";
	echo '<div class="'.$mobile_variable.'">'."\n";

    #Close comment-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobile_variable.' close" id="closecommentmodal'.$a2.'m">&times;</button><br /><br /><br />'."\n";

    #Mobile Comment-modal form
	echo '<form name="'.$formcode.'-comment-'.$a2.'" method="POST" data-netlify="true">'."\n";
	echo $div_zoom_animation.'<'.$m.' class="'.$colortext.'"><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($chapters_text, 0, -1).' '.$capnum12.' - '.$chapter_titles[$chapter_number_4].' '.$icons[12].'</b></'.$m.'>'.$div_close.'<hr class="'.$tab_full_border.'" />'."\n";
	echo $margin2."\n";
	echo '<br />'."\n";
	echo $div_zoom_animation.'<'.$m.' class="'.$colortext.'"><b>'.$person_name_text_two.' '.strtolower($person_name_text).':</b></'.$m.'>'.$div_close."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input">'."\n";
	echo '<br />'."\n";
	echo $div_zoom_animation.'<'.$m.' class="'.$colortext.'"><b>'.$commentdesc2.':</b></'.$m.'>'.$div_close."\n";
	echo '<input type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input">'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobile_variable.'" style="margin-top:1px;margin-left:15px;float:right;"><'.$m.'><b>'.$send_form_text.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
	echo $div_close."\n";
	echo '</form>'."\n";
	echo $div_close."\n";
	echo '<br /><br /><br /><br />'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	echo "\n";

	#Computer Comment-modal open and close script
	echo '<script>
var commentmodal'.$a.' = document.getElementById("modal-comment-'.$a.'");

var commentbtn'.$a.' = document.getElementById("commentbtn'.$a.'");

var commentclosebtn'.$a.' = document.getElementById("closecommentmodal'.$a.'");

commentbtn'.$a.'.onclick = function() {
	commentmodal'.$a.'.style.display = "block";
}

commentclosebtn'.$a.'.onclick = function() {
	commentmodal'.$a.'.style.display = "none";
}

commentmodal'.$a.'.onclick = function(event) {
	if (event.target == commentmodal'.$a.') {
		commentmodal'.$a.'.style.display = "none";
	}
}
</script>';

	echo "\n";

	#Mobile Comment-modal open and close script
	echo '<script>
var commentmodal'.$a2.'m = document.getElementById("modal-comment-'.$a2.'m");

var commentbtn'.$a2.'m = document.getElementById("commentbtn'.$a2.'m");

var commentclosebtn'.$a2.'m = document.getElementById("closecommentmodal'.$a2.'m");

commentbtn'.$a2.'m.onclick = function() {
	commentmodal'.$a2.'m.style.display = "block";
}

commentclosebtn'.$a2.'m.onclick = function() {
	commentmodal'.$a2.'m.style.display = "none";
}

commentmodal'.$a2.'m.onclick = function(event) {
	if (event.target == commentmodal'.$a2.'m) {
		commentmodal'.$a2.'m.style.display = "none";
	}
}
</script>';
	echo "\n";
	$chapter_number_1++;
	$chapter_number_4++;
	$i++;
	$z++;
	$a++;
	$capnum12++;
	$capnum42++;
	$i22++;
	$z2++;
	$a2++;
}

/*
Deactivated Form Comment Tab generator

$i = 0;
$chapter_number_4 = 0;
$chapters2 = $chapters - 1;

while ($i <= $chapters2) {
	$i2 = $i + 1;
	echo '<a name="'.$formcode.'-comment-'.$i2.'"></a>'."\n";
	echo '<div id="'.$formcode.'-comment-'.$i2.'" class="'.$tab_style.'" style="display:none;">'."\n";
	echo $bigspace."\n";
	echo '<'.$m.' class="'.$computer_variable.' '.$textstyle.'" style="'.$margin_style_10percent_rounded_border.'">'."\n";
	echo $margin."\n";
	echo $div_zoom_animation.'<'.$n.'><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($chapters_text, 0, -1).'<br /> "'.$i2.' - '.$chapter_titles[$chapter_number_4].'": '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$div_close.'<hr class="'.$tab_full_border.'" />'."\n";
	echo $div_zoom_animation."\n";
	echo '<div class="'.$computer_variable.'">'."\n";
	echo '<form name="'.$formcode.'-comment-'.$i2.'" method="POST" data-netlify="true">'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$form_name.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '</span><br />'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$commentdesc.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;"><i class="fas fa-paper-plane"></i></button>';
	echo '</'.$n.'>'."\n";
	echo '</span>'."\n";
	echo '</form>'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo '</'.$m.'>'."\n";
	echo $div_close."\n";
	echo "\n";
	echo '<a name="'.$formcode.'-comment-'.$i2.'m"></a>'."\n";
	echo '<div id="'.$formcode.'-comment-'.$i2.'m" class="'.$tab_style_mobile.'" style="display:none;">'."\n";
	echo $bigspace."\n";
	echo '<'.$m.' class="'.$mobile_variable.' '.$textstyle.'" style="'.$margin_style_10percent_rounded_border.'">'."\n";
	echo $margin."\n";
	echo $div_zoom_animation.'<'.$n.'><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($chapters_text, 0, -1).'<br /> "'.$i2.' - '.$chapter_titles[$chapter_number_4].'": '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$div_close.'<hr class="'.$tab_full_border.'" />'."\n";
	echo $div_zoom_animation."\n";
	echo '<div class="'.$mobile_variable.'">'."\n";
	echo '<form name="'.$formcode.'-comment-'.$i2.'" method="POST" data-netlify="true">'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$form_name.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '</span><br />'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$commentdesc.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input"></textarea> '."\n";
	echo '<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;"><i class="fas fa-paper-plane"></i></button>';
	echo '</'.$n.'>'."\n";
	echo '</span>'."\n";
	echo '</form>'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo '</'.$m.'>'."\n";
	echo $div_close."\n";
	echo "\n";

	$i++;
	$chapter_number_4++;
}
*/

?>