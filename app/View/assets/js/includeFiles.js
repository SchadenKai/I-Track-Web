$(document).ready(function () {
   // Contain inline HTML template 
    // Insert values for class list information
    let link_path = "FirstName";
    let sr_code = "FirstName";
    let first_name = "FirstName";
    let last_name = "FirstName";
    let middle_initial = "FirstName";
    let student_status = "FirstName";

    // Append into array(student) to add a student
    let data = {
        student: [
            {
                link_path: link_path,
                first_name: first_name,
                last_name: last_name,
                sr_code: sr_code,
                middle_initial: middle_initial,
                status: student_status
            },
            {
                link_path: link_path,
                first_name: first_name,
                last_name: last_name,
                sr_code: sr_code,
                middle_initial: middle_initial,
                status: student_status
            },
            {
                link_path: link_path,
                first_name: first_name,
                last_name: last_name,
                sr_code: sr_code,
                middle_initial: middle_initial,
                status: 'student_status'
            },
            {
                link_path: link_path,
                first_name: first_name,
                last_name: last_name,
                sr_code: sr_code,
                middle_initial: middle_initial,
                status: student_status
            }
        ]
    }
    // compile the template variable -> template function
    let student_template = Handlebars.compile($('#student_template').html())
    // Pass the data into template 
    let filled = student_template(data)
    $('#class_list_table').html(filled)
});