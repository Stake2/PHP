<?php 

# Story.php

class Story extends Class_ {
	public function __construct() {
		parent::__construct(self::class);
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
			$options["text_class"] = $website["Style"]["text"]["theme"]["dark"];
		}

		if (isset($options["button_class"]) == False) {
			$options["button_class"] = $website["Style"]["button"]["theme"]["light"];
		}

		# Create the chapter button
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
		global $Text;
		global $website;
		global $variable_inserter;
		global $story;
		global $full_language;
		global $chapter_tab;

		if (isset($website["Data"]["JSON"]["story"]) == False) {
			$root_variables_folder = $story["Folders"]["Chapters"]["root"].$website["Language texts (Module language)"]["variables, title()"]."/";
			$Folder -> Create($root_variables_folder);

			$root_variables_file = $root_variables_folder.$chapter_tab["number_leading_zeroes"].".txt";

			$language_variables_folder = $story["Folders"]["Chapters"][$full_language]["root"].$website["Language texts"]["variables, title()"]."/";
			$Folder -> Create($language_variables_folder);

			$language_variables_file = $language_variables_folder.$chapter_tab["number_leading_zeroes"].".txt";
		}

		# Define the chapter file
		$chapter_file = $story["Folders"]["Chapters"][$full_language]["root"].$chapter_tab["chapter_title_file"].".txt";

		if (
			$website["States"]["Story"]["New chapter"] == False or
			$website["States"]["Story"]["New chapter"] == True and
			$chapter_tab["number"] != (int)$_GET["chapter"]
		) {
			$chapter_contents = $File -> Contents($chapter_file, $add_br = False);
		}

		if (
			$website["States"]["Story"]["New chapter"] == True and
			$chapter_tab["number"] == (int)$_GET["chapter"]
		) {
			$chapter_contents = [
				"string" => "",
				"lines" => [],
				"length" => 0
			];
		}

		$chapter_text = $chapter_contents["string"];

		$original_text = $chapter_text;

		# Define chapter text without Insert_Variable
		$chapter_text = str_replace("\n", "<br />\n\t\t", $chapter_text);

		# Run the "Insert_Variable" method to insert variables in chapter text
		if (isset($website["Data"]["JSON"]["story"]) == False) {
			if (file_exists($root_variables_file) == True) {
				$root_variables_contents = $File -> Contents($root_variables_file, $add_br = True);

				# Iterate through the root variables contents lines
				$i = 0;
				foreach ($root_variables_contents["lines"] as $line) {
					# If the line contains a variable, insert the variable into the normal chapter text line
					if (str_contains($line, "{\$") == True) {
						$chapter_contents["lines"][$i] = $Text -> Insert_Variable($root_variables_contents["lines"][$i], $variable_inserter);
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
						$chapter_contents["lines"][$i] = $Text -> Insert_Variable($language_variables_contents["lines"][$i], $variable_inserter);
					}

					$i++;
				}
			}

			# Remake the chapter contents string from the lines array
			$chapter_text = Text::From_Array($chapter_contents["lines"], $format = "", $enumerate = False, $number_class = "", $class = "", $add_br = True, $add_n = True);
		}

		$chapter_text = Linkfy($chapter_text);

		if (isset($website["Data"]["JSON"]["chapter_text_replacer"]) == True) {
			$chapter_text = $this -> Replace_Text($chapter_text);
		}

