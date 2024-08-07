<?php
require_once "lib/db.php";
require_once 'lib/session.php';
$db = connectToDB();
$userId = $_SESSION['user']['id'] ?? false;

// Get the character info and creator id
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

// echo out all the character stats

echo '<h2>Name: ' . $character['name'] . '</h2>';

// $imageURL = 'components/image/' . $character['charID'].'';

// echo '<img src="components/image/' . $character['charID'].'">';

echo   '<img src="/image.php?id=' . $character['charID'] . '">';

echo '<p>Description: ' . $character['description'] . '</p>';

echo '<table>';

echo '<tr>';

echo '<th>Stat:</th>';

echo '<th>Points:</th>';

echo '</tr>';

echo '<tr>';

echo '<td>Max Health</td>';

echo '<td>' . $character['health'] . '</td>';

echo '</tr>';

echo '<tr>';

echo '<td>Strength</td>';

echo '<td>' . $character['strength'] . '</td>';

echo '</tr>';

echo '<tr>';

echo '<td>Dexterity</td>';

echo '<td>' . $character['dexterity'] . '</td>';

echo '</tr>';

echo '<tr>';

echo '<td>Charisma</td>';

echo '<td>' . $character['charisma'] . '</td>';

echo '</tr>';

echo '<tr>';

echo '<td>Intelligence</td>';

echo '<td>' . $character['intelligence'] . '</td>';

echo '</tr>';

echo '<tr>';

echo '<td>Wisdom</td>';

echo '<td>' . $character['wisdom'] . '</td>';

echo '</tr>';

echo '<tr>';

echo '<td>Constitution</td>';

echo '<td>' . $character['constitution'] . '</td>';

echo '</tr>';

echo '<p id="userLink"
hx-trigger="click"
hx-get="/user/' . $character['userID'] . '"
hx-push-url="true"
hx-target="#list">Creator: ' . $character['username'] . '</p>';

// if the character is the users character then add delete button

if($character['userID']== $userId) {

    echo '<button
            hx-delete="/character/'.$character['charID'].'"
            hx-target="#info"
            >
            Delete Character
            </button>';

}