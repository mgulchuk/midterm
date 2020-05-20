<?php
/*
* Michael Gulchuk
* 5/20/2020
* This file routes the page to home.html
*/
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Require the autoload file
require_once('vendor/autoload.php');


// Instantiate the F3 Base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function()
{
    $view = new Template();
    echo $view -> render("views/home.html");
});

$f3->route('GET|POST /survey', function()
{
    $view = new Template();
    echo $view -> render("views/survey.html");
});

// Run fat free
$f3->run();