<?php
require_once("bootstrap.php");

if(isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $pw = $_POST["password"];

    // Check login submission
    if(!$dbh->checkLogin($email, $pw)){
        $templateParams["loginerror"] = "Wrong e-mail or password! Try again:";
    } else {
        header("location:feed.php");
    }
}

$templateParams["title"] = "Foto Sapore | Log-in";
$templateParams["login"] = "login-tmpl.php";

require("template/base.php");
?>
