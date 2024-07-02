<?php
require_once "lib/db.php";
require_once "lib/session.php";
$db = connectToDB();
// Get the image type and binary data
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


// $query = 'SELECT characters.id AS charID, 
//                  characters.name,
//                  characters.creator,
//                  users.id AS userID
// FROM characters 
// JOIN users 
// ON characters.creator = users.id 
// WHERE characters.creator=?';

// try {
//     $stmt = $db->prepare($query);
//     $stmt->execute([$id]);
//     $characters = $stmt->fetch();
// }

// catch (PDOException $e) {
//     consoleError($e->getMessage(), 'DB Fetch things error');
//     die('There was an error getting things from data base');
// }

echo '<h1>' . $user['username'] . '</h1>';
echo '<h2> List of Characters: </h2>';
// foreach ($characters as $character) {
//     echo'<h3>character</h3>';
// }

?>
<div
    id="character-list"
    hx-get="/character-list/.$users['id']."
    hx-trigger="load"
></div>