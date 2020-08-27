<?php 

$i = 0;
$z = 1;
$a = 1;
$a2 = 1;
$b1 = 0;
$b2 = 0;
$b4 = 0;
$v1 = 0;
$v2 = 0;

#Read date converter, that converts the date of the readings into a date format
while ($v2 <= $readsfilenumb) {
	$v3 = $v2 + 2;
	$readstxt[$v3] = substr($readstxt[$v3], 0, -1);
	$readstxt[$v3] = date("H:i d/m/Y", strtotime($readstxt[$v3]));

	$v2++;
	$v2++;
	$v2++;
}

#echo $chaptertowrite;
$v1 = 0;
$readednumb = 0;

#"Reads" array generator, it generates the array of the readings
while ($b1 <= $readsfilenumb) {
	$b22 = $b1 + 1;
	$b3 = $b1 + 2;

	$reads[$v1] = $margin.'<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.
	#Reader text and name
	$readtxts[7].': </b>'.$readstxt[$b1].'<br /><b>'.

	#Chapter text and title
	#substr($captxt, 0, -1).':</b> '.$readstxt[$b22].'<br />'.'<b>'.

	#Read time text and time
	$timetxt.':</b> '.$readstxt[$b3].' <br /><br />'.$divc.'</'.$m.'>'.$divc."\n";

	$readednumb++;
	$b1++;
	$b1++;
	$b1++;
	$v1++;
	$b4++;
}

?>