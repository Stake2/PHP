<?php 

echo $div_zoom_animation."\n";

echo "<".$h2_element.">"."\n"."\n";

$not_website_array = array(
"Swid MC",
"Text Maker",
"Website Status",
);

$website_percentage_array = array(
"Stake2" => "10",
"Prints of Computer Blocks" => "10",
"Diário" => "90",
"My Little Pony" => "10",
"Watch History" => "100",
"Music" => "10",
"Games" => "10",
"Foobar Albums" => "10",
"Terraria Talk" => "10",
"Tasks" => "10",
"Things I Do" => "10",
"Mental Frameworks" => "10",
"Website Template" => "10",
"New World" => "10",
"Stories" => "10",
"Izaque Multiverse" => "10",
"Pequenata" => "100",
"SpaceLiving" => "100",
"Bulkan" => "100",
"Desert Island" => "100",
"Lonely Stories" => "10",
"Years" => "10",
"Years" => "10",
);

foreach ($website_titles_array as $website_title) {
	if (!in_array($website_title, $not_website_array)) {
		echo '<div class="w3-light-grey">'."\n".
'	<div id="'.str_replace(" ", "_", $website_title).'" class="w3-container w3-green w3-padding w3-center" style="white-space:nowrap;width:'.$website_percentage_array[$website_title].'%;">'.$website_title.$div_close."\n".
$div_close."\n"."\n"."<br />";
	}
}

echo "</".$h2_element.">"."\n";

echo $div_close;

?>