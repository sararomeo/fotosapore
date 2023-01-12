<?php
require_once("bootstrap.php");

if (!empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password1"]) && !empty($_POST["password2"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    if ($password1 != $password2) {   // Checks if failed to repeat password
        $templateParams["signuperror"] = "Passwords don't match! Try again:";
    } else {
        $signup_result = $dbh->signUp($email, $username, $password1);
    }
}

$templateParams["title"] = "Foto Sapore | Sign-up";
$templateParams["signup"] = "signup-tmpl.php";

require("template/base.php");
?>
