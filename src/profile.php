<?php
require_once("bootstrap.php");

if(isset($_GET["profileID"])){
    //header("location: profile.php?profileID=".publisherID) 
    $templateParams["profileID"] = $_GET["profileID"];
}else{ 
    $templateParams["profileID"] = $_SESSION["userID"];
}


$templateParams["title"] = "Foto Sapore | Profile";
$templateParams["page"] = "profile-tmpl.php";


require_once("template/base.php");
?>