import { applyChartJS } from "../View/assets/js/studentChart.js";

export function studentDashboard() {


    $('#class_list_table').on('click', 'a', function() {
        let studentName = $(this).text()
        $.post("../Model/modules/filter_students.php",
            {name: studentName},
            function(data,status){
                console.log(status);
                applyStudentData(data)
            }
        )
    })

    
}

function applyStudentData(data) {
    //conver string to object
    let obj = JSON.parse(data)
    
    // connecting to pages
    $('#student-name').text(obj.name)
    $('#student-srcode').text(obj.sr_code)
    $('#section').text("CS3101")
    $('#age').text(age(obj.birthdate))
    $('#gender').text(obj.gender)
    $('#civil-status').text(obj.civil_status)

    $('#if-working').text(formatBooleanText(obj.working_student))
    $('#scholarship').text(formatBooleanText(obj.scholar))
    $('#extra-curr-activities').text(formatBooleanText(obj.activities))

    $('#attended-seminars').text(obj.attended_seminars)
    $('#year-started').text(obj.year_started)
    $('#year-level').text(obj.year_level)
    $('#characteristics').text(obj.characteristics)
    $('#interest').text(obj.interest)
    $('#learning-styles').text(obj.learning_style)
    $('#transportation').text(obj.transportation)
    $('#accomodation').text(obj.accomodation)

    const sampleGWA = 
        {"1stYr. First Semester": 1.25,
        "1stYr. Second Semester": 1.50,
        "2ndYr. First Semester": 1.75,
        "2ndYr. Second Semester": 1.75
        }
    
    const sampleOutput =
        {"Assignment 1": 100,
        "Assignment 1": 90,
        "Quiz 1": 95,
        "Projects": 97,
        "Midterms": 95
        }
    
    const sampleExpectedGrade = 
        {"Examination": 25,
        "Activities": 30,
        "Quizzes": 30
        }
    
    $('#curr-gwa').text(gwaFormat(obj.grade))

    applyChartJS(sampleGWA, $('#curr-grade-graph') ,"General Weighted Average")
    applyChartJS(sampleOutput, $('#output-graph') , "Output Graph")
    applyChartJS(sampleExpectedGrade, $('#expected-grade') , "Expected Grade [Current grade]")
    
}

function formatBooleanText(data, element) {
    if(data == "t") {
        return "Yes"
    } else {
        return "No"
    }
}

function age(data) {
    const date = new Date()

    let curr_year = date.getFullYear()
    let birtDate = new Date(data).getFullYear()

    return Math.abs(birtDate-curr_year)
}

function gwaFormat(data) {
    if(data >= 96 && data <= 100) {
        return "1.00"
    }
    if(data >= 90 && data <= 95.99) {
        return "1.25"
    }
    if(data >= 84 && data <= 89.99) {
        return "1.50"
    }
    if(data >= 78 && data <= 83.99) {
        return "1.75"
    }
    if(data >= 72 && data <= 77.99) {
        return "2.00"
    }
    if(data >= 66 && data <= 71.99) {
        return "2.25"
    }
    if(data >= 60 && data <= 65.99) {
        return "2.50"
    }
    if(data >= 55 && data <= 59.99) {
        return "2.75"
    }
    if(data >= 50 && data <= 54.99) {
        return "3.00"
    }
    if(data >= 40 && data <= 49.99) {
        return "4.00"
    }
    if(data <= 40) {
        return "5.00"
    }
}