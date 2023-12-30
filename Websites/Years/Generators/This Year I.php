<?php 

# This Year I

$text = $website["language_texts"]["this_year_i"];

# Define the "This Year I" tab templates
if (in_array($website["data"]["title"], $website["years"]) == True) {
	if (file_exists($website["data"]["files"]["this_year_i"]) == True) {
		$website["tabs"]["templates"]["this_year_i"] = [
			"name" => $text,
			"file" => $website["data"]["files"]["this_year_i"],
			"empty_message" => Text::Format($website["language_texts"]["the_{}_text_has_not_been_created_yet"], $text),
			"text_style" => "text-align: left;",
			"icon" => "calendar_days"
		];
	}

	else {
		$website["tabs"]["templates"]["this_year_i"] = [
			"name" => $text,
			"text_style" => "text-align: left;",
			"icon" => "calendar_days",
			"content" => Text::Format($website["language_texts"]["the_{}_text_has_not_been_created_yet"], $text),
		];
	}
}

?>