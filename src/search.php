<?php
require_once("bootstrap.php");

if(!isSessionOpen()){
    header("location: index.php");
}

if (isset($_POST['myInput'])){ 
    $tagsString = $_POST['myInput'];
}else if(isset($_GET['myInput'])){ 
    $tagsString = $_GET['myInput'];
}else{ 
    header("location: index.php");
}

$templateParams["title"] = "Foto Sapore | Search";
$templateParams["page"] = "search-tmpl.php";

require_once("template/base.php");
?>