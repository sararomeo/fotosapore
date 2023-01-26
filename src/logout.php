<?php
require_once("bootstrap.php");

//check if the user is logged 
if(!isSessionOpen()){
    header("location: index.php");
}

$templateParams["titolo"] = "FotoSapore | Logout";
closeSession();

require_once("template/base-index.php");
?>
