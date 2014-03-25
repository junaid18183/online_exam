<?php
 
 require("./includes/class.phpmailer.php"); 
// instantiate the class
$mailer = new PHPMailer();

 
// Set the subject
$mailer->Subject = 'This is a test';
 
// Body
$mailer->Body = 'This is a test of my mail system!';
 
// Add an address to send to.
$mailer->AddAddress('junedm@cybage.com', 'Eric Rosebrock');
 
if(!$mailer->Send())
{
    echo 'There was a problem sending this mail!';
}
else
{
    echo 'Mail sent!';
}
$mailer->ClearAddresses();
$mailer->ClearAttachments();
?>
