<?php 

$social_networks_file = $notepad_izaque_about_me_folder."Social Networks - Redes Sociais".".txt";
$social_network_links_file = $notepad_izaque_about_me_folder."Social Network Links - Links de Redes Sociais".".txt";

$social_networks = array();
$social_network_links = array();

$social_network_links_text = Read_Lines($social_network_links_file);

$i = 0;
foreach (Read_Lines($social_networks_file) as $social_network) {
	array_push($social_networks, $social_network);
	$social_network_links[$social_network] = $social_network_links_text[$i];

	$i++;
}

$social_network_separators = array(
	"Wattpad" => Language_Item_Definer("Art", "Arte"),
	"Github" => Language_Item_Definer("Social Networks", "Redes Sociais"),
	"SoundCloud" => Language_Item_Definer("Music", "Música"),
	"Steam" => Language_Item_Definer("Games", "Jogos"),
	"MyAnimeList" => "Anime",
);

$margin_number = "10";

echo $div_zoom_animation."\n";

$i = 0;
foreach ($social_networks as $social_network) {
	$link = $social_network_links[$social_network];

	if ($social_network == "Whatsapp") {
		$link = substr($link, 0, -13);
	}

	$icon = "";

	if (array_key_exists($social_network, $icons_array) == True) {
		$icon = " ".$icons_array[$social_network];
	}

	if ($social_network == "Wattpad" or $social_network == "Github" or $social_network == "SoundCloud" or $social_network == "Steam" or $social_network == "MyAnimeList") {
		echo "\n"."<div class=\"".$first_border_color."\" style=\"margin-left:".$margin_number."%;margin-right:".$margin_number."%;\">"."\n";
		echo '<div class="'.$first_border_color.'" style="border-width:3px;border-style:solid;'.$roundedborderstyle4.'">'."<p></p>"."\n";
		echo Create_Element("b", "", $social_network_separators[$social_network].": ")."<br />"."<p></p>"."\n";
	}

	echo Make_Website_Button($link, $social_network, $first_button_style, $icon)." "."<br />"."\n";

	if ($social_network == "YouTube" or $social_network == "Twitter" or $social_network == "Spotify" or $social_network == "Osu!" or $social_network == "Kitsu Io") {
		echo "<p></p>"."\n";
		echo $div_close."\n";
		echo $div_close."\n";
		echo "<br />"."\n";
	}

	$i++;
}

echo $div_close."\n";

?>