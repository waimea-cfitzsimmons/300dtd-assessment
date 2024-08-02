<?php
require_once "lib/db.php";
require_once "lib/session.php";
$db = connectToDB();
// get user info
$query = 'SELECT id,
                 username
FROM users
WHERE id=?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $user = $stmt->fetch();

}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch things error');
    die('There was an error getting things from data base');
}

//Get users characters

$query = 'SELECT characters.id AS charID, 
                 characters.name,
                 characters.creator,
                 users.id AS userID
FROM characters 
JOIN users 
ON characters.creator = users.id 
WHERE characters.creator=?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $characters = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch things error');
    die('There was an error getting things from data base');
}

//Print out all of the user's campaigns
echo '<h1>' . $user['username'] . '</h1>';
echo "<h2> List of ".$user['username']."'s Characters: </h2>";
foreach ($characters as $character) {
    echo '<li
    hx-trigger="click"
    hx-get="/character/' . $character['charID'] . '"
    hx-target="#info"
>';

echo $character['name'];
echo '</li>';
}

//Get user campaign info

$query = 'SELECT campaigns.id AS camID, 
                 campaigns.title,
                 campaigns.dm,
                 users.id AS userID
FROM campaigns 
JOIN users 
ON campaigns.dm = users.id 
WHERE campaigns.dm=?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $campaigns = $stmt->fetchAll();
}

catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch things error');
    die('There was an error getting things from data base');
}

echo "<h2> List of ".$user['username']."'s Campaigns: </h2>";
foreach ($campaigns as $campaign) {
    echo '<li
    hx-trigger="click"
    hx-get="/campaign/' . $campaign['camID'] . '"
    hx-target="#info"
    hx-push-url="true"
>';
echo $campaign['title'];
echo '</li>';
}

?>
