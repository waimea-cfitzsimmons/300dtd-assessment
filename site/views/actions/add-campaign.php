<?php
require_once "lib/db.php";
consoleLog($_POST, 'POST');

// Get other data from form
$title = $_POST['title'];
$desc = $_POST['desc'];
$plyrid = $_POST['creator'];
// Insert the image into the database
$db = connectToDB();

$query = 'INSERT INTO campaigns (`title`, `description`, `dm`) VALUES (?, ?, ?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$title, $desc, $plyrid]);
}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Upload Picture');
    die('There was an error adding picture to the database');
}
header('HX-Redirect: ' . SITE_BASE . '/campaigns');