<?php 

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

if ($language == "general") {
	$language = "en";
}

$full_language = $Language -> languages["full"][$language];

# Define the website folders for easier typing
$website["data"]["folders"]["Izaque Sanvezzo"] = $folders["Mega"]["Notepad"]["Izaque Sanvezzo"];
$website["data"]["folders"]["About me"] = $website["data"]["folders"]["Izaque Sanvezzo"][$language]["About me"];
$website["data"]["folders"]["Social Networks"] = $website["data"]["folders"]["Izaque Sanvezzo"]["en"]["Social Networks"];

# Define website files
$website["data"]["files"] = [
	"Social Networks" => $website["data"]["folders"]["Social Networks"]["Social Networks"]
];

# Define the identities array
$identities = [
	"Izaque",
	"Stake2",
	"Funkysnipa Cat"
];

# Define the identities folders
foreach ($identities as $identity) {
	foreach (["Local", "Remote"] as $type) {
		$folder = $website["data"]["folders"]["website"]["Images"][$type]["root"];

		$website["data"]["folders"]["website"]["Images"][$type][$identity] = [
			"root" => $folder.$identity."/"
		];
	}
}

foreach ($identities as $identity) {
	# Define identity folder and text file
	$folder = $website["data"]["folders"]["About me"]["Little biography"];
	$file_name = $website["language_texts"]["text, title()"];

	if ($identity != "Izaque") {
		$folder = $website["data"]["folders"]["Izaque Sanvezzo"][$language][$identity];
	}

	$file = $folder["root"].$file_name.".txt";

	$title = $website["language_texts"]["person, title()"];

	if ($identity != "Izaque") {
		$title = $website["language_texts"]["digital_identity"];
	}

	$title .= ": ".$identity;

	# Define tab template for identity
	$website["tabs"]["templates"][$identity] = [
		"name" => $identity,
		"title" => $title,
		"add" => " ".$website["icons"]["user_circle"],
		"icon" => "user_circle",
		"text_style" => "text-align: left;"
	];

	$string = $File -> Contents($file)["string"];

	foreach ($identities as $local_identity) {
		# Replace identity text with colored identity text
		$element = HTML::Element("b", $local_identity, "", $website["data"]["style"]["text_highlight"]);

		$string = str_replace($local_identity, $element, $string);
	}

	# Define the content of the tab
	$website["tabs"]["templates"][$identity]["content"] = "";

	$remote_folder = $website["data"]["folders"]["website"]["Images"]["Remote"]["root"];
	$local_folder = $website["data"]["folders"]["website"]["Images"]["Local"]["root"];

	# Replace remote folder with the local PHP images folder
	# To test if the images appear correctly
	if ($parse == "/") {
		$php_folder = "Images/".$website["data"]["title"]."/";

		$remote_folder = "/".$php_folder;
		$local_folder = $folders["mega"]["php"]["root"].$php_folder;
	}

	if ($identity != "Izaque") {
		$images = [
			"Profile" => [],
			"Versions" => [],
			"Special" => [],
			"Cover" => []
		];

		$style = "width: 40%; height: auto;";

		$link = $remote_folder.$identity.".png";

		# Add the "Stake2" profile picture
		if ($identity == "Stake2") {
			# Identity image
			$image = "<center>".HTML::Element("img", "", 'src="'.$link.'" style="'.$style.' border-radius: 100%;"', $website["style"]["img"]["theme"]["normal"])."</center>";
		}

		# Add the "Funkysnipa Cat" profile picture
		if ($identity == "Funkysnipa Cat") {
			$class = str_replace("border_radius_100_cent", "border_radius_5_cent", $website["style"]["img"]["theme"]["light"]);

			# Identity image
			$image = "<center>".HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $website["style"]["box_shadow"]["theme"]["light"]." ".$class)."</center>";
		}

		array_push($images["Profile"], $image);

		# Add the first image of the Digital Identity
		$website["tabs"]["templates"][$identity]["content"] .= $image;

		$style = "width: 25%; height: auto;";

		if (
			$identity == "Stake2" or
			$identity == "Funkysnipa Cat"
		) {
			$remote_folder .= $identity."/";
			$local_folder .= $identity."/";

			$style .= "border-radius: 5%;";
			$class = $website["style"]["box_shadow"]["theme"]["light"]." ".$website["style"]["img"]["theme"]["light"];

			$number_of_images = 7;

			# Change the number of images for "Funkysnipa Cat"
			if ($identity == "Funkysnipa Cat") {
				$number_of_images = 8;
			}

			# Add the profile pictures of the Digital Identities
			$i = 1;
			while ($i <= $number_of_images) {
				$right_format = "png";

				foreach ($website["Image formats"] as $format) {
					if (file_exists($local_folder.$i.".".$format) == True) {
						$right_format = $format;
					}
				}

				$link = $remote_folder.$i.".".$right_format;

				# Identity image
				$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class);

				array_push($images["Versions"], $image);

				$i++;
			}

			# Define the "Christmas" image
			$text = "Christmas";

			if (file_exists($local_folder.$text.".png")) {
				$link = $remote_folder.$text.".png";

				# Identity image
				$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class);

				array_push($images["Special"], $image);
			}

			# Define the "Halloween" image
			$text = "Halloween";

			if (file_exists($local_folder.$text.".png")) {
				$link = $remote_folder.$text.".png";

				# Identity image
				$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class);

				array_push($images["Special"], $image);
			}

			# Define the "Cover" image
			$folder = $remote_folder."Covers/";

			$link = $folder.$full_language.".png";

			# Identity image
			$image = HTML::Element("img", "", 'src="'.$link.'" style="border-radius: 4%; height: auto;"', "image_size"." ".$website["style"]["box_shadow"]["theme"]["light"]);

			array_push($images["Cover"], $image);
		}

		# Add HR separators and the description of the identity
		$website["tabs"]["templates"][$identity]["content"] .= $website["elements"]["hr_1px_no_margin"]["theme"]["light"]."\n".
		$string."\n".
		$website["elements"]["hr_1px_no_margin"]["theme"]["light"]."\n";

		# Add the image "Versions" text
		$bold = HTML::Element("b", $website["language_texts"]["versions, title()"].":", "", "");

		$h2 = HTML::Element("h2", $bold, "", "text_size")."\n";

		$center = HTML::Element("center", $h2, "", "");

		$website["tabs"]["templates"][$identity]["content"] .= $center;

		# Add the images versions
		foreach ($images["Versions"] as $image) {
			$website["tabs"]["templates"][$identity]["content"] .= $image;
		}

		# Add a HR separator
		$website["tabs"]["templates"][$identity]["content"] .= $website["elements"]["hr_1px_no_margin"]["theme"]["light"]."\n";

		if ($images["Special"] != []) {
			# Add the image "Special" text
			$bold = HTML::Element("b", $website["language_texts"]["specials, title()"].":", "", "");

			$h2 = HTML::Element("h2", $bold, "", "text_size")."\n";

			$center = HTML::Element("center", $h2, "", "");

			$website["tabs"]["templates"][$identity]["content"] .= $center;

			# Center the images
			$website["tabs"]["templates"][$identity]["content"] .= "<center>"."\n";

			# Add the special images
			foreach ($images["Special"] as $image) {
				$website["tabs"]["templates"][$identity]["content"] .= $image;
			}

			$website["tabs"]["templates"][$identity]["content"] .= "</center>";
		}

		# Add a HR separator
		$website["tabs"]["templates"][$identity]["content"] .= $website["elements"]["hr_1px_no_margin"]["theme"]["light"]."\n";

		# Add the image "Cover" text
		$bold = HTML::Element("b", $website["language_texts"]["cover, title()"].":", "", "");

		$h2 = HTML::Element("h2", $bold, "", "text_size")."\n";

		$center = HTML::Element("center", $h2, "", "");

		$website["tabs"]["templates"][$identity]["content"] .= $center;

		# Center the images
		$website["tabs"]["templates"][$identity]["content"] .= "<center>"."\n";

		# Add the cover images
		foreach ($images["Cover"] as $image) {
			$website["tabs"]["templates"][$identity]["content"] .= $image;
		}

		$website["tabs"]["templates"][$identity]["content"] .= "</center>";
	}

	if ($identity == "Izaque") {
		$website["tabs"]["templates"][$identity]["content"] .= $string;
	}
}

