<?php 

$characters = array(
"Twilight Sparkle",
"Pinkie Pie",
"Fluttershy",
"Rainbow Dash",
"Applejack",
"Rarity",
"Spike",
Language_Item_Definer("Princess", "Princesa")." Celestia",
Language_Item_Definer("Princess", "Princesa")." Luna",
"Shining Armor",
Language_Item_Definer("Princess", "Princesa")." Cadance",
Language_Item_Definer("Princess", "Princesa")." Ember",
"Thorax",
Language_Item_Definer("Princess", "Princesa")." Skystar",
Language_Item_Definer("Discord", "Discórdia"),
"Sunset Shimmer",
"Starlight Glimmer",
"Trixie Lulamoon",
);

$character_colors = array(
"text_purple",
"text_pink",
"text_yellow",
"text_blue",
"text_orange",
"text_white",
"text_purple",
"text_white",
"text_dark_blue",
"text_blue",
"text_pink",
"text_cyan",
"text_green",
"text_pink",
"text_grey",
"text_orange",
"text_purple",
"text_blue",
);

$margin_number = "10";

$i = 0;
foreach ($characters as $character) {
	$character_image_file_name = $character;

	if (strpos($character, Language_Item_Definer("Princess", "Princesa")) == True) {
		$character_image_file_name = str_replace(Language_Item_Definer("Princess", "Princesa"), "Princess", $character_image_file_name);
	}

	if (strpos($character, Language_Item_Definer("Discord", "Discórdia")) == True) {
		$character_image_file_name = "Discord";
	}

	$character_image = $website_images_characters_folder.$character_image_file_name.".png";
	$character_color = $character_colors[$i];

	$character_fandom_link_name = str_replace(" ", "_", $character);

	if (strpos($character, "Lulamoon") == True) {
		$character_fandom_link_name = "Trixie";
	}

	$character_fandom_link = Make_Link($mlp_fim_fandom_link.$character_fandom_link_name, $character, "", $new_tab = True);

	echo "\n"."<div class=\"".$character_color."\" style=\"margin-left:".$margin_number."%;margin-right:".$margin_number."%;\">"."\n";
	echo '<div class="'.$character_color.'" style="border-width:3px;border-style:solid;'.$roundedborderstyle4.'">'."<p></p>"."\n";

	Show(Create_Element("b", $character_color, $character_fandom_link), $add_br = True);
	Show(Make_Image($character_image, "border-width:3px;border-style:solid;".$roundedborderstyle4, "50"));

	echo "<p></p>"."\n".$div_close."\n".$div_close."\n"."<br />"."\n";

	$i++;
}

?>