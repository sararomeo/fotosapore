<?php
require_once("bootstrap.php");

if (!isSessionOpen()) {
    header("location: index.php");
}

$dbh->insertComment($_POST["postID"], $_POST["commentText"]);

header("location: single-post.php?postID=" . $_POST["postID"]);
?>