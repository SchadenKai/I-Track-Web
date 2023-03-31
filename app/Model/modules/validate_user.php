<?php
session_start();
// Import the PostgreSQL credential and connection variables from psql_conn
require_once('../configs/psql_conn.php');

// Login Credentials
$usr_email = $_POST['email'];
$usr_pw = $_POST['password'];  


// Check the existence of user login credentials in the database
$sql = "SELECT * FROM admin WHERE email = $1 AND password = $2 LIMIT 1;";
$result = pg_prepare($db, "check_query", $sql);
$result = pg_execute($db, "check_query", array($usr_email, $usr_pw));

// If the user is in the database, proceed to homepage
if (pg_num_rows($result) == 1){    
    # Enclose whole block below uuntil header to if statement
    # if read(app_config.json)["id"] != $user["id"]:
    ## Add user's complete name to session variables
    $user = pg_fetch_assoc($result);
    $user['user_name'] = $user['first_name'] . " " . $user['last_name'];    

    # Put content to user's info
    ## Fetch all the students of that user (admin)
    $sql = "SELECT students FROM class WHERE admin_id = $1;";
    $result = pg_prepare($db, "fetch_class_students_query", $sql);
    $result = pg_execute($db, "fetch_class_students_query", array($user["id"]));
    $students_of_admin = pg_fetch_all($result);
    $arr_students_of_admin = array();
    for ($i = 0; $i < count($students_of_admin); $i++){
        $arr_students_of_admin = array_merge($arr_students_of_admin, explode(", ", $students_of_admin[$i]["students"]));
    }

    ## Fetch students handled by the admin
    $sql = "SELECT * from student WHERE sr_code=ANY($1)";
    $arr_students_of_admin = array_unique($arr_students_of_admin, SORT_REGULAR);
    $elements = "{'" . implode(",", $arr_students_of_admin)  . "'}";        

    # Get the student details from the list above
    $user["student_count"] = count($arr_students_of_admin);
    $result = pg_prepare($db, "fetch_student_details", $sql);
    $result = pg_execute($db, "fetch_student_details", array($elements));
    $student_details = pg_fetch_all($result);
    $user["students"] = $student_details;
    
    ## Average Health Index score
    $sql = "SELECT AVG(health_condition) from health_index WHERE student_id=ANY($1)";    
    $result = pg_prepare($db, "fetch_health_score", $sql);
    $result = pg_execute($db, "fetch_health_score", array($elements));
    $health_score = pg_fetch_all($result);
    $user["avg_health_score"] = $health_score;

    ## Fetch health index data of the students list above
    $sql = "SELECT * from health_index WHERE student_id=ANY($1)";    
    $result = pg_prepare($db, "fetch_student_health", $sql);
    $result = pg_execute($db, "fetch_student_health", array($elements));
    $student_details = pg_fetch_all($result);
    $user["health_index"] = $student_details;

    ## Overall grade
    $sql = "SELECT AVG(grade) from student WHERE sr_code=ANY($1)";    
    $result = pg_prepare($db, "fetch_student_grade", $sql);
    $result = pg_execute($db, "fetch_student_grade", array($elements));
    $student_grade = pg_fetch_all($result);
    $user["overall_student_grade"] = $student_grade;

    $_SESSION['userlogin'] = $user;      
    
    
    file_put_contents('app_data.json', json_encode($_SESSION));
    header("location: ../../index.php");
} else {
    // Else, return to login with an Error message
    $_SESSION['error'] = '&#128680; Incorrect Email or Password <br>';		
    header("location: ../../login.php");
}


