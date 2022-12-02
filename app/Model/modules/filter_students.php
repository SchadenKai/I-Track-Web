<?php
require "./validation.php";

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

 
    //print_r($_SESSION['userlogin']['students'][0]['sr_code']);
} 
?>
