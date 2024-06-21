<!-- Generate a list of things, e.g. from a database -->

<ul>

<?php
require_once "lib/db.php";
$db = connectToDB();

// Get the picture associated info, but NOT the image data
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

// Work through all pictures
foreach ($characters as $character) {


    echo '<li
    hx-trigger="click"
    hx-get="/character/' . $character['id'] . '"
    hx-target="#character-info"
>';
echo $character['name'];
echo '</li>';
}
?>
