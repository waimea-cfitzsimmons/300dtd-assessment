<?php

require_once 'lib/db.php';

$id=$_GET['id'] ?? null;
if($id == null) die('Missing or invalid ID');

$db = connectToDB();

$query = 'SELECT imageType, imageData FROM characters WHERE id=?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $image = $stmt->fetch();

    // Failed to get an image back?
    if (!$image) throw new Exception();
}
catch (Exception $e) {
    // Failed, so 404
    http_response_code(404);
    die();
}

// Got here, so all went well. Pass back the image data as a response
header('Content-type: ' . $image['imageType']);
echo $image['imageData'];

?>