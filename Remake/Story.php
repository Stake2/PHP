<?php

# Define Variable Inserter array
$website["variable_inserter"] = [
	"not_littletato" => "<br />".HTML::Element("img", "", 'src="'.$website["data"]["folders"]["website"]["images"]["images"]["root"]."Not Littletato.jpg".'"', $website["data"]["style"]["img"]["secondary_theme"]["normal"]),

	"Littletato" => "<br />".HTML::Element("img", "", 'src="'.$website["data"]["folders"]["website"]["images"]["images"]["root"]."Littletato.jpg".'"', $website["data"]["style"]["img"]["secondary_theme"]["normal"]),

	"mansion_of_Littletato_and_friends" => "<br />".HTML::Element("img", "", 'src="'.$website["data"]["folders"]["website"]["images"]["images"]["root"]."Mansion of Littletato and Friends.png".'"', $website["data"]["style"]["img"]["secondary_theme"]["normal"]),
];

# Define SpaceLiving chapter nine link
$chapter_nine = str_replace($Language -> user_language."/", $Language -> user_language."/chapter=9#", $website["dictionary"]["SpaceLiving"]["links"]["element"]);

$chapter_nine = str_replace("SpaceLiving", $website["language_texts"]["chapter"]." ".$website["language_texts"]["nine"], $chapter_nine);

# Define SpaceLiving chapter ten button
$chapter_ten = str_replace($Language -> user_language."/", $Language -> user_language."/chapter=10#", $website["dictionary"]["SpaceLiving"]["links"]["element"]);

$chapter_ten = str_replace("SpaceLiving", $website["language_texts"]["chapter"]." ".$website["language_texts"]["ten"], $chapter_ten);

$website["variable_inserter"]["SpaceLiving"] = [
	"chapter_9" => $chapter_nine,
	"chapter_10" => $chapter_ten,

	"Lisa" => "<br />".HTML::Element("img", "", 'src="'.$website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."Lisa.jpg".'"', $website["data"]["style"]["img"]["secondary_theme"]["normal"]),

	"lonelyship_story_cover_image" => "<br />".HTML::Element("img", "", 'src="'.$website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."LonelyShip Story Cover.png".'"', $website["data"]["style"]["img"]["secondary_theme"]["normal"]),

	"lonelyship_pixel_art_front_signboards" => "<br />".HTML::Element("img", "", 'src="'.$website["dictionary"]["SpaceLiving"]["folders"]["website"]["images"]["images"]["root"]."LonelyShip Story Cover Front Signboards.png".'"', $website["data"]["style"]["img"]["secondary_theme"]["normal"]),
];

$link = [
	"en" => "https://en.wikipedia.org/wiki/My_Little_Pony:_Friendship_Is_Magic",
	"pt" => "https://pt.wikipedia.org/wiki/My_Little_Pony:_A_Amizade_%C3%89_M%C3%A1gica",
];

$link = $Language -> Item($link);

$website["variable_inserter"]["my_little_pony_fim_wikipedia_title"] = HTML::Element("a", '"'.$website["language_texts"]["my_little_pony_friendship_is_magic"].'"', 'href="'.$link.'" target="_new"');

$website["variable_inserter"]["my_little_pony_fim_wikipedia_link"] = HTML::Element("a", '"'.$website["language_texts"]["my_little_pony_friendship_is_magic"].'" '.$website["language_texts"]["on_wikipedia"], 'href="'.$link.'" target="_new"');

# Define story variables

# Create chapter buttons and chapters
$story["chapter_buttons"] = "";
$story["chapters"] = "";

$language = $Language -> user_language;
$full_language = $Language -> full_user_language;

