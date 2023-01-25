<?php
require_once("../bootstrap.php");

$args = json_decode($_POST['args'], false);

$dbh->deletePost($args->postID);
?>