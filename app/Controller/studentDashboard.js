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