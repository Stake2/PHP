<?php 

$friends_im_grateful_for_file = $izaque_people_i_know_folder."Friends I'm Grateful for - Amigos pelos quais sou grato.txt";
Create_File($friends_im_grateful_for_file);

$text_to_friends_file = $izaque_people_i_know_folder.Language_Item_Definer("Text to friends", "Texto para amigos").".txt";
Create_File($text_to_friends_file);

Show(Create_Element("b", "", Language_Item_Definer("Friends I am grateful for", "Amigos pelos quais sou grato").": "), $add_br = True);
Show_Text($text_to_friends_file);

echo "<br />"."\n";

Show(Create_Element("div", "text_pink", Read_String($friends_im_grateful_for_file)), $add_br = True);

?>