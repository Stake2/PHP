<?php 

$this_year_i_file = $year_folders[$local_current_year].$website_info["full_language"]."/".$this_year_i_language_text.".txt";

echo '<div style="text-align: left">';
Show(Read_Lines($this_year_i_file), $add_br = True);
echo $div_close;

?>