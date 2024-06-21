<?php

require_once 'lib/session.php';
require_once "lib/db.php";
 
consoleLog($_POST, 'Form Data');
 
// Get the data values from the form
$user = $_POST['username'];
$pass = $_POST['pass'];
 
// Hash the supplied password
$hash = password_hash($pass, PASSWORD_DEFAULT);
consoleLog($hash, 'Hashed Password');
 
// Connect
$db = connectToDB();
 
// Try to find a user account with the given username
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();
 
if (!$userData) {
    // Add the user account
    $query = 'INSERT INTO users(username, hash)
    VALUES (?, ?)';
 
    $stmt = $db->prepare($query);
    $stmt->execute([$user, $hash]);
 
    echo '<h2>Account Created!</h2>';
    // Login page link
    echo '<p><a href="/login" role="button">Log In</a></p>';
}
else {
    echo '<h2>Username taken!</h2>';
    echo '<p><a href="form-signup.php">Try again</a></p>';
}