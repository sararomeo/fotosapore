<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';	
require 'PHPMailer/src/SMTP.php';

class EmailSender
{
    /**
     * Send an email. Returns true if the email was successfully accepted for delivery, false otherwise.
     * @param string $to
     * @param string $subject
     * @param string $message
     * 
     * @return bool
     */
    public static function sendEmail($to , $subject, $message ) : bool 
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'fotosapore@gmail.com'; 
        $mail->Password = 'zdmizwucnsecurlj'; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('fotosapore@gmail.com');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;
        return($mail->send());
    }
}
?>