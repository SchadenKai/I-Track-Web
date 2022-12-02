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


$('#search-box').keydown(()=> {
    
    let studentName = $("#search-box").val()
    
    $.post("../../Model/modules/filter_students.php",
        {suggestion: studentName},
        function(data,status) {
            const obj = JSON.parse(data)
            insertTemplate_studentList(obj)
            console.log(obj, status);
        }
    )
  })


$(document).ready(()=>{
    studentDashboard();
    schoolYear_filter();
    class_filter();
})