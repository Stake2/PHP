<?php 

# TPL

require_once(__DIR__."/TPL/TPL.php");

$config = [
    "tpl_dir"       => "Modules/Template",
    "cache_dir"     => "Modules/Cache",
	"auto_escape"   => False,
	"debug"         => True,
];

TPL::configure($config);

$tpl = new TPL();
$tpl -> configure($config);

?>