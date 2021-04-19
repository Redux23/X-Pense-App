<?php


use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['btn-send'])){

    $fullname = trim($_POST['name']); 
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['body']);


    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cmm004team@gmail.com';
        $mail->Password = 'admin0123456';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('cmm004team@gmail.com');
        $mail->addAddress('cmm004team@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Message Received (Contact Page)';
        $mail->Body = "<h3>Name: $name <br>Email: $email<br>Message : $message</h3>";

        $mail->send();
        /*$alert = '<div class="alert alert-success>
        <span>Message sent! Thank you for contacting us.</span>
        </div>';*/
        header('Location: contact.php?success=msgsent');
        exit();


    } catch (Exception $e) {
        /*$alert = '<div class="alert alert-danger">
        <span>'.$e->getMessage().'</span></div>';*/
        header('Location: contact.php?error=errormsgnotsent');
        exit();
    }
    

}




?>

