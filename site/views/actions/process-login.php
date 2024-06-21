<?php

require_once 'lib/session.php';
require_once "lib/db.php";

consoleLog($_POST, 'Form Data');

$user = $_POST['user'];
$pass = $_POST['pass'];

$db = connectToDB();
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

consoleLog($userData);

//does the user exist
if ($userData) {
    // has account so checks password
        if (password_verify($pass, $userData['hash'])) {           
        $_SESSION['user']['loggedIn'] = true;
        //return to homepage
        header('HX-Redirect: ' . SITE_BASE . '/home');
        }
        else {
            echo '<h2>Wrong password</h2>';
        }
}
else {
    echo '<h2>User account does not exit</h2>';
}

echo '<p><a href="index.php>Home</a>';