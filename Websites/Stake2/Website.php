<?php 

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

if ($language == "general") {
	$language = "en";
}

$full_language = $Language -> languages["full"][$language];

# Define website folders
$website["data"]["folders"]["izaque_sanvezzo"] = $folders["Mega"]["Notepad"]["Izaque Sanvezzo"];

$website["data"]["folders"]["Social Networks"] = $folders["Mega"]["Notepad"]["Izaque Sanvezzo"]["about_me_sobre_mim"]["Social Networks"];

# Define website files
$website["data"]["files"] = [
	"Social Networks" => $website["data"]["folders"]["Social Networks"]["root"]."Social Networks.json",
];

# Define identities array
$identities = [
	"Izaque",
	"Stake2",
	"Funkysnipa Cat"
];

foreach ($identities as $identity) {
	# Define identity folder and text file
	$folder = $website["data"]["folders"]["izaque_sanvezzo"]["about_me_sobre_mim"]["root"];
	$file_name = $website["language_texts"]["little_biography"];

	if ($identity != "Izaque") {
		$folder = $website["data"]["folders"]["izaque_sanvezzo"]["about_me_sobre_mim"]["root"].$identity."/";
		$file_name = $full_language;
	}

	$file = $folder.$file_name.".txt";

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

	$website["tabs"]["templates"][$identity]["content"] = $string;

	if ($identity != "Izaque") {
		$images = [];

		$style = "width: 40%; height: auto;";

		# Add the "Stake2" profile picture
		if ($identity == "Stake2") {
			$link = $website["data"]["folders"]["website"]["website_images"]["images"]["root"].$identity.".png";

			# Identity image
			$image = "<center>".HTML::Element("img", "", 'src="'.$link.'" style="'.$style.' border-radius: 100%;"', $website["style"]["img"]["theme"]["normal"])."</center>";

			array_push($images, $image);
		}

		# Add the "Funkysnipa Cat" profile picture
		if ($identity == "Funkysnipa Cat") {
			$link = $website["data"]["folders"]["website"]["website_images"]["images"]["root"].$identity.".png";

			$class = str_replace("border_radius_100_cent", "border_radius_5_cent", $website["style"]["img"]["theme"]["light"]);

			# Identity image
			$image = "<center>".HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $website["style"]["box_shadow"]["theme"]["light"]." ".$class)."</center>";

			array_push($images, $image);
		}

		$style = "width: 25%; height: auto;";

		if (
			$identity == "Stake2" or
			$identity == "Funkysnipa Cat"
		) {
			$remote_folder = $website["data"]["folders"]["website"]["website_images"]["images"]["root"].$identity."/";
			$local_folder = $website["data"]["folders"]["local_website"]["images"]["images"]["root"].$identity."/";

			$style .= "border-radius: 5%;";
			$class = $website["style"]["box_shadow"]["theme"]["light"]." ".$website["style"]["img"]["theme"]["light"];

			$number_of_images = 7;

			# Add Digital Identities profile pictures
			$i = 1;
			while ($i <= $number_of_images) {
				foreach ($website["Image formats"] as $format) {
					if (file_exists($local_folder.$i.".".$format)) {
						$right_format = $format;
					}
				}

				$link = $remote_folder.$i.".".$right_format;

				# Identity image
				$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class);

				array_push($images, $image);

				$i++;
			}

			$text = $website["language_texts"]["christmas, title(), en - pt"];

			if (file_exists($local_folder.$text.".png")) {
				# Add the "Christmas" profile picture of the Digital Identity
				$link = $remote_folder.$text.".png";

				# Identity image
				$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class);

				array_push($images, $image);
			}

			$text = $website["language_texts"]["halloween, title()"];

			if (file_exists($local_folder.$text.".png")) {
				# Add Halloween profile picture of the Digital Identity
				$link = $remote_folder.$text.".png";

				# Identity image
				$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class);

				array_push($images, $image);
			}
		}

		# Define tab content
		$website["tabs"]["templates"][$identity]["content"] = "";

		foreach ($images as $image) {
			$website["tabs"]["templates"][$identity]["content"] .= $image;
		}
		
		$website["tabs"]["templates"][$identity]["content"] .= $website["elements"]["hr_1px_no_margin"]["theme"]["light"]."\n".
		$string;
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
		$link = $social_networks_json[$social_network]["Link"];

		if (isset($website["icons"][$social_network])) {
			$social_network .= " ".$website["icons"][$social_network];
		}

		$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t\t".HTML::Button($social_network, 'onclick="window.open(\''.$link.'\');"', " margin_top_bottom_2_cent");
	}

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t"."</div>";
}

?>