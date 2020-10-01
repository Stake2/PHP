<?php 

#Defines some number variables
$capnum1 = 1;
$capnum2 = 2;
$capnum3 = 0;
$capnum4 = 0;
$capnum4a = 0;
$capnum7 = 0;
$textstylecap = $textstyle2;
$captxtname = str_replace("s", "", $captxt);

$writefolder = $rootstoryfolder2.'Test/';

#Chapter file text link array generator, it generates the array to access the text files of the chapters
$capdatanumb = 1;
$a = 1;
$z = 1;
while ($a <= $chapters) {
	$a2 = $a - 1;

	if ($storyhastitles == true) {
		$caps[$a] = $rootstoryfolder2.$z.' - '.$titles[$a2].'.txt';
		$caps[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?"), "", $caps[$a]);
	}

	else {
		$caps[$a] = $rootstoryfolder2.$z.'.txt';
		$caps[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?"), "", $caps[$a]);
	}

	$z++;
	$a++;
}

#Chapter file text link array generator for the English language, it generates the array to access the English text files of the chapters
$a = 1;
$z = 1;
$rootstoryfolder3 = $nolangstoryfolder.strtoupper($langs[1]).'/';
while ($a <= $chapters) {
	$a2 = $a - 1;

	if ($storyhastitles == true) {
		$capsenus[$a] = $rootstoryfolder3.$z.' - '.$titlesenus[$a2].'.txt';
		$capsenus[$a] = str_replace(array("\r\n", "\r", "\n"), "<br />", $capsenus[$a]);
	}

	else {
		$capsenus[$a] = $rootstoryfolder3.$z.'.txt';
		$capsenus[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?"), "", $caps[$a]);
	}

	$z++;
	$a++;
}

#Chapter date file reader, it generates the capdate array which contains the date that the chapter was written
$a = 0;
$z = 0;
if ($storyhasdates == true) {
	while ($a <= $chapters) {
		$a2 = $a - 1;

		$capdatesfile = $notepad_stories_folder_variable.$storyfolder.'/Datas.txt';

		$fp = fopen($capdatesfile, 'r', 'UTF-8'); 
		if ($fp) {
			$capdates = explode("\n", fread($fp, filesize($capdatesfile)));
			$capdates = str_replace("^", "", $capdates);
		}

		$capdates[$a] = str_replace(array("\r\n", "\r", "\n"), "<br />", $capdates[$a]);
	
		$z++;
		$a++;
	}
}

echo "\n";

#Comment and read modal style CSS definer
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

if ($storyhasreads == true and $storycontainsreads == true) {
	require $story_reads_generator_php_variable;

	$h = $readednumb;
}

$z123 = 0;
$chapter_line_number = 0;
$b1 = 0;
$b2 = 1;

if ($site_uses_new_comment_and_read_displayer == true and $storycontainsreads == true and $storycontainscomments == true) {
	if ($sitename == $sitepequenata) {
		$comments_array = array(
		null,
		$cmntschapter[1],
		[$cmntschapter[2], $cmntschapter[8]],
		[$cmntschapter[3], $cmntschapter[9]],
		null,
		null,
		null,
		$cmntschapter[0],
		$cmntschapter[6],
		);

		$reads_array = array(
		null,
		[$reads[10], $reads[11], $reads[12], $reads[14]],
		[$reads[0], $reads[9]],
		$reads[1],
		$reads[2],
		$reads[3],
		$reads[4],
		$reads[5],
		$reads[6],
		$reads[7],
		$reads[8],
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		$reads[13],
		);
	}

	if ($sitename == $sitespaceliving) {
		$comments_array = array(
		null,
		[$cmntschapter[0], $cmntschapter[1]],
		$cmntschapter[2],
		$cmntschapter[3],
		null,
		null,
		null,
		null,
		null,
		);

		$reads_array = array(
		null,
		[$reads[0], $reads[1]],
		$reads[2],
		$reads[3],
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		);
	}

	$array1 = $comments_array;
	$array2 = $reads_array;
	$number_variable = $capnum1;
}

$zw = 1;
$zq = 1;
$za = 2;
$mzz = 10;
$zzcxx = 3;
$covernumb = 1;
$a = 1;

echo '<div id="'.strtolower($captxt).'-div">'."\n";

#Chapter reader/writer/displayer, it generates the tabs for the chapters to be read by the user
while ($capnum1 <= $chapters) {
	require $chapter_tab_generator_php_variable;
}

if ($write_new_chapter == true) {
	require $chapter_tab_generator_php_variable;
}

echo '</div>'."\n";

while ($capnum1 <= $chapters) {
	$testscript = '';

	echo $testscript;
}

if ($storyhasreads == true) {
	#Read-modal Tab generator PHP file
	require $read_modal_generator_php_variable;
}

if ($sitehascommentstab == true and $storyhaschaptercomments == true) {
	#Comment-modal Tab generator PHP file
	require $comment_modal_generator_php_variable;
}

/*
Deactivated Form Comment Tab generator

$i = 0;
$capnum4 = 0;
$chapters2 = $chapters - 1;

while ($i <= $chapters2) {
	$i2 = $i + 1;
	echo '<a name="'.$formcode.'-comment-'.$i2.'"></a>'."\n";
	echo '<div id="'.$formcode.'-comment-'.$i2.'" class="'.$citystyle.'" style="display:none;">'."\n";
	echo $bigspace."\n";
	echo '<'.$m.' class="'.$computervar.' '.$textstyle.'" '.$marginstyle1.'>'."\n";
	echo $margin."\n";
	echo $divzoomanim.'<'.$n.'><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($captxt, 0, -1).'<br /> "'.$i2.' - '.$titles[$capnum4].'": '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo $divzoomanim."\n";
	echo '<div class="'.$computervar.'">'."\n";
	echo '<form name="'.$formcode.'-comment-'.$i2.'" method="POST" data-netlify="true">'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$formname.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '</span><br />'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$commentdesc.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;"><i class="fas fa-paper-plane"></i></button>';
	echo '</'.$n.'>'."\n";
	echo '</span>'."\n";
	echo '</form>'."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo '</'.$m.'>'."\n";
	echo $divc."\n";
	echo "\n";
	echo '<a name="'.$formcode.'-comment-'.$i2.'m"></a>'."\n";
	echo '<div id="'.$formcode.'-comment-'.$i2.'m" class="'.$citystylem.'" style="display:none;">'."\n";
	echo $bigspace."\n";
	echo '<'.$m.' class="'.$mobilevar.' '.$textstyle.'" '.$marginstyle1.'>'."\n";
	echo $margin."\n";
	echo $divzoomanim.'<'.$n.'><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($captxt, 0, -1).'<br /> "'.$i2.' - '.$titles[$capnum4].'": '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo $divzoomanim."\n";
	echo '<div class="'.$mobilevar.'">'."\n";
	echo '<form name="'.$formcode.'-comment-'.$i2.'" method="POST" data-netlify="true">'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$formname.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '</span><br />'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$commentdesc.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input"></textarea> '."\n";
	echo '<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;"><i class="fas fa-paper-plane"></i></button>';
	echo '</'.$n.'>'."\n";
	echo '</span>'."\n";
	echo '</form>'."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo '</'.$m.'>'."\n";
	echo $divc."\n";
	echo "\n";

	$i++;
	$capnum4++;
}
*/

?>