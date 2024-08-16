<!-- Default page layout with header / footer / nav -->

<!DOCTYPE html>
<html lang="en">

    <?php require '_head.php'; ?>

    <body>
        
        <?php require '_header.php'; ?>

        <main>

            <?php require $pageContent; ?>
        
        </main>
        <!-- if logged in add back button overlay-->
        <?php if($loggedIn) { echo '<button id="backbutton" onclick="history.back()">⬅</button>'; } ?>


        <?php require '_footer.php'; ?>   

    </body>

</html>

