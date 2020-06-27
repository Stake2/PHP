<a name="blocks"></a>
<div id="blocks" class="city w3-black" style="display:none;">
<br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" />
<h4><b><hr class="<?php echo $sitehr2; ?>" /><h2 class="<?php echo $colortext; ?>"><?php echo $blocktitleptbr; ?></h2><hr class="<?php echo $sitehr2; ?>" />
<?php
$blocknum1 = 1;

while($blocknum1 <= $blocks){
	echo '<a href="#'.$blocknum1.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" onclick="openCity('."'".$blocknum1."'".')">'.$blocknum1.'</button></a> ';
	$blocknum1++;
	echo "\n";
}

?>
</b></h4><hr class="<?php echo $sitehr2; ?>" />
</div>