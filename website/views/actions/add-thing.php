<?php
require_once "lib/db.php";
consoleLog($_POST, 'POST');

// Get other data from form
$name = $_POST['name'];
$desc = $_POST['desc'];
// Insert the image into the database
$db = connectToDB();

$query = 'INSERT INTO things (`name`, `desc`) VALUES (?, ?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $desc]);
}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Upload Picture');
    die('There was an error adding picture to the database');
}
header('HX-Redirect: ' . SITE_BASE . '/thing');