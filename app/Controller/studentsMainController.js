import {adminInfo, schoolYear_filter, class_filter} from "./dynamicInfoHandles.js"
import {insertTemplate_studentList} from "./insertClassList.js"
import {studentDashboard} from "./studentDashboard.js"

$.get("../Model/modules/app_data.json",
    function(data,status) {
        insertTemplate_studentList(data.userlogin.students)
        adminInfo(data)
        console.log(status);
    }
)

let debounceTimeout;

$('#search-box').on('input', ()=> {
    const studentName = $("#search-box").val();

    // Clear previous debounce timeout
    clearTimeout(debounceTimeout);

    // Set new debounce timeout
    debounceTimeout = setTimeout(() => {
        $.post("../../Model/modules/filter_students.php",
            {suggestion: studentName},
            function(data,status) {
                const obj = JSON.parse(data);
                if (obj.length === 0) {
                    // Display "no value" if there are no results
                    $('#student-list').html('<p>No value</p>');
                } else {
                    // Display results if there are any
                    insertTemplate_studentList(obj);
                }
                console.log(status);
            }
        )
    }, 300); // Change delay time as needed
});


$(document).ready(()=>{
    studentDashboard();
    schoolYear_filter();
    class_filter();
})