<?php 
	require "includes/validation.php";
    include "includes/nav.php";
    include "includes/dashboard.php";
    include "includes/filterOption.php";
?>

 <!-- Change the Document Title-->
<script>
    document.title = "I-Track | Home";
</script>

<!-- Content of the Page Wrapper-->
<div class="d-flex w-100 justify-content-center pt-5" style="min-height: 100%;">
    
	<!-- Content Container -->
    <div class="shadow border w-100 mb-5 mx-5 bg-white" style="max-width:1317px;"> 

		<!-- I-track Nav -->
        <nav class="nav nav-pills nav-fill custom-navbar">
            <li class="nav-item">
                <a class="nav-link custom-navbar active h-100"  href="../index.php">
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
                <a class="nav-link" href="/pages/about.php">
                    <i class="bi bi-info-circle me-2"></i>
                    About 
                </a>
            </li>
		</nav>
        
        <!-- Top Section Functionalities-->
		<section class="container-fluid p-3 ps-5"> 
			<h3 class="d-block ">CLASS 1 AY 2022-2023</h3>
			<p class="text-secondary fs-6">
				<i class="bi bi-info-circle me-2"></i>
				Click the “Filter Options” button to change the class
			</p>
			<div class="d-flex w-100 justify-content-between mt-3">
                <!-- Filter Button; create pop up menu-->
				<button class="btn btn-outline-dark rounded-pill" onclick="popup('filter')">
                    <i class="bi bi-filter"></i>
                    Filter Options
                </button> 
                <!-- Search functionality; search through the DB -->
				<div class="input-group" style="width: 300px;">
					<input type="text" class="form-control" placeholder="Search Students" aria-label="student-name" aria-describedby="input-group-right">
					<span class="input-group-text" id="input-group-right-example">
						<i class="bi bi-search"></i>
					</span>
				</div>
			</div>
        </section>

        <section class="d-flex flex-column container-fluid align-items-center"> <!-- Fill width; center content -->
            <!-- Class List Container -->
            <div class="d-flex flex-column border shadow w-75 h-auto my-5 text-center"> 
                <!-- table headings -->
                <div class="row border-0 bg-white fw-bold text-white">
                    <div class="col border py-3" style="background-color: #133379;">No.</div>
                    <div class="col border py-3" style="background-color: #133379;">First Name</div>
                    <div class="col border py-3" style="background-color: #133379;">Middle Initial</div>
                    <div class="col border py-3" style="background-color: #133379;">Last Name</div>
                    <div class="col border py-3" style="background-color: #133379;">Status</div>
                </div>
                <!-- Row Header -->
                <!-- future modify - dynamic based on the filtered db -->
                <a href="#" onclick="popup('dashboard')"> 
                    <div class="row border-0 bg-white">
                        <div class="col border">1</div>
                        <div class="col border">Cardo</div>
                        <div class="col border">A.</div>
                        <div class="col border">Dalisay</div>
                        <div class="col border">Regular</div>
                    </div>
                </a>
                <a href="#" onclick="popup('dashboard')"> 
                    <div class="row border-0 bg-white">
                        <div class="col border">1</div>
                        <div class="col border">Cardo</div>
                        <div class="col border">A.</div>
                        <div class="col border">Dalisay</div>
                        <div class="col border">Regular</div>
                    </div>
                </a>
                <a href="#" onclick="popup('dashboard')"> 
                    <div class="row border-0 bg-white">
                        <div class="col border">1</div>
                        <div class="col border">Cardo</div>
                        <div class="col border">A.</div>
                        <div class="col border">Dalisay</div>
                        <div class="col border">Regular</div>
                    </div>
                </a>
                <!-- JS Add element this format to add students -->
                <!-- Retrieve data from Database -->
        </section>
    </div>
</div>

<script type="text/javascript" src="/assets/js/login_eventHandles.js" async></script>