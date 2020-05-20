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
    //echo '<h1>Welcome to my dating website</h1>';
    $view = new Template();
    echo $view -> render("views/home.html");
});

// Run fat free
$f3->run();