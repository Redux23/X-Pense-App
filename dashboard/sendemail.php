<?php
if(isset( $_POST['studentid']))
$studentid = $_POST['studentid'];
if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['message']))
$message = $_POST['message'];

$txt="From: Name = " . $name . "\n Student ID: " . $studentid . "\n Email: " . $email . " \n Message = " . $message;
$to = "tofunmiola01@gmail.com";
$subject = "Mail from RGU";
$headers = "From: No-reply@rgu.ac.uk \r\n";
mail($recipient, $subject, $content, $headers);

header("Location:index.php")
//echo "Email sent!";


?>

