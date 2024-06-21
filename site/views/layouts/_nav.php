<!-- Main navigation menu. Can add logic for user type / access -->

<nav id="main-nav">

    <menu hx-boost="true">
    <?php if($loggedIn) {
    echo '<li><a href="/home">Home</a>';
    echo '<li><a href="/about">About</a>';
    echo '<li><a href="/awsome">Truth</a>';
    echo '<li><a href="/characters">Characters</a>';
    
        echo '<li><a href="/log-out">Log Out</a>';
} ?>


    </menu>

</nav>


<!-- Update the nav links -->
<script>configureNav();</script>