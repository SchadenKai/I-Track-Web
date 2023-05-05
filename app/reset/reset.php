<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../View/css/styles.css">
    <style>        

        .container {
            background-color: white;
            max-width: 50%;
            margin: auto;
            margin-top: 5%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }


    </style>
</head>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require_once('../Model/configs/psql_conn.php');
?>

<body class="background-image">
    <div class="container">
        <h1 class="text-center mb-4">Forgot Password</h1>
        
        <?php if(!isset($_POST["send"])) { ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button name="send" type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>

        <?php } else { 
            $mail = new PHPMailer(true);
            $mail->isSMTP();

            // Sender email credentials
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'dummythisis123@gmail.com';
            $mail->Password = 'pehvwdyjiamqmist';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Reciever content
            $reset_token = bin2hex(random_bytes(32));
            $subject = "I-Track Password Reset Request";
            $message = "Your 64-character token: $reset_token";    
            $target = $_POST["email"];

            // Record token to database
            $query = "INSERT INTO reset_tokens (email, reset_token, created_at) VALUES ($1, $2, NOW())";
            $result = pg_query_params($db, $query, array($target, $reset_token));

            // Send email
            $mail->setFrom('dummythisis123@gmail.com');
            $mail->addAddress($target);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send(); 
            if(!isset($_POST["send_token"])) { ?>
            <form action="token.php" method="POST">
                <div class="mb-3">
                    <label for="token" class="form-label">64-character token</label>
                    <input type="text" class="form-control" id="token" name="token" required>
                </div>
            <button name="send_token" type="submit" class="btn btn-primary w-100">Verify token</button>
                </form>       
            
        <?php }} ?>
         
        

        <div id="reset-message" class="text-center mt-3 d-none">Please check the email we sent to update the password on your account </div>
        <div class="text-center mt-3">
            <a href="../login.php">Back to Login</a>
        </div>
    </div>    
</body>

</html>
