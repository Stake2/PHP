<?php 

echo '<'.$m.' class="'.$textstyle.'" style="text-align:left;"><b>'."\n";

$i = 0;
while ($i <= $clfile) {
	echo '<div class="'.$zoomanim.'">'.$cltxt[$i].'<br /><br />'.$divc."\n";
    $i++;
}

echo '</b>'.'</'.$m.'>'."\n";
echo $divc;

?>