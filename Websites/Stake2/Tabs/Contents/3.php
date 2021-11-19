<?php 

$digital_identity = "Funkysnipa Cat";

echo $div_zoom_animation."\n";

echo "<p></p>"."\n";
echo Create_Element("b", "", Language_Item_Definer("Profile image evolution", "Evolução das imagens de perfil").": ")."<br />"."\n";
echo htmlspecialchars("<<< ".Language_Item_Definer("Oldest - Newest", "Mais antiga - Mais nova")." >>>")."<br />"."\n";
echo "<p></p>"."\n";

$image_number = 5;
$i = 1;
while ($i <= $image_number) {
	$image = Make_Image($website_images_folder.$digital_identity."/".$i.".png", "text-align: left;", "20%");

	echo $image;

	$i++;
}

echo "<hr class=\"".$first_border_color."\" style=\"border-width:1px;border-style:solid;\" />";

$text_file = $notepad_izaque_about_me_folder.$digital_identity.".txt";

$text = Stringfy_Array(Read_Lines($text_file), $add_br = True);

echo "<div style=\"text-align:left;\">"."\n";
echo $text;
echo $div_close."\n";

echo "<hr class=\"".$first_border_color."\" style=\"border-width:1px;border-style:solid;\" />";

echo "<p></p>"."\n";
echo Create_Element("b", "", Language_Item_Definer("Festive pictures", "Fotos festivas").": ")."<br />"."\n";
echo "<p></p>"."\n";

$image_number = 7;
while ($i <= $image_number) {
	$image = Make_Image($website_images_folder.$digital_identity."/".$i.".png", "text-align: left;", "20%");

	echo $image;

	$i++;
}

echo $div_close."\n";

?>