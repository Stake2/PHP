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
		# Paint website author text
		$line = str_replace($website["website_author"], Text::Format($span, $website["website_author"]), $line);

		# Paint year (website title) text
		$line = str_replace($year.": ", Text::Format($span, $year).": ", $line);

		# Paint year (website title) text
		$line = str_replace($year." ", Text::Format($span, $year)." ", $line);

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

		# Paint done things numbers on headers
		preg_match("/: [0-9]{1,3}/i", $line, $matches);

		foreach ($matches as $match) {
			$replaced_match = substr($match, 2);

			if (preg_match("/[0-9]\/[0-9]/i", $line) === 0) {
				$line = str_replace($replaced_match, Text::Format($span_bold_color, $replaced_match), $line);
			}
		}

		# Replace number and dot with number and dash
		preg_match("/[0-9]{1,2}. /i", $line, $matches);

		foreach ($matches as $match) {
			$text = str_replace(".", " - ", $match);

			$line = str_replace($match, $text, $line);
		}

		# Paint item line numbers
		preg_match("/[0-9]{1,2} - /i", $line, $matches);

		foreach ($matches as $match) {
			$replaced_match = str_replace(" - ", "", $match);

			$line = str_replace($match, Text::Format($span, $replaced_match)." - ", $line);
		}

		# Paint list headers
		$line = preg_replace("/^.*:$/i", Text::Format($span_bold, "$0"), $line, 1);

		# Replace tab characters with margin-left
		$line = preg_replace("/\t{1}/i", Text::Format($margin, "$0"), $line);

		if ($year == "2018" and preg_match("/[0-9]\/[0-9]/i", $line) === 0) {
			$line = preg_replace("/[0-9]+\./i", Text::Format($span_bold_color, "$0"), $line);
			$line = preg_replace("/[0-9]{2,3}/i", Text::Format($span_bold_color, "$0"), $line);
		}

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