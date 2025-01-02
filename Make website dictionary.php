<?php

# Make website dictionary

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $website["full_language"];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

$story_titles = $stories["Titles"]["en"];

# Add the websites to the website dictionary
$website_number = 0;
foreach ($websites["List"]["en"] as $website_title) {
	# Define the current Website dictionary
	$website["Dictionary"][$website_title] = [
		"title" => $website_title,
		"titles" => []
	];

	# Define the verbose text
	$verbose_text = "Site: ".'"'.$website_title.'"'."\n";

	# Define the "website_dictionary" variable for faster typing
	$website_dictionary = $website["Dictionary"][$website_title];

	$website["States"]["Website"]["Parent"] = False;

	$parent = [];

	# Process Website configuration
	if (isset($websites["Configuration"][$website_title])) {
		$website_configuration = $websites["Configuration"][$website_title];

		# Parent website configuration
		if (isset($website_configuration["Parent"]) == True) {
			$parent = $website_configuration["Parent"];

			# Define Parent website language titles if they do not exist
			if (isset($parent["Titles"]) == False) {
				$parent["Titles"] = [];

				foreach ($website["small_languages"] as $local_language) {
					$parent["Titles"][$local_language] = $parent["Title"];
				}

				$parent["Titles"]["Language"] = $Language -> Item($parent["Titles"]);
			}

			# Define the Parent website folder
			if (isset($parent["Folder name"]) == False) {
				$parent["Folder name"] = $parent["Title"];
			}

			# Define the Parent type
			$parent["Type"] = "Website";

			$website["States"]["Website"]["Parent"] = True;
		}
	}

	# Define the language website titles
	foreach ($website["small_languages"] as $local_language) {
		if (isset($websites["List"][$local_language]) == True) {
			$title = $websites["List"][$local_language][$website_number];

			if ($website["States"]["Website"]["Parent"] == True) {
				$title = $parent["Titles"]["Language"].": ".$title;
			}

			$website_dictionary["titles"][$local_language] = $title;
		}
	}

	# Define the default website type as "Normal"
	$website_dictionary["type"] = "Normal";

	# Define the website type as "Story" if the website is a story website
	if (in_array($website_title, $story_titles) == True) {
		$website_dictionary["type"] = "Story";
	}

	# Define the website link
	$website_link = $website_title;

	$custom_website_link = "";

	# Parent story configuration
	if (
		$website_dictionary["type"] == "Story" and
		isset($stories["Dictionary"][$website_title]["Information"]["Parent story"])
	) {
		$parent = $stories["Dictionary"][$website_title]["Information"]["Parent story"];

		if (isset($parent["Folder name"]) == False) {
			$parent["Folder name"] = $parent["Title"];
		}

		# Define the website link with the Parent story folder
		$custom_website_link = $parent["Folder name"]."/".$website_link;

		# Define the Parent type
		$parent["Type"] = "Story";

		$website["States"]["Website"]["Parent"] = True;
	}

	# Parent website or story configuration
	if ($website["States"]["Website"]["Parent"] == True) {
		# If the website is not a story website
		if ($website_dictionary["type"] != "Story") {
			# Define the Website link with the Parent website folder
			$website_link = $parent["Folder name"]."/".$website_link;
		}

		# Define the Parent website folders
		$parent["Folders"] = [
			"Local" => $folders["Mega"]["Websites"]["root"].$parent["Folder name"]."/",
			"Remote" => $website["Folders"]["root"].$parent["Folder name"]."/"
		];

		$website_dictionary["Parent"] = $parent;
	}

	# Define website folders
	$website_dictionary["Folders"] = [];

	$link = $website_link;

	if (
		isset($custom_website_link) and
		$custom_website_link != ""
	) {
		$link = $custom_website_link;
	}

	$website_dictionary["Folders"]["Website"] = [
		"root" => $website["Folders"]["root"].$link."/"
	];

	$verbose_text .= "\n";

	$verbose_text .= "Link: ".'"'.$website_dictionary["Folders"]["Website"]["root"].'"'."\n";

	$verbose_text .= "\n";

	$website_dictionary["Folders"]["Website"]["Language"] = $website_dictionary["Folders"]["Website"]["root"];

	if ($website["language"] != "general") {
		$website_dictionary["Folders"]["Website"]["Language"] .= $website["language"]."/";
	}

	$website_dictionary["Folders"]["Local website"] = [
		"root" => $folders["Mega"]["Websites"]["root"].$link."/"
	];

	$Folder -> Create($website_dictionary["Folders"]["Local website"]["root"]);

	$website_dictionary["Folders"]["Local website"]["Language"] = $website_dictionary["Folders"]["Local website"]["root"];

	$Folder -> Create($website_dictionary["Folders"]["Local website"]["Language"]);

	if ($website["language"] != "general") {
		$website_dictionary["Folders"]["Local website"]["Language"] .= $website["language"]."/";
	}

	$Folder -> Create($website_dictionary["Folders"]["Local website"]["Language"]);

	# Define Mega Websites Images website image folders
	$names = [
		"Icons",
		"Images"
	];

	# Define the remote and local website image folders
	# (Old way of defining website image folders)
	$website_dictionary["Folders"]["Website"]["Website images"] = [];

	$website_dictionary["Folders"]["Local website"]["Images"] = [];

	foreach ($names as $item) {
		$website_dictionary["Folders"]["Website"]["Website images"][$item] = [
			"root" => $website["Folders"]["Images"]["root"].$item."/".$website_link."/"
		];

		$website_dictionary["Folders"]["Local website"]["Images"][$item] = [
			"root" => $folders["Mega"]["Websites"]["Images"]["root"].$item."/".$website_link."/"
		];
	}

	$website_dictionary["Folders"]["Website"]["Images"] = [];

	# Define the local unified website icons and images folder, with local and remote keys
	# (New way of defining website image folders, more organized)
	$dictionary = [
		"Local" => [],
		"Remote" => [],
		"Custom folders" => []
	];

	# Add the custom folders of the year websites
	if (in_array($website_title, $website["Years"]) == True) {
		array_push($dictionary["Custom folders"], "Pictures");
		array_push($dictionary["Custom folders"], "Memories");
	}

	# Add the custom folders of the story websites
	if ($website_dictionary["type"] == "Story") {
		array_push($dictionary["Custom folders"], "Chapters");
	}

	$keys = array_keys($dictionary);
	unset($keys[2]);
	$keys = array_values($keys);

	# Define each root folder
	foreach ($keys as $key) {
		# Local folder
		$folder = $folders["Mega"]["Websites"]["Images"]["root"];

		# Remote folder
		if ($key == "Remote") {
			$folder = $website["Folders"]["Images"]["root"];
		}

		if (
			$website["States"]["Website"]["Parent"] == True and
			$website_dictionary["Parent"]["Type"] == "Website"
		) {
			$folder .= $website_dictionary["Parent"]["Folder name"]."/";
		}

		# Define the root folder
		$dictionary[$key]["root"] = $folder.$website_title."/";

		# Create it
		$Folder -> Create($dictionary[$key]["root"]);

		# Define the "Icons" folder
		$dictionary[$key]["Icons"] = [
			"root" => $dictionary[$key]["root"]."Icons/"
		];

		if ($dictionary["Custom folders"] != []) {
			# Define other website image folders
			foreach ($dictionary["Custom folders"] as $custom_folder) {
				$dictionary[$key][$custom_folder] = [
					"root" => $dictionary[$key]["root"].$custom_folder."/"
				];

				$Folder -> Create($dictionary[$key][$custom_folder]["root"]);
			}	
		}
	}

	# Define the website images dictionary as the local dictionary used above
	$website_dictionary["Folders"]["Website"]["Images"] = $dictionary;

	# Define the "Texts" folder of the website
	$website_dictionary["Folders"]["Website"]["Texts"] = [
		"root" => $website["Folders"]["Texts"]["root"].$website_link."/"
	];

	# Define the "PHP" folder of the website
	$website_dictionary["Folders"]["PHP"] = [
		"root" => $folders["PHP"]["Websites"]["root"].$website_link."/"
	];

	$Folder -> Create($website_dictionary["Folders"]["PHP"]["root"]);

	# Add to the verbose text
	$verbose_text .= "Pastas:"."\n";

	if ($website_title != $website_link) {
		$verbose_text .= "\t"."Nome de pasta: ".'"'.$website_link.'"'."\n";
	}

	$verbose_text .= "\t"."PHP: ".'"'.$website_dictionary["Folders"]["PHP"]["root"].'"'."\n".
	"\t"."Sites: ".'"'.$website_dictionary["Folders"]["Local website"]["root"].'"'."\n";

	if ($website["States"]["Website"]["Parent"] == True) {
		$verbose_text .= "\n"."Parente: "."\n".
		"\t".'Título: "'.$website_dictionary["Parent"]["Title"].'"'."\n".
		"\t".'Pasta local: "'.$website_dictionary["Parent"]["Folders"]["Local"].'"'."\n".
		"\t".'Pasta remota: "'.$website_dictionary["Parent"]["Folders"]["Remote"].'"'."\n";
	}

	$verbose_text .= "\n";

	# Define the PHP folders and files
	$dictionary = [
		"Folders" => [
			"Descriptions",
			"Tabs"
		],
		"Files" => [
			"Website.json",
			"Website.php"
		]
	];

	# Define the PHP folders
	$folder = $website_dictionary["Folders"]["PHP"];

	foreach ($dictionary["Folders"] as $item) {
		$website_dictionary["Folders"]["PHP"][$item] = [
			"root" => $folder["root"].$item."/"
		];
	}

	# Define the PHP files
	foreach ($dictionary["Files"] as $item) {
		$key = explode(".", $item)[0];

		if (str_contains($item, "php")) {
			$key .= " (PHP)";
		}

		$website_dictionary["Folders"]["PHP"][$key] = $folder["root"].$item;
	}

	# Define the language website descriptions files
	foreach ($website["small_languages"] as $local_language) {
		$local_full_language = $Language -> languages["full"][$local_language];

		$website_dictionary["Folders"]["PHP"]["Descriptions"][$local_language] = $website_dictionary["Folders"]["PHP"]["Descriptions"]["root"].$local_full_language.".txt";
	}

	if (
		file_exists($website_dictionary["Folders"]["PHP"]["Website"]) == False or
		$File -> Contents($website_dictionary["Folders"]["PHP"]["Website"], $add_br = False, $add_n = False)["lines"] == []
	) {
		$text = $File -> Contents($folders["PHP"]["JSON"]["Website template"], $add_br = False, $add_n = False)["string"];

		$File -> Edit($website_dictionary["Folders"]["PHP"]["Website"], $text, "w");
	}

	# Read the website JSON file
	$website_dictionary["JSON"] = $JSON -> To_PHP($website_dictionary["Folders"]["PHP"]["Website"]);

	# Add the local website dictionary to the root websites dictionary with the website title as a key
	$website["Dictionary"][$website_title] = $website_dictionary;

	# Replace the spaces with underscores on the key and add to the website dictionary
	$website_title_replaced = str_replace(" ", "_", $website_title);

	$website["Dictionary"][$website_title_replaced] = $website_dictionary;

	# Add to the website number
	$website_number++;
}

