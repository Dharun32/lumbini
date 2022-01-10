<?php

$encoding = "utf-8";
require 'connection.php';

$conn    = Connect();
$name    = $conn->real_escape_string($_POST['name']);
$email   = $conn->real_escape_string($_POST['email2']);
$phone    = $conn->real_escape_string($_POST['phone']);
$message = $conn->real_escape_string($_POST['message']);
$query   = "INSERT into contactform (name,email2,phone,message) VALUES('" . $name . "','" . $email . "','" . $phone. "','" . $message . "')";
$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: ".$conn->error);

}

echo ("Thanks for Contacting Us <br>") ;


$name = $_POST['name'];
$visitor_email = $_POST['email2'];
$message = $_POST['message'];

$email_from = 'info@technobizz.in';
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user $name.\n"."Here is the message:\n $message".

$to = "info@technobizz.in,26sabina89@gmail.com";

    // Mail header
    $header = "Content-type: text/html; charset=".$encoding." \r\n";
    $header .= "From: ".$name ." <".$visitor_email."> \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";
    mail($to, $email_subject, $message, $header);


$conn->close();
 
?>