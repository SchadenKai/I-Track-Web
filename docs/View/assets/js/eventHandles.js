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
function dynamicFilterLabel() {
    Array.from(document.querySelectorAll('.dropdown-item'))
  .forEach( (element) => {
    element.addEventListener('click', (e) => {
      const button = element.closest('.dropdown-menu').previousElementSibling
      console.log(button);
      console.log(e.target.textContent);
      button.textContent = e.target.textContent
    } )
  } )
}

$(document).on('click', '.dropdown-item', function(e) {
  const button = $('dropdown button:first-child');
  console.log($(e.target).text());
  console.log(button);
  button.text($(e.target).text());
})

// Handle click events in the document - debug 
/*document.addEventListener('click', function(e) { 
    console.log(e.target)
}, false); */


//Update class list content 
