<?php
define('main_dir', '/var/www/html/app/');

require_once '../vendor/autoload.php';

$auto = new Autoloader();
$auto->register();
$auto->addNamespaces("App\\Services", "app/Services/");

$test = new App\Services\Email('asdasddf@gmail.com');
var_dump($test);




