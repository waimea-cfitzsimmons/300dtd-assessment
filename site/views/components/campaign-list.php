<!-- Generate a list of things, e.g. from a database -->

<ul>

<?php
require_once "lib/db.php";
$db = connectToDB();

// Get the picture associated info, but NOT the image data
$query = 'SELECT id, title FROM campaigns ORDER BY id DESC';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $campaigns = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch Things');
    die('There was an error getting things from the database');
}

// Work through all pictures
foreach ($campaigns as $campaign) {


    echo '<li
    hx-trigger="click"
    hx-get="/campaign/' . $campaign['id'] . '"
    hx-push-url="true"
    hx-target="#info"
>';
echo $campaign['title'];
echo '</li>';
}
?>
