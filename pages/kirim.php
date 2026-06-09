<?php
require_once('../class/class.Mail.php');

$to = "ontaxp@gmail.com";
$name = "Danish Faiz";
$subject = "Test Email";
$message = "Hi, <b>". $name ."</b>! This is a test email from Company EBS.";
Mail::SendMail($to, $name, $subject, $message);
echo "Email sent successfully!";
?>