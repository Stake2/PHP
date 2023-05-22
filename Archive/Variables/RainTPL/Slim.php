<?php 

require_once($raintpl_folder."autoload.php");

use \Slim\Slim;

$app = new \Slim\Slim();

$app -> config("debug", true);

?>