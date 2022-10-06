<?php 

$this_year_i_file = $year_folders[$website_info["english_title"]].$website_info["full_language"]."/".$this_year_i_language_text.".txt";

$summary = Read_Lines($this_year_i_file);

echo '<div style="text-align: left">';

if ($summary != []) {
	Show($summary, $add_br = True);
}

else {
	Show(Language_Item_Definer('"This Year I" text not yet created', 'O texto "Este Ano Eu" ainda não foi criado').".");
}

echo $div_close;

?>