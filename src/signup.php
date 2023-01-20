<?php
require_once("bootstrap.php");

if (!empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password1"]) && !empty($_POST["password2"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    $pw1_hashed = password_hash($password1, PASSWORD_DEFAULT);
    
    // Checks if failed to repeat password
    if (!password_verify($password2, $pw1_hashed)) {
        $templateParams["signuperror"] = "Passwords don't match! Try again:";
    } else {
        sendRegistrationEmail($email);
        // Insert user into database
        $signup_result = $dbh->signUp($email, $username, $pw1_hashed);
    }
}

$templateParams["title"] = "Foto Sapore | Sign-up";
$templateParams["page"] = "signup-tmpl.php";

require("template/base-index.php");
?>
