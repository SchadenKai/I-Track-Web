export function topStudentRequest() {
    
    $.get("../Model/modules/top_students.php",
        function(data, status) {
            console.log(status)
            topStudentsHandlebar(data)
        }
    )

}

function topStudentsHandlebar(stored_data) {
    let topStudents = JSON.parse(stored_data)
    let templateFunction = Handlebars.compile($('#top_students_template').html())
    let filled = templateFunction(topStudents)
    $('#top_students_grid').html(filled)
}