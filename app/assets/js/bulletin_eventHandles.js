// get target element to popup
let filterOption =  document.getElementById('popup_filter');

function popup(parameter) {
    // set string parameter on onclick call function
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
        close_popup('filter');
    }
    
})

// Close popup function
function close_popup(parameter) {
    if (parameter == 'filter') {
        filterOption.classList.remove('active');
        setTimeout(function() {
            filterOption.classList.remove('d-flex');
            filterOption.classList.add('d-none');
        }, 20);
    }
}