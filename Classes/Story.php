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
			$options["text_class"] = "";
		}

		if (isset($options["button_class"]) == False) {
			$options["button_class"] = $website["Style"]["button"]["theme"]["light"];
		}

		# Create the chapter button
		$h3 = HTML::Element("h3", "\n\t\t\t\t".$text."\n\t\t\t", 'style="font-weight: bold;"', "text_size")."\n";

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
			$root_variables_folder = $story["Folders"]["Chapters"]["root"].$website["Language texts (module language)"]["variables, title()"]."/";
			$Folder -> Create($root_variables_folder);

			$root_variables_file = $root_variables_folder.$chapter_tab["number_leading_zeroes"].".txt";

			$language_variables_folder = $story["Folders"]["Chapters"][$full_language]["root"].$website["Language texts"]["variables, title()"]."/";
			$Folder -> Create($language_variables_folder);

			$language_variables_file = $language_variables_folder.$chapter_tab["number_leading_zeroes"].".txt";
		}

		# Define the chapter file
		$chapter_file = $story["Folders"]["Chapters"][$full_language]["root"].$chapter_tab["chapter_title_file"].".txt";

		# If the "New chapter" state is False
		# Or it is True
		# And the current chapter is not the chapter the user wants to write
		if (
			$website["States"]["Story"]["New chapter"] == False or
			$website["States"]["Story"]["New chapter"] == True and
			$chapter_tab["number"] != (int)$_GET["chapter"]
		) {
			# Read the chapter file to get its contents
			$chapter_contents = $File -> Contents($chapter_file, $add_br = False);
		}

		# If the "New chapter" state is True
		# And the current chapter is the chapter the user wants to write
		if (
			$website["States"]["Story"]["New chapter"] == True and
			$chapter_tab["number"] == (int)$_GET["chapter"]
		) {
			# If the chapter file does not exist
			if ($File -> Exist($chapter_file) == False) {
				# Define a default chapter contents dictionary
				$chapter_contents = [
					"string" => "",
					"lines" => [],
					"length" => 0
				];
			}

			# If the chapter file exists
			else {
				# Read the chapter file to get its contents
				$chapter_contents = $File -> Contents($chapter_file, $add_br = False);
			}

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

		# Linkfy the chapter text
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

		# Define the chapter cover as an empty string
		$chapter_cover = "";

		# Define the local and remote chapter cover variables
		$local_chapter_cover = "";
		$remote_chapter_cover = "";

		# If the website "Generate" state is True
		# Or the "show_chapter_covers" URL parameter is present
		if (
			$website["States"]["Website"]["Generate"] == True or
			isset($_GET["show_chapter_covers"]) == True
		) {
			# Define the chapter cover file name as the full website language
			$chapter_cover_file_name = $full_language;

			# Define the root folder as the images folder of the website
			$root_folder = $website["Data"]["Folders"]["Website"]["Images"];

			# Define the local and remote folderes
			$local_chapter_folder = $root_folder["Local"]["Chapters"]["root"];
			$remote_chapter_folder = $root_folder["Remote"]["Chapters"]["root"];

			# Define the chapter folder
			$chapter_folder = Text::Add_Leading_Zeroes($i)."/";

			# Add the chapter folder to the local and remote cover image folders
			$local_chapter_folder .= $chapter_folder;
			$remote_chapter_folder .= $chapter_folder;

			# Define a variable to use the local or remote link
			$remote_link = False;

			# Define the image format as an empty string
			$image_format = "";

			# Iterate through the list of image formats
			foreach ($website["Image formats"] as $format) {
				# Define the chapter cover file as the local chapter folder plus the file name and the format
				$chapter_cover_file = $local_chapter_folder.$chapter_cover_file_name.".".$format;

				# If the chapter cover file exists
				if (file_exists($chapter_cover_file) == True) {
					# Define the local chapter cover as the chapter cover file
					$local_chapter_cover = $chapter_cover_file;

					# Define the image format as the current format
					$image_format = $format;
				}
			}

			# If the website "Generate" state is True
			# And the remote link variable is False
			if (
				$website["States"]["Website"]["Generate"] == False and
				$remote_link = False
			) {
				# Define the local folder as the "Images/" folder plus the website title
				$local_folder = "/Images/".$website["Data"]["title"]."/";

				# Define a shortcut to the remote folder
				$remote_folder = $website["Data"]["Folders"]["Website"]["Images"]["Remote"]["root"];

				# Replace the remote folder with the local folder inside the remote chapter folder
				$remote_chapter_folder = str_replace($remote_folder, $local_folder, $remote_chapter_folder);
			}

			# Define the remote chapter cover as the remote chapter cover plus the cover file name and the selected image format
			$remote_chapter_cover = $remote_chapter_folder.$chapter_cover_file_name.".".$image_format;
		}

		# If the local chapter cover is not empty (the chapter cover was found)
		if ($local_chapter_cover != "") {
			# Replace "button" by "button, image," in the chapter tab comment
			$chapter_tab["comment"] = str_replace("button", "button, image,", $chapter_tab["comment"]);

			# Define the image style as the light theme
			$image_style = $website["Style"]["img"]["theme"]["light"];

			# Add the dark box shadow to the image style
			$image_style = $website["Style"]["box_shadow"]["theme"]["dark"]." ".$image_style;

			# Create the image element of the chapter cover
			$image = HTML::Element("img", "", 'id="chapter_cover_'.$i.'" src="'.$remote_chapter_cover.'"', $image_style, $tab = [], $display = "block", $height = "70");

			$chapter_cover = "<br />"."<!-- Chapter cover image -->"."\n".
			"\t\t"."<center>"."\n".
			"\t\t\t"."\n\t\t".$image."</center>"."\n".
			"\t\t"."<br />\n\n";
		}

		# If the chapter cover was not found
		else {
			# Add one line break to the chapter cover string
			$chapter_cover .= "<br />";
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
			"\t".HTML::Element("div", $h4."\t", 'style="width: 33%;"', $website["Style"]["background"]["theme"]["dark"]." ".$website["Style"]["border_4px"]["theme"]["light"]." border_radius_50px");

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
			$text .= "<br /><br />";
			$text .= HTML::Element("b", $website["Language texts"]["in, title()"]).": ".date("H:i d/m/Y", strtotime($read_date));
			$text .= '<br class="mobile_inline_block" />'.'<br class="mobile_inline_block" />';

			$h4 = "\n"."\t\t".HTML::Element("h4", "\n\t\t\t".$text."\n\t\t", 'style="text-align: left;"', "text_size ".$website["Style"]["text"]["theme"]["dark"]." margin_sides_10_cent margin_top_bottom_2_cent")."\n";

			$div = "\t".'<!-- Chapter read number '.($r + 1).' -->'."\n".
			"\t".HTML::Element("div", $h4."\t", 'style="width: 33%;"', $website["Style"]["background"]["theme"]["dark"]." ".$website["Style"]["border_4px"]["theme"]["light"]." border_radius_50px");

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

		# Create the "Comment" button
		$text = HTML::Element("h3", "\n\t\t".$website["Language texts"]["to_comment"].": ".$website["Icons"]["comment"]."\n\t\t", ' style="font-weight: bold;"', "text_size")."\n";

		$buttons = "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", 'onclick="Open_Modal(\'comment\', \''.$chapter_tab["chapter_title"].'\')" style="float: right; margin-right: 1%;"', "w3-btn ".$website["Style"]["button"]["theme"]["light"]);

		# Create the "I read the chapter" button
		$text = HTML::Element("h3", "\n\t\t".$website["Language texts"]["i_read"].": ".$website["Icons"]["check"]." ".$website["Icons"]["reader"]."\n\t\t", 'style="font-weight: bold;"', "text_size")."\n";

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
		global $File;
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
			"chapter_title_file" => "",
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

		# Define the chapter title file as the chapter number with leading zeroes and the sanitized chapter title
		$chapter_tab["chapter_title_file"] = $chapter_tab["number_leading_zeroes"]." - ".$File -> Sanitize($chapter_title);

		# If the "Write chapter" mode is on
		# And the "chapter" parameter exists
		# And the current chapter is the chapter the user wants to write
		# And the "New chapter" state is True
		if (
			$website["States"]["Story"]["Write"] == True and
			isset($_GET["chapter"]) and
			$chapter_tab["number"] == (int)$_GET["chapter"] and
			$website["States"]["Story"]["New chapter"] == True
		) {
			# Define the chapter title file as only the chapter number with leading zeroes
			$chapter_tab["chapter_title_file"] = $chapter_tab["number_leading_zeroes"];
		}

		# If the "Write chapter" mode is off
		# Or it is on
		# And the "chapter" parameter exists
		# And the current chapter is not the chapter the user wants to write
		if (
			$website["States"]["Story"]["Write"] == False or
			$website["States"]["Story"]["Write"] == True and
			isset($_GET["chapter"]) and
			$chapter_tab["number"] != (int)$_GET["chapter"]
		) {
			# Define the "you are reading" key
			$text_key = "you_are_reading_{}_chapter_{}";
			$second_text_key = "you_just_read_{}_chapter_{}";
		}

		# If the "Write chapter" mode is on
		# And the "chapter" parameter exists
		# And the current chapter is the chapter the user wants to write
		# Or the "Write chapter" mode is on
		# And the "chapter" parameter does not exist
		if (
			$website["States"]["Story"]["Write"] == True and
			isset($_GET["chapter"]) and
			$chapter_tab["number"] == (int)$_GET["chapter"] or
			$website["States"]["Story"]["Write"] == True and
			isset($_GET["chapter"]) == False
		) {
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

		if (isset($website["Data"]["JSON"]["story"]) == True) {
			$chapter_tab["chapter_title_file"] = $Folder -> Sanitize($chapter_title);
		}

		# Create chapter button
		$chapter_button = "\n\t\t".$this -> Chapter_Button($i, $chapter_title);

		# Add chapter button to chapter buttons string
		$story["chapter_buttons"] .= $chapter_button;

		if ($chapter_title != end($chapter_titles)) {
			$story["chapter_buttons"] .= "<br />"."\n";
		}

		# Get the chapter text dictionary
		$chapter_text_dictionary = $this -> Chapter_Text();

		$chapter_tab["chapter_text"] = $chapter_text_dictionary["Text"]."\n";

		$chapter_tab["chapter_text_color"] = " text_white";

		if (isset($website["Style"]["chapter_text_color"]) == True) {
			$chapter_tab["chapter_text_color"] = " text_".$website["Style"]["chapter_text_color"];
		}

		# Define an "added dates" state
		$added_dates = False;

		# Define the empty dates list
		$dates = [];

		# Define the list of date types
		$date_types = [
			"Writing",
			"Revisions",
			"Translations"
		];

		# Define the list of date type text keys
		$date_type_text_keys = [
			"Writing" => "chapter_written_on",
			"Revisions" => "chapter_last_revised_on",
			"Translations" => "chapter_last_translated_into_english_on"
		];

		# If the chapter dictionary exists
		if ($chapter_tab["Dictionary"] != []) {
			# Iterate through the list of date types
			$d = 0;
			foreach ($date_types as $date_type) {
				# Get the date type text key
				$date_type_text_key = $date_type_text_keys[$date_type];

				# Get the date type text
				$date_type_text = $website["Language texts"][$date_type_text_key];

				# Get the date type dictionary
				$dictionary = $chapter_tab["Dictionary"][$date_type];

				# Define a default empty times dictionary
				$times = [];

				# If the date type is "Writing"
				if ($date_type == "Writing") {
					# Define the local times dictionary as the root "Times" dictionary
					$times = $dictionary["Times"];
				}

				# If the date type is not "Writing"
				if ($date_type != "Writing") {
					# Get the list of writing dictionaries
					$writings = array_values($dictionary["Dictionary"]);

					# If the list of writing dictionaries is not an empty list
					if ($writings != []) {
						# Get the last writing
						$last_writing = end($writings);

						# Define the local times dictionary as the "Times" dictionary of the last writing
						$times = $last_writing["Times"];
					}
				}

				# If the times dictionary of the chapter is not an empty dictionary
				if ($times != []) {
					# Get the date string
					$date_string = $times["Finished"];

					# Define the date format key as "date_format" (only for dates)
					$date_format_key = "date_format";

					# If the date string contains a colon
					if (str_contains($date_string, ":") == True) {
						# Define the date format as the date time format (to include the time)
						$date_format_key = "date_time_format";
					}

					# Get the date format
					$date_format = $website["Language texts"][$date_format_key];

					# Define the language date format to use to transform the date string into a date dictionary
					$language_date_format = $website["Texts"][$date_format_key]["pt"];

					# Transform the date string into a "Date" dictionary
					$date = Date::Now($date_string, $language_date_format);

					# Get the date in the defined date format
					$date = $date[$date_format];

					# Define the date text of the date type as the date type text and the date
					$date = "\t\t"."\n".
					$date_type_text.":"."\n".
					"<br />"."\n".
					$date;

					# Add the date text to the "dates" list
					array_push($dates, $date);

					# Update the "has date" variable to True
					$has_dates = True;
				}

				# Add one to the "d" number
				$d++;
			}
		}

		# If the list of dates is not empty
		if ($dates != []) {
			# Add two line breaks to the chapter text
			$chapter_tab["chapter_text"] .= "<br />"."<br />"."\n";

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

			# Change the "added dates" state to True
			$added_dates = True;
		}

		# Define an "added word count" state
		$added_word_count = False;

		# If the "Write chapter" mode is off
		# Or it is on
		# And the "chapter" parameter exists
		# And the current chapter is not the chapter the user wants to write
		# Or the "Write chapter" mode is on
		# And the "New chapter" state is False
		if (
			$website["States"]["Story"]["Write"] == False or
			$website["States"]["Story"]["Write"] == True and
			isset($_GET["chapter"]) and
			$chapter_tab["number"] != (int)$_GET["chapter"] or
			$website["States"]["Story"]["Write"] == True and
			$website["States"]["Story"]["New chapter"] == False
		) {
			# Add two line breaks to the chapter text
			$chapter_tab["chapter_text"] .= "<br />"."<br />"."\n";

			# Get the word count of the chapter
			$word_count = str_word_count($chapter_tab["chapter_text"]);

			# Define the singular word text
			$singular = $website["Language texts"]["word"];

			# Define the plural words text
			$plural = $website["Language texts"]["words"];

			# Get the word number text based on the number of words
			$word_text = Text::By_Number($word_count, $singular, $plural);

			# Format the word count of the chapter
			$words = number_format($word_count, 0, ".", ".");

			# Add the number of words with its text
			$chapter_tab["chapter_text"] .= "\t\t".$website["Language texts"]["chapter_words"].":"."\n".
			"<br />"."\n".
			$words." ".$word_text."<br />"."<br />"."\n";

			# Change the "added word count" state to True
			$added_word_count = True;
		}

		# If the "Write chapter" mode is on
		# And the "chapter" parameter exists
		# And the current chapter is the chapter the user wants to write
		# Or the "Write chapter" mode is on
		# And the "chapter" parameter does not exist
		if (
			$website["States"]["Story"]["Write"] == True and
			isset($_GET["chapter"]) and
			$chapter_tab["number"] == (int)$_GET["chapter"] or
			$website["States"]["Story"]["Write"] == True and
			isset($_GET["chapter"]) == False
		) {
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
				"Dark" => [
					"Background" => "dark",
					"Text" => "dark",
					"Border" => "light",
					"Theme" => "theme"
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
			#$theme = $themes["Light"];
			#$theme = $themes["Light (secondary)"];
			$theme = $themes["Dark"];
			#$theme = $themes["Stylized"];

			$background_and_text_class = $website["Data"]["Style"]["background"]["theme"][$theme["Background"]]." ".$website["Data"]["Style"]["text"]["theme"][$theme["Text"]];

			$class = $background_and_text_class." ".$website["Style"]["box_shadow"][$theme["Theme"]]["dark"]." ".$website["Style"]["border_4px"][$theme["Theme"]][$theme["Border"]];

			$style = "width: 100%; height: 800px; border: none; overflow-y: auto; resize: vertical;";

			$write_text = "<p><br /><b>".$website["Language texts"]["write, title()"].": ".$website["Icons"]["pen"]."<br />".
			$chapter_tab["chapter_title"]."</b><br /><br /><p>";

			$h2 = HTML::Element("h2", $write_text, "", $chapter_tab["chapter_text_color"])."\n";

			$title = "<center>".$h2."</center>";

			$text = str_replace("<br />", "", $chapter_text_dictionary["Text backup"]);

			$textarea_class = 'class="'.$background_and_text_class;

			if ($chapter_tab["chapter_text_color"] != "") {
				$textarea_class .= " ".$chapter_tab["chapter_text_color"];
			}

			$textarea_class .= '"';

			$anchor = "chapter_write";

			$hr = $website["elements"]["hr_1px_no_margin"][$theme["Theme"]][$theme["Border"]];

			# If the chapter text dictionary backup is not an empty string
			# And the chapter dates were not added
			# And the chapter word count was not added
			if (
				$chapter_text_dictionary["Text backup"] != "" and
				$added_dates == False and
				$added_word_count == False
			) {
				# Add some space to the chapter text
				$chapter_tab["chapter_text"] .= "<br />";
			}

			# Add the text area to write the chapter to the "chapter text" string
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
			$hr."\n";
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