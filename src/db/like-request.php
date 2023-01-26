<?php
    require_once("../bootstrap.php");

    $args = json_decode($_POST['args'], false);

    if ($args->op == 0) {
        $dbh->insertLikeNotifications($_SESSION['userID'], $args->postID);
        $dbh->likePost($_SESSION['userID'], $args->postID);
    } else {
        $dbh->dislikePost($_SESSION['userID'], $args->postID);
    }
    
?>