<?php
require_once "lib/db.php";
require_once 'lib/session.php';
$db = connectToDB();
$userId = $_SESSION['user']['id'] ?? false;
// Get the image type and binary data
$query = 'SELECT id, `name`, `description`, `health`, `strength`, `dexterity`, `charisma`, `intelligence`, `wisdom`, `constitution`, `creator`
FROM characters 
JOIN users 
ON feedback.author = users.id 
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

echo '<h2>Name: ' . $character['name'] . '</h2>';

echo '<p>Description: ' . $character['description'] . '</p>';

echo '<p>Health: ' . $character['health'] . '</p>';

echo '<p>Strength: ' . $character['strength'] . '</p>';

echo '<p>Dexterity: ' . $character['dexterity'] . '</p>';

echo '<p>Charisma: ' . $character['charisma'] . '</p>';

echo '<p>Intelligence: ' . $character['intelligence'] . '</p>';

echo '<p>Wisdom: ' . $character['wisdom'] . '</p>';

echo '<p>Constitution: ' . $character['constitution'] . '</p>';

echo '<p>Creator: ' . $character['creator'] . '</p>';

if($character['creator']== $userId) {

echo '<button
hx-delete="/character/<?= $id ?>"
hx-target="#character-info"
>
Delete User
</button>';

}