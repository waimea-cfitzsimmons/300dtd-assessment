<?php
require_once "lib/db.php";
require_once 'lib/session.php';
$db = connectToDB();
$userId = $_SESSION['user']['id'] ?? false;

// Get campaign info and dm stuff
$query = 'SELECT campaigns.id AS camID, 
                 campaigns.title, 
                 campaigns.description, 
                 users.username,
                 users.id AS userID
FROM campaigns 
JOIN users 
ON campaigns.dm = users.id 
WHERE campaigns.id=?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $campaign = $stmt->fetch();

}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch things error');
    die('There was an error getting things from data base');
}

echo '<h1>' . $campaign['title'] . '</h1>';

echo '<p id="userLink" hx-trigger="click"
hx-get="/user/' . $campaign['userID'] . '"
hx-push-url="true"
hx-target="#list">Dungeon Master: ' . $campaign['username'] . '</p>';

echo '<p>Description: ' . $campaign['description'] . '</p>';

//Get characters in the campaign

$query = 'SELECT involved.campaign_id AS camID, 
                 involved.character_id AS charID,
                 characters.name,
                 characters.id,
                 characters.description
FROM involved 
JOIN characters 
ON involved.character_id = characters.id 
WHERE involved.campaign_id=?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $characters = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch things error');
    die('There was an error getting things from data base');
}

echo "<h3> List of Characters in ".$campaign['title'].":</h3>";
foreach ($characters as $character) {
    echo '<h4 id="userLink"
    hx-trigger="click"
    hx-get="/character/' . $character['charID'] . '"
    hx-push-url="true"
    hx-target="#extra"
>';
echo $character['name'];
echo '</h4>';
echo '<p>'.$character['description'].'</p>';
}

$campaignID = $campaign['camID'];


if($campaign['userID']== $userId) {

    echo '<p><a href="/assign-character/'.$campaign['camID'].'" role="button">Add Character</a></p>';

    echo '<button
            hx-delete="/campaign/'.$campaign['camID'].'"
            hx-target="#info"
            >
            Delete Campaign
            </button>';

}