if ($language == "general") {
	$language = "en";
	$full_language = "English";
}

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
	}

	else {
		$chapter_text = $contents["string"];
	}

	# Define chapter text
	$chapter_text = str_replace("\n", "<br />\n\t\t", $chapter_text);

	# Define chapter cover
	$local_chapter_cover = $website["data"]["folders"]["local_website"]["images"]["story_covers"]["root"].$full_language."/".Text::Chapter_Cover_Folder($i)."/".Text::Add_Leading_Zeros($i).".png";

	$remote_chapter_cover = $website["data"]["folders"]["website"]["images"]["story_covers"]["root"].$full_language."/".Text::Chapter_Cover_Folder($i)."/".Text::Add_Leading_Zeros($i).".png";

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

		$chapter_tab["chapter_cover"] = "<!-- Chapter cover image -->"."\n".
		"\t\t"."<center>"."\n".
		"\t\t\t".HTML::Element("img", "", 'id="chapter_cover_'.$i.'" src="'.$remote_chapter_cover.'"', $website["style"]["box_shadow"]["theme"]["dark"]." ".$website["style"]["img"]["theme"]["light"])."\n\t\t"."</center>"."\n".
		"\t\t"."<br />\n\n";
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
	$text = HTML::Element("h3", "\n\t\t".$website["language_texts"]["to_comment"].": ".$website["icons"]["comment"]."\n\t\t", 'onclick="Open_Modal(\'comment\', \''.$chapter_tab["chapter_title"].'\')" style="font-weight: bold;"', "text_size ".$website["style"]["text"]["theme"]["dark"])."\n";

	$chapter_tab["bottom_button"] .= "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", 'style="float: right; margin-right: 1%;"', "w3-btn ".$website["style"]["button"]["theme"]["light"]);

	# Create "I read the chapter" button
	$text = HTML::Element("h3", "\n\t\t".$website["language_texts"]["i_read"].": ".$website["icons"]["check"]." ".$website["icons"]["reader"]."\n\t\t", 'onclick="Open_Modal(\'read\', \''.$chapter_tab["chapter_title"].'\')" style="font-weight: bold;"', "text_size ".$website["style"]["text"]["theme"]["dark"])."\n";

	$chapter_tab["bottom_button"] .= "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", 'style="float: right; margin-right: 1%;"', "w3-btn ".$website["style"]["button"]["theme"]["light"]);

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

		$h3 = "\t".HTML::Element("h3", "\n\t\t".$text."\n\t", "", "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_5_cent margin_top_bottom_3_cent")."\n\n";

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

			$text .= "<br />";
			$text .= HTML::Element("b", $website["language_texts"]["in, title()"]).": ".date("H:i d/m/Y", strtotime($date));
			$text .= $website["elements"]["hr_1px"]["theme"]["light"];
			$text .= $comment;

			$h4 = "\n"."\t\t".HTML::Element("h4", "\n\t\t\t".$text."\n\t\t", 'style="text-align: left;"', "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_10_cent margin_top_bottom_3_cent")."\n";

			$div = "\t".'<!-- Chapter read number '.($c + 1).' -->'."\n".
			"\t".HTML::Element("div", $h4."\t", 'style="width: 33%;"', "w3-container ".$website["style"]["background"]["theme"]["light"]." ".$website["style"]["border_4px"]["theme"]["dark"]." border_radius_50px");

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

		$h3 = "\t".HTML::Element("h3", "\n\t\t".$text."\n\t", "", "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_5_cent margin_top_bottom_3_cent")."\n\n";

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

			$text .= "<br />";
			$text .= HTML::Element("b", $website["language_texts"]["in, title()"]).": ".date("H:i d/m/Y", strtotime($read_date));

			$h4 = "\n"."\t\t".HTML::Element("h4", "\n\t\t\t".$text."\n\t\t", 'style="text-align: left;"', "text_size ".$website["style"]["text"]["theme"]["dark"]." margin_sides_10_cent margin_top_bottom_3_cent")."\n";

			$div = "\t".'<!-- Chapter read number '.($r + 1).' -->'."\n".
			"\t".HTML::Element("div", $h4."\t", 'style="width: 33%;"', "w3-container ".$website["style"]["background"]["theme"]["light"]." ".$website["style"]["border_4px"]["theme"]["dark"]." border_radius_50px");

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

	if (isset($chapter_tab["additional_elements"]) == True) {
		$chapter_tab["additional_elements"] .= "\n";
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

$modal_types = ["comment", "read"];

foreach ($modal_types as $type) {
	$chapter_modal = [
		"type" => $type,
		"type_title" => ucwords($type),
		"form_name" => $website["data"]["title"]."_".ucwords($type),
		"class" => "",
	];

	if ($type == "comment") {
		$chapter_modal["text"] = $website["language_texts"]["comment_on_the_chapter"];
		$chapter_modal["comment_input"] = "\t\t\t"."<!-- Comment input -->"."\n".
		"\t\t\t".HTML::Element("h2", "\n\t\t\t\t".$website["language_texts"]["comment, title()"].": "."\n\t\t\t", 'style="font-weight: bold;"', "text_size ".$website["style"]["text_highlight"]." margin_sides_10_cent margin_top_bottom_3_cent")."\n".
		"\t\t\t".HTML::Element("input", "", 'type="text" name="comment" style="font-weight: bold; width: 50%; border-radius: 50px;"', "w3-input text_size ".$website["style"]["button"]["theme"]["light"])."\n";

		$chapter_modal["icon"] = $website["icons"]["comment"];
		$chapter_modal["class"] = " margin_6_cent_auto";
	}

	if ($type == "read") {
		$chapter_modal["text"] = $website["language_texts"]["i_read_the_chapter"];
		$chapter_modal["icon"] = $website["icons"]["reader"];
	}

	$chapter_modal["icon"] .= "\n";

	$tpl -> assign("chapter_modal", $chapter_modal);
	$story["chapters"] .= $tpl -> draw("Story/Modal", True);

	if ($type == "comment") {
		$story["chapters"] .= "\n\n";
	}
}

$website["story_cards"] = "";

# Create story cards
$i = 0;
foreach ($stories["titles"]["en"] as $english_story_title) {
	$language_story_title = $stories["titles"][$language][$i];

	$website_data = $website["dictionary"][$english_story_title];

	# Get story image
	$image = "";

	if (file_exists($website["dictionary"][$english_story_title]["image"]["local_link"]) == True) {
		$image = $website_data["image"]["elements"]["theme"]["dark"];
		$image = str_replace("height: auto;", "width: 100%;", $image);
		$image = str_replace("image_size ", "", $image);
		$image = str_replace("border_radius_8_cent", "border_radius_5_cent", $image);
		$image = str_replace($website_data["style"]["box_shadow"]["theme"]["dark"]." ", "", $image);
		$image = '<!-- Story card image -->'."\n".
		"\t\t\t".$image;
	}

	# Define story title text with bold font-style
	$text = HTML::Element("b", $language_story_title);

	$h2 = "\t\t\t".HTML::Element("h2", "\n\t\t\t\t".$text."\n\t\t\t", "", "text_size ".$website_data["style"]["text"]["theme"]["dark"])."\n";

	$link = $website_data["links"]["language"];

	if ($website["data"]["title"] == $english_story_title) {
		$link = "";
	}

	$box_shadow = "box_shadow_".str_replace("text_", "", $website_data["style"]["text_highlight"]);

	$website["story_cards"] .= "\n".
	"\t\t".'<!-- "'.$language_story_title.'" story card -->'."\n".
	"\t\t".HTML::Element("a", "\n".$h2."\n"."\t\t\t".$image."\n"."\t\t\t"."<br />"."\n\t\t", 'href="'.$link.'" target="_new" style="width: 50%;"', "w3-btn ".$website_data["style"]["background"]["secondary_theme"]["light"]." ".$website_data["style"]["border_4px"]["theme"]["dark"]." ".$box_shadow." animation_shake_side background_hover_white");

	if ($english_story_title != array_reverse($stories["titles"]["en"])[0]) {
		$website["story_cards"] .= "\n\n"."\t\t<br />"."\n";
	}

	$i++;
}

# Define tab templates for story websites
$website["tabs"]["templates"] = [
	"read story" => [
		"name" => $website["language_texts"]["read_story"],
		"title" => $website["language_texts"]["chapters_in_[language]"].": ".$website["language_texts"]["language_icon"]." ".HTML::Element("span", $story["Information"]["Chapter number"], "", $website["style"]["text_highlight"]),
		"content" => $story["chapter_buttons"],
		"icon" => "open_book",
	],
	"readers" => [
		"name" => $website["language_texts"]["readers, title()"],
		"add" => " ".HTML::Element("span", $story["Information"]["Readers number"], "", $website["style"]["text_highlight"]),
		"content" => Text::From_Array($story["Information"]["Readers"], "", $enumerate = True, $website["style"]["text_highlight"], "text_hover_white"),
		"icon" => "reader",
	],
	"other stories" => [
		"name" => $website["language_texts"]["other_stories"],
		"add" => " ".HTML::Element("span", ($stories["number"]), "", $website["style"]["text_highlight"]),
		"content" => $website["story_cards"],
		"icon" => "book",
	],
];

?>