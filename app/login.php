<?php
// Did the user already logged in? If yes, then skip the log in page and proceed to the home page
session_start();
if(isset($_SESSION['userlogin'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Page Title -->
    <title>Login | I-Track</title>

    <!-- Bootsrtap. Reference: https://getbootstrap.com/docs/5.2/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <!-- This document uses common bootstrap classes to provide upgrades on elements with custom styles, sizing, focus states, margin, etc. -->

    <!-- External CSS -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<section class="Form vertical-center mx-5">  <!-- m (btlr / yx) adds margin -->
    <div class="container"> <!-- Set max-width -->

        <!-- Use row to place elements inside side-by-side -->
        <div class="row g-0"> <!-- g-0 removes spacing between elements (column) inside row -->

            <!-- Image to the left of form -->
            <div class="col-lg-5">
                <!-- fluid image is responsive to its container size -->
                <img src="assets/images/logo.png" alt="logo" class="login img-fluid"> 
            </div>
            
            <!-- Login form -->
            <div class="col-lg-5 offset-md-1 pt-5 my-5" >     
                <img src="assets/images/profile.png" alt="logo" class="center-block img-fluid">  
                <h1 align="center" class="mt-3">LOGIN</h1>
                <form action="modules/validate_user.php" method="POST">
                    <!-- form-label (from bootstrap) Formats label text (e.g. add bottom margin) -->
                    <!-- form-control upgrades input with custom styles, sizing, focus states -->
                    
                    <?php
                    // Did the user logged in already and it failed? -->
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span class='error'>$error   Hello </span>";
                    }
                    ?>  
                    <div class="my-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    </div>              

                    
                    <button type="submit" class="btn btn-primary" id="login" name="login">
                        LOGIN
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

    
</body>
</html>

<!-- Clear up Error session after leaving or reloading the page -->
<?php
    unset($_SESSION["error"]);
?>