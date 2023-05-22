<?php 

$text_file = $notepad_izaque_about_me_folder.Language_Item_Definer("Little Biography", "Pequena Biografia").".txt";

echo $div_zoom_animation."\n";

$text = Stringfy_Array(Read_Lines($text_file), $add_br = True);

echo "<div style=\"text-align:left;\">"."\n";
echo $text;
echo $div_close."\n";

echo $div_close."\n";

?>