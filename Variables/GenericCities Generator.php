<?php 

if ($hidecitysetting == true) {
	$hidecitytextvariable = 'style="display:none;"';
}

if ($hidecitysetting != true) {
	$hidecitytextvariable = '';
}

if ($notsomuchspace == true) {
	$bigspace = '';
}

else {
	$computervar = 'mobileHide';
	$bigspace = '<div class="'.$computervar.'"><br /><br /><br /><br /><br /><br /><br /><br /></div>';
	$bigspace = $bigspace;
}

#Array of the GenericTabs files
$i = 0;
while ($i <= $tabnumb) {
	$i2 = $i + 1;

	$cities[$i] = $sitetabsgeralfolder.'City'.$i2.'.php';

	$i++;
}

?>