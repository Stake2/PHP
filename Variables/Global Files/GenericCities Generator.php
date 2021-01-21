<?php 

if ($hidecitysetting == True) {
	$hidecitytextvariable = 'style="display:none;"';
}

if ($hidecitysetting != True) {
	$hidecitytextvariable = '';
}

if ($website_not_so_much_space_setting == True) {
	$bigspace = '';
}

else {
	$computer_variable = 'mobileHide';
	$bigspace = '<div class="'.$computer_variable.'"><br /><br /><br /><br /><br /><br /><br /><br /></div>';
	$bigspace = $bigspace;
}

#Array of the GenericTabs files
$i = 0;
while ($i <= $tabnumb) {
	$i2 = $i + 1;

	$cities[$i] = $generic_tabs_folder.'City'.$i2.'.php';

	$i++;
}

?>