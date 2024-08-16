<?php
require_once "lib/db.php";
consoleLog($_POST, 'POST');

// Get other data from form
$campaign_id = $_POST['campaign_id'];
$character_id = $_POST['character_id'];
// create new entry in database and link character to campaign
$db = connectToDB();

$query = 'INSERT INTO involved (campaign_id, character_id) VALUES (?, ?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$campaign_id, $character_id]);
}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB assign character');
    die('Character already in campaign!');
}
header('HX-Redirect: ' . SITE_BASE . '/campaigns');