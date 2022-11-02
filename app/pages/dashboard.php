<?php 
	include "../includes/validation.php"
?>

<!-- Change the Document Title-->
<script>
document.title = "I-Track | Dashboard"
</script>

<div class="d-flex container flex-column align-items-center w-75 my-5 py-3 border rounded">
	<!-- Personal Information Card -->
	<section class="card w-75 my-4 border">
		<div class="card-header text-center"> 
			<i class="bi bi-person me-3"></i>	
			Personal Information 
		</div>
		<!-- Card content Personal Information | Get Access Point -->
		<div class="card-body px-3">
			<div class="row px-3">
				<label for="studentName" class="form-label p-0">Name</label>
				<input type="text" class="form-control" id="studentName" value="Cardo A. Dalisay" readonly>
			</div>
			<div class="d-flex container-fluid align-items-center justify-content-between px-3"> <!-- Row Container -->
				<div class="w-30 my-0">
					<label for="studentSection" class="form-label p-0">Section</label>
					<input type="text" class="form-control" id="studentSection" value="CS 3101" readonly>
				</div>
				<div class="w-30 my-0">
					<label for="studentAge" class="form-label p-0">Age</label>
					<input type="text" class="form-control" id="studentAge" value="20" readonly>
				</div>
				<div class="w-30 my-0">
					<label for="studentStatus" class="form-label p-0">Status</label>
					<input type="text" class="form-control" id="studentStatus" value="Single" readonly>
				</div>	
			</div>
			<div class="row px-3">
				<label for="studentAddress" class="form-label p-0">Address</label>
				<input type="text" class="form-control" id="studentAddress" value="Lumanglipa, Mataasnakahoy, Batangas" readonly>
			</div>
			<div class="row px-3">
				<label for="studentAvailability" class="form-label p-0">Device / Internet Connection</label>
				<input type="text" class="form-control" id="studentAvailability" value="Smartphone, Laptop, Mobile Data(Limited)" readonly>
			</div>
			
		</div>
	</section>



	<a href="https://cumul.io/sample-integration"></a>
	<iframe
        width="960"
        height="720"
        src="https://datastudio.google.com/embed/reporting/1Lkg3k30dv3POg80rm3sQk06BVi9hqVES/page/1M">
    </iframe>
	
	<!--  Temp Burtton; Assign JS Function (redirecting to page) -->
	<button class="btn btn-success align-self-end m-5" onclick="window.location='/index.php'">Back</button>
</div>

