<?php
    require_once("../bootstrap.php");

    $args = json_decode($_POST['args'], false);

    if ($args->followValue == "Unfollow") {
        $dbh->followUser($args->follow, $_SESSION['userID']);
    } else if ($args->followValue == "Follow") {
        $dbh->unfollowUser($args->follow, $_SESSION['userID']);
    }
?>