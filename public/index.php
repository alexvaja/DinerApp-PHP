<?php
//require __DIR__ . '/../vendor/autoload.php';
//require_once '../app/routes.php';
//
//use Tracy\Debugger;
//
//ini_set("display_errors", 0);
//
////Debugger::enable(Debugger::PRODUCTION);
//
//if(\App\Config::ENV === 'dev') {
//    error_reporting(E_ALL);
//    ini_set("display_errors", 1);
//
//    Debugger::enable(Debugger::DEVELOPMENT);
//}
//
////var_dump helper functions
////bd-> dump in the debugging bar
////function bd($data) {
////    bdump($data);
////}
//////dd-> dump on the page and die
////function dd($data) {
////    dump($data);
////    die();
////}
//
//
//$router = new Framework\Router($routes);
//$router->getResource($_SERVER['REQUEST_URI']);

require __DIR__ . '/../vendor/autoload.php';

require_once "../app/config.php";
require_once "../src/Router.php";
require_once "../app/routes.php";

use App\Config;

ini_set("error_log", __DIR__."/../logs/error.log");
error_reporting(E_ALL);
ini_set("display_errors", 0);

//    if(Config::ENV == "dev")
//    {
//        Tracy\Debugger::enable(Tracy\Debugger::DEVELOPMENT);
//        ini_set("display_errors", 1);
//    }
//
//    Tracy\Debugger::enable(Tracy\Debugger::PRODUCTION);

$router = new \Framework\Router($routes);
$router->getResourceFromUri();

ini_set("error_log", _DIR_."/../logs/error.log");
error_reporting(E_ALL);
ini_set("display_errors", 0);