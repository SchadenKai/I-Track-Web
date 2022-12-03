<?php
require "./validation.php";


// connected to student dashboard after on.click()
if(isset($_POST['name'])) {

    $name = $_POST['name'];

    // remove excess whitespaces
    $name = preg_replace('/\s+/', ' ', $name);
    $name = trim($name, " ");

    // separate data with whitespaces as delimiter
    $nameArr = explode(" ",$name);

    // $nameArr[0] == sr_code of the student

    for($i = 0; $i < sizeof($_SESSION['userlogin']['students']); $i++) {
        if($nameArr[0] == $_SESSION['userlogin']['students'][$i]['sr_code']) {
            $json = json_encode($_SESSION['userlogin']['students'][$i]);
            echo $json;
            break;
        }
    }
}

// search bar filter 
if(isset($_POST['suggestion'])) {
    $search =  $_POST['suggestion'];

    $resultsArr = array();
    
    foreach ($_SESSION['userlogin']['students'] as $students) {
        if(strpos(strtolower($students['name']), $search) !== false) {
            array_push($resultsArr, $students);
        }
    }

    if(sizeof($resultsArr) == 0) {
        $resultsArr = $_SESSION['userlogin']['students'];
    }

    $json = json_encode($resultsArr);
    echo $json;
}
?>
