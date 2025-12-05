<?php 

# Read the "Types.json" file
$types = $JSON -> To_PHP($folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task types"]["Task types"]);

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["Full"][$language];

if ($language == "general") {
	$language = "en";

	$full_language = $Language -> languages["Full"][$language];
}

# Require the "Task History" website content PHP file to define the "completed_tasks" and "past_registries" tab templates
require $website["Data"]["Folders"]["PHP"]["root"]."Content.php";

# Add all completed tasks numbers of all years
$website["Data"]["Numbers"]["Total"] = 0;

foreach ($website["Data"]["Numbers"]["By year"] as $number) {
	$website["Data"]["Numbers"]["Total"] += $number;
}

$number = number_format($website["Data"]["Numbers"]["Total"], 0, ',', '.');

$first_year = $website["Task History"]["Years list"][0];
$last_year = $website["current_year"];

$text = $number." ".HTML::format($tasks["Language texts"]["productive_things_done_{}_until_{}"], [$first_year, $last_year]);

# Add productive things number to the language and header website title with the text
$website["Data"]["titles"]["language"] .= ": ".$text;

# Change the text color of the number
$number = HTML::Element("span", $number, "", $website["Style"]["text"]["theme"]["dark"]);
$first_year = HTML::Element("span", $first_year, "", $website["Style"]["text"]["theme"]["dark"]);
$last_year = HTML::Element("span", $last_year, "", $website["Style"]["text"]["theme"]["dark"]);

# Update the description text
$text = $number." ".HTML::format($tasks["Language texts"]["productive_things_done_{}_until_{}"], [$first_year, $last_year]);

$website["Data"]["titles"]["icon"] .= "<br />"."\n".
$text;

$website["Data"]["description"]["html"] .= "\n".
"\n";

$website["Data"]["description"]["header"] .= "<br />"."\n".
"<br />"."\n";

$array = $website["Data"]["Numbers"]["By year"];

$years_list = Date::Create_Years_List($mode = "array", $start = 2018, $plus = 0);

foreach ($years_list as $local_year) {
	$number = $array[$local_year];

	# Add to the HTML description
	$website["Data"]["description"]["html"] .= $tasks["Language texts"]["completed_tasks"]." ".$local_year.": ".$number;

	# Add to the header description
	$span = HTML::Element("span", $local_year, "", $website["Style"]["text_highlight"]);

	$style = 'style="text-decoration: underline; cursor: pointer;"';

	$tab_id = "past_registry_".$local_year;

	if ($local_year == $website["current_year"]) {
		$tab_id = "completed_tasks";
	}

	$colored_year = HTML::Element("a", $span, 'onclick="'."Open_Tab('".$tab_id."')".'"'." ".$style, $website["Style"]["text_highlight"]);

	$painted_number = HTML::Element("span", $number, "", $website["Style"]["text_highlight"]);

	$website["Data"]["description"]["header"] .= $tasks["Language texts"]["completed_tasks_in"]." ".$colored_year.": ".$painted_number;

	if ($local_year != end($years_list)) {
		$website["Data"]["description"]["html"] .= "\n";

		$website["Data"]["description"]["header"] .= "<br />"."\n";
	}
}

$website["Data"]["description"]["html"] .= "\n".
"\n".
$tasks["Language texts"]["task_types_completed_in_all_years"].":"."\n";

$website["Data"]["description"]["header"] .= "<br />"."\n".
"<br />"."\n".
$tasks["Language texts"]["task_types_completed_in_all_years"].":"."<br />"."\n";

$types_dictionary = $tasks["Types dictionary"];

$i = 0;
foreach ($types_dictionary["en"] as $type) {
	$language_type = $types_dictionary[$language][$i];

	$number = $website["Data"]["Numbers"]["By type"][$type];

	# If the number is not zero (0)
	if ($number != 0) {
		# Add to the HTML description
		$website["Data"]["description"]["html"] .= $language_type.": ".$number;

		# Add to the header description
		$painted_number = HTML::Element("span", $number, "", $website["Style"]["text_highlight"]);

		$website["Data"]["description"]["header"] .= $language_type.": ".$painted_number;

		if ($type != end($types_dictionary["en"])) {
			$website["Data"]["description"]["html"] .= "\n";

			$website["Data"]["description"]["header"] .= "<br />"."\n";
		}
	}

	$i++;
}

?>