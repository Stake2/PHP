<?php

# Make_Website_Dictionary

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

# Add websites to website dictionary
$i = 0;
foreach ($websites["List"]["en"] as $website_title) {
	# Define the current Website dictionary
	$website["dictionary"][$website_title] = [
		"title" => $website_title,
		"titles" => []
	];

	# Define the verbose text
	$verbose_text = "Site: ".'"'.$website_title.'"'."\n";

	# Define the "website_dictionary" variable for faster typing
	$website_dictionary = $website["dictionary"][$website_title];

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

			# Define Parent website folder
			if (isset($parent["Folder name"]) == False) {
				$parent["Folder name"] = $parent["Title"];
			}

			$website["States"]["Website"]["Parent"] = True;
		}
	}

	# Define the language website titles
	foreach ($website["small_languages"] as $local_language) {
		if (isset($websites["List"][$local_language]) == True) {
			$title = $websites["List"][$local_language][$i];

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
		isset($stories[$website_title]["Information"]["Parent story"])
	) {
		$parent = $stories[$website_title]["Information"]["Parent story"];

		if (isset($parent["Folder name"]) == False) {
			$parent["Folder name"] = $parent["Title"];
		}

		# Define the Website link with the Parent story folder
		$custom_website_link = $parent["Folder name"]."/".$website_link;

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
			"Local" => $folders["mega"]["websites"]["root"].$parent["Folder name"]."/",
			"Remote" => $website["folders"]["root"].$parent["Folder name"]."/"
		];

		$website_dictionary["Parent"] = $parent;
	}

	# Define website folders
	$website_dictionary["folders"] = [];

	$link = $website_link;

	if (
		isset($custom_website_link) and
		$custom_website_link != ""
	) {
		$link = $custom_website_link;
	}

	$website_dictionary["folders"]["website"] = [
		"root" => $website["folders"]["root"].$link."/"
	];

	$verbose_text .= "\n";

	$verbose_text .= "Link: ".'"'.$website_dictionary["folders"]["website"]["root"].'"'."\n";

	$verbose_text .= "\n";

	$website_dictionary["folders"]["website"]["language"] = $website_dictionary["folders"]["website"]["root"];

	if ($website["language"] != "general") {
		$website_dictionary["folders"]["website"]["language"] .= $website["language"]."/";
	}

	$website_dictionary["folders"]["local_website"] = [
		"root" => $folders["mega"]["websites"]["root"].$link."/"
	];

	$Folder -> Create($website_dictionary["folders"]["local_website"]["root"]);

	$website_dictionary["folders"]["local_website"]["language"] = $website_dictionary["folders"]["local_website"]["root"];

	$Folder -> Create($website_dictionary["folders"]["local_website"]["language"]);

	if ($website["language"] != "general") {
		$website_dictionary["folders"]["local_website"]["language"] .= $website["language"]."/";
	}

	$Folder -> Create($website_dictionary["folders"]["local_website"]["language"]);

	# Define Mega Websites Images website image folders
	$names = [
		"Icons",
		"Images"
	];

	if ($website_dictionary["type"] == "Story") {
		array_push($names, "Story Covers");
	}

	# Define the remote and local website image folders
	# (Old way of defining website image folders)
	$website_dictionary["folders"]["website"]["website_images"] = [];

	$website_dictionary["folders"]["local_website"]["images"] = [];

	foreach ($names as $item) {
		$key = str_replace(" ", "_", strtolower($item));

		$website_dictionary["folders"]["website"]["website_images"][$key] = [
			"root" => $website["folders"]["images"]["root"].$item."/".$website_link."/"
		];

		$website_dictionary["folders"]["local_website"]["images"][$key] = [
			"root" => $folders["mega"]["websites"]["images"]["root"].$item."/".$website_link."/"
		];
	}

	$website_dictionary["folders"]["website"]["Images"] = [];

	if ($website_dictionary["type"] != "Story") {
		# Define the local unified website icons and images folder, with local and remote keys
		# (New way of defining website image folders, more organized)
		$dictionary = [
			"Local" => [],
			"Remote" => [],
			"Custom folders" => []
		];

		if (in_array($website_title, $website["years"]) == True) {
			array_push($dictionary["Custom folders"], "Pictures");
			array_push($dictionary["Custom folders"], "Memories");
		}

		$keys = array_keys($dictionary);
		unset($keys[2]);
		$keys = array_values($keys);

		# Define each root folder
		foreach ($keys as $key) {
			# Local folder
			$folder = $folders["mega"]["websites"]["images"]["root"];

			# Remote folder
			if ($key == "Remote") {
				$folder = $website["folders"]["images"]["root"];
			}

			if ($website["States"]["Website"]["Parent"] == True) {
				$folder .= $website_dictionary["Parent"]["Folder name"]."/";
			}

			# Define the root folder
			$dictionary[$key]["root"] = $folder.$website_title."/";

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
		$website_dictionary["folders"]["website"]["Images"] = $dictionary;
	}

	# Define the Mega website texts folder
	$website_dictionary["folders"]["website"]["texts"] = [
		"root" => $website["folders"]["texts"]["root"].$website_link."/"
	];

	# PHP website PHP folder
	$website_dictionary["folders"]["php"] = [
		"root" => $folders["php"]["websites"]["root"].$website_link."/"
	];

	$Folder -> Create($website_dictionary["folders"]["php"]["root"]);

	# Add to the verbose text
	$verbose_text .= "Pastas:"."\n";

	if ($website_title != $website_link) {
		$verbose_text .= "\t"."Nome de pasta: ".'"'.$website_link.'"'."\n";
	}

	$verbose_text .= "\t"."PHP: ".'"'.$website_dictionary["folders"]["php"]["root"].'"'."\n".
	"\t"."Sites: ".'"'.$website_dictionary["folders"]["local_website"]["root"].'"'."\n";

	if ($website["States"]["Website"]["Parent"] == True) {
		$verbose_text .= "\n"."Parente: "."\n".
		"\t".'Título: "'.$website_dictionary["Parent"]["Title"].'"'."\n".
		"\t".'Pasta local: "'.$website_dictionary["Parent"]["Folders"]["Local"].'"'."\n".
		"\t".'Pasta remota: "'.$website_dictionary["Parent"]["Folders"]["Remote"].'"'."\n";
	}

	$verbose_text .= "\n";

	# Define the website tabs folder
	$website_dictionary["folders"]["php"]["tabs"] = $website_dictionary["folders"]["php"]["root"]."Tabs/";

	# Define the "Website.json" file
	$website_dictionary["folders"]["php"]["website"] = $website_dictionary["folders"]["php"]["root"]."Website.json";

	# Define the "Website.php" file
	$website_dictionary["folders"]["php"]["website_php"] = $website_dictionary["folders"]["php"]["root"]."Website.php";

	# Define the website "Descriptions" folder
	$website_dictionary["folders"]["php"]["descriptions"] = [
		"root" => $website_dictionary["folders"]["php"]["root"]."Descriptions/"
	];

	# Define the language website descriptions files
	foreach ($website["small_languages"] as $local_language) {
		$local_full_language = $Language -> languages["full"][$local_language];

		$website_dictionary["folders"]["php"]["descriptions"][$local_language] = $website_dictionary["folders"]["php"]["descriptions"]["root"].$local_full_language.".txt";
	}

	if (
		file_exists($website_dictionary["folders"]["php"]["website"]) == False or
		$File -> Contents($website_dictionary["folders"]["php"]["website"], $add_br = False, $add_n = False)["lines"] == []
	) {
		$text = $File -> Contents($folders["php"]["json"]["website_template"], $add_br = False, $add_n = False)["string"];

		$File -> Edit($website_dictionary["folders"]["php"]["website"], $text, "w");
	}

	# Read website JSON file
	$website_dictionary["json"] = $JSON -> To_PHP($website_dictionary["folders"]["php"]["website"]);

	# Define website Generators folder
	if ($Folder -> Exist($website_dictionary["folders"]["php"]["root"]."Generators/") == True) {
		$website_dictionary["folders"]["php"]["generators"] = [
			"root" => $website_dictionary["folders"]["php"]["root"]."Generators/"
		];
	}

	if ($website_dictionary["type"] == "Story") {
		# Add story dictionary to website dictionary
		$website_dictionary["story"] = $stories[$website_title];
	}

	if (isset($website_dictionary["json"]["story"]) == True) {
		$key = $website_title;

		# Add story dictionary to website dictionary
		$folder = $folders["Mega"]["Notepad"][$key]["story"]["root"];

		$creation_date_file = $folder."Creation date.txt";
		$information_file = $folder."Information.json";
		$readers_file = $folders["Mega"]["Notepad"][$key]["story"]["readers_and_reads"]["root"]."Readers.txt";
		$titles_file = $folder."Titles.json";

		$website_dictionary["story"] = [
			"Titles" => $JSON -> To_PHP($titles_file),
			"Information" => $JSON -> To_PHP($information_file)
		];

		$website_dictionary["story"]["Information"]["Synopsis"] = [];

		foreach ($website["small_languages"] as $local_language) {
			$local_full_language = $Language -> languages["full"][$local_language];

			$file = $folders["Mega"]["Notepad"][$key]["story"]["synopsis"]["root"].$local_full_language.".txt";

			$website_dictionary["story"]["Information"]["Synopsis"][$local_language] = $File -> Contents($file, $add_br = False)["string"];
		}

		$website_dictionary["story"]["Information"]["Creation date"] = $File -> Contents($creation_date_file)["lines"][0];

		$contents = $File -> Contents($readers_file);

		$website_dictionary["story"]["Information"]["Readers"] = [
			"Number" => $contents["length"],
			"List" => $contents["lines"]
		];

		$english_story_title = $website_dictionary["story"]["Titles"]["en"];

		# Add the English Story title to the "List" array of the Stories dictionary
		array_push($stories["List"], $english_story_title);

		# Add each language story title to the specific language array of the Stories "titles" dictionary
		foreach ($website["small_languages"] as $local_language) {
			$language_story_title = $website_dictionary["story"]["Titles"][$local_language];

			array_push($stories["Titles"][$local_language], $language_story_title);
		}

		# Add each language story title to the "All" array of the Stories "titles" dictionary
		foreach (array_values($website_dictionary["story"]["Titles"]) as $story_title) {
			array_push($stories["Titles"]["All"], $story_title);
		}
	}

	$website_dictionary["titles"]["language"] = $website_dictionary["titles"][$language];

	# Add "My" text to year website titles
	if (in_array($website_title, $website["years"]) == True) {
		$website_dictionary["titles"]["language"] = $website["language_texts"]["my, title()"]." ".$website_dictionary["titles"]["language"];
	}

	if (isset($website_dictionary["json"]["titles"]) == True) {
		foreach ($website["small_languages"] as $local_language) {
			if (isset($website_dictionary["json"]["titles"][$local_language]) == True) {
				$website_dictionary["titles"][$local_language] = $website_dictionary["json"]["titles"][$local_language];
			}
		}

		$website_dictionary["titles"]["language"] = $website_dictionary["titles"][$language];
	}

	if (isset($website_dictionary["json"]["title"]) == True) {
		$website_dictionary["titles"]["language"] = $website_dictionary["json"]["title"];
	}

	$website_dictionary["titles"]["sanitized"] = str_replace('"', "'", $website_dictionary["titles"]["language"]);

	# Define website title with icon
	$website_dictionary["titles"]["icon"] = $website_dictionary["titles"]["language"];

	# Add the book icon to story websites
	if (
		$website_title == "Stories" or
		in_array($website_title, $stories["Titles"]["en"]) == True
	) {
		$website_dictionary["titles"]["icon"] .= " ".$website["icons"]["book"];
	}

	# Add the "calendar days" icon to year websites
	if (
		$website_title == "Years" or
		in_array($website_title, $website["years"])
	) {
		$website_dictionary["titles"]["icon"] .= " ".$website["icons"]["calendar_days"];
	}

	if (isset($website_dictionary["json"]["icon"]) == True) {
		$website_dictionary["titles"]["icon"] .= " ".$website["icons"][$website_dictionary["json"]["icon"]];
	}

	$website_dictionary["link"] = $website["url"].$link."/";

	# Define website links
	$website_dictionary["links"] = [];

	foreach ($website["small_languages"] as $local_language) {
		$website_dictionary["links"][$local_language] = $website_dictionary["link"].$local_language."/";
	}

	$website_dictionary["links"]["language"] = $website_dictionary["link"];

	if ($website["language"] != "general") {
		$website_dictionary["links"]["language"] .= $language."/";
	}

	$website_dictionary["links"]["element"] = HTML::Element("a", '"'.$website_dictionary["titles"]["language"].'"', 'href="'.$website_dictionary["links"]["language"].'" target="_blank"', "text_".$website_dictionary["json"]["style"]["theme"]["dark"]);

	$website_dictionary["links"]["element_no_quotes"] = HTML::Element("a", $website_dictionary["titles"]["language"], 'href="'.$website_dictionary["links"]["language"].'" target="_blank"', "text_".$website_dictionary["json"]["style"]["theme"]["dark"]);

	if (isset($website_dictionary["json"]["tabs"]) == True) {
		$website_dictionary["tabs"] = $website_dictionary["json"]["tabs"];
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
	$website_dictionary["style"] = [
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

	if (isset($website_dictionary["json"]["image"]) == False) {
		$website_dictionary["json"]["image"] = [];
	}

	if (
		isset($website_dictionary["json"]["image"]) == True and
		isset($website_dictionary["json"]["image"]["border_radius"])
	) {
		$website_dictionary["style"]["border_radius_website_image"] = "border_radius_".$website_dictionary["json"]["image"]["border_radius"]."_cent";
	}

	if (isset($website_dictionary["json"]["image"]["box_shadow"]) == False) {
		$website_dictionary["json"]["image"]["box_shadow"] = True;
	}

	# Define default border color
	$website_dictionary["style"]["border_color"] = "light";

	# Define border color from JSON
	if (isset($website_dictionary["json"]["border_color"]) == True) {
		$website_dictionary["style"]["border_color"] = $website_dictionary["json"]["border_color"];
	}

	# Define default box shadow
	$website_dictionary["style"]["box_shadow_color"] = "light";

	# Define box shadow from JSON
	if (isset($website_dictionary["json"]["box_shadow_color"]) == True) {
		$website_dictionary["style"]["box_shadow_color"] = $website_dictionary["json"]["box_shadow_color"];
	}

	# Define each type of each style item
	foreach ($items as $item) {
		# Add black border to border item array
		if (isset($website_dictionary["style"][$item]["black"]) == False) {
			$website_dictionary["style"][$item]["black"] = $item;

			if (strpos($item, "border") === 0) {
				$website_dictionary["style"][$item]["black"] .= " border_color_black";
			}

			if ($item == "box_shadow") {
				$website_dictionary["style"][$item]["black"] .= "_black";
			}
		}

		foreach ($types as $type) {
			# Define type
			$website_dictionary["style"][$item][$type] = $website_dictionary["json"]["style"][$type];

			# Add item to each color from the style type
			foreach (array_keys($website_dictionary["style"][$item][$type]) as $key) {
				if (
					strpos($item, "border") === False and
					strpos($item, "box_shadow") === False
				) {
					$website_dictionary["style"][$item][$type][$key] = $item."_".$website_dictionary["style"][$item][$type][$key];
				}

				if (strpos($item, "border") === 0) {
					$website_dictionary["style"][$item][$type][$key] = $item." border_color_".$website_dictionary["style"][$item][$type][$key];
				}

				if (strpos($item, "box_shadow") === 0) {
					$website_dictionary["style"][$item][$type][$key] = $item."_".$website_dictionary["style"][$item][$type][$key];
				}
			}
		}
	}

	foreach (array_keys($website_dictionary["json"]["style"]) as $key) {
		if (in_array($key, $types) == False) {
			$website_dictionary["style"][$key] = $website_dictionary["json"]["style"][$key];
		}
	}

	$website_dictionary["style"]["text_highlight"] = $website_dictionary["json"]["style"]["theme"]["light"];

	if (isset($website_dictionary["json"]["style"]["text_highlight"]) == True) {
		$website_dictionary["style"]["text_highlight"] = $website_dictionary["json"]["style"]["text_highlight"];
	}

	$website_dictionary["style"]["text_hover"] = "text_hover_".$website_dictionary["style"]["text_highlight"];

	$website_dictionary["style"]["text_highlight"] = "text_".$website_dictionary["style"]["text_highlight"];

	$website_dictionary["style"]["body"] = $website_dictionary["style"]["background"]["secondary_theme"]["dark"];

	$types = [
		"black",
		"theme",
		"secondary_theme"
	];

	$website_dictionary["style"]["img"] = [];

	# Define website image themes
	foreach ($types as $type) {
		if (is_array($website_dictionary["style"]["border_4px"][$type]) === False) {
			$website_dictionary["style"]["img"][$type] = "image_size";

			$text = " ".$website_dictionary["style"]["border_4px"][$type];

			if (isset($website_dictionary["json"]["image"]) == True) {
				if (
					isset($website_dictionary["json"]["image"]["border"]) and
					$website_dictionary["json"]["image"]["border"] == True or
					isset($website_dictionary["json"]["image"]["border"]) == False
				) {
					$website_dictionary["style"]["img"][$type] .= $text;
				}
			}

			if (isset($website_dictionary["json"]["image"]) == False) {
				$website_dictionary["style"]["img"][$type] .= $text;
			}

			$website_dictionary["style"]["img"][$type] .= " ".$website_dictionary["style"]["border_radius_website_image"];
		}

		if (is_array($website_dictionary["style"]["border_4px"][$type]) === True) {
			foreach (array_keys($website_dictionary["style"]["border_4px"][$type]) as $key) {
				$website_dictionary["style"]["img"][$type][$key] = "image_size";

				$text = " ".$website_dictionary["style"]["border_4px"][$type][$key];

				if (isset($website_dictionary["json"]["image"]) == True) {
					if (
						isset($website_dictionary["json"]["image"]["border"]) and
						$website_dictionary["json"]["image"]["border"] == True or
						isset($website_dictionary["json"]["image"]["border"]) == False
					) {
						$website_dictionary["style"]["img"][$type][$key] .= $text;
					}
				}

				if (isset($website_dictionary["json"]["image"]) == False) {
					$website_dictionary["style"]["img"][$type][$key] .= $text;
				}

				$website_dictionary["style"]["img"][$type][$key] .= " ".$website_dictionary["style"]["border_radius_website_image"];
			}
		}
	}

	# Define website button themes
	$website_dictionary["style"]["button"] = [];

	foreach ($types as $type) {
		if (is_array($website_dictionary["style"]["border_4px"][$type]) === False) {
			$website_dictionary["style"]["button"][$type] = $website_dictionary["style"]["background"]["theme"]["normal"]." ".$website_dictionary["style"]["text"]["black"]." ".$website_dictionary["style"]["border_4px"]["black"]." background_hover_white";
		}

		if (is_array($website_dictionary["style"]["border_4px"][$type]) === True) {
			foreach (array_keys($website_dictionary["style"]["border_4px"][$type]) as $key) {
				$website_dictionary["style"]["button"][$type][$key] = $website_dictionary["style"]["background"][$type][$key]." ".$website_dictionary["style"]["text"]["theme"]["dark"]." ".$website_dictionary["style"]["border_4px"][$type]["dark"]." box_shadow_".$website_dictionary["json"]["style"][$type][$key]." background_hover_white";
			}
		}
	}

	$website_dictionary["style"]["radio"] = "border_radius_30_cent";

	$website_dictionary["style"]["radio_input"] = "margin_bottom_20px transform_scale_2";

	$website_dictionary["style"]["header"] = $website_dictionary["style"]["background"]["black"]." ".$website_dictionary["style"]["text"]["secondary_theme"]["normal"]." ".$website_dictionary["style"]["border_4px"]["theme"]["light"]." ".$website_dictionary["style"]["border_radius"];

	$border_color = $website_dictionary["style"]["border_color"];

	$website_dictionary["style"]["box_shadow_class"] = $website_dictionary["style"]["box_shadow"]["theme"][$website_dictionary["style"]["box_shadow_color"]];

	$website_dictionary["style"]["tab"] = [
		"black" => "header_size ".$website_dictionary["style"]["background"]["black"]." ".$website_dictionary["style"]["text"]["secondary_theme"]["normal"]." ".$website_dictionary["style"]["border_4px"]["theme"]["light"]." padding_bottom_1_cent margin_bottom_2_cent height_auto w3-animate-zoom",

		"theme" => "header_size ".$website_dictionary["style"]["background"]["theme"]["normal"]." ".$website_dictionary["style"]["text"]["black"]." ".$website_dictionary["style"]["border_4px"]["theme"]["light"]." ".$website_dictionary["style"]["border_radius"]." padding_bottom_1_cent margin_bottom_2_cent height_auto w3-animate-zoom",

		"theme_dark" => "header_size ".$website_dictionary["style"]["background"]["theme"]["normal"]." ".$website_dictionary["style"]["text"]["theme"]["dark"]." ".$website_dictionary["style"]["border_4px"]["theme"][$border_color]." "
	];

	if ($website_dictionary["json"]["image"]["box_shadow"] == True) {
		$website_dictionary["style"]["tab"]["theme_dark"] .= $website_dictionary["style"]["box_shadow_class"]." ";
	}

	$website_dictionary["style"]["tab"]["theme_dark"] .= $website_dictionary["style"]["border_radius"]." padding_bottom_1_cent margin_bottom_2_cent height_auto w3-animate-zoom";

	$website_dictionary["style"]["tab"]["black"] = $website_dictionary["style"]["tab"]["theme_dark"];

	# Define website style as the style of the selected website
	if ($website_title == $website["website"]) {
		$website["style"] = array_merge($website["style"], $website_dictionary["style"]);
	}

	# Define website image
	$website_dictionary["image"] = [
		"format" => ""
	];	

	if ($website_dictionary["type"] != "Story") {
		# Define the website image link
		$website_dictionary["image"]["link"] = $website_dictionary["folders"]["website"]["Images"]["Remote"]["Icons"]["root"];

		if (
			isset($website_dictionary["json"]["image"]) == True and
			isset($website_dictionary["json"]["image"]["format"]) == True
		) {
			$website_dictionary["image"]["format"] = $website_dictionary["json"]["image"]["format"];
		}

		# Define the remote image folder
		$remote_folder = $website_dictionary["image"]["link"];

		# Define the local image folder
		$local_folder = $website_dictionary["folders"]["website"]["Images"]["Local"]["Icons"]["root"];

		# Replace remote folder with the local PHP images folder
		# To test if the images appear correctly
		if ($parse == "/") {
			$php_folder = "Images/".$website_dictionary["title"]."/";

			$remote_folder = "/".$php_folder;
			$local_folder = $folders["mega"]["php"]["root"].$php_folder;

			$remote_folder .= "Icons/";
			$local_folder .= "Icons/";

			$website_dictionary["image"]["link"] = $remote_folder;
		}

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

		array_push($file_names, $Language -> languages["full"][$language]);

		$website_dictionary["image"]["File name"] = "png";

		foreach ($file_names as $file_name) {
			foreach ($website["Image formats"] as $format) {
				$local_image = $local_folder.$file_name.".".$format;

				$verbose_text .= "\t\t".'"'.$format.'"'."\n";

				if (file_exists($local_image) == True) {
					$website_dictionary["image"]["format"] = $format;
					$website_dictionary["image"]["File name"] = $file_name;
				}
			}
		}

		$website_dictionary["image"]["link"] .= $website_dictionary["image"]["File name"];

		$website_dictionary["image"]["link"] .= ".".$website_dictionary["image"]["format"];
	}

	if (isset($website_dictionary["json"]["image"]["width"]) == False) {
		$website_dictionary["json"]["image"]["width"] = "";
	}

	# Define the website image link for stories
	if (
		$website_dictionary["type"] == "Story" or
		isset($website_dictionary["json"]["story"])
	) {
		# Check for the story cover in the root folder
		if ($website_dictionary["type"] == "Story") {
			$local_folder = $folders["mega"]["websites"]["images"]["story_covers"]["root"].$website_title."/";
			$remote_folder = $website["folders"]["images"]["story_covers"]["root"].$website_title."/";

			$file_name = "Cover";
		}

		if (isset($website_dictionary["json"]["story"])) {
			$local_folder = $folders["mega"]["websites"]["images"]["icons"]["root"];
			$remote_folder = $website["folders"]["images"]["icons"]["root"];

			$file_name = $website_dictionary["titles"]["language"];
		}

		# If the format is empty
		if ($website_dictionary["image"]["format"] == "") {
			foreach ($website["Image formats"] as $format) {	
				$local_image = $local_folder.$file_name.".".$format;
				$local_image_per_language = $local_folder.$full_language."/".$file_name.".".$format;

				if (
					file_exists($local_image) or
					file_exists($local_image_per_language)
				) {
					$website_dictionary["image"]["format"] = $format;
				}
			}
		}

		if (file_exists($local_folder.$file_name.".".$website_dictionary["image"]["format"]) == True) {
			$website_dictionary["image"]["link"] = $remote_folder;
		}

		if (file_exists($local_folder.$file_name.".".$website_dictionary["image"]["format"]) == False) {
			$website_dictionary["image"]["link"] = $remote_folder.$full_language."/";
		}

		$website_dictionary["image"]["link"] .= $file_name.".".$website_dictionary["image"]["format"];

		$website_dictionary["json"]["image"]["width"] = "50";
	}

	if (
		in_array($website_title, $website["years"]) == True or
		str_contains($website_title, "Diary")
	) {
		$website_dictionary["json"]["image"]["width"] = "30";
	}

	$verbose_text .= "\n"."\t"."Formato: ".'"'.$website_dictionary["image"]["format"].'"'."\n\n";

	$verbose_text = str_replace("local_folder", $local_folder, $verbose_text);
	$verbose_text = str_replace("remote_folder", $remote_folder, $verbose_text);

	if (
		$website_dictionary["type"] != "Story" and
		$website_dictionary["image"]["format"] == ""
	) {
		$link = $website["folders"]["images"]["icons"]["root"]."Template.png";

		$website_dictionary["image"]["link"] = $link;
	}

	$verbose_text .= "\t"."Link: ".$website_dictionary["image"]["link"];

	if ($website["verbose"] == True) {
		$Text -> Show_Variable($verbose_text);
		echo "<br>";
	}

	$website_dictionary["image"]["local_link"] = str_replace($website["url"], $folders["mega"]["websites"]["root"], $website_dictionary["image"]["link"]);

	$class = $website_dictionary["style"]["img"]["theme"]["normal"];

	if ($website_dictionary["json"]["image"]["box_shadow"] == True) {
		$class .= " ".$website_dictionary["style"]["box_shadow"]["theme"][$website_dictionary["style"]["box_shadow_color"]];
	}

	$website_dictionary["image"]["element"] = HTML::Element("img", "", 'src="'.$website_dictionary["image"]["link"].'" style="height: auto;"', $class)."<br />"."\n";

	if ($website_dictionary["json"]["image"]["width"] != "") {
		$website_dictionary["image"]["element"] = str_replace("image_size ", "", $website_dictionary["image"]["element"]);
		$website_dictionary["image"]["element"] = str_replace("height: auto;", "max-width: ".$website_dictionary["json"]["image"]["width"]."vw; height: auto;", $website_dictionary["image"]["element"]);
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
			$class = $website_dictionary["style"]["img"]["black"];

			if ($website_dictionary["json"]["image"]["box_shadow"] == True) {
				$class .= " ".$website_dictionary["style"]["box_shadow"]["theme"]["light"];
			}

			$image = HTML::Element("img", "", 'src="'.$website_dictionary["image"]["link"].'" style="height: auto;"', $class)."<br />"."\n";

			if ($website_dictionary["json"]["image"]["width"] != "") {
				$image = str_replace("image_size ", "", $image);
				$image = str_replace("height: auto;", "max-width: ".$website_dictionary["json"]["image"]["width"]."vw; height: auto;", $image);
			}

			$website_dictionary["image"]["elements"][$type] = $image;
		}

		if ($type != "black") {
			foreach (array_keys($website_dictionary["style"]["img"][$type]) as $key) {
				$class = $website_dictionary["style"]["img"]["theme"][$key];

				if ($website_dictionary["json"]["image"]["box_shadow"] == True) {
					$class .= " ".$website_dictionary["style"]["box_shadow"]["theme"][$key];
				}

				$image = HTML::Element("img", "", 'src="'.$website_dictionary["image"]["link"].'" style="height: auto;"', $class." ".$website_dictionary["style"]["img"]["theme"][$key])."<br />"."\n";

				if ($website_dictionary["json"]["image"]["width"] != "") {
					$image = str_replace("image_size ", "", $image);
					$image = str_replace("height: auto;", "max-width: ".$website_dictionary["json"]["image"]["width"]."vw; height: auto;", $image);
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

	# Define the normal website descriptions
	if ($website_dictionary["type"] == "Normal") {
		$json_descriptions = True;

		# Define the JSON descriptions array
		if (isset($website_dictionary["json"]["descriptions"]) == True) {
			$descriptions = $website_dictionary["json"]["descriptions"];
		}

		# Define the file descriptions array
		if (file_exists($website_dictionary["folders"]["php"]["descriptions"]["root"])) {
			$descriptions = [
				"html" => []
			];
		
			# Define the language website descriptions files
			foreach ($website["small_languages"] as $local_language) {
				$descriptions["html"][$local_language] = $File -> Contents($website_dictionary["folders"]["php"]["descriptions"][$local_language])["string"];
			}

			$json_descriptions = False;
		}

		# Define HTML descriptions for year websites
		if (in_array($website_title, $website["years"]) == True) {
			$descriptions["html"] = $website["texts"]["Year website descriptions"];
		}

		$website_dictionary["description"]["html"] = $Language -> Item($descriptions["html"]);

		$description_backup = $website_dictionary["description"]["html"];

		if (str_contains($website_dictionary["description"]["html"], "{website_title}") == True) {
			$website_dictionary["description"]["html"] = str_replace("{website_title}", $website_dictionary["titles"]["language"], $website_dictionary["description"]["html"]);
		}

		if (str_contains($website_dictionary["description"]["html"], "{author}") == True) {
			$website_dictionary["description"]["html"] = str_replace("{author}", $website["author"], $website_dictionary["description"]["html"]);
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

		if (str_contains($website_dictionary["description"]["header"], $website["author"]) == True) {
			$author_text = $website["author"];
		}

		$website_dictionary["description"]["header"] = str_replace($author_text, $website["painted_author"], $website_dictionary["description"]["header"]);

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
		isset($website_dictionary["json"]["story"])
	) {
		# Define website HTML description for story websites
		$website_dictionary["description"]["html"] = Text::Format($website["language_texts"]["website_about_my_story_{}_made_by_izaque_sanvezzo_stake2_funkysnipa_cat"], $website_dictionary["titles"]["language"]);

		$language = $Language -> user_language;

		if ($language == "general") {
			$language = "en";
		}

		# Define synopsis
		$synopsis = str_replace("\n", "<br />"."\n"."\t\t", $website_dictionary["story"]["Information"]["Synopsis"][$language]);

		# Define website header description for story websites
		$website_dictionary["description"]["header"] = "\t\t".'<!-- Story website info, author(s), chapters, readers, creation date, status -->'."\n".
		"\t\t".$website["language_texts"]["synopsis, title()"].": ".$website["icons"]["scroll"]." ".$synopsis."<br />"."\n";

		$website_dictionary["description"]["header"] .= "\t\t"."---<br />"."\n";

		# Add painted author
		$text = $website["language_texts"]["story_author"];

		if (
			isset($website_dictionary["story"]["Information"]["Author"]) == True and
			$website_dictionary["story"]["Information"]["Author"] != $website["author"]
		) {
			$authors_list = $website_dictionary["story"]["Information"]["Authors"];

			$last_author = array_reverse($authors_list)[0];

			# Add painted authors if there are more than one
			if (count($authors_list) > 1) {
				$count = count($authors_list);

				$text = $website["language_texts"]["story_authors"];

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
						$authors .= " ".$website["language_texts"]["and"]." ";
					}
				}

				$author = $authors;
			}
		}

		else {
			$author = $stories["Authors (painted)"][$website["author"]];
		}

		$website_dictionary["story"]["Information"]["Author"] = $author;

		# Add the author
		$website_dictionary["description"]["header"] .= "\t\t".$text.": ".$website["icons"]["pen"]." ".$author."<br />"."\n";

		# Add the chapters text and number
		$website_dictionary["description"]["header"] .= "\t\t".$website["language_texts"]["chapters, title()"].": ".$website["icons"]["book"]." ";

		$website_dictionary["description"]["header"] .= HTML::Element("span", $website_dictionary["story"]["Information"]["Chapters"]["Number"], "", $website_dictionary["style"]["text_highlight"])."<br />"."\n";

		# Add the readers if they exist
		if ($website_dictionary["story"]["Information"]["Readers"]["List"][0] != $website["texts"]["no_readers, en - pt"]) {
			$website_dictionary["description"]["header"] .= "\t\t".$website["language_texts"]["readers, title()"].": ".$website["icons"]["reader"]." ";

			$website_dictionary["description"]["header"] .= HTML::Element("span", $website_dictionary["story"]["Information"]["Readers"]["Number"], "", $website_dictionary["style"]["text_highlight"])."<br />"."\n";
		}

		# Add the story creation date
		$website_dictionary["description"]["header"] .= "\t\t".$website["language_texts"]["story_creation_date"].": ".$website["icons"]["calendar_days"]." ";

		$date = Date::Now($website_dictionary["story"]["Information"]["Creation date"], $website["texts"]["date_format"]["pt"])[$website["language_texts"]["date_format"]];

		$website_dictionary["description"]["header"] .= HTML::Element("span", $date, "", $website_dictionary["style"]["text_highlight"])."<br />"."\n";

		# Add the status
		$status_number = $website_dictionary["story"]["Information"]["Status"]["Number"];
		$status = $website["language_texts"]["writing_statuses, type: list"][$status_number];

		$website_dictionary["description"]["header"] .= "\t\t".$website["language_texts"]["status, title()"].": ".$website["icons"]["status_map"][$status_number]." ";

		$website_dictionary["description"]["header"] .= HTML::Element("span", $status, "", $website_dictionary["style"]["text_highlight"]);

		# Update website title with icon
		$website_dictionary["titles"]["icon"] .= " ".$website["icons"]["status_map"][$status_number];

		# Add Wattpad link if it exists
		if (isset($website_dictionary["story"]["Information"]["Wattpad"]["links"]) == True) {
			$link = $website_dictionary["story"]["Information"]["Wattpad"]["links"][$language];

			$website_dictionary["description"]["header"] .= "<br />"."\n";
			$website_dictionary["description"]["header"] .= "\t\t"."Wattpad: ";

			$website_dictionary["description"]["header"] .= HTML::Element("a", $link, 'href="'.$link.'" target="_new"', $website_dictionary["style"]["text_highlight"]);
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

	$span = HTML::Element("span", $website_title_text, "", $website_dictionary["style"]["text_highlight"]);

	$website_dictionary["description"]["header"] = str_replace($find_text, $span, $website_dictionary["description"]["header"]);

	# Define website color
	$website_dictionary["color"] = "#";

	if (isset($website_dictionary["json"]["color"]) == True) {
		$website_dictionary["color"] .= $website_dictionary["json"]["color"];
	}

	# Define story website color
	if ($website_dictionary["type"] == "Story") {
		$website_dictionary["color"] .= $website_dictionary["story"]["Information"]["HEX color"];
	}

	# Create website link button
	$h2 = HTML::Element("h2", "\n\t\t\t\t".$website_dictionary["titles"]["icon"]."\n\t\t\t", "", "text_size")."\n";

	$button = "\n"."\t\t".'<!-- "'.$website_title.'" link button -->'."\n".
	"\t\t".HTML::Element("button", "\n\t\t\t".$h2."\t\t", 'onclick="window.open(\''.$website_dictionary["links"]["language"].'\')" style="border-radius: 50px;"', "w3-btn ".$website_dictionary["style"]["button"]["theme"]["light"]);

	if ($website_title == $website["website"]) {
		$button = str_replace('window.open(\''.$website_dictionary["links"]["language"].'\')', "", $button);

		$website_icon_title = $website_dictionary["titles"]["icon"];
		$you_are_here_text = $website["language_texts"]["you_are_here"];

		$button = str_replace($website_icon_title, $website_icon_title." (".$you_are_here_text.")", $button);

		$button = str_replace('">', '" title="'.$website_dictionary["links"]["language"].'"'.">", $button);
	}

	$website_dictionary["button"] = $button;

	if (in_array($website_title, $websites["Remove from websites tab"]) == False) {
		$website["website_buttons"] .= $button."\n";
	}

	$website["dictionary"][$website_title] = $website_dictionary;

	# Replace spaces with underscores on website title and add the website dictionary
	$website_title_replaced = str_replace(" ", "_", $website_title);

	$website["dictionary"][$website_title_replaced] = $website_dictionary;

	$website_dictionary = "";

	$i++;
}

?>