<?php

require "./validation.php";

$chronic_disease_count = 0;
$ill_count = 0;
$admitted_count = 0;
$injured_count = 0;
$no_students = 0;

foreach ($_SESSION['userlogin']['health_index'] as $health_index) {
    $no_students++;
    if($health_index['has_chronic_disease'] == "t") {
        $chronic_disease_count++;
    } 
    if($health_index['currently_ill'] == "t") {
        $ill_count++;
    } 
    if($health_index['admitted_to_hospital'] == "t") {
        $admitted_count++;
    } 
    if($health_index['injured'] == "t") {
        $injured_count++;
    }
}

$health_index_dataset = array(
    'chronic_disease_count' => $chronic_disease_count,
    'ill_count' => $ill_count,
    'admitted_count' => $admitted_count,
    'injured_count' => $injured_count,
    'no_of_students' => $no_students
);

$json = json_encode($health_index_dataset);

echo $json;
?>