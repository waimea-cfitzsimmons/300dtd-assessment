<?php
require_once "lib/db.php";
    
    consoleLog($_POST);

    $db = connectToDB();

    $query = 'DELETE FROM campaigns WHERE id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);

    header('HX-Redirect: ' . SITE_BASE . '/campaigns');