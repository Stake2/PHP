<?php
$blocknum1 = 1;
$blocknum2 = 2;
$blocknum3 = 0;
$blocknum4 = 0;
$blocknum4a = 0;

while($blocknum1 <= $blocks){
	echo "\n";
    echo '<a name="block'.$blocknum1.'"></a>';
	echo "\n";
	echo '<div id="block'.$blocknum1.'" class="city '.$textstyle.'" style="display:none;">';
	echo "\n";
	echo '<br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" />';
	echo "\n";
	echo '<hr class="'.$sitehr.'" /><h2 class="'.$textstyle.'">'.$readingpt.' <b>Block '.$blocknum1.'</b></h2><hr class="'.$sitehr.'" />';
	echo "\n";
	echo '<h5 class="'.$textstyle.'">'.'<b>Block '.$blocknum1.':</b><br /><br />';
	echo "\n";
	$blockpt = readfile("C:/Mega/Bloco De Notas/Diario/Blocks/".$blocknum1.'.txt', "r");
	echo "\n";
	echo '<br /><br />';
	echo "\n";
	echo '<a href="#block'.$blocknum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;" onclick="openCity('."'block".$blocknum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#block'.$blocknum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;" onclick="openCity('."'block".$blocknum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	echo "\n";
	echo '<div style="text-align:center;"><b>Diário Block '.$blocknum1.'</b></div>';
	echo "\n";
	echo '<br /><br /><br />';
	echo "\n";
	echo '<hr class="'.$sitehr.'" />';
	echo "\n";
	echo '</h5>';
	echo "\n";
	echo '</div>';
	echo "\n";
    $blocknum1++;
    $blocknum2++;
    $blocknum3++;
}

?>