<?php
require_once("bootstrap.php");

//check if the user is logged 
if(!isSessionOpen()){
    header("location: index.php");
}

$templateParams["title"] = "Foto Sapore | Notification";
$templateParams["page"] = "notification-tmpl.php";
$templateParams["notifications"] = $dbh->getNotifications($_SESSION["userID"]);

require_once("template/base.php");
?>