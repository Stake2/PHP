<?php 

# Insert variables

function Create_Chapter_Link_And_Button($numbers, $website_title) {
	global $website;
	global $language;
	global $parse;

	# Define chapter links
	$number_names = [
		"9" => "nine",
		"10" => "ten",
		"26" => "twenty_six"
	];

	$key = str_replace(" ", "_", $website_title);

	$i = 0;
	foreach ($numbers as $number) {
		$number = (string)$number;

		$number_name = $number_names[$number];

		$website_data = $website["Dictionary"][$website_title];

		$title = $website_data["titles"]["language"];

		$text = $website["Language texts"][$number_name];

		$link = $website_data["links"]["element"];
		$link = str_replace('"'.$title.'"', $text, $link);

		if ($website["States"]["Website"]["Generate"] == False) {
			$link = str_replace($website_title, $website_title."&chapter=".$number."#", $link);
		}

		if ($website["States"]["Website"]["Generate"] == True) {
			$link = str_replace($language."/", $language."/?chapter=".$number."#", $link);
		}

		$website["Variable_Inserter"][$key]["chapter_".$number] = $link;

		$chapter_title = $website_data["Story"]["Information"]["Chapters"]["Titles"][$language][$number - 1];

		$link = $website_data["links"]["language"];

		if ($website["States"]["Website"]["Generate"] == False) {
			$link .= "&";
		}

		if ($website["States"]["Website"]["Generate"] == True) {
			$link .= "?";
		}

		$link .= "chapter=".$number."#";

		$website["Variable_Inserter"][$key]["chapter_".$number."_button"] = '<div style="padding-top: 1%;">'."\n".
		HTML::Element("a", "\n\t".$title." - ".$website["Language texts"]["chapter, title()"].": ".$number." - ".$chapter_title."\n\t", 'href="'.$link.'" target="_blank" style="max-width: 50%; font-weight: bold;"', "w3-btn ".$website_data["Style"]["button"]["theme"]["light"]." animation_shake_side")."\n".
		"</div>"."\n";

		$i++;
	}
}

# Define the songs of Variable Inserter
$website["Variable_Inserter"]["songs"] = [];

$songs = [
	"Porter_Robinson_Madeon_Shelter_Official_Video_Link" => [
		"text" => [
			"en" => "Porter Robinson & Madeon - Shelter (Official Video) (Short Film with A-1 Pictures & Crunchyroll)",
			"pt" => "Porter Robinson & Madeon - Shelter (Vídeo Oficial) (Filme curto com A-1 Pictures & Crunchyroll)"
		],
		"id" => "fzQ6gRAEoy0"
	],
	"God's_Warrior_-_Still_Got_Something" => [
		"text" => [
			"en" => "'Still Got Something' from God's Warrior",
			"pt" => "'Still Got Something' do God's Warrior"
		],
		"id" => "8WYMQbWUxGM"
	],
	"Skybreak_&_Mizu_-_Aurora" => [
		"id" => "J2P1_v9aFV8"
	],
	"Panda_Eyes_-_Take_My_Hand_Ft._Azuria_Sky_(Z∆NE_Remix)" => [
		"id" => "OCIEd71mViM"
	],
	"Tom_&_Jerry_(2021)_Soundtrack_Playlist" => [
		"id" => "PLDisKgcnAC4TkSDGxuPm1DeohG8FMEMNa",
		"no_text" => True,
		"embed" => True
	],
	"Tom_&_Jerry_-_Married_In_The_Park" => [
		"id" => "cAlTw8szj6Q",
		"embed" => True
	],
	"Tom_&_Jerry_-_The_Wedding's_Off" => [
		"id" => "SCxnA10GOMA",
		"embed" => True
	],
	"Among_Us_Trap_Remix_By_Leonz" => [
		"text" => [
			"en" => "Among Us Drip Theme Song Original (Among Us Trap Remix / Amogus Meme Music) by Leonz",
			"pt" => "Tema musical original drip do Among Us (Remix de Trap do Among Us / Música de Meme do Amogus) por Leonz"
		],
		"id" => "fzQ6gRAEoy0"
	]
];

