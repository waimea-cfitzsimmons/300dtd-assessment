<!-- Generate a list of things, e.g. from a database -->

<ul>

<?php
require_once "lib/db.php";
$db = connectToDB();

// Get the picture associated info, but NOT the image data
$query = 'SELECT id, name FROM things ORDER BY id DESC';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $things = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch Things');
    die('There was an error getting things from the database');
}

// Work through all pictures
foreach ($things as $thing) {


    echo '<li
    hx-trigger="click"
    hx-get="/thing/' . $thing['id'] . '"
    hx-target="#thing-info"
>';
echo $thing['name'];
echo '</li>';
}
?>
