<?php 

echo '<'.$m.' class="'.$first_text_color.'" style="text-align:left;">'."\n";

echo $div_zoom_animation."\n";

# Current Year Watched Media Generator file includer
$mobile_version = False;
echo $computer_div;
require $current_year_watched_media_generator;
echo $div_close;

# Current Year Watched Media Generator file includer
$mobile_version = True;
echo $mobile_div;
require $current_year_watched_media_generator;
echo $div_close;

echo $div_close."\n";

echo '</'.$m.'>'."\n";

?>