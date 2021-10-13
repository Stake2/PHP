<?php 

$text_file = $notepad_izaque_about_me_folder."Funkysnipa Cat.txt";

$text = Stringfy_Array(Read_Lines($text_file), $add_br = True);

echo "<div style=\"text-align:left;\">"."\n";
echo $text;
echo $div_close."\n";

?>