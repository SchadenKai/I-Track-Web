<?php
session_start();
require_once('psql_conn.php');

// Login Credentials
$usr_email = $_POST['email'];
$usr_pw = $_POST['password'];  


// Check the existence of user login credentials in the database
$sql = "SELECT * FROM users WHERE email = $1 AND password = $2 LIMIT 1;";
$result = pg_prepare($db, "check_query", $sql);
$result = pg_execute($db, "check_query", array($usr_email, $usr_pw));

$user = pg_fetch_assoc($result);        
if (pg_numrows($result) == 1){
    $_SESSION['userlogin'] = $user;
    header("location: index.php");
} else {
    $_SESSION['error'] = '&#128680; Incorrect Email or Password <br>';		
    header("location: login.php");
}
