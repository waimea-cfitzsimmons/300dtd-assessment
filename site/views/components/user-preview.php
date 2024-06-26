<?php
require_once "lib/db.php";
require_once 'lib/session.php';
$db = connectToDB();

// Get the image type and binary data
$query = 'SELECT id
                 username,
FROM users
WHERE id=?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $character = $stmt->fetch();

}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch things error');
    die('There was an error getting things from data base');
}