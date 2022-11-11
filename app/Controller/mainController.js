import {insertTemplate_studentList} from "./includeFiles.js"
import {adminInfo, schoolYear_filter, class_filter} from "./dynamicInfoHandles.js"

$(document).ready(function () {
    insertTemplate_studentList();
    adminInfo();
    schoolYear_filter();
    class_filter();
});
