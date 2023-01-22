<?php

require 'email_notification\sendEmail.php';

/**
 * Send an email to the user who has just registered to the website.
 */
function sendRegistrationEmail($to) {
    $subject = "Success registration to FotoSapore website";
    $message = "You have successfully registered to FotoSapore website. Now you can login to your account and start using our services!";
    return EmailSender::sendEmail($to, $subject, $message);
}

/**
 * Add a new session for the user
 * @param  $username the username of the user
 * @param  $email the email of the user
 */
function openUserSession($userdata) {
    $_SESSION["username"] = $userdata["username"];
    $_SESSION["email"] = $userdata["email"]; 
    $_SESSION["userID"] = $userdata["userID"]; 
}

/**
 * Check if a session is currently open.
 * @return boolean true if a session is open, false otherwise
 */
function isSessionOpen() {
    return !empty($_SESSION['username']);
}

/**
 * Close session and redirect to login page.
 * @return void
 */
function closeSession() {
    session_destroy();
    header("location:index.php");
}

?>