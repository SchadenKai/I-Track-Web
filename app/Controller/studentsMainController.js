import {adminInfo, schoolYear_filter, class_filter} from "./dynamicInfoHandles.js"
import {insertTemplate_studentList} from "./insertClassList.js"
import {studentDashboard} from "./studentDashboard.js"

fetch("../Model/modules/app_data.json")
    .then((res) => res.json())
    .then((data) => {
        insertTemplate_studentList(data);
        adminInfo(data);
        
    })
    .catch((error) => console.log(error))

$(document).ready(()=>{
    studentDashboard();
    schoolYear_filter();
    class_filter();
})