<?php 
	require "../Model/modules/validation.php";
    include "../View/includes/nav.php";
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
                    Dashboard 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link h-100"  href="students.php">
                    <i class="bi bi-house-fill me-2"></i>
                    Students 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bulletin.php">
                    <i class="bi bi-postcard me-2"></i>
                    Bulletin 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="about.php">
                    <i class="bi bi-info-circle me-2"></i>
                    About 
                </a>
            </li>
		</nav>

        <section class="d-flex flex-row p-3 bg-white w-100" style="height:755px"> <!-- Main Content Wrapper -->
            <aside class="col-4 h-100 d-flex flex-column justify-content-center">
            <div class="h-100 website-showcase ms-5"></div>
            </aside>
            <article class="col-8 h-100 d-flex flex-column align-items-center justify-content-center">
                <div class="giant-text-headings w-100 mb-3 text-center">Easily track student’s academic performance</div>
                <div class="w-75 text-wrap lh-lg" style="text-align:justify">Tracking and monitoring current student performance are essential 
                    in giving information that can be used to help students make decisions that will
                    improve their progress. This would not only allow students to take ownership of 
                    their learning but would also allow them to track their growth over time.</div>
            </article>
        </section>
        <section class="d-flex flex-row w-100" style="height:755px; background-color: #A87676"> <!-- Main Content Wrapper -->
            <article class="col-7 h-100 d-flex flex-column align-items-center justify-content-center text-light">
                <div class="giant-text-headings w-100 mb-5 text-center">
                    <img src="../View/assets/icons/target icon.png" alt="target-icon">
                    I-Track in Mobile</div>
                <div class="w-75 text-wrap lh-lg" style="text-align:justify"> A Student Progress Tracker is built for students to track their academic performance, well-being and health index by utilizing in-app productivity features; self-tracking in terms of performance, psychological factors - promoting student well-being, and health index - determining the factors that may affect the student’s performance. Also, productivity mobile application include features like To Do, Calendar and Announcement to be updated and be reminded of the activities to be accomplished.
</div>
            </article>
            <aside class="col-5 h-100 d-flex flex-column justify-content-center">
                <div class="h-100 i-track-mobile-showcase"></div>
            </aside>
        </section>
       
        <section class="bg-white pt-5 pb-5 shadow-sm"><!-- Main Content Wrapper -->
  <div class="container">
    <div class="row pt-0 pb-5">
      <div class="col-12">
        <h1 class="text-center text-danger border-bottom pb-3 mb-4">What We Offer</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-6 mb-3 d-flex align-items-stretch">
        <div class="card border-0 mx-auto" style="width: 100%;">
          <img src="../View/assets/icons/no_of_students-icon.png" class="card-img-top img-fluid m-3" alt="No of Students" style="width:30%; height:auto;"> 
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-danger fs-3">Academic Progress Tracker</h5>
            <p class="card-text mb-4" style="text-align:justify">Record students scores and grades for the current semester in the productivity app, where graphs regarding the received data will be shown both on the web and mobile, together with the expected general weighted average.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 mb-3 d-flex align-items-stretch">
        <div class="card border-0 mx-auto" style="width: 90%; background-color:#DC3545">
          <img src="../View/assets/icons/psy.png" class="card-img-top img-fluid m-3" alt="Card Psychology" style="width:30%; height:auto;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-black fs-3">Well-being Tracker</h5>
            <p class="card-text text-white mb-4" style="text-align:justify">Mobile application's feature concerning the students' well-being, where students will be given set of questions with a scale of 1-5 to answer. This will help promote the student’s well being and let them be aware of their psychological status.</p>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6 mb-3 d-flex align-items-stretch">
      <div class="card border-0 mx-auto" style="width: 90%;">
           <img src="../View/assets/icons/medic-icon.png" class="card-img-top img-fluid m-3" alt="Card Image" style="width:30%; height:auto;" >
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-danger fs-3">Health Index</h5>
            <p class="card-text mb-4" style="text-align:justify">Health status is one of the priorities of this project - ITRACK. Students will be asked some health-related questions in the mobile application, results will reflect on the web. A feature to determine the factors that possibly affect the student’s performance.
</p>
          </div>
        </div>
      </div>
    </div>
   <img src="..//View/assets/images/vector.png" alt="vector-png"
  </div>
</section>
       
        <section class="d-flex flex-column flex-md-row w-100" style="height:755px; background-color: #A87676;"> <!-- Main Content Wrapper -->
        <article class="col-md-8 h-100 d-flex flex-column px-3 align-items-center justify-content-center text-light">
            <div class="fs-1 fw-bolder w-100 mb-5 text-center ">
            I-Track Project Team
            </div>
            <div class="border-none rounded text-wrap lh-lg p-2 h-75 d-flex flex-column justify-content-evenly" style="background-color:#A87676" >
            <div class="row justify-content-evenly">
                <div class="card border shadow align-items-center py-1 col-md-4 mb-3 mb-md-0" style="background-color:#D4D4D4">
                <img src="../View/assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px;">
                <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                    <p class="fw-semibold m-0">Tecson, Kairus Noah E.</p>
                    <p class="fw-light m-0">Project Leader</p>
                </div>
                </div>
                <div class="card border shadow align-items-center py-1 col-md-4 mb-3 mb-md-0" style="background-color:#D4D4D4">
                <img src="../View/assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                    <p class="fw-semibold m-0">Malibiran, Darren</p>
                    <p class="fw-light m-0">Programmer</p>
                </div>
                </div>
                <div class="card border shadow align-items-center py-1 col-md-4 mb-3 mb-md-0" style="background-color:#D4D4D4">
                <img src="../View/assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                    <p class="fw-semibold m-0">Sealquil, Nino</p>
                    <p class="fw-lighter m-0">Analyst</p>
                </div>
                </div>
            </div>
            <div class="row justify-content-evenly">
                <div class="card border shadow align-items-center py-1 col-md-4 mb-3 mb-md-0" style="background-color:#D4D4D4">
                <img src="../View/assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                    <p class="fw-semibold m-0">Laqui, Jamie Rose</p>
                    <p class="fw-light m-0">Designer</p>
                </div>
                </div>
                <div class="card border shadow align-items-center py-1 col-md-4 mb-3 mb-md-0" style="background-color:#D4D4D4">
                <img src="../View/assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                    <p class="fw-semibold m-0">Militante, Zyrah</p>
                    <p class="fw-lighter m-0">Designer</p>
                </div>
                </div>
                <div class="card border shadow align-items-center py-1 col-md-4 mb-3 mb-md-0 " style="background-color:#D4D4D4">
                <img src="../View/assets/icons/user-icon-placeholder.png" class="card-img-top" alt="card-img-top" style="max-width:100px">
                <div class="card-body text-center d-flex flex-column justify-content-center my-1 p-1 h-100 w-100" style="background-color:#DC3545; border-radius:20px">
                    <p class="fw-semibold m-0">Valdez, Dominic Miko</p>
                    <p class="fw-lighter m-0">Documentation</p>
                </div>
                </div>
                    </div>
                </div>
            </article>
            
            <aside class="col-md-4 h-100 d-flex flex-column justify-content-center">
                <div class="h-25 i-track-icon-rounded mb-4"></div>
                <div class="h-25 batstateu-icon"></div>
            </aside>
    
            
        </section>

    </div>
</div>
<script type="text/javascript" src="../View/assets/js/eventHandles.js" async></script>
<script type="module" src="../Controller/otherMainController.js" async></script>