foreach (array_keys($songs) as $key) {
	$song = $songs[$key];

	$text = str_replace("_", " ", $key);

	if (isset($song["text"]) == True) {
		$text = $Language -> Item($song["text"]);
	}

	if (isset($song["no_text"]) == True) {
		$text = "";
	}

	$link = "https://www.youtube.com/";

	if (isset($song["embed"]) == True) {
		$link .= "embed/";
	}

	if (isset($song["embed"]) == False) {
		$link .= "watch?v=";
	}

	if (strstr($key, "Playlist") == False) {
		$text = '"'.$text.'"';
		$link .= $song["id"];
	}

	if (strstr($key, "Playlist") == True) {
		if (isset($song["embed"]) == True) {
			$link .= "videoseries";
		}

		if (isset($song["embed"]) == False) {
			$link .= "playlist?";
		}
	}

	if (isset($song["embed"]) == True) {
		$link .= "?autoplay=0&fs=1&iv_load_policy=1&showinfo=1&rel=0&cc_load_policy=1&start=0&end=0&";
	}

	if (strstr($key, "Playlist") == True) {
		$link .= "list=".$song["id"];
	}

	if (isset($song["embed"]) == False) {
		$website["Variable_Inserter"]["songs"][$key] = HTML::Element("a", $text, 'href="'.$link.'" target="_blank"');

		$website["Variable_Inserter"]["songs"][$key."_no_quote"] = HTML::Element("a", str_replace('"', "", $text), 'href="'.$link.'" target="_blank"');
	}

	if (isset($song["embed"]) == True) {
		if ($text != "") {
			$text = $text."<br />"."\n";
		}

		$website["Variable_Inserter"]["songs"][$key] = $text.'<div class="video-container" style="margin-top: 1%; margin-bottom: -6%;"><iframe type="text/html" width="560" height="315" frameborder="0" class="border_radius_5_cent '.$website["Style"]["border_4px"]["secondary_theme"]["light"].'" src="'.$link.'" title="YouTube video player"></iframe></div><br /><br /><br />';
	}
}

# Define "The Life of Littletato" images
$website["Variable_Inserter"]["The_Life_of_Littletato"]["Images"] = [
	"Chapters" => []
];

# Define the chapter number
$chapter_number = $stories["Dictionary"]["The Life of Littletato"]["Information"]["Chapters"]["Numbers"]["Total"];

# Define some local variables
$i = 1;
$dictionary = [];

# Make the while loop
while ($i <= $chapter_number) {
	# Add one to the local chapter number and make it a string
	$number = strval($i);

	# Create the chapter dictionary
	$dictionary[$number] = [];

	# Get the chapter folder
	$folder = $website["Dictionary"]["The Life of Littletato"]["Folders"]["Website"]["Images"]["Local"]["Chapters"][$number]["root"];

	# Add the "Images" sub-folder
	$folder .= "Images/";

	# If the "Images" sub-folder exist
	if ($Folder -> Exist($folder)) {
		# List the images inside the chapter "Images" folder
		$items = $Folder -> Contents($folder)["File"]["Dictionary"];

		# Add each image with its key
		foreach (array_values($items) as $file) {
			$key = str_replace(" ", "_", $file["Name"]);

			$replace = $website["Dictionary"]["The Life of Littletato"]["Folders"]["Website"]["Images"]["Local"]["Chapters"]["root"];

			$with = $website["Dictionary"]["The Life of Littletato"]["Folders"]["Website"]["Images"]["Remote"]["Chapters"]["root"];

			# Replace remote folder with the local PHP images folder
			# To test if the images appear correctly
			if ($website["States"]["Website"]["Generate"] == False) {
				$php_folder = "/Images/".$website["Dictionary"]["The Life of Littletato"]["title"]."/Chapters/";

				$with = $php_folder;
			}

			$file["Path"] = str_replace($replace, $with, $file["Path"]);

			$image = "<br />".HTML::Element("img", "", 'src="'.$file["Path"].'" style="max-width: 50%;"', $website["Data"]["Style"]["img"]["secondary_theme"]["light"]." ".$website["Data"]["Style"]["box_shadow"]["black"])."<br />";

			$dictionary[$number][$key] = $image;
		}	
	}

	$i++;
}

$website["Variable_Inserter"]["The_Life_of_Littletato"]["Images"]["Chapters"] = $dictionary;

# Define "The Life of Littletato" songs
$songs = [
	"Yuru_Camp_Solo_Camp" => [
		"text" => "Yuru Camp",
		"link" => "https://www.youtube.com/watch?v=xZIqgCHrhRM"
	],
	"Yuru_Camp_Soundtrack" => [
		"text" => [
			"en" => "Yuru Camp soundtrack",
			"pt" => "Trilha sonora de Yuru Camp"
		],
		"link" => "https://www.youtube.com/watch?v=xZIqgCHrhRM"
	],
	"Yuru_Camp_Solo_Camp_Title" => [
		"text" => "Yuru Camp △ - OST - ソロキャン△のすすめ - Solo Camp 10 Hours",
		"link" => "https://www.youtube.com/watch?v=xZIqgCHrhRM"
	],
	"Folk_Songs" => [
		"text" => [
			"en" => "folk songs",
			"pt" => "músicas do gênero folk"
		],
		"link" => "https://www.youtube.com/watch?v=gRejhGxr69Y"
	],
	"Take_That_By_RIOT" => [
		"text" => [
			"en" => '"Take That" by RIOT',
			"pt" => '"Take That" por RIOT'
		],
		"link" => "https://www.youtube.com/watch?v=NpNYYkXxT-A"
	],
];

