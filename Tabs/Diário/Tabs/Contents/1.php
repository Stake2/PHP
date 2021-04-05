<?php 

echo '<'.$m.'>'.'<b>';
echo $div_zoom_animation;

$revised_chapter = 0;

require $chapter_button_generator_php;

/*
$blocknum1 = 1;
while ($blocknum1 <= $publishedblocks) {
	if ($blocknum1 == $publishedblocks and $blocknum1 != 1) {
		echo '<a href="#'.$block_div.$blocknum1.'"><button class="w3-btn '.$color3.' '.$cssbtn1.'" '.$roundedborderstyle.' onclick="openCity('."'".$block_div.$blocknum1."'".')">'.$blocknum1.' '.$bluespan.'['.$newtxt.'!]'.$spanc.'</button></a> ';
	}
	
	else {
		echo '<a href="#'.$block_div.$blocknum1.'"><button class="w3-btn '.$color3.' '.$cssbtn1.'" '.$roundedborderstyle.' onclick="openCity('."'".$block_div.$blocknum1."'".')">'.$blocknum1.'</button></a> ';
	}

	$blocknum1++;
}*/

echo $div_close;
echo '</b>'.'</'.$m.'>';

?>