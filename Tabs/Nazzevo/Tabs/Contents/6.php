<?php 

echo '<'.$m.' class="'.$textstyle.'" style="text-align:left;"><b>'."\n";

$i = 0;
while ($i <= $clfile) {
	echo '<div class="'.$zoom_animation_class.'">'.$website_changelog[$i].'<br /><br />'.$div_close."\n";
    $i++;
}

echo '</b>'.'</'.$m.'>'."\n";
echo $div_close;

?>