foreach (array_keys($songs) as $key) {
	$song = $songs[$key];

	if (is_array($song["text"]) == True) {
		$song["text"] = $Language -> Item($song["text"]);
	}

	$website["Variable_Inserter"]["The_Life_of_Littletato"]["songs"][$key] = HTML::Element("a", $song["text"], 'href="'.$song["link"].'" target="_blank"');
}

# Define "The Life of Littletato" chapter links and buttons
$numbers = [
	26
];

Create_Chapter_Link_And_Button($numbers, "The Life of Littletato");

# Define SpaceLiving key of Variable Inserter array
$website["Variable_Inserter"]["SpaceLiving"] = [
	"images" => []
];

# Define the "SpaceLiving" chapter links
$numbers = [
	9,
	10
];

Create_Chapter_Link_And_Button($numbers, "SpaceLiving");

# Define the "SpaceLiving" images
$links = [
	"Lisa" => $website["Dictionary"]["SpaceLiving"]["Folders"]["Website"]["Website images"]["Images"]["root"]."Lisa.jpg".'"', $website["Data"]["Style"]["img"]["secondary_theme"]["light"],

	"LonelyShip_Story_Cover" => $website["Dictionary"]["SpaceLiving"]["Folders"]["Website"]["Website images"]["Images"]["root"]."LonelyShip Story Cover.png",

	"LonelyShip_Story_Cover_Front_Signboards" => $website["Dictionary"]["SpaceLiving"]["Folders"]["Website"]["Website images"]["Images"]["root"]."LonelyShip Story Cover Front Signboards.png",

	"Audacity_Blue_Bass_Waveform" => $website["Dictionary"]["SpaceLiving"]["Folders"]["Website"]["Website images"]["Images"]["root"]."Audacity Blue Bass Waveform.png",

	"Original_Sharks_-_FROG_PARTY_Song_Cover" => $website["Dictionary"]["SpaceLiving"]["Folders"]["Website"]["Website images"]["Images"]["root"]."Orignal Sharks - FROG PARTY Song Cover.jpg",

	"Funky_Black_Cat_Original_Profile_Picture" => $website["Dictionary"]["SpaceLiving"]["Folders"]["Website"]["Website images"]["Images"]["root"]."Funky Black Cat Original Profile Picture.png",

	"Edited_Sharks_-_FROG_PARTY_Song_Cover" => $website["Dictionary"]["SpaceLiving"]["Folders"]["Website"]["Website images"]["Images"]["root"]."Edited Sharks - FROG PARTY Song Cover.jpg"
];

foreach (array_keys($links) as $key) {
	$website["Variable_Inserter"]["SpaceLiving"]["images"][$key] = "<br />".HTML::Element("img", "", 'src="'.$links[$key].'" style="max-width: 50%;"', $website["Data"]["Style"]["img"]["secondary_theme"]["light"]." ".$website["Data"]["Style"]["box_shadow"]["black"])."<br />";
}

# Define the "SpaceLiving" Discord server join link
$texts = [
	"en" => "Discord server of the SpaceLiving Network",
	"pt" => "Servidor do Discord da Rede SpaceLiving"
];

$text = $Language -> Item($texts);

$website["Variable_Inserter"]["SpaceLiving"]["Discord_Server"] = HTML::Element("a", '"'.$text.'"', 'href="https://discord.com/invite/NYN4CCu" target="_blank"');

# Define "The Secret of the Crystals" key of Variable Inserter array
$website["Variable_Inserter"]["The_Secret_of_the_Crystals"] = [
	"images" => [],
	"songs" => []
];

# Define "The Secret of the Crystals" images
$links = [
	"Lapis_Lazuli_Steven_Universe" => $website["Data"]["Folders"]["Website"]["Website images"]["Images"]["root"]."Lapis Lazuli.png",

	"Humanoid_Ted" => $website["Data"]["Folders"]["Website"]["Website images"]["Images"]["root"]."Humanoid Kódek.jpg",
];

foreach (array_keys($links) as $key) {
	$website["Variable_Inserter"]["The_Secret_of_the_Crystals"]["images"][$key] = "<br />".HTML::Element("img", "", 'src="'.$links[$key].'" style="max-width: 50%;"', $website["Data"]["Style"]["img"]["secondary_theme"]["light"]." ".$website["Data"]["Style"]["box_shadow"]["black"])."<br />";
}

