<?php
 
//-------------------------------------------------------------
// Libraries
require_once 'lib/session.php';
require_once 'lib/debug.php';
require_once 'lib/router.php';

$loggedIn = $_SESSION['user']['loggedIn'] ?? false;
$userName = $_SESSION['user']['username'] ?? 'Guest';
$userId = $_SESSION['user']['id'] ?? false;

//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'Cam&Co Character Index';
const SITE_OWNER = 'Cam&Co';


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
$router->route(GET, PAGE, '/characters', 'pages/characters.php');
$router->route(GET, PAGE, '/log-out', 'actions/log-out.php');
$router->route(GET, PAGE, '/new-character', 'pages/new-character.php');
$router->route(POST, HTMX, '/process-login', 'actions/process-login.php');
$router->route(POST, HTMX, '/add-character', 'actions/add-character.php');
$router->route(POST, HTMX, '/sign-up', 'actions/add-user.php');
$router->route(GET, HTMX, '/character-list', 'components/character-list.php');
$router->route(GET, HTMX, '/character/$id', 'components/character-preview.php');
$router->route(DELETE, HTMX, '/character/$id', 'actions/delete-character.php');
//-------------------------------------------------------------
// Generate the required view
$router->view();


?>
