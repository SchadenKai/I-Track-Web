import {adminInfo, schoolYear_filter, class_filter} from "./dynamicInfoHandles.js"
import {topStudentsHandlebar} from "./topStudentsHandles.js"

$(document).ready(function () {
    adminInfo();
    schoolYear_filter();
    class_filter();
    topStudentsHandlebar();
});
