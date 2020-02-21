<?php
//turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require autoload file
require_once('vendor/autoload.php');
require_once('model/validation-functions.php');
require_once('model/database.php');

//session start
session_start();

//create instance of the base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

$f3->set('colors', array('pink', 'green', 'blue'));
$controller = new PetController($f3);

//define a default route
$f3->route('GET /', function () {
    $GLOBALS['controller']->home();
});

$f3->route('GET|POST /order', function ($f3) {
    session_unset();

    $GLOBALS['controller']->order1($f3);
});

$f3->route('GET|POST /order2',
    function ($f3) {
        $GLOBALS['controller']->order2($f3);
    });

$f3->route('GET /results', function () {
    $GLOBALS['controller']->results();
});

$f3->route('GET|POST /view', function()
{
	$GLOBALS['controller']->view();
});

//run fat free
$f3->run();