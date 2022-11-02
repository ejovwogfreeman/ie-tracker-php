
<?php

    require_once('./config/db.php');
    session_start();
    include('./partials/header.php');
    $_SESSION["user_id"] = false;
    header( "Location: index.php");
    session_destroy();

?>

<?php