		if (
			isset($website["Data"]["JSON"]["story"]) == False and
			file_exists($root_variables_file) == False and
			file_exists($language_variables_file) == False and
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
		global $parse;
		global $folders;

		$local_chapter_cover = "";

		if (
			$website["States"]["Website"]["Generate"] == True or
			isset($_GET["show_chapter_covers"]) == True
		) {
			$chapter_cover_file_name = $full_language;

			$image_format = "";

			# Define the local and remote folderes
			$local_chapter_folder = $website["Data"]["Folders"]["Website"]["Images"]["Local"]["Chapters"]["root"];
			$remote_chapter_folder = $website["Data"]["Folders"]["Website"]["Images"]["Remote"]["Chapters"]["root"];

			# Define the chapter folder
			$chapter_folder = Text::Add_Leading_Zeroes($i)."/";

			# Add the chapter folder to the local and remote cover image Folders
			$local_chapter_folder .= $chapter_folder;
			$remote_chapter_folder .= $chapter_folder;

			foreach ($website["Image formats"] as $format) {
				$local_chapter_cover = $local_chapter_folder.$chapter_cover_file_name.".".$format;

				if (file_exists($local_chapter_cover) == True) {
					$image_format = $format;
				}
			}

			# Replace remote folder with the local PHP images folder
			# To test if the images appear correctly
			if ($website["States"]["Website"]["Generate"] == False) {
				$php_folder = "Images/".$website["Data"]["title"]."/";

				$remote_folder = "/".$php_folder;

				$remote_chapter_folder = str_replace($website["Data"]["Folders"]["Website"]["Images"]["Remote"]["root"], $remote_folder, $remote_chapter_folder);
			}

			$remote_chapter_cover = $remote_chapter_folder.$chapter_cover_file_name.".".$image_format;

			if (file_exists($local_chapter_cover) == False) {
				$local_chapter_cover = "";
			}
		}

		else {
			$local_chapter_cover = "";

			$remote_chapter_cover = "";
		}

		if ($local_chapter_cover != "") {
			$chapter_tab["comment"] = str_replace("button", "button, image,", $chapter_tab["comment"]);

			$chapter_cover = "<br />"."<!-- Chapter cover image -->"."\n".
			"\t\t"."<center>"."\n".
			"\t\t\t".HTML::Element("img", "", 'id="chapter_cover_'.$i.'" src="'.$remote_chapter_cover.'"', $website["Style"]["box_shadow"]["theme"]["dark"]." ".$website["Style"]["img"]["theme"]["light"])."\n\t\t"."</center>"."\n".
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

		$comment_file = $comments_folder.$website["Language texts"]["comment, title()"].".txt";
		$comments = $File -> Contents($comment_file)["lines"];

		# Define read date file
		$date_file = $comments_folder."Date.txt";
		$dates = $File -> Contents($date_file)["lines"];

		$text = HTML::Element("b", $website["Language texts"]["comment, title()"].": ", "", "margin_top_bottom_2_cent");

		if (count($comments) > 1) {
			$text = HTML::Element("b", $website["Language texts"]["comment, title()"]." (".count($comments).")".": ", "", "margin_top_bottom_2_cent");
		}

		$h3 = "\t".HTML::Element("h3", "\n\t\t".$text."\n\t", "", "text_size ".$website["Style"]["text"]["theme"]["dark"]." margin_sides_5_cent margin_top_bottom_3_cent").'<br class="mobile_inline_block" />'."\n\n";

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
			$text .= HTML::Element("b", $website["Language texts"]["in, title()"]).": ".date("H:i d/m/Y", strtotime($date));
			$text .= "<br />"."<br />";
			$text .= $comment;
			$text .= '<br class="mobile_inline_block" />'.'<br class="mobile_inline_block" />';

			$h4 = "\n"."\t\t".HTML::Element("h4", "\n\t\t\t".$text."\n\t\t", 'style="text-align: left;"', "text_size ".$website["Style"]["text"]["theme"]["dark"]." margin_sides_10_cent")."\n";

			$div = "\t".'<!-- Chapter read number '.($c + 1).' -->'."\n".
			"\t".HTML::Element("div", $h4."\t", 'style="width: 33%;"', $website["Style"]["background"]["theme"]["light"]." ".$website["Style"]["border_4px"]["theme"]["dark"]." ".$website["Style"]["box_shadow"]["theme"][$border_color]." border_radius_50px");

			if (file_exists($reads_folder) == True) {
				$div = str_replace("33%", "100%", $div);
			}

			$comments_string .= $div;

			if ($commentator != end($commentators)) {
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
		$read_date_file = $reads_folder."Date.txt";
		$read_dates = $File -> Contents($read_date_file)["lines"];

		$text = HTML::Element("b", $website["Language texts"]["read, title()"].": ", "", "margin_top_bottom_2_cent");

		if (count($readers) > 1) {
			$text = HTML::Element("b", $website["Language texts"]["reads, title()"]." (".count($readers).")".": ", "", "margin_top_bottom_2_cent");
		}

		$h3 = "\t".HTML::Element("h3", "\n\t\t".$text."\n\t", "", "text_size ".$website["Style"]["text"]["theme"]["dark"]." margin_sides_5_cent margin_top_bottom_3_cent").'<br class="mobile_inline_block" />'."\n\n";

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
			$text .= HTML::Element("b", $website["Language texts"]["in, title()"]).": ".date("H:i d/m/Y", strtotime($read_date));
			$text .= '<br class="mobile_inline_block" />'.'<br class="mobile_inline_block" />';

			$h4 = "\n"."\t\t".HTML::Element("h4", "\n\t\t\t".$text."\n\t\t", 'style="text-align: left;"', "text_size ".$website["Style"]["text"]["theme"]["dark"]." margin_sides_10_cent margin_top_bottom_2_cent")."\n";

			$div = "\t".'<!-- Chapter read number '.($r + 1).' -->'."\n".
			"\t".HTML::Element("div", $h4."\t", 'style="width: 33%;"', $website["Style"]["background"]["theme"]["light"]." ".$website["Style"]["border_4px"]["theme"]["dark"]." ".$website["Style"]["box_shadow"]["theme"][$border_color]." border_radius_50px");

			if (file_exists($comments_folder) == True) {
				$div = str_replace("33%", "100%", $div);
			}

			$reads .= $div;

			if ($reader != end($readers)) {
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
		$text = HTML::Element("h3", "\n\t\t".$website["Language texts"]["to_comment"].": ".$website["Icons"]["comment"]."\n\t\t", ' style="font-weight: bold;"', "text_size ".$website["Style"]["text"]["theme"]["dark"])."\n";

		$buttons = "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", 'onclick="Open_Modal(\'comment\', \''.$chapter_tab["chapter_title"].'\')" style="float: right; margin-right: 1%;"', "w3-btn ".$website["Style"]["button"]["theme"]["light"]);

		# Create "I read the chapter" button
		$text = HTML::Element("h3", "\n\t\t".$website["Language texts"]["i_read"].": ".$website["Icons"]["check"]." ".$website["Icons"]["reader"]."\n\t\t", 'style="font-weight: bold;"', "text_size ".$website["Style"]["text"]["theme"]["dark"])."\n";

		$buttons .= "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", 'onclick="Open_Modal(\'read\', \''.$chapter_tab["chapter_title"].'\')" style="float: right; margin-right: 1%;"', "w3-btn ".$website["Style"]["button"]["theme"]["light"]);

		return $buttons;
	}

	public function Top_And_Bottom_Buttons() {
		global $website;
		global $chapter_tab;
		global $chapter_titles;
		global $i;

		# Define the previous chapter button if the chapter is not the first one
		if ($i != 1) {
			$c = $i - 1;

			$options = [
				"previous" => True,
				"next" => False,
				"text" => $website["Icons"]["arrow_left"]
			];

			$chapter_title = $chapter_titles[$i - 2];
		}

		# Define the previous button if the chapter is not the first one and not the last one
		if (
			$i != 1 and
			$i != count($chapter_titles)
		) {
			$second_c = $i - 1;

			$second_options = [
				"previous" => True,
				"next" => False,
				"text" => $website["Icons"]["arrow_left"]
			];

			$title = $chapter_titles[$i - 2];

			# Add top and bottom buttons
			$chapter_tab["top_button"] .= "\n\n\t".$this -> Chapter_Button($second_c, $title, $second_options);
			$chapter_tab["bottom_button"] .= "\n\n\t".$this -> Chapter_Button($second_c, $title, $second_options);
		}

		# Define the next chapter button if chapter is not the last one
		if ($i != count($chapter_titles)) {
			$c = $i + 1;

			$options = [
				"previous" => False,
				"next" => True,
				"text" => $website["Icons"]["arrow_right"]
			];

			$chapter_title = $chapter_titles[$i];
		}

		# Add the top and bottom buttons
		$chapter_tab["top_button"] .= "\n\n\t".$this -> Chapter_Button($c, $chapter_title, $options);
		$chapter_tab["bottom_button"] .= "\n\n\t".$this -> Chapter_Button($c, $chapter_title, $options);

		# Create the comment and read buttons
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
		$color = $website["Style"]["text"]["secondary_theme"]["normal"];

		if (isset($website["Style"]["text_highlight"]) == True) {
			$color = $website["Style"]["text_highlight"];
		}

		$painted_story_title = HTML::Element("span", $website["Data"]["titles"]["language"], "", $color);
		$painted_chapter_title = HTML::Element("span", $i." - ".$chapter_title, 'id="chapter_'.$i.'_title"', $color);

		# Define the "Chapter tab" dictionary
		$chapter_tab = [
			"number" => $i,
			"number_leading_zeroes" => Text::Add_Leading_Zeroes($i),
			"id" => "chapter_".$i,
			"chapter_title" => $i." - ".$chapter_title,
			"chapter_title_file" => Text::Add_Leading_Zeroes($i)." - ".$Folder -> Sanitize($chapter_title),
			"Dictionary" => [],
			"painted_chapter_title" => $painted_chapter_title,
			"you_are_reading" => "",
			"you_read" => "",
			"class" => $website["Style"]["tab"]["theme_dark"],
			"chapter_text_color" => "",
			"top_button" => "",
			"bottom_button" => "",
			"chapter_text" => "",
			"comment" => "<!-- Chapter button and text -->"."\n",
			"padding" => "2px",
			"style" => ""
		];

		# If the "write chapter" mode is off
		# Or it is on
		# And the current chapter is not the chapter the user wants to write
		if (
			$website["States"]["Story"]["Write"] == False or
			$website["States"]["Story"]["Write"] == True and
			$chapter_tab["number"] != (int)$_GET["chapter"]
		) {
			# Define the "you are reading" key
			$text_key = "you_are_reading_{}_chapter_{}";
			$second_text_key = "you_just_read_{}_chapter_{}";
		}

		# If the "Write chapter" mode is on
		if ($website["States"]["Story"]["Write"] == True) {
			# Define the "you are writing" key
			$text_key = "you_are_writing_{}_chapter_{}";
			$second_text_key = "you_just_wrote_{}_chapter_{}";
		}

		# Define the "you are reading" text with the defined text key
		$chapter_tab["you_are_reading"] = Text::Format($website["Language texts"][$text_key], [$painted_story_title, $painted_chapter_title]);

		# Define the "you just read" text with the defined text key
		$chapter_tab["you_read"] = Text::Format($website["Language texts"][$second_text_key], [$painted_story_title, $painted_chapter_title]);

		# If the chapter dictionary exists
		if (isset($story["Information"]["Chapters"]["Dictionary"][$i])) {
			# Get it
			$chapter_tab["Dictionary"] = $story["Information"]["Chapters"]["Dictionary"][$i];
		}

		# Else, create an empty chapter dictionary
		else {
			$chapter_tab["Dictionary"] = [
				"Dates" => [
					"Written" => "",
					"Revised" => "",
					"Translated" => ""
				]
			];
		}

		if (isset($website["Data"]["JSON"]["story"]) == True) {
			$chapter_tab["chapter_title_file"] = $Folder -> Sanitize($chapter_title);
		}

		# Create chapter button
		$chapter_button = "\n\t\t".$this -> Chapter_Button($i, $chapter_title);

		# Add chapter button to chapter buttons string
		$story["chapter_buttons"] .= $chapter_button;

		if ($chapter_title != end($chapter_titles)) {
			$story["chapter_buttons"] .= "\n";
		}

		# Get the chapter text
		$array = $this -> Chapter_Text();

		$chapter_tab["chapter_text"] = $array["Text"]."\n";

		if (isset($website["Style"]["chapter_text_color"]) == True) {
			$chapter_tab["chapter_text_color"] = " text_".$website["Style"]["chapter_text_color"];
		}

		# Define the "has dates" variable
		$has_dates = False;

		# Define the empty dates list
		$dates = [];

		# Define the list of date types
		$date_types = [
			"Written",
			"Revised",
			"Translated"
		];

		# Iterate through the list of date types
		foreach ($date_types as $date_type) {
			# If the date of the chapter dictionary is not an empty string
			if ($chapter_tab["Dictionary"]["Dates"][$date_type] != "") {
				# Get the date
				$date = $chapter_tab["Dictionary"]["Dates"][$date_type];

				# Get the date format
				$format = "date_format";

				if (str_contains($date, ":") == True) {
					$format = "date_time_format";
				}

				# Transform the date into a date dictionary with the correct format
				$date = Date::Now($date, $website["Texts"][$format]["pt"])[$website["Language texts"][$format]];

				# Define the text key for the text of the date type
				$text_key = "chapter_".strtolower($date_type)."_in";

				# Define the date text of the date type
				$date = "\t\t"."\n".
				$website["Language texts"][$text_key].":"."\n".
				"<br />"."\n".
				$date;

				# Add the date text to the "dates" list
				array_push($dates, $date);

				# Update the "has date" variable to True
				$has_dates = True;
			}
		}

		# If the list of dates is not empty
		if ($dates != []) {
			# Add two line breaks to the chapter text
			$chapter_tab["chapter_text"] .= "<br />"."<br />"."\n";
		}

		# Iterate through the dates inside the dates list
		foreach ($dates as $date) {
			# Add the date to the chapter text
			$chapter_tab["chapter_text"] .= $date;

			# If the date is not the last one
			if ($date != end($dates)) {
				# Add one line break to the chapter text
				$chapter_tab["chapter_text"] .= "<br />"."<br />"."\n";
			}
		}

		# If the "Write chapter" mode is off
		# Or it is on
		# And the current chapter is not the chapter the user wants to write
		# Or it is on
		# And the "New chapter" state is False
		if (
			$website["States"]["Story"]["Write"] == False or
			$website["States"]["Story"]["Write"] == True and
			$chapter_tab["number"] != (int)$_GET["chapter"] or
			$website["States"]["Story"]["Write"] == True and
			$website["States"]["Story"]["New chapter"] == False
		) {
			# Add two line breaks to the chapter text
			$chapter_tab["chapter_text"] .= "<br />"."<br />"."\n";

			# Get the words of the chapter
			$words = number_format(str_word_count($chapter_tab["chapter_text"]), 0, ".", ".");

			# Add the number of words with its text
			$chapter_tab["chapter_text"] .= "\t\t".$website["Language texts"]["words, title()"].":"."\n".
			"<br />"."\n".
			$words." ".strtolower($website["Language texts"]["words, title()"])."<br />"."<br />"."\n";
		}

		# Add a text area to write the chapter if the "write chapter" mode is on
		if ($website["States"]["Story"]["Write"] == True) {
			$chapter_tab["style"] = " width: 100%;";

			# Define the "write element" themes
			$themes = [
				"Story" => [
					"Background" => "normal",
					"Text" => "dark",
					"Border" => "light",
					"Theme" => "theme"
				],
				"Light" => [
					"Background" => "light",
					"Text" => "dark",
					"Border" => "dark",
					"Theme" => "theme"
				],
				"Light (secondary)" => [
					"Background" => "light",
					"Text" => "dark",
					"Border" => "light",
					"Theme" => "secondary_theme"
				],
				"Stylized" => [
					"Background" => "dark",
					"Text" => "light",
					"Border" => "light",
					"Theme" => "secondary_theme"
				]
			];

			# Select a theme
			#$theme = $themes["Story"];
			$theme = $themes["Light"];
			#$theme = $themes["Light (secondary)"];
			#$theme = $themes["Stylized"];

			$background_and_text_class = $website["Data"]["Style"]["background"]["theme"][$theme["Background"]]." ".$website["Data"]["Style"]["text"]["theme"][$theme["Text"]];

			$class = $background_and_text_class." ".$website["Style"]["box_shadow"][$theme["Theme"]]["dark"]." ".$website["Style"]["border_4px"][$theme["Theme"]][$theme["Border"]];

			$style = "width: 100%; height: 800px; border: none; overflow-y: hidden; resize: none;";

			$write_text = "<p><br /><b>".$website["Language texts"]["write, title()"].": ".$website["Icons"]["pen"]."<br />".
			$chapter_tab["chapter_title"]."</b><br /><br /><p>";

			$h2 = HTML::Element("h2", $write_text, "", $chapter_tab["chapter_text_color"])."\n";

			$title = "<center>".$h2."</center>";

			$text = str_replace("<br />", "", $array["Text backup"]);

			$textarea_class = 'class="'.$background_and_text_class;

			if ($chapter_tab["chapter_text_color"] != "") {
				$textarea_class .= " ".$chapter_tab["chapter_text_color"];
			}

			$textarea_class .= '"';

			$anchor = "chapter_write";

			$hr = $website["elements"]["hr_1px_no_margin"][$theme["Theme"]][$theme["Border"]];

			$chapter_tab["chapter_text"] .= "<!-- Text area to write the chapter, with the chapter text -->"."\n".
			"<br />"."\n".
			'<a id="'.$chapter_tab["id"].'_write_anchor"></a>'."\n".
			'<div id="'.$anchor.'" class="'.$class.'" style="border-radius: 40px;">'."\n".
			$title."\n".
			"\t".'<div style="margin: 3%;">'."\n".
			$hr."\n".
			"\t\t".'<textarea id="'.$chapter_tab["id"].'_write_textarea"'.$textarea_class.' style="'.$style.'" rows="100">'."\n".
			$text.
			"</textarea>"."\n".
			"\t"."</div>"."\n".
			"</div>"."\n".
			$hr."\n".
			"<br />"."\n".
			"<br />";
		}

		# Define chapter cover
		$chapter_tab["chapter_cover"] = $this -> Chapter_Cover();

		# Create top and buttom previous and next chapter, comment and read buttons
		$this -> Top_And_Bottom_Buttons();

		# HTML comment for buttons, text, and image
		if (
			$i != 1 and
			$i != count($chapter_titles)
		) {
			$chapter_tab["comment"] = str_replace("button", "buttons", $chapter_tab["comment"]);
		}

		$comments_folder = $story["Folders"]["Comments"]["root"].$chapter_tab["number_leading_zeroes"]."/";
		$reads_folder = $story["Folders"]["Readers"]["Reads"]["root"].$chapter_tab["number_leading_zeroes"]."/";

		if (
			file_exists($comments_folder) == True or
			file_exists($reads_folder) == True
		) {
			$chapter_tab["additional_elements"] = $website["elements"]["hr_1px"]["theme"]["dark"];

			$width = "37";
			$margin = "10";
		}

		$censor_names = False;

		$border_color = $website["Style"]["border_color"];

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

		if (
			file_exists($comments_folder) == True and
			file_exists($reads_folder) == True
		) {
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

		# Generate the chapter tabs
		$i = 1;

		foreach ($chapter_titles as $chapter_title) {
			# Generate the chapter tab
			$chapter_tab = $this -> Chapter_Tab($chapter_title, $i);

			# Add the chapter tab to the story array
			$tpl -> assign("website", $website);

			$tpl -> assign("chapter_tab", $chapter_tab);

			$story["chapters"] .= $tpl -> draw("Story/Chapter", True);

			if ($chapter_title != end($chapter_titles)) {
				$story["chapters"] .= "\n\n";
			}

			$i++;
		}
	}
}

?>