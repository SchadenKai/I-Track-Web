// Enable nested modal 
Array.from(document.getElementsByClassName('showmodal')).forEach( (e) => {
    console.log(e);
    e.addEventListener('click', function(element) {
      element.preventDefault();
      if (e.hasAttribute('data-show-modal')) {
        showModal(e.getAttribute('data-show-modal'));
      }
    }); 
  });
  // Show modal dialog
function showModal(modal) {
    const mid = document.getElementById(modal);
    let myModal = new bootstrap.Modal(mid);
    myModal.show();
}

// Dynamic Filter Label
Array.from(document.querySelectorAll('.dropdown-item'))
.forEach( (element) => {
  element.addEventListener('click', (e) => {
    const button = element.closest('.dropdown-menu').previousElementSibling
    console.log(e.target);
    console.log(button);
    button.textContent = e.target.textContent
  } )
} )

// Handle click events in the document - debug 
/*document.addEventListener('click', function(e) { 
    console.log(e.target)
}, false); */