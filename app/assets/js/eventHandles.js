// Enable nested modal 
Array.from(document.getElementsByClassName('showmodal')).forEach( (e) => {
    console.log(e.target);
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


// Handle click events in the document - debug 
/*document.addEventListener('click', function(e) { 
    console.log(e.target)
}, false); */