<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/session.php';
require_once 'lib/debug.php';
require_once 'lib/router.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'PHP Routing with HTMX';
const SITE_OWNER = 'Waimea College';


//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/',      'pages/welcome.php');
$router->route(GET, PAGE, '/home',      'pages/home.php');
$router->route(GET, PAGE, '/login',      'pages/login.php');
$router->route(GET, PAGE, '/signup',      'pages/signup.php');
$router->route(GET, PAGE, '/about', 'pages/about.php');
$router->route(GET, PAGE, '/awsome', 'pages/awsome.php');
$router->route(GET, PAGE, '/thing', 'pages/thing.php');
$router->route(POST, HTMX, '/add-thing', 'actions/add-thing.php');
$router->route(POST, HTMX, '/sign-up', 'actions/add-user.php');
$router->route(GET, HTMX, '/thing-list', 'components/thing-list.php');
$router->route(GET, HTMX, '/thing/$id', 'components/thing-preview.php');
$router->route(DELETE, HTMX, '/thing/$id', 'actions/delete-thing.php');
//-------------------------------------------------------------
// Generate the required view
$router->view();


?>
