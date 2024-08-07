<?php
 
//-------------------------------------------------------------
// Libraries
require_once 'lib/session.php';
require_once 'lib/debug.php';
require_once 'lib/router.php';

$loggedIn = $_SESSION['user']['loggedIn'] ?? false;
$userName = $_SESSION['user']['username'] ?? 'Guest';
$userId = $_SESSION['user']['id'] ?? false;
$campaignID = '1';

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
$router->route(GET, HTMX, '/user/$id', 'components/user-preview.php');
$router->route(GET, PAGE, '/about', 'pages/about.php');
$router->route(GET, PAGE, '/campaigns', 'pages/campaigns.php');
$router->route(GET, PAGE, '/characters', 'pages/characters.php');
$router->route(GET, PAGE, '/users', 'pages/users.php');
$router->route(GET, PAGE, '/log-out', 'actions/log-out.php');
$router->route(GET, PAGE, '/new-character', 'pages/new-character.php');
$router->route(GET, PAGE, '/assign-character/$id', 'pages/assign-character.php');
$router->route(GET, PAGE, '/new-campaign', 'pages/new-campaign.php');
$router->route(POST, HTMX, '/assign-character/$id', 'actions/assign-character.php');
$router->route(POST, HTMX, '/process-login', 'actions/process-login.php');
$router->route(POST, HTMX, '/add-character', 'actions/add-character.php');
$router->route(POST, HTMX, '/add-campaign', 'actions/add-campaign.php');
$router->route(POST, HTMX, '/sign-up', 'actions/add-user.php');
$router->route(GET, HTMX, '/character-list', 'components/character-list.php');
$router->route(GET, HTMX, '/campaign-list', 'components/campaign-list.php');
$router->route(GET, HTMX, '/campaign/$id', 'components/campaign-preview.php');
$router->route(GET, HTMX, '/character/$id', 'components/character-profile.php');
$router->route(DELETE, HTMX, '/character/$id', 'actions/delete-character.php');
$router->route(DELETE, HTMX, '/campaign/$id', 'actions/delete-campaign.php');
//-------------------------------------------------------------
// Generate the required view
$router->view();


?>
