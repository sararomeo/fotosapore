<?php
require_once("bootstrap.php");

//check if the user is logged 
if(!isSessionOpen()){
    header("location: index.php");
}

if(isset($_GET["profileID"])){
    $templateParams["profileID"] = $_GET["profileID"];
}else{ 
    $templateParams["profileID"] = $_SESSION["userID"];
}


$templateParams["title"] = "Foto Sapore | Profile";
$templateParams["page"] = "profile-tmpl.php";


require_once("template/base.php");
?>