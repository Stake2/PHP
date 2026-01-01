<?php 

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

if ($language == "general") {
	$language = "en";
}

$full_language = $Language -> languages["Full"][$language];

# Define the website folders for easier typing
$website["Data"]["Folders"]["Izaque Sanvezzo"] = $folders["Mega"]["Notepad"]["Izaque"];
$website["Data"]["Folders"]["About me"] = $website["Data"]["Folders"]["Izaque Sanvezzo"][$language]["About me"];
$website["Data"]["Folders"]["Social Networks"] = $website["Data"]["Folders"]["Izaque Sanvezzo"]["en"]["Social Networks"];

# Define website files
$website["Data"]["Files"] = [
	"Social Networks" => $website["Data"]["Folders"]["Social Networks"]["Social Networks"]
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
		$folder = $website["Data"]["Folders"]["Website"]["Images"][$type]["root"];

		$website["Data"]["Folders"]["Website"]["Images"][$type][$identity] = [
			"root" => $folder.$identity."/"
		];
	}
}

foreach ($identities as $identity) {
	# Define identity folder and text file
	$folder = $website["Data"]["Folders"]["About me"]["Little biography"];
	$file_name = $website["Language texts"]["text, title()"];

	if ($identity != "Izaque") {
		$folder = $website["Data"]["Folders"]["Izaque Sanvezzo"][$language][$identity];
	}

	$file = $folder["root"].$file_name.".txt";

	$title = $website["Language texts"]["person, title()"];

	if ($identity != "Izaque") {
		$title = $website["Language texts"]["digital_identity"];
	}

	$title .= ": ".$identity;

	# Define tab template for identity
	$website["tabs"]["templates"][$identity] = [
		"name" => $identity,
		"title" => $title,
		"add" => " ".$website["Icons"]["user_circle"],
		"icon" => "user_circle",
		"text_style" => "text-align: left;"
	];

	$string = $File -> Contents($file)["string"];

	foreach ($identities as $local_identity) {
		# Replace identity text with colored identity text
		$element = HTML::Element("b", $local_identity, "", $website["Data"]["Style"]["text_highlight"]);

		$string = str_replace($local_identity, $element, $string);
	}

	# Define the content of the tab
	$website["tabs"]["templates"][$identity]["content"] = "";

	$remote_folder = $website["Data"]["Folders"]["Website"]["Images"]["Remote"]["root"];
	$local_folder = $website["Data"]["Folders"]["Website"]["Images"]["Local"]["root"];

	# Replace remote folder with the local PHP images folder
	# To test if the images appear correctly
	if ($website["States"]["Website"]["Generate"] == False) {
		$php_folder = "Images/".$website["Data"]["title"]."/";

		$remote_folder = "/".$php_folder;
		$local_folder = $folders["Mega"]["PHP"]["root"].$php_folder;
	}

	if ($identity != "Izaque") {
		$images = [
			"Profile" => [],
			"Versions" => [],
			"Special" => [],
			"Cover" => []
		];

		$style = "";

		$link = $remote_folder.$identity.".png";

		# Add the "Stake2" profile picture
		if ($identity == "Stake2") {
			# Chaneg the 100% border radius to 5%
			$class = str_replace("border_radius_100_cent", "border_radius_5_cent", $website["Style"]["img"]["theme"]["normal"]);

			# Identity image
			$image = "<center>"."\n".
			HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class)."\n".
			"</center>";
		}

		# Add the "Funkysnipa Cat" profile picture
		if ($identity == "Funkysnipa Cat") {
			# Chaneg the 100% border radius to 5%
			$class = str_replace("border_radius_100_cent", "border_radius_5_cent", $website["Style"]["img"]["theme"]["normal"]);

			# Identity image
			$image = "<center>"."\n".
			HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class)."\n".
			"</center>";
		}

		array_push($images["Profile"], $image);

		# Add the first image of the Digital Identity
		$website["tabs"]["templates"][$identity]["content"] .= $image;

		# Define the default style
		$style = "width: auto; height: 50vh;";

		if (
			$identity == "Stake2" or
			$identity == "Funkysnipa Cat"
		) {
			$remote_folder .= $identity."/";
			$local_folder .= $identity."/";

			# add border radius to the style
			$style .= "border-radius: 5%; margin: 10px;";

			$class = $website["Style"]["img"]["theme"]["light"]." ".$website["Style"]["border_4px"]["theme"]["light"];

			$number_of_images = 7;

			# Change the number of images for the "Funkysnipa Cat" digital identity
			if ($identity == "Funkysnipa Cat") {
				$number_of_images = 8;
			}

			# Add the profile pictures of the digital identities
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
				$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class, $tab = [], $display = "inline");

				array_push($images["Versions"], $image);

				$i++;
			}

			# Update the default style
			$style = "border-radius: 5%;";

			# Define the "Christmas" image
			$text = "Christmas";

			if (file_exists($local_folder.$text.".png")) {
				$link = $remote_folder.$text.".png";

				# Identity image
				$image = "<center>"."\n".
				HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class)."\n".
				"</center>";

				array_push($images["Special"], $image);
			}

			# Define the "Halloween" image
			$text = "Halloween";

			if (file_exists($local_folder.$text.".png")) {
				$link = $remote_folder.$text.".png";

				# Identity image
				$image = "<center>"."\n".
				HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class)."\n".
				"</center>";

				array_push($images["Special"], $image);
			}

			# Define the "Cover" image
			$folder = $remote_folder."Covers/";

			$link = $folder.$full_language.".png";

			# Identity image
			$image = "<center>"."\n".
			HTML::Element("img", "", 'src="'.$link.'" style="border-radius: 4%; height: auto;"', "image_size"." ".$website["Style"]["box_shadow"]["theme"]["light"])."\n".
			"</center>";

			array_push($images["Cover"], $image);
		}

		# Add HR separators and the description of the identity
		$website["tabs"]["templates"][$identity]["content"] .= $website["elements"]["hr_1px_no_margin"]["theme"]["light"]."\n".
		$string."\n".
		$website["elements"]["hr_1px_no_margin"]["theme"]["light"]."\n";

		# Add the image "Versions" text
		$bold = HTML::Element("b", $website["Language texts"]["versions, title()"].":", "", "");

		$h2 = HTML::Element("h2", $bold, "", "text_size")."\n";

		$center = HTML::Element("center", $h2, "", "");

		$website["tabs"]["templates"][$identity]["content"] .= $center;

		# Open a "center" tag
		$website["tabs"]["templates"][$identity]["content"] .= "<center>";

		# Add the images versions
		foreach ($images["Versions"] as $image) {
			$website["tabs"]["templates"][$identity]["content"] .= $image;
		}

		# Close the "center" tag
		$website["tabs"]["templates"][$identity]["content"] .= "</center>";

		# Add a HR separator
		$website["tabs"]["templates"][$identity]["content"] .= $website["elements"]["hr_1px_no_margin"]["theme"]["light"]."\n";

		if ($images["Special"] != []) {
			# Add the image "Special" text
			$bold = HTML::Element("b", $website["Language texts"]["specials, title()"].":", "", "");

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
		$bold = HTML::Element("b", $website["Language texts"]["cover, title()"].":", "", "");

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
	$element = HTML::Element("b", $identity, "", $website["Data"]["Style"]["text_highlight"]);

	$website["Data"]["description"]["header"] = str_replace($identity, $element, $website["Data"]["description"]["header"]);
}

