export function topStudentsHandlebar() {
    let firstName = "Cardo"
    let lastName = "Dalisay"
    let middleInitial = "E."
    let srCode = "20-07496"
    let studentGender = "Male"
    let imgTemplate = "../View/assets/icons/user-icon-placeholder.png"
    let data = {
        top_students: [
            {
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            },
            {
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            },
            {
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            },{
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            },{
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            },
            {
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            },
            {
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            },
            {
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            },
            {
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            },
            {
                image_html: imgTemplate,
                first_name: firstName,
                last_name: lastName,
                middle_initial: middleInitial,
                sr_code: srCode,
                gender: studentGender
            }
        ]
    }
    Handlebars.registerHelper('student_name', function() {
        return this.first_name + " " + this.middle_initial + " " + this.last_name;
    })
    let templateFunction = Handlebars.compile($('#top_students_template').html())
    let filled = templateFunction(data)
    $('#top_students_grid').html(filled)
    console.log(filled);
}