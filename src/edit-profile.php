<?php
require_once("bootstrap.php");

//check if the user is logged 
if (!isSessionOpen()) {
    header("location: index.php");
}

$templateParams["title"] = "Foto Sapore | Edit profile";
$templateParams["page"] = "edit-profile-tmpl.php";

require_once("template/base.php");
?>