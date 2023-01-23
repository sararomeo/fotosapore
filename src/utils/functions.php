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

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }

    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    
    return array($result, $msg);
}

?>