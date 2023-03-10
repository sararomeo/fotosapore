<?php
require_once("bootstrap.php");

if (!empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password1"]) && !empty($_POST["password2"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    $pw1_hashed = password_hash($password1, PASSWORD_DEFAULT);

    // Checks if failed to repeat password
    if ((!password_verify($password2, $pw1_hashed)) && ($dbh->checkMailExists($email))) {
        $templateParams["signuperror"] = "<li class=\"list-group-item list-group-item-danger\">E-mail already in use!</li><li class=\"list-group-item list-group-item-danger\">Passwords don't match!</li><li class=\"list-group-item\">Try again:</li>";
    } else if ($dbh->checkMailExists($email)) {
        $templateParams["signuperror"] = "<li class=\"list-group-item list-group-item-danger\">E-mail already in use!</li><li class=\"list-group-item\">Try again:</li>";
    } else if (!password_verify($password2, $pw1_hashed)) {
        $templateParams["signuperror"] = "<li class=\"list-group-item list-group-item-danger\">Passwords don't match!</li><li class=\"list-group-item\">Try again:</li>";
    } else {
        sendRegistrationEmail($email);
        // Insert user into database
        $signup_result = $dbh->signUp($email, $username, $pw1_hashed);
        if ($signup_result == true) {
            $templateParams["successfullsignup"] = "<li class=\"list-group-item list-group-item-success\">Signup successfull!</li><li class=\"list-group-item\">Now you can login :)</li>";
        } else {
            $templateParams["signuperror"] = "<li class=\"list-group-item list-group-item-danger\">Signup failed!</li><li class=\"list-group-item\">Try again:</li>";
        }
    }
}

$templateParams["title"] = "Foto Sapore | Sign-up";
$templateParams["page"] = "signup-tmpl.php";

require_once("template/base-index.php");
?>