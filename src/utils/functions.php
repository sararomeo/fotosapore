<?php

require 'email_notification\sendEmail.php';

/**
 * Send an email to the user who has just registered to the website.
 */
function sendRegistrationEmail($to){ 
    $subject = "Success registration to FotoSapore website";
    $message = "You have successfully registered to FotoSapore website. Now you can login to your account and start using our services!!!";
    return EmailSender::sendEmail($to , $subject, $message );
}

/**
 * Add a new session for the user
 * 
 * @param  $username the username of the user
 * @param  $email the email of the user
 */
function openUserSession($username, $email){
    $_SESSION["username"] = $username;
    $_SESSION["mail"] = $email;
}

/**
 * Check if is currently opened a session 
 * 
 */
function isSessionOpen(){
    return !empty($_SESSION['username']);
}

/**
 * Log out from the account
 */
function closeSession(){ 
    session_destroy();
    //header("location:index.php");
}


?>