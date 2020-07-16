<?php 

$i = 0;
while ($i <= $readersfilenumb) {
	$i2 = $i + 1;
	
	echo '<'.$n.' class="'.$cssbtn4.' '.$zoomanim.' '.$computervar.'">'.$whitespan.$i2.$spanc.' - '.$readers[$i].'</'.$n.'>'."\n";

    $i++;
}

echo "\n";

$i = 0;
while ($i <= $readersfilenumb) {
	$i2 = $i + 1;
	
	echo '<'.$m.' class="'.$cssbtn4.' '.$zoomanim.' '.$mobilevar.'">'.$whitespan.$i2.$spanc.' - '.$readers[$i]."</".$m.'>'."\n";

    $i++;
}

?>