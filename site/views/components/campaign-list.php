<ul>
    <?php
    require_once "lib/db.php";
    $db = connectToDB();

    // Get the id and title from database
    $query = 'SELECT id, title FROM campaigns ORDER BY id DESC';

    try {
        $stmt = $db->prepare($query);
        $stmt->execute();
        $campaigns = $stmt->fetchAll();
    }
    catch (PDOException $e) {
        consoleError($e->getMessage(), 'DB Fetch Campaign');
        die('There was an error getting Campaign from the database');
    }

    // Work through all campaigns
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
</ul>
