<?php

require 'email_notification\sendEmail.php';

function sendRegistrationEmail($to){ 
    $subject = "Success registration to FotoSapore website";
    $message = "You have successfully registered to FotoSapore website. Now you can login to your account and start using our services.";
    return EmailSender::sendEmail($to , $subject, $message );
}

?>