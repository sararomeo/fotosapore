<?php
$to = 'luca.babboni01@gmail.com';
$subject = 'Hello from XAMPP!';
$message = 'This is a test';
$headers = "From:  fotosapore@gmail.com\r\n";
if (mail($to, $subject, $message, $headers)) {
   echo "SUCCESS";
} else {
   echo "ERROR";
}
?>