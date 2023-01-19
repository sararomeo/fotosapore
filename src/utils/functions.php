<?php

require 'email_notification\sendEmail.php';

/**
 * Send an email to the user who has just registered to the website.
 */
function sendRegistrationEmail($to){ 
    $subject = "Success registration to FotoSapore website";
    $message = "You have successfully registered to FotoSapore website. Now you can login to your account and start using our services.";
    return EmailSender::sendEmail($to , $subject, $message );
}

/**
 *  Send an email to the user who wants to get registered to the website, to verify account.
 */
function sendVerificationEmail($to){ 
    $subject = "Account Verification";
    $message = "Please, verify your account by clicking on the following link: ";
    /* TO DO */
    return EmailSender::sendEmail($to , $subject, $message );
}

?>