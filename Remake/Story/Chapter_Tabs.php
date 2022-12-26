<?php 

# Chapter_Tabs

# Create chapter buttons and chapters
$story["chapter_buttons"] = "";
$story["chapters"] = "";

$chapter_titles = $story["Information"]["Chapter titles"][$language];

$i = 1;
foreach ($chapter_titles as $chapter_title) {
	$chapter_id = "chapter_".$i;
	$chapter_title_with_number = $i." - ".$chapter_title;

	# Create chapter button
	$chapter_button = "\n\t\t".HTML::Chapter_Button($i, $chapter_title);

	# Add chapter button to chapter buttons string
	$story["chapter_buttons"] .= $chapter_button;

	if ($chapter_title != array_reverse($chapter_titles)[0]) {
		$story["chapter_buttons"] .= "\n";
	}

	$variables_folder = $story["folders"]["Chapters"][$full_language]["root"].$website["language_texts"]["variables, title()"]."/";
	Folder::Create($variables_folder);

	# Define chapter file
	$chapter_file = $story["folders"]["Chapters"][$full_language]["root"].Text::Add_Leading_Zeros($i)." - ".Folder::Sanitize($chapter_title).".txt";

	$variables_file = $variables_folder.Text::Add_Leading_Zeros($i)." - ".Folder::Sanitize($chapter_title).".txt";

	$contents = File::Contents($chapter_file, $add_br = False);

	# Run Insert_Variables method to insert variables in chapter text
	if (file_exists($variables_file) == True) {
		$contents = File::Contents($variables_file, $add_br = False);
		$chapter_text = Text::Insert_Variables($contents["lines"]);
		$chapter_text = str_replace("\n", "\n\t\t", $chapter_text);
	}

	# Define chapter text without Insert_Variables
	else {
		$chapter_text = str_replace("\n", "<br />\n\t\t", $contents["string"]);
	}

	# Define chapter cover
	$local_chapter_cover = $website["data"]["folders"]["local_website"]["images"]["story_covers"]["root"].$full_language."/".Text::Chapter_Cover_Folder($i)."/".Text::Add_Leading_Zeros($i).".jpg";

	$remote_chapter_cover = $website["data"]["folders"]["website"]["images"]["story_covers"]["root"].$full_language."/".Text::Chapter_Cover_Folder($i)."/".Text::Add_Leading_Zeros($i).".jpg";

	# Paint story and chapter titles
	$color = $website["style"]["text"]["secondary_theme"]["normal"];

	if (isset($website["style"]["text_highlight"]) == True) {
		$color = $website["style"]["text_highlight"];
	}

	$painted_story_title = HTML::Element("span", $website["data"]["titles"]["language"], "", $color);
	$painted_chapter_title = HTML::Element("span", $chapter_title_with_number, "", $color);

	# Define chapter tab array
	$chapter_tab = [
		"number" => $i,
		"number_leading_zeroes" => Text::Add_Leading_Zeros($i),
		"id" => $chapter_id,
		"chapter_title" => $chapter_title_with_number,
		"you_are_reading" => Text::Format($website["language_texts"]["you_are_reading_{}_chapter_{}"], [$painted_story_title, $painted_chapter_title]),
		"you_read" => Text::Format($website["language_texts"]["you_just_read_{}_chapter_{}"], [$painted_story_title, $painted_chapter_title]),
		"class" => $website["style"]["tab"]["theme_dark"],
		"chapter_text_color" => "",
		"top_button" => "",
		"bottom_button" => "",
		"chapter_text" => $chapter_text."\n",
		"comment" => "<!-- Chapter button and text -->"."\n",
		"padding" => "2px",
	];

	if (isset($website["style"]["chapter_text_color"]) == True) {
		$chapter_tab["chapter_text_color"] = " text_".$website["style"]["chapter_text_color"];
	}

	$words = number_format(str_word_count($chapter_tab["chapter_text"]));

	# Check chapter dates
	if ($story["Information"]["Chapter dates"] != []) {
		$date = $story["Information"]["Chapter dates"][$i - 1];
		$format = "date_format";

		if (strstr($date, ":") == True) {
			$format = "date_time_format";
		}

		$date = Date::Now($date, $website["texts"][$format]["pt"])[$website["language_texts"][$format]];

		$chapter_tab["chapter_text"] .= "<br />"."<br />".$website["language_texts"]["chapter_written_in"].": ".$date."<br />";
	}

	else {
		$chapter_tab["chapter_text"] .= "<br />"."<br />";
	}

	$chapter_tab["chapter_text"] .= $website["language_texts"]["words, title()"].": ".$words."<br />"."<br />";

	if (file_exists($local_chapter_cover) == True) {
		$chapter_tab["comment"] = str_replace("button", "button, image,", $chapter_tab["comment"]);

		$chapter_tab["chapter_cover"] = "<br />"."<!-- Chapter cover image -->"."\n".
		"\t\t"."<center>"."\n".
		"\t\t\t".HTML::Element("img", "", 'id="chapter_cover_'.$i.'" src="'.$remote_chapter_cover.'"', $website["style"]["box_shadow"]["theme"]["dark"]." ".$website["style"]["img"]["theme"]["light"])."\n\t\t"."</center>"."\n".
		"\t\t"."<br />\n\n";
	}

	else {
		$chapter_tab["chapter_cover"] = "<br />"."<br />";
	}

	# Add previous chapter button if chapter is not the first one
	if ($i != 1) {
		$c = $i - 1;

		$options = [
			"previous" => True,
			"next" => False,
			"text" => $website["icons"]["arrow_left"],
		];

		$chapter_tab["top_button"] .= "\n\n\t".HTML::Chapter_Button($c, $chapter_titles[$i - 1], $options);
		$chapter_tab["bottom_button"] .= "\n\n\t".HTML::Chapter_Button($c, $chapter_titles[$i - 1], $options);
	}

	# Add next chapter button if chapter is not the last one
	if ($i != count($chapter_titles)) {
		$c = $i + 1;

		$options = [
			"previous" => False,
			"next" => True,
			"text" => $website["icons"]["arrow_right"],
		];

		$chapter_tab["top_button"] .= "\n\n\t".HTML::Chapter_Button($c, $chapter_titles[$i - 1], $options);
		$chapter_tab["bottom_button"] .= "\n\n\t".HTML::Chapter_Button($c, $chapter_titles[$i - 1], $options);
	}

	# Create "Comment" button
	$text = HTML::Element("h3", "\n\t\t".$website["language_texts"]["to_comment"].": ".$website["icons"]["comment"]."\n\t\t", ' style="font-weight: bold;"', "text_size ".$website["style"]["text"]["theme"]["dark"])."\n";

	$chapter_tab["bottom_button"] .= "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", 'onclick="Open_Modal(\'comment\', \''.$chapter_tab["chapter_title"].'\')" style="float: right; margin-right: 1%;"', "w3-btn ".$website["style"]["button"]["theme"]["light"]);

	# Create "I read the chapter" button
	$text = HTML::Element("h3", "\n\t\t".$website["language_texts"]["i_read"].": ".$website["icons"]["check"]." ".$website["icons"]["reader"]."\n\t\t", 'style="font-weight: bold;"', "text_size ".$website["style"]["text"]["theme"]["dark"])."\n";

	$chapter_tab["bottom_button"] .= "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", 'onclick="Open_Modal(\'read\', \''.$chapter_tab["chapter_title"].'\')" style="float: right; margin-right: 1%;"', "w3-btn ".$website["style"]["button"]["theme"]["light"]);

	# HTML comment for buttons, text, and image
	if ($i != 1 and $i != count($chapter_titles)) {
		$chapter_tab["comment"] = str_replace("button", "buttons", $chapter_tab["comment"]);
	}

	$chapter_tab["top_button"] .= "\n";
	$chapter_tab["bottom_button"] .= "\n";

	$comments_folder = $story["folders"]["Comments"]["Chapter"].$chapter_tab["number_leading_zeroes"]."/";
	$reads_folder = $story["folders"]["Readers and Reads"]["Reads"].$chapter_tab["number_leading_zeroes"]."/";

	if (file_exists($comments_folder) == True or file_exists($reads_folder) == True) {
		$chapter_tab["additional_elements"] = $website["elements"]["hr_1px"]["theme"]["dark"];
		$width = "37";
		$margin = "10";
	}

	$censor_names = False;

	$border_color = $website["style"]["border_color"];

	# Get chapter comments
	if (file_exists($comments_folder) == True) {
		# Add hr (line) to additional_elements key
		$chapter_tab["additional_elements"] .= "\n"."\t".'<!-- Chapter comments for chapter "'.$chapter_tab["chapter_title"].'" -->'."\n";

		if (file_exists($reads_folder) == True) {
			$chapter_tab["additional_elements"] .= '<div style="position: relative; width: '.$width.'%; float: left; margin-left: '.$margin.'%;">';
		}

		# Define reader file
		$commentator_file = $comments_folder."Commentator.txt";
		$commentators = File::Contents($commentator_file)["lines"];

		$comment_file = $comments_folder.$website["language_texts"]["comment, title()"].".txt";
		$comments = File::Contents($comment_file)["lines"];

		# Define read date file
		$date_file = $comments_folder."Date.txt";
		$dates = File::Contents($date_file)["lines"];

		$text = HTML::Element("b", $website["language_texts"]["comment, title()"].": ", "", "margin_top_bottom_2_cent");

		if (count($comments) > 1) {
			$text = HTML::Element("b", $website["language_texts"]["comment, title()"]." (".count($comments).")".": ", "", "margin_top_bottom_2_cent");
		}

		$h3 = "\t".HTML::Element("h3", "\n\t\t".$text."\n\t", "", "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_5_cent margin_top_bottom_3_cent").'<br class="mobile_inline_block" />'."\n\n";

		$chapter_tab["additional_elements"] .= $h3;

		$c = 0;
		foreach ($commentators as $commentator) {
			$date = $dates[$c];
			$comment = $comments[$c];

			if ($censor_names == False) {
				$text = HTML::Element("b", $commentator);
			}

			if ($censor_names == True) {
				$text = HTML::Element("b", Language::Item(["en" => "Anonymous commentator", "pt" => "Comentador anônimo"])." ".($c + 1));
			}

			$text = '<br class="mobile_inline_block" />'.$text;
			$text .= "<br />";
			$text .= HTML::Element("b", $website["language_texts"]["in, title()"]).": ".date("H:i d/m/Y", strtotime($date));
			$text .= "<br />"."<br />";
			$text .= $comment;
			$text .= '<br class="mobile_inline_block" />'.'<br class="mobile_inline_block" />';

			$h4 = "\n"."\t\t".HTML::Element("h4", "\n\t\t\t".$text."\n\t\t", 'style="text-align: left;"', "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_10_cent")."\n";

			$div = "\t".'<!-- Chapter read number '.($c + 1).' -->'."\n".
			"\t".HTML::Element("div", $h4."\t", 'style="width: 33%;"', $website["style"]["background"]["theme"]["light"]." ".$website["style"]["border_4px"]["theme"]["dark"]." ".$website["style"]["box_shadow"]["theme"][$border_color]." border_radius_50px");

			if (file_exists($reads_folder) == True) {
				$div = str_replace("33%", "100%", $div);
			}

			$chapter_tab["additional_elements"] .= $div;

			if ($commentator != array_reverse($commentators)[0]) {
				$chapter_tab["additional_elements"] .= "\n\n\t"."<br />"."\n\n";
			}

			$c++;
		}

		if (file_exists($reads_folder) == True) {
			$chapter_tab["additional_elements"] .= "</div>";
		}
	}

	# Get chapter reads
	if (file_exists($story["folders"]["Readers and Reads"]["Reads"].$chapter_tab["number_leading_zeroes"]."/") == True) {
		$reads_folder = $story["folders"]["Readers and Reads"]["Reads"].$chapter_tab["number_leading_zeroes"]."/";

		# Add hr (line) to additional_elements key
		$chapter_tab["additional_elements"] .= "\n"."\t".'<!-- Chapter reads for chapter "'.$chapter_tab["chapter_title"].'" -->'."\n";

		if (file_exists($comments_folder) == True) {
			$chapter_tab["additional_elements"] .= '<div style="position: relative; width: '.$width.'%; float: right; margin-right: '.$margin.'%;">';
		}

		# Define reader file
		$reader_file = $reads_folder."Reader.txt";
		$readers = File::Contents($reader_file)["lines"];

		# Define read date file
		$read_date_file = $reads_folder."Read date.txt";
		$read_dates = File::Contents($read_date_file)["lines"];

		$text = HTML::Element("b", $website["language_texts"]["read, title()"].": ", "", "margin_top_bottom_2_cent");

		if (count($readers) > 1) {
			$text = HTML::Element("b", $website["language_texts"]["reads, title()"]." (".count($readers).")".": ", "", "margin_top_bottom_2_cent");
		}

		$h3 = "\t".HTML::Element("h3", "\n\t\t".$text."\n\t", "", "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_5_cent margin_top_bottom_3_cent").'<br class="mobile_inline_block" />'."\n\n";

		$chapter_tab["additional_elements"] .= $h3;

		$r = 0;
		foreach ($readers as $reader) {
			$read_date = $read_dates[$r];

			if ($censor_names == False) {
				$text = HTML::Element("b", $reader);
			}

			if ($censor_names == True) {
				$text = HTML::Element("b", Language::Item(["en" => "Anonymous reader", "pt" => "Leitor anônimo"])." ".($r + 1));
			}

			$text = '<br class="mobile_inline_block" />'.$text;
			$text .= "<br />";
			$text .= HTML::Element("b", $website["language_texts"]["in, title()"]).": ".date("H:i d/m/Y", strtotime($read_date));
			$text .= '<br class="mobile_inline_block" />'.'<br class="mobile_inline_block" />';

			$h4 = "\n"."\t\t".HTML::Element("h4", "\n\t\t\t".$text."\n\t\t", 'style="text-align: left;"', "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_10_cent margin_top_bottom_2_cent")."\n";

			$div = "\t".'<!-- Chapter read number '.($r + 1).' -->'."\n".
			"\t".HTML::Element("div", $h4."\t", 'style="width: 33%;"', $website["style"]["background"]["theme"]["light"]." ".$website["style"]["border_4px"]["theme"]["dark"]." ".$website["style"]["box_shadow"]["theme"][$border_color]." border_radius_50px");

			if (file_exists($comments_folder) == True) {
				$div = str_replace("33%", "100%", $div);
			}

			$chapter_tab["additional_elements"] .= $div;

			if ($reader != array_reverse($readers)[0]) {
				$chapter_tab["additional_elements"] .= "\n\n\t"."<br />"."\n\n";
			}

			$r++;
		}

		if (file_exists($comments_folder) == True) {
			$chapter_tab["additional_elements"] .= "</div>";
		}
	}

	if (file_exists($comments_folder) == True and file_exists($reads_folder) == True) {
		if (count($commentators) <= 1) {
			$chapter_tab["padding"] = "50vh";
		}

		if (count($commentators) > 1) {
			$chapter_tab["padding"] = "calc(30vh + 1".(count($readers) + count($commentators))."vh)";
		}
	}

	if (isset($chapter_tab["additional_elements"]) == True) {
		if (file_exists($reads_folder) == True) {
			foreach ($readers as $reader) {
				$chapter_tab["additional_elements"] .= "<br /><br />\n";
			}
		}

		$chapter_tab["additional_elements"] .= "<br />\n";
	}

	# Create chapter tab
	$tpl -> assign("website", $website);
	$tpl -> assign("chapter_tab", $chapter_tab);
	$story["chapters"] .= $tpl -> draw("Story/Chapter", True);

	if ($chapter_title != array_reverse($chapter_titles)[0]) {
		$story["chapters"] .= "\n\n";
	}

	$i++;
}

$story["chapters"] .= "\n\n";

?>