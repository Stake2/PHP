<?php 

$digital_identity = "Stake2";

echo $div_zoom_animation."\n";

echo Make_Image($website_images_folder.$digital_identity."/".$digital_identity.".png", "", "30%");

echo "<hr class=\"".$first_border_color."\" style=\"border-width:1px;border-style:solid;\" />";

$text_file = $notepad_izaque_about_me_folder.$digital_identity.".txt";

$text = Stringfy_Array(Read_Lines($text_file), $add_br = True);

echo "<div style=\"text-align:left;\">"."\n";
echo $text;
echo $div_close."\n";

echo $div_close."\n";

?>