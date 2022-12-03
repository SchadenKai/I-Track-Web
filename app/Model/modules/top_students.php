<?php
require "./validation.php";

$studentArr = $_SESSION['userlogin']['students'];

usort(
    $studentArr,
    function($a, $b) {
        if($a['grade'] == $b['grade']) {
            return 0;
        }
        return ($a['grade'] > $b['grade']) ?-1 : 1;
    }
);
    $studentArr = array_slice($studentArr, 0, 10);
    $json = json_encode($studentArr);
    echo $json;
?>