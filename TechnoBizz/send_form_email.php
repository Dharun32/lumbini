<?php

$encoding = "utf-8";
require 'connection.php';

if( $_POST ) {

  //collect the data
  //insert the data into DB
$conn    = Connect();
$name    = $conn->real_escape_string($_POST['name']);
$email   = $conn->real_escape_string($_POST['email2']);
$phone    = $conn->real_escape_string($_POST['phone']);
$message = $conn->real_escape_string($_POST['message']);
$query   = "INSERT into contactform (name,email2,phone,message) VALUES('" . $name . "','" . $email . "','" . $phone. "','" . $message . "')";
$success = $conn->query($query);
     
  //send out the mails IFF the data insertion works
$name = $_POST['name'];
$visitor_email = $_POST['email2'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$email_from = 'info@technobizz.in';
$email_subject = "New Form submission";
// $email_body = "You have received a new message from the user ".$name.$phone."\n Here is the message:\n ".$message.

$email_body = "You have received a new message from the user: ".$name.".\r\n"; 
$email_body .= "His / Her Contact No: ".$phone.".\r\n"; 
$email_body .= "And Email: ".$visitor_email.".\r\n"; 
$email_body .= "Message is: ".$message.".\r\n"; 

$to = "info@technobizz.in,26sabina89@gmail.com";

    // Mail header
    $header = "Content-type: text/html; charset=".$encoding." \r\n";
    $header .= "From: ".$name ." <".$visitor_email."> \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";
    mail($to, $email_subject, $email_body, $header);


echo "<script>
alert('Thanks for contacting us!');
window.location.href='http://www.technobizz.in/';
</script>";

   //echo "<script type='text/javascript'>alert('It worked!')</script>";
   
  // exit;

// header("refresh:5;url=Location :http://www.technobizz.in/index.html"); // really should be a fully qualified URI
//echo '<script type="text/javascript">alert("Please Enter Correct Details!");</script>';      

}
else
     echo "<script type='text/javascript'>alert('Did NOT work')</script>";

 $conn->close();

/*require 'connection.php';

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

$conn->close();*/
 
?>
