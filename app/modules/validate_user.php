<?php
session_start();
// Import the PostgreSQL credential and connection variables from psql_conn
require_once('configs/psql_conn.php');

// Login Credentials
$usr_email = $_POST['email'];
$usr_pw = $_POST['password'];  


// Check the existence of user login credentials in the database
$sql = "SELECT * FROM users WHERE email = $1 AND password = $2 LIMIT 1;";
$result = pg_prepare($db, "check_query", $sql);
$result = pg_execute($db, "check_query", array($usr_email, $usr_pw));

$user = pg_fetch_assoc($result);        
if (pg_num_rows($result) == 1){
    // If the user is in the database, proceed to homepage
    $_SESSION['userlogin'] = $user;
    header("location: ../index.php");
} else {
    // Else, return to login with an Error message
    $_SESSION['error'] = '&#128680; Incorrect Email or Password <br>';		
    header("location: ../login.php");
}
