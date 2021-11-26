<?php 

$first_file = "C:/Mega/PHP/Other/Flash Games List/index.php";

ob_start();

require_once $first_file;

$website = ob_get_clean();

$second_file = "C:/Users/Stake2/AppData/Local/Programs/y8-browser/resources/here/Index.html";

$file_open = fopen($second_file, 'w', "UTF-8");
fwrite($file_open, $website);
fclose($file_open);

echo $website;

?>