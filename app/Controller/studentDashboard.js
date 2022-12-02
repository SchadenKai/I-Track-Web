export function studentDashboard() {
    $('#class_list_table').on('click', 'a', function(e) {
        let studentName = $(this).text()
        console.log(studentName);
        $.post("./sample.txt", 
            {student_name: studentName},
            function(data,status){
                console.log(data, status);
            }
        );
    })
}

