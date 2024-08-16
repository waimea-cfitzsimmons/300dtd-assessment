<?php
require_once "lib/db.php";
consoleLog($_POST, 'POST');

// Get other data from form
$title = $_POST['title'];
$desc = $_POST['desc'];
$plyrid = $_POST['creator'];
// Insert the campaign into the database
$db = connectToDB();

$query = 'INSERT INTO campaigns (`title`, `description`, `dm`) VALUES (?, ?, ?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$title, $desc, $plyrid]);
}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Add Campaign');
    die('There was an error adding campaign to the database');
}
header('HX-Redirect: ' . SITE_BASE . '/campaigns');