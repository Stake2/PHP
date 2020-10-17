<?php 

if ($choosenwebsite != $sitedesertisland) {
	$span_variable = $whitespan;
	$hover_variable = $text_hover_white_css_class;
}

if ($choosenwebsite == $sitedesertisland) {
	$span_variable = $blackspan;
	$hover_variable = '';
}

$i = 0;
while ($i <= $readersfilenumb) {
	$i2 = $i + 1;
	
	echo '<'.$n.' class="'.$hover_variable.' '.$zoomanim.' '.$computervar.'">'.$span_variable.$i2.$spanc.' - '.$readers[$i].'</'.$n.'>'."\n";

    $i++;
}

echo "\n";

$i = 0;
while ($i <= $readersfilenumb) {
	$i2 = $i + 1;
	
	echo '<'.$m.' class="'.$hover_variable.' '.$zoomanim.' '.$mobilevar.'">'.$span_variable.$i2.$spanc.' - '.$readers[$i]."</".$m.'>'."\n";

    $i++;
}

?>