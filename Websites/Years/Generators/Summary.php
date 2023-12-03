<?php 

# Summary

# Read summary file
$contents = $File -> Contents($website["data"]["files"]["summary"]);

$span = HTML::Element("span", "{}", "", $website["style"]["text_highlight"]);
$span_bold = HTML::Element("span", "{}", 'style="font-weight: bold;"');
$span_bold_color = HTML::Element("span", "{}", 'style="font-weight: bold;"', $website["style"]["text_highlight"]);
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

# Add tab to tab templates
$website["tabs"]["templates"]["summary"] = [
	"name" => $website["language_texts"]["summary, title()"],
	"text_style" => "text-align: left;",
	"icon" => "clipboard",
	"file" => $website["data"]["files"]["summary"],
	"empty_message" => Text::Format($website["language_texts"]["the_{}_text_has_not_been_created_yet"], $website["language_texts"]["summary, title()"]),
	"content" => $contents["string"]
];

?>