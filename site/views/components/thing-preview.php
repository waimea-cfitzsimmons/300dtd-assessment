<?php
require_once "lib/db.php";
$db = connectToDB();

// Get the image type and binary data
$query = 'SELECT id, `name`, `desc` FROM things WHERE id=?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $thing = $stmt->fetch();

}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB Fetch things error');
    die('There was an error getting things from data base');
}

echo '<h2>' . $thing['name'] . '</h2>';

echo '<p>' . $thing['desc'] . '</p>';

?>
<button
hx-delete="/thing/<?= $id ?>"
hx-target="#thing-info"
>
Delete User
</button>
