<?php 

$website_style_array = array();

if (isset($website_style_variable_names_array) == True) {
	$i = 0;
	foreach ($website_style_variable_names_array as $value) {
		if (isset($website_style_variables_array) == True) {
			$style_value = $website_style_variables_array[$i];

			${"website_".$value} = $style_value;
			$website_style_array[$value] = $style_value;
		}

		$i++;
	}
}

?>