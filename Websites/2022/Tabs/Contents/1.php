<?php 

$summary_file = $year_folders[$website_info["english_title"]].$website_info["full_language"]."/".$summary_text.".txt";

$summary = Read_Lines($summary_file);

echo '<div style="text-align: left">';

if ($summary != []) {
	Show($summary, $add_br = True);
}

else {
	Show(Language_Item_Definer("Year summary not yet created", "O resumo de Ano ainda não foi criado").".");
}

echo $div_close;

?>