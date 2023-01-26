<?php
require_once("bootstrap.php");

//check if the user is logged 
if (!isSessionOpen()) {
    header("location: index.php");
}

if (isset($_GET["profileID"])) {
    $templateParams["profileID"] = $_GET["profileID"];
    $username = $dbh->getUserProfileInfo($_GET["profileID"])["username"];
} else {
    $templateParams["profileID"] = $_SESSION["userID"];
    $username = $dbh->getUserProfileInfo($_SESSION["userID"])["username"];
}


$templateParams["title"] = "Foto Sapore | $username";
$templateParams["page"] = "profile-tmpl.php";


require_once("template/base.php");
?>