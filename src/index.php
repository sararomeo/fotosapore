<?php
require_once("bootstrap.php");

if(isset($_POST["email"]) && isset($_POST["password"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    // Failed login
    if(count($login_result)==0){
        $templateParams["loginerror"] = "Wrong e-mail or password! Try again:";
    } else {
        header("location:feed.php");
    }
}

$templateParams["title"] = "Foto Sapore | Log-in";
$templateParams["login"] = "login-tmpl.php";

require("template/base.php");
?>
