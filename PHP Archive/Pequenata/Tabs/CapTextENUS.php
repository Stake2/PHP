<?php
$capnum1 = 1;
$capnum2 = 2;
$capnum3 = 0;
$capnum4 = 0;
$capnum4a = 0;
$capnum5a = $titleone;
$capnum5 = $titleone;
$capnum6 = $lasttitle;
$capnum7 = 0;
$capnum8 = $titleone;
$capnum9 = $lasttitle;

while ($capnum1 <= $chapters) {
	echo "\n";
    echo '<a name="'.$capdiv.$capnum1.'"></a>';
	echo "\n";
	echo '<div id="'.$capdiv.$capnum1.'" class="city '.$textstyle.'" style="display:none;'.$hstyle2.'">';
	echo "\n";
	echo '<br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" />';
	echo "\n";
	echo '<br />';
	echo "\n";

	if ($capnum1 == $chapters) {
		echo '<h2 class="'.$textstyle.'"><br />'.$reading.'<b>'.$capbtntext.' '.$capnum1.' - '.$titles[$capnum4].' <span class="w3-text-yellow">['.$newtxt.'!]</span>'.'</b><br /></h2>';
		$capnum4++;
		$capnum5++;
	} 

	else if ($capnum1 == $capnum5 and $capnum5 != $capnum6) {
		echo '<h2 class="'.$textstyle.'"><br />'.$reading.'<b>'.$capbtntext.' '.$capnum1.' - '.$titles[$capnum4].'</b><br /></h2>';
		$capnum4++;
		$capnum5++;
	} 

	else {
		echo '<h2 class="'.$textstyle.'"><br />'.$reading.'<b>'.$capbtntext.' '.$capnum1.'</b><br /></h2>';
	}

	echo "\n";
	echo '<h5 class="'.$textstyle.'" style="'.$hstyle.'text-align:left;"><hr class="'.$blackhr.'" />';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	echo "\n";
	echo '<br /><br /><br /><br />';
	echo "\n";
	$cap = readfile($rootstoryfolder.$storyfolder."/".$lang."/".$capnum1.'.txt', "r");
	echo "\n";
	echo '<br /><br />';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	echo "\n";


	if ($capnum1 == $chapters) {
		echo '<div style="text-align:center;"><span class="'.$textstyle.'"><br />'.$reading.'<b>'.$capbtntext.' '.$capnum1.' - '.$titles[$capnum7].' <span class="w3-text-yellow">[New!]</span>'.'</b><br /></span></div>';
		$capnum7++;
		$capnum8++;
	} 

	else if ($capnum1 == $capnum8 and $capnum8 != $capnum9) {
		echo '<div style="text-align:center;"><span class="'.$textstyle.'"><br />'.$reading.'<b>'.$capbtntext.' '.$capnum1.' - '.$titles[$capnum7].'</b><br /></span></div>';
		$capnum7++;
		$capnum8++;
	}

	else {
		echo '<div style="text-align:center;"><span class="'.$textstyle.'"><br />'.$reading.'<b>'.$capbtntext.' '.$capnum1.'</b><br /></span></div>';
	}

	echo "\n";
	echo "<br />";
	echo "\n";
	echo '<hr class="'.$blackhr.'" />';
	echo "\n";
	echo '</h5>';
	echo "\n";
	echo '</div>';
	echo "\n";
    $capnum1++;
    $capnum2++;
    $capnum3++;
}

?>