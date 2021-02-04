<?php 

if ($website_hide_tabs_setting == True) {
	$hide_tabs_text = 'style="display:none;"';
}

if ($website_hide_tabs_setting != True) {
	$hide_tabs_text = '';
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