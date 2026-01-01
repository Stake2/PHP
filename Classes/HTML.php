<?php 

# HTML.php

class HTML extends Class_ {
	public function __construct() {
		parent::__construct(self::class);
	}

	public static function Element($element, $text = "", $attributes = "", $class = "", $tab = [], $display = "block", $height = "90") {
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

			if (
				isset($tab["one"]) == False and
				in_array($element, $self_closing_elements) == True
			) {
				if (isset($tab["tab"]) == False) {
					$tabs["first"] .= "\t";
				}

				if (isset($tab["tab"]) == True) {
					$tabs["first"] .= $tab["tab"];
				}
			}

			$tabs["text_less_one"] = substr_replace($tabs["text"], "", -1);

			if (
				isset($tab["tab"]) == True and
				substr_count($tab["tab"], "\t") == 2
			) {
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

		# If the element is an image
		if ($element == "img") {
			# Add some classes
			$class .= " max_width_100_percent max_height_100_percent height_auto";
		}

		# Add classes if they exist
		if ($class != "") {
			$class = ' class="'.$class.'"';
		}

		# Define parameters
		$parameters = [
			$element,
			$class,
			$attributes
		];

		# Add text and element to non self-closing elements
		if (in_array($element, $self_closing_elements) == False) {
			array_push($parameters, $text);
			array_push($parameters, $element);
		}

		# Format the text template with the list of parameters to create the element
		$element_code = self::Format($template, $parameters);

		# If the element is an image
		if ($element == "img") {
			# Add a sizing div
			$element_code = '<div class="height_'.$height.'_view_height width_auto" style="display: '.$display.';">'.
			"\n".
			$element_code.
			"\n".
			"</div>";
		}

		# Return the element
		return $element_code;
	}

	public static function Image($source, $class = "", $attributes = "") {
		global $website;

		if ($class == "") {
			$class = $website["Data"]["Style"]["img"]["theme"]["dark"]." ".$website["Style"]["box_shadow"]["theme"]["light"];
		}

		return HTML::Element("img", "", 'src="'.$source.'"'.$attributes, $class);
	}

	public static function Make_Image_Size($image, $width) {
		global $website;

		#$image = str_replace("image_size ", "", $image);
		#$image = str_replace("height: auto;", "max-width: ".$website_dictionary["JSON"]["image"]["width"]."vw; height: auto;", $image);
		#$image = str_replace('height: auto;"', 'height: auto;" width="'.$width.'%"', $image);

		return $image;
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

			$text
		);
	}

	public static function Button($text = "", $attributes = "", $class = "", $heading = "h3", $tab = True, $bold = True) {
		global $website;

		$class = $website["Style"]["button"]["theme"]["dark"].$class;

		$text_attributes = "";

		if (
			$heading == "h3" and
			$bold == True
		) {
			$text_attributes = 'style="font-weight: bold;"';
		}

		$text = HTML::Element($heading, "\n\t\t".$text."\n\t\t", $text_attributes, "text_size")."\n";

		$button = "\n\n";
		$text = "\n".$text;

		if ($tab == True) {
			$button .= "\t";
			$text = "\t\t".$text."\t";
		}

		$button .= HTML::Element("button", $text, $attributes, "w3-btn ".$class);

		return $button;
	}

	public static function Tab_Button($tab, $space = "<br />") {
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
		"\t".'<span id="button_'.($i + 1).'" class="tab_button">'."\t\t".self::Button("\t".$tab["name_icon"]."\t\t\t", ' onclick="Open_Tab(\''.strtolower($tab["id"]).'\');" style="border-radius: 50px;'.$tab["button_style"].'"', $tab["button_class"], "h2").$space."\n\t"."</span>";

		return $button;
	}

