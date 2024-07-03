<?php
require_once "lib/db.php";
require_once 'lib/session.php';
$db = connectToDB();
$userId = $_SESSION['user']['id'] ?? false;

// Get the image type and binary data
$query = 'SELECT characters.id AS charID, 
                 characters.`name`, 
                 characters.`description`, 
                 characters.`health`, 
                 characters.`strength`, 
                 characters.`dexterity`, 
                 characters.`charisma`, 
                 characters.`intelligence`, 
                 characters.`wisdom`, 
                 characters.`constitution`,
                 users.username,
                 users.id AS userID
FROM characters 
JOIN users 
ON characters.creator = users.id 
WHERE characters.id=?';

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

echo '<p>Max Health: ' . $character['health'] . '</p>';

echo '<p>Strength: ' . $character['strength'] . '</p>';

echo '<p>Dexterity: ' . $character['dexterity'] . '</p>';

echo '<p>Charisma: ' . $character['charisma'] . '</p>';

echo '<p>Intelligence: ' . $character['intelligence'] . '</p>';

echo '<p>Wisdom: ' . $character['wisdom'] . '</p>';

echo '<p>Constitution: ' . $character['constitution'] . '</p>';

echo '<p>Creator: ' . $character['username'] . '</p>';

echo '<li
hx-trigger="click"
hx-get="/user/' . $character['userID'] . '"
hx-target="#character-info"
>';
echo $character['username'];
echo '</li>';

// TODO use $character['userID'] to link to player page


if($character['userID']== $userId) {

    echo '<button
            hx-delete="/character/'.$character['charID'].'"
            hx-target="#character-info"
            >
            Delete Character
            </button>';

}