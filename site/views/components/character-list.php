
<ul>

<?php
require_once "lib/db.php";
$db = connectToDB();

// get character data
$query = 'SELECT id, name FROM characters ORDER BY id DESC';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $characters = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch Things');
    die('There was an error getting things from the database');
}
echo'<h1>Character list</h1>';

echo'<p>all characters</p>';

echo '<p><a href="/new-character" role="button">Create Character </a></p>';
// Work through all characters
foreach ($characters as $character) {


    echo '<li
    hx-trigger="click"
    hx-get="/character/' . $character['id'] . '"
    hx-push-url="true"
    hx-target="#info"
>';
echo $character['name'];
echo '</li>';
}

?>
