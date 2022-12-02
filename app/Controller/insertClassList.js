export function insertTemplate_studentList(stored_data) {
    // Contain inline HTML template 
    // Insert values for class list information
    // compile the template variable -> template function
    
    let student_template = Handlebars.compile($('#student_template').html())
    // Pass the data into template 
    let filled = student_template(stored_data)
    $('#class_list_table').html(filled)
}