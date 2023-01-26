<?php
require_once("bootstrap.php");

if(!isSessionOpen()){
    header("location: index.php");
}

if(isset($_GET["postID"])){ 
    $templateParams["postID"] = $_GET["postID"];
    $templateParams["postInfo"] = $dbh->getPostByID($templateParams["postID"]);
    if(!isset($templateParams["postInfo"]["title"])){
        header("location: index.php");
    }
    $templateParams["postInfo"]["tagString"] = $dbh->getTagByPost($templateParams["postID"]);
    $templateParams["postComments"] = $dbh->getCommentsByPost($templateParams["postID"]); 
}else{ 
    header("location: index.php");
}

$templateParams["title"] = "Foto Sapore | Post";
$templateParams["page"] = "single-post-tmpl.php";


require_once("template/base.php");
?>
