<?php 

$digital_identity = "Funkysnipa Cat";

echo Make_Image($website_media_images_website_images."Stake2/".$digital_identity.".png", "border-radius: 70px;", "30%");

$text_file = $notepad_izaque_about_me_folder.$digital_identity.".txt";

$text = Stringfy_Array(Read_Lines($text_file), $add_br = True);

echo "<div style=\"text-align:left;\">"."\n";
echo $text;
echo $div_close."\n";

?>