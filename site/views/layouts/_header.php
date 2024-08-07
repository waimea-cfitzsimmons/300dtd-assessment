<!-- Header typically has the site name which links to home page -->

<?php global $loggedIn ?>
<?php global $userName ?>
<?php global $userId ?>
<?php global $campaignID ?>

<header id="main-header">
    
    <a href="/"><?= SITE_NAME ?></a>

    <?php require '_nav.php'; ?>


</header>

