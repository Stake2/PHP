<?php 

/*

A PHP script that replaces the text variables in text files like "$cool_dog_image".
With their respective variables.

*/

function variable_name($var) {
    foreach($GLOBALS as $varName => $value) {
        if ($value === $var) {
            return $varName;
        }
    }

    return;
}

function variable_inserter($array, $text_line) {
	foreach ($array as $variable) {
		$variable_name = variable_name($variable);

		if (strpos($text_line, "$".$variable_name.";") == True or $text_line == "$".$variable_name.";") {
			$text_line = str_replace("$".$variable_name.";", $variable, $text_line);
		}
	}

	return $text_line;
}

?>