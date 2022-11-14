export function insertTemplate_studentList() {
    // Contain inline HTML template 
    // Insert values for class list information
    let sr_code = "20-07496";
    let first_name = "FirstName";
    let last_name = "LastName";
    let middle_initial = "A.";
    let student_status = "Regular";

    // Append into array(student) to add a student
    let data = {
        student: [
            {
                first_name: first_name,
                last_name: last_name,
                sr_code: sr_code,
                middle_initial: middle_initial,
                status: student_status
            },
            {
                first_name: first_name,
                last_name: last_name,
                sr_code: sr_code,
                middle_initial: middle_initial,
                status: student_status
            },
            {
                first_name: first_name,
                last_name: last_name,
                sr_code: sr_code,
                middle_initial: middle_initial,
                status: student_status
            },
            {
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
    console.log(filled);
}