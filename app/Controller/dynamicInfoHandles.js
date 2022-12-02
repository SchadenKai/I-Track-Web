//Data Route from PHP to Frontend HTML
export function adminInfo(data) {
    // connect from php 
    $('#admin_fullName').text(data.userlogin.first_name + " " + data.userlogin.last_name);
    $('#admin_email').text(data.userlogin.email);
}
// School Year Filter Choices
export function schoolYear_filter() {
    const template = "{{#each classYear}} <li><a class=\"dropdown-item yearFilter\" href=\"#\">{{this}}</a></li> {{/each}}"
    let data = {
        classYear:[
            "2022 - 2023",
            "2021 - 2022",
            "2020 - 2021",
            "2019 - 2020",
            "2018 - 2019"
        ]
    }
    const templateFunction = Handlebars.compile(template)
    const filled = templateFunction(data)
    $('#dropDownMenu_yearFilter').html(filled)
}
// School Class Choices
export function class_filter() {
    const template = "{{#each classPerYear}} <li><a class=\"dropdown-item yearFilter\" href=\"#\">{{this}}</a></li> {{/each}}"
    let data = {
        classPerYear: [
            "Class 1",
            "Class 2",
            "Class 3",
            "Class 4",
            "Class 5",
            ]
    }
    const templateFunction = Handlebars.compile(template)
    const filled = templateFunction(data)
    $('#dropDownMenu_classFilter').html(filled)
}