# Re-run the while to define the variables of the websites
foreach ($websites["List"]["en"] as $website_title) {
	# Get the website dictionary
	$website_dictionary = $website["Dictionary"][$website_title];

	# If the website title is "Years"
	if ($website_dictionary["title"] == "Years") {
		# Define its style as the style of the website for the current year
		$website_dictionary["JSON"]["style"] = array_replace($website_dictionary["JSON"]["style"], $website["Dictionary"][$website["current_year"]]["JSON"]["style"]);
	}

	# Define website Generators folder
	if ($Folder -> Exist($website_dictionary["Folders"]["PHP"]["root"]."Generators/") == True) {
		$website_dictionary["Folders"]["PHP"]["Generators"] = [
			"root" => $website_dictionary["Folders"]["PHP"]["root"]."Generators/"
		];
	}

	if ($website_dictionary["type"] == "Story") {
		# Add the Story dictionary to the Website dictionary
		$website_dictionary["Story"] = $stories["Dictionary"][$website_title];

		# Create a chapter image folder for each chapter of the story

		# Define the chapter number
		$chapter_number = $website_dictionary["Story"]["Information"]["Chapters"]["Numbers"]["Total"];

		# Define the "i" number
		$i = 1;

		# Define the chapter images folders
		$local_folder = $website_dictionary["Folders"]["Website"]["Images"]["Local"]["Chapters"]["root"];

		$remote_folder = $website_dictionary["Folders"]["Website"]["Images"]["Remote"]["Chapters"]["root"];

		# Make the while loop
		while ($i <= $chapter_number) {
			# Add one to the local chapter number and make it a string
			$number = strval($i);

			# Define the chapter folder (Example: "01")
			$chapter_folder = strval(Text::Add_Leading_Zeroes($number))."/";

			# Define the local and remote chapter folders
			$local_chapter_folder = $local_folder.$chapter_folder;

			$remote_chapter_folder = $remote_folder.$chapter_folder;

			# Create the folder
			$Folder -> Create($local_chapter_folder);

			$website_dictionary["Folders"]["Website"]["Images"]["Local"]["Chapters"][$number] = [
				"root" => $local_chapter_folder
			];

			$website_dictionary["Folders"]["Website"]["Images"]["Remote"]["Chapters"][$number] = [
				"root" => $remote_chapter_folder
			];

			$i++;
		}
	}

	if (isset($website_dictionary["JSON"]["story"]) == True) {
		$key = $website_title;

		# Add the story dictionary to the website dictionary
		$folder = $folders["Mega"]["Notepad"][$key]["Story"]["root"];

		$creation_date_file = $folder.$website["Language texts (Module language)"]["creation_date"].".txt";
		$story_file = $folder."Story.json";
		$readers_file = $folders["Mega"]["Notepad"][$key]["Story"]["Readers"]["root"].$website["Language texts (Module language)"]["readers, title()"].".txt";
		$titles_file = $folder."Titles.json";

		$website_dictionary["Story"] = [
			"Titles" => $JSON -> To_PHP($titles_file),
			"Information" => $JSON -> To_PHP($story_file)
		];

		# Add the story synopsis
		$website_dictionary["Story"]["Information"]["Synopsis"] = [];

		foreach ($website["small_languages"] as $local_language) {
			$local_full_language = $Language -> languages["full"][$local_language];

			$file = $folders["Mega"]["Notepad"][$key]["Story"]["Synopsis"]["root"].$local_full_language.".txt";

			$website_dictionary["Story"]["Information"]["Synopsis"][$local_language] = $File -> Contents($file, $add_br = False)["string"];
		}

		# Get the creation date
		$website_dictionary["Story"]["Information"]["Creation date"] = $File -> Contents($creation_date_file)["lines"][0];

		$contents = $File -> Contents($readers_file);

		# Get the "Readers" dictionary
		$website_dictionary["Story"]["Information"]["Readers"] = [
			"Number" => $contents["length"],
			"List" => $contents["lines"]
		];

		$english_story_title = $website_dictionary["Story"]["Titles"]["en"];

		# Add the English Story title to the "List" array of the Stories dictionary
		array_push($stories["List"], $english_story_title);

		# Add each language story title to the specific language array of the Stories "titles" dictionary
		foreach ($website["small_languages"] as $local_language) {
			$language_story_title = $website_dictionary["Story"]["Titles"][$local_language];

			array_push($stories["Titles"][$local_language], $language_story_title);
		}

		# Add each language story title to the "All" array of the Stories "titles" dictionary
		foreach (array_values($website_dictionary["Story"]["Titles"]) as $story_title) {
			array_push($stories["Titles"]["All"], $story_title);
		}
	}

	$website_dictionary["titles"]["language"] = $website_dictionary["titles"][$language];

	# Add "My" text to year website titles
	if (in_array($website_title, $website["Years"]) == True) {
		$website_dictionary["titles"]["language"] = $website["Language texts"]["my, title()"]." ".$website_dictionary["titles"]["language"];
	}

	if (isset($website_dictionary["JSON"]["titles"]) == True) {
		foreach ($website["small_languages"] as $local_language) {
			if (isset($website_dictionary["JSON"]["titles"][$local_language]) == True) {
				$website_dictionary["titles"][$local_language] = $website_dictionary["JSON"]["titles"][$local_language];
			}
		}

		$website_dictionary["titles"]["language"] = $website_dictionary["titles"][$language];
	}

	if (isset($website_dictionary["JSON"]["title"]) == True) {
		$website_dictionary["titles"]["language"] = $website_dictionary["JSON"]["title"];
	}

	$website_dictionary["titles"]["sanitized"] = str_replace('"', "'", $website_dictionary["titles"]["language"]);

	# Define website title with icon
	$website_dictionary["titles"]["icon"] = $website_dictionary["titles"]["language"];

	# Add the book icon to story websites
	if (
		$website_title == "Stories" or
		in_array($website_title, $stories["Titles"]["en"]) == True
	) {
		$website_dictionary["titles"]["icon"] .= " ".$website["Icons"]["book"];
	}

	# Add the "calendar days" icon to year websites
	if (
		$website_title == "Years" or
		in_array($website_title, $website["Years"])
	) {
		$website_dictionary["titles"]["icon"] .= " ".$website["Icons"]["calendar_days"];
	}

	if (isset($website_dictionary["JSON"]["icon"]) == True) {
		$website_dictionary["titles"]["icon"] .= " ".$website["Icons"][$website_dictionary["JSON"]["icon"]];
	}

	$website_dictionary["link"] = $website["URL"].$link."/";

	# Define website links
	$website_dictionary["Links"] = [];

	foreach ($website["small_languages"] as $local_language) {
		$website_dictionary["Links"][$local_language] = $website_dictionary["link"].$local_language."/";
	}

	$website_dictionary["Links"]["Language"] = $website_dictionary["link"];

	if ($website["language"] != "general") {
		$website_dictionary["Links"]["Language"] .= $language."/";
	}

	if (
		$website["States"]["Website"]["Generate"] == False and
		$website["States"]["Website"]["Change website link"	] == True
	) {
		$new_link = $Text -> Format($website["Local URL"]["Code"]["Templates"]["With tab"], $website_dictionary["title"]);

		$website_dictionary["Links"]["Language"] = explode("&tab=", $new_link)[0];
	}

	# Define the default text highlight variable if it is present
	if (isset($website_dictionary["JSON"]["style"]["text_highlight"]) == True) {
		$text_highlight = "text_".$website_dictionary["JSON"]["style"]["text_highlight"];
	}

	# Define the text highlight as the white text if it is not present
	else {
		$text_highlight = "text_white";
	}

	# Define the link element
	$website_dictionary["Links"]["Element"] = HTML::Element("a", '"'.$website_dictionary["titles"]["language"].'"', 'href="'.$website_dictionary["Links"]["Language"].'" target="_blank"', $text_highlight);

	# Define the link element without quotes
	$website_dictionary["Links"]["Element (no quotes)"] = HTML::Element("a", $website_dictionary["titles"]["language"], 'href="'.$website_dictionary["Links"]["Language"].'" target="_blank"', $text_highlight);

	# Define the link element without quotes, with no spaces on the key
	$website_dictionary["Links"]["Element_(no_quotes)"] = $website_dictionary["Links"]["Element (no quotes)"];

	if (isset($website_dictionary["JSON"]["tabs"]) == True) {
		$website_dictionary["tabs"] = $website_dictionary["JSON"]["tabs"];
	}

	# Define website style
	$items = [
		"background",
		"text",
		"border_1px",
		"border_2px",
		"border_3px",
		"border_4px",
		"box_shadow"
	];

	$types = [
		"theme",
		"secondary_theme"
	];

	# Define website style dictionary
	$website_dictionary["Style"] = [
		"background" => [
			"black" => "background_black"
		],
		"text" => [
			"black" => "text_black"
		],
		"border_radius" => "border_radius_15_cent",
		"border_radius_image" => "border_radius_8_cent",
		"border_radius_website_image" => "border_radius_8_cent"
	];

	if (isset($website_dictionary["JSON"]["image"]) == False) {
		$website_dictionary["JSON"]["image"] = [];
	}

	if (
		isset($website_dictionary["JSON"]["image"]) == True and
		isset($website_dictionary["JSON"]["image"]["border_radius"])
	) {
		$website_dictionary["Style"]["border_radius_website_image"] = "border_radius_".$website_dictionary["JSON"]["image"]["border_radius"]."_cent";
	}

	if (isset($website_dictionary["JSON"]["image"]["box_shadow"]) == False) {
		$website_dictionary["JSON"]["image"]["box_shadow"] = True;
	}

	# Define default border color
	$website_dictionary["Style"]["border_color"] = "light";

	# Define border color from JSON
	if (isset($website_dictionary["JSON"]["style"]["border_color"]) == True) {
		$website_dictionary["Style"]["border_color"] = $website_dictionary["JSON"]["style"]["border_color"];
	}

	# Define default box shadow
	$website_dictionary["Style"]["box_shadow_color"] = "light";

	# Define box shadow from JSON
	if (isset($website_dictionary["JSON"]["box_shadow_color"]) == True) {
		$website_dictionary["Style"]["box_shadow_color"] = $website_dictionary["JSON"]["box_shadow_color"];
	}

	# Define each type of each style item
	foreach ($items as $item) {
		# Add black border to border item array
		if (isset($website_dictionary["Style"][$item]["black"]) == False) {
			$website_dictionary["Style"][$item]["black"] = $item;

			if (strpos($item, "border") === 0) {
				$website_dictionary["Style"][$item]["black"] .= " border_color_black";
			}

			if ($item == "box_shadow") {
				$website_dictionary["Style"][$item]["black"] .= "_black";
			}
		}

		foreach ($types as $type) {
			# Define type
			$website_dictionary["Style"][$item][$type] = $website_dictionary["JSON"]["style"][$type];

			# Add item to each color from the style type
			foreach (array_keys($website_dictionary["Style"][$item][$type]) as $key) {
				if (
					strpos($item, "border") === False and
					strpos($item, "box_shadow") === False
				) {
					$website_dictionary["Style"][$item][$type][$key] = $item."_".$website_dictionary["Style"][$item][$type][$key];
				}

				if (strpos($item, "border") === 0) {
					$website_dictionary["Style"][$item][$type][$key] = $item." border_color_".$website_dictionary["Style"][$item][$type][$key];
				}

				if (strpos($item, "box_shadow") === 0) {
					$website_dictionary["Style"][$item][$type][$key] = $item."_".$website_dictionary["Style"][$item][$type][$key];
				}
			}
		}
	}

	foreach (array_keys($website_dictionary["JSON"]["style"]) as $key) {
		if (in_array($key, $types) == False) {
			$website_dictionary["Style"][$key] = $website_dictionary["JSON"]["style"][$key];
		}
	}

	# Make a backup of the original dark text color
	$website_dictionary["Style"]["text"]["theme"]["Original dark"] = $website_dictionary["Style"]["text"]["theme"]["dark"];

	$website_dictionary["Style"]["text"]["theme"]["dark"] = "text_white";

	# Define text color from JSON
	if (isset($website_dictionary["JSON"]["style"]["text_color"]) == True) {
		$website_dictionary["Style"]["text"]["theme"]["dark"] = "text_".$website_dictionary["JSON"]["style"]["text_color"];
	}

	# Define the text highlight color
	$website_dictionary["Style"]["text_highlight"] = $website_dictionary["JSON"]["style"]["theme"]["light"];

	if (isset($website_dictionary["JSON"]["style"]["text_highlight"]) == True) {
		$website_dictionary["Style"]["text_highlight"] = $website_dictionary["JSON"]["style"]["text_highlight"];
	}

	# Define the button text color
	$website_dictionary["Style"]["button_text"] = $website_dictionary["Style"]["text"]["theme"]["dark"];

	if (isset($website_dictionary["JSON"]["style"]["button_text"]) == True) {
		$website_dictionary["Style"]["button_text"] = "text_".$website_dictionary["JSON"]["style"]["button_text"];
	}

	# Define the background hover color
	$website_dictionary["Style"]["background_hover"] = "background_hover_black";

	if (isset($website_dictionary["JSON"]["style"]["background_hover"]) == True) {
		$website_dictionary["Style"]["background_hover"] = "background_hover_".$website_dictionary["JSON"]["style"]["background_hover"];
	}

	# Define the text hover color
	$website_dictionary["Style"]["text_hover"] = "text_hover_".$website_dictionary["Style"]["text_highlight"];

	$website_dictionary["Style"]["text_highlight"] = "text_".$website_dictionary["Style"]["text_highlight"];

	# Define the default body background color
	$website_dictionary["Style"]["body"] = $website_dictionary["Style"]["background"]["secondary_theme"]["dark"];

	# If the "background_color" key is inside the JSON style dictionary
	if (isset($website_dictionary["JSON"]["style"]["background_color"]) == True) {
		$website_dictionary["Style"]["body"] = "background_".$website_dictionary["JSON"]["style"]["background_color"];
	}

	$types = [
		"black",
		"theme",
		"secondary_theme"
	];

	$website_dictionary["Style"]["img"] = [];

	# Define website image themes
	foreach ($types as $type) {
		if (is_array($website_dictionary["Style"]["border_4px"][$type]) === False) {
			$website_dictionary["Style"]["img"][$type] = "image_size";

			$text = " ".$website_dictionary["Style"]["border_4px"][$type];

			if (isset($website_dictionary["JSON"]["image"]) == True) {
				if (
					isset($website_dictionary["JSON"]["image"]["border"]) and
					$website_dictionary["JSON"]["image"]["border"] == True or
					isset($website_dictionary["JSON"]["image"]["border"]) == False
				) {
					$website_dictionary["Style"]["img"][$type] .= $text;
				}
			}

			if (isset($website_dictionary["JSON"]["image"]) == False) {
				$website_dictionary["Style"]["img"][$type] .= $text;
			}

			$website_dictionary["Style"]["img"][$type] .= " ".$website_dictionary["Style"]["border_radius_website_image"];
		}

		if (is_array($website_dictionary["Style"]["border_4px"][$type]) === True) {
			foreach (array_keys($website_dictionary["Style"]["border_4px"][$type]) as $key) {
				$website_dictionary["Style"]["img"][$type][$key] = "image_size";

				$text = " ".$website_dictionary["Style"]["border_4px"][$type][$key];

				if (isset($website_dictionary["JSON"]["image"]) == True) {
					if (
						isset($website_dictionary["JSON"]["image"]["border"]) and
						$website_dictionary["JSON"]["image"]["border"] == True or
						isset($website_dictionary["JSON"]["image"]["border"]) == False
					) {
						$website_dictionary["Style"]["img"][$type][$key] .= $text;
					}
				}

				if (isset($website_dictionary["JSON"]["image"]) == False) {
					$website_dictionary["Style"]["img"][$type][$key] .= $text;
				}

				$website_dictionary["Style"]["img"][$type][$key] .= " ".$website_dictionary["Style"]["border_radius_website_image"];
			}
		}
	}

	# Define website button themes
	$website_dictionary["Style"]["button"] = [];

	foreach ($types as $type) {
		if (is_array($website_dictionary["Style"]["border_4px"][$type]) === False) {
			$website_dictionary["Style"]["button"][$type] = $website_dictionary["Style"]["background"]["theme"]["normal"]." ".$website_dictionary["Style"]["text"]["black"]." ".$website_dictionary["Style"]["border_4px"]["black"]." background_hover_white";
		}

		if (is_array($website_dictionary["Style"]["border_4px"][$type]) === True) {
			foreach (array_keys($website_dictionary["Style"]["border_4px"][$type]) as $key) {
				$website_dictionary["Style"]["button"][$type][$key] = $website_dictionary["Style"]["background"][$type]["dark"]." ".$website_dictionary["Style"]["button_text"]." ".$website_dictionary["Style"]["border_4px"][$type]["light"]." ".$website_dictionary["Style"]["background_hover"];
			}
		}
	}

	$website_dictionary["Style"]["radio"] = "border_radius_30_cent";

	$website_dictionary["Style"]["radio_input"] = "margin_bottom_20px transform_scale_2";

	$website_dictionary["Style"]["header"] = $website_dictionary["Style"]["background"]["black"]." ".$website_dictionary["Style"]["text"]["secondary_theme"]["normal"]." ".$website_dictionary["Style"]["border_4px"]["theme"]["light"]." ".$website_dictionary["Style"]["border_radius"];

	$border_color = $website_dictionary["Style"]["border_color"];

	$website_dictionary["Style"]["box_shadow_class"] = $website_dictionary["Style"]["box_shadow"]["theme"][$website_dictionary["Style"]["box_shadow_color"]];

	$website_dictionary["Style"]["tab"] = [
		"black" => $website_dictionary["Style"]["background"]["black"]." ".$website_dictionary["Style"]["text"]["secondary_theme"]["normal"]." ".$website_dictionary["Style"]["border_4px"]["theme"]["light"]." padding_bottom_1_cent margin_bottom_2_cent height_auto w3-animate-zoom",

		"theme" => $website_dictionary["Style"]["background"]["theme"]["normal"]." ".$website_dictionary["Style"]["text"]["black"]." ".$website_dictionary["Style"]["border_4px"]["theme"]["light"]." ".$website_dictionary["Style"]["border_radius"]." padding_bottom_1_cent margin_bottom_2_cent height_auto w3-animate-zoom",

		"theme_dark" => $website_dictionary["Style"]["background"]["theme"]["normal"]." ".$website_dictionary["Style"]["text"]["theme"]["dark"]." ".$website_dictionary["Style"]["border_4px"]["theme"][$border_color]." "
	];

	if ($website_dictionary["JSON"]["image"]["box_shadow"] == True) {
		$website_dictionary["Style"]["tab"]["theme_dark"] .= $website_dictionary["Style"]["box_shadow_class"]." ";
	}

	$website_dictionary["Style"]["tab"]["theme_dark"] .= $website_dictionary["Style"]["border_radius"]." padding_bottom_1_cent margin_bottom_2_cent height_auto w3-animate-zoom";

	$website_dictionary["Style"]["tab"]["black"] = $website_dictionary["Style"]["tab"]["theme_dark"];

	# Define website style as the style of the selected website
	if ($website_title == $website["website"]) {
		$website["Style"] = array_merge($website["Style"], $website_dictionary["Style"]);
	}

	# Define website image
	$website_dictionary["image"] = [
		"format" => "png"
	];	

	# Define the website image link
	$website_dictionary["image"]["link"] = $website_dictionary["Folders"]["Website"]["Images"]["Remote"]["Icons"]["root"];

	if (
		isset($website_dictionary["JSON"]["image"]) == True and
		isset($website_dictionary["JSON"]["image"]["format"]) == True
	) {
		$website_dictionary["image"]["format"] = $website_dictionary["JSON"]["image"]["format"];
	}

	# Define the remote image folder
	$remote_folder = $website_dictionary["image"]["link"];

	# Define the local image folder
	$local_folder = $website_dictionary["Folders"]["Website"]["Images"]["Local"]["Icons"]["root"];

	# Define the image folder for story websites
	if (
		$website_dictionary["type"] == "Story" or
		isset($website_dictionary["JSON"]["story"])
	) {
		# Define the remote image folder
		$remote_folder = $website_dictionary["Folders"]["Website"]["Images"]["Remote"]["root"];

		# Define the local image folder
		$local_folder = $website_dictionary["Folders"]["Website"]["Images"]["Local"]["root"];
	}

	# Replace remote folder with the local PHP images folder
	# To test if the images appear correctly
	#if ($website["States"]["Website"]["Generate"] == False) {
		$php_folder = "Images/".$website_dictionary["title"]."/";

		$remote_folder = "/".$php_folder;
		$local_folder = $folders["Mega"]["PHP"]["root"].$php_folder;

		if (
			$website_dictionary["type"] == "Normal" and
			isset($website_dictionary["JSON"]["story"]) == False
		) {
			$remote_folder .= "Icons/";
			$local_folder .= "Icons/";
		}

		$website_dictionary["image"]["link"] = $remote_folder;
	#}

	$verbose_text .= "Imagem:"."\n".
	"\t"."Pasta local: local_folder"."\n".
	"\t"."Pasta remota: remote_folder"."\n".
	"\n".
	"\t"."Formatos:"."\n";

	# Create the file names array (list)
	$file_names = [
		$website_title,
		"Foto",
		"Picture"
	];

	if ($website["States"]["Website"]["Parent"] == True) {
		array_push($file_names, $website_dictionary["Parent"]["Folder name"]."/".$website_title);
	}

	# Add the "Cover" file name to the file names list
	if (
		$website_dictionary["type"] == "Story" or
		isset($website_dictionary["JSON"]["story"])
	) {
		array_push($file_names, "Cover");
	}

	# Add the full user language to the file names list
	array_push($file_names, $Language -> languages["full"][$language]);

	$website_dictionary["image"]["File name"] = "png";

	foreach ($file_names as $file_name) {
		foreach ($website["Image formats"] as $format) {
			$local_image = $local_folder.$file_name.".".$format;

			if (str_contains($verbose_text, $format) == False) {
				$verbose_text .= "\t\t".'"'.$format.'"'."\n";
			}

			if (file_exists($local_image) == True) {
				$website_dictionary["image"]["format"] = $format;
				$website_dictionary["image"]["File name"] = $file_name;
			}

			if (file_exists($local_image) == False) {
				$local_image_website_folder = $website_dictionary["Folders"]["Website"]["Images"]["Local"]["root"].$file_name.".".$format;

				if (file_exists($local_image_website_folder) == True) {
					if ($website["States"]["Website"]["Generate"] == False) {
						# Update the website image link to be remote
						$website_dictionary["image"]["link"] = $website_dictionary["Folders"]["Website"]["Images"]["Remote"]["root"];
					}

					$website_dictionary["image"]["format"] = $format;
					$website_dictionary["image"]["File name"] = $file_name;
				}
			}
		}
	}

	$website_dictionary["image"]["link"] .= $website_dictionary["image"]["File name"];

	$website_dictionary["image"]["link"] .= ".".$website_dictionary["image"]["format"];

	if (isset($website_dictionary["JSON"]["image"]["width"]) == False) {
		$website_dictionary["JSON"]["image"]["width"] = "90";
	}

	# Define the website image link for stories
	if (
		$website_dictionary["type"] == "Story" or
		isset($website_dictionary["JSON"]["story"])
	) {
		$website_dictionary["JSON"]["image"]["width"] = "70";
	}

	if (
		in_array($website_title, $website["Years"]) == True or
		str_contains($website_title, "Diary")
	) {
		$website_dictionary["JSON"]["image"]["width"] = "60";
	}

	$verbose_text .= "\n"."\t"."Formato: ".'"'.$website_dictionary["image"]["format"].'"'."\n\n";

	$verbose_text = str_replace("local_folder", $local_folder, $verbose_text);
	$verbose_text = str_replace("remote_folder", $remote_folder, $verbose_text);

	if (
		$website_dictionary["type"] != "Story" and
		$website_dictionary["image"]["format"] == ""
	) {
		$link = $website["Folders"]["Images"]["Icons"]["root"]."Template.png";

		$website_dictionary["image"]["link"] = $link;
	}

	$verbose_text .= "\t"."Link: ".$website_dictionary["image"]["link"];

	if ($website["verbose"] == True) {
		$Text -> Show_Variable($verbose_text);
		echo "<br>";
	}

	$website_dictionary["image"]["local_link"] = str_replace($website["URL"], $folders["Mega"]["Websites"]["root"], $website_dictionary["image"]["link"]);

	$class = $website_dictionary["Style"]["img"]["theme"]["normal"];

	if ($website_dictionary["JSON"]["image"]["box_shadow"] == True) {
		$class .= " ".$website_dictionary["Style"]["box_shadow"]["theme"][$website_dictionary["Style"]["box_shadow_color"]];
	}

	$website_dictionary["image"]["element"] = HTML::Element("img", "", 'src="'.$website_dictionary["image"]["link"].'" style="height: auto;"', $class)."<br />"."\n";

	if ($website_dictionary["JSON"]["image"]["width"] != "") {
		$website_dictionary["image"]["element"] = HTML::Make_Image_Size($website_dictionary["image"]["element"], $website_dictionary["JSON"]["image"]["width"]);
	}

	# Define website image elements for style
	$types = [
		"black",
		"theme",
		"secondary_theme"
	];

	# Define website image element themes
	$website_dictionary["image"]["elements"] = [];

	foreach ($types as $type) {
		if ($type == "black") {
			$class = $website_dictionary["Style"]["img"]["black"];

			if ($website_dictionary["JSON"]["image"]["box_shadow"] == True) {
				$class .= " ".$website_dictionary["Style"]["box_shadow"]["theme"]["light"];
			}

			$image = HTML::Element("img", "", 'src="'.$website_dictionary["image"]["link"].'" style="height: auto;"', $class)."<br />"."\n";

			if ($website_dictionary["JSON"]["image"]["width"] != "") {
				$image = HTML::Make_Image_Size($image, $website_dictionary["JSON"]["image"]["width"]);
			}

			$website_dictionary["image"]["elements"][$type] = $image;
		}

		if ($type != "black") {
			foreach (array_keys($website_dictionary["Style"]["img"][$type]) as $key) {
				$class = $website_dictionary["Style"]["img"]["theme"][$key];

				if ($website_dictionary["JSON"]["image"]["box_shadow"] == True) {
					$class .= " ".$website_dictionary["Style"]["box_shadow"]["theme"][$key];
				}

				$image = HTML::Element("img", "", 'src="'.$website_dictionary["image"]["link"].'" style="height: auto;"', $class." ".$website_dictionary["Style"]["img"]["theme"][$key])."<br />"."\n";

				if ($website_dictionary["JSON"]["image"]["width"] != "") {
					$image = HTML::Make_Image_Size($image, $website_dictionary["JSON"]["image"]["width"]);
				}

				$website_dictionary["image"]["elements"][$type][$key] = $image;
			}
		}
	}

	# Define the default website descriptions array
	$website_dictionary["description"] = [
		"html" => "",
		"header" => ""
	];

	# Define if the painted version of the website author will be used
	$use_painted_author = True;

	# Define the default website author
	$author = $website["Author"];

	# Define a list of tab colors to not use the painted version of the website author
	$tab_colors = [
		"yellow_sand"
	];

	if (
		$use_painted_author == True and
		in_array($website_dictionary["JSON"]["style"]["theme"]["light"], $tab_colors) == False and
		in_array($website_dictionary["JSON"]["style"]["secondary_theme"]["light"], $tab_colors) == False
	) {
		$author = $stories["Authors (painted)"][$author];
	}

	# Define the normal website descriptions
	if ($website_dictionary["type"] == "Normal") {
		$json_descriptions = True;

		# Define the JSON descriptions array
		if (isset($website_dictionary["JSON"]["descriptions"]) == True) {
			$descriptions = $website_dictionary["JSON"]["descriptions"];
		}

		# Define the file descriptions array
		if (file_exists($website_dictionary["Folders"]["PHP"]["Descriptions"]["root"])) {
			$descriptions = [
				"html" => []
			];
		
			# Define the language website descriptions files
			foreach ($website["small_languages"] as $local_language) {
				$descriptions["html"][$local_language] = $File -> Contents($website_dictionary["Folders"]["PHP"]["Descriptions"][$local_language])["string"];
			}

			$json_descriptions = False;
		}

		# Define HTML descriptions for year websites
		if (in_array($website_title, $website["Years"]) == True) {
			$descriptions["html"] = $website["Texts"]["Year website descriptions"];
		}

		$website_dictionary["description"]["html"] = $Language -> Item($descriptions["html"]);

		$description_backup = $website_dictionary["description"]["html"];

		if (str_contains($website_dictionary["description"]["html"], "{website_title}") == True) {
			$website_dictionary["description"]["html"] = str_replace("{website_title}", $website_dictionary["titles"]["language"], $website_dictionary["description"]["html"]);
		}

		if (str_contains($website_dictionary["description"]["html"], "{author}") == True) {
			$website_dictionary["description"]["html"] = str_replace("{author}", $author, $website_dictionary["description"]["html"]);
		}

		$descriptions["header"] = [];

		if ($website_dictionary["description"]["header"] != []) {
			$website_dictionary["description"]["header"] = $Language -> Item($descriptions["header"]);
		}

		if ($website_dictionary["description"]["header"] == []) {
			$website_dictionary["description"]["header"] = $description_backup;
		}

		# Replace the website author text with a painted version
		$author_text = "{author}";

		if (str_contains($website_dictionary["description"]["header"], $website["Author"]) == True) {
			$author_text = $website["Author"];
		}

		# Transform the website author into bold style
		$author = HTML::Element("b", $author);

		$website_dictionary["description"]["header"] = str_replace($author_text, $author, $website_dictionary["description"]["header"]);

		# Add line separators to the website header descriptions if they were gotten from the "Website.json" file
		if ($json_descriptions == True) {
			$website_dictionary["description"]["header"] = "\t\t".str_replace("\n", "<br />\n\t\t", $website_dictionary["description"]["header"])."\n";
		}

		# Replace quotes in the HTML description if they exist
		$website_dictionary["description"]["html"] = str_replace('"', "'", $website_dictionary["description"]["html"]);

		# Replace br's in HTML the descriptions if it exists
		$website_dictionary["description"]["html"] = str_replace("<br />", "", $website_dictionary["description"]["html"]);
	}

	# Define the story website descriptions
	if (
		$website_dictionary["type"] == "Story" or
		isset($website_dictionary["JSON"]["story"])
	) {
		# Define website HTML description for story websites
		$website_dictionary["description"]["html"] = Text::Format($website["Language texts"]["website_about_my_story_{}_made_by_{}"], [$website_dictionary["titles"]["language"], $website["Author"]]);

		$language = $Language -> user_language;

		if ($language == "general") {
			$language = "en";
		}

		# Define the synopsis of the story
		$synopsis = str_replace("\n", "<br />"."\n"."\t\t", $website_dictionary["Story"]["Information"]["Synopsis"][$language]);

		# Define the website header description for the story websites
		$website_dictionary["description"]["header"] = "\t\t".'<!-- Story website info, author(s), chapters, readers, creation date, status -->'."\n".
		"\t\t".$website["Language texts"]["synopsis, title()"].": ".$website["Icons"]["scroll"]." ".$synopsis."<br />"."\n";

		$website_dictionary["description"]["header"] .= "\t\t"."-----"."<br />"."\n";

		# Add the painted author of the story
		$text = $website["Language texts"]["story_author"];

		if (isset($website_dictionary["Story"]["Information"]["Authors"]) == True) {
			# Get the list of authors
			$authors_list = $website_dictionary["Story"]["Information"]["Authors"];
		}

		if (
			isset($website_dictionary["Story"]["Information"]["Author"]) == True and
			$website_dictionary["Story"]["Information"]["Author"] != $website["Author"]
		) {
			$last_author = end($authors_list);

			# Add painted authors if there are more than one
			if (count($authors_list) > 1) {
				$count = count($authors_list);

				$text = $website["Language texts"]["story_authors"];

				$authors = "";

				foreach ($authors_list as $author) {
					$painted_author = $author;

					if (isset($stories["Authors (painted)"][$author])) {
						$painted_author = $stories["Authors (painted)"][$painted_author];
					}

					$authors .= $painted_author;

					if (
						$count >= 3 and
						$author != $last_author or
						$count >= 3 and
						$author == array_reverse($authors_list)[1]
					) {
						$authors .= ", ";
					}

					if (
						$count >= 2 and
						$author == array_reverse($authors_list)[1]
					) {
						$authors .= " ".$website["Language texts"]["and"]." ";
					}
				}

				$author = $authors;
			}
		}

		if (isset($website_dictionary["Story"]["Information"]["Authors"]) == True) {
			# Iterate through the list of authors
			foreach ($authors_list as $item) {
				if (str_contains($author, $item)) {
					# Transform the current author into bold style
					$author = str_replace($item, HTML::Element("b", $item), $author);
				}
			}
		}

		else {
			# Transform the website author into bold style
			$author = HTML::Element("b", $author);
		}

		$website_dictionary["Story"]["Information"]["Author"] = $author."<br />"."\n";

		# Add the author to the header
		$website_dictionary["description"]["header"] .= "\t\t".$text.": ".$website["Icons"]["pen"]." ".$author."<br />"."\n";

		# Add the chapters text and number
		$website_dictionary["description"]["header"] .= "\t\t".$website["Language texts"]["chapters, title()"].": ".$website["Icons"]["book"]." ";

		$website_dictionary["description"]["header"] .= HTML::Element("span", $website_dictionary["Story"]["Information"]["Chapters"]["Numbers"]["Total"], "", $website_dictionary["Style"]["text_highlight"])."<br />"."\n";

		# Add the readers if they exist
		if ($website_dictionary["Story"]["Information"]["Readers"]["List"] != []) {
			$website_dictionary["description"]["header"] .= "\t\t".$website["Language texts"]["readers, title()"].": ".$website["Icons"]["reader"]." ";

			$website_dictionary["description"]["header"] .= HTML::Element("span", $website_dictionary["Story"]["Information"]["Readers"]["Number"], "", $website_dictionary["Style"]["text_highlight"])."<br />"."\n";
		}

		# Add the creation date of the story
		$website_dictionary["description"]["header"] .= "\t\t".$website["Language texts"]["story_creation_date"].": ".$website["Icons"]["calendar_days"]." ";

		$date = Date::Now($website_dictionary["Story"]["Information"]["Creation date"], $website["Texts"]["date_format"]["pt"])[$website["Language texts"]["date_format"]];

		$website_dictionary["description"]["header"] .= HTML::Element("span", $date, "", $website_dictionary["Style"]["text_highlight"])."<br />"."\n";

		# Add the status of the story
		$status_number = $website_dictionary["Story"]["Information"]["Status"]["Number"];
		$status = $website["Language texts"]["writing_statuses, type: list"][$status_number];

		$website_dictionary["description"]["header"] .= "\t\t".$website["Language texts"]["status, title()"].": ".$website["Icons"]["status_map"][$status_number]." ";

		$website_dictionary["description"]["header"] .= HTML::Element("span", $status, "", $website_dictionary["Style"]["text_highlight"]);

		# Update the website title with the story status icon
		$website_dictionary["titles"]["icon"] .= " ".$website["Icons"]["status_map"][$status_number];

		# Add the external links of the story if they exist
		if (
			$website_dictionary["type"] == "Story" and
			$website_dictionary["Story"]["Information"]["Links"] != []
		) {
			# Define the list of keys
			$keys = array_keys($website_dictionary["Story"]["Information"]["Links"]);
			$keys = array_diff($keys, ["Website"]);
			$keys = array_values($keys);

			# Define the empty links string
			$links = "<b>".$website["Language texts"]["the_story_on_other_websites"].":</b>"."<br /><br />";

			# Define the variable telling that links exist
			$links_exist = False;

			# Iterate through the story website links inside the "Links" dictionary
			foreach ($keys as $key) {
				# If the language link exists
				if (isset($website_dictionary["Story"]["Information"]["Links"][$key]["Links"][$language])) {
					# Get the link of the story website
					$link = $website_dictionary["Story"]["Information"]["Links"][$key]["Links"][$language];

					# Create the link element
					$element = "";

					# Add a space if the story website is not the first one
					if ($key != $keys[0]) {
						$element .= "<br />"."\n"."<br />"."\n";
					}	

					# Add the name of the story website
					$element .= "\t\t".$website["Language texts"]["on, title()"]." ".$key.": "."<br />";

					# Create the link
					$element .= HTML::Element("a", $link, 'href="'.$link.'" target="_blank"', $website_dictionary["Style"]["text_highlight"]);

					# Add it to the links string
					$links .= $element;

					$links_exist = True;
				}
			}

			if ($links_exist == True) {
				# If the links string is not empty, add it to the website header
				$website_dictionary["description"]["header"] .= "<br />"."\n".
				"-----"."\n".
				"<br />"."\n".
				$links;
			}
		}

		$website_dictionary["description"]["header"] .= "\n";
	}

	# Replace the website title text with a painted version
	$find_text = "{website_title}";

	$website_title_text = $website_dictionary["titles"]["language"];

	# If the header description contains the website title template text with quotes
	$text = '"'."{website_title}".'"';

	if (str_contains($website_dictionary["description"]["header"], $text) == True) {
		$find_text = $text;

		$website_title_text = '"'.$website_title_text.'"';
	}

	# If the header description contains the full website title
	if (str_contains($website_dictionary["description"]["header"], $website_dictionary["titles"]["language"]) == True) {
		$find_text = $website_dictionary["titles"]["language"];

		# If the header description contains the full website title with quotes
		$text = '"'.$website_dictionary["titles"]["language"].'"';

		if (str_contains($website_dictionary["description"]["header"], $text) == True) {
			$find_text = '"'.$website_dictionary["titles"]["language"].'"';

			$website_title_text = $find_text;
		}
	}

	$span = HTML::Element("span", $website_title_text, "", $website_dictionary["Style"]["text_highlight"]);

	$website_dictionary["description"]["header"] = str_replace($find_text, $span, $website_dictionary["description"]["header"]);

	# Define website color
	$website_dictionary["color"] = "#";

	if (isset($website_dictionary["JSON"]["color"]) == True) {
		$website_dictionary["color"] .= $website_dictionary["JSON"]["color"];
	}

	# Define story website color
	if ($website_dictionary["type"] == "Story") {
		$website_dictionary["color"] .= $website_dictionary["Story"]["Information"]["HEX color"];
	}

	# Create website link button
	$h2 = HTML::Element("h2", "\n\t\t\t\t".$website_dictionary["titles"]["icon"]."\n\t\t\t", "", "text_size")."\n";

	# Define the link
	$link = $website_dictionary["Links"]["Language"];

	if ($website["States"]["Website"]["Generate"] == False) {
		$link = $Text -> Format($website["Local URL"]["Code"]["Templates"]["With tab"], $website_dictionary["title"]);
	}

	$window_open_template = 'window.open(\''."{}".'\')';

	$window_open = $Text -> Format($window_open_template, $link);

	$button = "\n"."\t\t".'<!-- "'.$website_title.'" link button -->'."\n".
	"\t\t".HTML::Element("button", "\n\t\t\t".$h2."\t\t", 'onclick="'.$window_open.'" style="border-radius: 50px;"', "w3-btn ".$website_dictionary["Style"]["button"]["theme"]["light"]);

	$onclick = $Text -> Format($window_open_template, "{}");

	$button_template = "\n"."\t\t".'<!-- "'.$website_title.'" link button -->'."\n".
	"\t\t".HTML::Element("button", "\n\t\t\t".$h2."\t\t", 'onclick="'.$onclick.'" style="border-radius: 50px;"', "w3-btn ".$website_dictionary["Style"]["button"]["theme"]["light"]);

	if ($website_title == $website["website"]) {
		$button = str_replace($window_open, "", $button);

		$website_icon_title = $website_dictionary["titles"]["icon"];
		$you_are_here_text = $website["Language texts"]["you_are_here"];

		$button = str_replace($website_icon_title, $website_icon_title." (".$you_are_here_text.")", $button);

		$button = str_replace('">', '" title="'.$website_dictionary["Links"]["Language"].'"'.">", $button);
	}

	# Add the button
	$website_dictionary["button"] = $button;

	# Add the button template
	$website_dictionary["Button template"] = $button_template;

	if (in_array($website_title, $websites["Remove from websites tab"]) == False) {
		$website["website_buttons"] .= $button."\n";

		if ($website_title != end($websites["List"]["en"])) {
			$website["website_buttons"] .= "<br />";
		}
	}

	# Add the local website dictionary to the root websites dictionary with the website title as a key
	$website["Dictionary"][$website_title] = $website_dictionary;

	# Replace the spaces with underscores on the key and add to the website dictionary
	$website_title_replaced = str_replace(" ", "_", $website_title);

	$website["Dictionary"][$website_title_replaced] = $website_dictionary;

	$website_dictionary = "";
}

?>