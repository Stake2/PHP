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

$read_style = $additional_background_color." ".$text_black_css_class." ".$border_3px_solid_black_css_class;

#Read date converter, that converts the date of the readings into a date format
while ($v2 <= $readsfilenumb) {
	$v3 = $v2 + 2;
	$readstxt[$v3] = substr($readstxt[$v3], 0, -1);
	$readstxt[$v3] = date("H:i d/m/Y", strtotime($readstxt[$v3]));

	$v2++;
	$v2++;
	$v2++;
}

#echo $website_chapter_to_write_setting;
$v1 = 0;
$readed_number = 0;

#"Reads" array generator, it generates the array of the readings
while ($b1 <= $readsfilenumb) {
	$b22 = $b1 + 1;
	$b3 = $b1 + 2;

	$story_name_reads_array[$v1] = $margin.'<'.$m.' class="'.$read_style.'" style="text-align:left;'.$rounded_border_style_2.'"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.
	#Reader text and name
	$read_texts_array[7].': </b>'.$readstxt[$b1].'<br /><b>'.

	#Chapter text and title
	#substr($chapters_text, 0, -1).':</b> '.$readstxt[$b22].'<br />'.'<b>'.

	#Read time text and time
	$time_text.':</b> '.$readstxt[$b3].' <br /><br />'.$div_close.'</'.$m.'>'.$div_close."\n";

	$readed_number++;
	$b1++;
	$b1++;
	$b1++;
	$v1++;
	$b4++;
}

?>