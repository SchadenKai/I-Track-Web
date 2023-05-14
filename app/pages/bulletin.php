<?php 
	require "../Model/modules/validation.php";
    include "../View/includes/nav.php";
    include "../View/includes/filterOption.html";
    require "../Model/configs/psql_conn.php";
?>

<!-- Change the Document Title-->
<script>
document.title = "I-Track | Bulletin"
</script>

<!-- Content of the Page -->
<!-- Content of the Page Wrapper-->
<div class="d-flex h-auto  w-auto justify-content-center pt-5 bg-secondary">

	<!-- Content Container -->
    <div class="shadow border w-100 mx-5 mb-5 glassmorphism-1" style="max-width:1140px;"> 
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
                <a class="nav-link active" href="bulletin.php">
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
        <section class="container-fluid px-5 pt-3"> 
            <div class="d-flex justify-content-between text-danger">
                <h3 class="d-block ">For Posting</h3>
                <h3 class="d-block ">CLASS 1 AY 2022-2023</h3>
            </div>
            
            <p class="text-secondary fs-6">
                <i class="bi bi-info-circle me-2"></i>
                Click the “Filter Options” button to change the class
            </p>
           
            <button class="btn btn-outline-dark rounded-pill mt-3" data-bs-toggle="modal" data-bs-target="#filterOptions">
                <i class="bi bi-filter"></i>
                Filter Options
            </button> 
        </section>

        <section class="d-flex flex-column container-fluid align-items-center"> <!-- Fill width; center content -->
            <!-- Class List Container -->
            <form class="d-flex flex-column border rounded h-auto m-3 py-3 px-5 text-center " style="width: 85%; background-color: rgb(185, 185, 185)" method="post" action=""> 
                <div class="form-floating">
                    <textarea class="form-control shadow" name="announcement" placeholder="Leave a comment here" id="floatingTextarea" style="height: 250px"></textarea>
                    <label for="floatingTextarea">Announce something...</label>
                </div>
                <button type="submit" class="btn btn-success mt-3 align-self-end rounded-pill" style="min-width: 150px;">Upload</button>
            </form>
        </section>
		
    </div>
</div>
<script src="../View/assets/js/eventHandles.js" type="text/javascript" async></script>
<script type="module" src="../Controller/otherMainController.js" async></script>
<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the announcement from the form data
    $announcement = $_POST['announcement'];

    // Fetch classes of the currently logged in admin
    $sql = "select class_id from class where admin_id = $1;";
    $result = pg_prepare($db, "fetch_class_students_query", $sql);
    $result = pg_execute($db, "fetch_class_students_query", array($_SESSION['userlogin']['id']));
    $classes_of_admin = pg_fetch_all($result);    
    for ($i = 0; $i < count($classes_of_admin); $i++){
        // Insert the announcement into the database
        
        $result = pg_query_params($db, "INSERT INTO bulletin(content, attachment_url, time_created, class_id) VALUES($1, $2, NOW(), $3);", array($announcement, '', $classes_of_admin[$i]['class_id']));        
    }

    // Clear the textarea
    echo "<script>document.getElementById('floatingTextarea').value = '';</script>";
}
?>