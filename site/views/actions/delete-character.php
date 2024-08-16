<?php
require_once "lib/db.php";
    
    consoleLog($_POST);

    //connect to database
    $db = connectToDB();

    //delete character
    $query = 'DELETE FROM characters WHERE id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);

    //return to character page
    header('HX-Redirect: ' . SITE_BASE . '/characters');
