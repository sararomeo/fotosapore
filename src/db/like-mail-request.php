<?php
    require_once("../bootstrap.php");

    $args = json_decode($_POST['args'], false);
    $dbh->insertLikeNotifications($_SESSION['userID'], $args->postID);
?>