	public static function Generate_Buttons() {
		global $website;
		global $Language;
		global $i;

		$open_text = $website["Icons"]["bars"];

		if ($website["Data"]["type"] == "Normal") {
			$open_text = $website["Language texts"]["click_to_open_the_buttons_menu"]." ".$website["Icons"]["bars"];
		}

		if ($website["Data"]["type"] == "Story") {
			$open_text = $website["Language texts"]["click_to_read_story"]." ".$website["Icons"]["reader"];
		}

		$show_text = HTML::Element("h2", "\n\t\t\t\t".$open_text."\n\t\t\t", "", "text_size");
		$hide_text = HTML::Element("h4", "\n\t\t\t\t"."X"."\n\t\t\t", 'style="font-weight: bold;"', "text_size");

		$border_color = $website["Style"]["border_color"];

		# Create the "Open hamburger menu" button
		$open_hamburger_menu_button = "<!-- Open hamburger menu button -->".
		'<div id="hamburger_menu_button">'."\n".
		HTML::Button("\t".$show_text, 'onclick="Show_Hamburger_Menu();" style="position: fixed; left: 0%;"', "w3-btn ".$website["Style"]["button"]["theme"]["light"]." w3-animate-zoom", "h3")."\n".
		'<br /><br /><br /><br />'."\n".
		"</div>";

		# Define the "Close hamburger menu" button
		$close_hamburger_menu_button = "\t".'<!-- Close hamburger menu button -->'.
		HTML::Button("\t".$hide_text."\t\t", ' onclick="Hide_Hamburger_Menu();" style="float: right; padding: 2px 14px 3px 14px !important;"', "w3-btn ".$website["Style"]["button"]["theme"]["light"]);

		$buttons = [
			"list" => [],

			"hamburger_menu" => "\n".$open_hamburger_menu_button.
			"\n\n".
			"\n"."<!--- Hamburger menu -->"."\n".
			'<div id="hamburger_menu" class="w3-container w3-animate-left '.$website["Style"]["background"]["theme"]["normal"]." ".$website["Style"]["border_4px"]["theme"][$border_color]." ".$website["Style"]["border_radius"].'" style="padding: 1%; position: fixed; display: none;">'.
			"\n\n".
			$close_hamburger_menu_button."\n\n".
			"\t".HTML::Element("h2", $website["Language texts"]["tab_menu"].": ", 'style="font-weight: bold;"', "text_size ".$website["Style"]["text_highlight"])."\n\n".
			"\t"."<br />".
			'<div style="overflow-y: auto; overflow-x: hidden; max-height: 80vh;">'."\n"
		];

		# Generate the buttons
		$i = 0;
		foreach (array_keys($website["tabs"]["data"]) as $id) {
			# Get the tab data
			$tab = $website["tabs"]["data"][$id];

			# Define the id and number of the tab
			$tab["id"] = $id;
			$tab["number"] = $i + 1;

			# Get the tab information
			$tab = self::Tab_Info($tab, $i);

			# Create the tab button
			$button = self::Tab_Button($tab);

			# Add the button to the list of buttons
			array_push($buttons["list"], $button);

			$i++;
		}

		# If the "Generate" website state is False
		# And the website type is "Story"
		# And the "Write" story state is True
		if (
			$website["States"]["Website"]["Generate"] == False and
			$website["Data"]["type"] == "Story" and
			$website["States"]["Story"]["Write"] == True
		) {
			# Define the function to run
			$function = "Hide_Home_Buttons()";

			# Define the "Hide home buttons" button
			$button = self::Button($website["Language texts"]["hide_home_buttons"], ' onclick="'.$function.'" style="border-radius: 50px;"', "", "h2");

			# Add the button to the list of buttons
			array_push($buttons["list"], $button);
		}

		# Add the buttons to the hamburger menu
		foreach($buttons["list"] as $index => $button) {
			$buttons["hamburger_menu"] .= "\n\t".$button;

			if ($index != count($buttons["list"]) - 1) {
				$buttons["hamburger_menu"] .= "\n\n";
			}
		}

		# Close the hamburger menu div
		$buttons["hamburger_menu"] .= "\n"."</div>".
		"\n"."</div>";

		return $buttons;
	}

	public static function Generate_Buttons_List($tab = [], $remove = "", $center = True, $last_separator = True) {
		global $website;

		if ($tab == []) {
			$tab["all_buttons"] = False;
			$tab["only_button"] = Null;
			$tab["Buttons list"] = [];
		}

		if (isset($tab["Buttons list"]) == False) {
			$tab["Buttons list"] = [];
		}

		# Initalize the string
		$string = "";

		$buttons_list = $website["buttons_list"];

		if (isset($website["Additional buttons"]) == True) {
			$buttons_list = $buttons_list + $website["Additional buttons"];
		}

		# If the list of buttons is not empty
		if ($tab["Buttons list"] != []) {
			# Define it as the local list of buttons
			$buttons_list = $tab["Buttons list"];
		}

		# If the list of buttons is not empty
		# And the center parameter is True
		if (
			$buttons_list != [] and
			$center == True
		) {
			# Add the opening center tag to the string
			$string .= "<center>";
		}

		if ($tab["only_button"] == Null) {
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

				if (
					$number -1 != -1 and
					$number + 1 != count($buttons_list)
				) {
					$string .= '<br class="mobile_inline_block" /><p class="mobile_inline_block"></p>';
				}

				# Next button
				if ($number + 1 != count($buttons_list)) {
					$buttons_list[$number + 1] = self::Element("span", $buttons_list[$number + 1], 'style="float: right;"', "margin_sides_5_cent");

					$string .= $buttons_list[$number + 1];
				}

				# If the list of buttons is not empty
				if ($buttons_list != []) {
					# Add four line breaks to the string
					$string .= "<br /><br /><br /><br />";
				}

				if (
					$number != 0 and
					$number + 1 != count($buttons_list)
				) {
					# Add a mobile space separator
					$string .= '<br class="mobile_inline_block" />';
				}
			}

			if ($tab["all_buttons"] == True) {
				foreach ($buttons_list as $button) {
					if (str_contains($button, "websites_tab") == False) {
						$string .= $button;
					}
				}
			}
		}

