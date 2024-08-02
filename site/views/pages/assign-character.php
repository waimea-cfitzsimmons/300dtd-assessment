<?php
require_once "lib/db.php";
$db = connectToDB();
$campaign_id=$_GET['camID'];
$sql = 'SELECT id
FROM campaigns
WHERE id = ?';


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
echo'<h1>Please select characters to add to the campaign</h1>';

echo '<form
hx-post="/add-character_camp"
hx-trigger="submit"
enctype="multipart/form-data">';
echo '<input name="campaign_id" type="hidden" value=""'.$campaign_id.'"">';
echo '<p>Campaign ID is'.$campaign_id.'</p>';
foreach ($characters as $character) {

echo $character['name'];


echo '<input type="checkbox" name="character_id" value=""'.$character['id'].'"">';
echo'</form>';

}

