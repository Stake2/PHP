<?php 

/*

A PHP script that replaces the text variables in text files like "$cool_dog_image".
With their respective variables.

*/

$verbose = False;
$has_variable = False;

function match($source_string, $pattern) {
	if (preg_match("~\b$pattern\b~", $source_string)) {
		return true;
	} 
	
	else {
		return false;
	}
}

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
	global $variable_inserter_replacer_array;
	global $use_text_as_replacer;
	global $website_language_text;

	$backup_text_line = $text_line;

	$has_variable = False;

	if ($use_text_as_replacer == True) {
		$i = 0;
		foreach ($variable_inserter_replacer_array as $text) {
			$variable = $array[$i];

			if ($verbose == True) {
				echo "<br />Linha: ".$text_line."<br />"."Variável: ".$variable."<br />"."Texto: ".$text."<br />";
			}

			if (strpos($text_line, $text) == True and $has_variable == False) {
				$new_text_line = $text_line;

				$new_text_line = str_replace($text, $variable, $new_text_line);
				
				$has_variable = True;
			}

			if (strpos($text_line, $text) == False and $has_variable == False) {
				$new_text_line = $text_line;

				$new_text_line = str_replace(array(".", "?", ")", "(", ":", "/", "="), "", $text_line);

				echo "<br />Linha: <br />".$new_text_line."<br />"."Texto: <br />".str_replace(array(".", "?", ")", "(", ":", "/", "="), "", $text)."<br /><br />";

				if ($new_text_line == str_replace(array(".", "?", ")", "(", ":", "/", "="), "", $text)) {
					$new_text_line = str_replace($text, $variable, $new_text_line);

					$has_variable = True;
				}
			}

			if ($has_variable == True) {
				$text_line = $new_text_line;
			}

			if ($has_variable == False) {
				$text_line = $backup_text_line;
			}

			$i++;
		}
		
	}

	if ($use_text_as_replacer == False) {
		$i = 0;
		foreach ($array as $variable) {
			$variable_name = Variable_Name($variable);	

			if ($verbose == True) {
				echo "<br />Linha: ".$text_line."<br />"."Nome da Variável: $".$variable_name.";<br />"."Variável: $".$variable.";<br />";
			}

			#if (preg_match("/".$variable_name."/m", $text_line) == True and $has_variable == False) {
			#	$new_text_line = $text_line;
			#
			#	if (isset($variable_inserter_replacer_array)) {
			#		$c = 0;
			#		while ($c <= count($variable_inserter_replacer_array) - 1) {
			#			if (preg_match("/".$variable_inserter_replacer_array[$c]."/m", $new_text_line) == True) {
			#				$new_text_line = str_replace($variable_inserter_replacer_array[$c], "", $new_text_line);
			#			}
			#
			#			$c++;
			#		}
			#	}
			#
			#	$new_text_line = str_replace("$".$variable_name.";", $variable, $new_text_line);
			#
			#	$has_variable = True;
			#}
			#
			#if (preg_match("/".$variable_name."/m", $text_line) == False and $has_variable == False) {
			#	$new_text_line = str_replace(array(".", "?", ")", "("), "", $text_line);
			#
			#	if (isset($variable_inserter_replacer_array)) {
			#		$c = 0;
			#		while ($c <= count($variable_inserter_replacer_array) - 1) {
			#			if (preg_match("/".$variable_inserter_replacer_array[$c]."/m", $new_text_line) == True) {
			#				$new_text_line = str_replace($variable_inserter_replacer_array[$c], "", $new_text_line);
			#			}
			#
			#			$c++;
			#		}
			#	}
			#
			#	if ($new_text_line == "$".$variable_name.";") {
			#		$new_text_line = str_replace("$".$variable_name.";", $variable, $new_text_line);
			#
			#		$has_variable = True;
			#	}
			#}

			if (strpos($text_line, "$".$variable_name.";") == True and $has_variable == False) {
				$new_text_line = $text_line;

				if (isset($variable_inserter_replacer_array) == True and strpos($new_text_line, "<a") === False) {
					$c = 0;
					while ($c <= count($variable_inserter_replacer_array) - 1) {
						if (strpos($new_text_line, $variable_inserter_replacer_array[$c]) == True and strpos($new_text_line, "<a") === False) {
							$new_text_line = str_replace($variable_inserter_replacer_array[$c], "", $new_text_line);
						}
			
						$c++;
					}
				}

				$new_text_line = str_replace("$".$variable_name.";", $variable, $new_text_line);

				if (isset($variable_inserter_replacer_array) == True and strpos($new_text_line, "<a") === False) {
					$c = 0;
					while ($c <= count($variable_inserter_replacer_array) - 1) {
						if (strpos($new_text_line, $variable_inserter_replacer_array[$c]) == True and strpos($new_text_line, "<a") === False) {
							$new_text_line = str_replace($variable_inserter_replacer_array[$c], "", $new_text_line);
						}
			
						$c++;
					}
				}

				#if (isset($variable_inserter_replacer_array)) {
				#	$new_text_line = str_replace($variable_inserter_replacer_array, "", $new_text_line);
				#}

				$has_variable = True;
			}

			if (strpos($text_line, "$".$variable_name.";") == False and $has_variable == False) {
				$new_text_line = str_replace(array(".", "?", ")", "("), "", $text_line);

				if ($new_text_line == "$".$variable_name.";") {
					$new_text_line = str_replace("$".$variable_name.";", $variable, $new_text_line);

					$has_variable = True;
				}

				if (isset($variable_inserter_replacer_array) and $new_text_line == "$".$variable_name.";" and strpos($new_text_line, "<a") == False) {
					$c = 0;
					while ($c <= count($variable_inserter_replacer_array) - 1) {
						if (strpos($new_text_line, $variable_inserter_replacer_array[$c]) == True and strpos($new_text_line, "<a") == False) {
							$new_text_line = str_replace($variable_inserter_replacer_array[$c], "", $new_text_line);
						}
			
						$c++;
					}
				}

				#if (isset($variable_inserter_replacer_array) and $new_text_line == "$".$variable_name.";") {
				#	$new_text_line = str_replace($variable_inserter_replacer_array, "", $new_text_line);
				#}
			}

			$i++;
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