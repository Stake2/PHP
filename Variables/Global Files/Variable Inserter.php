<?php 

/*

A PHP script that replaces the text variables in text files like "$cool_dog_image".
With their respective variables.

*/

$verbose = False;
$has_variable = False;

function Variable_Name($var) {
    foreach($GLOBALS as $varName => $value) {
        if ($value === $var) {
            return $varName;
        }
    }

    return "Nothing";
}

function Variable_Inserter($array, $text_line) {
	global $verbose;
	global $has_variable;

	$backup_text_line = $text_line;

	$has_variable = False;

	foreach ($array as $variable) {
		$variable_name = Variable_Name($variable);	

		if ($verbose == True) {
			echo "<br />Linha: ".$text_line."<br />"."Nome da Variável: $".$variable_name.";<br />"."Variável: $".$variable.";<br />";
		}

		if (strpos($text_line, "$".$variable_name.";") == True and $has_variable == False) {
			$new_text_line = str_replace("$".$variable_name.";", $variable, $text_line);

			$has_variable = True;
		}

		if (strpos($text_line, "$".$variable_name.";") == False and $has_variable == False) {
			$new_text_line = str_replace(array(".", "?", ")", "(", " SpaceLiving Network"), "", $text_line);

			if ($new_text_line == "$".$variable_name.";") {
				$new_text_line = str_replace("$".$variable_name.";", $variable, $new_text_line);

				$has_variable = True;
			}
		}
	}

	if ($has_variable == True) {
		$text_line = $new_text_line;
	}

	if ($has_variable == False) {
		$text_line = $backup_text_line;
	}

	return $text_line;
}

?>