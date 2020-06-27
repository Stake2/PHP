<?php 

$i = 0;
while ($i <= $readersfilenumb) {
	$i2 = $i + 1;
	
	echo '<'.$n.' class="'.$cssbtn4.' '.$zoomanim.' '.$computervar.'">'.'<span class="w3-text-white">'.$i2.'</span>'." - ".$readers[$i]."</".$n.">"."\n";
    $i++;
}

echo "\n";

$i = 0;
while ($i <= $readersfilenumb) {
	$i2 = $i + 1;
	
	echo '<'.$m.' class="'.$cssbtn4.' '.$zoomanim.' '.$mobilevar.'">'.'<span class="w3-text-white">'.$i2.'</span>'." - ".$readers[$i]."</".$m.">"."\n";
    $i++;
}

?>