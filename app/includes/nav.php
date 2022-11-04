<!-- Navigation Bar to be used by home(index), dashboard, about, and bulletin page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Document</title>
    <!-- Document Icon -->
    <link rel = "icon" href = "../assets/icons/logo.png" type = "image/x-icon">

    <!-- Bootsrtap. Reference: https://getbootstrap.com/docs/5.2/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>    
    <!-- Bootstrap icon CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>

<!-- Header Info bar -->

<header class="d-flex container-fluid justify-content-between header-bg-img-1 px-5 py-1 " style="max-height: 15vh">
    <div class="h-100 d-flex flex-row" style="width: 20vw;"> <!-- Left Side Container-->
        <!-- Get Access point; Admin profile image  -->
        <img src="../assets/icons/user-icon-placeholder.png" alt="user-image" style="max-width:122px; max-height:122px"> 

        <div class="d-flex flex-column justify-content-center align-items-center ms-5 text-white">
            <i class="bi bi-person fs-2"></i>
            <i class="bi bi-envelope"></i>
        </div>
        <!-- Get Access point -->

        <div class="d-flex flex-column justify-content-center align-items center ms-4 text-white">            
            <div class="fs-2 text-nowrap"><?php echo $_SESSION['userlogin']['user_name']; ?></div>
            <div class="fw-lighter text-nowrap"><?php print_r($_SESSION['userlogin']['email']); ?></div>

        </div>
    </div>
    <!-- Logout a Link -->
    <a class="nav-link text-white pt-4 pe-3" href="../index.php?logout=true">
        <i class="bi bi-box-arrow-left me-2"></i>
        Logout
    </a>
    
</header>
<!-- Portal Default Nav -->
<nav class="container-fluid nav nav-tabs nav-fill">
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
            <img src="../assets/icons/logo.png" alt="" style="max-width: 30px;" class="me-2">
            I-Track 
        </a>
    </li>
</nav>



