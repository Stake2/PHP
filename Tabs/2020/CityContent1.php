<?php 

echo '<div style="text-align:left;">';

$i = 0;
foreach ($year_creation_and_edit_dates as $date) {
	if ($i == 0) {
		echo $creation_date_text.': '.$date."<br />"."\n";
	}

	if ($i == 1) {
		echo $edit_date_text.': '.$date."<br />"."\n";
	}

	$i++;
}

echo "<br />"."\n"."---<br /><br />"."\n";

$i = 0;
foreach ($year_numbers as $number) {
	if ($number == $year_numbers[$things_made_in_current_year_text_key]) {
		echo $year_number_texts[$things_made_in_current_year_text_key].": ".$number."<br />"."(".$things_made_in_current_year_expanded." ".$additional_things_made_in_year_text.")"."\n";

		if ($i != count($year_numbers)) {
			echo "<br /><br />\n";
		}

		if ($i == count($year_numbers)) {
			echo "";
		}
	}

	if ($number == $year_numbers[$comments_on_super_animes_key]) {
		echo $year_number_texts[$comments_on_super_animes_key].": ".$number." (#".$comments_on_superanimes_last_comment.")"."\n";

		if ($i != count($year_numbers)) {
			echo "<br />\n";
		}

		if ($i == count($year_numbers)) {
			echo "";
		}
	}

	if ($number != $year_numbers[$things_made_in_current_year_text_key] and $number != $year_numbers[$comments_on_super_animes_key]) {
		echo $year_number_texts[$year_numbers_keys[$i]].": ".$number;
	}

	if ($i != count($year_numbers) and $number != $things_made_in_current_year and $number != $year_numbers[$comments_on_super_animes_key]) {
		echo "<br />\n";
	}

	$i++;
}

echo "<br />"."\n"."---<br /><br />"."\n";

$key = $productive_things_key;
echo $year_number_texts[$key].': '.$year_numbers[$key]."<br />"."\n";

$i = 0;
while ($i <= count($year_summary_file_text) - 1) {
	if (strpos($year_summary_file_text[$i], str_replace(array("P", "C"), "", $year_number_texts[$key])) == True) {
		$number = $i + 1;
	}

	$i++;
}

$i = 0;
$final_number = 9;
$line_number = $number;
while ($i <= $final_number) {
	if ($i != $final_number) {
		echo $year_summary_file_text[$line_number + $i]."<br />"."\n";
	}

	if ($i == $final_number) {
		echo $year_summary_file_text[$line_number + $i]."\n";
	}

	$i++;
}

echo "<br />"."\n";

$key = $watched_things_text_key;
echo $year_number_texts[$key].': '.$year_numbers[$key]."<br />"."\n";

$i = 0;
while ($i <= count($year_summary_file_text) - 1) {
	if (strpos($year_summary_file_text[$i], str_replace(array("W", "C"), "", $year_number_texts[$key])) == True) {
		$number = $i + 1;
	}

	$i++;
}

$i = 0;
$final_number = 4;
$line_number = $number;
while ($i <= $final_number) {
	if ($i != $final_number) {
		echo $year_summary_file_text[$line_number + $i]."<br />"."\n";
	}

	if ($i == $final_number) {
		echo $year_summary_file_text[$line_number + $i]."\n";
	}

	$i++;
}

echo "<br />"."\n";

$i = 0;
foreach ($year_summary_file_text as $line) {
	if ($new_stories_switch == True) {
		$key = $new_stories_text_key;
		if ($line == $year_number_texts[$key].': '.$year_numbers[$key] and $i > 18) {
			$new_stories_text_line_number = $i + 1;
		}
	}

	if ($story_progress_switch == True) {
		$key = $story_progress_text_key;
		if ($line == $year_number_texts[$key].': '.$year_numbers[$key] and $i > 18) {
			$story_progress_text_line_number = $i + 1;
		}
	}

	if ($new_websites_switch == True) {
		$key = $new_websites_text_key;
		if ($line == $year_number_texts[$key].': '.$year_numbers[$key] and $i > 18) {
			$new_websites_text_line_number = $i + 1;
		}
	}

	$i++;
}

if ($new_stories_switch == True) {
	echo "<br />"."\n";

	$key = $new_stories_text_key;
	echo $year_number_texts[$key].': '.$year_numbers[$key]."<br />"."\n";

	$i = 0;
	$final_number = $year_numbers[$key] - 1;
	$line_number = $new_stories_text_line_number;
	while ($i <= $final_number) {
		if ($i != $final_number) {
			echo $year_summary_file_text[$line_number + $i]."<br />"."\n";
		}

		if ($i == $final_number) {
			echo $year_summary_file_text[$line_number + $i]."\n";
		}

		$i++;
	}

	echo "<br />"."\n";
}

if ($story_progress_switch == True) {
	echo "<br />"."\n";

	$key = $story_progress_text_key;
	echo $year_number_texts[$key].': '.$year_numbers[$key]."<br />"."\n";

	$i = 0;
	$final_number = $year_numbers[$key] - 1;
	$line_number = $story_progress_text_line_number;
	while ($i <= $final_number) {
		if ($i != $final_number) {
			echo $year_summary_file_text[$line_number + $i]."<br />"."\n";
		}

		if ($i == $final_number) {
			echo $year_summary_file_text[$line_number + $i]."\n";
		}

		$i++;
	}

	echo "<br />"."\n";
}

if ($new_websites_switch == True) {
	echo "<br />"."\n";

	$key = $new_websites_text_key;
	echo $year_number_texts[$key].': '.$year_numbers[$key]."<br />"."\n";

	$i = 0;
	$final_number = $year_numbers[$key] - 1;
	$line_number = $new_websites_text_line_number;
	while ($i <= $final_number) {
		if ($i != $final_number) {
			echo $year_summary_file_text[$line_number + $i]."<br />"."\n";
		}

		if ($i == $final_number) {
			echo $year_summary_file_text[$line_number + $i]."\n";
		}

		$i++;
	}

	echo "<br />"."\n";
}

echo "<br />"."\n";

$key = $people_text_i_met_text_key;
echo $year_number_texts[$key].': '.$year_numbers[$key]."<br />"."\n";

echo "<br />"."\n";

$key = $comments_on_super_animes_key;
echo $year_number_texts[$key].': '.$year_numbers[$key].' '.'(#'.$comments_on_superanimes_last_comment.')'."<br />"."\n";

echo $div_close;

?>