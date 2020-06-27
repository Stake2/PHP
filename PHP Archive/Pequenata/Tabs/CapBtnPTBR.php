<a name="<?php echo $tab; ?>"></a><?php echo "\n"; ?>
<div id="<?php echo $tab; ?>" class="city" style="display:none;"><?php echo "\n"; ?>
<?php echo $bigspace; ?><?php echo "\n"; ?>
<?php echo $h4; ?><?php echo "\n"; ?>
<?php echo $margin; ?><?php echo "\n"; ?>
<b><br /><h2 class="<?php echo $colortext; ?>"><?php echo $captitle_; ?></h2><br /><hr class="<?php echo $sitehr; ?>" /><br /><?php echo "\n"; ?>
<?php
$capnum1 = 1;
$capnum4 = 0;
$capnum5 = $titleone;

$capbtn = '<a href="#'.$capdiv.''.$capnum1.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" onclick="openCity('."'".$capdiv.$capnum1."'".')">'.$capnum1."</button></a> "."\n";
$capbtn2 = '<a href="#'.$capdiv.''.$capnum1. '"><button class="w3-btn '.$color.' '.$cssbtn1.'" onclick="openCity('."'".$capdiv. $capnum1++ ."'".')">'. $capnum1++ ."</button></a> "."\n";

echo $capbtn;
echo $capbtn2;

while ($capnum1 <= $chapters) {
	if ($capnum1 == $chapters) {
		echo '<a href="#'.$capdiv.''.$capnum1.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" onclick="openCity('."'".$capdiv.$capnum1."'".')">'.$capnum1.' - '.$titles[$capnum4].' <span class="w3-text-yellow">['.$newtxt.'!]</span>'."</button></a> "."\n";
		$capnum4++;
		$capnum5++;
	}
	
	else if ($capnum1 == $capnum5 and $capnum5 != $lasttitle) {
		echo '<a href="#'.$capdiv.''.$capnum1.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" onclick="openCity('."'".$capdiv.$capnum1."'".')">'.$capnum1.' - '.$titles[$capnum4]."</button></a> "."\n";
		$capnum4++;
		$capnum5++;
	}

	else {
		echo '<a href="#'.$capdiv.''.$capnum1.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" onclick="openCity('."'".$capdiv.$capnum1."'".')">'.$capnum1."</button></a> "."\n";
	}
	$capnum1++;
}

?>
</b><?php echo "\n"; ?>
<br /><br /><br /><?php echo "\n"; ?>
<?php echo $divc; ?><?php echo "\n"; ?>
<?php echo $h4c; ?><?php echo "\n"; ?>
<?php echo $divc; ?><?php echo "\n"; ?>