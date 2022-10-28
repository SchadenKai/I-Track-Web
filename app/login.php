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
    <link rel = "icon" href = "assets/icons/logo.png" type = "image/x-icon">
    <!-- Page Title -->
    <title>Login | I-Track</title>

    <!-- Bootsrtap. Reference: https://getbootstrap.com/docs/5.2/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> 
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <!-- This document uses common bootstrap classes to provide upgrades on elements with custom styles, sizing, focus states, margin, etc. -->

    <!-- External CSS -->
    <link rel="stylesheet" href="/css/styles.css">

</head>
<body class="background-image">

<!-- main section spanning whole vh-->
<section class="container bg-light w-75 vh-100 p-0 position-relative glassmorphism-1">

    <!-- heading image -->
    <header class="d-flex h-25 p-0 shadow bg-secondary"  >
        
        <!-- contain image 100% size of the container -->
        <!-- <img src> insert image here -->
       <div class="header-bg-img"></div> <!--temporary -->
    </header>

    <!-- logo image rounded corners -->
    <!-- position on top of other elements / position to center up 25% -->
    <div class="bg-white shadow rounded-circle position-absolute translate-middle top-25 start-50" style="width:125px; height:125px; min-width:0px; min-height:0px; z-index:1">
        <!-- contain logo 100% size of the container -->
        <img src="assets/icons/i-track-logo.png" alt="logo" class="center-block h-100"> 
    </div>  
    <h1 class="text-center" style="margin-top: 125px">I-Track: Login</h1>
    <!-- card for input elements  -->
    <div class="card position-absolute center-block top-50 start-0 end-0 mt-3 px-2 shadow-lg " style="max-width: 835px;">
        <div class="card-header bg-transparent fs-3 my-3">
            Please Login
        </div>
        <div class="card-body text-end">
            <form action="modules/validate_user.php" method="POST">
                <!-- form-label (from bootstrap) Formats label text (e.g. add bottom margin) -->
                <!-- form-control upgrades input with custom styles, sizing, focus states -->
                
                <?php
                // Did the user logged in already and it failed? -->
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
                    echo "<span class='error'>$error</span>";
                }
                ?>

                <div class="mb-3 form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                    <label for="email" class="form-label">Email Address</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    <label for="password" class="form-label">Password</label>
                </div>              
                    <button type="submit" class="btn btn-primary mt-3" id="login" name="login" >
                    Login
                </button>
            </form>
        </div>
        <div class="card-footer text-muted text-end fs-6 bg-transparent lh-lg">
            &#169 I-Track: Student Progress Tracking System
        </div>
    </div>
</section>

    
</body>
</html>

<!-- Clear up Error session after leaving or reloading the page -->
<?php
    unset($_SESSION["error"]);
?>