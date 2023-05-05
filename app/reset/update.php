

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

<body class="background-image">
<?php
require_once('../Model/configs/psql_conn.php');

// Check if form was submitted
if (isset($_POST['send'])) {

    // Get input from form
    $password = $_POST['password'];
    $user_email = $_POST['email'];

    // Update password in database
    $result = pg_query_params($db, "UPDATE admin SET password = $1 WHERE email = $2", array($password, $user_email));

    // Check if update was successful
    echo 
    '<div class="container">
    <h1 class="text-center mb-4">Forgot Password</h1>';
    if (!$result) {        
        echo '<p class="text-cente">Failed to update password </p>';
    } else {        
        echo '<p class="text-center">Password updated successfully </p>';
    }

    // Close database connection
    pg_close($db);

}

?>
<div id="reset-message" class="text-center mt-3 d-none">Please check the email we sent to update the password on your account </div>
        <div class="text-center mt-3">
            <a href="../login.php">Back to Login</a>
        </div>
</body>