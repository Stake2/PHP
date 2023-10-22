<?php 

# Story.php

class Story extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> folders = $folders;
	}

	public function Chapter_Button($chapter_number, $chapter_title, $options = ["previous" => False, "next" => False, "text" => ""]) {
		global $website;

		$chapter_id = "chapter_".$chapter_number;

		$add = "";
		$comment = '<!-- Chapter button for "'.$chapter_number." - ".$chapter_title.'" chapter -->';
		$text = $chapter_number." - ".$chapter_title;

		if ($options["previous"] != False) {
			$add = " float: left;";
			$comment = '<!-- Chapter button for previous chapter -->';
		}

		if ($options["next"] != False) {
			$add = " float: right;";
			$comment = '<!-- Chapter button for next chapter -->';
		}

		if ($options["text"] != "") {
			$text = $options["text"];
		}

		if (isset($options["text_class"]) == False) {
			$options["text_class"] = $website["style"]["text"]["theme"]["dark"];
		}

		if (isset($options["button_class"]) == False) {
			$options["button_class"] = $website["style"]["button"]["theme"]["light"];
		}

		# Create chapter button
		$h3 = HTML::Element("h3", "\n\t\t\t\t".$text."\n\t\t\t", 'style="font-weight: bold;"', "text_size ".$options["text_class"])."\n";

		$chapter_button = "\t".$comment."\n".
		"\t\t".HTML::Element("button", "\n\t\t\t".$h3."\t\t", 'onclick="Open_Chapter(\''.$chapter_number.'\', \''.$chapter_title.'\');" style="border-radius: 50px;'.$add.'"', "w3-btn ".$options["button_class"]);

		return $chapter_button;
	}

	public function Replace_Text($chapter_text) {
		global $website;

		$i = 0;
		foreach ($website["text_replacer"]["replace"] as $replace) {
			$with = $website["text_replacer"]["with"][$i];

			$chapter_text = str_replace($replace, $with, $chapter_text);

			$i++;
		}

		return $chapter_text;
	}

	public function Chapter_Text() {
		global $File;
		global $Folder;
		global $website;
		global $story;
		global $full_language;
		global $chapter_tab;

		if (isset($website["data"]["json"]["story"]) == False) {
			$root_variables_folder = $story["Folders"]["Chapters"]["root"].$website["texts"]["variables, title()"]["en"]."/";
			$Folder -> Create($root_variables_folder);

			$root_variables_file = $root_variables_folder.$chapter_tab["number_leading_zeroes"].".txt";

			$language_variables_folder = $story["Folders"]["Chapters"][$full_language]["root"].$website["language_texts"]["variables, title()"]."/";
			$Folder -> Create($language_variables_folder);

			$language_variables_file = $language_variables_folder.$chapter_tab["number_leading_zeroes"].".txt";
		}

		# Define chapter file
		$chapter_file = $story["Folders"]["Chapters"][$full_language]["root"].$chapter_tab["chapter_title_file"].".txt";

		$chapter_contents = $File -> Contents($chapter_file, $add_br = False);
		$chapter_text = $chapter_contents["string"];
		$original_text = $chapter_text;

		# Define chapter text without Insert_Variables
		$chapter_text = str_replace("\n", "<br />\n\t\t", $chapter_text);

		# Run the Insert_Variables method to insert variables in chapter text
		if (isset($website["data"]["json"]["story"]) == False) {
			if (file_exists($root_variables_file) == True) {
				$root_variables_contents = $File -> Contents($root_variables_file, $add_br = True);

				# Iterate through the root variables contents lines
				$i = 0;
				foreach ($root_variables_contents["lines"] as $line) {
					# If the line contains a variable, insert the variable into the normal chapter text line
					if (str_contains($line, "{\$") == True) {
						$chapter_contents["lines"][$i] = Text::Insert_Variable($root_variables_contents["lines"][$i]);
					}

					$i++;
				}
			}

			if (file_exists($language_variables_file) == True) {
				$language_variables_contents = $File -> Contents($language_variables_file, $add_br = True);

				# Iterate through the language variables contents lines
				$i = 0;
				foreach ($language_variables_contents["lines"] as $line) {
					# If the line contains a variable, insert the variable into the normal chapter text line
					if (str_contains($line, "{\$") == True) {
						$chapter_contents["lines"][$i] = Text::Insert_Variable($language_variables_contents["lines"][$i]);
					}

					$i++;
				}
			}

			# Remake the chapter contents string from the lines array
			$chapter_text = Text::From_Array($chapter_contents["lines"], $format = "", $enumerate = False, $number_class = "", $class = "", $add_br = True, $add_n = True);
		}

		$chapter_text = Linkfy($chapter_text);

		if (isset($website["data"]["json"]["chapter_text_replacer"]) == True) {
			$chapter_text = $this -> Replace_Text($chapter_text);
		}

		if (
			isset($website["data"]["json"]["story"]) == False and
			file_exists($root_variables_file) == False and file_exists($language_variables_file) == False and
			str_contains($chapter_contents["string"], "<") == True
		) {
			$chapter_contents["string"] = htmlentities($chapter_contents["string"]);
		}

		return array(
			"Text" => $chapter_text,
			"Text backup" => $original_text,
			"Lines" => $chapter_contents["length"]
		);
	}

	public function Chapter_Cover() {
		global $website;
		global $full_language;
		global $chapter_tab;
		global $i;

		if (isset($website["data"]["folders"]["local_website"]["images"]["story_covers"])) {
			$chapter_cover_file_name = $full_language."/".Text::Chapter_Cover_Folder($i)."/".Text::Add_Leading_Zeroes($i);

			$image_format = "";

			$formats = [
				"png",
				"jpg",
				"jpeg",
				"gif"
			];

			foreach ($formats as $format) {
				$local_image = $website["data"]["folders"]["local_website"]["images"]["story_covers"]["root"].$chapter_cover_file_name.".".$format;

				if (file_exists($local_image) == True) {
					$local_chapter_cover = $local_image;

					$image_format = $format;
				}
			}

			$remote_chapter_cover = $website["data"]["folders"]["website"]["images"]["story_covers"]["root"].$chapter_cover_file_name.".".$image_format;
		}

		else {
			$local_chapter_cover = "";

			$remote_chapter_cover = "";
		}

		if (file_exists($local_chapter_cover) == True) {
			$chapter_tab["comment"] = str_replace("button", "button, image,", $chapter_tab["comment"]);

			$chapter_cover = "<br />"."<!-- Chapter cover image -->"."\n".
			"\t\t"."<center>"."\n".
			"\t\t\t".HTML::Element("img", "", 'id="chapter_cover_'.$i.'" src="'.$remote_chapter_cover.'"', $website["style"]["box_shadow"]["theme"]["dark"]." ".$website["style"]["img"]["theme"]["light"])."\n\t\t"."</center>"."\n".
			"\t\t"."<br />\n\n";
		}

		else {
			$chapter_cover = "<br />"."<br />";
		}

		return $chapter_cover;
	}

	public function Get_Chapter_Comments($comments_folder) {
		global $File;
		global $website;
		global $chapter_tab;
		global $width;
		global $margin;
		global $reads_folder;
		global $censor_names;
		global $border_color;
		global $commentators;

		# Add hr (line) to additional_elements key
		$comments_string = "\n"."\t".'<!-- Chapter comments for chapter "'.$chapter_tab["chapter_title"].'" -->'."\n";

		if (file_exists($reads_folder) == True) {
			$comments_string .= '<div style="position: relative; width: '.$width.'%; float: left; margin-left: '.$margin.'%;">';
		}

		# Define reader file
		$commentator_file = $comments_folder."Commentator.txt";
		$commentators = $File -> Contents($commentator_file)["lines"];

		$comment_file = $comments_folder.$website["language_texts"]["comment, title()"].".txt";
		$comments = $File -> Contents($comment_file)["lines"];

		# Define read date file
		$date_file = $comments_folder."Date.txt";
		$dates = $File -> Contents($date_file)["lines"];

		$text = HTML::Element("b", $website["language_texts"]["comment, title()"].": ", "", "margin_top_bottom_2_cent");

		if (count($comments) > 1) {
			$text = HTML::Element("b", $website["language_texts"]["comment, title()"]." (".count($comments).")".": ", "", "margin_top_bottom_2_cent");
		}

		$h3 = "\t".HTML::Element("h3", "\n\t\t".$text."\n\t", "", "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_5_cent margin_top_bottom_3_cent").'<br class="mobile_inline_block" />'."\n\n";

		$comments_string .= $h3;

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

			$comments_string .= $div;

			if ($commentator != array_reverse($commentators)[0]) {
				$comments_string .= "\n\n\t"."<br />"."\n\n";
			}

			$c++;
		}

		if (file_exists($reads_folder) == True) {
			$comments_string .= "</div>";
		}

		return $comments_string;
	}

	public function Get_Chapter_Reads($reads_folder) {
		global $File;
		global $website;
		global $chapter_tab;
		global $width;
		global $margin;
		global $comments_folder;
		global $censor_names;
		global $border_color;
		global $readers;

		# Add hr (line) to additional_elements key
		$reads = "\n"."\t".'<!-- Chapter reads for chapter "'.$chapter_tab["chapter_title"].'" -->'."\n";

		if (file_exists($comments_folder) == True) {
			$reads .= '<div style="position: relative; width: '.$width.'%; float: right; margin-right: '.$margin.'%;">';
		}

		# Define reader file
		$reader_file = $reads_folder."Reader.txt";
		$readers = $File -> Contents($reader_file)["lines"];

		# Define read date file
		$read_date_file = $reads_folder."Read date.txt";
		$read_dates = $File -> Contents($read_date_file)["lines"];

		$text = HTML::Element("b", $website["language_texts"]["read, title()"].": ", "", "margin_top_bottom_2_cent");

		if (count($readers) > 1) {
			$text = HTML::Element("b", $website["language_texts"]["reads, title()"]." (".count($readers).")".": ", "", "margin_top_bottom_2_cent");
		}

		$h3 = "\t".HTML::Element("h3", "\n\t\t".$text."\n\t", "", "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_5_cent margin_top_bottom_3_cent").'<br class="mobile_inline_block" />'."\n\n";

		$reads .= $h3;

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

			$reads .= $div;

			if ($reader != array_reverse($readers)[0]) {
				$reads .= "\n\n\t"."<br />"."\n\n";
			}

			$r++;
		}

		if (file_exists($comments_folder) == True) {
			$reads .= "</div>";
		}

		return $reads;
	}

	public function Comment_And_Read_Buttons() {
		global $website;
		global $chapter_tab;

		# Create "Comment" button
		$text = HTML::Element("h3", "\n\t\t".$website["language_texts"]["to_comment"].": ".$website["icons"]["comment"]."\n\t\t", ' style="font-weight: bold;"', "text_size ".$website["style"]["text"]["theme"]["dark"])."\n";

		$buttons = "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", 'onclick="Open_Modal(\'comment\', \''.$chapter_tab["chapter_title"].'\')" style="float: right; margin-right: 1%;"', "w3-btn ".$website["style"]["button"]["theme"]["light"]);

		# Create "I read the chapter" button
		$text = HTML::Element("h3", "\n\t\t".$website["language_texts"]["i_read"].": ".$website["icons"]["check"]." ".$website["icons"]["reader"]."\n\t\t", 'style="font-weight: bold;"', "text_size ".$website["style"]["text"]["theme"]["dark"])."\n";

		$buttons .= "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", 'onclick="Open_Modal(\'read\', \''.$chapter_tab["chapter_title"].'\')" style="float: right; margin-right: 1%;"', "w3-btn ".$website["style"]["button"]["theme"]["light"]);

		return $buttons;
	}

	public function Top_And_Bottom_Buttons() {
		global $website;
		global $chapter_tab;
		global $chapter_titles;
		global $i;

		# Add previous chapter button if chapter is not the first one
		if ($i != 1) {
			$c = $i - 1;

			$options = [
				"previous" => True,
				"next" => False,
				"text" => $website["icons"]["arrow_left"],
			];

			$chapter_tab["top_button"] .= "\n\n\t".$this -> Chapter_Button($c, $chapter_titles[$i - 1], $options);
			$chapter_tab["bottom_button"] .= "\n\n\t".$this -> Chapter_Button($c, $chapter_titles[$i - 1], $options);
		}

		# Add next chapter button if chapter is not the last one
		if ($i != count($chapter_titles)) {
			$c = $i + 1;

			$options = [
				"previous" => False,
				"next" => True,
				"text" => $website["icons"]["arrow_right"],
			];

			$chapter_tab["top_button"] .= "\n\n\t".$this -> Chapter_Button($c, $chapter_titles[$i - 1], $options);
			$chapter_tab["bottom_button"] .= "\n\n\t".$this -> Chapter_Button($c, $chapter_titles[$i - 1], $options);
		}

		# Create comment and read buttons
		$chapter_tab["bottom_button"] .= $this -> Comment_And_Read_Buttons();

		$chapter_tab["top_button"] .= "\n";
		$chapter_tab["bottom_button"] .= "\n";
	}

	public function Chapter_Tab() {
		global $Folder;
		global $website;
		global $story;
		global $full_language;
		global $language;
		global $chapter_title;
		global $chapter_titles;
		global $chapter_tab;
		global $commentators;
		global $readers;
		global $comments_folder;
		global $reads_folder;
		global $width;
		global $margin;
		global $i;
		global $parse;

		# Paint story and chapter titles
		$color = $website["style"]["text"]["secondary_theme"]["normal"];

		if (isset($website["style"]["text_highlight"]) == True) {
			$color = $website["style"]["text_highlight"];
		}

		$painted_story_title = HTML::Element("span", $website["data"]["titles"]["language"], "", $color);
		$painted_chapter_title = HTML::Element("span", $i." - ".$chapter_title, 'id="chapter_'.$i.'_title"', $color);

		# Define chapter tab array
		$chapter_tab = [
			"number" => $i,
			"number_leading_zeroes" => Text::Add_Leading_Zeroes($i),
			"id" => "chapter_".$i,
			"chapter_title" => $i." - ".$chapter_title,
			"chapter_title_file" => Text::Add_Leading_Zeroes($i)." - ".$Folder -> Sanitize($chapter_title),
			"you_are_reading" => Text::Format($website["language_texts"]["you_are_reading_{}_chapter_{}"], [$painted_story_title, $painted_chapter_title]),
			"you_read" => Text::Format($website["language_texts"]["you_just_read_{}_chapter_{}"], [$painted_story_title, $painted_chapter_title]),
			"class" => $website["style"]["tab"]["theme_dark"],
			"chapter_text_color" => "",
			"top_button" => "",
			"bottom_button" => "",
			"chapter_text" => "",
			"comment" => "<!-- Chapter button and text -->"."\n",
			"padding" => "2px"
		];

		if (isset($website["data"]["json"]["story"]) == True) {
			$chapter_tab["chapter_title_file"] = $Folder -> Sanitize($chapter_title);
		}

		# Create chapter button
		$chapter_button = "\n\t\t".$this -> Chapter_Button($i, $chapter_title);

		# Add chapter button to chapter buttons string
		$story["chapter_buttons"] .= $chapter_button;

		if ($chapter_title != array_reverse($chapter_titles)[0]) {
			$story["chapter_buttons"] .= "\n";
		}

		# Get chapter text
		$array = $this -> Chapter_Text();

		$chapter_tab["chapter_text"] = $array["Text"]."\n";

		if (isset($website["style"]["chapter_text_color"]) == True) {
			$chapter_tab["chapter_text_color"] = " text_".$website["style"]["chapter_text_color"];
		}

		$words = number_format(str_word_count($chapter_tab["chapter_text"]));

		# Check the chapter dates
		if (
			$story["Information"]["Chapters"]["Dates"] != []
		) {
			if (isset($story["Information"]["Chapters"]["Dates"][$i - 1]) == True) {
				$date = $story["Information"]["Chapters"]["Dates"][$i - 1];

				$format = "date_format";

				if (strstr($date, ":") == True) {
					$format = "date_time_format";
				}

				$date = Date::Now($date, $website["texts"][$format]["pt"])[$website["language_texts"][$format]];

				$chapter_tab["chapter_text"] .= "\t\t"."<br />"."<br />"."\n".
				"\t\t".$website["language_texts"]["chapter_written_in"].": ".$date."<br />"."\n";
			}
		}

		else {
			$chapter_tab["chapter_text"] .= "<br />"."<br />"."\n";
		}

		# Add a text area to write the chapter
		if ($parse != "/generate") {
			$border_and_text_class = $website["data"]["style"]["background"]["theme"]["light"]." ".$website["data"]["style"]["text"]["theme"]["dark"];

			$class = $border_and_text_class." ".$website["style"]["border_4px"]["theme"]["dark"];

			$style = "width: 100%; border: none; overflow: hidden; resize: none;";

			$h2 = HTML::Element("h2", "<p><br /><b>".$website["language_texts"]["edit, title()"].":"."</b><br /><br /><p>", "", $chapter_tab["chapter_text_color"])."\n";

			$title = "<center>".$h2."</center>";

			$rows = $array["Lines"] + ($array["Lines"] / 3) - 90;

			$text = str_replace("<br />", "", $array["Text backup"]);

			$textarea_class = 'class="'.$border_and_text_class;

			if ($chapter_tab["chapter_text_color"] != "") {
				$textarea_class .= " ".$chapter_tab["chapter_text_color"];
			}

			$textarea_class .= '"';

			$chapter_tab["chapter_text"] .= "<br />".
			'<div class="'.$class.'" style="border-radius: 40px;">'."\n".
			$title."\n".
			"\t".'<div style="margin: 3%;">'."\n".
			$website["elements"]["hr_1px_no_margin"]["theme"]["dark"]."\n".
			"\t\t".'<textarea '.$textarea_class.' style="'.$style.'" rows="'.$rows.'">'."\n".
			$text.
			"</textarea>"."\n".
			"\t"."</div>"."\n".
			"</div>"."\n".
			$website["elements"]["hr_1px_no_margin"]["theme"]["dark"]."\n".
			"<br />"."\n".
			"<br />";

			// Add script to resize textarea
			$chapter_tab["chapter_text"] .= "<script>".'
			$(function() {
				$("textarea").each(function() {
					if (this.scrollHeight > this.clientHeight) {
						this.style.height = this.scrollHeight + "px"
					}
				});
			});
			</script>';
		}

		$chapter_tab["chapter_text"] .= "\t\t".$website["language_texts"]["words, title()"].": ".$words."<br />"."<br />"."\n";

		# Define chapter cover
		$chapter_tab["chapter_cover"] = $this -> Chapter_Cover();

		# Create top and buttom previous and next chapter, comment and read buttons
		$this -> Top_And_Bottom_Buttons();

		# HTML comment for buttons, text, and image
		if ($i != 1 and $i != count($chapter_titles)) {
			$chapter_tab["comment"] = str_replace("button", "buttons", $chapter_tab["comment"]);
		}

		$comments_folder = $story["Folders"]["Comments"]["Chapter"].$chapter_tab["number_leading_zeroes"]."/";
		$reads_folder = $story["Folders"]["Readers and Reads"]["Reads"].$chapter_tab["number_leading_zeroes"]."/";

		if (file_exists($comments_folder) == True or file_exists($reads_folder) == True) {
			$chapter_tab["additional_elements"] = $website["elements"]["hr_1px"]["theme"]["dark"];
			$width = "37";
			$margin = "10";
		}

		$censor_names = False;

		$border_color = $website["style"]["border_color"];

		if (file_exists($comments_folder) == True) {
			# Get chapter comments
			$comments = $this -> Get_Chapter_Comments($comments_folder);

			# Add chapter comments to additional_elements key
			$chapter_tab["additional_elements"] .= $comments;
		}

		if (file_exists($reads_folder) == True) {
			# Get chapter reads
			$reads = $this -> Get_Chapter_Reads($reads_folder);

			# Add chapter reads to additional_elements key
			$chapter_tab["additional_elements"] .= $reads;
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

		return $chapter_tab;
	}

	public function Chapter_Tabs($chapter_titles) {
		global $website;
		global $story;
		global $full_language;
		global $language;
		global $tpl;
		global $i;
		global $chapter_title;

		# Generate chapter tabs
		$i = 1;
		foreach ($chapter_titles as $chapter_title) {
			# Generate
			$chapter_tab = $this -> Chapter_Tab($chapter_title, $i);

			# Add chapter tab to story array
			$tpl -> assign("website", $website);
			$tpl -> assign("chapter_tab", $chapter_tab);
			$story["chapters"] .= $tpl -> draw("Story/Chapter", True);

			if ($chapter_title != array_reverse($chapter_titles)[0]) {
				$story["chapters"] .= "\n\n";
			}

			$i++;
		}
	}
}

?>