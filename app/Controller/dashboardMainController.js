import {adminInfo, schoolYear_filter, class_filter} from "./dynamicInfoHandles.js"
import {topStudentRequest} from "./topStudentsHandles.js"
import {displayChart} from "../View/assets/js/charts.js"



$.get("../Model/modules/app_data.json",
    function(data,status) {
        adminInfo(data);
        dashboardDetails(data)
        console.log(status);
    }
)

$.get("../Model/modules/health_index_dataset.php",
    function(data, status) {
        let json = JSON.parse(data)
        displayChart(json)
        console.log(json, status);
    }
)

$(document).ready(function () {
    schoolYear_filter();
    class_filter();
    topStudentRequest(); 
})

function dashboardDetails(stored_data) {
    $('#student-count').text(stored_data.userlogin.student_count)
    
    let healthIndexScoreElement = $('#health-index-score')
    let overallStudentGradeElement = $('#overall-student-grade')
    let healthIndexScore = stored_data.userlogin.avg_health_score[0].avg
    let overallStudentGrade = stored_data.userlogin.overall_student_grade[0].avg

    healthIndexScore = parseFloat(healthIndexScore).toFixed(2)
    overallStudentGrade = parseFloat(overallStudentGrade).toFixed(2)

    colorText(healthIndexScore, healthIndexScoreElement)
    colorText(overallStudentGrade, overallStudentGradeElement)

    healthIndexScoreElement.text(healthIndexScore  + "%")
    overallStudentGradeElement.text(overallStudentGrade  + "%")

    $('#present-student-count').text(stored_data.userlogin.student_count)
}

function colorText(num, element) {
    if(num > 70) {
        element.addClass('text-success')
    } else {
        element.addClass('text-danger')
    }
}