		if ($tab["only_button"] != Null) {
			foreach ($buttons_list as $button) {
				if (str_contains($button, $tab["only_button"]) == True) {
					$string .= $button;
				}
			}
		}

		if (isset($tab["button"]) and $tab["button"] != Null) {
			$string .= $tab["button"];
		}

		# If the list of buttons is not empty
		# And the "last separator" parameter is True
		if (
			$buttons_list != [] and
			$last_separator == True
		) {
			# Add the hr separator to the string
			$string .= $website["elements"]["hr_1px"]["theme"][$website["Style"]["border_color"]];
		}

		# If the list of buttons is not empty
		# And the center parameter is True
		if (
			$buttons_list != [] and
			$center == True
		) {
			# Add the closing center tag to the string
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
		}

		# Define the tab display key

		# Define the "Display" key to hide the tab by default
		$tab["Display"] = " display: none;";

		# If the "Display tab by default" key is present
		# And it is True
		if (
			isset($tab["Display tab by default"]) == True and
			$tab["Display tab by default"] == True
		) {
			# Define the "Display" key to show the tab by default
			$tab["Display"] = " display: block;";
		}

		# Read the tab file if the file index exists
		if (isset($tab["file"]) == True) {
			$contents = $File -> Contents($tab["file"]);

			if (
				$contents["lines"] != [] and
				isset($tab["content"]) == False
			) {
				$tab["content"] = Linkfy($contents["string"]);
			}

			# If the file is empty, use the empty message text
			if ($contents["lines"] == []) {
				if (isset($tab["empty_message"]) == False) {
					$tab["empty_message"] = $website["Language texts"]["this_file_does_not_exist_{}"];
				}

				$tab["content"] = "test".$tab["empty_message"];
			}
		}

		if (isset($tab["text_class"]) == True) {
			$tab["content"] = self::Element("span", $tab["content"], "", $tab["text_class"]);
		}

		else {
			$tab["content"] = self::Element("span", $tab["content"], "", $website["Data"]["Style"]["text_highlight"]);
		}

		# Define tab name in the user language
		if (isset($tab["name"][$language]) == True) {
			$tab["name"] = $tab["name"][$language];
		}

		if (isset($tab["title"]) == True) {
			if (isset($tab["title"][$language]) == True) {
				$tab["title"] = $tab["title"][$language];
			}

			if (str_contains($tab["title"], "[") == True) {
				$key = explode("[", $tab["title"])[1];
				$key = explode("]", $key)[0];

				$tab["title"] = str_replace("[".$key."]", $website[$key], $tab["title"]);
			}
		}

		# Define title if it is not present
		if (isset($tab["title"]) == False) {
			if (str_contains($tab["name"], ": ") == False) {
				$tab["title"] = $tab["name"].": ".$website["Icons"][$tab["icon"]];
			}

			if (str_contains($tab["name"], ": ") == True) {
				$tab["title"] = $tab["name"].": ".$website["Icons"][$tab["icon"]];
			}
		}

		$tab["name_icon"] = $tab["name"].": ".$website["Icons"][$tab["icon"]];

		# Define tab content with content file
		if (
			isset($tab["content"]) == False and
			isset($tab["template"]) == False
		) {
			$tab["content_file"] = $website["Data"]["Folders"]["PHP"]["Tabs"].($i + 1).".php";

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

	public static function Generate_Tabs($tabs_data = Null, $buttons = False, $all_buttons = False) {
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
				$tab["id"] = strtolower($id);
			}

			if (array_key_exists("button_style", $tab) == False) {
				$tab["button_style"] = "";
			}

			$tab["number"] = $tabs["ID"] + 1;

			$tab["buttons"] = $buttons;

			if (array_key_exists("all_buttons", $tab) == False) {
				$tab["all_buttons"] = $all_buttons;
			}

			if (array_key_exists("only_button", $tab) == False) {
				$tab["only_button"] = Null;
			}

			$tab = self::Tab_Info($tab, $tabs["ID"]);

			# Define CSS class
			$tab["class"] = $website["Style"]["tab"]["black"];

			if (isset($tab["content"]) == True) {
				$tab["content"] .= "\n";
			}

			# Generate the tab HTML
			$tab["content"] = "<center>"."\n\n".self::Tab($tab)."\n\n"."</center>";

			# Add tab to the tabs array
			array_push($tabs["List"], $tab["name"]);

			$tabs["Dictionary"][$tab["name"]] = $tab;

			$tabs["ID"]++;
		}

		return $tabs;
	}
}

?>