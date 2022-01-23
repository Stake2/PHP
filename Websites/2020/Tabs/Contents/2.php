<?php 

require $website_php_folders["Watch History"]."Media Variables.php";
require $website_php_folders["Watch History"]."Watch Texts.php";

$local_current_year = (int)$website_info["english_title"];
$module_current_year = (int)$website_info["english_title"];
$run_as_module = True;
$watched_media_numbers_current_year = ${"watched_media_numbers_".$local_current_year};

$website_watch_history_new_watched_style_setting = True;

$mobile_version = False;

echo "<div style=\"text-align:left;\">"."\n";

require $website_php_folders["Watch History"]."Current Year Watched Media Generator.php";

echo $div_close."\n";

?>