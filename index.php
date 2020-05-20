<?php
/*
* Michael Gulchuk
* 5/20/2020
* This file routes the page to home.html
*/
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Require the autoload file
require_once('vendor/autoload.php');
require_once("model/data-layer.php");


// Instantiate the F3 Base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function()
{
    $view = new Template();
    echo $view -> render("views/home.html");
});

$f3->route('GET|POST /survey', function($f3)
{
    $survey = getSurvey();

    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Store the data in the session array
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['survey'] = $_POST['survey'];

        //Redirect to summary page
        $f3->reroute('summary');
        session_destroy();
    }

    $f3->set('survey', $survey);

    $view = new Template();
    echo $view -> render("views/survey.html");
});

$f3->route('GET /summary', function()
{
    $view = new Template();
    echo $view -> render("views/summary.html");
});


// Run fat free
$f3->run();