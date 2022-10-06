<?php 

$summary_file = $year_folders[$local_current_year].$website_info["full_language"]."/".$summary_text.".txt";

echo '<div style="text-align: left">';
Show(Read_Lines($summary_file), $add_br = True);
echo $div_close;

?>