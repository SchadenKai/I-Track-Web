<?php 
	require "../includes/validation.php";
    include "../includes/nav.php";
?>

<!-- Change the Document Title-->
<script>
document.title = "I-Track | About"
</script>

<!-- Content of the Page -->
<!-- Content of the Page Wrapper-->
<div class="d-flex w-100  justify-content-center pt-5 bg-secondary">
	<!-- Content Container -->
    <div class="container shadow border glassmorphism-1 p-0"> 
		<!-- I-track Nav -->
        <nav class="nav nav-pills nav-fill custom-navbar">
            <li class="nav-item">
                <a class="nav-link h-100"  href="../index.php">
                    <i class="bi bi-house-fill me-2"></i>
                    Home 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pages/bulletin.php">
                    <i class="bi bi-postcard me-2"></i>
                    Bulletin 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/pages/about.php">
                    <i class="bi bi-info-circle me-2"></i>
                    About 
                </a>
            </li>
		</nav>

        <section class="d-flex flex-row p-3 bg-white w-100" style="height:755px"> <!-- Main Content Wrapper -->
            <aside class="col-4 h-100 d-flex flex-column justify-content-center">
                <div class="h-25 i-track-icon-rounded mb-5"></div>
                <div class="h-25 vector-cartoon-graph"></div>
            </aside>
            <article class="col-8 h-100 d-flex flex-column align-items-center justify-content-center">
                <div class="giant-text-headings w-100 mb-3 text-center">Easily track student’s academic performance</div>
                <div class="w-75 text-wrap lh-lg">Tracking and monitoring current student performance are essential 
                    in giving information that can be used to help students make decisions that will
                    improve their progress. This would not only allow students to take ownership of 
                    their learning but would also allow them to track their growth over time.</div>
            </article>
        </section>
        <section class="d-flex flex-row w-100" style="height:755px; background-color: #A87676"> <!-- Main Content Wrapper -->
            <article class="col-7 h-100 d-flex flex-column align-items-center justify-content-center text-light">
                <div class="giant-text-headings w-100 mb-5 text-center">
                    <img src="../assets/icons/target icon.png" alt="target-icon">
                    I-Track in Mobile</div>
                <div class="w-75 text-wrap lh-lg"> I-Track: A Student Progress Tracker is a mobile application 
                    built for students to track their academic performance progress. Tracking and 
                    monitoring current student performance are essential in giving information 
                    that can be used to help students make decisions that will improve their progress. 
                    This would not only allow students to take ownership of their learning but would also 
                    allow them to track their growth over time.</div>
            </article>
            <aside class="col-5 h-100 d-flex flex-column justify-content-center">
                <div class="h-100 i-track-mobile-showcase"></div>
            </aside>
        </section>
        <section class="d-flex flex-row w-100 background-image" style="height:755px;"> <!-- Main Content Wrapper -->
            <aside class="col-5 h-100 d-flex flex-column justify-content-center">
                <div class="h-100 website-showcase"></div>
            </aside>    
            <article class="col-7 h-100 d-flex flex-column align-items-center justify-content-center text-light">
                <div class="giant-text-headings w-100 mb-5 text-center">
                    I-Track Website Server</div>
                <div class="boder rounded text-wrap lh-lg p-3 me-5" style="background-color:#A87676; width:80%;"> I-Track: A Student Progress Tracker is a mobile application 
                    built for students to track their academic performance progress. Tracking and 
                    monitoring current student performance are essential in giving information 
                    that can be used to help students make decisions that will improve their progress. 
                    This would not only allow students to take ownership of their learning but would also 
                    allow them to track their growth over time.</div>
            </article>
        </section>
        <section class="d-flex flex-row w-100 bg-secondary" style="height:755px;"> <!-- Main Content Wrapper -->
            <article class="col-8 h-100 d-flex flex-column px-3 align-items-center justify-content-center text-light">
                <div class="fs-1 fw-bolder w-100 mb-5 text-center ">
                    I-Track Project Team </div>
                <div class="border-none rounded text-wrap lh-lg p-3 h-75 d-flex flex-column justify-content-evenly" style="width:95%; background-color:#A87676">
                    <div class="row justify-content-evenly">
                        <div class="card border shadow align-items-center py-1" style="background-color: #D4D4D4; width:150px;height:222px; box-sizing:content-box">
                            <img src="../assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                            <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                                <p class="fw-semibold m-0">Tecson, Kairus Noah E.</p>
                                <p class="fw-light m-0">Project Leader</p>
                            </div>
                        </div>
                        <div class="card border shadow align-items-center py-1" style="background-color: #D4D4D4; width:150px;height:222px;box-sizing:content-box">
                            <img src="../assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                            <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                                <p class="fw-semibold m-0">Malibiran, Darren</p>
                                <p class="fw-light m-0">Programmer</p>
                            </div>
                        </div>
                        <div class="card border shadow align-items-center py-1" style="background-color: #D4D4D4; width:150px;height:222px;box-sizing:content-box">
                            <img src="../assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                            <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                                <p class="fw-semibold m-0">Sealquil, Nino</p>
                                <p class="fw-lighter m-0">Analyst</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-evenly">
                        <div class="card border shadow align-items-center py-1" style="background-color: #D4D4D4; width:150px;height:222px;box-sizing:content-box">
                            <img src="../assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                            <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                                <p class="fw-semibold m-0">Laqui, Jamie Rose</p>
                                <p class="fw-light m-0">Designer</p>
                            </div>
                        </div>
                        <div class="card border shadow align-items-center py-1" style="background-color: #D4D4D4; width:150px;height:222px;box-sizing:content-box">
                            <img src="../assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                            <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                                <p class="fw-semibold m-0">Militante, Zyrah</p>
                                <p class="fw-light m-0">Designer</p>
                            </div>
                        </div>
                        <div class="card border shadow align-items-center py-1" style="background-color: #D4D4D4; width:150px;height:222px;box-sizing:content-box">
                            <img src="../assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                            <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                                <p class="fw-semibold m-0">Valdez, Dominic</p>
                                <p class="fw-light m-0">Documentation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <aside class="col-4 h-100 d-flex flex-column justify-content-center">
                <div class="h-25 i-track-icon-rounded mb-4"></div>
                <div class="h-25 batstateu-icon"></div>
            </aside>    
            
        </section>
		


    </div>
</div>

