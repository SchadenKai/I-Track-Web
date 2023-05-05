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
require_once('../Model/configs/psql_conn.php');
?>

<body class="background-image">
    <div class="container">
        <h1 class="text-center mb-4">Forgot Password</h1>
        
        

        <?php 
            
            $token = $_POST["token"];

            // Query the database for the user associated with the token
            $result = pg_query_params($db, 'SELECT * FROM reset_tokens WHERE reset_token = $1', array($token));
            
            if(pg_num_rows($result) == 1) { 
            $user = pg_fetch_assoc($result);
            $user_email = $user['email']; ?>
            
            <form action="update.php" method="POST">
                <div class="mb-3 form-floating password-field">                                        
                    <input type="password" class="form-control" id="password" name="password" placeholder = 'Enter a new password' required>
                    <label for="password" class="form-label">Password</label>
                
                    <div class="mb-3">
                        <div style="float:right;">
                            <input type="checkbox" id="passwordToggle">
                            <label for="password-toggle">&nbsp;Show Password</label>
                        </div>                    
                    </div>
                    <input type="hidden" name="email" value="<?php echo $user_email ?>">
                </div>
                <br>
                <button name="send" type="submit" class="btn btn-primary w-100">Update Password</button>
            </form>

            <script>
                const passwordField = document.querySelector(".password-field");
                const passwordToggle = document.querySelector("#passwordToggle");

                passwordToggle.addEventListener("change", function () {
                if (this.checked) {
                    passwordField.classList.add("show-password");
                    document.querySelector("#password").type = "text";
                } else {
                    passwordField.classList.remove("show-password");
                    document.querySelector("#password").type = "password";
                }
                });
            </script>

            <?php } else { 
                echo "Invalid token";
            }?>

        <div id="reset-message" class="text-center mt-3 d-none">Please check the email we sent to update the password on your account </div>
        <div class="text-center mt-3">
            <a href="../login.php">Back to Login</a>
        </div>
    </div>    
</body>

</html>
