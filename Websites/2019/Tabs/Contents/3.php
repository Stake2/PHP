<?php 

echo $div_zoom_animation."\n";
echo '<div style="text-align:left;">'."\n";

Show(Create_Element("b", "", Language_Item_Definer("Known People In", "Pessoas Conhecidas Em")." ".$website_title_backup.": ").Line_Number($people_known_list_text_file), $add_br = True);

echo "\n"."<br />";
echo "-----"."\n";
echo "\n"."<br />";
echo "\n"."<br />";

Show_Text($people_known_list_text_file);

echo $div_close."\n";
echo $div_close."\n";

?>