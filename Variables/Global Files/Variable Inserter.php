<?php 

/*

A PHP script that replaces the text variables in text files like "$cool_dog_image".
With their respective variables.

*/

$verbose = False;

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

	foreach ($array as $variable) {
		$variable_name = Variable_Name($variable);

		if ($verbose == True) {
			echo "<br />Linha: ".$text_line."<br />"."Nome da Variável: $".$variable_name.";<br />"."Variável: $".$variable.";<br />";
		}

		if (strpos($text_line, "$".$variable_name.";") == True or $text_line == "$".$variable_name.";") {
			
			$text_line = str_replace("$".$variable_name.";", $variable, $text_line);
		}
	}

	return $text_line;
}

?>