<?php 

if ($website_hide_tabs_setting == True) {
	$hide_tabs_text = 'style="display:none;"';
}

if ($website_hide_tabs_setting != True) {
	$hide_tabs_text = '';
}

if ($website_not_so_much_space_setting == True) {
	$big_space = '';
}

else {
	$computer_variable = 'mobileHide';
	$big_space = '<div class="'.$computer_variable.'"><br /><br /><br /><br /><br /><br /><br /><br /></div>';
	$big_space = $big_space;
}

# Array of the Generic Tabs PHP Files
$i = 0;
while ($i <= $website_tab_number) {
	$i2 = $i + 1;

	$website_tabs[$i] = $generic_tabs_folder.'City'.$i2.'.php';

	$i++;
}

?>