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
            <div class="w-100 d-flex justify-content-evenly align-items-center my-3" style="min-height: 90px">
                <!-- Student Count -->
                <div class="grid h-100 cstm-card-2 d-flex align-items-center justify-content-evenly bg-white py-1 px-3" style="width: 25%; min-height:122px">
                    <img src="../View/assets/icons/no_of_students-icon.png" style="max-width:85px">
                    <div class="d-flex flex-column h-75 w-50 justify-content-end">
                        <p class="m-0">Student Count</p>
                        <p class="fs-3 fw-semibold" id="student-count">150</p>
                    </div>
                </div>
                <!-- Health Index Score -->
                <div class="cstm-card-2 d-flex align-items-center justify-content-evenly bg-white py-1 px-3" style="width: 25%; min-height:122px">
                    <img src="../View/assets/icons/medic-icon.png" style="max-width:85px">
                    <div class="d-flex flex-column h-75 w-50 justify-content-center">
                        <p class="m-0 text-wrap">Health Index Score</p>
                        <p class="fs-3 fw-semibold text-success" id="student-count">95.5%</p>
                    </div>
                </div>
                <!-- Summary Grade -->
                <div class="h-100 cstm-card-2 d-flex align-items-center justify-content-evenly bg-white py-1 px-3" style="width: 25%; min-height:122px">
                    <img src="../View/assets/icons/grade-icon.png" style="max-width:85px">
                    <div class="d-flex flex-column h-75 w-50 justify-content-center">
                        <p class="m-0 text-wrap">Overall Student's Summary Grade</p>
                        <p class="fs-3 fw-semibold text-success" id="student-count">80.5%</p>
                    </div>
                </div>
            </div>
            <h2 class="fw-semibold mb-3 mt-5">Health Reports</h2>
            <!--Health reports section -->
            <div class="w-100 d-flex flex-column justify-content-evenly mb-5" style="height:400px">
                <div class="w-100 h-100 d-flex">
                    <!-- Graph Wrapper -->
                    <div class="h-100 border rounded" style="width:60%;">
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
                        <div class="tab-content h-100">
                            <div class="tab-pane active p-4 bg-secondary h-100" id="q1" role="tabpanel" aria-labelledby="home-tab">
                                Graph 1
                            </div>
                            <div class="tab-pane p-4 bg-info h-100" id="q2" role="tabpanel" aria-labelledby="profile-tab">
                                Graph 2
                            </div>
                            <div class="tab-pane p-4 bg-success h-100" id="q3" role="tabpanel" aria-labelledby="messages-tab">
                                Graph 3
                            </div>
                            <div class="tab-pane p-4 bg-warning h-100" id="q4" role="tabpanel" aria-labelledby="messages-tab">
                                Graph 4
                            </div>
                        </div>
                    </div>
                    <div class="cstm-card-2 d-flex align-items-center justify-content-evenly bg-white rounded py-1 px-3 ms-5" style="width: 25%; max-height:122px">
                        <img src="../View/assets/icons/attendance-icon.png" class="h-75">
                        <div class="d-flex flex-column h-75 w-50 justify-content-center">
                            <p class="m-0 text-wrap">Number of Present Today</p>
                            <p class="fs-3 fw-semibold text-success" id="student-count">120</p>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="fw-semibold mb-3 mt-5">Top Performing Students</h2>
            <div class="row row-cols-2 w-100" id="top_students_grid" style="height:400px"> 
            </div>
            <script id="top_students_template" type="text/x-handlebars-template">
                {{#each top_students}}
                <div class="border col px-4 py-0 d-flex align-items-center justify-content-between">
                    <img src="{{image_html}}" alt="user profile" style="width: 60px">
                    <p id="student_name">{{student_name}}</p>
                    <p id="sr_code">{{sr_code}}</p>
                    <p id="class">{{class}}</p>
                    <p id="gender">{{gender}}</p>  
                </div>
                {{/each}}
            </script>


        </section> <!-- Content -->
		
    </div> <!-- Wrapper -->
</div> <!-- Page -->
<script type="module" src="Controller/dashboardMainController.js"></script>
<script type="text/javascript" src="../View/assets/js/eventHandles.js"></script>