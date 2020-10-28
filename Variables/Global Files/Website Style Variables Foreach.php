<?php 

$i = 0;
foreach ($website_style_variable_names_array as $value) {
	${$value} = $website_style_variables_array[$i];

	$i++;
}

?>