foreach ($identities as $identity) {
	# Replace identity text with colored identity text
	$element = HTML::Element("b", $identity, "", $website["data"]["style"]["text_highlight"]);

	$website["data"]["description"]["header"] = str_replace($identity, $element, $website["data"]["description"]["header"]);
}

# Define tab template for Social Networks
$website["tabs"]["templates"]["Social Networks"] = [
	"name" => $website["language_texts"]["social_networks"],
	"icon" => "globe",
	"content" => ""
];

$social_networks_json = $JSON -> To_PHP($website["data"]["files"]["Social Networks"]);

# Iterate through Social Network categories
foreach (array_keys($social_networks_json["Categories"]) as $category) {
	$key = str_replace(" ", "_", strtolower($category));

	if (str_contains($key, "_") == False) {
		$key .= ", title()";
	}

	$text = $website["language_texts"][$key];

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t".'<div class="'.$website["style"]["background"]["theme"]["dark"]." ".$website["style"]["border_4px"]["theme"]["light"]." ".$website["style"]["box_shadow"]["theme"][$website["style"]["box_shadow_color"]].' margin_top_bottom_2_cent border_radius_50px" style="margin-left:10%; margin-right:10%;">'."\n";

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t\t".HTML::Element("h2", "\n\t\t\t".$text.": "."\n\t\t", 'style="font-weight: bold;"', "text_size ".$website["style"]["text"]["theme"]["light"]." margin_top_bottom_2_cent")."\n";

	$social_networks = $social_networks_json["Categories"][$category];

	# Iterate through Social Networks
	foreach ($social_networks as $social_network) {
		$link = $social_networks_json["Dictionary"][$social_network]["Link"];

		if (isset($website["icons"][$social_network])) {
			$social_network .= " ".$website["icons"][$social_network];
		}

		$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t\t".HTML::Button($social_network, 'onclick="window.open(\''.$link.'\');"', " margin_top_bottom_2_cent");
	}

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t"."</div>";
}

?>