# Define the tab template for the social networks
$website["tabs"]["templates"]["Social Networks"] = [
	"name" => $website["Language texts"]["social_networks"],
	"icon" => "globe",
	"content" => ""
];

$social_networks_json = $JSON -> To_PHP($website["Data"]["Files"]["Social Networks"]);

# Iterate through the social network categories
foreach (array_keys($social_networks_json["Categories"]) as $category) {
	$key = str_replace(" ", "_", strtolower($category));

	if (str_contains($key, "_") == False) {
		$key .= ", title()";
	}

	$text = $website["Language texts"][$key];

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t".'<div class="'.$website["Style"]["background"]["theme"]["dark"]." ".$website["Style"]["border_4px"]["theme"]["light"]." ".$website["Style"]["box_shadow"]["theme"][$website["Style"]["box_shadow_color"]].' margin_top_bottom_2_cent border_radius_50px" style="margin-left:10%; margin-right:10%;">'."\n";

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t\t".HTML::Element("h2", "\n\t\t\t".$text.": "."\n\t\t", 'style="font-weight: bold;"', "text_size ".$website["Style"]["text"]["theme"]["light"]." margin_top_bottom_2_cent")."\n";

	$social_networks = $social_networks_json["Categories"][$category];

	# Iterate through Social Networks
	foreach ($social_networks as $social_network) {
		$link = $social_networks_json["Dictionary"][$social_network]["Link"];

		if (isset($website["Icons"][$social_network])) {
			$social_network .= " ".$website["Icons"][$social_network];
		}

		$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t\t".HTML::Button($social_network, 'onclick="window.open(\''.$link.'\');"', " margin_top_bottom_2_cent");
	}

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t"."</div>";
}

?>