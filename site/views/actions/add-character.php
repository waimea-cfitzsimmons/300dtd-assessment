<?php
require_once "lib/db.php";
consoleLog($_POST, 'POST');

// Get other data from form
$name = $_POST['name'];
$desc = $_POST['desc'];
$hp = $_POST['health'];
$chr = $_POST['charisma'];
$str = $_POST['strength'];
$wis = $_POST['wisdom'];
$dex = $_POST['dexterity'];
$int = $_POST['intelligence'];
$con = $_POST['constitution'];
$plyrid = $_POST['creator'];
// Insert the image into the database
$db = connectToDB();

$query = 'INSERT INTO characters (`name`, `description`, `health`, `strength`, `dexterity`, `charisma`, `intelligence`, `wisdom`, `constitution`, `creator`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $desc, $hp, $chr, $str, $wis, $dex, $int, $con, $plyrid]);
}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Upload Picture');
    die('There was an error adding picture to the database');
}
header('HX-Redirect: ' . SITE_BASE . '/characters');