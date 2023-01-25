<?php

/**
 * Send an email to the user who has just registered to the website.
 */
function sendRegistrationEmail($to) {
    $subject = "Successfull registration to FotoSapore website";
    $message = "You have successfully registered to FotoSapore website. Now you can login to your account and start using our services!";
    return EmailSender::sendEmail($to, $subject, $message);
}

/**
 * Send an email that notify that a followed user published a post
 */
function sendPostNotification($to, $username) {
    $subject = "A followed user published a post";
    $message = $username." published a new post.";
    return EmailSender::sendEmail($to, $subject, $message);
}

/**
 * Send an email that notify that a leave a comment on a Post
 */
function sendCommentNotification($to, $username) {
    $subject = "A user commented your post";
    $message = $username." commented your post.";
    return EmailSender::sendEmail($to, $subject, $message);
}

/**
 * Send an email that notify that a leave a comment on a Post
 */
function sendLikeNotification($to, $username) {
    $subject = "A user liked your post";
    $message = $username." liked your post.";
    return EmailSender::sendEmail($to, $subject, $message);
}

/**
 * Send an email that notify that a user start following 
 */
function sendFollowNotification($to, $username) {
    $subject = "A user started following you";
    $message = $username." started following your profile.";
    return EmailSender::sendEmail($to, $subject, $message);
}




?>