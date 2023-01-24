<?php
require_once("bootstrap.php");

if(!isSessionOpen()){
    header("location: index.php");
}

if(isset($_GET["postID"])){ 
    $templateParams["postID"] = $_GET["postID"];
}else{ 
    header("location: index.php");
}


$templateParams["title"] = "Foto Sapore | Post";
$templateParams["page"] = "single-post-tmpl.php";




require_once("template/base-index.php");
?>
