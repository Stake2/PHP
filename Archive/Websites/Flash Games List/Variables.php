<?php 

# Website image link and image size
$website_information["image_format"] = "png";
$website_information["image_link"] = $website_media_images_website_icons."Watch History.".$website_information["image_format"];

$website_image_size_computer = 31;
$website_image_size_mobile = 52;

$website_descriptions_array = array(
Null,
"A list of Flash games for me to play.",
"Uma lista de jogos Flash para mim jogar.",
);

$website_html_descriptions_array = array(
Null,
$website_descriptions_array[1],
$website_descriptions_array[2],
);

# Website name, title, URL and description setter, by language
$website_information["language_title_with_icon"] = $website_information["language_title"].": ".$icons_array["gamepad"];

$website_information["meta_description"] = $website_descriptions_array[$language_number];
$website_information["header_description"] = $website_html_descriptions_array[$language_number];

?>