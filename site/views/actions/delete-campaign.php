<?php
require_once "lib/db.php";
    
    consoleLog($_POST);
    // connect to database
    $db = connectToDB();

    //delete campaign
    $query = 'DELETE FROM campaigns WHERE id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);

    //return to campaign page
    header('HX-Redirect: ' . SITE_BASE . '/campaigns');
