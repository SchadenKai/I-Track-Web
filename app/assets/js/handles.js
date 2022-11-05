
// pop up window for dashboard
let popupElement = document.getElementById('popup');
    function popup_dashboard() {
        console.log(popupElement)
        popupElement.classList.add('active');

        /* popupElement.addEventListener('transitionend', function(e) {

            popupElement.classList.remove('d-none');
            popupElement.classList.add('d-flex');
        }) */
        setTimeout(function() {
            popupElement.classList.remove('d-none');
            popupElement.classList.add('d-flex');
        }, 20);
    }
    document.addEventListener('click', function(e) {
        console.log(e.target);
        if (e.target.classList.contains('active')) {
            close_popup();
            console.log('this is hey');
        }
    })
    function close_popup() {
        popupElement.classList.remove('active');
        setTimeout(function() {
            popupElement.classList.remove('d-flex');
            popupElement.classList.add('d-none');
        }, 5);
    }
 

// Handle click events in the document 
/*document.addEventListener('click', function(e) { 
    console.log(e.target)
}, false); */