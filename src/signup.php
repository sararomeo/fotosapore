<?php
require_once("bootstrap.php");



if(isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password1"]) && isset($_POST["password2"])) {
    if ($_POST["password1"] != $_POST["password2"]) {   // Checks if failed to repeat password
        $templateParams["signuperror"] = "Passwords don't match! Try again:";
    } else {
        $signup_result = $dbh->signUp($_POST["email"], $_POST["username"], $_POST["password1"]);
    }
}

$templateParams["title"] = "Foto Sapore | Sign-up";
$templateParams["signup"] = "signup-tmpl.php";

require("template/base.php");
?>
