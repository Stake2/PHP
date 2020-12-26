<?php 

$i = 0;
foreach ($year_numbers as $number) {
	if ($number == $things_made_in_current_year) {
		echo $year_number_texts[$i].": ".$number."<br />"."(".$things_made_in_current_year_expanded." ".$additional_things_made_in_year_text.")"."\n";

		if ($i != count($year_numbers)) {
			echo "<br /><br />\n";
		}

		if ($i == count($year_numbers)) {
			echo "";
		}
	}

	if ($number == $comments_on_superanimes_number) {
		echo $year_number_texts[$i].": ".$number." (#".$comments_on_superanimes_last_comment.")"."\n";

		if ($i != count($year_numbers)) {
			echo "<br />\n";
		}

		if ($i == count($year_numbers)) {
			echo "";
		}
	}

	if ($number != $things_made_in_current_year and $number != $comments_on_superanimes_number) {
		echo $year_number_texts[$i].": ".$number;
	}

	if ($i != count($year_numbers) and $number != $things_made_in_current_year and $number != $comments_on_superanimes_number) {
		echo "<br />\n";
	}

	if ($i == count($year_numbers)) {
		echo "";
	}

	$i++;
}

?>