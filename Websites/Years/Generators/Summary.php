<?php 

# Summary

$file = $website["Data"]["Files"]["summary"];

if (file_exists($file) == True) {
	# Read the year summary file
	$contents = $File -> Contents($file);

	$span = HTML::Element("span", "{}", "", $website["Style"]["text_highlight"]);
	$span_bold = HTML::Element("span", "{}", 'style="font-weight: bold;"');
	$span_bold_color = HTML::Element("span", "{}", 'style="font-weight: bold;"', $website["Style"]["text_highlight"]);
	$margin = HTML::Element("span", "{}", 'style="margin-left: 3%;"');

	if ($contents["lines"] != []) {
		$i = 0;
		foreach ($contents["lines"] as $line) {
			# Paint date time text with parenthesis
			$line = preg_replace("/\([0-9][0-9]\:[0-9][0-9] [0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]\)/i", Text::Format($span, "$0"), $line);

			# Paint date time text
			$line = preg_replace("/[0-9][0-9]\:[0-9][0-9] [0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]/i", Text::Format($span, "$0"), $line);

			# Paint done things texts on headers
			preg_match("/^[a-zA-Z].*: /i", $line, $matches);

			foreach ($matches as $match) {
				$match = str_replace(": ", "", $match);

				$line = str_replace($match, Text::Format($span_bold, $match), $line);
			}

			# Paint list headers
			$line = preg_replace("/^.*:$/i", Text::Format($span_bold, "$0"), $line, 1);

			# Replace tab characters with margin-left
			$line = preg_replace("/\t{1}/i", Text::Format($margin, "$0"), $line);

			$contents["lines"][$i] = $line;

			$i++;
		}
	}

	$contents["string"] = Text::From_Array($contents["lines"]);

	$contents["string"] = Linkfy($contents["string"]);

	# Add the tab to the tab templates
	$website["tabs"]["templates"]["summary"] = [
		"name" => $website["Language texts"]["summary, title()"],
		"text_style" => "text-align: left;",
		"icon" => "clipboard",
		"file" => $file,
		"empty_message" => Text::Format($website["Language texts"]["the_{}_text_has_not_been_created_yet"], $website["Language texts"]["summary, title()"]),
		"content" => $contents["string"]
	];
}

if (
	file_exists($file) == False or
	file_exists($file) == True and
	$File -> Contents($file)["lines"] == []
) {
	# Define the tab to be removed if the file is empty
	array_push($website["tabs"]["To remove"], "summary");
}

?>