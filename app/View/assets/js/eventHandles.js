// Enable nested modal 
Array.from(document.getElementsByClassName('showmodal')).forEach( (e) => {
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
$(document).on('click', '.dropdown-item', function(e) {
  const button = $(e.target).closest('.dropdown-menu').prev();
  button.text($(e.target).text());
})

// Handle click events in the document - debug 
/*document.addEventListener('click', function(e) { 
    console.log(e.target)
}, false); */

