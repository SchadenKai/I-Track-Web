import {adminInfo, schoolYear_filter, class_filter} from "./dynamicInfoHandles.js"

fetch("../Model/modules/app_data.json")
    .then((res) => res.json())
    .then((data) => {
        adminInfo(data);
    })
    .catch((error) => console.log(error))

$(document).ready(function () {
    schoolYear_filter();
    class_filter();
});
