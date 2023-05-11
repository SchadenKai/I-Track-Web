<?php 
	require "../Model/modules/validation.php";
    include "../View/includes/nav.php";
    include "../View/includes/dashboard.html";
    include "../View/includes/filterOption.html";
    include "../View/includes/course_filterOption.html";
    include "../View/includes/year_filterOption.html"
?>

 <!-- Change the Document Title-->
<script>
    document.title = "I-Track | Students";
</script>

<!-- Content of the Page Wrapper-->
<div class="d-flex w-100 justify-content-center pt-5 bg-secondary" style="min-height: 100%;">
    
	<!-- Content Container -->
    <div class="shadow border w-100 mb-5 mx-5 bg-white" style="max-width:1140px;"> 

		<!-- I-track Nav -->
        <nav class="nav nav-pills nav-fill custom-navbar">
            <li class="nav-item">
                <a class="nav-link custom-navbar h-100"  href="../index.php">
                    <i class="bi bi-house-fill me-2"></i>
                    Dashboard 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-navbar active"  href="students.php">
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
                <a class="nav-link" href="about.php">
                    <i class="bi bi-info-circle me-2"></i>
                    About 
                </a>
            </li>
		</nav>
        
        <!-- Top Section Functionalities-->
		<section class="container-fluid p-3 px-5"> 
			<h3 class="d-block ">CLASS 1 AY 2022-2023</h3>
			<p class="text-secondary fs-6">
				<i class="bi bi-info-circle me-2"></i>
				Click the “Filter Options” button to change the class
			</p>
			<div class="d-flex w-100 justify-content-between mt-3">
                <!-- Filter Button; create pop up menu-->
				<button class="btn btn-outline-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#filterOptions">
                    <i class="bi bi-filter"></i>
                    Filter Options
                </button> 
                <!-- Search functionality; search through the DB -->
				<div class="input-group" style="width: 300px;">
					<input type="text" class="form-control" placeholder="Search Students" id="search-box">
					<span class="input-group-text" id="input-group-right-example">
						<i class="bi bi-search"></i>
					</span>
				</div>
			</div>
        </section>

        <section class="d-flex flex-column container-fluid align-items-center"> <!-- Fill width; center content -->
            <!-- Class List Container -->
            <div class="d-flex flex-column border shadow h-auto my-5 text-center" style="min-width: 85%;"> 
                <!-- table headings -->
                <a>
                   <div class="row border-0 bg-white fw-bold text-white">
                    <div class="col-3 border py-3" style="background-color: #DC3545;">Sr-Code</div>
                    <div class="col-6 border py-3" style="background-color: #DC3545;">Full Name</div>
                    <div class="col-3 border py-3" style="background-color: #DC3545;">Year Started</div>
                </div> 
                </a>
                <div id="class_list_table"></div>
                <!-- student row html template -->
                <script id="student_template" type="text/x-handlebars-template">
                    {{#each this}}
                    <a href="#" data-bs-target="#dashboard" data-bs-toggle="modal"> 
                        <div class="row border-0 bg-white cstm-hover">
                            <div class="col-3 border py-2">{{this.sr_code}}</div>
                            <div class="col-6 border py-2">{{this.name}}</div>
                            <div class="col-3 border py-2">{{this.year_started}}</div>
                        </div>
                    </a>
                    {{/each}}
                </script>

        </section>
    </div>
</div>
<script type="module" src="../Controller/studentsMainController.js"></script>
<script type="text/javascript" src="../View/assets/js/eventHandles.js"></script>