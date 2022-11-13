import {adminInfo, schoolYear_filter, class_filter} from "./dynamicInfoHandles.js"
import {insertTemplate_studentList} from "./insertClassList.js"
$(document).ready(function () {
    adminInfo();
    schoolYear_filter();
    class_filter();
});
