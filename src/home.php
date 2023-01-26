<?php
require_once("bootstrap.php");

//check if the user is logged 
if(!isSessionOpen()){
    header("location: index.php");
}

$templateParams["title"] = "Foto Sapore | Home";
$templateParams["page"] = "home-tmpl.php";

require_once("template/base.php");
?>