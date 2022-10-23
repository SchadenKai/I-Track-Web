<?php 

session_start();
	// Is the user not logged in and tried to access this page? Then return back to login
	if(!isset($_SESSION['userlogin'])){
		header("Location: login.php");
	}

	// If the user clicked the logout button (see nav.html), return to login page.
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
	}

	// Include the Navigation Bar header. 
	include "utils/nav.html"

?>

<!-- Change the Document Title-->
<script>
document.title = "I-Track | Dashboard"
</script>
<h1 style="text-align: center;">This is a sample dashboard</h1>
<iframe style="position: absolute; width:100%; height: 100%; border: 0; margin:2px;" src="https://datastudio.google.com/embed/reporting/1Lkg3k30dv3POg80rm3sQk06BVi9hqVES/page/1M"></iframe>

