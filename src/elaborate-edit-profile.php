<?php
require_once("bootstrap.php");

if (!isSessionOpen()) {
    header("location: index.php");
}

$newUsername = $_POST["username"];
$newBio = $_POST["bio"];

$dbh->updateUserData($newUsername, $newBio); 

header("location: profile.php");

?>