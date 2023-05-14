<?php
    require "Model/modules/validation.php";
    include "View/includes/nav.php";
?>


<!-- Change the Document Title-->
<script>
document.title = "I-Track | Dashboard"
</script>


<!-- Content of the Page -->
<!-- Content of the Page Wrapper-->
<div class="d-flex w-100  justify-content-center pt-5 bg-secondary">
    <!-- Content Container -->
    <div class="container shadow border glassmorphism-1 p-0">
        <!-- I-track Nav -->
        <nav class="nav nav-pills nav-fill custom-navbar">
            <li class="nav-item">
                <a class="nav-link h-100 active"  href="index.php">
                    <i class="bi bi-house-fill me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="pages/students.php">
                    <i class="bi bi-house-fill me-2"></i>
                    Students
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/bulletin.php">
                    <i class="bi bi-postcard me-2"></i>
                    Bulletin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/about.php">
                    <i class="bi bi-info-circle me-2"></i>
                    About
                </a>
            </li>
        </nav>


        <section class="d-flex flex-column p-5 bg-white w-100" style="height:auto"> <!-- Main Content Wrapper -->
            <h2 class="fw-semibold mb-3">Dashboard</h2>
            <!-- Dashboard Section -->
            <div class="w-100 d-flex justify-content-evenly align-items-center mt-3 mb-5" style="min-height: 90px">
                <!-- Student Count -->
                <div class="grid h-100 cstm-card-2 d-flex align-items-center justify-content-evenly bg-white py-1 px-3" style="width: 25%; min-height:122px">
                    <img src="../View/assets/icons/no_of_students-icon.png" style="max-width:85px">
                    <div class="d-flex flex-column h-75 w-50 justify-content-end">
                        <p class="m-0">Student Count</p>
                        <p class="fs-3 fw-semibold" id="student-count"></p>
                    </div>
                </div>
                <!-- Health Index Score -->
                <div class="cstm-card-2 d-flex align-items-center justify-content-evenly bg-white py-1 px-3" style="width: 25%; min-height:122px">
                    <img src="../View/assets/icons/medic-icon.png" style="max-width:85px">
                    <div class="d-flex flex-column h-75 w-50 justify-content-center">
                        <p class="m-0 text-wrap">Health Index Score</p>
                        <p class="fs-3 fw-semibold" id="health-index-score"></p>
                    </div>
                </div>
                <!-- Summary Grade -->
                <div class="h-100 cstm-card-2 d-flex align-items-center justify-content-evenly bg-white py-1 px-3" style="width: 25%; min-height:122px">
                    <img src="../View/assets/icons/grade-icon.png" style="max-width:85px">
                    <div class="d-flex flex-column h-75 w-50 justify-content-center">
                        <p class="m-0 text-wrap">Overall Student's Summary Grade</p>
                        <p class="fs-3 fw-semibold" id="overall-student-grade"></p>
                    </div>
                </div>
            </div>
            <h2 class="fw-semibold mb-3 mt-5">Overall School Health Reports</h2>
            <!--Health reports section -->
            <div class="w-100 d-flex flex-column justify-content-evenly mb-5" style="height:500px">
                <!-- Graph Wrapper -->
                <div class="h-100">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs custom-navbar" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="q1-tab" data-bs-toggle="tab" data-bs-target="#q1" type="button" role="tab" aria-controls="home" aria-selected="true">Question 1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="q2-tab" data-bs-toggle="tab" data-bs-target="#q2" type="button" role="tab" aria-controls="profile" aria-selected="false">Question 2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="q3-tab" data-bs-toggle="tab" data-bs-target="#q3" type="button" role="tab" aria-controls="messages" aria-selected="false">Question 3</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="q4-tab" data-bs-toggle="tab" data-bs-target="#q4" type="button" role="tab" aria-controls="messages" aria-selected="false">Question 4</button>
                    </li>
                    </ul>
                   
                    <!-- Tab panes -->
                    <div class="tab-content border rounded h-100">
                        <div class="tab-pane active p-4 bg-white h-100 grid" id="q1" role="tabpanel" aria-labelledby="home-tab" style="background-color:grey !important">
                            <div class="d-flex w-100 h-100 align-items-center">
                                <canvas id="chronicChart" class="shadow m-3 p-2 border rounded bg-white h-100 w-50"></canvas>
                                <div class="d-flex flex-column h-100 w-75">
                                    <div class="d-flex text-white bg-info h-50 w-100 justify-content-evenly align-items-center border rounded my-3 px-5 shadow">
                                        <p id="nochronic-count" class="fs-1 "><strong>100</strong></p>
                                        <p class="text-wrap fs-4  text-center">without Chronic Disease</p>
                                        <img src="./View/assets/icons/like-icon.png" style="width:100px" class="">
                                    </div>    
                                    <div class="d-flex text-white bg-danger h-50 w-100 justify-content-evenly align-items-center border rounded my-3 px-5 shadow">
                                        <p id="chronic-count" class="fs-1 "><strong>100</strong></p>
                                        <p class="text-wrap fs-4  text-center">with Chronic Disease</p>
                                        <img src="./View/assets/icons/dislike-icon.png" style="width:100px" class="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-4 bg-white h-100 grid" id="q2" role="tabpanel" aria-labelledby="home-tab" style="background-color:grey !important">
                            <div class="d-flex w-100 h-100 align-items-center">
                                <canvas id="illChart" class="shadow m-3 p-2 border rounded bg-white  h-100 w-50"></canvas>
                                <div class="d-flex flex-column h-100 w-75">
                                    <div class="d-flex text-white bg-info h-50 w-100 justify-content-evenly align-items-center border rounded my-3 px-5 shadow">
                                        <p id="noill-count" class="fs-1 "><strong>100</strong></p>
                                        <p class="text-wrap fs-4  text-center">currently Well</p>
                                        <img src="./View/assets/icons/like-icon.png" style="width:100px" class="">
                                    </div>    
                                    <div class="d-flex text-white bg-danger h-50 w-100 justify-content-evenly align-items-center border rounded my-3 px-5 shadow">
                                        <p id="ill-count" class="fs-1 "><strong>100</strong></p>
                                        <p class="text-wrap fs-4  text-center">currenly Ill</p>
                                        <img src="./View/assets/icons/dislike-icon.png" style="width:100px" class="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-4 bg-white h-100 grid" id="q3" role="tabpanel" aria-labelledby="home-tab" style="background-color:grey !important">
                            <div class="d-flex w-100 h-100 align-items-center">
                                <canvas id="admittedChart" class="shadow m-3 p-2 border rounded bg-white  h-100 w-50"></canvas>
                                <div class="d-flex flex-column h-100 w-75">
                                <div class="d-flex text-white bg-info h-50 w-100 justify-content-evenly align-items-center border rounded my-3 px-5 shadow">
                                        <p id="notadmitted-count" class="fs-1 "><strong>100</strong></p>
                                        <p class="text-wrap fs-4  text-center">not admitted to the Hospital</p>
                                        <img src="./View/assets/icons/like-icon.png" style="width:100px" class="">
                                    </div>    
                                <div class="d-flex text-white bg-danger h-50 w-100 justify-content-evenly align-items-center border rounded my-3 px-5 shadow">
                                        <p id="admitted-count" class="fs-1 "><strong>100</strong></p>
                                        <p class="text-wrap fs-4  text-center">admitted to the Hospital</p>
                                        <img src="./View/assets/icons/dislike-icon.png" style="width:100px" class="">
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-4 bg-white h-100 grid" id="q4" role="tabpanel" aria-labelledby="home-tab" style="background-color:grey !important">
                            <div class="d-flex w-100 h-100 align-items-center">
                                <canvas id="injuredChart" class="shadow m-3 p-2 border rounded bg-white  h-100 w-50"></canvas>
                                <div class="d-flex flex-column h-100 w-75">
                                    <div class="d-flex text-white bg-info h-50 w-100 justify-content-evenly align-items-center border rounded my-3 px-5 shadow">
                                        <p id="notinjured-count" class="fs-1 "><strong>100</strong></p>
                                        <p class="text-wrap fs-4  text-center">not Injured</p>
                                        <img src="./View/assets/icons/like-icon.png" style="width:100px" class="">
                                    </div>
                                    <div class="d-flex text-white bg-danger h-50 w-100 justify-content-evenly align-items-center border rounded my-3 px-5 shadow">
                                        <p id="injured-count" class="fs-1 "><strong>100</strong></p>
                                        <p class="text-wrap fs-4  text-center">Injured</p>
                                        <img src="./View/assets/icons/dislike-icon.png" style="width:100px" class="">
                                    </div>            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="fw-semibold mb-3 mt-5">Top Performing Students</h2>
            <div class="row row-cols-2 w-100" id="top_students_grid" style="height:400px">
            </div>
            <script id="top_students_template" type="text/x-handlebars-template">
                {{#each this}}
                <div class="border col px-4 py-0 d-flex align-items-center justify-content-between">
                    <img src="View/assets/icons/user-icon-placeholder.png" alt="user profile" style="width: 60px">
                    <p id="student_name">{{this.name}}</p>
                    <p id="sr_code">{{this.sr_code}}</p>
                    <p id="gender">{{this.gender}}</p>  
                </div>
                {{/each}}
            </script>




        </section> <!-- Content -->
       
    </div> <!-- Wrapper -->
</div> <!-- Page -->
<script type="module" src="Controller/dashboardMainController.js"></script>
<script type="text/javascript" src="../View/assets/js/eventHandles.js"></script>

