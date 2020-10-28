<?php 

#Comments displayer
if (isset($array1[$number_variable]) and is_array($array1[$number_variable]) == true and $array1[$number_variable] != null) {
	echo $commentheader."\n";

	$c = 0;
	while ($c <= count($array1[$number_variable]) - 1) {
		echo $array1[$number_variable][$c]."\n";

		$c++;
	}

	echo $div_close."\n";
}

else if (isset($array1[$number_variable]) and $array1[$number_variable] != null) {
	echo $commentheader."\n";

	echo $array1[$number_variable]."\n";

	echo $div_close."\n";
}

#Readings and Reads displayer
if (isset($array2[$number_variable]) and is_array($array2[$number_variable]) == true and $array2[$number_variable] != null) {
	echo $readingsheader."\n";

	$c = 0;
	while ($c <= count($array2[$number_variable]) - 1) {
		echo $array2[$number_variable][$c]."\n";

		$c++;
	}
}

else if (isset($array2[$number_variable]) and $array2[$number_variable] != null) {
	echo $readingsheader."\n";

	echo $array2[$number_variable]."\n";
}

?>