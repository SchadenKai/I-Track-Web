<!-- Navigation Bar to be used by home(index), dashboard, about, and bulletin page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Document Icon -->
    <link rel = "icon" href = "../../View/assets/icons/logo.png" type = "image/x-icon">

    <!-- Bootsrtap. Reference: https://getbootstrap.com/docs/5.2/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" async></script>    
    <!-- Bootstrap icon CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Handlebars.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../../View/css/styles.css">
    <!-- ChartJS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- D3JS CDN -->
</head>
<body>

<!-- Header Info bar -->

<header class="d-flex container-fluid justify-content-between header-bg-img-1 px-5 py-1 " style="max-height: 300px">
    <div class="h-100 d-flex flex-row" style="width: 20vw;"> <!-- Left Side Container-->
        <!-- Get Access point; Admin profile image  -->
        <img src="../../View/assets/icons/user-icon-placeholder.png" class="mh-100" alt="user-image" style="max-width:122px"> 

        <div class="d-flex flex-column justify-content-center align-items-center ms-5 text-white">
            <i class="bi bi-person fs-2"></i>
            <i class="bi bi-envelope"></i>
        </div>
        <!-- Get Access point -->

        <div class="d-flex flex-column justify-content-center align-items center ms-4 text-white">            

            <div class="fs-2 text-nowrap" id="admin_fullName">Loading...</div>
            <div class="fw-lighter text-nowrap" id="admin_email">Retrieving data...</div>
           
        </div>
    </div>
    <!-- Logout a Link -->
    <a class="nav-link text-white pt-4 pe-3" href="../index.php?logout=true">
        <i class="bi bi-box-arrow-left me-2"></i>
        Logout
    </a>
    
</header>
<!-- Portal Default Nav -->
<nav class="container-fluid nav nav-tabs nav-fill bg-light">
    <li class="nav-item">
        <a class="nav-link disabled h-100"  href="../index.php">
            <i class="bi bi-house-fill me-2"></i>
            Home 
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="../index.php">
            <i class="bi bi-newspaper me-2"></i>
            News 
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="../index.php">
            <i class="bi bi-megaphone me-2"></i>
            Advisories 
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="../index.php">
            <i class="bi bi-calendar-week me-2"></i>
            Schedules
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="../index.php">
            <i class="bi bi-download me-2"></i>
            Downloads 
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link active" aria-current="page" href="../index.php">
            <img src="../../View/assets/icons/logo.png" alt="" style="max-width: 30px;" class="me-2">
            I-Track 
        </a>
    </li>
</nav>