<?php
require_once("bootstrap.php");

//check if the user is logged 
if(!isSessionOpen()){
    header("location: index.php");
}

$templateParams["titolo"] = "Foto Sapore | Log-out";
closeSession();

require_once("template/base-index.php");
?>
