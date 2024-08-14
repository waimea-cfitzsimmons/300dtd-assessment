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
    echo'<h1>Please select characters to add to the campaign</h1>';
    echo'<article>';
    echo '<form
    id=assignchar
    hx-post="/assign-character"
    hx-trigger="submit"
    enctype="multipart/form-data">';
    echo '<input name="campaign_id" type="hidden"value="'.$id.'">';
    foreach ($characters as $character) {

    echo '<div>';
        echo $character['name'];
        echo '<input id=char_input type="radio" name="character_id" value="'.$character['id'].'">';
    echo'</div>';

}
echo '<input type="submit" value="Add">';
echo'</form>';
