<?php 
	require "includes/validation.php";
?>

 <!-- Change the Document Title-->
<script>
document.title = "I-Track | Home"
</script>

<!-- Content of the Page Wrapper-->
<div class="d-flex w-100 h-100 justify-content-center pt-5">
	<!-- Content Container -->
    <div class="shadow border w-100 h-75 mx-5"> 
		<!-- I-track Nav -->
        <nav class="nav nav-pills nav-fill custom-navbar">
            <li class="nav-item">
                <a class="nav-link custom-navbar active h-100"  href="../index.php">
                    <i class="bi bi-house-fill me-2"></i>
                    Home 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="bi bi-postcard me-2"></i>
                    Bulletin 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="bi bi-info-circle me-2"></i>
                    About 
                </a>
            </li>
		</nav>
		<div class="container-fluid p-3 ps-5"> <!-- Main Content Wrapper -->
			<h3 class="d-block ">CLASS 1 AY 2022-2023</h3>
			<p class="text-secondary fs-6">
				<i class="bi bi-info-circle me-2"></i>
				Click the “Filter Options” button to change the class
			</p>
			<div class="d-flex w-100 justify-content-between mt-3">
				<button class="btn btn-outline-dark">Filter Options</button>
				<div class="input-group" style="width: 300px;">
					<input type="text" class="form-control" placeholder="Search Students" aria-label="student-name" aria-describedby="input-group-right">
					<span class="input-group-text" id="input-group-right-example">
						<i class="bi bi-search"></i>
					</span>
				</div>
			</div>
		</div>
		


    </div>
</div>
