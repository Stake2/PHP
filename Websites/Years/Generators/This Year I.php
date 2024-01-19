<?php 

# This Year I

$text = $website["Language texts"]["this_year_i"];

# Define the "This Year I" tab templates
if (in_array($website["Data"]["title"], $website["years"]) == True) {
	$file = $website["Data"]["Files"]["this_year_i"];

	if (file_exists($file) == True) {
		$website["tabs"]["templates"]["this_year_i"] = [
			"name" => $text,
			"file" => $file,
			"empty_message" => Text::Format($website["Language texts"]["the_{}_text_has_not_been_created_yet"], $text),
			"text_style" => "text-align: left;",
			"icon" => "calendar_days"
		];
	}

	if (
		file_exists($file) == False or
		file_exists($file) == True and
		$File -> Contents($file)["lines"] == []
	) {
		# Define the tab to be removed if the file is empty
		array_push($website["tabs"]["To remove"], "this_year_i");
	}
}

?>