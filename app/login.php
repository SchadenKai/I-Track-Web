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
    <link rel = "icon" href = "View/assets/icons/logo.png" type = "image/x-icon">
    <!-- Page Title -->
    <title>Login | I-Track</title>

    <!-- Bootsrtap. Reference: https://getbootstrap.com/docs/5.2/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> 
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <!-- This document uses common bootstrap classes to provide upgrades on elements with custom styles, sizing, focus states, margin, etc. -->

    <!-- External CSS -->
    <link rel="stylesheet" href="View/css/styles.css">

</head>
<body class="background-image" style="overflow: hidden; height: 100vh">

<!-- main section spanning whole vh-->
<section class=" container bg-light h-100 p-0 glassmorphism-1" style="max-width: 800px;">

    <!-- heading image -->
    <img src="View/assets/images/header-img.png" class="w-100">

    <!-- logo image rounded corners -->
    <!-- position on top of other elements / position to center up 25% -->
    <div class="d-flex justify-content-center" style="margin-top:-50px; padding-top:20px">
        <!-- contain logo 100% size of the container -->
        <img src="View/assets/icons/i-track-logo.png" alt="logo" class="bg-white shadow rounded-circle" style="max-width:15%; min-width:50px; z-index:1"> 
    </div>  
    <div class="d-flex flex-column justify-content-evenly align-items-center h-50 mt-5">
        <h1 sclass="text-center my-3">I-Track: Login</h1>
        <!-- card for input elements  -->
        <div class="card center-block px-2 shadow-lg w-75" style="max-width: 835px;">
            <div class="card-header bg-transparent  pb-3 my-3 fs-5">
                Please Login
            </div>
            <div class="card-body text-end pt-0 w-100">
                <form action="Model/modules/validate_user.php" method="POST">
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
                    <div class="mb-3 form-floating password-field">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        <label for="password" class="form-label">Password</label>
                    

                    <div class="mb-3">
                        
                        <div style="float:left;">
                            <a href="reset/reset.php">Forgot password?</a>
                        </div>
                        <div style="float:right;">
                            <input type="checkbox" id="passwordToggle">
                            <label for="password-toggle">&nbsp;Show Password</label>
                        </div>
                        
                    </div>

                    <br>
              
                    </div>              
                    <button type="submit" class="btn btn-warning rounded-pill mt-1" id="login" name="login" style="min-width: 120px;" onclick="this.classList.add('disabled'); this.innerHTML='<span class=\'spinner-border spinner-border-sm\' role=\'status\' aria-hidden=\'true\'></span> Loading...';">
                        Login
                    </button>
                </form>
            </div>
            <div class="card-footer text-muted text-end fs-6 bg-transparent lh-lg">
                &#169 I-Track: Student Progress Tracking System
            </div>
        </div>
    </div>
    
</section>

    
</body>
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
</html>

<!-- Clear up Error session after leaving or reloading the page -->
<?php
    unset($_SESSION["error"]);
?>