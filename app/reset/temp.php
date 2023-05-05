<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Email <input type="email" name="email"><br>
        Subject <input type="text" name="subject"><br>
        Message <input type="text" name="message"><br>
        <button type="submit" name="send">             
            SEND
        </button>
    </form>
</body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dummythisis123@gmail.com';
    $mail->Password = 'pehvwdyjiamqmist';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $target = $_POST["email"];
    $mail->setFrom('dummythisis123@gmail.com');
    $mail->addAddress($target);
    $mail->isHTML(true);
    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    $mail->send();

    echo "Sending email to $target";

    
}

?>
</html>