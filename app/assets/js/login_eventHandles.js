
// dashboard element var 
let dashboard = document.getElementById('popup');
let filterOption =  document.getElementById('popup_filter');

// pop up function
function popup(parameter) {
    // set string parameter on onclick call function
    if(parameter == "dashboard") {
        dashboard.classList.add('active');
        setTimeout(function() {
            dashboard.classList.remove('d-none');
            dashboard.classList.add('d-flex');
        }, 20); 
    }
    if(parameter == "filter") {
        filterOption.classList.add('active');
        setTimeout(function() {
            filterOption.classList.remove('d-none');
            filterOption.classList.add('d-flex');
        }, 20);
    } 
}


// Detects if the user clicked outside the popup box -> close the popup
document.addEventListener('click', function(e) {
    console.log(e.target);
    if (e.target.classList.contains('active')) {
        close_popup('dashboard');
        close_popup('filter');
    }
    
})

// Close popup function
function close_popup(parameter) {
    if (parameter == 'dashboard') {
        dashboard.classList.remove('active');
        setTimeout(function() {
            dashboard.classList.remove('d-flex');
            dashboard.classList.add('d-none');
        }, 20);
    }
    if (parameter == 'filter') {
        filterOption.classList.remove('active');
        setTimeout(function() {
            filterOption.classList.remove('d-flex');
            filterOption.classList.add('d-none');
        }, 20);
    }
}




// Handle click events in the document - debug 
/*document.addEventListener('click', function(e) { 
    console.log(e.target)
}, false); */