# Define "The Secret of the Crystals" songs
$songs = [
	"Sharks_-_Coral" => [
		"link" => "https://soundcloud.com/rushdownrecs/sharks-coral/comments/686621514"
	],
	"Sharks_-_Maelstrom_EP" => [
		"link" => "https://www.youtube.com/watch?v=L9NU4luuCb0"
	]
];

foreach (array_keys($songs) as $key) {
	$song = $songs[$key];

	$song["text"] = str_replace("_", " ", $key);

	if (is_array($song["text"]) == True) {
		$song["text"] = $Language -> Item($song["text"]);
	}

	$website["Variable_Inserter"]["The_Secret_of_the_Crystals"]["songs"][$key] = HTML::Element("a", $song["text"], 'href="'.$song["link"].'" target="_blank"');
}

# Define "The Story of the Bulkan Siblings" key of Variable Inserter array
$website["Variable_Inserter"]["The_Story_of_the_Bulkan_Siblings"] = [
	"songs" => [],
	"links" => []
];

# Define "The Story of the Bulkan Siblings" songs
$songs = [
	"Disneys_Zootopia_-_11_-_Work_Slowly_and_Carry_a_Big_Shtick" => [
		"id" => "9o3cEYOxAjs"
	]
];

foreach (array_keys($songs) as $key) {
	$song = $songs[$key];

	$link = "https://www.youtube.com/embed/".$song["id"];
	$link .= "?autoplay=0&fs=1&iv_load_policy=1&showinfo=1&rel=0&cc_load_policy=1&start=0&end=0&";

	$website["Variable_Inserter"]["The_Story_of_the_Bulkan_Siblings"]["songs"][$key] = '<div class="video-container" style="margin-top: 1%; margin-bottom: -6%;"><iframe type="text/html" width="560" height="315" frameborder="0" class="border_radius_5_cent '.$website["Style"]["border_4px"]["secondary_theme"]["light"].'" src="'.$link.'" title="YouTube video player"></iframe></div><br /><br /><br />';
}

# Define "The Story of the Bulkan Siblings" links
$links = [
	"Wikipedia_Tulpa" => [
		"text" => [
			"en" => "Read more on Wikipedia (Click here)",
			"pt" => "Leia mais na Wikipedia (Clique aqui)"
		],
		"link" => [
			"en" => "https://en.wikipedia.org/wiki/Tulpa",
			"pt" => "https://pt.wikipedia.org/wiki/Tulpa"
		]
	]
];

foreach (array_keys($links) as $key) {
	$link = $links[$key];

	if (is_array($link["text"]) == True) {
		$link["text"] = $Language -> Item($link["text"]);
	}

	else {
		$link["text"] = str_replace("_", " ", $key);
	}

	if (is_array($link["link"]) == True) {
		$link["link"] = $Language -> Item($link["link"]);
	}

	$website["Variable_Inserter"]["The_Story_of_the_Bulkan_Siblings"]["links"][$key] = HTML::Element("a", $link["text"], 'href="'.$link["link"].'" target="_blank"');
}

# Define "The Story of the Bulkan Siblings" references
$references = [
	"Chapter_1" => [
		"Link" => HTML::Element("a", "[1]", 'href="#Chapter_1_Reference_1"', $website["Style"]["text_highlight"]),
		"Anchor" => HTML::Element("a", "", 'name="Chapter_1_Reference_1"'),
	],
	"Chapter_3" => [
		"Link" => HTML::Element("a", "[1]", 'href="#Chapter_3_Reference_1"', $website["Style"]["text_highlight"]),
		"Anchor" => HTML::Element("a", "", 'name="Chapter_3_Reference_1"'),
	]
];

foreach (array_keys($references) as $key) {
	$website["Variable_Inserter"]["The_Story_of_the_Bulkan_Siblings"]["References"][$key] = $references[$key];
}

# Define general links
$link = [
	"en" => "https://en.wikipedia.org/wiki/My_Little_Pony:_Friendship_Is_Magic",
	"pt" => "https://pt.wikipedia.org/wiki/My_Little_Pony:_A_Amizade_%C3%89_M%C3%A1gica"
];

$link = $Language -> Item($link);

$website["Variable_Inserter"]["my_little_pony_fim_wikipedia_title"] = HTML::Element("a", '"'.$website["Language texts"]["my_little_pony_friendship_is_magic"].'"', 'href="'.$link.'" target="_blank"');

$website["Variable_Inserter"]["my_little_pony_fim_wikipedia_link"] = HTML::Element("a", '"'.$website["Language texts"]["my_little_pony_friendship_is_magic"].'" '.$website["Language texts"]["on_wikipedia"], 'href="'.$link.'" target="_blank"');

$variable_inserter = $website["Variable_Inserter"];

?>