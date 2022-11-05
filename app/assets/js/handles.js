let popupElement = document.getElementById('popup');
    

    function popup_dashboard() {
            popupElement.classList.add('active');
            
            setTimeout(function() {
                popupElement.classList.remove('d-none');
                popupElement.classList.add('d-flex');
                
            }, 30);
        }

    
let isClosest = document.querySelector('#window-popup');

document.addEventListener("click", (e => {
    console.log( popupElement);
    console.log(isClosest);
        if (popupElement.classList.contains('d-flex')) {
            if (isClosest){
                console.log('working');

                console.log(isClosest);
                console.log(popupElement);
                
                popupElement.classList.remove("active");
                setTimeout( () => {
                    popupElement.classList.remove('d-flex');
                    popupElement.classList.add('d-none');
                },5);
            }
        }
    }
));


document.addEventListener('click', function(e) { 
    console.log(e.target)
}, false);