<?php 

session_start();
	// Is the user not logged in and tried to access this page? Then return back to login
	if(!isset($_SESSION['userlogin'])){
		header("Location: ../../login.php");
	}

	// If the user clicked the logout button (see nav.html), return to login page.
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		unlink($_SERVER['DOCUMENT_ROOT'] . '/Model/modules/app_data.json');
		header("Location: ../../login.php");		
	}
?>
