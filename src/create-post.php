<?php
require_once("bootstrap.php");

//check if the user is logged 
if(!isSessionOpen()){
    header("location: index.php");
}

$templateParams["title"] = "FotoSapore | Create post";
$templateParams["page"] = "post-tmpl.php";

//if the post insertion fails the user is referenced into this page. 
//formmsg represent the error that coused the post insertion fail
if(isset($_GET["msg"])){ 
    $templateParams["msg"] = $_GET["msg"]; 
    $templateParams["postTitle"] = $_GET["postTitle"];
    $templateParams["caption"] = $_GET["caption"];
    $templateParams["recipe"] = $_GET["recipe"];
    $templateParams["tagString"] = $_GET["tagString"];
}

require_once("template/base.php");
?>