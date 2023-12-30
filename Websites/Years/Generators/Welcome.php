<?php 

# This Year I

$text = $website["language_texts"]["welcome, title()"];
$icon = "house";

# Define the "This Year I" tab templates
if (in_array($website["data"]["title"], $website["years"]) == True) {
	if (file_exists($website["data"]["files"]["welcome"]) == True) {
		$website["tabs"]["templates"]["welcome"] = [
			"name" => $text,
			"file" => $website["data"]["files"]["welcome"],
			"empty_message" => Text::Format($website["language_texts"]["the_{}_text_has_not_been_created_yet"], $text),
			"text_style" => "text-align: left;",
			"icon" => $icon
		];
	}

	else {
		$website["tabs"]["templates"]["welcome"] = [
			"name" => $text,
			"text_style" => "text-align: left;",
			"icon" => $icon,
			"content" => Text::Format($website["language_texts"]["the_{}_text_has_not_been_created_yet"], $text),
		];
	}
}

?>