<?php
require_once("bootstrap.php");

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    // Failed login
    if(count($login_result)==0){
        $templateParams["errorelogin"] = "Wrong e-mail or password!\n Try again:";
    }
}

$templateParams["titolo"] = "Foto Sapore | Log-in";
$templateParams["login"] = "login-tmpl.php";

require("template/base.php");
?>
