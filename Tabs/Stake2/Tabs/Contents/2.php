<?php 

$digital_identity = "Stake2";

echo $div_zoom_animation."\n";

$digital_identity_image = $website_image;

echo Make_Image($digital_identity_image, "", "30%");

echo "<hr class=\"".$first_border_color."\" style=\"border-width:1px;border-style:solid;\" />";

$text_file = $notepad_izaque_about_me_folder.$digital_identity.".txt";

$text = Stringfy_Array(Read_Lines($text_file), $add_br = True);

echo "<div style=\"text-align:left;\">"."\n";
echo $text;
echo $div_close."\n";

echo $div_close."\n";

?>