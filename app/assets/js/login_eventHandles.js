
// dashboard element var 
let dashboard = document.getElementById('popup');
let home_filterOption =  document.getElementById('popup_filter');

// pop up function
function popup(parameter) {
    if(parameter == "dashboard") {
        dashboard.classList.add('active');
        setTimeout(function() {
            dashboard.classList.remove('d-none');
            dashboard.classList.add('d-flex');
        }, 20); 
    }
    if(parameter == "filter") {
        home_filterOption.classList.add('active');
        setTimeout(function() {
            home_filterOption.classList.remove('d-none');
            home_filterOption.classList.add('d-flex');
        }, 20);
    } 
}
// Detects if the user clicked outside the popup box -> close the popup
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('active')) {
        close_popup();
    }
})

// Close popup function
function close_popup(parameter) {
    if (parameter == 'dashboard') {
        dashboard.classList.remove('active');
        setTimeout(function() {
            dashboard.classList.remove('d-flex');
            dashboard.classList.add('d-none');
        }, 5);
    }
    if (parameter == 'filter') {
        home_filterOption.classList.remove('active');
        setTimeout(function() {
            home_filterOption.classList.remove('d-flex');
            home_filterOption.classList.add('d-none');
        }, 5);
    }
}




// Handle click events in the document - debug 
/*document.addEventListener('click', function(e) { 
    console.log(e.target)
}, false); */