<?php
require_once("bootstrap.php");


if(isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $pw = $_POST["password"];

    // Check login submission
    if($dbh->checkLogin($email, $pw)){
        //create user session
        $userdata = $dbh->getUserData($email);
        $userdata["email"] = $email; 
        openUserSession($userdata);     
    } else {
        $templateParams["loginerror"] = "<div class = \"text-center\"><ul class=\"list-group list-group-flush\"><li class=\"list-group-item list-group-item-danger\">Wrong e-mail or password!</li><li class=\"list-group-item\">Try again:</li></ul></div>";
    }
}

//If a session is currently open redirect into the homepage
if(isSessionOpen()){
    header("location:home.php");
}else{ 
    $templateParams["title"] = "Foto Sapore | Log-in";
    $templateParams["page"] = "login-tmpl.php";
    
    require("template/base-index.php");
}

?>
