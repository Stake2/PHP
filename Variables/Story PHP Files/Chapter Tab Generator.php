<?php 

$i2 = $i + 1;
$i3 = $i + 2;

if ($site_uses_new_comment_and_read_displayer == true) {
	$number_variable = $capnum1;
}

if ($write_new_chapter == true) {
	array_push($titles, $chapters + 1);
}

# Defines the top and bottom texts
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

# New design div
if ($newdesign == true) {
	echo '
<section>
<div class="box-line">
<div class="box-bar">
<div class="boxConteudo">';
}

# Tab div id, a name and big space generator
echo "\n";
echo '<a name="'.$capdiv.$capnum1.'"></a>'."\n";

if ($write_new_chapter == true and $capnum1 == $chapters + 1) {
	$display_variable = 'display:none;';
}

else {
	$display_variable = 'display:none;';
}

echo '<div id="'.$capdiv.$capnum1.'" class="city '.$textstylecap.'" style="'.$display_variable.$hstyle2.''.$roundedborderstyle2.'">'."\n";
echo '<br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" />'."\n";
echo '<br />'."\n";

if ($choosenwebsite != $sitedesertisland) {
	$span_variable = $yellowspan;
}

else {
	$span_variable = $blackspan;
}

# "You're Reading [Story]" top text displayer
if ($storyusestatus == true) {
	if ($capnum1 == $chapters and $storystatus != $storystatuses[0] and $storystatus != $storystatuses[3]) {
		echo '<div class="'.$computervar.'">'.'<'.$n.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$span_variable.'<b> ['.$newtxt.'!]</b>'.$spanc.'<br />'.$divc.'</'.$n.'>'.$divc."\n";

		echo '<div class="'.$mobilevar.'">'.'<'.$m.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$span_variable.'<b> ['.$newtxt.'!]</b>'.$spanc.$divc.'</'.$m.'>'.$divc."\n";

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
		echo '<div class="'.$computervar.'">'.'<'.$n.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$span_variable.'<b> ['.$newtxt.'!]</b>'.$spanc.'<br />'.$divc.'</'.$n.'>'.$divc."\n";

		echo '<div class="'.$mobilevar.'">'.'<'.$m.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$span_variable.'<b> ['.$newtxt.'!]</b>'.$spanc.$divc.'</'.$m.'>'.$divc."\n";

		$capnum4++;
	}

	else {
		echo '<div class="'.$computervar.'">'.'<'.$n.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$divc.'</'.$n.'>'.$divc."\n";

		echo $margin.'<div class="'.$mobilevar.'">'.'<'.$m.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.$divc.'</'.$m.'>'.$divc."\n".$divc."\n";
	
		$capnum4++;
	}
}

# H5 header and hr creator
echo "\n";
echo '<h5 class="'.$textstylecap.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr3.'" />'."\n";

# Top Previous chapter button
if ($capnum1 != 1) {
	if ($newwritestyle == true) {
		$onclickscript = 'openCity('."'".$capdiv.$capnum3."'".');';
		$onclickscript = $onclickscript.'DefineChapter('.$capnum3.');OpenChapter2(ReadContent'.$capnum3.');';
	}

	else if ($newwritestyle == false) {
		$onclickscript = 'openCity('."'".$capdiv.$capnum3."'".');';
	}

	echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$roundedborderstyle2.'" onclick="'.$onclickscript.'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";
}

# Top Next chapter button
if ($capnum1 != $chapters and $capnum1 != $chapters + 1) {
	if ($newwritestyle == true) {
		$onclickscript = 'openCity('."'".$capdiv.$capnum2."'".');';
		$onclickscript = $onclickscript.'DefineChapter('.$capnum2.');OpenChapter2(ReadContent'.$capnum2.');';
	}

	else if ($newwritestyle == false) {
		$onclickscript = 'openCity('."'".$capdiv.$capnum2."'".');';
	}

	echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;'.$roundedborderstyle2.'" onclick="'.$onclickscript.'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";
}

# "Go back to the chapter buttons tab" button
echo '<a href="#'.$citycodes[0].'"><button class="w3-btn '.$color.' '.$cssbtn1.' '.$computervar.'" style="float:right;margin-right:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";

echo '<a href="#'.$tabcodesm[0].'"><button class="w3-btn '.$color.' '.$cssbtn1.' '.$mobilevar.'" style="float:right;margin-right:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$tabcodesm[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";

if ($write_new_chapter == true and $capnum1 != $chapters + 1) {
	#"Write new chapter" button
	echo '<a href="#'.$write_new_chapter_tab_text.'">'.
	'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-right:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$capdiv.($chapters + 1)."')".'"><h3>'.$icon_plus.'</h3></button></a>'."\n";
}

echo '<br /><br /><br /><br />'."\n";

echo $divzoomanim."\n";

# Story cover shower if story has the storyhascovers setting as true
if ($storyhascovers == true or $storyhascovers == true and $sitename == $sitepequenata and $capnum1 <= 10) {
	echo '<center>'."\n";

	if (isset($coverimages[$covernumb]) and isset($coverimagesm[$covernumb])) {
		echo $coverimages[$covernumb];
		echo $coverimagesm[$covernumb];
	}

	echo '</center>'."\n";
	echo "<br />"."\n";
}

echo '<div id="'.$captextdiv.$capnum1.'">'."\n";

if ($newwritestyle == true) {
	$writestorybtn = '<span id="writebtnattribute'.$capnum1.'" style="display:none;">WriteContent'.$capnum1.'</span><button id="write-button-'.$capnum1.'" title="" class="w3-btn '.$btnstyle2.'" style="border-radius: 50px;" onclick="WriteChapter(WriteContent'.$capnum1.');"><'.$n.'><i class="fas fa-pen"></i></'.$n.'></button><br /><br />'."\n"."\n";

	$readstorybtn = '<span id="readbtnattribute'.$capnum1.'" style="display:none;">ReadContent'.$capnum1.'</span><button id="write-button-'.$capnum1.'" class="w3-btn '.$btnstyle2.'" style="border-radius: 50px;" onclick="OpenChapter2(ReadContent'.$capnum1.');"><'.$n.'><i class="fas fa-book"></i></'.$n.'></button><br /><br />'."\n"."\n";
}

#Chapter writer tab displayer
if ($sitestorywrite == true and $sitestorywritechapter == $capnum1 or $sitestorywrite == true and $sitestorywritechapter.(int)'0' == $capnum1 and $capnum1 != 0) {
	require $chapter_writer_displayer_php;

	#echo "$chapter_writer_displayer_php was loaded.";

	if ($newwritestyle == true) {
		#echo $newwritestylescript."\n";
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
		'<b>'.$span_variable.'['.$newtxt.'!]'.$spanc.'</b>'."\n".
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
		'<b>'.$span_variable.'['.$newtxt.'!]'.$spanc.'</b>'."\n".
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
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" id="readbtn'.$a.'m" style="margin-left:15px;float:right;'.$roundedborderstyle2.'" onclick="openCity('."'".'modal-read-'.$a."m')".'"><'.$m.'><b>'.$readtxts[2].' ('.$readednumb.' '.$icons[20].')</b></'.$m.'></button>'."\n";
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

?>