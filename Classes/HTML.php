<?php 

# HTML.php

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
			"meta"
		];

		$tabs = [
			"text" => "",
			"text_less_one" => "",
			"first" => ""
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

	public static function Button($text = "", $attributes = "", $class = "", $heading = "h3") {
		global $website;

		$class = $website["style"]["button"]["theme"]["light"].$class;

		$text_attributes = "";

		if ($heading == "h3") {
			$text_attributes = 'style="font-weight: bold;"';
		}

		$text = HTML::Element($heading, "\n\t\t".$text."\n\t\t", $text_attributes, "text_size ".$website["style"]["text"]["theme"]["dark"])."\n";

		$button = "\n\n\t".HTML::Element("button", "\n\t\t".$text."\t", $attributes, "w3-btn ".$class);

		return $button;
	}

	public static function Tab_Button($tab) {
		global $website;
		global $i;

		# Generate tab button
		if (array_key_exists("button_style", $tab) == False) {
			$tab["button_style"] = "";
		}

		if (array_key_exists("button_class", $tab) == False) {
			$tab["button_class"] = "";
		}

		$button = '<!-- "'.$tab["name"].'" button -->'."\n".
		"\t".'<span id="button_'.($i + 1).'" class="tab_button">'."\n\t\t".self::Button("\n\t\t\t\t".$tab["name_icon"]."\n\t\t\t", ' onclick="Open_Tab(\''.$tab["id"].'\');" style="border-radius: 50px;'.$tab["button_style"].'"', "w3-btn ".$website["style"]["button"]["theme"]["light"].$tab["button_class"], "h2")."\n\t"."</span>";

		return $button;
	}

	public static function Generate_Buttons() {
		global $website;
		global $Language;
		global $i;

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
			"\t"."<br />"."\n\n"
		];

		# Generate buttons
		$i = 0;
		foreach (array_keys($website["tabs"]["data"]) as $id) {
			$tab = $website["tabs"]["data"][$id];

			# Define id and name
			$tab["id"] = $id;
			$tab["number"] = $i + 1;

			$tab = self::Tab_Info($tab, $i);

			$button = self::Tab_Button($tab);

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

	public static function Generate_Buttons_List($tab = [], $remove = "", $center = True) {
		global $website;

		if ($tab == []) {
			$tab["all_buttons"] = False;
		}

		$string = "";

		if ($center == True) {
			$string .= "<center>";
		}

		$buttons_list = $website["buttons_list"];

		if ($tab["all_buttons"] == False) {
			$i = 0;
			$number = 0;
			foreach ($buttons_list as $button) {
				if (str_contains($button, $remove) == True) {
					$number = $i;
				}

				$i++;
			}

			# Previous button
			if ($number -1 != -1) {
				$buttons_list[$number - 1] = self::Element("span", $buttons_list[$number - 1], 'style="float: left;"', "margin_sides_5_cent");
				$string .= $buttons_list[$number - 1];
			}

			# Next button
			if ($number + 1 != count($buttons_list)) {
				$buttons_list[$number + 1] = self::Element("span", $buttons_list[$number + 1], 'style="float: right;"', "margin_sides_5_cent");
				$string .= $buttons_list[$number + 1];
			}

			$string .= "<br /><br /><br /><br />";
		}

		if ($tab["all_buttons"] == True) {
			foreach ($buttons_list as $button) {
				if (str_contains($button, "websites_tab") == False) {
					$string .= $button;
				}
			}
		}

		$string .= $website["elements"]["hr_1px"]["theme"][$website["style"]["border_color"]];

		if ($center == True) {
			$string .= "</center>";
		}

		return $string;
	}

	public static function Tab_Info($tab, $i) {
		global $File;
		global $Language;
		global $website;

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
				$contents = $File -> Contents($tab["file"]);

				if ($contents["lines"] != []) {
					$tab["content"] = $contents["string"];
				}

				# If file is empty, use empty message text
				if ($contents["lines"] == []) {
					if (isset($tab["empty_message"]) == False) {
						$tab["empty_message"] = $website["language_texts"]["this_file_does_not_exist_{}"];
					}

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
			$tab["content_file"] = $website["data"]["folders"]["php"]["tabs"].($i + 1).".php";

			if (file_exists($tab["content_file"]) == False) {
				$File -> Edit($tab["content_file"], "<?php "."\n\n\n\n"."?>", "w");
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

	public static function Generate_Tabs($tabs_data = Null, $buttons = True, $all_buttons = False) {
		global $website;

		$tabs = [
			"List" => [],
			"Dictionary" => [],
			"ID" => 0
		];

		if ($tabs_data != Null) {
			$tabs_data = $tabs_data["data"];
		}

		if ($tabs_data == Null) {
			$tabs_data = $website["tabs"]["data"];
		}

		foreach (array_keys($tabs_data) as $id) {
			$tab = $tabs_data[$id];

			# Define the tab id
			if (array_key_exists("id", $tab) == False) {
				$tab["id"] = $id;
			}

			if (array_key_exists("button_style", $tab) == False) {
				$tab["button_style"] = "";
			}

			$tab["number"] = $tabs["ID"] + 1;

			$tab["buttons"] = $buttons;
			$tab["all_buttons"] = $all_buttons;

			$tab = self::Tab_Info($tab, $tabs["ID"]);

			# Define CSS class
			$tab["class"] = $website["style"]["tab"]["black"];

			if (isset($tab["content"]) == True) {
				$tab["content"] .= "\n";
			}

			# Generate the tab HTML
			$tab["content"] = "<center>".self::Tab($tab)."</center>";

			# Add tab to the tabs array
			array_push($tabs["List"], $tab["name"]);
			$tabs["Dictionary"][$tab["name"]] = $tab;

			$tabs["ID"]++;
		}

		return $tabs;
	}
}

?>