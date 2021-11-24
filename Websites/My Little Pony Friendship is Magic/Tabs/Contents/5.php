<?php 

$pictures_array = array(
$website_images_logo_folder."Original.png",
$website_images_logo_folder."New Logo.png",
$website_images_logo_folder."New FIM Logo.png",
$mane_six_images_folder."Original Picture.jpg",
$mane_six_images_folder."Color Gradient.png",
$mane_six_images_folder."Double Color Gradient.png",
$mane_six_images_folder."Group Hug 1.png",
$mane_six_images_folder."Group Hug 2 (Plus Shining Armor).jpeg",
$mane_six_images_folder."Group Hug 3 (Plus Starlight).gif",
$mane_six_images_folder."Group Hug 4 (Plus Starlight).png",
$mane_six_images_folder."9th Anniversary.png",
$mane_six_images_folder."Fanart.png",
$mane_six_images_folder."Pinkie Pie, Fluttershy, and Twilight Dancing.gif",
$website_images_folder."Brony Fandom.png",
);

foreach ($pictures_array as $picture) {
	Show(Make_Linked_Image($picture, False, "55", "border-width:3px;border-style:solid;".$roundedborderstyle4, False), $add_br = True);
}

?>