<?php 

# HTML

class HTML extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> folders = $folders;
	}

	public static function Element($element, $text = "", $attributes = "", $class = "", $tab = []) {
		$self_closing_elements = [
			"embed",
			"hr",
			"img",
			"input",
			"link",
			"meta",
		];

		$tabs = [
			"text" => "",
			"text_less_one" => "",
			"first" => "",
		];

		if ($tab != []) {
			if ($tab["new_line"] == True) {
				$tabs["text"] .= "\n";
			}

			if (isset($tab["tab"]) == True) {
				$tabs["text"] .= $tab["tab"];
				$tabs["first"] .= substr_replace($tab["tab"], "", -3);
			}

			elseif (isset($tab["one"]) == False) {
				$tabs["text"] .= "\t\t";
			}

			if (isset($tab["one"]) == False and in_array($element, $self_closing_elements) == True) {
				if (isset($tab["tab"]) == False) {
					$tabs["first"] .= "\t";
				}

				if (isset($tab["tab"]) == True) {
					$tabs["first"] .= $tab["tab"];
				}
			}

			$tabs["text_less_one"] = substr_replace($tabs["text"], "", -1);

			if (isset($tab["tab"]) == True and substr_count($tab["tab"], "\t") == 2) {
				$tabs["text_less_one"] = $tabs["text"];
			}

			if (isset($tab["second_none"]) == True) {
				$tabs["text_less_one"] = "\n";
			}
		}

		# Non self-closing elements template
		$template = $tabs["first"]."<{}{}{}>".$tabs["text"]."{}".$tabs["text_less_one"]."</{}>";

		# Self-closing elements template
		if (in_array($element, $self_closing_elements) == True) {
			$template = $tabs["first"]."<{}{}{} />";
		}

		# Add attributes if they exist
		if ($attributes != "") {
			$attributes = " ".$attributes;
		}

		# Add classes if they exist
		if ($class != "") {
			$class = ' class="'.$class.'"';
		}

		# Define parameters
		$parameters = [
			$element,
			$class,
			$attributes,
		];

		# Add text and element to non self-closing elements
		if (in_array($element, $self_closing_elements) == False) {
			array_push($parameters, $text);
			array_push($parameters, $element);
		}

		return self::Format($template, $parameters);
	}

	public static function Format($text, $parameters) {
		$parameters = (array)$parameters;

		$text = preg_replace_callback("#\{\}#",
			function ($parameters) {
				static $i = 0;
				return '{'.($i++).'}';
			},
			$text
		);

		return str_replace(
			array_map(
				function ($key) {
					return '{'.$key.'}';
				},

				array_keys($parameters)
			),

			array_values($parameters),

			$text,
		);
	}

	public static function Generate_Buttons() {
		global $website;
		global $Language;

		$show_text = HTML::Element("h2", "\n\t\t".$website["icons"]["bars"]."\n\t", "", "text_size")."\n";
		$hide_text = HTML::Element("h4", "\n\t\t"."X"."\n\t\t", 'style="font-weight: bold;"', "text_size")."\n";

		$border_color = $website["style"]["border_color"];

		$buttons = [
			"list" => [],

			"hamburger_menu" => "\n"."<!-- Open hamburger menu button -->"."\n".
			HTML::Element("button", "\n\t".$show_text, 'id="hamburger_menu_button" onclick="Show_Hamburger_Menu();" style="position: fixed; left: 0%;"', "w3-btn ".$website["style"]["button"]["theme"]["light"]." w3-animate-zoom")."\n".
			"\n"."<!--- Hamburger menu -->"."\n".
			'<div id="hamburger_menu" class="w3-container w3-animate-left '.$website["style"]["background"]["theme"]["normal"]." ".$website["style"]["border_4px"]["theme"][$border_color]." ".$website["style"]["border_radius"].'" style="padding: 1%; position: fixed; display: none;">'."\n\n".
			"\t".'<!-- Hide hamburger menu button -->'."\n".
			"\t".HTML::Element("button", "\n\t\t".$hide_text."\t", ' onclick="Hide_Hamburger_Menu();" style="float: right; padding: 2px 14px 3px 15px !important;"', "w3-btn ".$website["style"]["button"]["theme"]["light"])."\n\n".
			"\t".HTML::Element("h2", $website["language_texts"]["tab_menu"].": ", 'style="font-weight: bold;"', "text_size ".$website["style"]["text_highlight"])."\n\n".
			"\t"."<br />"."\n\n",
		];

		# Generate buttons
		$i = 0;
		foreach (array_keys($website["tabs"]["data"]) as $id) {
			$tab = $website["tabs"]["data"][$id];

			# Define id and name
			$tab["id"] = $id;
			$tab["number"] = $i + 1;

			$tab = self::Tab_Info($tab, $i);

			# Generate tab button
			$h2 = HTML::Element("h2", "\n\t\t\t\t".$tab["name_icon"]."\n\t\t\t", "", "text_size")."\n";

			$button = '<!-- "'.$tab["name"].'" button -->'."\n".
			"\t".'<span id="button_'.($i + 1).'" class="tab_button">'."\n\t\t".HTML::Element("button", "\n\t\t\t".$h2."\t\t", ' onclick="Open_Tab(\''.$tab["id"].'\');" style="border-radius: 50px;"', "w3-btn ".$website["style"]["button"]["theme"]["light"])."\n\t"."</span>";

			# Add button to buttons array
			array_push($buttons["list"], $button);

			$i++;
		}

		# Add buttons to hamburger menu
		foreach($buttons["list"] as $button) {
			$buttons["hamburger_menu"] .= "\t".$button;

			if ($button != array_reverse($buttons["list"])[0]) {
				$buttons["hamburger_menu"] .= "\n\n";
			}
		}

		# Close hamburger menu div
		$buttons["hamburger_menu"] .= "\n"."</div>";

		return $buttons;
	}

	public static function Chapter_Button($chapter_number, $chapter_title, $options = ["previous" => False, "next" => False, "text" => ""]) {
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

	public static function Tab_Info($tab, $i) {
		global $website;
		global $Language;

		$language = $Language -> user_language;

		if ($language == "general") {
			$language = "en";
		}

		# Define tab content for a tab that uses a template
		if (isset($tab["template"]) == True) {
			$template = $website["tabs"]["templates"][$tab["template"]];

			foreach (array_keys($template) as $key) {
				$tab[$key] = $template[$key];
			}

			# Read file if index exists
			if (isset($tab["file"]) == True) {
				$contents = File::Contents($tab["file"]);

				if ($contents["lines"] != []) {
					$tab["content"] = $contents["string"];
				}

				# If file is empty, use empty message text
				if ($contents["lines"] == []) {
					$tab["content"] = $tab["empty_message"];
				}
			}
		}

		if (isset($tab["text_class"]) == True) {
			$tab["content"] = self::Element("span", $tab["content"], "", $tab["text_class"]);
		}

		# Define tab name in the user language
		if (isset($tab["name"][$language]) == True) {
			$tab["name"] = $tab["name"][$language];
		}

		if (isset($tab["title"]) == True) {
			if (isset($tab["title"][$language]) == True) {
				$tab["title"] = $tab["title"][$language];
			}

			if (strpos($tab["title"], "[") == True) {
				$key = explode("[", $tab["title"])[1];
				$key = explode("]", $key)[0];

				$tab["title"] = str_replace("[".$key."]", $website[$key], $tab["title"]);
			}
		}

		# Define title if it is not present
		if (isset($tab["title"]) == False and strpos($tab["name"], ": ") === False) {
			$tab["title"] = $tab["name"].": ".$website["icons"][$tab["icon"]];
		}

		$tab["name_icon"] = $tab["name"].": ".$website["icons"][$tab["icon"]];

		# Define tab content with content file
		if (isset($tab["content"]) == False and isset($tab["template"]) == False) {
			$tab["content_file"] = $website["data"]["folders"]["php"]["tabs"].$i.".php";

			if (file_exists($tab["content_file"]) == False) {
				File::Edit($tab["content_file"], "<?php "."\n\n\n\n"."?>", "w");
			}

			require $tab["content_file"];
		}

		if (isset($tab["add"]) == True) {
			$tab["title"] .= $tab["add"];
		}

		return $tab;
	}

	public static function Tab($tab) {
		global $tpl;
		global $website;

		$tpl -> assign("tab", $tab);
		$tpl -> assign("website", $website);

		return $tpl -> draw("Tab", $toString = True);
	}

	public static function Generate_Tabs() {
		global $website;

		$tabs = [];

		$i = 0;
		foreach (array_keys($website["tabs"]["data"]) as $id) {
			$tab = $website["tabs"]["data"][$id];

			# Define id and name
			$tab["id"] = $id;
			$tab["number"] = $i + 1;

			$tab = self::Tab_Info($tab, $i);

			# Define CSS class
			$tab["class"] = $website["style"]["tab"]["black"];
			
			$tab["content"] .= "\n";

			# Generate tab HTML
			$tab = self::Tab($tab);

			# Add tab to elements array
			array_push($tabs, $tab);

			$i++;
		}

		return $tabs;
	}
}

?>