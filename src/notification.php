<?php
require_once("bootstrap.php");

$templateParams["title"] = "Foto Sapore | Notification";
$templateParams["page"] = "notification-tmpl.php";

$templateParams["notifications"] = $dbh->getNotifications($_SESSION["userID"]);

require("template/base.php");
?>