<?php
require_once("bootstrap.php");

//check if the user is logged 
// if(!isUserLoggedIn() || !isset($_GET["action"])){
//     header("location: login.php");
// }


$templateParams["title"] = "FotoSapore | Create post";
$templateParams["page"] = "post-tmpl.php";

//qui aggiungere qualiasi altra cosa che possa essere comoda importare in $templateParams

require("template/base.php");
?>