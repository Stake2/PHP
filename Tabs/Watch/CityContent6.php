<?php 

echo '<h3 class="'.$first_text_color.'" style="text-align:left;"><b>'."\n";
echo '<div class="'.$zoom_animation_class.'">'."\n";

include $website_changelog_file;

echo $div_close."\n";
echo '</b>'.'</h3>'."\n";

?>