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

while ($capnum1 <= $chapters) {
	echo "\n";
    echo '<a name="'.$capdiv.$capnum1.'"></a>';
	echo "\n";
	if ($capnum1 == 13) {
		echo '<div id="'.$capdiv.$capnum1.'" class="city '.$textstylexmas.'" style="display:none;'.$hstyle2xmas.'"><br /><br />';
	} 
	
	else {
		echo '<div id="'.$capdiv.$capnum1.'" class="city '.$textstylenormal.'" style="display:none;'.$hstyle2.'"><br /><br />';
	}
	echo "\n";

	if ($capnum1 == $chapters) {
		echo '<h2 class="'.$textstyle.'"><br />'.$reading.'<b>'.$capbtntext.' '.$capnum1.' - '.$titles[$capnum4].' <span class="w3-text-yellow">['.$newtxt.'!]</span>'.'</b><br /></h2>';
		$capnum4++;
		$capnum5++;
	} 

	else if ($capnum1 == $capnum5 and $capnum5 != $capnum6) {
		if ($capnum1 == 13) {
			echo '<h3 class="'.$textstylexmas.'"><center>'.$reading.'<b>'.$capbtntext.' '.$capnum1.' - '.$titles[$capnum4].'</b></center></h3>';
		} 
		
		else {
			echo '<h3 class="'.$textstyle.'"><center>'.$reading.'<b>'.$capbtntext.' '.$capnum1.' - '.$titles[$capnum4].'</b></center></h3>';
		}
		$capnum4++;
		$capnum5++;
	} 
	
	else {
		if ($capnum1 == 13) {
			echo '<h3 class="'.$textstylexmas.'"><center>'.$reading.'<b>'.$capbtntext.' '.$capnum1.'</b></center></h3>';
		} 
		
		else {
			echo '<h3 class="'.$textstyle.'"><center>'.$reading.'<b>'.$capbtntext.' '.$capnum1.'</b></center></h3>';
		}
	}
	echo "\n";
	if ($capnum1 == 13) {
		echo '<h5 class="'.$textstylexmas.'" style="'.$hstyle.'text-align:left;"><hr class="'.$xmashr.'" />';
		echo "\n";
	} 
	
	else {
		echo '<h5 class="'.$textstyle.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr2.'" />';
		echo "\n";
	}
	if ($capnum1 == 13) {
		echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color5.' w3-text-black '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
		echo "\n";
		echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color5.' w3-text-black '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	} 
	
	else {
		echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
		echo "\n";
		echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	}
	echo '<br /><br /><br /><br />';
	echo "\n";
	$cap = readfile($rootstoryfolder.$storyfolder."/".$lang."/".$capnum1.'.txt', "r");
	echo "\n";
	echo '<br /><br />';
	echo "\n";
	if ($capnum1 == 13) {
		echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color5.' w3-text-black '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
		echo "\n";
		echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color5.' w3-text-black '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	} 
	
	else {
		echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
		echo "\n";
		echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	}
	echo "\n";

	if ($capnum1 == $chapters) {
		echo '<div style="text-align:center;">'.$reading.'<b>'.$capbtntext.' '.$capnum1.' - '.$titles[$capnum4a].' <span class="w3-text-yellow">['.$newtxt.'!]</span>'.'</b></div>';
		$capnum4a++;
		$capnum5a++;
	} 

	else if ($capnum1 == $capnum5a and $capnum5a != $capnum6) {
		echo '<div style="text-align:center;">'.$reading.'<b>'.$capbtntext.' '.$capnum1.' - '.$titles[$capnum4a].' </b></div>';
		$capnum4a++;
		$capnum5a++;
	} 
	
	else {
		echo '<div style="text-align:center;">'.$reading.'<b>'.$capbtntext.' '.$capnum1.'</b></div>';
	}
	echo "\n";
	echo '<br />';
	echo "\n";
	if ($capnum1 == 13) {
		echo '<br /><hr class="'.$xmashr.'" />';
	} 
	
	else {
		echo '<br /><hr class="'.$sitehr2.'" />';
	}
	echo "\n";
	echo '</h5>';
	echo "\n";
	echo '</div>';
	echo "\n";
    $capnum1++;
    $capnum2++;
    $capnum3++;
}

if (strpos ($host, 'write') == true) {
	$test = true;
}

if (strpos ($host, 'write') == false) {
	$test = false;
}

if ($test == true) {
	echo "\n";
    echo '<a name="test"></a>';
	echo "\n";
	echo '<div id="test" class="city '.$textstylenormal.'" style="'.$hstyle2.'"><br /><br />';
	echo "\n";
	echo '<h3 class="'.$textstyle.'">'."<center><b>You're writing: </b><b>SpaceLiving Chapter [__]</b></center></h3>";
	echo "\n";
	echo '<h5 class="'.$textstyle.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr2.'" />';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	echo '<br /><br /><br /><br />';
	echo '<textarea type="text" width="1000" class="'.$color2.' w3-input" style="height:75px;">Title: </textarea>';
	echo "\n";
	echo '<textarea type="text" width="1000" class="'.$color2.' w3-input" style="height:3500px;">Story</textarea>';
	echo "\n";
	echo '<br /><br />';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	echo "\n";
	echo '<div style="text-align:center;">'."<center><b>You're writing: </b><b>SpaceLiving Chapter [__]</b>".'</div>';
	echo "\n";
	echo '<br />';
	echo "\n";
	echo '<br /><hr class="'.$sitehr2.'" />';
	echo "\n";
	echo '</h5>';
	echo "\n";
	echo '</div>';
	echo "\n";
}

?>