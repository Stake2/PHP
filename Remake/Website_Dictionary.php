<?php

# Website_Dictionary

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $website["full_language"];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

# Add websites to website dictionary
$i = 0;
foreach ($website["list"]["en"] as $website_title) {
	$website["dictionary"][$website_title] = [];

	# Add English title and language titles
	$website["dictionary"][$website_title]["title"] = $website_title;
	$website["dictionary"][$website_title]["titles"] = [];

	foreach ($Language -> languages["small"] as $local_language) {
		if (isset($website["list"][$local_language]) == True) {
			$website["dictionary"][$website_title]["titles"][$local_language] = $website["list"][$local_language][$i];
		}
	}

	# Define website type as normal
	$website["dictionary"][$website_title]["type"] = "Normal";

	# Define website type as story if the website is from a story
	if (in_array($website_title, $stories["titles"]["en"]) == True) {
		$website["dictionary"][$website_title]["type"] = "Story";

		# Add story dictionary to website dictionary
		$website["dictionary"][$website_title]["story"] = $stories[$website_title];
	}

	# Define website link
	$website_link = $website_title;

	if ($website["dictionary"][$website_title]["type"] == "Story" and isset($stories[$website_title]["Information"]["Website link name"])) {
		if (strpos($stories[$website_title]["Information"]["Website link name"], "{story}")) {
			$stories[$website_title]["Information"]["Website link name"] = str_replace("{story}", $website_title, $stories[$website_title]["Information"]["Website link name"]);
		}

		$website_link = $stories[$website_title]["Information"]["Website link name"];
	}

	# Define website folders
	$website["dictionary"][$website_title]["folders"] = [];

	$website["dictionary"][$website_title]["folders"]["website"] = [
		"root" => $website["folders"]["root"].File::Sanitize($website_link)."/",
	];

	$website["dictionary"][$website_title]["folders"]["website"]["language"] = $website["dictionary"][$website_title]["folders"]["website"]["root"];

	if ($website["language"] != "general") {
		$website["dictionary"][$website_title]["folders"]["website"]["language"] .= $website["language"]."/";
	}

	$website["dictionary"][$website_title]["folders"]["local_website"] = [
		"root" => $folders["mega"]["websites"]["root"].File::Sanitize($website_link)."/",
	];

	$website["dictionary"][$website_title]["folders"]["local_website"]["language"] = $website["dictionary"][$website_title]["folders"]["local_website"]["root"];

	if ($website["language"] != "general") {
		$website["dictionary"][$website_title]["folders"]["local_website"]["language"] .= $website["language"]."/";
	}

	# Define Mega Websites Images website image folders
	$names = [
		"Icons",
		"Images",
	];

	if ($website["dictionary"][$website_title]["type"] == "Story") {
		array_push($names, "Story Covers");
	}

	$website["dictionary"][$website_title]["folders"]["website"]["images"] = [
		"root" => $website["dictionary"][$website_title]["folders"]["website"]["root"]."Images/".File::Sanitize($website_title)."/",
	];

	$website["dictionary"][$website_title]["folders"]["local_website"]["images"] = [
		"root" => $website["dictionary"][$website_title]["folders"]["local_website"]["root"]."Images/".File::Sanitize($website_title)."/",
	];

	foreach ($names as $item) {
		$key = str_replace(" ", "_", strtolower($item));

		$website["dictionary"][$website_title]["folders"]["website"]["images"][$key] = [
			"root" => $website["folders"]["images"]["root"].$item."/".File::Sanitize($website_title)."/",
		];

		$website["dictionary"][$website_title]["folders"]["local_website"]["images"][$key] = [
			"root" => $folders["mega"]["websites"]["images"]["root"].$item."/".File::Sanitize($website_title)."/",
		];
	}

	# Define Mega website texts folder
	$website["dictionary"][$website_title]["folders"]["website"]["texts"] = [
		"root" => $website["folders"]["texts"]["root"].File::Sanitize($website_title)."/",
	];

	# PHP website PHP folder
	$website["dictionary"][$website_title]["folders"]["php"] = [
		"root" => $folders["php"]["websites"]["root"].File::Sanitize($website_title)."/",
	];

	Folder::Create($website["dictionary"][$website_title]["folders"]["php"]["root"]);

	# PHP website tabs folder
	$website["dictionary"][$website_title]["folders"]["php"]["tabs"] = $website["dictionary"][$website_title]["folders"]["php"]["root"]."Tabs/";

	# PHP website JSON file
	$website["dictionary"][$website_title]["folders"]["php"]["website"] = $website["dictionary"][$website_title]["folders"]["php"]["root"]."Website.json";

	# PHP website PHP file
	$website["dictionary"][$website_title]["folders"]["php"]["website_php"] = $website["dictionary"][$website_title]["folders"]["php"]["root"]."Website.php";

	# Read website JSON file
	$website["dictionary"][$website_title]["json"] = File::JSON($website["dictionary"][$website_title]["folders"]["php"]["website"]);

	$website["dictionary"][$website_title]["titles"]["language"] = $website["dictionary"][$website_title]["titles"][$language];

	# Add "My" text to year website titles
	if (in_array($website_title, $website["years"]) == True) {
		$website["dictionary"][$website_title]["titles"]["language"] = $website["language_texts"]["my, title()"]." ".$website["dictionary"][$website_title]["titles"]["language"];
	}

	$website["dictionary"][$website_title]["titles"]["sanitized"] = str_replace('"', "'", $website["dictionary"][$website_title]["titles"]["language"]);

	# Define website title with icon
	$website["dictionary"][$website_title]["titles"]["icon"] = $website["dictionary"][$website_title]["titles"]["language"];

	# Add book icon to story websites
	if ($website_title == "Stories" or in_array($website_title, $stories["titles"]["en"]) == True) {
		$website["dictionary"][$website_title]["titles"]["icon"] .= " ".$website["icons"]["book"];
	}

	# Add calendar days icon to year websites
	if ($website_title == "Years" or in_array($website_title, $website["years"])) {
		$website["dictionary"][$website_title]["titles"]["icon"] .= " ".$website["icons"]["calendar_days"];
	}

	$website["dictionary"][$website_title]["link"] = $website["url"].$website_link."/";

	# Define website links
	$website["dictionary"][$website_title]["links"] = [];

	foreach ($Language -> languages["small"] as $local_language) {
		$website["dictionary"][$website_title]["links"][$local_language] = $website["dictionary"][$website_title]["link"].$local_language."/";
	}

	$website["dictionary"][$website_title]["links"]["language"] = $website["dictionary"][$website_title]["link"].$Language -> user_language."/";

	$website["dictionary"][$website_title]["links"]["element"] = HTML::Element("a", '"'.$website["dictionary"][$website_title]["titles"]["language"].'"', 'href="'.$website["dictionary"][$website_title]["links"]["language"].'" target="_blank"', "text_".$website["dictionary"][$website_title]["json"]["style"]["theme"]["dark"]);

	$website["dictionary"][$website_title]["links"]["element_no_quotes"] = HTML::Element("a", $website["dictionary"][$website_title]["titles"]["language"], 'href="'.$website["dictionary"][$website_title]["links"]["language"].'" target="_blank"', "text_".$website["dictionary"][$website_title]["json"]["style"]["theme"]["dark"]);

	if (isset($website["dictionary"][$website_title]["json"]["tabs"]) == True) {
		$website["dictionary"][$website_title]["tabs"] = $website["dictionary"][$website_title]["json"]["tabs"];
	}

	if (file_exists($website["dictionary"][$website_title]["folders"]["php"]["website"]) == False) {
		$text = File::Contents($folders["php"]["json"]["website_template"], $add_br = False)["string"];

		File::Edit($website["dictionary"][$website_title]["folders"]["php"]["website"], $text, "w");
	}

	# Define website style
	$items = [
		"background",
		"text",
		"border_1px",
		"border_2px",
		"border_3px",
		"border_4px",
		"box_shadow",
	];

	$types = [
		"theme",
		"secondary_theme",
	];

	# Define website style dictionary
	$website["dictionary"][$website_title]["style"] = [
		"background" => [
			"black" => "background_black",
		],
		"text" => [
			"black" => "text_black",
		],
		"border_radius" => "border_radius_15_cent",
		"border_radius_image" => "border_radius_8_cent",
	];

	if (isset($website["dictionary"][$website_title]["json"]["border_radius_image"]) == True) {
		$website["dictionary"][$website_title]["style"]["border_radius_image"] = $website["dictionary"][$website_title]["json"]["border_radius_image"];
	}

	# Define default border color
	$website["dictionary"][$website_title]["style"]["border_color"] = "light";

	# Define border color from JSON
	if (isset($website["dictionary"][$website_title]["json"]["border_color"]) == True) {
		$website["dictionary"][$website_title]["style"]["border_color"] = $website["dictionary"][$website_title]["json"]["border_color"];
	}

	# Define default box shadow
	$website["dictionary"][$website_title]["style"]["box_shadow_color"] = "light";

	# Define box shadow from JSON
	if (isset($website["dictionary"][$website_title]["json"]["box_shadow_color"]) == True) {
		$website["dictionary"][$website_title]["style"]["box_shadow_color"] = $website["dictionary"][$website_title]["json"]["box_shadow_color"];
	}

	# Define each type of each style item
	foreach ($items as $item) {
		# Add black border to border item array
		if (isset($website["dictionary"][$website_title]["style"][$item]["black"]) == False) {
			$website["dictionary"][$website_title]["style"][$item]["black"] = $item;

			if (strpos($item, "border") === 0) {
				$website["dictionary"][$website_title]["style"][$item]["black"] .= " border_color_black";
			}

			if ($item == "box_shadow") {
				$website["dictionary"][$website_title]["style"][$item]["black"] .= "_black";
			}
		}

		foreach ($types as $type) {
			# Define type
			$website["dictionary"][$website_title]["style"][$item][$type] = $website["dictionary"][$website_title]["json"]["style"][$type];

			# Add item to each color from the style type
			foreach (array_keys($website["dictionary"][$website_title]["style"][$item][$type]) as $key) {
				if (strpos($item, "border") === False and strpos($item, "box_shadow") === False) {
					$website["dictionary"][$website_title]["style"][$item][$type][$key] = $item."_".$website["dictionary"][$website_title]["style"][$item][$type][$key];
				}

				if (strpos($item, "border") === 0) {
					$website["dictionary"][$website_title]["style"][$item][$type][$key] = $item." border_color_".$website["dictionary"][$website_title]["style"][$item][$type][$key];
				}

				if (strpos($item, "box_shadow") === 0) {
					$website["dictionary"][$website_title]["style"][$item][$type][$key] = $item."_".$website["dictionary"][$website_title]["style"][$item][$type][$key];
				}
			}
		}
	}

	foreach (array_keys($website["dictionary"][$website_title]["json"]["style"]) as $key) {
		if (in_array($key, $types) == False) {
			$website["dictionary"][$website_title]["style"][$key] = $website["dictionary"][$website_title]["json"]["style"][$key];
		}
	}

	$website["dictionary"][$website_title]["style"]["text_highlight"] = $website["dictionary"][$website_title]["json"]["style"]["theme"]["light"];

	if (isset($website["dictionary"][$website_title]["json"]["style"]["text_highlight"]) == True) {
		$website["dictionary"][$website_title]["style"]["text_highlight"] = $website["dictionary"][$website_title]["json"]["style"]["text_highlight"];
	}

	$website["dictionary"][$website_title]["style"]["text_highlight"] = "text_".$website["dictionary"][$website_title]["style"]["text_highlight"];

	$website["dictionary"][$website_title]["style"]["body"] = $website["dictionary"][$website_title]["style"]["background"]["secondary_theme"]["dark"];

	$types = [
		"black",
		"theme",
		"secondary_theme",
	];

	$website["dictionary"][$website_title]["style"]["img"] = [];

	# Define website image themes
	foreach ($types as $type) {
		if (is_array($website["dictionary"][$website_title]["style"]["border_4px"][$type]) === False) {
			$website["dictionary"][$website_title]["style"]["img"][$type] = "image_size ".$website["dictionary"][$website_title]["style"]["border_4px"][$type];
	
			$website["dictionary"][$website_title]["style"]["img"][$type] .= " ".$website["dictionary"][$website_title]["style"]["border_radius_image"];
		}

		if (is_array($website["dictionary"][$website_title]["style"]["border_4px"][$type]) === True) {
			foreach (array_keys($website["dictionary"][$website_title]["style"]["border_4px"][$type]) as $key) {
				$website["dictionary"][$website_title]["style"]["img"][$type][$key] = "image_size ";

				$website["dictionary"][$website_title]["style"]["img"][$type][$key] .= $website["dictionary"][$website_title]["style"]["border_4px"][$type][$key];

				$website["dictionary"][$website_title]["style"]["img"][$type][$key] .= " ".$website["dictionary"][$website_title]["style"]["border_radius_image"];
			}
		}
	}

	# Define website button themes
	$website["dictionary"][$website_title]["style"]["button"] = [];

	foreach ($types as $type) {
		if (is_array($website["dictionary"][$website_title]["style"]["border_4px"][$type]) === False) {
			$website["dictionary"][$website_title]["style"]["button"][$type] = $website["dictionary"][$website_title]["style"]["background"]["theme"]["normal"]." ".$website["dictionary"][$website_title]["style"]["text"]["black"]." ".$website["dictionary"][$website_title]["style"]["border_4px"]["black"]." background_hover_white";
		}

		if (is_array($website["dictionary"][$website_title]["style"]["border_4px"][$type]) === True) {
			foreach (array_keys($website["dictionary"][$website_title]["style"]["border_4px"][$type]) as $key) {
				$website["dictionary"][$website_title]["style"]["button"][$type][$key] = $website["dictionary"][$website_title]["style"]["background"][$type][$key]." ".$website["dictionary"][$website_title]["style"]["text"]["theme"]["dark"]." ".$website["dictionary"][$website_title]["style"]["border_4px"][$type]["dark"]." box_shadow_".$website["dictionary"][$website_title]["json"]["style"][$type][$key]." background_hover_white";
			}
		}
	}

	$website["dictionary"][$website_title]["style"]["radio"] = "border_radius_30_cent";

	$website["dictionary"][$website_title]["style"]["radio_input"] = "margin_bottom_20px transform_scale_2";

	$website["dictionary"][$website_title]["style"]["header"] = $website["dictionary"][$website_title]["style"]["background"]["black"]." ".$website["dictionary"][$website_title]["style"]["text"]["secondary_theme"]["normal"]." ".$website["dictionary"][$website_title]["style"]["border_4px"]["theme"]["light"]." ".$website["dictionary"][$website_title]["style"]["border_radius"];

	$border_color = $website["dictionary"][$website_title]["style"]["border_color"];

	$website["dictionary"][$website_title]["style"]["box_shadow_class"] = $website["dictionary"][$website_title]["style"]["box_shadow"]["theme"][$website["dictionary"][$website_title]["style"]["box_shadow_color"]];

	$website["dictionary"][$website_title]["style"]["tab"] = [
		"black" => "header_size ".$website["dictionary"][$website_title]["style"]["background"]["black"]." ".$website["dictionary"][$website_title]["style"]["text"]["secondary_theme"]["normal"]." ".$website["dictionary"][$website_title]["style"]["border_4px"]["theme"]["light"]." padding_bottom_1_cent margin_bottom_2_cent height_auto w3-animate-zoom",

		"theme" => "header_size ".$website["dictionary"][$website_title]["style"]["background"]["theme"]["normal"]." ".$website["dictionary"][$website_title]["style"]["text"]["black"]." ".$website["dictionary"][$website_title]["style"]["border_4px"]["theme"]["light"]." ".$website["dictionary"][$website_title]["style"]["border_radius"]." padding_bottom_1_cent margin_bottom_2_cent height_auto w3-animate-zoom",

		"theme_dark" => "header_size ".$website["dictionary"][$website_title]["style"]["background"]["theme"]["normal"]." ".$website["dictionary"][$website_title]["style"]["text"]["theme"]["dark"]." ".$website["dictionary"][$website_title]["style"]["border_4px"]["theme"][$border_color]." ".$website["dictionary"][$website_title]["style"]["box_shadow_class"]." ".$website["dictionary"][$website_title]["style"]["border_radius"]." padding_bottom_1_cent margin_bottom_2_cent height_auto w3-animate-zoom",
	];

	$website["dictionary"][$website_title]["style"]["tab"]["black"] = $website["dictionary"][$website_title]["style"]["tab"]["theme_dark"];

	# Define website style as the style of the selected website
	if ($website_title == $website["website"]) {
		$website["style"] = array_merge($website["style"], $website["dictionary"][$website_title]["style"]);
	}

	# Define website image
	$website["dictionary"][$website_title]["image"] = [];
	$website["dictionary"][$website_title]["image"]["format"] = "png";

	# Define website image link
	$website["dictionary"][$website_title]["image"]["link"] = $website["folders"]["images"]["icons"]["root"];

	if (strpos($website_title, "My Little Pony") === False) {
		$website["dictionary"][$website_title]["image"]["link"] .= $website_title;
	}

	if (strpos($website_title, "My Little Pony") !== False) {
		$explode = explode(": ", $website_title);

		$website["dictionary"][$website_title]["image"]["link"] .= $explode[0]."/".$explode[1];
	}

	$website["dictionary"][$website_title]["image"]["link"] .= ".".$website["dictionary"][$website_title]["image"]["format"];

	# Define website image link for stories
	if ($website["dictionary"][$website_title]["type"] == "Story") {
		# Check for story cover in root folder
		$local_folder = $folders["mega"]["websites"]["images"]["story_covers"]["root"].$website_title."/";
		$folder = $website["folders"]["images"]["story_covers"]["root"].$website_title."/";

		$file_name = "Cover";

		$formats = [
			"png",
			"jpg",
			"gif",
		];

		foreach ($formats as $format) {	
			$local_image = $local_folder.$file_name.".".$format;
			$local_image_per_language = $local_folder.$full_language."/".$file_name.".".$format;

			if (file_exists($local_image) or file_exists($local_image_per_language)) {
				$website["dictionary"][$website_title]["image"]["format"] = $format;
			}
		}

		if (file_exists($local_folder.$file_name.".".$website["dictionary"][$website_title]["image"]["format"]) == True) {
			$website["dictionary"][$website_title]["image"]["link"] = $folder.$file_name.".".$website["dictionary"][$website_title]["image"]["format"];
		}

		if (file_exists($local_folder.$file_name.".".$website["dictionary"][$website_title]["image"]["format"]) == False) {
			$website["dictionary"][$website_title]["image"]["link"] = $folder.$full_language."/".$file_name.".".$website["dictionary"][$website_title]["image"]["format"];
		}
	}

	$website["dictionary"][$website_title]["image"]["local_link"] = str_replace($website["url"], $folders["mega"]["websites"]["root"], $website["dictionary"][$website_title]["image"]["link"]);

	$website["dictionary"][$website_title]["image"]["element"] = HTML::Element("img", "", 'src="'.$website["dictionary"][$website_title]["image"]["link"].'" style="height: auto;"', $website["dictionary"][$website_title]["style"]["box_shadow"]["theme"][$website["dictionary"][$website_title]["style"]["box_shadow_color"]]." ".$website["dictionary"][$website_title]["style"]["img"]["theme"]["normal"])."<br />"."\n";

	if (isset($website["dictionary"][$website_title]["json"]["image_width"]) == True) {
		$website["dictionary"][$website_title]["image"]["element"] = str_replace("image_size ", "", $website["dictionary"][$website_title]["image"]["element"]);
		$website["dictionary"][$website_title]["image"]["element"] = str_replace("height: auto;", "max-width: ".$website["dictionary"][$website_title]["json"]["image_width"]."; height: auto;", $website["dictionary"][$website_title]["image"]["element"]);
	}

	# Define website image elements for style
	$types = [
		"black",
		"theme",
		"secondary_theme",
	];

	# Define website image element themes
	$website["dictionary"][$website_title]["image"]["elements"] = [];

	foreach ($types as $type) {
		if ($type == "black") {
			$website["dictionary"][$website_title]["image"]["elements"][$type] = "";

			$website["dictionary"][$website_title]["image"]["elements"][$type] = HTML::Element("img", "", 'src="'.$website["dictionary"][$website_title]["image"]["link"].'" style="height: auto;"', $website["dictionary"][$website_title]["style"]["box_shadow"]["theme"]["light"]." ".$website["dictionary"][$website_title]["style"]["img"]["black"])."<br />"."\n";

			if (isset($website["dictionary"][$website_title]["json"]["image_width"]) == True) {
				$website["dictionary"][$website_title]["image"]["elements"][$type] = str_replace("image_size ", "", $website["dictionary"][$website_title]["image"]["elements"][$type]);
				$website["dictionary"][$website_title]["image"]["elements"][$type] = str_replace("height: auto;", "max-width: ".$website["dictionary"][$website_title]["json"]["image_width"]."; height: auto;", $website["dictionary"][$website_title]["image"]["elements"][$type]);
			}
		}

		if ($type != "black") {
			foreach (array_keys($website["dictionary"][$website_title]["style"]["img"][$type]) as $key) {
				$website["dictionary"][$website_title]["image"]["elements"][$type][$key] = "";

				$website["dictionary"][$website_title]["image"]["elements"][$type][$key] = HTML::Element("img", "", 'src="'.$website["dictionary"][$website_title]["image"]["link"].'" style="height: auto;"', $website["dictionary"][$website_title]["style"]["box_shadow"]["theme"][$key]." ".$website["dictionary"][$website_title]["style"]["img"]["theme"][$key])."<br />"."\n";

				if (isset($website["dictionary"][$website_title]["json"]["image_width"]) == True) {
					$website["dictionary"][$website_title]["image"]["elements"][$type][$key] = str_replace("image_size ", "", $website["dictionary"][$website_title]["image"]["elements"][$type][$key]);
					$website["dictionary"][$website_title]["image"]["elements"][$type][$key] = str_replace("height: auto;", "max-width: ".$website["dictionary"][$website_title]["json"]["image_width"]."; height: auto;", $website["dictionary"][$website_title]["image"]["elements"][$type][$key]);
				}
			}
		}
	}

	# Define website description
	$website["dictionary"][$website_title]["description"] = [
		"html" => "",
		"header" => "",
	];

	if (isset($website["dictionary"][$website_title]["json"]["descriptions"]) == True) {
		$website["dictionary"][$website_title]["description"]["html"] = $Language -> Item($website["dictionary"][$website_title]["json"]["descriptions"]["html"]);

		if (strpos($website["dictionary"][$website_title]["description"]["html"], "{website_title}") !== False) {
			$website["dictionary"][$website_title]["description"]["html"] = str_replace("{website_title}", $website["dictionary"][$website_title]["titles"]["language"], $website["dictionary"][$website_title]["description"]["html"]);
		}

		if (strpos($website["dictionary"][$website_title]["description"]["html"], "{author}") !== False) {
			$website["dictionary"][$website_title]["description"]["html"] = str_replace("{author}", $website["website_author"], $website["dictionary"][$website_title]["description"]["html"]);
		}

		$website["dictionary"][$website_title]["description"]["html"] = str_replace("\n", "<br />", $website["dictionary"][$website_title]["description"]["html"]);
	}

	if (isset($website["dictionary"][$website_title]["json"]["descriptions"]) == True) {
		$website["dictionary"][$website_title]["description"]["header"] = $Language -> Item($website["dictionary"][$website_title]["json"]["descriptions"]["header"]);

		if (strpos($website["dictionary"][$website_title]["description"]["header"], "{website_title}") !== False) {
			$website["dictionary"][$website_title]["description"]["header"] = str_replace("{website_title}", HTML::Element("span", $website["dictionary"][$website_title]["titles"]["language"], "", $website["dictionary"][$website_title]["style"]["text_highlight"]), $website["dictionary"][$website_title]["description"]["header"]);
		}

		if (strpos($website["dictionary"][$website_title]["description"]["header"], "{author}") !== False) {
			$website["dictionary"][$website_title]["description"]["header"] = str_replace("{author}", $website["painted_author"], $website["dictionary"][$website_title]["description"]["header"]);
		}

		$website["dictionary"][$website_title]["description"]["header"] = str_replace("\n", "<br />", $website["dictionary"][$website_title]["description"]["header"]);
	}

	# Define story website description
	if ($website["dictionary"][$website_title]["type"] == "Story") {
		# Define website HTML description for story websites
		$website["dictionary"][$website_title]["description"]["html"] = Text::Format($website["language_texts"]["website_about_my_story_{}_made_by_izaque_sanvezzo_stake2_funkysnipa_cat"], $website["dictionary"][$website_title]["titles"]["language"]);

		$language = $Language -> user_language;

		if ($language == "general") {
			$language = "en";
		}

		# Define synopsis
		$synopsis = str_replace("\n", "<br />"."\n"."\t\t", $website["dictionary"][$website_title]["story"]["Information"]["Synopsis"][$language]);
		$synopsis = str_replace($website["dictionary"][$website_title]["titles"][$language], HTML::Element("span", $website["dictionary"][$website_title]["titles"][$language], "", $website["dictionary"][$website_title]["style"]["text_highlight"]), $synopsis);

		# Define website header description for story websites
		$website["dictionary"][$website_title]["description"]["header"] = "\t\t".'<!-- Story website info, author(s), chapters, readers, creation date, status -->'."\n".
		"\t\t".$website["language_texts"]["synopsis, title()"].": ".$website["icons"]["scroll"]." ".$synopsis."<br />"."\n";

		$website["dictionary"][$website_title]["description"]["header"] .= "\t\t"."---<br />"."\n";

		# Add painted author
		$text = $website["language_texts"]["story_author"];
		$author = HTML::Element("span", $website["dictionary"][$website_title]["story"]["Information"]["Author"], "", "text_orange");

		# Add painted authors if there are more than one
		if (substr_count($website["dictionary"][$website_title]["story"]["Information"]["Author"], "\n") > 0) {
			$count = substr_count($website["dictionary"][$website_title]["story"]["Information"]["Author"], "\n");

			$text = $website["language_texts"]["story_authors"];

			$authors = "";

			foreach ($stories["authors"] as $author) {
				if (strpos($website["dictionary"][$website_title]["story"]["Information"]["Author"], $author) !== False) {
					$authors .= $stories["painted_authors"][$author];

					if ($count > 1 and $author != array_reverse($stories["authors"])[0]) {
						$authors .= ", ";
					}

					if ($count <= 1 and $author == $stories["authors"][0] or $count > 1 and $author == $stories["authors"][1]) {
						$authors .= " ".$website["language_texts"]["and"]." ";
					}
				}
			}

			$author = $authors;
		}

		$website["dictionary"][$website_title]["description"]["header"] .= "\t\t".$text.": ".$website["icons"]["pen"]." ".$author."<br />"."\n";

		# Add chapters
		$website["dictionary"][$website_title]["description"]["header"] .= "\t\t".$website["language_texts"]["chapters, title()"].": ".$website["icons"]["book"]." ";

		$website["dictionary"][$website_title]["description"]["header"] .= HTML::Element("span", $website["dictionary"][$website_title]["story"]["Information"]["Chapter number"], "", $website["dictionary"][$website_title]["style"]["text_highlight"])."<br />"."\n";

		# Add readers if they exist
		if ($website["dictionary"][$website_title]["story"]["Information"]["Readers"][0] != $website["texts"]["no_readers, en - pt"]) {
			$website["dictionary"][$website_title]["description"]["header"] .= "\t\t".$website["language_texts"]["readers, title()"].": ".$website["icons"]["reader"]." ";
			$website["dictionary"][$website_title]["description"]["header"] .= HTML::Element("span", count($website["dictionary"][$website_title]["story"]["Information"]["Readers"]), "", $website["dictionary"][$website_title]["style"]["text_highlight"])."<br />"."\n";
		}

		# Add story creation date
		$website["dictionary"][$website_title]["description"]["header"] .= "\t\t".$website["language_texts"]["story_creation_date"].": ".$website["icons"]["calendar_days"]." ";

		$date = Date::Now($website["dictionary"][$website_title]["story"]["Information"]["Creation date"], $website["texts"]["date_format"]["pt"])[$website["language_texts"]["date_format"]];

		$website["dictionary"][$website_title]["description"]["header"] .= HTML::Element("span", $date, "", $website["dictionary"][$website_title]["style"]["text_highlight"])."<br />"."\n";

		# Add status
		$status_number = $website["dictionary"][$website_title]["story"]["Information"]["Status number"];
		$status = $website["language_texts"]["status, type: list"][$status_number];

		$website["dictionary"][$website_title]["description"]["header"] .= "\t\t".$website["language_texts"]["status, title()"].": ".$website["icons"]["status_map"][$status_number]." ";

		$website["dictionary"][$website_title]["description"]["header"] .= HTML::Element("span", $status, "", $website["dictionary"][$website_title]["style"]["text_highlight"]);

		# Update website title with icon
		$website["dictionary"][$website_title]["titles"]["icon"] .= " ".$website["icons"]["status_map"][$status_number];

		# Add Wattpad link if it exists
		if (isset($website["dictionary"][$website_title]["story"]["Information"]["Wattpad"]["links"]) == True) {
			$link = $website["dictionary"][$website_title]["story"]["Information"]["Wattpad"]["links"][$language];

			$website["dictionary"][$website_title]["description"]["header"] .= "<br />"."\n";
			$website["dictionary"][$website_title]["description"]["header"] .= "\t\t"."Wattpad: ";

			$website["dictionary"][$website_title]["description"]["header"] .= HTML::Element("a", $link, 'href="'.$link.'" target="_new"', $website["dictionary"][$website_title]["style"]["text_highlight"]);
		}

		$website["dictionary"][$website_title]["description"]["header"] .= "\n";
	}

	# Define website color
	$website["dictionary"][$website_title]["color"] = "#";

	if (isset($website["dictionary"][$website_title]["json"]["color"]) == True) {
		$website["dictionary"][$website_title]["color"] .= $website["dictionary"][$website_title]["json"]["color"];
	}

	# Define story website color
	if ($website["dictionary"][$website_title]["type"] == "Story") {
		$website["dictionary"][$website_title]["color"] .= $website["dictionary"][$website_title]["story"]["Information"]["HEX color"];
	}

	# Create website link button
	$h2 = HTML::Element("h2", "\n\t\t\t\t".$website["dictionary"][$website_title]["titles"]["icon"]."\n\t\t\t", "", "text_size")."\n";

	$button = "\n"."\t\t".'<!-- "'.$website_title.'" link button -->'."\n".
	"\t\t".HTML::Element("button", "\n\t\t\t".$h2."\t\t", ' onclick="window.open(\''.$website["dictionary"][$website_title]["links"]["language"].'\')" style="border-radius: 50px;"', "w3-btn ".$website["dictionary"][$website_title]["style"]["button"]["theme"]["light"]);

	if ($website_title == $website["website"]) {
		$button = str_replace('window.open(\''.$website["dictionary"][$website_title]["links"]["language"].'\')"', "", $button);
		$button = str_replace($website["dictionary"][$website_title]["titles"]["icon"], $website["dictionary"][$website_title]["titles"]["icon"]." (".$website["language_texts"]["you_are_here"].")", $button);
	}

	$website["dictionary"][$website_title]["button"] = $button;

	$website["website_buttons"] .= $button."\n";

	$website["dictionary"][str_replace(" ", "_", strtolower($website_title))] = $website["dictionary"][$website_title];

	$i++;
}

?>