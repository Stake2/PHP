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

if ($site_uses_new_comment_and_read_displayer == true) {
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
		[$reads[0], $reads[1]],
		[$reads[2], $reads[11]],
		$reads[10],
		$reads[9],
		$reads[8],
		$reads[7],
		$reads[6],
		$reads[5],
		$reads[4],
		$reads[3],
		);
	}

	if ($sitename == $sitespaceliving) {
		$comments_array = array(
		null,
		[$cmntschapter[1], $cmntschapter[2]],
		$cmntschapter[0],
		null,
		null,
		null,
		null,
		null,
		null,
		);

		$reads_array = array(
		null,
		[$reads[1], $reads[2]],
		$reads[0],
		null,
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
#Chapter reader/writer/displayer, it generates the tabs for the chapters to be read by the user
while ($capnum1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;

	if ($site_uses_new_comment_and_read_displayer == true) {
		$number_variable = $capnum1;
	}

	#Defines the top and bottom texts
	if ($sitestorywrite == true and $sitestorywritechapter == $capnum1) {
		if ($storyhastitles == true) {
			$topandbottomtxt = '<b>'.$writetxts[2].'</b>'.
			'<br />'.
			'<b>'.$captxtname.': '.$capnum1.' - '.$titles[$capnum4].'</b>';
		}

		else {
			$topandbottomtxt = '<b>'.$writetxts[2].'</b>'.
			'<br />'.
			'<b>'.$captxtname.': '.$capnum1.'</b>';
		}
	}

	else {
		if ($storyhastitles == true) {
			$topandbottomtxt = '<b>'.$readtxts[1].'</b>'.
			'<br />'.
			'<b>'.$captxtname.': '.$capnum1.' - '.$titles[$capnum4].'</b>';
		}

		else {
			$topandbottomtxt = '<b>'.$readtxts[1].'</b>'.
			'<br />'.
			'<b>'.$captxtname.': '.$capnum1.'</b>';
		}
	}

	#New design div
	if ($newdesign == true) {
		echo '
	<section>
	<div class="box-line">
	<div class="box-bar">
	<div class="boxConteudo">';
	}

	#Tab div id, a name and big space generator
	echo "\n";
    echo '<a name="'.$capdiv.$capnum1.'"></a>'."\n";
	echo '<div id="'.$capdiv.$capnum1.'" class="city '.$textstylecap.'" style="display:none;'.$hstyle2.''.$roundedborderstyle2.'">'."\n";
	echo '<br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" />'."\n";
	echo '<br />'."\n";

	#"You're Reading [Story]" top text displayer
	if ($storyusestatus == true) {
		if ($capnum1 == $chapters and $storystatus != $storystatuses[0] and $storystatus != $storystatuses[3]) {
			echo '<div class="'.$computervar.'">'.'<'.$n.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$yellowspan.'<b> ['.$newtxt.'!]</b>'.$spanc.'<br />'.$divc.'</'.$n.'>'.$divc."\n";

			echo '<div class="'.$mobilevar.'">'.'<'.$m.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$yellowspan.'<b> ['.$newtxt.'!]</b>'.$spanc.$divc.'</'.$m.'>'.$divc."\n";

			$capnum4++;
		}

		else {
			echo '<div class="'.$computervar.'">'.'<'.$n.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$divc.'</'.$n.'>'.$divc."\n";

			echo $margin.'<div class="'.$mobilevar.'">'.'<'.$m.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$divc.'</'.$m.'>'.$divc."\n".$divc."\n";
		
			$capnum4++;
		}
	}

	else {
		if ($capnum1 == $chapters) {
			echo '<div class="'.$computervar.'">'.'<'.$n.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$yellowspan.'<b> ['.$newtxt.'!]</b>'.$spanc.'<br />'.$divc.'</'.$n.'>'.$divc."\n";

			echo '<div class="'.$mobilevar.'">'.'<'.$m.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$yellowspan.'<b> ['.$newtxt.'!]</b>'.$spanc.$divc.'</'.$m.'>'.$divc."\n";

			$capnum4++;
		}

		else {
			echo '<div class="'.$computervar.'">'.'<'.$n.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$divc.'</'.$n.'>'.$divc."\n";

			echo $margin.'<div class="'.$mobilevar.'">'.'<'.$m.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$divc.'</'.$m.'>'.$divc."\n".$divc."\n";
		
			$capnum4++;
		}
	}

	#H5 header and hr creator
	echo "\n";
	echo '<h5 class="'.$textstylecap.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr3.'" />'."\n";

	#Top Previous chapter button
	if ($capnum1 != 1) {
		echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$roundedborderstyle2.'" onclick="openCity('."'".$capdiv.$capnum3."');".'DefineChapter('.$capnum3.');OpenChapter2(ReadContent'.$capnum3.');"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";
	}

	#Top Next chapter button
	if ($capnum1 != $chapters) {
		echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;'.$roundedborderstyle2.'" onclick="openCity('."'".$capdiv.$capnum2."');".'DefineChapter('.$capnum2.');OpenChapter2(ReadContent'.$capnum2.');"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";
	}

	#"Go back to the chapter buttons tab" button
	echo '<a href="#'.$citycodes[0].'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-right:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
	echo '<br /><br /><br /><br />'."\n";
	echo $divzoomanim."\n";

	#Replaces the "?"s in the chapter 26 file name with nothing
	if ($capnum1 == 26) {
		$caps[$capnum1] = str_replace(array("?"), "", $caps[$capnum1]);
	}

	if ($capnum1 == 26) {
		$capsenus[$capnum1] = str_replace(array("?"), "", $capsenus[$capnum1]);
	}

	#Story cover shower if story has the storyhascovers setting as true
	if ($storyhascovers == true or $storyhascovers == true and $sitename == $sitepequenata and $capnum1 <= 10) {
		echo '<center>'."\n";

		if (isset($coverimages[$covernumb]) and isset($coverimagesm[$covernumb])) {
			echo $coverimages[$covernumb];
			echo $coverimagesm[$covernumb];

/*
			if ($capnum1 == 2 and $sitename != $sitenazzevo) {
				#echo $coverimages[3];
				#echo $coverimagesm[3];

				$covernumb++;
			}

			if ($capnum1 == 10) {
				echo $coverimages[2];
				echo $coverimagesm[2];

				$covernumb++;
			}

			else {
				echo $coverimages[$covernumb];
				echo $coverimagesm[$covernumb];
			}
*/
		}

		echo '</center>'."\n";
		echo "<br />"."\n";
	}

	echo '<div id="'.$captextdiv.$capnum1.'">'."\n";

	if ($newwritestyle == true) {
		$writestorybtn = '<span id="writebtnattribute'.$capnum1.'" style="display:none;">WriteContent'.$capnum1.'</span><button id="write-button-'.$capnum1.'" title="" class="w3-btn '.$btnstyle2.'" style="border-radius: 50px;" onclick="WriteChapter(WriteContent'.$capnum1.');"><'.$n.'><i class="fas fa-pen"></i></'.$n.'></button><br /><br />'."\n";

		$readstorybtn = '<span id="readbtnattribute'.$capnum1.'" style="display:none;">ReadContent'.$capnum1.'</span><button id="write-button-'.$capnum1.'" class="w3-btn '.$btnstyle2.'" style="border-radius: 50px;" onclick="OpenChapter2(ReadContent'.$capnum1.');"><'.$n.'><i class="fas fa-book"></i></'.$n.'></button><br /><br />'."\n";
	}

	#Chapter writer tab displayer
	if ($sitestorywrite == true and $sitestorywritechapter == $capnum1 or $sitestorywrite == true and $sitestorywritechapter.(int)'0' == $capnum1 and $capnum1 != 0) {
		require $chapter_writer_displayer_php;

		#echo "$chapter_writer_displayer_php was loaded.";

		if ($newwritestyle == true) {
			echo $newwritestylescript."\n";
		}

		echo $divc."\n";
		echo $divc."\n";
		echo '<br /><br />'."\n";
	}

	#Chapter text tab displayer
	else {
		require $chapter_text_displayer_php;
	}

	#Bottom Previous chapter button
	if ($capnum1 != 1) {
		echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$roundedborderstyle2.'" onclick="openCity('."'".$capdiv.$capnum3."');".'DefineChapter('.$capnum3.');OpenChapter2(ReadContent'.$capnum3.');"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";
	}

	#Bottom Next chapter button
	if ($capnum1 != $chapters) {
		echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-left:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$capdiv.$capnum2."');".'DefineChapter('.$capnum2.');OpenChapter2(ReadContent'.$capnum2.');"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";
	}

	#Computer Comment button
	if ($sitehascommentstab == true and $storyhaschaptercomments == true) {
		echo '<div class="'.$computervar.'">'."\n";
		echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" id="commentbtn'.$a.'" style="margin-left:15px;float:right;'.$roundedborderstyle2.'"><h3><b>'.$cmntstxts[1].' '.$icons[12].' ('.$commentschapternumb.')</b></h3></button>'."\n";
		echo $divc."\n";
	}

	#Computer "I Read it" button
	if ($storyhasreads == true) {
		echo '<div class="'.$computervar.'">'."\n";
		echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" id="readbtn'.$a.'" style="margin-left:15px;float:right;'.$roundedborderstyle2.'"><h3><b>'.$readtxts[2].' ('.$readednumb.' '.$icons[20].')</b></h3></button>'."\n";
		echo $divc."\n";
		echo $bigspacemobileandcomputer;
	}

	if ($storyhaschaptercomments == false and $storyhasreads == false) {
		echo '<br /><br />'."\n";
	}

	#"You're Reading [Story]" bottom text
	if ($storyusestatus == true) {
		if ($capnum1 == $chapters and $storystatus != $storystatuses[0] and $storystatus != $storystatuses[3]) {
			echo '<div style="text-align:center;">'."\n".
			$divzoomanim."\n".
			'<span class="'.$textstylecap.'">'."\n".
			'<br />'.$topandbottomtxt."\n".
			'<b>'.$yellowspan.'['.$newtxt.'!]'.$spanc.'</b>'."\n".
			'<br /></span>'."\n".
			$divc."\n".
			$divc."\n";

			$capnum7++;
		} 

		else {
			echo '<div style="text-align:center;">'."\n".
			$divzoomanim."\n".
			'<span class="'.$textstylecap.'">'."\n".
			'<br />'.$topandbottomtxt.'<br />'."\n".
			'</span>'."\n".
			$divc."\n".
			$divc."\n";

			$capnum7++;
		}
	}

	else {
		if ($capnum1 == $chapters) {
			echo '<div style="text-align:center;">'."\n".
			$divzoomanim."\n".
			'<span class="'.$textstylecap.'">'."\n".
			'<br />'.$topandbottomtxt."\n".
			'<b>'.$yellowspan.'['.$newtxt.'!]'.$spanc.'</b>'."\n".
			'<br /></span>'."\n".
			$divc."\n".
			$divc."\n";

			$capnum7++;
		} 

		else {
			echo '<div style="text-align:center;">'."\n".
			$divzoomanim."\n".
			'<span class="'.$textstylecap.'">'."\n".
			'<br />'.$topandbottomtxt.'<br />'."\n".
			'</span>'."\n".
			$divc."\n".
			$divc."\n";

			$capnum7++;
		}
	}

	#Mobile Comment button
	if ($sitehascommentstab == true and $storyhaschaptercomments == true) {
		echo "\n";
		echo '<div class="'.$mobilevar.'"><br /><br />'."\n".$divc."\n";
		echo '<div class="'.$mobilevar.'">'."\n";
		echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" id="commentbtn'.$a.'m" style="margin-left:15px;float:right;'.$roundedborderstyle2.'"><'.$m.'><b>'.$cmntstxts[1].' '.$icons[12].' ('.$commentschapternumb.')</b></'.$m.'></button>'."\n";
		echo '<br /><br />'."\n";
		echo $divc."\n";
	}

	#Mobile "I Read it" button
	if ($storyhasreads == true) {
		echo '<div class="'.$mobilevar.'">'."\n";
		echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" id="readbtn'.$a2.'m" style="margin-left:15px;float:right;'.$roundedborderstyle2.'" onclick="openCity('."'".'modal-read-'.$a2."m')".'"><'.$m.'><b>'.$readtxts[2].' ('.$readednumb.' '.$icons[20].')</b></'.$m.'></button>'."\n";
		echo $divc."\n";
		echo '<br /><div class="'.$mobilevar.'"><br /><br />'."\n".'</div>'."\n";
	}

	#Hr displayer if the story has comments or reads
	if ($site_uses_new_comment_and_read_displayer == true) {
		if (isset($array1[$number_variable]) or isset($array2[$number_variable])) {
			echo '<hr class="'.$sitehr3.'" />'."\n";
		}
	}

	else if ($storyhaschaptercomments == true and $storycontainscomments == true or $storyhasreads == true and $storycontainsreads == true) {
		echo '<hr class="'.$sitehr3.'" />'."\n";
	}

	echo '</h5>'."\n";

	if ($site_uses_new_comment_and_read_displayer == true) {
		if ($storyhaschaptercomments == true and $storycontainscomments == true) {
			require $new_chapter_comment_and_read_displayer_php_variable;
		}
	}

	else if ($storyhaschaptercomments == true and $storycontainscomments == true) {
		require $chapter_comment_and_read_displayer_php_variable;
	}

	echo $divc."\n";

	#New design elements
	if ($newdesign == true) {
		echo '</div>
		</div>
		</div>
		</section>';
	}

	#Adds to the variables
	$i++;
	$i2++;
	$a++;
	$a2++;

	if (isset($h) == true) {
		if ($h != 0) {
			$h--;
		}
	}

    $capnum1++;
    $capnum2++;
    $capnum3++;
	$capdatanumb++;
	$capdatanumb++;
	$capdatanumb++;
	$covernumb++;
}

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