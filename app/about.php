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
document.title = "I-Track | About"
</script>

<!-- Content of the Page -->
<h1 style="text-align: center;">This is the About Page</h1>