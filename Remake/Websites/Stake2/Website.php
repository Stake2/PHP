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
$website["data"]["folders"]["izaque_sanvezzo"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["izaque_sanvezzo"];

$website["data"]["folders"]["social_networks"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["izaque_sanvezzo"]["about_me_sobre_mim"]["social_networks"];

# Define website files
$website["data"]["files"] = [
	"social_networks" => $website["data"]["folders"]["social_networks"]["root"]."Social Networks.json",
];

# Define identities array
$identities = [
	"Izaque",
	"Stake2",
	"Funkysnipa Cat",
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
		"text_style" => "text-align: left;",
	];

	$string = File::Contents($file)["string"];

	foreach ($identities as $local_identity) {
		# Replace identity text with colored identity text
		$bold = HTML::Element("b", $local_identity, "", "text_light_orange");

		$string = str_replace($local_identity, $bold, $string);
	}

	$website["tabs"]["templates"][$identity]["content"] = $string;

	if ($identity != "Izaque") {
		$images = [];

		$style = "width: 25%; height: auto;";

		# Add Stake2 profile picture
		if ($identity == "Stake2") {
			$link = $website["data"]["folders"]["website"]["images"]["images"]["root"].$identity.".png";

			# Identity image
			$image = "<center>".HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $website["style"]["box_shadow"]["theme"][$website["style"]["box_shadow_color"]]." ".$website["style"]["img"]["theme"]["normal"])."</center>";

			array_push($images, $image);
		}

		if ($identity == "Funkysnipa Cat") {
			$folder = $website["data"]["folders"]["website"]["images"]["images"]["root"].$identity."/";

			$style .= "border-radius: 50px;";
			$class = $website["style"]["box_shadow"]["theme"]["dark"]." ".$website["style"]["img"]["theme"]["dark"];

			# Add Funkysnipa Cat profile pictures
			$i = 1;
			while ($i <= 6) {
				$link = $folder.$i.".jpg";

				# Identity image
				$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class);

				array_push($images, $image);

				$i++;
			}

			# Add Christmas profile picture of Funkysnipa Cat
			$link = $folder.$website["language_texts"]["christmas, title(), en - pt"].".jpg";

			# Identity image
			$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class);

			array_push($images, $image);

			# Add Halloween profile picture of Funkysnipa Cat
			$link = $folder.$website["language_texts"]["halloween, title()"].".jpg";

			# Identity image
			$image = HTML::Element("img", "", 'src="'.$link.'" style="'.$style.'"', $class);

			array_push($images, $image);
		}

		# Define tab content
		$website["tabs"]["templates"][$identity]["content"] = "";

		foreach ($images as $image) {
			$website["tabs"]["templates"][$identity]["content"] .= $image;

			if ($image != array_reverse($images)[0] and $identity != "Funkysnipa Cat") {
				$website["tabs"]["templates"][$identity]["content"] .= "<br />"."\n";
			}
		}
		
		$website["tabs"]["templates"][$identity]["content"] .= $website["elements"]["hr_1px_no_margin"]["theme"]["light"]."\n".
		$string;
	}
}

foreach ($identities as $identity) {
	# Replace identity text with colored identity text
	$bold = HTML::Element("b", $identity, "", "text_light_orange");

	$website["data"]["description"]["header"] = str_replace($identity, $bold, $website["data"]["description"]["header"]);
}

# Define tab template for Social Networks
$website["tabs"]["templates"]["Social Networks"] = [
	"name" => $website["language_texts"]["social_networks"],
	"icon" => "globe",
	"content" => "",
];

$social_networks_json = File::JSON($website["data"]["files"]["social_networks"]);

# Iterate through Social Network categories
foreach (array_keys($social_networks_json["categories"]) as $category) {
	$key = $category;

	if (strstr($category, "_") === False) {
		$key .= ", title()";
	}

	$text = $website["language_texts"][$key];

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t".'<div class="'.$website["style"]["background"]["theme"]["dark"]." ".$website["style"]["border_4px"]["theme"]["light"]." ".$website["style"]["box_shadow"]["theme"][$website["style"]["box_shadow_color"]].' margin_top_bottom_2_cent border_radius_50px" style="margin-left:10%; margin-right:10%;">'."\n";

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t\t".HTML::Element("h2", "\n\t\t\t".$text.": "."\n\t\t", 'style="font-weight: bold;"', "text_size ".$website["style"]["text"]["theme"]["light"]." margin_top_bottom_2_cent")."\n";

	$social_networks = $social_networks_json["categories"][$category];

	# Iterate through Social Networks
	foreach ($social_networks as $social_network) {
		$link = $social_networks_json[$social_network]["link"];

		if (isset($website["icons"][$social_network])) {
			$social_network .= " ".$website["icons"][$social_network];
		}

		$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t\t".HTML::Button($social_network, 'onclick="window.open(\''.$link.'\');"', " margin_top_bottom_2_cent");
	}

	$website["tabs"]["templates"]["Social Networks"]["content"] .= "\t"."</div>";
}

?>